<?php
/**
 * Luxora Theme — functions.php
 * WooCommerce-compatible digital products storefront
 */

defined('ABSPATH') || exit;

/* ================================================================
   1. THEME SETUP
   ================================================================ */
function luxora_setup() {
    load_theme_textdomain('luxora', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('html5', [
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ]);

    // Custom logo
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // WooCommerce
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

    // Navigation menus
    register_nav_menus([
        'primary' => esc_html__('Primary Menu', 'luxora'),
        'footer'  => esc_html__('Footer Menu', 'luxora'),
        'account' => esc_html__('Account Menu', 'luxora'),
    ]);

    // Image sizes
    add_image_size('luxora-card', 600, 338, true);   // 16:9 product card
    add_image_size('luxora-hero', 1200, 600, false); // hero banner
}
add_action('after_setup_theme', 'luxora_setup');

/* ================================================================
   2. ENQUEUE SCRIPTS & STYLES
   ================================================================ */
function luxora_scripts() {
    $ver = '1.0.0';
    $uri = get_template_directory_uri();

    // Google Fonts
    wp_enqueue_style(
        'luxora-fonts',
        'https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap',
        [], null
    );

    // Main theme stylesheet (style.css)
    wp_enqueue_style('luxora-style', get_stylesheet_uri(), ['luxora-fonts'], $ver);

    // WooCommerce CSS overrides (only when WC active)
    if (class_exists('WooCommerce')) {
        wp_enqueue_style(
            'luxora-woocommerce',
            $uri . '/assets/css/woocommerce.css',
            ['luxora-style', 'woocommerce-general'],
            $ver
        );
    }

    // Main JS
    wp_enqueue_script(
        'luxora-main',
        $uri . '/assets/js/luxora-main.js',
        [], $ver, true
    );

    // Pass PHP data to JS
    wp_localize_script('luxora-main', 'LuxoraData', [
        'ajaxUrl'    => admin_url('admin-ajax.php'),
        'nonce'      => wp_create_nonce('luxora_nonce'),
        'cartUrl'    => function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/'),
        'checkoutUrl'=> function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout/'),
        'shopUrl'    => function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/'),
        'locale'     => get_locale(),
        'isRtl'      => is_rtl(),
    ]);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'luxora_scripts');

/* ================================================================
   3. WOOCOMMERCE INTEGRATION
   ================================================================ */

// Replace WC's default content wrappers with ours
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10);

// Remove sidebar from WC pages (digital store needs no filters sidebar)
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action('woocommerce_before_main_content', 'luxora_wc_wrapper_start', 10);
add_action('woocommerce_after_main_content',  'luxora_wc_wrapper_end',   10);

function luxora_wc_wrapper_start() {
    echo '<main id="lx-main" class="lx-main lx-wc-main"><div class="container">';
}
function luxora_wc_wrapper_end() {
    echo '</div></main>';
}

// Change "Add to Cart" text for digital/downloadable products
add_filter('woocommerce_product_add_to_cart_text', function ( $text, $product ) {
    if ( $product->is_downloadable() || $product->is_virtual() ) {
        return esc_html__('Buy Now', 'luxora');
    }
    return $text;
}, 10, 2);

add_filter('woocommerce_product_single_add_to_cart_text', function ( $text, $product ) {
    if ( $product->is_downloadable() || $product->is_virtual() ) {
        return esc_html__('Buy Now — Instant Access', 'luxora');
    }
    return $text;
}, 10, 2);

// Change shop page columns
add_filter('loop_shop_columns', function () { return 3; });
add_filter('loop_shop_per_page', function () { return 12; });

// Remove breadcrumb on shop (we add our own)
// add_filter('woocommerce_show_page_title', '__return_true');
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// Remove WC page title (we control it in our template)
add_filter('woocommerce_show_page_title', '__return_false');

// Breadcrumb delimiter
add_filter('woocommerce_breadcrumb_defaults', function ( $defaults ) {
    $defaults['delimiter'] = '&nbsp;/&nbsp;';
    return $defaults;
});

// Product tab titles
add_filter('woocommerce_product_tabs', function ( $tabs ) {
    if ( isset($tabs['description']) ) {
        $tabs['description']['title'] = esc_html__('About this tool', 'luxora');
    }
    if ( isset($tabs['reviews']) ) {
        $tabs['reviews']['title'] = esc_html__('Reviews', 'luxora');
    }
    if ( isset($tabs['additional_information']) ) {
        unset($tabs['additional_information']); // hide for digital products
    }
    return $tabs;
});

// Cart fragments for AJAX cart count update
add_filter('woocommerce_add_to_cart_fragments', function ( $fragments ) {
    ob_start();
    luxora_cart_count_html();
    $fragments['.cart-count-badge'] = ob_get_clean();
    return $fragments;
});

