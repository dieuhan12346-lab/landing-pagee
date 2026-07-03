# Hướng dẫn tổng — Website Agent

Bộ tài liệu này giúp Claude Code tự động hóa toàn bộ quy trình xây dựng và vận hành website từ ý tưởng đến production.

---

## Sơ đồ quy trình

```
1. Xác định nội dung
   └─ Mẫu nội dung.md

2. Chọn hướng thiết kế
   └─ Quy trình chọn hướng thiết kế.md

3. Dựng giao diện HTML/CSS
   └─ Quy trình dựng giao diện.md

4. Chuyển sang WordPress theme
   └─ Quy trình chuyển sang WordPress theme.md

5. Cài WordPress trên Hostinger
   └─ Quy trình cài WordPress trên Hostinger.md

6. Đưa theme lên Hostinger
   └─ Quy trình đưa lên Hostinger.md

7. Quản lý nội dung
   └─ Quy trình quản lý nội dung WordPress.md

8. Kiểm tra chất lượng
   └─ Checklist kiểm tra chất lượng.md
```

---

## Cách dùng với Claude Code

### Bắt đầu dự án mới
Nói với Claude Code:
> "Tạo website mới theo mẫu trong Website-Agent/01-mau-tao-website-moi.md"

### Thực hiện từng bước
Mỗi file quy trình là một prompt đầy đủ — đưa thẳng cho Claude Code.  
Ví dụ: "Làm theo Quy trình dựng giao diện cho website [tên]"

### Nguyên tắc an toàn
- **Luôn xem trước** file thay đổi trước khi đẩy lên server
- **Không bao giờ** commit file `.env` hoặc `hostinger_key`
- **Backup DB** trước khi thay đổi nội dung WordPress

---

## Cấu trúc thư mục dự án chuẩn

```
[Tên dự án]/
├── Website-Agent/          ← Tài liệu quy trình (file này)
├── deploy/
│   ├── deploy.py           ← Script SFTP tự động
│   ├── deploy.ps1
│   ├── deploy.bat
│   ├── .env                ← Credentials (không commit)
│   └── hostinger_key       ← SSH key (không commit)
├── manage/
│   ├── manage.py           ← WordPress REST API
│   ├── manage.bat
│   └── .env                ← WP credentials (không commit)
└── [theme-name]/           ← WordPress theme files
    ├── style.css
    ├── functions.php
    ├── index.php
    └── ...
```

---

## Công nghệ sử dụng

| Công việc | Công nghệ |
|---|---|
| Deploy theme | Python + paramiko SFTP |
| Package manager | uv (không dùng pip) |
| SSH Key | Ed25519 (Python cryptography) |
| WP Content API | WordPress REST API + Application Password |
| Cache | LiteSpeed Cache (Hostinger) |
| Page builder | Elementor |
| Code snippet | WPCode plugin |
