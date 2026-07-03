<?php
/**
 * Homepage template
 * WP template hierarchy: front-page.php → home.php → index.php
 */
get_header();
?>

<!-- ================================================================
     HERO
     ================================================================ -->
<section class="lx-hero" aria-label="<?php esc_attr_e('Hero', 'luxora'); ?>">
  <div class="container">
    <div class="hero-grid">

      <!-- Left: copy -->
      <div class="hero-text">
        <div class="hero-eyebrow-row">
          <span class="eyebrow" data-i18n="hero_eyebrow">
            <?php esc_html_e('Finance tools for SMEs · Try live · No signup required', 'luxora'); ?>
          </span>
          <span class="live-pill">
            <span class="live-dot"></span>
            <span data-i18n="hero_live"><?php esc_html_e('Live demo', 'luxora'); ?></span>
          </span>
        </div>

        <h1 class="display-xl hero-h1" data-i18n="hero_h1">
          <?php esc_html_e('The Finance Tools', 'luxora'); ?>
          <em><?php esc_html_e('Your Business', 'luxora'); ?></em>
          <?php esc_html_e('Has Been Missing', 'luxora'); ?>
        </h1>

        <p class="lead hero-lead" data-i18n="hero_sub">
          <?php esc_html_e('Interactive dashboards and smart spreadsheets — try any product live before you buy. No account needed.', 'luxora'); ?>
        </p>

        <div class="hero-ctas">
          <a href="<?php echo esc_url( class_exists('WooCommerce') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop/') ); ?>"
             class="btn btn-primary btn-lg" data-i18n="hero_cta1">
            <?php esc_html_e('Browse the Catalog', 'luxora'); ?>
          </a>
          <a href="<?php echo esc_url(home_url('/free-tool/')); ?>"
             class="btn btn-ghost btn-lg" data-i18n="hero_cta2">
            <?php esc_html_e('Try the Free Tool', 'luxora'); ?> <span class="arrow">→</span>
          </a>
        </div>

        <div class="hero-trust" role="list">
          <div class="hero-trust-item" role="listitem">
            <span class="trust-check" aria-hidden="true">✓</span>
            <span data-i18n="hero_trust1"><?php esc_html_e('13-week cash visibility', 'luxora'); ?></span>
          </div>
          <div class="hero-trust-item" role="listitem">
            <span class="trust-check" aria-hidden="true">✓</span>
            <span data-i18n="hero_trust2"><?php esc_html_e('Try before you buy', 'luxora'); ?></span>
          </div>
          <div class="hero-trust-item" role="listitem">
            <span class="trust-check" aria-hidden="true">✓</span>
            <span data-i18n="hero_trust3"><?php esc_html_e('Instant access after purchase', 'luxora'); ?></span>
          </div>
        </div>
      </div><!-- /hero-text -->

      <!-- Right: dashboard mockup (pure CSS/HTML — no image needed) -->
      <div class="hero-visual" aria-hidden="true">
        <div class="hero-float-badge">
          <div class="hero-float-badge-num" data-i18n="hero_float_num">4 <?php esc_html_e('weeks', 'luxora'); ?></div>
          <div class="hero-float-badge-text" data-i18n="hero_float_txt">
            <?php esc_html_e('earlier warning than manual spreadsheets', 'luxora'); ?>
          </div>
        </div>

        <div class="dashboard-card" role="img" aria-label="<?php esc_attr_e('13-Week Cash Flow Forecast demo', 'luxora'); ?>">
          <div class="dc-topbar">
            <span class="dc-dot dc-dot-r"></span>
            <span class="dc-dot dc-dot-y"></span>
            <span class="dc-dot dc-dot-g"></span>
            <span class="dc-title" data-i18n="dc_title"><?php esc_html_e('13-Week Cash Flow Forecast — Demo', 'luxora'); ?></span>
          </div>
          <div class="dc-body">
            <div class="week-row" aria-hidden="true">
              <?php foreach(['W1','W2','W3','W4','W5','W6','W7','W8','W9','W10','W11','W12','W13'] as $i => $w) :
                  $cls = ($i === 8) ? 'wk danger' : 'wk';
              ?>
              <span class="<?php echo esc_attr($cls); ?>"><?php echo esc_html($w); ?></span>
              <?php endforeach; ?>
            </div>
            <div class="chart-area" aria-hidden="true">
              <?php
              $heights = [52,68,44,76,38,60,28,14,null,null,20,40,58];
              $neg     = [false,false,false,false,false,false,false,false,true,true,false,false,false];
              $warn    = [false,false,false,false,false,false,false,true,false,false,false,false,false];
              $danger  = [false,false,false,false,false,false,false,false,true,true,false,false,false];
              for ($i=0; $i<13; $i++) :
                  $extra = $danger[$i] ? ' is-danger' : ($warn[$i] ? ' is-warn' : '');
                  echo '<div class="bar-col' . esc_attr($extra) . '">';
                  if (!$neg[$i]) {
                      echo '<div class="bar-pos" style="height:' . esc_attr($heights[$i]) . '%"></div>';
                  } else {
                      echo '<div class="bar-neg" style="height:30%"></div>';
                  }
                  echo '</div>';
              endfor;
              ?>
            </div>
            <div class="dc-alert">
              <span class="dc-alert-icon">⚠</span>
              <div class="dc-alert-body">
                <div class="dc-alert-title" data-i18n="dc_alert">
                  <?php esc_html_e('Week 9: Cash balance goes negative (−$4,200)', 'luxora'); ?>
                </div>
                <div class="dc-alert-sub" data-i18n="dc_sub">
                  <?php esc_html_e('Action needed — 4 weeks remaining to act', 'luxora'); ?>
                </div>
              </div>
            </div>
            <div class="dc-summary">
              <div class="dc-kpi"><div class="dc-kpi-val gain">$18,400</div><div class="dc-kpi-label" data-i18n="dc_kpi1"><?php esc_html_e('Current cash', 'luxora'); ?></div></div>
              <div class="dc-kpi"><div class="dc-kpi-val loss">−$4,200</div><div class="dc-kpi-label" data-i18n="dc_kpi2"><?php esc_html_e('Week 9 low', 'luxora'); ?></div></div>
              <div class="dc-kpi"><div class="dc-kpi-val">W11</div><div class="dc-kpi-label" data-i18n="dc_kpi3"><?php esc_html_e('Recovery week', 'luxora'); ?></div></div>
            </div>
          </div>
        </div><!-- /dashboard-card -->
      </div><!-- /hero-visual -->

    </div><!-- /hero-grid -->
  </div><!-- /container -->
