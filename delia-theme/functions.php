<?php
defined('ABSPATH') || exit;

/* ── Theme Setup ───────────────────────────────────────────── */
function delia_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', ['height' => 60, 'width' => 200, 'flex-height' => true, 'flex-width' => true]);
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption']);
    add_theme_support('woocommerce', [
        'thumbnail_image_width' => 600,
        'single_image_width'    => 900,
        'product_grid'          => ['default_columns' => 3, 'default_rows' => 4],
    ]);
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    register_nav_menus([
        'primary' => 'Menu Chính',
        'footer'  => 'Menu Footer',
    ]);
}
add_action('after_setup_theme', 'delia_setup');

/* ── Assets ────────────────────────────────────────────────── */
function delia_assets() {
    $v   = '2.2.0';
    $uri = get_template_directory_uri();

    wp_enqueue_style('delia-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Nunito:wght@300;400;500;600;700&display=swap',
        [], null);
    wp_enqueue_style('delia-main', $uri . '/assets/css/main.css', ['delia-fonts'], $v);

    if (class_exists('WooCommerce')) {
        wp_enqueue_style('delia-woo', $uri . '/assets/css/woocommerce.css', ['woocommerce-general', 'delia-main'], $v);
        wp_add_inline_style('delia-woo', '
            h1.product_title.entry-title,
            .woocommerce div.product h1.product_title,
            .single-product h1.product_title { color: #4A1500 !important; }
        ');
    }
    wp_enqueue_script('delia-main', $uri . '/assets/js/main.js', [], $v, true);

    wp_localize_script('delia-main', 'DeliaSite', [
        'homeUrl'    => home_url('/'),
        'shopUrl'    => class_exists('WooCommerce') ? wc_get_page_permalink('shop') : home_url('/shop/'),
        'cartUrl'    => class_exists('WooCommerce') ? wc_get_cart_url() : home_url('/cart/'),
        'ajaxUrl'    => admin_url('admin-ajax.php'),
        'nonce'      => wp_create_nonce('delia_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'delia_assets');

/* ── Nav Cart Icon ─────────────────────────────────────────── */
function delia_cart_icon() {
    if (!class_exists('WooCommerce')) return;
    $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    echo '<a href="' . esc_url(wc_get_cart_url()) . '" class="nav-cart" aria-label="Giỏ hàng">';
    echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>';
    if ($count > 0) echo '<span class="cart-count">' . esc_html($count) . '</span>';
    echo '</a>';
}

/* ── WooCommerce ───────────────────────────────────────────── */
add_action('init', function() {
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10);
});

add_action('woocommerce_before_main_content', function() {
    echo '<main class="delia-wc-main"><div class="container">';
}, 10);
add_action('woocommerce_after_main_content', function() {
    echo '</div></main>';
}, 10);

add_filter('loop_shop_columns', fn() => 3);
add_filter('loop_shop_per_page', fn() => 12);
add_filter('woocommerce_show_page_title', '__return_false');

// Add to cart text for digital products
add_filter('woocommerce_product_add_to_cart_text', function($text, $product) {
    return ($product->is_downloadable() || $product->is_virtual()) ? 'Mua Ngay' : $text;
}, 10, 2);
add_filter('woocommerce_product_single_add_to_cart_text', function($text, $product) {
    return ($product->is_downloadable() || $product->is_virtual()) ? 'Mua Ngay — Nhận Ngay' : $text;
}, 10, 2);

// AJAX cart fragment
add_filter('woocommerce_add_to_cart_fragments', function($fragments) {
    ob_start();
    $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    $class = $count > 0 ? 'cart-count' : 'cart-count hidden';
    echo '<span class="' . esc_attr($class) . '">' . esc_html($count) . '</span>';
    $fragments['.cart-count'] = ob_get_clean();
    return $fragments;
});

/* ── Contact Form Handler ──────────────────────────────────── */
add_action('wp_ajax_delia_contact',        'delia_handle_contact');
add_action('wp_ajax_nopriv_delia_contact', 'delia_handle_contact');

function delia_handle_contact() {
    check_ajax_referer('delia_nonce', 'nonce');
    $name    = sanitize_text_field($_POST['name']    ?? '');
    $phone   = sanitize_text_field($_POST['phone']   ?? '');
    $email   = sanitize_email($_POST['email']        ?? '');
    $product = sanitize_text_field($_POST['product'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    $to      = get_option('admin_email');
    $subject = 'Đặt hàng Delia từ ' . $name;
    $body    = "Tên: $name\nĐiện thoại: $phone\nEmail: $email\nSản phẩm: $product\nGhi chú: $message";
    wp_mail($to, $subject, $body);
    wp_send_json_success(['message' => 'Đã gửi! Chúng tôi sẽ liên hệ sớm.']);
}

/* ── Hide flat rate when free shipping is available ────────── */
add_filter('woocommerce_package_rates', function($rates, $package) {
    $free = [];
    foreach ($rates as $key => $rate) {
        if ($rate->method_id === 'free_shipping') {
            $free[$key] = $rate;
        }
    }
    return $free ?: $rates;
}, 10, 2);

/* ── Body Classes ──────────────────────────────────────────── */
add_filter('body_class', function($classes) {
    if (is_front_page()) $classes[] = 'delia-home';
    if (class_exists('WooCommerce')) {
        if (is_shop())         $classes[] = 'delia-shop';
        if (is_product())      $classes[] = 'delia-product';
        if (is_cart())         $classes[] = 'delia-cart';
        if (is_checkout())     $classes[] = 'delia-checkout';
        if (is_account_page()) $classes[] = 'delia-account';
    }
    return $classes;
});
