"""
Luxora WordPress Content Manager
Quan ly noi dung WordPress qua REST API - co preview truoc khi thay doi

Usage:
    uv run manage.py list
    uv run manage.py get <id>
    uv run manage.py draft "Tieu de" "Noi dung..."
    uv run manage.py update <id>
    uv run manage.py check
    uv run manage.py search "tu khoa"
"""
import sys, os, json, base64, re, textwrap

# Force UTF-8 output on Windows
if sys.stdout.encoding != 'utf-8':
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')
if sys.stderr.encoding != 'utf-8':
    sys.stderr.reconfigure(encoding='utf-8', errors='replace')
from pathlib import Path
from urllib import request, error
from urllib.parse import urlencode

SCRIPT_DIR = Path(__file__).parent
ENV_FILE   = SCRIPT_DIR / '.env'

GREEN  = '\033[92m'
YELLOW = '\033[93m'
RED    = '\033[91m'
CYAN   = '\033[96m'
BOLD   = '\033[1m'
GREY   = '\033[90m'
RESET  = '\033[0m'
os.system('')

def g(s): return f"{GREEN}{s}{RESET}"
def y(s): return f"{YELLOW}{s}{RESET}"
def r(s): return f"{RED}{s}{RESET}"
def c(s): return f"{CYAN}{s}{RESET}"
def b(s): return f"{BOLD}{s}{RESET}"
def gr(s): return f"{GREY}{s}{RESET}"

# ── Load .env ─────────────────────────────────────────────────────────────────
def load_env():
    if not ENV_FILE.exists():
        print(r("ERROR: manage\\.env not found."))
        sys.exit(1)
    cfg = {}
    for line in ENV_FILE.read_text(encoding='utf-8').splitlines():
        line = line.strip()
        if not line or line.startswith('#') or '=' not in line:
            continue
        k, _, v = line.partition('=')
        cfg[k.strip()] = v.strip().strip('"').strip("'")
    return cfg

# ── HTTP helpers ──────────────────────────────────────────────────────────────
def make_headers(cfg):
    creds = f"{cfg['WP_USER']}:{cfg['WP_APP_PASS']}"
    token = base64.b64encode(creds.encode()).decode()
    return {
        'Authorization': f'Basic {token}',
        'Content-Type': 'application/json',
        'User-Agent': 'LuxoraManager/1.0',
    }

def api_get(cfg, endpoint, params=None):
    url = cfg['WP_URL'].rstrip('/') + '/wp-json/wp/v2/' + endpoint
    if params:
        url += '?' + urlencode(params)
    req = request.Request(url, headers=make_headers(cfg))
    try:
        with request.urlopen(req, timeout=15) as resp:
            return json.loads(resp.read())
    except error.HTTPError as e:
        body = e.read().decode('utf-8', errors='replace')
        print(r(f"HTTP {e.code}: {body[:200]}"))
        sys.exit(1)

def api_post(cfg, endpoint, data):
    url = cfg['WP_URL'].rstrip('/') + '/wp-json/wp/v2/' + endpoint
    payload = json.dumps(data).encode('utf-8')
    req = request.Request(url, data=payload, headers=make_headers(cfg), method='POST')
    try:
        with request.urlopen(req, timeout=15) as resp:
            return json.loads(resp.read())
    except error.HTTPError as e:
        body = e.read().decode('utf-8', errors='replace')
        print(r(f"HTTP {e.code}: {body[:300]}"))
        sys.exit(1)

def api_patch(cfg, endpoint, data):
    url = cfg['WP_URL'].rstrip('/') + '/wp-json/wp/v2/' + endpoint
    payload = json.dumps(data).encode('utf-8')
    req = request.Request(url, data=payload, headers=make_headers(cfg), method='POST')
    req.get_method = lambda: 'POST'
    # WP REST API accepts POST for updates when _method=PUT is not available
    # Use POST with id in URL
    try:
        with request.urlopen(req, timeout=15) as resp:
            return json.loads(resp.read())
    except error.HTTPError as e:
        body = e.read().decode('utf-8', errors='replace')
        print(r(f"HTTP {e.code}: {body[:300]}"))
        sys.exit(1)

# ── HTML to plain text ─────────────────────────────────────────────────────────
def strip_html(html):
    text = re.sub(r'<br\s*/?>', '\n', html, flags=re.I)
    text = re.sub(r'</p>', '\n\n', text, flags=re.I)
    text = re.sub(r'</h[1-6]>', '\n', text, flags=re.I)
    text = re.sub(r'<[^>]+>', '', text)
    text = re.sub(r'&nbsp;', ' ', text)
    text = re.sub(r'&amp;', '&', text)
    text = re.sub(r'&lt;', '<', text)
    text = re.sub(r'&gt;', '>', text)
    text = re.sub(r'&quot;', '"', text)
    text = re.sub(r'\n{3,}', '\n\n', text)
    return text.strip()

def wrap(text, width=70, indent='  '):
    lines = text.split('\n')
    out = []
    for line in lines:
        if len(line) <= width:
            out.append(indent + line)
        else:
            wrapped = textwrap.wrap(line, width)
            out.extend(indent + l for l in wrapped)
    return '\n'.join(out)

