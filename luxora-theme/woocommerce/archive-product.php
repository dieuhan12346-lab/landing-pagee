<?php
/**
 * Shop / product archive template — Luxora styled.
 * Overrides: woocommerce/templates/archive-product.php
 *
 * WC variables available: $product (in loop)
 */
defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 * Outputs our custom <main> wrapper (functions.php hook).
 */
do_action('woocommerce_before_main_content');
?>

<!-- ── Page hero ──────────────────────────────────────────────── -->
<div class="page-hero">
  <?php
  $current_term = is_product_category() ? get_queried_object() : null;
  ?>
  <span class="eyebrow" data-i18n="catalog_eyebrow">
    <?php esc_html_e('All Products', 'luxora'); ?>
  </span>
  <h1 class="display-lg" style="margin-top:var(--s3);">
    <?php if ( $current_term ) :
        echo esc_html($current_term->name);
    else : ?>
      <span data-i18n="catalog_h1"><?php esc_html_e('Finance Tools for SMEs', 'luxora'); ?></span>
    <?php endif; ?>
  </h1>
  <p class="lead" style="margin-top:var(--s4);max-width:540px;" data-i18n="catalog_sub">
    <?php esc_html_e('Every product includes a live demo — try before you buy. One-time payment. Instant access.', 'luxora'); ?>
  </p>
</div>

<!-- ── Category filter tabs ──────────────────────────────────── -->
<?php
$product_cats = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => true, 'parent' => 0]);
if ( ! empty($product_cats) && ! is_wp_error($product_cats) ) :
?>
<div class="filter-bar" style="display:flex;gap:var(--s2);flex-wrap:wrap;margin:var(--s6) 0;">
  <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
     class="btn btn-sm <?php echo (is_shop() && !is_product_category()) ? 'btn-primary' : 'btn-outline'; ?>"
     data-i18n="catalog_all">
    <?php esc_html_e('All', 'luxora'); ?>
  </a>
  <?php foreach ( $product_cats as $cat ) : ?>
  <a href="<?php echo esc_url(get_term_link($cat)); ?>"
     class="btn btn-sm <?php echo (is_product_category($cat->slug)) ? 'btn-primary' : 'btn-outline'; ?>">
    <?php echo esc_html($cat->name); ?>
  </a>
  <?php endforeach; ?>
</div>
<?php endif; ?>

<!-- ── Sort + count bar ──────────────────────────────────────── -->
<div style="display:flex;align-items:center;justify-content:space-between;padding:var(--s4) 0 var(--s6);border-bottom:1px solid var(--grey-100);margin-bottom:var(--s8);flex-wrap:wrap;gap:var(--s3);">
  <?php woocommerce_result_count(); ?>
  <?php woocommerce_catalog_ordering(); ?>
</div>

<!-- ── Product grid ──────────────────────────────────────────── -->
<?php if ( have_posts() ) : ?>

  <?php do_action('woocommerce_before_shop_loop'); ?>

  <ul class="lx-products-grid products" style="padding-bottom:var(--s12);">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php wc_get_template_part('content', 'product'); ?>
    <?php endwhile; ?>
  </ul>

  <?php do_action('woocommerce_after_shop_loop'); ?>
  <?php woocommerce_pagination(); ?>

<?php else : ?>
  <?php do_action('woocommerce_no_products_found'); ?>
<?php endif; ?>

<?php
do_action('woocommerce_after_main_content');
get_footer('shop');
?>
