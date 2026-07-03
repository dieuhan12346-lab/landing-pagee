# Quy trình quản lý nội dung WordPress

Dùng WordPress REST API qua script Python — không cần vào WP Admin.

---

## Công cụ

**Script:** `manage/manage.py` + `manage/manage.bat`  
**Auth:** WordPress Application Password (Basic HTTP, base64)  
**Thư viện:** Python stdlib `urllib` — không cần package ngoài

---

## Cách chạy

```batch
manage\manage.bat check                    ← Kiểm tra kết nối API
manage\manage.bat list                     ← Liệt kê trang/bài viết
manage\manage.bat get 15                   ← Xem nội dung trang ID=15
manage\manage.bat search "từ khóa"         ← Tìm trang theo từ khóa
manage\manage.bat draft "Tiêu đề mới"      ← Tạo bài nháp
manage\manage.bat update 15                ← Cập nhật trang ID=15
```

---

## manage/.env (không commit)

```
WP_URL=https://[domain].com
WP_USER=[admin-email]
WP_APP_PASS=[application-password]
```

---

## Tạo Application Password

1. WP Admin → **Users** → **Profile**
2. Cuộn xuống **Application Passwords**
3. Nhập tên: `claude-code-api` → **Add New**
4. Copy password (dạng `xxxx xxxx xxxx xxxx xxxx xxxx`)
5. Lưu vào `manage/.env`

---

## Quy tắc bắt buộc

> **Luôn dùng `manage.bat get [id]` để xem nội dung hiện tại** trước khi update.  
> **Không thay đổi nội dung trên WordPress** mà không xem trước.

---

## Các loại nội dung có thể quản lý

| Loại | Endpoint REST API | Ghi chú |
|---|---|---|
| Trang | `/wp/v2/pages` | Trang chủ, About, Contact... |
| Bài viết | `/wp/v2/posts` | Blog posts |
| Sản phẩm WooCommerce | `/wc/v3/products` | Cần WooCommerce plugin |
| WPCode snippet | `/wp/v2/wpcode` | Code snippets (nếu plugin cho phép) |
| Media | `/wp/v2/media` | Hình ảnh, file |

---

## Thay đổi nội dung section bằng WPCode

Với các section dựng bằng HTML custom (qua WPCode plugin):

### Xem snippet hiện tại
```bash
# Qua DB trực tiếp
php /tmp/check_snippet.php
```

### Cập nhật snippet

**Cách an toàn nhất:** Dùng script Python + MySQL trực tiếp (không qua WP PHP)

```python
# Kết nối MySQL
import paramiko
# 1. Upload script PHP lên /tmp/
# 2. Chạy qua SSH: php /tmp/update.php
# 3. Verify kết quả
# 4. Clear WPCode cache: DELETE FROM wp_options WHERE option_name LIKE 'wpcode_snippets%'
```

**Lưu ý quan trọng khi viết PHP snippet:**
- Dùng `ob_start()` + `?>...HTML...<?php echo ob_get_clean();` thay vì `echo '...'`
- Tránh dùng HEREDOC/NOWDOC lồng nhau
- Test PHP syntax trước: `php -l snippet.php`

---

## Purge cache sau khi thay đổi

```powershell
# Dùng WP-CLI (Hostinger hỗ trợ)
ssh -i deploy\hostinger_key -p 65002 u535843550@5.183.10.135 `
  "wp --path=/home/u535843550/domains/[domain]/public_html litespeed-purge purge-all --allow-root"
```

---

## Kiểm tra trang sau khi thay đổi

```powershell
# Fetch trang và kiểm tra nội dung
$page = Invoke-WebRequest -Uri "https://[domain].com/" -UseBasicParsing
Write-Host "Page size: $($page.Content.Length)"
Write-Host "Section found: $($page.Content -match '[text đặc trưng trong section]')"
```

---

## Xử lý lỗi thường gặp

| Lỗi | Nguyên nhân | Giải pháp |
|---|---|---|
| `401 Unauthorized` | App Password sai | Tạo lại Application Password |
| `403 Forbidden` | User không có quyền | Dùng account Administrator |
| WP critical error | PHP snippet syntax error | Dùng `ob_start()` thay vì `echo '...'`; kiểm tra PHP syntax |
| Cache cũ vẫn hiện | LiteSpeed cache | Chạy `wp litespeed-purge purge-all` |
| `wp_update_post` trả về ERROR | WPCode block update | Dùng `$wpdb->update()` trực tiếp |
