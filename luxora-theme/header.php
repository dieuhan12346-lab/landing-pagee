<!DOCTYPE html>
<html <?php language_attributes(); ?> data-lang="en" data-currency="usd">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ================================================================
     SITE HEADER
     WP: header.php
     Bilingual: JS toggles data-lang on <html>; data-i18n attributes
     Currency:  JS toggles data-currency on <html>
     ================================================================ -->
<header class="site-header" id="site-header">
  <div class="container">
    <nav class="nav-inner" aria-label="<?php esc_attr_e('Main navigation', 'luxora'); ?>">

      <!-- ── Logo ── -->
      <div class="site-branding-wrap" style="flex-shrink:0;">
        <?php luxora_logo(); ?>
      </div>

      <!-- ── Primary nav (desktop, hidden on mobile) ── -->
      <div class="nav-primary" role="navigation">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => '',
            'fallback_cb'    => 'luxora_fallback_menu',
            'depth'          => 1,
        ]);
        ?>
      </div>

      <!-- ── Controls (right side) ── -->
      <div class="nav-controls">

        <!-- Live rate pill (shown only in VND mode) -->
        <span class="rate-pill" id="rate-pill" aria-live="polite">
          1 USD ≈ 25,500 VND · Live
        </span>

        <!-- Language switcher placeholder
             Replace with WPML / Polylang language switcher shortcode.
             Current: static JS-powered toggle for design review. -->
        <div class="toggle-group lang-group" role="group" aria-label="<?php esc_attr_e('Language', 'luxora'); ?>">
          <button class="toggle-btn toggle-lang active" data-value="en" onclick="setLang('en')">EN</button>
          <button class="toggle-btn toggle-lang"        data-value="vi" onclick="setLang('vi')">VI</button>
        </div>
        <!-- WPML replacement:
          <?php do_action('wpml_add_language_selector'); ?>
        -->

        <!-- Currency switcher -->
        <div class="toggle-group" role="group" aria-label="<?php esc_attr_e('Currency', 'luxora'); ?>">
          <button class="toggle-btn toggle-cur active" data-value="usd" onclick="setCurrency('usd')">USD</button>
          <button class="toggle-btn toggle-cur"        data-value="vnd" onclick="setCurrency('vnd')">VND</button>
        </div>

        <!-- Cart icon (WooCommerce) -->
        <?php if ( class_exists('WooCommerce') ) : ?>
        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="icon-btn" aria-label="<?php esc_attr_e('Cart', 'luxora'); ?>">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <?php luxora_cart_count_html(); ?>
        </a>
        <?php endif; ?>

        <!-- Account icon -->
        <a href="<?php echo esc_url( class_exists('WooCommerce') ? get_permalink(get_option('woocommerce_myaccount_page_id')) : home_url('/account/') ); ?>" class="icon-btn" aria-label="<?php esc_attr_e('My account', 'luxora'); ?>">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </a>

        <!-- CTA button -->
        <a href="<?php echo esc_url( class_exists('WooCommerce') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop/') ); ?>" class="btn btn-primary btn-sm" data-i18n="nav_cta">
          <?php esc_html_e('See All Products', 'luxora'); ?>
        </a>

        <!-- Mobile menu toggle -->
        <button class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle menu', 'luxora'); ?>">
          <span></span><span></span><span></span>
        </button>
      </div><!-- /nav-controls -->

    </nav><!-- /nav-inner -->
  </div><!-- /container -->
</header>

<!-- Mobile menu drawer -->
<div class="nav-mobile" id="nav-mobile" aria-expanded="false">
  <?php
  wp_nav_menu([
      'theme_location' => 'primary',
      'container'      => false,
      'fallback_cb'    => 'luxora_fallback_menu',
      'depth'          => 1,
  ]);
  ?>
</div>


<?php
// luxora_fallback_menu() is defined in functions.php so it is
// available throughout the theme before header.php is loaded.
