<?php
/**
 * Template Name: Privacy Policy
 * Template Post Type: page
 */
get_header();
?>
<main id="lx-main" class="lx-main">
  <div class="page-hero center">
    <div class="container">
      <span class="eyebrow"><?php esc_html_e('Legal', 'luxora'); ?></span>
      <h1 class="display-lg" style="margin-top:var(--s3);" data-i18n="privacy_h1"><?php esc_html_e('Privacy Policy', 'luxora'); ?></h1>
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

        if ( ! get_the_content() ) : ?>

        <h2><?php esc_html_e('What We Collect', 'luxora'); ?></h2>
        <p><?php esc_html_e('When you make a purchase, we collect: your name, email address, and payment information (processed securely by our payment provider — we never see your full card details).', 'luxora'); ?></p>
        <p><?php esc_html_e('When you use the free calculator on this site, we collect: nothing. The calculator runs entirely in your browser. No data is sent to our servers.', 'luxora'); ?></p>

        <h2><?php esc_html_e('How We Use Your Data', 'luxora'); ?></h2>
        <ul>
          <li><?php esc_html_e('To deliver your purchase and send your license key.', 'luxora'); ?></li>
          <li><?php esc_html_e('To respond to support requests.', 'luxora'); ?></li>
          <li><?php esc_html_e('To send product updates if you have opted in.', 'luxora'); ?></li>
        </ul>
        <p><?php esc_html_e('We do not sell your personal data to third parties.', 'luxora'); ?></p>

        <h2><?php esc_html_e('Cookies', 'luxora'); ?></h2>
        <p><?php esc_html_e('We use minimal cookies: a session cookie for your shopping cart, and localStorage to remember your language and currency preference. No tracking or advertising cookies.', 'luxora'); ?></p>

        <h2><?php esc_html_e('Third Parties', 'luxora'); ?></h2>
        <p><?php esc_html_e('We use the following third-party services: WooCommerce (store platform), Stripe / VNPay / MoMo (payment processing), Brevo (optional email follow-up if you opt in), Google Fonts (typography).', 'luxora'); ?></p>

        <h2><?php esc_html_e('Your Rights', 'luxora'); ?></h2>
        <p><?php esc_html_e('You may request deletion of your account and personal data at any time by emailing us.', 'luxora'); ?></p>

        <h2><?php esc_html_e('Contact', 'luxora'); ?></h2>
        <p>
          <?php esc_html_e('Data-related requests:', 'luxora'); ?>
          <a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>"><?php echo esc_html(get_option('admin_email')); ?></a>
        </p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