# ── Commands ──────────────────────────────────────────────────────────────────

def cmd_list(cfg, args):
    """List all pages and posts."""
    pages = api_get(cfg, 'pages', {'per_page': 50, '_fields': 'id,title,status,slug,link'})
    posts = api_get(cfg, 'posts', {'per_page': 50, '_fields': 'id,title,status,slug,link'})

    print(f"\n{b('PAGES')} ({len(pages)})")
    print("  " + "-" * 60)
    for p in pages:
        status_color = g if p['status'] == 'publish' else y
        print(f"  [{c(str(p['id']).rjust(4))}] "
              f"{status_color(p['status'].ljust(8))} "
              f"/{p['slug']}\n"
              f"         {b(p['title']['rendered'])}")
    print()
    print(f"{b('POSTS')} ({len(posts)})")
    print("  " + "-" * 60)
    if not posts:
        print(gr("  (no posts yet)"))
    for p in posts:
        status_color = g if p['status'] == 'publish' else y
        print(f"  [{c(str(p['id']).rjust(4))}] "
              f"{status_color(p['status'].ljust(8))} "
              f"/{p['slug']}\n"
              f"         {b(p['title']['rendered'])}")
    print()
    print(gr("  Use: manage.bat get <id>  to view content"))
    print()

def cmd_get(cfg, args):
    """Show content of a page or post."""
    if not args:
        print(r("Usage: manage.bat get <id>"))
        sys.exit(1)
    id_ = args[0]

    # Try pages first, then posts
    try:
        item = api_get(cfg, f'pages/{id_}')
        kind = 'PAGE'
    except SystemExit:
        item = api_get(cfg, f'posts/{id_}')
        kind = 'POST'

    title   = item['title']['rendered']
    content = strip_html(item['content']['rendered'])
    excerpt = strip_html(item.get('excerpt', {}).get('rendered', ''))
    status  = item['status']
    slug    = item['slug']
    link    = item.get('link', '')

    status_label = g(status) if status == 'publish' else y(status)

    print()
    print(f"{b(kind)} [{c(str(item['id']))}] - {status_label}")
    print(f"  Title : {b(title)}")
    print(f"  Slug  : /{slug}")
    print(f"  URL   : {link}")
    if item.get('template'):
        print(f"  Template: {item['template']}")
    print()
    print(f"{b('CONTENT:')}")
    print("  " + "-" * 60)
    if content:
        print(wrap(content))
    else:
        print(gr("  (no content / uses page template)"))
    print("  " + "-" * 60)
    if excerpt:
        print(f"\n{b('EXCERPT:')}")
        print(wrap(excerpt))
    print()
    print(gr(f"  Edit: manage.bat update {item['id']}"))
    print()

def cmd_draft(cfg, args):
    """Create a new draft post."""
    if len(args) < 1:
        print(r("Usage: manage.bat draft \"Title\" [\"Content...\"]"))
        sys.exit(1)

    title   = args[0]
    content = args[1] if len(args) > 1 else ''

    print(f"\n{b('NEW DRAFT POST - PREVIEW')}")
    print("  " + "-" * 60)
    print(f"  Title  : {b(title)}")
    print(f"  Status : {y('draft')}")
    print(f"  Content:\n{wrap(content) if content else gr('  (empty - edit later in WP Admin)')}")
    print("  " + "-" * 60)
    print()

    answer = input("Create this draft? [y/N] ").strip().lower()
    if answer != 'y':
        print("Cancelled.")
        return

    result = api_post(cfg, 'posts', {
        'title':   title,
        'content': content,
        'status':  'draft',
    })
    print(g(f"\nDraft created! ID: {result['id']}"))
    print(f"  Edit in WP Admin: {cfg['WP_URL']}/wp-admin/post.php?post={result['id']}&action=edit")
    print()