</section>

<!-- ================================================================
     HOW IT WORKS
     ================================================================ -->
<section class="section section-white" id="how-it-works">
  <div class="container">
    <div class="section-header center">
      <span class="eyebrow" data-i18n="hiw_eyebrow"><?php esc_html_e('How it works', 'luxora'); ?></span>
      <h2 class="display-lg" data-i18n="hiw_h2"><?php esc_html_e('Try it. See it work. Then decide.', 'luxora'); ?></h2>
      <p class="lead" data-i18n="hiw_sub"><?php esc_html_e('Every product is interactive before you pay a cent.', 'luxora'); ?></p>
    </div>
    <div class="steps-grid">
      <?php
      $steps = [
          ['icon' => '🖥', 'i18n_t' => 'hiw_s1_title', 'i18n_b' => 'hiw_s1_body',
           'title' => 'Try the live demo',
           'body'  => 'Every product has a live, interactive demo you can use right now — no signup, no email required.'],
          ['icon' => '▶', 'i18n_t' => 'hiw_s2_title', 'i18n_b' => 'hiw_s2_body',
           'title' => 'See exactly what you get',
           'body'  => "Watch a short walkthrough video and read what's inside. No guessing what you're buying."],
          ['icon' => '✓', 'i18n_t' => 'hiw_s3_title', 'i18n_b' => 'hiw_s3_body',
           'title' => 'Buy and get instant access',
           'body'  => 'Pay once. Your license key, file link, or dashboard copy arrives in your inbox in under 60 seconds.'],
      ];
      foreach ($steps as $n => $s) :
      ?>
      <div class="step">
        <div class="step-icon-wrap">
          <div class="step-icon" aria-hidden="true"><?php echo esc_html($s['icon']); ?></div>
          <div class="step-num" aria-hidden="true"><?php echo esc_html($n+1); ?></div>
        </div>
        <h3 class="step-title" data-i18n="<?php echo esc_attr($s['i18n_t']); ?>"><?php echo esc_html($s['title']); ?></h3>
        <p class="body-md step-body" data-i18n="<?php echo esc_attr($s['i18n_b']); ?>"><?php echo esc_html($s['body']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================================================================
     FEATURED PRODUCTS (dynamic from WooCommerce)
     ================================================================ -->
<section class="section section-surface" id="products">
  <div class="container">
    <div class="section-header center" style="margin-bottom:var(--s10);">
      <span class="eyebrow" data-i18n="prod_eyebrow"><?php esc_html_e('Our tools', 'luxora'); ?></span>
      <h2 class="display-lg" style="margin-top:var(--s3);" data-i18n="prod_h2">
        <?php esc_html_e('Built for businesses that run on spreadsheets and dashboards.', 'luxora'); ?>
      </h2>
    </div>

    <?php if ( class_exists('WooCommerce') ) : ?>

      <?php
      // Fetch featured products from WooCommerce
      $featured = wc_get_products([
          'status'   => 'publish',
          'limit'    => 3,
          'featured' => true,
          'orderby'  => 'menu_order',
          'order'    => 'ASC',
      ]);

      // Fallback: latest products if no featured ones set
      if ( empty($featured) ) {
          $featured = wc_get_products([
              'status'  => 'publish',
              'limit'   => 3,
              'orderby' => 'date',
              'order'   => 'DESC',
          ]);
      }
      ?>

      <?php if ( ! empty($featured) ) : ?>
      <ul class="lx-products-grid">
        <?php foreach ( $featured as $product ) :
            $product_id = $product->get_id();
            $cats = wc_get_product_category_list($product_id, ', ');
        ?>
        <li class="lx-product-card">
          <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="lx-card-link">

            <!-- Thumbnail -->
            <div class="lx-card-thumb">
              <?php if ( $product->get_image_id() ) : ?>
                <?php echo wp_get_attachment_image($product->get_image_id(), 'luxora-card', false, ['class' => 'wp-post-image']); ?>
              <?php else : ?>
                <div class="lx-card-thumb-placeholder" aria-hidden="true">
                  <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                </div>
              <?php endif; ?>
              <?php if ( $cats ) : ?>
              <span class="lx-card-badge badge badge-navy">
                <?php echo wp_strip_all_tags($cats); ?>
              </span>
              <?php endif; ?>
            </div>

            <!-- Body -->
            <div class="lx-card-body">
              <h3 class="lx-card-title"><?php echo esc_html($product->get_name()); ?></h3>
              <p class="lx-card-excerpt">
                <?php echo wp_trim_words($product->get_short_description() ?: $product->get_description(), 18); ?>
              </p>
              <div class="lx-card-footer">
                <div class="lx-card-price">
                  <?php luxora_price_html($product); ?>
                </div>
                <div class="lx-card-actions">
                  <?php
                  // "Try Demo" link — store demo URL in custom field '_demo_url'
                  $demo_url = get_post_meta($product_id, '_demo_url', true);
                  if ( $demo_url ) : ?>
                  <a href="<?php echo esc_url($demo_url); ?>" class="btn btn-outline btn-sm" target="_blank" rel="noopener" data-i18n="prod_try">
                    <?php esc_html_e('Try demo', 'luxora'); ?>
                  </a>
                  <?php endif; ?>
                  <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="btn btn-teal btn-sm" data-i18n="prod_buy">
                    <?php esc_html_e('Buy', 'luxora'); ?>
                  </a>
                </div>
              </div>
            </div>

          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php else : ?>
      <p class="text-center body-md" style="padding:var(--s10) 0;">
        <?php esc_html_e('Products coming soon. Check back shortly.', 'luxora'); ?>
      </p>
      <?php endif; ?>

    <?php else : ?>
      <!-- WooCommerce not active: static placeholder -->
      <p class="text-center body-md"><?php esc_html_e('Install WooCommerce to display products here.', 'luxora'); ?></p>
    <?php endif; ?>

    <div class="flex-center mt-10">
      <a href="<?php echo esc_url( class_exists('WooCommerce') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop/') ); ?>" class="btn btn-ghost" data-i18n="prod_see_all">
        <?php esc_html_e('See all products', 'luxora'); ?> <span class="arrow">→</span>
      </a>
    </div>
  </div>
</section>

<!-- ================================================================
     FREE TOOL STRIP
     ================================================================ -->
<section class="tool-strip" id="free-tool">
  <div class="container">
    <div class="tool-strip-grid">
      <div class="on-dark">
        <div class="ts-label" data-i18n="ts_label">
          <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><circle cx="12" cy="12" r="10"/></svg>
          <?php esc_html_e('Free · No signup needed', 'luxora'); ?>
        </div>
        <h2 class="ts-h2" data-i18n="ts_h2">
          <?php esc_html_e('Find your break-even point in 30 seconds.', 'luxora'); ?>
        </h2>
        <p class="ts-body" data-i18n="ts_body">
          <?php esc_html_e('Enter your fixed costs, selling price, and variable cost. Get your break-even units and revenue instantly — in USD or VND.', 'luxora'); ?>
        </p>
        <div class="ts-ctas">
          <a href="<?php echo esc_url(home_url('/free-tool/')); ?>" class="btn btn-teal btn-lg" data-i18n="ts_cta1">
            <?php esc_html_e('Use the free calculator', 'luxora'); ?>
          </a>
          <a href="<?php echo esc_url(home_url('/free-tool/')); ?>" class="btn btn-ghost-white" data-i18n="ts_cta2">
            <?php esc_html_e('Share with your team →', 'luxora'); ?>
          </a>
        </div>
      </div>

      <!-- Mini calculator preview (static, decorative) -->
      <div>
        <div class="calc-preview" aria-hidden="true">
          <div class="cp-title" data-i18n="ts_calc_title"><?php esc_html_e('Break-Even Calculator', 'luxora'); ?></div>
          <div class="cp-field"><div class="cp-label" data-i18n="ts_calc_f1"><?php esc_html_e('Fixed costs / month', 'luxora'); ?></div><div class="cp-input-row"><span class="cp-prefix">$</span><span class="cp-value">12,500</span></div></div>
          <div class="cp-field"><div class="cp-label" data-i18n="ts_calc_f2"><?php esc_html_e('Selling price / unit', 'luxora'); ?></div><div class="cp-input-row"><span class="cp-prefix">$</span><span class="cp-value">80</span></div></div>
          <div class="cp-field"><div class="cp-label" data-i18n="ts_calc_f3"><?php esc_html_e('Variable cost / unit', 'luxora'); ?></div><div class="cp-input-row"><span class="cp-prefix">$</span><span class="cp-value">40</span></div></div>
          <div class="cp-results">
            <div class="cp-result"><div class="cp-result-val" id="cp-r1">313 <?php esc_html_e('units', 'luxora'); ?></div><div class="cp-result-lbl" data-i18n="ts_calc_r1"><?php esc_html_e('Break-even units', 'luxora'); ?></div></div>
            <div class="cp-result"><div class="cp-result-val" id="cp-r2">$25,040</div><div class="cp-result-lbl" data-i18n="ts_calc_r2"><?php esc_html_e('Break-even revenue', 'luxora'); ?></div></div>
          </div>
          <a href="<?php echo esc_url(home_url('/free-tool/')); ?>" class="cp-cta-link" data-i18n="ts_calc_link">
            <?php esc_html_e('Try the full version →', 'luxora'); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================================================================
     FINAL CTA
     ================================================================ -->
<section class="cta-band">
  <div class="container">
    <div class="cta-band-inner">
      <h2 class="display-lg" data-i18n="cta_h2"><?php esc_html_e('Ready to see your numbers clearly?', 'luxora'); ?></h2>
      <p class="lead mt-4" data-i18n="cta_body"><?php esc_html_e('Try any product live. Pay only if it works for you. Instant access after purchase.', 'luxora'); ?></p>
      <div class="cta-band-actions mt-8">
        <a href="<?php echo esc_url( class_exists('WooCommerce') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop/') ); ?>" class="btn btn-primary btn-lg" data-i18n="cta_btn1"><?php esc_html_e('Browse the Catalog', 'luxora'); ?></a>
        <a href="<?php echo esc_url(home_url('/free-tool/')); ?>" class="btn btn-outline btn-lg" data-i18n="cta_btn2"><?php esc_html_e('Try the Free Tool', 'luxora'); ?></a>
      </div>
      <p class="cta-guarantee">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        <span data-i18n="cta_guar"><?php esc_html_e('14-day money-back guarantee — no questions asked', 'luxora'); ?></span>
      </p>
    </div>
  </div>
</section>

<?php get_footer(); ?>
