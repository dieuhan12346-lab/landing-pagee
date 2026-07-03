import sys, os, base64, json
from pathlib import Path
from urllib.request import Request, urlopen
from urllib.error import HTTPError

sys.stdout.reconfigure(encoding='utf-8', errors='replace')

ENV_FILE = Path(__file__).parent / '.env.delia'
cfg = {}
for line in ENV_FILE.read_text(encoding='utf-8').splitlines():
    if '=' in line and not line.startswith('#'):
        k, _, v = line.partition('=')
        cfg[k.strip()] = v.strip()

url   = cfg['WP_URL'].rstrip('/')
user  = cfg['WP_USER']
pwd   = cfg['WP_APP_PASS']
token = base64.b64encode(f"{user}:{pwd.replace(' ', '')}".encode()).decode()
hdrs  = {'Authorization': f'Basic {token}', 'Content-Type': 'application/json'}

def wp(method, path, data=None, params=None):
    full = f"{url}/wp-json/wp/v2/{path}"
    if params:
        full += '?' + '&'.join(f"{k}={v}" for k, v in params.items())
    body = json.dumps(data).encode() if data else None
    req = Request(full, data=body, headers=hdrs, method=method)
    try:
        with urlopen(req, timeout=20) as r:
            return r.status, json.loads(r.read())
    except HTTPError as e:
        return e.code, json.loads(e.read())

status, me = wp('GET', 'users/me')
if status != 200:
    print(f"ERROR {status}: {me}"); sys.exit(1)
print(f"Connected as: {me.get('name')}\n")

pages_to_create = [
    ('Cau Chuyen',  'cau-chuyen', 'page-templates/template-story.php'),
    ('Ve Delia',    've-delia',   'page-templates/template-about.php'),
    ('Lien He',     'lien-he',    'page-templates/template-contact.php'),
    ('Trang Chu',   'home',       ''),
]

home_id = None
for title, slug, template in pages_to_create:
    s, existing = wp('GET', 'pages', params={'slug': slug, 'per_page': '1'})
    pid = None
    if existing and isinstance(existing, list) and existing:
        pid = existing[0]['id']
        payload = {'status': 'publish'}
        if template:
            payload['template'] = template
        s2, _ = wp('POST', f'pages/{pid}', payload)
        print(f"UPDATED  {title} (ID {pid}) [{s2}]")
    else:
        payload = {'title': title, 'slug': slug, 'status': 'publish', 'content': ''}
        if template:
            payload['template'] = template
        s2, res = wp('POST', 'pages', payload)
        if s2 in (200, 201):
            pid = res['id']
            print(f"CREATED  {title} (ID {pid})")
        else:
            print(f"FAILED   {title}: {res}")
    if slug == 'home' and pid:
        home_id = pid

if home_id:
    s, res = wp('POST', 'settings', {'page_on_front': home_id, 'show_on_front': 'page'})
    if s == 200:
        print(f"\nHomepage set -> Trang Chu (ID {home_id})")
    else:
        print(f"\nHomepage API failed: {res}")

print("\nDone!")
print(f"  {url}/cau-chuyen/")
print(f"  {url}/ve-delia/")
print(f"  {url}/lien-he/")
print("\nNext: WP Admin -> Appearance -> Themes -> activate Delia Chocolate")
