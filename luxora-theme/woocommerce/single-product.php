<?php
/**
 * Single product page — Luxora styled.
 * Overrides: woocommerce/templates/single-product.php
 *
 * Preserves WooCommerce structure (gallery + summary + tabs) but applies
 * Luxora layout: navy/teal, Lexend headings, rounded corners.
 */
defined('ABSPATH') || exit;

get_header('shop');
do_action('woocommerce_before_main_content');

while ( have_posts() ) :
    the_post();

    // Explicitly load the product object — do not rely on global $product here
    // because WC sets the global via hooks that fire later in the page lifecycle.
    $product = wc_get_product( get_the_ID() );
    if ( ! $product ) continue;

    do_action('woocommerce_single_product');
?>
<!-- Product single layout -->
<div class="lx-single-product" style="padding:var(--s10) 0 var(--s16);">

  <!-- Breadcrumb -->
  <div class="breadcrumb" style="margin-bottom:var(--s8);">
    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'luxora'); ?></a>
    <span>/</span>
    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"><?php esc_html_e('Products', 'luxora'); ?></a>
    <span>/</span>
    <span><?php the_title(); ?></span>
  </div>

  <!-- Top grid: image + summary -->
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--s16);align-items:start;margin-bottom:var(--s16);">

    <!-- Gallery -->
    <div class="woocommerce-product-gallery" style="border-radius:var(--r-xl);overflow:hidden;border:1px solid var(--grey-200);">
      <?php do_action('woocommerce_before_single_product_summary'); ?>
    </div>

    <!-- Summary / purchase panel -->
    <div class="summary entry-summary">
      <?php
      // Category pills
      $terms = wc_get_product_terms($product->get_id(), 'product_cat', ['fields' => 'names']);
      if ( $terms ) :
          foreach ($terms as $t) :
              echo '<span class="badge badge-teal" style="margin-bottom:var(--s3);display:inline-flex;">' . esc_html($t) . '</span> ';
          endforeach;
      endif;

      do_action('woocommerce_single_product_summary');
      ?>
    </div>

  </div>

  <!-- Demo callout (only when _demo_url set) -->
  <?php
  $demo_url = get_post_meta($product->get_id(), '_demo_url', true);
  if ( $demo_url ) :
  ?>
  <div style="background:var(--teal-50);border:1px solid rgba(13,148,136,.15);border-left:4px solid var(--teal);border-radius:var(--r-lg);padding:var(--s5) var(--s6);display:flex;align-items:center;gap:var(--s4);margin-bottom:var(--s12);flex-wrap:wrap;">
    <div style="flex:1;min-width:200px;">
      <strong style="font-family:var(--font-heading);color:var(--teal);display:block;margin-bottom:var(--s1);" data-i18n="sp_demo_title"><?php esc_html_e('Try it live — no account needed', 'luxora'); ?></strong>
      <span class="body-md" data-i18n="sp_demo_body"><?php esc_html_e('Interactive demo preloaded with sample data. See exactly what you get before buying.', 'luxora'); ?></span>
    </div>
    <a href="<?php echo esc_url($demo_url); ?>" class="btn btn-teal" target="_blank" rel="noopener" data-i18n="sp_demo_btn">
      <?php esc_html_e('Open live demo →', 'luxora'); ?>
    </a>
  </div>
  <?php endif; ?>

  <!-- Tabs: description / FAQ / reviews -->
  <div class="woocommerce-tabs-wrap">
    <?php do_action('woocommerce_after_single_product_summary'); ?>
  </div>

</div>

<?php
do_action('woocommerce_after_single_product');
endwhile;

do_action('woocommerce_after_main_content');
get_footer('shop');
?>
