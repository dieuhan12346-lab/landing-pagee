---
name: wp-landing-page
description: End-to-end workflow xây dựng và deploy WordPress landing page + WooCommerce store trên Hostinger. Bao gồm HTML/CSS design → WP theme → SFTP deploy → WPCode snippets → WooCommerce digital products → REST API content management. Stack: Windows + uv + paramiko + LiteSpeed Cache.
---

Bạn là agent chuyên xây dựng landing page + storefront WordPress cho Hostinger. Làm theo đúng workflow và các quy tắc kỹ thuật dưới đây — đây là kiến thức rút ra từ thực tế dự án Luxora, không bỏ qua bất kỳ điểm nào.

## WORKFLOW TỔNG THỂ

```
1. Thu thập thông tin dự án     → hỏi user nếu thiếu
2. Viết nội dung (copy)         → điền vào mẫu sections
3. Chọn hướng thiết kế          → đề xuất 3 hướng, user chọn 1
4. Dựng giao diện HTML/CSS      → từng section, kiểm tra responsive
5. Chuyển sang WP theme         → cấu trúc chuẩn + functions.php
6. Tích hợp WooCommerce         → theme support + template overrides
7. Cài đặt trên Hostinger       → SSH key + deploy.py + manage.py
8. Deploy lên server             → SFTP qua paramiko, xem diff trước
9. Tùy chỉnh qua WPCode         → ob_start pattern, không echo string
10. Quản lý nội dung             → REST API + Application Password
11. Kiểm tra chất lượng          → checklist A-H trước khi done
```

---

## THÔNG TIN CẦN THU THẬP ĐẦU TIÊN

```
- Tên website & domain
- Đối tượng khách hàng
- Màu sắc & phong cách (hoặc để AI đề xuất)
- Sections cần có trên trang chủ
- Có bán hàng qua WooCommerce không?
- Hostinger credentials (host IP, port, username, remote path)
- WordPress URL + admin email (cho Application Password)
```

---

## QUY TẮC KỸ THUẬT BẮT BUỘC

### Package manager
- **Luôn dùng `uv run --with <package>`** — KHÔNG BAO GIỜ dùng `pip install`
- Python environment trên Windows thường là "externally-managed"

### SSH Key trên Windows
- **KHÔNG dùng `ssh-keygen -N ""`** — Windows OpenSSH không chấp nhận empty passphrase
- **Luôn dùng Python cryptography library** để tạo Ed25519 key:

```python
from cryptography.hazmat.primitives.asymmetric.ed25519 import Ed25519PrivateKey
from cryptography.hazmat.primitives.serialization import Encoding, PrivateFormat, PublicFormat, NoEncryption

key = Ed25519PrivateKey.generate()
open('deploy/hostinger_key','wb').write(key.private_bytes(Encoding.PEM,PrivateFormat.OpenSSH,NoEncryption()))
pub = key.public_key().public_bytes(Encoding.OpenSSH,PublicFormat.OpenSSH)
open('deploy/hostinger_key.pub','wb').write(pub+b'\n')
print('Public key:', pub.decode())
```

- Fix permissions sau khi tạo key:
```powershell
icacls "deploy\hostinger_key" /inheritance:r /grant:r "${env:USERNAME}:F"
```

### SSH Connection Hostinger
- Port: **65002** (không phải 22)
- Test: `ssh -i deploy\hostinger_key -p 65002 user@host "echo OK"`

### Deploy (SFTP)
- Dùng `paramiko` qua `uv run --with paramiko deploy/deploy.py`
- **Luôn chạy `--dry-run` trước** để xem diff trước khi upload thật
- Script so sánh MD5 local vs remote, chỉ upload file thay đổi
- `deploy/.env`: `DEPLOY_HOST`, `DEPLOY_PORT`, `DEPLOY_USER`, `DEPLOY_REMOTE_PATH`

