<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<nav class="delia-nav" id="delia-nav">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo">
        <?php if (has_custom_logo()): the_custom_logo(); else: ?>DELIA<?php endif; ?>
    </a>

    <?php
    $pages = [
        'Home'       => home_url('/'),
        'About'      => get_permalink(get_page_by_path('ve-delia'))   ?: home_url('/ve-delia/'),
        'Our Story'  => get_permalink(get_page_by_path('cau-chuyen')) ?: home_url('/cau-chuyen/'),
        'Products'   => get_permalink(get_page_by_path('san-pham')) ?: (class_exists('WooCommerce') ? get_permalink(wc_get_page_id('shop')) : home_url('/san-pham/')),
        'Contact'    => get_permalink(get_page_by_path('lien-he'))    ?: home_url('/lien-he/'),
    ];
    ?>
    <ul class="nav-links">
        <?php foreach ($pages as $label => $url):
            $active = (rtrim($url, '/') === rtrim(get_permalink() ?: home_url(add_query_arg([])), '/'))
                   || ($label === 'Home' && is_front_page());
        ?>
        <li><a href="<?php echo esc_url($url); ?>"<?php if ($active) echo ' class="nav-active"'; ?>><?php echo esc_html($label); ?></a></li>
        <?php endforeach; ?>
    </ul>

    <div class="nav-actions">
        <?php delia_cart_icon(); ?>
        <button class="nav-toggle" aria-label="Menu"><span></span><span></span><span></span></button>
    </div>
</nav>
