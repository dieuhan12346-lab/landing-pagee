# Quy trình chọn hướng thiết kế

Thực hiện bước này TRƯỚC khi viết bất kỳ HTML/CSS nào.

---

## Bước 1 — Thu thập thông tin

Đọc lại file `02-mau-noi-dung.md` và `01-mau-tao-website-moi.md` để nắm:
- Đối tượng khách hàng là ai
- Cảm xúc muốn truyền đạt (tin tưởng / hứng khởi / chuyên nghiệp...)
- Màu sắc & phong cách đã chọn sơ bộ

---

## Bước 2 — Yêu cầu Claude Code đề xuất 3 hướng

Nói với Claude Code:
> "Đề xuất 3 hướng thiết kế cho website [tên]. Mỗi hướng cần có:
> - Tên hướng & mô tả cảm xúc
> - Bảng màu (primary / secondary / background / text / accent)
> - Font chữ (heading / body)
> - Yếu tố đặc trưng (đặc điểm nhận dạng visual)
> - Ví dụ website tham khảo"

---

## Bước 3 — Đánh giá & chọn hướng

Dùng bảng so sánh này:

| Tiêu chí | Hướng A | Hướng B | Hướng C |
|---|---|---|---|
| Phù hợp đối tượng? | | | |
| Khác biệt so với đối thủ? | | | |
| Dễ đọc / dễ dùng? | | | |
| Dễ triển khai kỹ thuật? | | | |
| Cảm xúc phù hợp? | | | |

**Chọn hướng:** ___

---

## Bước 4 — Tạo Design Token

Sau khi chọn hướng, yêu cầu Claude Code tạo CSS variables:

```css
:root {
  /* Colors */
  --color-primary:     ;
  --color-secondary:   ;
  --color-accent:      ;
  --color-bg:          ;
  --color-bg-soft:     ;
  --color-text:        ;
  --color-text-muted:  ;
  --color-border:      ;

  /* Typography */
  --font-heading:      ;
  --font-body:         ;

  /* Spacing */
  --section-pad:       64px 18px;
  --container-max:     1120px;
  --card-radius:       16px;
  --border-radius:     8px;

  /* Shadows */
  --shadow-card:       0 2px 12px rgba(0,0,0,.07);
}
```

---

## Bước 5 — Tạo Style Guide nhanh (tùy chọn)

Yêu cầu Claude Code tạo 1 HTML file `style-guide.html` hiển thị:
- Màu sắc (swatches)
- Typography (H1 → H4, body, small)
- Buttons (primary, secondary, ghost)
- Cards
- Form inputs

Xem trong browser trước khi dựng trang.

---

## Checklist hoàn thành

- [ ] Đã chọn 1 trong 3 hướng thiết kế
- [ ] Có CSS variables đầy đủ
- [ ] Font đã load từ Google Fonts hoặc Bunny Fonts
- [ ] Đã xem style guide trong browser (nếu có)
- [ ] Màu sắc đạt contrast ratio WCAG AA (4.5:1 cho text)