### PowerShell encoding
- PowerShell 5.1 đọc file UTF-8 không BOM thành cp1252 → vỡ tiếng Việt
- Giải pháp: thêm `sys.stdout.reconfigure(encoding='utf-8', errors='replace')` vào mọi Python script
- `deploy.ps1` phải viết ASCII-only (không comment tiếng Việt)

---

## WORDPRESS THEME — CẤU TRÚC CHUẨN

```
[ten-theme]/
├── style.css                        ← Theme header bắt buộc
├── functions.php                    ← Enqueue + WC support + helpers
├── woocommerce.php                  ← File rỗng, chỉ để WC nhận diện theme
├── index.php                        ← get_header() + the_content() + get_footer()
├── header.php                       ← <html> + wp_head() + wp_body_open()
├── footer.php                       ← wp_footer() + </body></html>
├── front-page.php                   ← Template trang chủ
├── page-templates/
│   ├── template-about.php
│   ├── template-freetool.php
│   └── template-privacy.php ...
├── woocommerce/
│   ├── archive-product.php          ← Shop page
│   ├── single-product.php           ← Product detail
│   ├── content-product.php          ← Product card in loop
│   ├── loop/add-to-cart.php         ← Add to cart button
│   └── global/
│       ├── wrapper-start.php
│       └── wrapper-end.php
└── assets/
    ├── css/
    │   ├── main.css                 ← Global styles + design tokens
    │   └── woocommerce.css          ← WC overrides (load sau woocommerce-general)
    └── js/
        └── luxora-main.js
```

---

## WOOCOMMERCE INTEGRATION — functions.php

### Theme support khai báo đúng cách
```php
add_theme_support('woocommerce', [
    'thumbnail_image_width'         => 400,
    'single_image_width'            => 600,
    'product_grid' => [
        'default_rows'    => 3,
        'min_rows'        => 1,
        'default_columns' => 3,
        'min_columns'     => 1,
        'max_columns'     => 4,
    ],
]);
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');
```

### Thay content wrappers của WC
```php
// Bắt buộc — WC mặc định dùng <div class="woocommerce"> không khớp layout
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10); // bỏ sidebar

add_action('woocommerce_before_main_content', function() {
    echo '<main id="lx-main" class="lx-main lx-wc-main"><div class="container">';
}, 10);
add_action('woocommerce_after_main_content', function() {
    echo '</div></main>';
}, 10);
```

### Custom text cho digital/downloadable products
```php
// Loop card
add_filter('woocommerce_product_add_to_cart_text', function($text, $product) {
    if ($product->is_downloadable() || $product->is_virtual()) {
        return 'Buy Now';
    }
    return $text;
}, 10, 2);

// Single product page
add_filter('woocommerce_product_single_add_to_cart_text', function($text, $product) {
    if ($product->is_downloadable() || $product->is_virtual()) {
        return 'Buy Now — Instant Access';
    }
    return $text;
}, 10, 2);
```

### Ẩn/tùy chỉnh product tabs
```php
add_filter('woocommerce_product_tabs', function($tabs) {
    if (isset($tabs['description']))         $tabs['description']['title'] = 'About this tool';
    if (isset($tabs['reviews']))             $tabs['reviews']['title'] = 'Reviews';
    if (isset($tabs['additional_information'])) unset($tabs['additional_information']); // ẩn với digital products
    return $tabs;
});
```

### AJAX cart count fragments
```php
add_filter('woocommerce_add_to_cart_fragments', function($fragments) {
    ob_start();
    $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    $class = $count > 0 ? 'cart-count-badge' : 'cart-count-badge hidden';
    echo '<span class="' . esc_attr($class) . '">' . esc_html($count) . '</span>';
    $fragments['.cart-count-badge'] = ob_get_clean();
    return $fragments;
});
```

