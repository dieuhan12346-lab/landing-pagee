import json, ssl
from urllib.request import urlopen
from urllib.error import HTTPError, URLError

ctx = ssl._create_unverified_context()
url = 'https://deliachocolate.com'

endpoints = [
    '/wp-json/',
    '/wp-json/wp/v2/pages?per_page=1',
    '/wp-login.php',
]

for ep in endpoints:
    try:
        with urlopen(f'{url}{ep}', timeout=15, context=ctx) as r:
            print(f'{ep} -> {r.status} ({len(r.read())} bytes)')
    except HTTPError as e:
        body = e.read()[:200]
        print(f'{ep} -> HTTP {e.code}: {body}')
    except URLError as e:
        print(f'{ep} -> URLError: {e.reason}')
    except Exception as ex:
        print(f'{ep} -> ERR: {ex}')
