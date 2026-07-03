# Quy trình chuyển sang WordPress theme

Chuyển từ HTML/CSS tĩnh sang WordPress theme để dùng với Elementor.

---

## Cấu trúc theme tối thiểu

```
[ten-theme]/
├── style.css          ← Bắt buộc: theme header
├── functions.php      ← Enqueue CSS/JS, theme support
├── index.php          ← Template mặc định
├── header.php         ← <head> + nav
├── footer.php         ← Footer + wp_footer()
├── front-page.php     ← Trang chủ (nếu dùng static front page)
├── page.php           ← Template trang thông thường
├── single.php         ← Template bài viết
├── 404.php            ← Trang lỗi
└── assets/
    ├── css/
    │   └── main.css
    └── js/
        └── main.js
```

---

## Bước 1 — Tạo style.css với theme header

```css
/*
Theme Name:   [Tên theme]
Theme URI:    https://[domain].com
Description:  Custom theme for [tên website]
Version:      1.0.0
Author:       [Tên]
Text Domain:  [ten-theme]
*/
```

---

## Bước 2 — functions.php chuẩn

```php
<?php
function theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','gallery','caption']);
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'theme_setup');

function theme_assets() {
    $ver = '1.0.0';
    wp_enqueue_style('theme-main', get_template_directory_uri() . '/assets/css/main.css', [], $ver);
    wp_enqueue_script('theme-main', get_template_directory_uri() . '/assets/js/main.js', [], $ver, true);
}
add_action('wp_enqueue_scripts', 'theme_assets');
```

---

## Bước 3 — header.php chuẩn

```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
```

---

## Bước 4 — footer.php chuẩn

```php
<?php wp_footer(); ?>
</body>
</html>
```

---

## Bước 5 — index.php / front-page.php chuẩn

```php
<?php get_header(); ?>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>
<?php get_footer(); ?>
```

---

## Bước 6 — Chuyển CSS từ HTML sang theme

1. Lấy toàn bộ CSS từ `<style>` trong HTML
2. Bỏ vào `assets/css/main.css`
3. Thay đường dẫn ảnh: `url('../images/...')` → `url('<?php echo get_template_directory_uri(); ?>/assets/images/...')`

**Lưu ý với Elementor:**
- Không cần đặt layout trang trong PHP template
- Elementor tự render nội dung qua `the_content()`
- CSS custom đặt trong `assets/css/main.css` hoặc dùng WPCode snippet

---

## Bước 7 — Kiểm tra sau khi tạo theme

```bash
# Cấu trúc file tối thiểu
ls [ten-theme]/
# Phải có: style.css, functions.php, index.php

# Kiểm tra PHP syntax
php -l functions.php
php -l index.php
php -l header.php
php -l footer.php
```

---

## Bước 8 — Dùng WPCode thay vì sửa template

Với các section phức tạp (Why us, Testimonials...) được dựng bằng HTML/JS thuần:
- Tạo snippet trong **WPCode plugin** (loại PHP)
- Hook vào `wp_footer` với priority 99
- Dùng JS để thay thế section Elementor bằng HTML custom

Xem ví dụ trong dự án Luxora: WPCode snippet #126.

---

## Checklist

- [ ] style.css có đủ theme header
- [ ] functions.php enqueue CSS và JS
- [ ] header.php có `wp_head()` và `wp_body_open()`
- [ ] footer.php có `wp_footer()`
- [ ] index.php gọi `get_header()` và `get_footer()`
- [ ] Không có đường dẫn hardcode `C:\` hay `file:///`
- [ ] PHP syntax hợp lệ (không lỗi)