### Exchange rate USD↔VND (cached)
```php
// Ajax endpoint — cache 1 giờ trong transient
add_action('wp_ajax_luxora_get_rate',        'luxora_ajax_get_rate');
add_action('wp_ajax_nopriv_luxora_get_rate', 'luxora_ajax_get_rate');

function luxora_ajax_get_rate() {
    check_ajax_referer('luxora_nonce', 'nonce');
    $cached = get_transient('luxora_usd_vnd_rate');
    if ($cached) { wp_send_json_success(['rate' => $cached]); return; }

    $response = wp_remote_get('https://open.er-api.com/v6/latest/USD', ['timeout' => 5]);
    $rate = 25500; // fallback
    if (!is_wp_error($response)) {
        $body = json_decode(wp_remote_retrieve_body($response), true);
        if (isset($body['rates']['VND'])) {
            $rate = round($body['rates']['VND']);
            set_transient('luxora_usd_vnd_rate', $rate, HOUR_IN_SECONDS);
        }
    }
    wp_send_json_success(['rate' => $rate]);
}
```

### Pass data sang JS
```php
wp_localize_script('theme-main', 'LuxoraData', [
    'ajaxUrl'     => admin_url('admin-ajax.php'),
    'nonce'       => wp_create_nonce('luxora_nonce'),
    'cartUrl'     => function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/'),
    'checkoutUrl' => function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout/'),
    'shopUrl'     => function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/'),
]);
```

### Enqueue WC CSS override đúng thứ tự
```php
if (class_exists('WooCommerce')) {
    wp_enqueue_style(
        'theme-woocommerce',
        get_template_directory_uri() . '/assets/css/woocommerce.css',
        ['theme-style', 'woocommerce-general'], // load SAU woocommerce-general
        '1.0.0'
    );
}
```

---

## FILE woocommerce.php — QUAN TRỌNG

File này **phải tồn tại** ở theme root để WC nhận diện theme là compatible.
**Không gọi `woocommerce_content()` trong file này** — nếu gọi sẽ bypass archive-product.php và single-product.php.

```php
<?php
// File rỗng. Sự tồn tại của file này báo cho WC biết theme đã WC-compatible.
// WC sẽ tự route đến woocommerce/archive-product.php và woocommerce/single-product.php.
```

---

## TEMPLATE OVERRIDES

### content-product.php (product card trong loop)
- Override `woocommerce/templates/content-product.php`
- Custom meta field `_demo_url` → hiện nút "Try demo" bên cạnh "Buy Now"
- Dùng `luxora_price_html($product)` để hiện cả USD và VND
- Wrap cả card trong `<a class="lx-card-link">` để click vào đâu cũng vào product

### archive-product.php (shop page)
- Override `woocommerce/templates/archive-product.php`
- Hero section với eyebrow + H1 + lead text
- Category filter tabs từ `get_terms('product_cat')`
- Giữ `woocommerce_result_count()` và `woocommerce_catalog_ordering()`

### single-product.php (product detail)
- Override `woocommerce/templates/single-product.php`
- Grid 2 cột: gallery trái, summary phải
- Demo callout banner khi có `_demo_url` meta
- Breadcrumb tự build (không dùng WC breadcrumb mặc định)
- Category pills từ `wc_get_product_terms()`

### Custom meta field: `_demo_url`
Thêm vào WP Admin > Product > Custom Fields:
- Key: `_demo_url`
- Value: URL của live demo (Google Sheets, Notion, app, ...)

---

## WPCODE SNIPPET — QUY TẮC VIẾT PHP

### ĐÚNG — Dùng ob_start():
```php
add_action('wp_footer', function() {
    if (!is_front_page()) return;
    ob_start();
    ?>
    <style>/* CSS an toàn */</style>
    <div id="my-section" style="display:none">
        <script>
        var x = 'single quotes OK trong JS';
        </script>
    </div>
    <?php
    echo ob_get_clean();
}, 99);
```

### SAI — Tránh echo string dài:
```php
// ĐỪNG LÀM — single quotes trong JS sẽ cắt string PHP
echo '<script>var x = "' . "'" . '"</script>';
```

