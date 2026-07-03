# Quy trình đưa theme lên Hostinger

Sử dụng hệ thống deploy tự động bằng Python SFTP.

---

## Công cụ deploy

**Script:** `deploy/deploy.py` + `deploy/deploy.bat`  
**Công nghệ:** Python + paramiko SFTP (kết nối 1 lần, upload nhiều file)  
**Package manager:** `uv` — KHÔNG dùng `pip install`

---

## Cách chạy

```batch
# Từ thư mục dự án:
deploy\deploy.bat              ← Xem diff + hỏi xác nhận
deploy\deploy.bat --dry-run    ← Chỉ xem, không upload
deploy\deploy.bat -y           ← Upload ngay không hỏi
deploy\deploy.bat --file path  ← Upload 1 file cụ thể
```

---

## Quy tắc bắt buộc

> **Luôn chạy không có `-y` lần đầu** để xem file nào sẽ thay đổi trước khi xác nhận.

---

## deploy/.env (không commit file này)

```
DEPLOY_HOST=5.183.10.135
DEPLOY_PORT=65002
DEPLOY_USER=u535843550
DEPLOY_REMOTE_PATH=/home/u535843550/domains/[domain]/public_html/wp-content/themes/[ten-theme]
```

---

## Cơ chế hoạt động

1. Đọc `.env` lấy credentials
2. Connect SSH qua Ed25519 key (`deploy/hostinger_key`)
3. Quét tất cả file trong thư mục theme local
4. So sánh MD5 với file trên server
5. Hiển thị danh sách file thay đổi (màu xanh = mới/thay đổi)
6. Hỏi xác nhận → Upload chỉ file đã thay đổi

---

## Thiết lập lần đầu (nếu chưa có deploy.py)

### 1. Tạo cấu trúc thư mục

```powershell
mkdir deploy
```

### 2. Tạo deploy/.env

Điền thông tin từ Hostinger hPanel.

### 3. Tạo SSH key

```powershell
uv run --with cryptography python -c "
from cryptography.hazmat.primitives.asymmetric.ed25519 import Ed25519PrivateKey
from cryptography.hazmat.primitives.serialization import Encoding, PrivateFormat, PublicFormat, NoEncryption
key = Ed25519PrivateKey.generate()
open('deploy/hostinger_key','wb').write(key.private_bytes(Encoding.PEM,PrivateFormat.OpenSSH,NoEncryption()))
pub = key.public_key().public_bytes(Encoding.OpenSSH,PublicFormat.OpenSSH)
open('deploy/hostinger_key.pub','wb').write(pub+b'\n')
print('Public key:',pub.decode())
"
```

```powershell
# Fix permissions
icacls "deploy\hostinger_key" /inheritance:r /grant:r "${env:USERNAME}:F"
```

### 4. Thêm public key vào Hostinger SSH Access

### 5. Test kết nối

```powershell
ssh -i deploy\hostinger_key -p 65002 u535843550@5.183.10.135 "echo Connected OK"
```

---

## Xử lý lỗi thường gặp

| Lỗi | Nguyên nhân | Giải pháp |
|---|---|---|
| `UNPROTECTED PRIVATE KEY FILE` | Permission quá rộng | `icacls hostinger_key /inheritance:r /grant:r "%USERNAME%:F"` |
| `Connection refused` | Port sai | Hostinger dùng port 65002, không phải 22 |
| `Authentication failed` | Key chưa add vào Hostinger | Vào hPanel → SSH Access → thêm public key |
| `No such file or directory` | Remote path sai | Kiểm tra DEPLOY_REMOTE_PATH trong .env |
| `memory allocation failed` | uv chạy background | Chạy foreground (không dùng `&`) |

---

## deploy.py — Các hàm chính

```python
load_env()          # Đọc .env
local_md5(path)     # Hash file local
remote_md5(sftp, p) # Hash file trên server
collect_local()     # Liệt kê file theme local
sftp_makedirs()     # Tạo thư mục remote nếu chưa có
main()              # Điều phối: diff → confirm → upload
```

---

## deploy.ps1

```powershell
$ScriptDir = Split-Path -Parent $MyInvocation.MyCommand.Path
$args_ = $args
uv run --with paramiko (Join-Path $ScriptDir 'deploy.py') @args_
```

---

## Checklist trước khi deploy

- [ ] `deploy/.env` đã điền đúng host, port, user, path
- [ ] `deploy/hostinger_key` tồn tại và permission đúng
- [ ] SSH test thành công: `echo Connected OK`
- [ ] Đã chạy `deploy.bat --dry-run` để xem file thay đổi
- [ ] Xác nhận danh sách file thay đổi hợp lý