def cmd_update(cfg, args):
    """Update page/post content with preview."""
    if not args:
        print(r("Usage: manage.bat update <id>"))
        sys.exit(1)
    id_ = args[0]

    # Get current content
    try:
        item = api_get(cfg, f'pages/{id_}')
        endpoint = f'pages/{id_}'
        kind = 'page'
    except SystemExit:
        item = api_get(cfg, f'posts/{id_}')
        endpoint = f'posts/{id_}'
        kind = 'post'

    old_title   = item['title']['rendered']
    old_content = strip_html(item['content']['rendered'])

    print(f"\n{b('CURRENT CONTENT')} [{c(id_)}] {b(old_title)}")
    print("  " + "-" * 60)
    print(wrap(old_content[:600] + ('...' if len(old_content) > 600 else '')))
    print("  " + "-" * 60)
    print()
    print(gr("  Enter new content below. Press Enter twice when done."))
    print(gr("  Leave blank to keep current value."))
    print()

    new_title = input(f"  New title [{old_title}]: ").strip()
    if not new_title:
        new_title = old_title

    print("  New content (blank lines x2 to finish):")
    lines = []
    blank_count = 0
    while True:
        line = input("  > ")
        if line == '':
            blank_count += 1
            if blank_count >= 2:
                break
            lines.append('')
        else:
            blank_count = 0
            lines.append(line)
    new_content = '\n'.join(lines).strip()
    if not new_content:
        new_content = item['content']['rendered']

    # Preview diff
    print()
    print(f"{b('PREVIEW - CHANGES')}")
    print("  " + "-" * 60)
    if new_title != old_title:
        print(f"  Title:")
        print(r(f"    - {old_title}"))
        print(g(f"    + {new_title}"))
    else:
        print(f"  Title: {old_title} (no change)")
    print()
    print("  Content (new):")
    print(wrap(new_content[:600] + ('...' if len(new_content) > 600 else '')))
    print("  " + "-" * 60)
    print()

    answer = input(f"Apply changes to {kind} [{id_}] on {cfg['WP_URL']}? [y/N] ").strip().lower()
    if answer != 'y':
        print("Cancelled.")
        return

    result = api_post(cfg, endpoint, {
        'title':   new_title,
        'content': new_content,
    })
    print(g(f"\nUpdated! [{result['id']}] {result['title']['rendered']}"))
    print(f"  View: {result.get('link', '')}")
    print()

def cmd_check(cfg, args):
    """Check all important pages."""
    IMPORTANT = {
        'home'    : ['/', '/trang-chu'],
        'shop'    : ['/shop', '/catalog'],
        'contact' : ['/contact', '/lien-he'],
        'freetool': ['/free-tools', '/cong-cu-mien-phi'],
        'account' : ['/my-account', '/tai-khoan'],
        'cart'    : ['/cart'],
        'checkout': ['/checkout'],
    }

    pages = api_get(cfg, 'pages', {'per_page': 100, '_fields': 'id,title,status,slug,link'})
    slugs = {p['slug']: p for p in pages}

    print(f"\n{b('SITE CHECK')} - {cfg['WP_URL']}")
    print("  " + "-" * 60)

    all_ok = True
    for label, slug_list in IMPORTANT.items():
        found = None
        for s in slug_list:
            slug = s.strip('/')
            if slug in slugs:
                found = slugs[slug]
                break
        if found:
            status = found['status']
            color = g if status == 'publish' else y
            print(f"  {g('OK')}  {label.ljust(10)} [{c(str(found['id']))}] "
                  f"{color(status.ljust(9))} {found['link']}")
        else:
            print(f"  {r('--')}  {label.ljust(10)} {r('NOT FOUND')} "
                  f"(expected: {', '.join(slug_list)})")
            all_ok = False

    print("  " + "-" * 60)
    print()

    # WooCommerce check
    try:
        wc_pages = api_get(cfg, 'pages', {'per_page': 100, '_fields': 'id,slug,status'})
        wc_slugs = [p['slug'] for p in wc_pages]
        for required in ['cart', 'checkout', 'my-account']:
            if required in wc_slugs:
                print(f"  {g('OK')}  WC/{required}")
            else:
                print(f"  {y('?')}   WC/{required} - {y('not found')}")
    except:
        pass

    print()
    if all_ok:
        print(g("  All important pages are live."))
    else:
        print(y("  Some pages missing - check WP Admin."))
    print()

def cmd_search(cfg, args):
    """Search pages and posts by keyword."""
    if not args:
        print(r("Usage: manage.bat search \"keyword\""))
        sys.exit(1)
    keyword = ' '.join(args)

    pages = api_get(cfg, 'pages', {'search': keyword, 'per_page': 20,
                                   '_fields': 'id,title,status,slug,link'})
    posts = api_get(cfg, 'posts', {'search': keyword, 'per_page': 20,
                                   '_fields': 'id,title,status,slug,link'})

    results = pages + posts
    print(f"\n{b('SEARCH:')} \"{keyword}\" - {len(results)} results")
    print("  " + "-" * 60)
    if not results:
        print(gr("  No results found."))
    for item in results:
        print(f"  [{c(str(item['id']))}] {item['title']['rendered']}")
        print(f"         {item['link']}")
    print()

# ── Entry point ───────────────────────────────────────────────────────────────
COMMANDS = {
    'list'  : cmd_list,
    'get'   : cmd_get,
    'draft' : cmd_draft,
    'update': cmd_update,
    'check' : cmd_check,
    'search': cmd_search,
}

def main():
    if len(sys.argv) < 2 or sys.argv[1] not in COMMANDS:
        print(f"\n{b('Luxora WordPress Manager')}")
        print("  manage.bat list                - list all pages/posts")
        print("  manage.bat get <id>            - view content")
        print("  manage.bat draft \"Title\"       - create draft post")
        print("  manage.bat update <id>         - update content (with preview)")
        print("  manage.bat check               - check important pages")
        print("  manage.bat search \"keyword\"    - search content")
        print()
        sys.exit(0)

    cfg = load_env()
    cmd = sys.argv[1]
    args = sys.argv[2:]
    COMMANDS[cmd](cfg, args)

if __name__ == '__main__':
    main()