### Cập nhật snippet trong DB
- `wp_update_post()` có thể bị WPCode block → **dùng `$wpdb->update()` trực tiếp**
- Sau khi update DB, xóa cache: `DELETE FROM wp_options WHERE option_name LIKE 'wpcode_snippets%'`
- PHP syntax check trước khi lưu: `php -l snippet.php`

---

## LITESPEED CACHE — PURGE

Sau mọi thay đổi nội dung/snippet/theme, phải purge cache:

```powershell
ssh -i deploy\hostinger_key -p 65002 user@host "wp --path=/home/[user]/domains/[domain]/public_html litespeed-purge purge-all --allow-root 2>&1"
```

**Lưu ý:** Chạy `LiteSpeed\Purge::purge_all()` từ PHP CLI **không hoạt động** — phải dùng wp-cli qua SSH.

---

## WORDPRESS REST API — QUẢN LÝ NỘI DUNG

### manage/.env
```
WP_URL=https://[domain].com
WP_USER=[admin-email]
WP_APP_PASS=[application-password]
```

### Tạo Application Password
WP Admin → Users → Profile → Application Passwords → Add New → Copy ngay

### Dùng manage.bat
```batch
manage\manage.bat check          ← Test kết nối
manage\manage.bat list           ← Liệt kê pages
manage\manage.bat get 15         ← Xem page ID=15
manage\manage.bat search "text"  ← Tìm trang
```

---

## CẤU TRÚC FILE DỰ ÁN

```
[Project]/
├── workspace/
│   └── skills/
│       └── wp-landing-page/
│           └── SKILL.md         ← File này
├── Website-Agent/               ← Tài liệu quy trình
├── deploy/
│   ├── deploy.py                ← SFTP deploy script
│   ├── deploy.ps1
│   ├── deploy.bat
│   ├── .env                     ← KHÔNG commit
│   └── hostinger_key            ← KHÔNG commit
├── manage/
│   ├── manage.py                ← WP REST API
│   ├── manage.bat
│   └── .env                     ← KHÔNG commit
└── [ten-theme]/                 ← WordPress theme
    ├── woocommerce/             ← Template overrides
    └── assets/css/woocommerce.css
```

---

## .gitignore BẮT BUỘC

```
.env
hostinger_key
hostinger_key.pub
__pycache__/
*.pyc
```

---

## LỖI THƯỜNG GẶP & CÁCH XỬ LÝ

| Lỗi | Nguyên nhân | Giải pháp |
|---|---|---|
| `UNPROTECTED PRIVATE KEY` | SSH key permission rộng | `icacls hostinger_key /inheritance:r /grant:r "%USERNAME%:F"` |
| `memory allocation failed` | uv chạy background | Chạy foreground, không dùng `&` hay `run_in_background` |
| `wp_update_post` ERROR | WPCode block update hooks | Dùng `$wpdb->update()` trực tiếp |
| WP critical error | PHP snippet syntax error | Dùng `ob_start()`, kiểm tra `php -l` |
| Cache cũ vẫn hiển thị | LiteSpeed serve cached HTML | `wp litespeed-purge purge-all` qua wp-cli qua SSH |
| `is_front_page()` false | Chạy từ PHP CLI, không phải web | Bình thường — test trên browser thực |
| Tiếng Việt bị lỗi encoding | PowerShell 5.1 đọc UTF-8 sai | `sys.stdout.reconfigure(encoding='utf-8')` vào Python |
| WC không nhận theme | Thiếu file `woocommerce.php` | Tạo file rỗng ở theme root |
| Template override không chạy | Đặt file sai thư mục | Phải đặt trong `[theme]/woocommerce/`, không phải `woocommerce/templates/` |
| `woocommerce_content()` bypass templates | Gọi trong `woocommerce.php` | Để `woocommerce.php` rỗng — WC tự route |
| Cart count không update AJAX | Fragment key sai | Key phải khớp CSS selector: `.cart-count-badge` |
| Exchange rate cũ | Transient chưa expire | Xóa thủ công: `delete_transient('luxora_usd_vnd_rate')` |
