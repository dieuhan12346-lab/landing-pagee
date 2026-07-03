"""
Delia Theme Deploy - SFTP via paramiko
Usage:
    uv run --with paramiko deploy-delia.py [--dry-run] [--yes] [--file path]
    deploy-delia.bat [--dry-run] [--yes]
"""
import argparse, hashlib, os, sys
from pathlib import Path

sys.stdout.reconfigure(encoding='utf-8', errors='replace')

SCRIPT_DIR  = Path(__file__).parent
PROJECT_DIR = SCRIPT_DIR.parent
LOCAL_THEME = PROJECT_DIR / 'delia-theme'
KEY_FILE    = SCRIPT_DIR / 'hostinger_key_delia'
ENV_FILE    = SCRIPT_DIR / '.env.delia'

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
def cyan(s):   return f"{CYAN}{s}{RESET}"

def load_env():
    if not ENV_FILE.exists():
        print(red(f"ERROR: {ENV_FILE} not found."))
        sys.exit(1)
    cfg = {}
    for line in ENV_FILE.read_text(encoding='utf-8').splitlines():
        line = line.strip()
        if not line or line.startswith('#') or '=' not in line:
            continue
        k, _, v = line.partition('=')
        cfg[k.strip()] = v.strip()
    return cfg

def md5(path: Path) -> str:
    h = hashlib.md5()
    h.update(path.read_bytes())
    return h.hexdigest()

def collect_local(base: Path):
    files = {}
    for p in base.rglob('*'):
        if not p.is_file():
            continue
        if p.name in EXCLUDE_NAMES or p.suffix in EXCLUDE_EXT:
            continue
        rel = p.relative_to(base).as_posix()
        files[rel] = p
    return files

def remote_md5(sftp, remote_path: str) -> str | None:
    try:
        data = sftp.file(remote_path, 'rb').read()
        return hashlib.md5(data).hexdigest()
    except Exception:
        return None

def sftp_mkdir_p(sftp, path: str):
    """Create full path recursively, one segment at a time."""
    parts = path.strip('/').split('/')
    current = ''
    for part in parts:
        current += '/' + part
        try:
            sftp.stat(current)
        except (FileNotFoundError, IOError):
            try:
                sftp.mkdir(current)
            except (FileNotFoundError, IOError):
                pass  # already exists or can't create root segments

def ensure_remote_dirs(sftp, remote_base: str, rel_path: str):
    # Ensure the base theme dir exists first
    sftp_mkdir_p(sftp, remote_base)
    # Then create subdirs within it
    parts = rel_path.split('/')
    current = remote_base
    for part in parts[:-1]:
        current = f"{current}/{part}"
        try:
            sftp.stat(current)
        except (FileNotFoundError, IOError):
            sftp.mkdir(current)

def main():
    parser = argparse.ArgumentParser(description='Deploy Delia theme to Hostinger')
    parser.add_argument('--dry-run', action='store_true', help='Preview changes without uploading')
    parser.add_argument('--yes', '-y', action='store_true', help='Skip confirmation prompt')
    parser.add_argument('--file', help='Deploy single file (relative to theme root)')
    args = parser.parse_args()

    cfg = load_env()
    host        = cfg['DEPLOY_HOST']
    port        = int(cfg['DEPLOY_PORT'])
    user        = cfg['DEPLOY_USER']
    remote_base = cfg['DEPLOY_REMOTE_PATH']

    if not LOCAL_THEME.exists():
        print(red(f"ERROR: Theme folder not found: {LOCAL_THEME}"))
        sys.exit(1)

    print(cyan(f"\n  DELIA DEPLOY {'(DRY RUN) ' if args.dry_run else ''}"))
    print(grey(f"  {host}:{port}  {remote_base}\n"))

    import paramiko
    key = paramiko.Ed25519Key.from_private_key_file(str(KEY_FILE))
    client = paramiko.SSHClient()
    client.set_missing_host_key_policy(paramiko.AutoAddPolicy())

    print(grey(f"  Connecting to {host}:{port}..."))
    client.connect(hostname=host, port=port, username=user, pkey=key, timeout=20)
    sftp = client.open_sftp()
    print(green("  Connected!\n"))

    local_files = collect_local(LOCAL_THEME)

    if args.file:
        target = args.file.replace('\\', '/')
        if target not in local_files:
            print(red(f"  File not found in theme: {target}"))
            sftp.close(); client.close(); sys.exit(1)
        local_files = {target: local_files[target]}

    to_upload = []
    for rel, local_path in sorted(local_files.items()):
        remote_path = f"{remote_base}/{rel}"
        r_md5 = remote_md5(sftp, remote_path)
        l_md5 = md5(local_path)
        if r_md5 != l_md5:
            status = yellow('NEW') if r_md5 is None else cyan('CHANGED')
            print(f"  [{status}] {rel}")
            to_upload.append((rel, local_path, remote_path))
        else:
            print(grey(f"  [  OK  ] {rel}"))

    print(f"\n  {len(to_upload)} file(s) to upload, {len(local_files) - len(to_upload)} unchanged.\n")

    if not to_upload:
        print(green("  Everything is up to date!"))
        sftp.close(); client.close(); return

    if args.dry_run:
        print(yellow("  DRY RUN — no files uploaded."))
        sftp.close(); client.close(); return

    if not args.yes:
        confirm = input("  Upload these files? [y/N] ").strip().lower()
        if confirm != 'y':
            print(yellow("  Aborted."))
            sftp.close(); client.close(); return

    for rel, local_path, remote_path in to_upload:
        ensure_remote_dirs(sftp, remote_base, rel)
        sftp.put(str(local_path), remote_path)
        print(green(f"  Uploaded: {rel}"))

    sftp.close()
    client.close()
    print(green(f"\n  Done! {len(to_upload)} file(s) uploaded to Hostinger.\n"))

if __name__ == '__main__':
    main()
