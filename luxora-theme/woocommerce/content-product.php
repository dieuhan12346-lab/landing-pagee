<?php
/**
 * Product card (loop) — Luxora styled.
 * Overrides: woocommerce/templates/content-product.php
 */
defined('ABSPATH') || exit;

global $product;
if ( empty($product) || ! $product->is_visible() ) return;

$demo_url = get_post_meta($product->get_id(), '_demo_url', true);
$cats     = wc_get_product_category_list($product->get_id(), ', ');
?>
<li <?php wc_product_class('lx-product-card', $product); ?>>
  <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>" class="lx-card-link">

    <!-- Thumbnail -->
    <div class="lx-card-thumb">
      <?php if ( $product->get_image_id() ) : ?>
        <?php echo wp_get_attachment_image($product->get_image_id(), 'luxora-card', false, ['class' => 'wp-post-image', 'loading' => 'lazy']); ?>
      <?php else : ?>
        <div class="lx-card-thumb-placeholder" aria-hidden="true">
          <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
      <?php endif; ?>
      <?php if ( $cats ) : ?>
        <span class="lx-card-badge badge badge-navy"><?php echo wp_strip_all_tags($cats); ?></span>
      <?php endif; ?>
    </div>

    <!-- Card body -->
    <div class="lx-card-body">
      <h2 class="lx-card-title"><?php echo esc_html($product->get_name()); ?></h2>
      <p class="lx-card-excerpt">
        <?php echo wp_trim_words($product->get_short_description() ?: $product->get_description(), 18, '...'); ?>
      </p>
      <div class="lx-card-footer">
        <div class="lx-card-price">
          <?php luxora_price_html($product); ?>
        </div>
        <div class="lx-card-actions">
          <?php if ( $demo_url ) : ?>
            <a href="<?php echo esc_url($demo_url); ?>" class="btn btn-outline btn-sm" target="_blank" rel="noopener" onclick="event.stopPropagation();" data-i18n="prod_try">
              <?php esc_html_e('Try demo', 'luxora'); ?>
            </a>
          <?php endif; ?>
          <?php woocommerce_template_loop_add_to_cart(['class' => 'btn btn-teal btn-sm']); ?>
        </div>
      </div>
    </div>

  </a>
</li>
