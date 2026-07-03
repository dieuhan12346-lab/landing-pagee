# Checklist kiểm tra chất lượng

Thực hiện trước khi coi website là "done" hoặc trước mỗi lần deploy lớn.

---

## A. Giao diện & Thiết kế

### Desktop (≥1280px)
- [ ] Layout không bị vỡ, các element đúng vị trí
- [ ] Màu sắc đúng với design token
- [ ] Font load đúng (không fallback sang Arial/serif)
- [ ] Spacing nhất quán giữa các section
- [ ] Không có text bị cắt hoặc overflow
- [ ] Ảnh không bị méo, có alt text

### Mobile (375px — iPhone SE)
- [ ] Navigation hoạt động (hamburger menu nếu có)
- [ ] Text đọc được, không quá nhỏ (min 14px)
- [ ] Button đủ lớn để tap (min 44×44px)
- [ ] Không có scroll ngang
- [ ] Hero section hiển thị đúng
- [ ] Form fields đủ rộng để nhập

### Tablet (768px)
- [ ] Grid chuyển đổi mượt giữa mobile và desktop
- [ ] Không có layout bị kẹt ở giữa

---

## B. Kỹ thuật WordPress

### Theme
- [ ] `wp_head()` có trong `<head>`
- [ ] `wp_footer()` có trước `</body>`
- [ ] `wp_body_open()` có sau `<body>`
- [ ] CSS/JS được enqueue qua `wp_enqueue_scripts`, không hardcode trong template
- [ ] Không có PHP error (kiểm tra WP Admin → Tools → Site Health)

### Elementor
- [ ] Trang chủ (ID 15) render đúng trong Elementor
- [ ] Không có JS conflict với Elementor
- [ ] Elementor sections load đúng thứ tự

### WPCode Snippets
- [ ] Snippet PHP dùng `ob_start()` (không dùng `echo '...'` với HTML có quotes)
- [ ] Snippet không có PHP syntax error
- [ ] Snippet chỉ chạy trên đúng trang (kiểm tra conditional: `is_front_page()`)

---

## C. Hiệu năng

- [ ] Google PageSpeed score ≥ 70 (mobile), ≥ 85 (desktop)
  Kiểm tra: https://pagespeed.web.dev/
- [ ] Ảnh đã nén (WebP ưu tiên, max ~200KB mỗi ảnh)
- [ ] CSS/JS minified (LiteSpeed Cache tự làm)
- [ ] LiteSpeed Cache đang active
- [ ] Không load font thừa (max 2 font families)
- [ ] Không có request HTTP (mixed content) trên HTTPS

---

## D. Nội dung

- [ ] Không có text placeholder "Lorem ipsum"
- [ ] Không có link hỏng (broken links)
- [ ] Tên sản phẩm, giá cả đúng và nhất quán
- [ ] Email liên hệ/footer là email thật
- [ ] Copyright năm đúng
- [ ] Không có typo trong headline và CTA

---

## E. SEO cơ bản

- [ ] Mỗi trang có `<title>` unique, ≤60 ký tự
- [ ] Meta description ≤160 ký tự
- [ ] H1 chỉ có 1 cái mỗi trang
- [ ] Ảnh có `alt` text mô tả
- [ ] URL thân thiện (không có `?p=123`)
- [ ] `robots.txt` không block indexing (kiểm tra WP Settings → Reading)

---

## F. Bảo mật

- [ ] Không có file `.env` trong web root
- [ ] Không có `hostinger_key` trong web root
- [ ] WP Admin URL đã đổi (nếu dùng plugin)
- [ ] WordPress version mới nhất
- [ ] Plugin không có vulnerability đã biết
- [ ] SSL certificate hợp lệ (HTTPS hoạt động)

---

## G. Deploy

- [ ] `deploy/.env` không bị commit vào git
- [ ] `deploy/hostinger_key` không bị commit vào git
- [ ] `.gitignore` đã có `.env` và `hostinger_key`
- [ ] Đã chạy `deploy.bat --dry-run` xem trước file thay đổi
- [ ] Sau khi deploy, kiểm tra trang live bằng browser thật

---

## H. Kiểm tra nhanh sau deploy

```powershell
# Chạy 3 lệnh này sau mỗi deploy
$url = "https://[domain].com"
$page = Invoke-WebRequest -Uri $url -UseBasicParsing -TimeoutSec 15
Write-Host "Status: $($page.StatusCode)"          # Phải là 200
Write-Host "Size: $($page.Content.Length) bytes"  # Không được = 0
Write-Host "Has wp-content: $($page.Content -match 'wp-content')"  # Phải True
Write-Host "No WP error: $(-not ($page.Content -match 'critical error|wp-die'))"  # Phải True
```

---

## Thứ tự kiểm tra đề xuất

```
1. Mở trang chủ → xem mắt thường (desktop + mobile)
2. Chạy PageSpeed Insights
3. Mở DevTools → Console → không có lỗi JS đỏ
4. Kiểm tra WP Admin → Site Health → không có critical issue
5. Test link chính: Home → Product → Contact
6. Test tính năng quan trọng (form, cart, search...)
7. Chạy lệnh PowerShell kiểm tra nhanh ở trên
```
