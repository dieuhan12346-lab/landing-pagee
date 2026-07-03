# Quy trình dựng giao diện

Thực hiện sau khi đã có design token từ bước 03.

---

## Bước 1 — Chuẩn bị

Đảm bảo có sẵn:
- [ ] CSS variables từ file `03-quy-trinh-chon-huong-thiet-ke.md`
- [ ] Nội dung từ file `02-mau-noi-dung.md`
- [ ] Font đã chọn (Google Fonts link)

---

## Bước 2 — Dựng từng section theo thứ tự

Yêu cầu Claude Code dựng từng section một, **không dựng hết cùng lúc**:

```
1. Layout cơ bản + CSS reset + variables
2. Header / Navigation
3. Hero section
4. Section 1 (Why us / Features)
5. Section 2 (How it works)
6. Section 3 (Testimonials / Social proof)
7. CTA section
8. Footer
9. Responsive (mobile breakpoints)
10. Micro-interactions & hover states
```

---

## Bước 3 — Quy tắc viết code

### HTML
- Dùng semantic tags: `<section>`, `<article>`, `<nav>`, `<main>`, `<footer>`
- Mỗi section có class theo pattern: `.section-[tên]`
- Container chuẩn: `<div class="container">` với `max-width: var(--container-max)`

### CSS
- **Dùng CSS variables** cho mọi màu sắc, spacing, font
- **Mobile-first**: viết CSS cho mobile trước, thêm `@media (min-width: Xpx)` cho desktop
- **Không dùng** `!important` trừ khi bắt buộc override WordPress/Elementor
- Grid layout: dùng CSS Grid cho layout chính, Flexbox cho alignment

### JavaScript
- Viết vanilla JS, không cần jQuery
- Dùng `DOMContentLoaded` hoặc check `document.readyState`
- Đặt script cuối `<body>` hoặc dùng `defer`

---

## Bước 4 — Kiểm tra trong browser

Sau mỗi section, mở file HTML trong browser và kiểm tra:

```
Desktop (1440px):
[ ] Layout đúng không bị vỡ
[ ] Màu sắc đúng với design token
[ ] Font load đúng

Mobile (375px):
[ ] Text không bị tràn
[ ] Button đủ lớn để tap (min 44px)
[ ] Spacing hợp lý

Tablet (768px):
[ ] Transition layout mượt
[ ] Grid điều chỉnh đúng
```

---

## Bước 5 — Tối ưu trước khi chuyển sang WordPress

- [ ] Tất cả ảnh dùng đường dẫn tương đối hoặc placeholder
- [ ] Không có đường dẫn tuyệt đối `C:\...` hoặc `file:///`
- [ ] CSS không có `@import url(file://...)` 
- [ ] JavaScript không có `console.log()` thừa
- [ ] Kiểm tra HTML validator (https://validator.w3.org)

---

## Lệnh mẫu cho Claude Code

```
"Dựng Hero section cho website [tên] với:
- Nội dung: [copy từ 02-mau-noi-dung.md]
- Màu sắc: [CSS variables]
- Font: [tên font]
- Style: [mô tả phong cách]
Sau khi dựng xong, kiểm tra responsive mobile 375px."
```
