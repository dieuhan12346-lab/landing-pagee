<?php
/**
 * Template Name: Công cụ miễn phí (Free Tool)
 * Template Post Type: page
 *
 * Break-even calculator embed. Uses luxora-main.js for calculations.
 * After user gets a result, an email capture (Brevo / Mailchimp) appears.
 */
get_header();
?>
<main id="lx-main" class="lx-main">

  <div class="page-hero center">
    <div class="container">
      <span class="eyebrow">
        <span style="color:var(--gain);margin-right:4px;">●</span>
        <span data-i18n="ft_eyebrow"><?php esc_html_e('Free · No signup needed', 'luxora'); ?></span>
      </span>
      <h1 class="display-lg" style="margin-top:var(--s3);" data-i18n="ft_h1"><?php esc_html_e('Break-Even Calculator', 'luxora'); ?></h1>
      <p class="lead" style="margin-top:var(--s4);max-width:520px;margin-inline:auto;" data-i18n="ft_sub">
        <?php esc_html_e('Enter your three numbers. Get your break-even units and revenue instantly — in USD or VND.', 'luxora'); ?>
      </p>
    </div>
  </div>

  <section class="section section-white">
    <div class="container">
      <div class="calc-layout" style="max-width:900px;margin:0 auto;">

        <!-- Input panel -->
        <div class="calc-card">
          <div class="calc-card-title" data-i18n="ft_input_title"><?php esc_html_e('Your Numbers', 'luxora'); ?></div>

          <div class="calc-field">
            <label class="calc-label" for="fc" data-i18n="ft_f1"><?php esc_html_e('Fixed costs per month', 'luxora'); ?></label>
            <div class="calc-input-wrap">
              <span class="calc-input-prefix">$</span>
              <input type="number" id="fc" class="calc-input" placeholder="12500" min="0" step="100" inputmode="numeric">
            </div>
            <span class="calc-hint" data-i18n="ft_h1_hint"><?php esc_html_e('Rent, salaries, subscriptions — costs that stay the same regardless of sales.', 'luxora'); ?></span>
          </div>

          <div class="calc-field">
            <label class="calc-label" for="sp" data-i18n="ft_f2"><?php esc_html_e('Selling price per unit', 'luxora'); ?></label>
            <div class="calc-input-wrap">
              <span class="calc-input-prefix">$</span>
              <input type="number" id="sp" class="calc-input" placeholder="80" min="0" step="1" inputmode="numeric">
            </div>
            <span class="calc-hint" data-i18n="ft_h2_hint"><?php esc_html_e('What you charge one customer for one sale.', 'luxora'); ?></span>
          </div>

          <div class="calc-field">
            <label class="calc-label" for="vc" data-i18n="ft_f3"><?php esc_html_e('Variable cost per unit', 'luxora'); ?></label>
            <div class="calc-input-wrap">
              <span class="calc-input-prefix">$</span>
              <input type="number" id="vc" class="calc-input" placeholder="40" min="0" step="1" inputmode="numeric">
            </div>
            <span class="calc-hint" data-i18n="ft_h3_hint"><?php esc_html_e('Cost of materials, delivery, or commissions per sale.', 'luxora'); ?></span>
          </div>

          <button class="btn btn-teal btn-lg" id="calc-btn" style="width:100%;margin-top:var(--s2);" data-i18n="ft_calc_btn">
            <?php esc_html_e('Calculate', 'luxora'); ?>
          </button>
          <p class="form-note text-center" style="margin-top:var(--s3);" data-i18n="ft_no_data"><?php esc_html_e('We never store your data.', 'luxora'); ?></p>
        </div>

        <!-- Results panel -->
        <div>
          <div class="results-card" id="results-card">
            <div class="results-title" data-i18n="ft_results_title"><?php esc_html_e('Your break-even point', 'luxora'); ?></div>

            <div class="result-row">
              <div class="result-label" data-i18n="ft_r1"><?php esc_html_e('Break-even units / month', 'luxora'); ?></div>
              <div class="result-val accent" id="r-units">—</div>
            </div>
            <div class="result-row">
              <div class="result-label" data-i18n="ft_r2"><?php esc_html_e('Break-even revenue / month', 'luxora'); ?></div>
              <div class="result-val" id="r-revenue">—</div>
            </div>
            <div class="result-row">
              <div class="result-label" data-i18n="ft_r3"><?php esc_html_e('Contribution margin per unit', 'luxora'); ?></div>
              <div class="result-val sm" id="r-margin">—</div>
            </div>
            <div class="result-row">
              <div class="result-label" data-i18n="ft_r4"><?php esc_html_e('Margin rate', 'luxora'); ?></div>
              <div class="result-val sm" id="r-rate">—</div>
            </div>

            <div class="margin-bar-wrap">
              <div class="margin-bar-labels">
                <span data-i18n="ft_bar_lo"><?php esc_html_e('Low margin', 'luxora'); ?></span>
                <span data-i18n="ft_bar_hi"><?php esc_html_e('High margin', 'luxora'); ?></span>
              </div>
              <div class="margin-bar-track"><div class="margin-bar-fill" id="margin-bar"></div></div>
            </div>
          </div>

          <div class="results-explanation" id="results-explanation">
            <!-- JS-injected explanation text -->
          </div>

          <!-- Email capture (appears after first calculation) -->
          <div class="email-capture-band" id="email-capture">
            <h3 data-i18n="ft_email_h"><?php esc_html_e('Want this as a full dashboard?', 'luxora'); ?></h3>
            <p data-i18n="ft_email_body">
              <?php esc_html_e("Send me your result and I'll follow up with a link to the full Break-Even & Scenario Planner spreadsheet — includes 12-month projections and sensitivity analysis.", 'luxora'); ?>
            </p>
            <div class="email-row">
              <input type="email" class="email-input" id="capture-email" placeholder="<?php esc_attr_e('you@email.com', 'luxora'); ?>" data-i18n-placeholder="ft_email_ph">
              <button class="btn btn-teal" id="capture-submit" data-i18n="ft_email_btn">
                <?php esc_html_e('Send me the tool', 'luxora'); ?>
              </button>
            </div>
            <p class="email-privacy" data-i18n="ft_email_privacy">
              <?php esc_html_e('No spam. One follow-up email only. Unsubscribe any time.', 'luxora'); ?>
            </p>
          </div>
        </div>

      </div><!-- /calc-layout -->

      <!-- FAQ section -->
      <div style="max-width:680px;margin:var(--s16) auto 0;">
        <h2 class="display-sm" style="margin-bottom:var(--s6);" data-i18n="ft_faq_h"><?php esc_html_e('Frequently asked questions', 'luxora'); ?></h2>
        <div class="faq-list">
          <?php
          $faqs = [
              ['q' => 'What is a break-even point?', 'a' => 'Your break-even point is the number of units (or amount of revenue) you need to sell each month before you start making a profit. Below it you lose money; above it you make money.', 'q_i18n' => 'ft_faq1_q', 'a_i18n' => 'ft_faq1_a'],
              ['q' => 'Why is the formula CEILING(Fixed Costs ÷ (Price − Variable Cost))?', 'a' => "Because you can't sell a fraction of a unit. The contribution margin (Price − Variable Cost) is how much each sale contributes toward covering your fixed costs. Dividing fixed costs by contribution margin gives the exact number; CEILING rounds up to the next whole unit.", 'q_i18n' => 'ft_faq2_q', 'a_i18n' => 'ft_faq2_a'],
              ['q' => 'How do I use this in VND?', 'a' => 'Switch the currency toggle to VND. Your results will automatically convert using the live USD/VND rate. You can also enter your numbers directly in USD and toggle to see the VND equivalent.', 'q_i18n' => 'ft_faq3_q', 'a_i18n' => 'ft_faq3_a'],
              ['q' => "What if my margin is very low?", 'a' => "A low contribution margin (under 30%) means you need a lot of volume to cover fixed costs. Common fixes: raise prices, reduce variable cost (negotiate with suppliers), or cut fixed costs.", 'q_i18n' => 'ft_faq4_q', 'a_i18n' => 'ft_faq4_a'],
          ];
          foreach ($faqs as $faq) :
          ?>
          <div class="faq-item">
            <button class="faq-question" aria-expanded="false" data-i18n="<?php echo esc_attr($faq['q_i18n']); ?>">
              <?php echo esc_html($faq['q']); ?>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-answer">
              <div class="faq-answer-inner" data-i18n="<?php echo esc_attr($faq['a_i18n']); ?>"><?php echo esc_html($faq['a']); ?></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div><!-- /container -->
  </section>

</main>
<?php get_footer(); ?>