function luxora_cart_count_html() {
    $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    $class = $count > 0 ? 'cart-count-badge' : 'cart-count-badge hidden';
    echo '<span class="' . esc_attr($class) . '">' . esc_html($count) . '</span>';
}

/* ================================================================
   4. NAVIGATION HELPERS
   ================================================================ */

function luxora_fallback_menu() {
    echo '<ul>';
    if ( class_exists('WooCommerce') ) {
        echo '<li><a href="' . esc_url( get_permalink(wc_get_page_id('shop')) ) . '">' . esc_html__('Products', 'luxora') . '</a></li>';
    }
    echo '<li><a href="' . esc_url( home_url('/free-tool/') ) . '">' . esc_html__('Free Tool', 'luxora') . '</a></li>';
    echo '<li><a href="' . esc_url( home_url('/#how-it-works') ) . '">' . esc_html__('How It Works', 'luxora') . '</a></li>';
    echo '<li><a href="' . esc_url( home_url('/contact/') ) . '">' . esc_html__('Contact', 'luxora') . '</a></li>';
    echo '</ul>';
}

/* ================================================================
   5. CUSTOM LOGO HELPER
   ================================================================ */
function luxora_logo() {
    if ( has_custom_logo() ) {
        the_custom_logo();
    } else {
        $name = get_bloginfo('name');
        echo '<a href="' . esc_url(home_url('/')) . '" class="site-branding" rel="home">';
        echo '<span class="brand-name">' . esc_html($name) . '</span>';
        echo '</a>';
    }
}

/* ================================================================
   6. HELPER: FEATURED PRODUCTS QUERY
   ================================================================ */
function luxora_get_featured_products( $limit = 3 ) {
    if ( ! class_exists('WooCommerce') ) return null;

    return wc_get_products([
        'status'   => 'publish',
        'limit'    => $limit,
        'featured' => true,
        'orderby'  => 'date',
        'order'    => 'DESC',
    ]);
}

/* ================================================================
   7. HELPER: PRODUCT PRICE HTML (bilingual / dual-currency)
   ================================================================ */
function luxora_price_html( $product ) {
    if ( ! $product instanceof WC_Product ) return;
    $usd = (float) $product->get_price();
    $vnd = round($usd * 25500 / 1000) * 1000; // fallback rate; JS updates live
    ?>
    <div class="lx-card-price-main price-usd">
        <?php echo wp_kses_post( $product->get_price_html() ); ?>
    </div>
    <div class="lx-card-price-main price-vnd">
        <?php echo esc_html( number_format($vnd, 0, ',', '.') ) . ' ₫'; ?>
    </div>
    <div class="lx-card-price-sub"><?php esc_html_e('one-time', 'luxora'); ?></div>
    <?php
}

/* ================================================================
   8. WIDGET AREAS
   ================================================================ */
function luxora_widgets_init() {
    register_sidebar([
        'name'          => esc_html__('Footer Widget Area', 'luxora'),
        'id'            => 'footer-widget',
        'description'   => esc_html__('Widgets in this area appear in the footer.', 'luxora'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'luxora_widgets_init');

/* ================================================================
   9. BODY CLASSES
   ================================================================ */
add_filter('body_class', function ( $classes ) {
    if ( is_front_page() )   $classes[] = 'lx-home';
    if ( is_shop() )         $classes[] = 'lx-shop';
    if ( is_product() )      $classes[] = 'lx-product-single';
    if ( is_cart() )         $classes[] = 'lx-cart';
    if ( is_checkout() )     $classes[] = 'lx-checkout';
    if ( is_account_page() ) $classes[] = 'lx-account';
    return $classes;
});

/* ================================================================
   10. AJAX: UPDATE EXCHANGE RATE (optional server-side cache)
   ================================================================ */
add_action('wp_ajax_luxora_get_rate',        'luxora_ajax_get_rate');
add_action('wp_ajax_nopriv_luxora_get_rate', 'luxora_ajax_get_rate');

function luxora_ajax_get_rate() {
    check_ajax_referer('luxora_nonce', 'nonce');

    $cached = get_transient('luxora_usd_vnd_rate');
    if ( $cached ) {
        wp_send_json_success(['rate' => $cached]);
    }

    $response = wp_remote_get('https://open.er-api.com/v6/latest/USD', ['timeout' => 5]);
    $rate     = 25500; // fallback

    if ( ! is_wp_error($response) ) {
        $body = json_decode(wp_remote_retrieve_body($response), true);
        if ( isset($body['rates']['VND']) ) {
            $rate = round($body['rates']['VND']);
            set_transient('luxora_usd_vnd_rate', $rate, HOUR_IN_SECONDS);
        }
    }

    wp_send_json_success(['rate' => $rate]);
}
