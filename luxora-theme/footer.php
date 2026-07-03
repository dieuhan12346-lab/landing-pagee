<!-- ================================================================
     SITE FOOTER
     WP: footer.php
     ================================================================ -->
<footer class="site-footer" id="footer">
  <div class="container">

    <div class="footer-grid">

      <!-- Brand column -->
      <div>
        <div class="footer-brand-logo">
          <?php
          if ( has_custom_logo() ) {
              the_custom_logo();
          } else {
              echo esc_html( get_bloginfo('name') );
          }
          ?>
        </div>
        <p class="footer-tagline" data-i18n="footer_tagline">
          <?php esc_html_e('Finance dashboards and smart spreadsheets for SMEs. Try before you buy.', 'luxora'); ?>
        </p>
        <p class="footer-contact">
          <?php esc_html_e('Support:', 'luxora'); ?>
          <a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>">
            <?php echo esc_html(get_option('admin_email')); ?>
          </a>
        </p>
      </div>

      <!-- Products column -->
      <div>
        <div class="footer-col-title" data-i18n="footer_col1">
          <?php esc_html_e('Products', 'luxora'); ?>
        </div>
        <ul class="footer-links" role="list">
          <?php
          if ( class_exists('WooCommerce') ) {
              $products = wc_get_products([
                  'status' => 'publish',
                  'limit'  => 5,
                  'order'  => 'ASC',
              ]);
              foreach ( $products as $product ) {
                  echo '<li><a href="' . esc_url( get_permalink($product->get_id()) ) . '" class="footer-link">' . esc_html($product->get_name()) . '</a></li>';
              }
          }
          ?>
          <li>
            <a href="<?php echo esc_url( class_exists('WooCommerce') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop/') ); ?>" class="footer-link" data-i18n="footer_p5">
              <?php esc_html_e('See all products →', 'luxora'); ?>
            </a>
          </li>
        </ul>
      </div>

      <!-- Free tools + Help column -->
      <div>
        <div class="footer-col-title" data-i18n="footer_col2">
          <?php esc_html_e('Free Tools', 'luxora'); ?>
        </div>
        <ul class="footer-links" role="list">
          <li><a href="<?php echo esc_url(home_url('/free-tool/')); ?>" class="footer-link" data-i18n="footer_t1"><?php esc_html_e('Break-Even Calculator', 'luxora'); ?></a></li>
        </ul>

        <div class="footer-col-title" style="margin-top:var(--s8);" data-i18n="footer_col3">
          <?php esc_html_e('Help', 'luxora'); ?>
        </div>
        <ul class="footer-links" role="list">
          <li><a href="<?php echo esc_url(home_url('/#how-it-works')); ?>" class="footer-link" data-i18n="footer_h1"><?php esc_html_e('How It Works', 'luxora'); ?></a></li>
          <li><a href="<?php echo esc_url( class_exists('WooCommerce') ? get_permalink(get_option('woocommerce_myaccount_page_id')) : home_url('/account/') ); ?>" class="footer-link" data-i18n="footer_h2"><?php esc_html_e('My Products', 'luxora'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="footer-link" data-i18n="footer_h3"><?php esc_html_e('Support', 'luxora'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/refund-policy/')); ?>" class="footer-link" data-i18n="footer_h4"><?php esc_html_e('Refund Policy', 'luxora'); ?></a></li>
        </ul>
      </div>

      <!-- Language + Currency column -->
      <div>
        <div class="footer-col-title"><?php esc_html_e('Language', 'luxora'); ?></div>
        <div class="toggle-group" role="group" aria-label="<?php esc_attr_e('Language', 'luxora'); ?>" style="margin-bottom:var(--s5);">
          <button class="toggle-btn toggle-lang active" data-value="en" onclick="setLang('en')">EN</button>
          <button class="toggle-btn toggle-lang"        data-value="vi" onclick="setLang('vi')">VI</button>
        </div>
        <!-- WPML/Polylang placeholder:
          <?php // do_action('wpml_add_language_selector'); ?>
        -->

        <div class="footer-col-title"><?php esc_html_e('Currency', 'luxora'); ?></div>
        <div class="toggle-group" role="group" aria-label="<?php esc_attr_e('Currency', 'luxora'); ?>">
          <button class="toggle-btn toggle-cur active" data-value="usd" onclick="setCurrency('usd')">USD</button>
          <button class="toggle-btn toggle-cur"        data-value="vnd" onclick="setCurrency('vnd')">VND</button>
        </div>
      </div>

    </div><!-- /footer-grid -->

    <div class="footer-bottom">
      <p class="footer-copy" data-i18n="footer_copy">
        &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>.
        <?php esc_html_e('All rights reserved.', 'luxora'); ?>
      </p>
      <nav class="footer-legal" aria-label="<?php esc_attr_e('Legal links', 'luxora'); ?>">
        <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" data-i18n="footer_privacy"><?php esc_html_e('Privacy', 'luxora'); ?></a>
        <a href="<?php echo esc_url(home_url('/terms/')); ?>"          data-i18n="footer_terms"><?php esc_html_e('Terms', 'luxora'); ?></a>
        <a href="<?php echo esc_url(home_url('/refund-policy/')); ?>"  data-i18n="footer_refund"><?php esc_html_e('Refund Policy', 'luxora'); ?></a>
      </nav>
    </div>

  </div><!-- /container -->
</footer>

<?php wp_footer(); ?>

</body>
</html>
