"""
Setup Delia WordPress pages + activate theme + set homepage
Usage: uv run --with requests setup-delia-pages.py
"""
import sys, os, base64
from pathlib import Path

sys.stdout.reconfigure(encoding='utf-8', errors='replace')

ENV_FILE = Path(__file__).parent / '.env.delia'

def load_env():
    cfg = {}
    for line in ENV_FILE.read_text(encoding='utf-8').splitlines():
        line = line.strip()
        if not line or line.startswith('#') or '=' not in line:
            continue
        k, _, v = line.partition('=')
        cfg[k.strip()] = v.strip()
    return cfg

def main():
    import requests

    cfg = load_env()
    url  = cfg['WP_URL'].rstrip('/')
    user = cfg['WP_USER']
    pwd  = cfg['WP_APP_PASS']

    token = base64.b64encode(f"{user}:{pwd}".encode()).decode()
    headers = {
        'Authorization': f'Basic {token}',
        'Content-Type':  'application/json',
    }

    GREEN  = '\033[92m'
    YELLOW = '\033[93m'
    RED    = '\033[91m'
    CYAN   = '\033[96m'
    RESET  = '\033[0m'
    os.system('')

    print(f"\n{CYAN}  DELIA WP SETUP{RESET}")
    print(f"  {url}\n")

    # Test connection
    r = requests.get(f"{url}/wp-json/wp/v2/users/me", headers=headers, timeout=15)
    if r.status_code != 200:
        print(f"{RED}  ERROR: Cannot connect — {r.status_code} {r.text[:200]}{RESET}")
        sys.exit(1)
    print(f"{GREEN}  Connected as: {r.json().get('name')}{RESET}\n")

    # Pages to create: (title, slug, template)
    pages = [
        ('Câu Chuyện',  'cau-chuyen', 'page-templates/template-story.php'),
        ('Về Delia',    've-delia',   'page-templates/template-about.php'),
        ('Liên Hệ',     'lien-he',    'page-templates/template-contact.php'),
    ]

    created_ids = {}

    for title, slug, template in pages:
        # Check if page exists
        r = requests.get(f"{url}/wp-json/wp/v2/pages",
                         headers=headers,
                         params={'slug': slug, 'per_page': 1},
                         timeout=15)
        existing = r.json()

        if existing:
            pid = existing[0]['id']
            # Update template if needed
            r2 = requests.post(f"{url}/wp-json/wp/v2/pages/{pid}",
                               headers=headers,
                               json={'template': template, 'status': 'publish'},
                               timeout=15)
            if r2.status_code in (200, 201):
                print(f"{YELLOW}  UPDATED  {RESET}{title} (ID {pid}) — template set")
            else:
                print(f"{RED}  FAILED   {RESET}{title}: {r2.text[:100]}")
            created_ids[slug] = pid
        else:
            r2 = requests.post(f"{url}/wp-json/wp/v2/pages",
                               headers=headers,
                               json={
                                   'title':    title,
                                   'slug':     slug,
                                   'status':   'publish',
                                   'template': template,
                                   'content':  '',
                               },
                               timeout=15)
            if r2.status_code in (200, 201):
                pid = r2.json()['id']
                print(f"{GREEN}  CREATED  {RESET}{title} (ID {pid})")
                created_ids[slug] = pid
            else:
                print(f"{RED}  FAILED   {RESET}{title}: {r2.text[:100]}")

    # Get or create Home page
    r = requests.get(f"{url}/wp-json/wp/v2/pages",
                     headers=headers,
                     params={'slug': 'home', 'per_page': 1},
                     timeout=15)
    home_pages = r.json()
    if home_pages:
        home_id = home_pages[0]['id']
        print(f"{YELLOW}  EXISTS   {RESET}Home page (ID {home_id})")
    else:
        r2 = requests.post(f"{url}/wp-json/wp/v2/pages",
                           headers=headers,
                           json={'title': 'Trang Chủ', 'slug': 'home', 'status': 'publish', 'content': ''},
                           timeout=15)
        if r2.status_code in (200, 201):
            home_id = r2.json()['id']
            print(f"{GREEN}  CREATED  {RESET}Trang Chủ (ID {home_id})")
        else:
            home_id = None
            print(f"{RED}  FAILED   Home page: {r2.text[:100]}{RESET}")

    # Set Reading Settings — static front page
    print()
    if home_id:
        r = requests.post(f"{url}/wp-json/wp/v2/settings",
                          headers=headers,
                          json={'page_on_front': home_id, 'show_on_front': 'page'},
                          timeout=15)
        if r.status_code == 200:
            print(f"{GREEN}  Homepage set to: Trang Chủ (ID {home_id}){RESET}")
        else:
            print(f"{YELLOW}  Could not set homepage via API — do it manually:{RESET}")
            print(f"    WP Admin → Settings → Reading → Static page → Trang Chủ")

    # Activate theme
    r = requests.post(f"{url}/wp-json/wp/v2/themes/delia-theme",
                      headers=headers,
                      json={'status': 'active'},
                      timeout=15)
    if r.status_code in (200, 201):
        print(f"{GREEN}  Theme 'delia-theme' activated!{RESET}")
    else:
        # Try alternate endpoint
        print(f"{YELLOW}  Theme activation via API failed (normal) — activate manually:{RESET}")
        print(f"    WP Admin → Appearance → Themes → Delia Chocolate → Activate")

    print(f"\n{GREEN}  Done!{RESET}")
    print(f"\n  Pages created:")
    print(f"    {url}/cau-chuyen/  →  Câu Chuyện")
    print(f"    {url}/ve-delia/    →  Về Delia")
    print(f"    {url}/lien-he/     →  Liên Hệ")
    print(f"\n  Next steps:")
    print(f"    1. WP Admin → Appearance → Themes → activate 'Delia Chocolate'")
    print(f"    2. WP Admin → Settings → Reading → Homepage = Trang Chủ")
    print(f"    3. WP Admin → WooCommerce → Settings → set Shop page\n")

if __name__ == '__main__':
    main()
