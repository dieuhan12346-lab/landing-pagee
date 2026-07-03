<?php
/**
 * 404 error page.
 */
get_header();
?>
<main id="lx-main" class="lx-main">
  <div class="container" style="text-align:center;padding:var(--s24) var(--pad-x);">
    <span class="eyebrow" style="font-size:4rem;display:block;margin-bottom:var(--s4);font-family:var(--font-heading);color:var(--grey-200);font-weight:700;letter-spacing:-.05em;">404</span>
    <h1 class="display-lg" style="margin-bottom:var(--s5);" data-i18n="e404_h1">
      <?php esc_html_e('Page not found', 'luxora'); ?>
    </h1>
    <p class="lead" style="max-width:480px;margin:0 auto var(--s8);" data-i18n="e404_body">
      <?php esc_html_e("The page you're looking for doesn't exist or has moved.", 'luxora'); ?>
    </p>
    <div style="display:flex;gap:var(--s4);justify-content:center;flex-wrap:wrap;">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg" data-i18n="e404_home">
        <?php esc_html_e('Back to Home', 'luxora'); ?>
      </a>
      <?php if ( class_exists('WooCommerce') ) : ?>
      <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-outline btn-lg" data-i18n="e404_shop">
        <?php esc_html_e('Browse Products', 'luxora'); ?>
      </a>
      <?php endif; ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>
