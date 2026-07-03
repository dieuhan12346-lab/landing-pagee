<?php
/**
 * Template Name: Refund Policy
 * Template Post Type: page
 */
get_header();
?>
<main id="lx-main" class="lx-main">
  <div class="page-hero center">
    <div class="container">
      <span class="eyebrow"><?php esc_html_e('Legal', 'luxora'); ?></span>
      <h1 class="display-lg" style="margin-top:var(--s3);" data-i18n="refund_h1"><?php esc_html_e('Refund Policy', 'luxora'); ?></h1>
      <p class="lead" style="margin-top:var(--s4);max-width:540px;margin-inline:auto;" data-i18n="refund_sub">
        <?php esc_html_e('We want you to be happy with your purchase. If you are not, we make it easy to get your money back.', 'luxora'); ?>
      </p>
    </div>
  </div>
  <section class="section section-white">
    <div class="container">
      <div class="legal-content">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;

        if ( ! get_the_content() ) : ?>

        <!-- Promise box -->
        <div style="background:var(--gain-50);border:1px solid var(--gain-100);border-left:4px solid var(--gain);border-radius:var(--r-lg);padding:var(--s6) var(--s8);margin-bottom:var(--s8);">
          <strong style="font-family:var(--font-heading);color:#047857;font-size:1.05rem;display:block;margin-bottom:var(--s2);">
            <?php esc_html_e('14-Day Money-Back Guarantee', 'luxora'); ?>
          </strong>
          <p style="color:#065F46;line-height:1.65;">
            <?php esc_html_e('If you request a refund within 14 days of purchase, we will refund your full payment — no questions asked.', 'luxora'); ?>
          </p>
        </div>

        <h2><?php esc_html_e('How to Request a Refund', 'luxora'); ?></h2>
        <p>
          <?php esc_html_e('Email us at', 'luxora'); ?>
          <a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>"><?php echo esc_html(get_option('admin_email')); ?></a>
          <?php esc_html_e('with your order number and the word "Refund" in the subject line. We will process your refund within 3 business days.', 'luxora'); ?>
        </p>

        <h2><?php esc_html_e('Conditions', 'luxora'); ?></h2>
        <ul>
          <li><?php esc_html_e('Request must be made within 14 days of purchase.', 'luxora'); ?></li>
          <li><?php esc_html_e('One refund per customer, per product.', 'luxora'); ?></li>
          <li><?php esc_html_e('The license key will be revoked upon refund.', 'luxora'); ?></li>
        </ul>

        <h2><?php esc_html_e('Non-Refundable Cases', 'luxora'); ?></h2>
        <p><?php esc_html_e('We cannot issue refunds if the product has been resold or redistributed, or if more than 14 days have passed since purchase.', 'luxora'); ?></p>

        <h2><?php esc_html_e('Contact', 'luxora'); ?></h2>
        <p>
          <?php esc_html_e('Refund requests:', 'luxora'); ?>
          <a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>"><?php echo esc_html(get_option('admin_email')); ?></a>
        </p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
