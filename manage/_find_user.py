import json, ssl
from urllib.request import urlopen

ctx = ssl._create_unverified_context()
url = 'https://deliachocolate.com'

with urlopen(f'{url}/wp-json/wp/v2/users?per_page=10', timeout=15, context=ctx) as r:
    users = json.loads(r.read())
    for u in users:
        print(f"ID={u['id']} slug={u['slug']} name={u['name']} link={u.get('link','')}")
