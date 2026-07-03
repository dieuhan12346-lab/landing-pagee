"""
Luxora Theme Deploy - SFTP via paramiko (single SSH connection, fast)
Usage:
    uv run --with paramiko deploy.py [--dry-run] [--yes] [--file path]
    deploy.bat [--dry-run] [--yes] [--file path]
"""
import argparse, hashlib, os, sys
from pathlib import Path

SCRIPT_DIR  = Path(__file__).parent
PROJECT_DIR = SCRIPT_DIR.parent
LOCAL_THEME = PROJECT_DIR / 'luxora-theme'
KEY_FILE    = SCRIPT_DIR / 'hostinger_key'
ENV_FILE    = SCRIPT_DIR / '.env'

EXCLUDE_NAMES = {'.DS_Store', 'Thumbs.db', 'desktop.ini', '.gitkeep'}
EXCLUDE_EXT   = {'.pyc', '.log', '.tmp', '.bak'}

GREEN  = '\033[92m'
YELLOW = '\033[93m'
RED    = '\033[91m'
CYAN   = '\033[96m'
GREY   = '\033[90m'
RESET  = '\033[0m'
os.system('')

def green(s):  return f"{GREEN}{s}{RESET}"
def yellow(s): return f"{YELLOW}{s}{RESET}"
def red(s):    return f"{RED}{s}{RESET}"
def grey(s):   return f"{GREY}{s}{RESET}"

def load_env():
    if not ENV_FILE.exists():
        print(red("ERROR: deploy\\.env not found."))
        sys.exit(1)
    cfg = {}
    for line in ENV_FILE.read_text(encoding='utf-8').splitlines():
        line = line.strip()
        if not line or line.startswith('#') or '=' not in line:
            continue
        k, _, v = line.partition('=')
        cfg[k.strip()] = v.strip().strip('"').strip("'")
    for key in ('DEPLOY_HOST', 'DEPLOY_PORT', 'DEPLOY_USER', 'DEPLOY_REMOTE_PATH'):
        if not cfg.get(key):
            print(red(f"ERROR: Missing in .env: {key}"))
            sys.exit(1)
    return cfg

def local_md5(path):
    h = hashlib.md5()
    with open(path, 'rb') as f:
        for chunk in iter(lambda: f.read(65536), b''):
            h.update(chunk)
    return h.hexdigest()

def remote_md5(sftp, path):
    try:
        with sftp.open(path, 'rb') as f:
            h = hashlib.md5()
            for chunk in iter(lambda: f.read(65536), b''):
                h.update(chunk)
            return h.hexdigest()
    except (IOError, FileNotFoundError):
        return None

def collect_local(theme_dir, only_file=None):
    result = {}
    base = Path(theme_dir)
    for f in sorted(base.rglob('*')):
        if not f.is_file(): continue
        if f.name in EXCLUDE_NAMES: continue
        if f.suffix in EXCLUDE_EXT: continue
        rel = str(f.relative_to(base)).replace('\\', '/')
        if any(part.startswith('.') for part in rel.split('/')): continue
        if only_file and rel != only_file: continue
        result[rel] = str(f)
    return result

def sftp_makedirs(sftp, remote_dir):
    parts = remote_dir.strip('/').split('/')
    path = ''
    for part in parts:
        path += '/' + part
        try:
            sftp.stat(path)
        except IOError:
            sftp.mkdir(path)

def main():
    parser = argparse.ArgumentParser()
    parser.add_argument('--dry-run', action='store_true')
    parser.add_argument('--yes', '-y', action='store_true')
    parser.add_argument('--file', default=None)
    args = parser.parse_args()

    if not KEY_FILE.exists():
        print(red(f"ERROR: SSH key not found: {KEY_FILE}"))
        print("  Run: deploy\\setup-ssh.ps1")
        sys.exit(1)

    if not LOCAL_THEME.exists():
        print(red(f"ERROR: Theme folder not found: {LOCAL_THEME}"))
        sys.exit(1)

    cfg = load_env()

    import paramiko
    label = "Luxora Deploy -- DRY RUN" if args.dry_run else "Luxora Deploy"
    print(f"\n{label}")
    print(f"  Local : {LOCAL_THEME}")
    print(f"  Remote: {cfg['DEPLOY_USER']}@{cfg['DEPLOY_HOST']}:{cfg['DEPLOY_REMOTE_PATH']}")
    if args.file:
        print(f"  File  : {args.file}")
    print()

    print("  Scanning local files ...", end='', flush=True)
    local_files = collect_local(LOCAL_THEME, args.file)
    if args.file and not local_files:
        print(red(f"\nERROR: File not found: {args.file}"))
        sys.exit(1)
    print(green(f" {len(local_files)} files"))

    print("  Connecting to server ...", end='', flush=True)
    key    = paramiko.Ed25519Key(filename=str(KEY_FILE))
    client = paramiko.SSHClient()
    client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    client.connect(cfg['DEPLOY_HOST'], port=int(cfg['DEPLOY_PORT']),
                   username=cfg['DEPLOY_USER'], pkey=key)
    sftp = client.open_sftp()
    print(green(" OK"))

    print("  Comparing with remote ...", end='', flush=True)
    changes = []
    remote  = cfg['DEPLOY_REMOTE_PATH']
    for rel, local_path in local_files.items():
        r_md5 = remote_md5(sftp, f"{remote}/{rel}")
        l_md5 = local_md5(local_path)
        if r_md5 is None:
            changes.append((rel, local_path, 'NEW'))
        elif r_md5 != l_md5:
            changes.append((rel, local_path, 'MODIFIED'))
    print(green(f" {len(changes)} changes"))

    if not changes:
        print(green("\nAlready up to date. Nothing to deploy."))
        sftp.close(); client.close()
        return

    new_count = sum(1 for _, _, s in changes if s == 'NEW')
    mod_count = sum(1 for _, _, s in changes if s == 'MODIFIED')
    print()
    print("  " + "-" * 56)
    print(f"  FILES TO DEPLOY  ({len(changes)} changes)")
    print("  " + "-" * 56)
    for rel, _, status in sorted(changes):
        if status == 'NEW':
            print(f"  {green('+ NEW     ')}  {rel}")
        else:
            print(f"  {yellow('~ MODIFIED')}  {rel}")
    print("  " + "-" * 56)
    parts = []
    if new_count: parts.append(f"{new_count} new")
    if mod_count: parts.append(f"{mod_count} modified")
    print(f"  Total : {' + '.join(parts)}")
    print(grey(f"  Target: {remote}"))
    print()

    if args.dry_run:
        print("Dry run complete. Nothing was uploaded.\n")
        sftp.close(); client.close()
        return

    if not args.yes:
        answer = input(f"Deploy {len(changes)} files to {cfg['DEPLOY_HOST']}? [y/N] ")
        if answer.lower() != 'y':
            print("Cancelled.")
            sftp.close(); client.close()
            return

    print("Uploading...")
    import time
    t0 = time.time()
    for i, (rel, local_path, status) in enumerate(sorted(changes), 1):
        remote_file = f"{remote}/{rel}"
        remote_dir  = remote_file.rsplit('/', 1)[0]
        sftp_makedirs(sftp, remote_dir)
        sftp.put(local_path, remote_file)
        prefix = green('+') if status == 'NEW' else yellow('~')
        print(f"  [{i}/{len(changes)}] {prefix} {rel}")

    elapsed = round(time.time() - t0, 1)
    sftp.close()
    client.close()
    print(green(f"\nDone! {len(changes)} files deployed to {cfg['DEPLOY_HOST']} ({elapsed}s)\n"))

if __name__ == '__main__':
    main()
