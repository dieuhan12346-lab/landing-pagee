<?php
/**
 * Template Name: Terms of Service
 * Template Post Type: page
 */
get_header();
?>
<main id="lx-main" class="lx-main">
  <div class="page-hero center">
    <div class="container">
      <span class="eyebrow"><?php esc_html_e('Legal', 'luxora'); ?></span>
      <h1 class="display-lg" style="margin-top:var(--s3);" data-i18n="terms_h1"><?php esc_html_e('Terms of Service', 'luxora'); ?></h1>
      <p class="body-md" style="margin-top:var(--s3);color:var(--grey-400);"><?php esc_html_e('Last updated: June 2026', 'luxora'); ?></p>
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

        if ( ! get_the_content() ) : // Fallback static content ?>

        <h2><?php esc_html_e('1. Acceptance of Terms', 'luxora'); ?></h2>
        <p><?php esc_html_e('By purchasing or using any product from this store, you agree to these Terms of Service. If you do not agree, do not make a purchase.', 'luxora'); ?></p>

        <h2><?php esc_html_e('2. Digital Products', 'luxora'); ?></h2>
        <p><?php esc_html_e('All products are digital (Google Sheets, spreadsheets, or dashboard templates). Once delivered, you receive a personal, non-transferable license to use the product for your own business purposes.', 'luxora'); ?></p>
        <ul>
          <li><?php esc_html_e('You may use the product in your own business.', 'luxora'); ?></li>
          <li><?php esc_html_e('You may not resell, redistribute, or share the product files with others.', 'luxora'); ?></li>
          <li><?php esc_html_e('You may not claim the product as your own creation.', 'luxora'); ?></li>
        </ul>

        <h2><?php esc_html_e('3. Delivery', 'luxora'); ?></h2>
        <p><?php esc_html_e('Products are delivered digitally within 60 seconds of confirmed payment via email and the My Account page. If you do not receive your product within 1 hour, contact support.', 'luxora'); ?></p>

        <h2><?php esc_html_e('4. Refund Policy', 'luxora'); ?></h2>
        <p><?php esc_html_e('We offer a 14-day money-back guarantee. See our Refund Policy page for full details.', 'luxora'); ?></p>

        <h2><?php esc_html_e('5. Limitation of Liability', 'luxora'); ?></h2>
        <p><?php esc_html_e('Our tools are designed to help you analyze financial data. They are not a substitute for professional financial advice. We are not responsible for any business decisions you make based on the output of these tools.', 'luxora'); ?></p>

        <h2><?php esc_html_e('6. Changes', 'luxora'); ?></h2>
        <p><?php esc_html_e('We may update these Terms from time to time. Continued use of our products after changes constitutes acceptance of the new Terms.', 'luxora'); ?></p>

        <h2><?php esc_html_e('7. Contact', 'luxora'); ?></h2>
        <p>
          <?php esc_html_e('Questions? Email us at', 'luxora'); ?>
          <a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>"><?php echo esc_html(get_option('admin_email')); ?></a>.
        </p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
