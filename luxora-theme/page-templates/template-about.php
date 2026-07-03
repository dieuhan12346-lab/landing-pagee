<?php
/**
 * Template Name: Về tôi (About)
 * Template Post Type: page
 */
get_header();
?>
<main id="lx-main" class="lx-main">

  <div class="page-hero center">
    <div class="container">
      <span class="eyebrow" data-i18n="about_eyebrow"><?php esc_html_e('Về tôi · About', 'luxora'); ?></span>
      <h1 class="display-lg" style="margin-top:var(--s3);" data-i18n="about_h1"><?php esc_html_e('Finance tools built by someone who ran the numbers', 'luxora'); ?></h1>
      <p class="lead" style="margin-top:var(--s5);max-width:560px;margin-inline:auto;" data-i18n="about_sub">
        <?php esc_html_e("I build the dashboards I wish I'd had when I was running a small business — clear, honest, and designed to surface problems before they become crises.", 'luxora'); ?>
      </p>
    </div>
  </div>

  <section class="section section-white">
    <div class="container">
      <div style="display:grid;grid-template-columns:1fr 1.4fr;gap:var(--s16);align-items:start;max-width:960px;margin:0 auto;">

        <!-- Photo placeholder -->
        <div style="background:var(--navy-50);border-radius:var(--r-xl);aspect-ratio:3/4;display:flex;align-items:center;justify-content:center;font-size:4rem;color:var(--navy-100);">
          👤
        </div>

        <!-- Bio -->
        <div class="entry-content">
          <?php
          while ( have_posts() ) :
              the_post();
              the_content();
          endwhile;

          // Fallback content when no WP content set yet
          if ( ! get_the_content() ) : ?>
          <p class="lead" style="color:var(--navy);margin-bottom:var(--s5);">
            <?php esc_html_e("Hi, I'm the founder of Luxora.", 'luxora'); ?>
          </p>
          <p class="body-md" style="margin-bottom:var(--s5);">
            <?php esc_html_e("I've spent years helping small and medium businesses understand their finances — not through big accounting software, but through clear, visual tools that show what's actually happening week by week.", 'luxora'); ?>
          </p>
          <p class="body-md" style="margin-bottom:var(--s6);">
            <?php esc_html_e("Every product in this store is something I built because I needed it, tested it on real businesses, and refined until it actually worked. No fluff, no filler — just tools that do the job.", 'luxora'); ?>
          </p>

          <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--s4);margin-bottom:var(--s8);">
            <?php
            $credentials = [
                ['icon' => '📊', 'text' => '13-week cash flow model used by 50+ businesses'],
                ['icon' => '🛠',  'text' => 'Built in Google Sheets — no software to install'],
                ['icon' => '🌏', 'text' => 'Supports both USD and VND pricing'],
                ['icon' => '🔒', 'text' => 'Instant delivery after purchase'],
            ];
            foreach ($credentials as $c) :
            ?>
            <div style="display:flex;gap:var(--s3);align-items:flex-start;padding:var(--s4);background:var(--surface);border-radius:var(--r-md);">
              <span style="font-size:1.2rem;flex-shrink:0;"><?php echo esc_html($c['icon']); ?></span>
              <span class="body-sm"><?php echo esc_html($c['text']); ?></span>
            </div>
            <?php endforeach; ?>
          </div>

          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary" data-i18n="about_cta">
            <?php esc_html_e('Get in touch', 'luxora'); ?>
          </a>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
