# Quy trình cài WordPress trên Hostinger

Thực hiện một lần khi bắt đầu dự án mới.

---

## Bước 1 — Cài WordPress qua Hostinger hPanel

1. Đăng nhập **hPanel** tại `hpanel.hostinger.com`
2. Chọn **Websites** → **Add Website** (hoặc chọn domain đã có)
3. Chọn **WordPress** → **Install**
4. Điền:
   - Site title
   - Admin username (không dùng "admin")
   - Admin password (mạnh)
   - Admin email
5. Click **Install** — đợi 1-2 phút

---

## Bước 2 — Cài plugin bắt buộc

Vào **WP Admin → Plugins → Add New** và cài:

| Plugin | Mục đích |
|---|---|
| **Elementor** | Page builder |
| **WPCode Lite** | Chèn PHP/HTML/JS custom |
| **LiteSpeed Cache** | Tốc độ (Hostinger tự cài) |
| **Yoast SEO** (tùy chọn) | SEO |
| **WooCommerce** (nếu bán hàng) | E-commerce |

---

## Bước 3 — Cài theme

**Cách A — Upload ZIP:**
1. WP Admin → Appearance → Themes → Add New → Upload Theme
2. Chọn file `.zip` của theme → Install → Activate

**Cách B — SFTP (dùng deploy.py):**
Xem file `07-quy-trinh-dua-len-hostinger.md`

---

## Bước 4 — Tạo Application Password cho API

1. WP Admin → **Users** → **Profile**
2. Cuộn xuống **Application Passwords**
3. Tên: `claude-code-api`
4. Click **Add New Application Password**
5. **Copy ngay** — chỉ hiển thị 1 lần
6. Lưu vào `manage/.env`:
```
WP_URL=https://[domain].com
WP_USER=[admin-email]
WP_APP_PASS=[password vừa copy]
```

---

## Bước 5 — Tạo SSH key và thêm vào Hostinger

```python
# Chạy script này để tạo Ed25519 key (thay vì ssh-keygen trên Windows)
from cryptography.hazmat.primitives.asymmetric.ed25519 import Ed25519PrivateKey
from cryptography.hazmat.primitives.serialization import (
    Encoding, PrivateFormat, PublicFormat, NoEncryption
)

key = Ed25519PrivateKey.generate()
priv = key.private_bytes(Encoding.PEM, PrivateFormat.OpenSSH, NoEncryption())
pub = key.public_key().public_bytes(Encoding.OpenSSH, PublicFormat.OpenSSH)

open('deploy/hostinger_key', 'wb').write(priv)
open('deploy/hostinger_key.pub', 'wb').write(pub + b'\n')
print("Public key:", pub.decode())
```

Thêm public key vào Hostinger:
1. hPanel → **SSH Access** → **Manage SSH Keys**
2. Click **Add SSH Key**
3. Paste nội dung file `hostinger_key.pub`

Fix permissions trên Windows:
```powershell
icacls "deploy\hostinger_key" /inheritance:r /grant:r "${env:USERNAME}:F"
```

---

## Bước 6 — Test SSH connection

```powershell
ssh -i deploy\hostinger_key -p 65002 u535843550@5.183.10.135 "echo OK"
```

Phải trả về `OK` không hỏi password.

---

## Bước 7 — Cấu hình trang chủ

1. WP Admin → **Settings → Reading**
2. **Your homepage displays:** chọn **A static page**
3. **Homepage:** chọn trang "Home" (tạo trước nếu chưa có)
4. Save

---

## Thông tin cần lưu vào deploy/.env

```
DEPLOY_HOST=5.183.10.135
DEPLOY_PORT=65002
DEPLOY_USER=u535843550
DEPLOY_REMOTE_PATH=/home/u535843550/domains/[domain]/public_html/wp-content/themes/[ten-theme]
```

---

## Checklist

- [ ] WordPress đã cài xong, vào được WP Admin
- [ ] Elementor đã cài và activate
- [ ] WPCode đã cài và activate
- [ ] Application Password đã tạo và lưu vào manage/.env
- [ ] SSH key đã tạo và thêm vào Hostinger
- [ ] Test SSH: `ssh -i hostinger_key -p 65002 user@host "echo OK"` → trả về OK
- [ ] deploy/.env đã điền đủ thông tin
- [ ] Trang chủ đã set thành static page
