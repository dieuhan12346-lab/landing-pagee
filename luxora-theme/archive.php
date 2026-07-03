<?php
/**
 * Archive template (date, tag, author archives).
 * WooCommerce product archives use woocommerce/archive-product.php instead.
 */
get_header();
?>
<main id="lx-main" class="lx-main">
  <div class="container">
    <div class="page-hero">
      <span class="eyebrow"><?php esc_html_e('Archive', 'luxora'); ?></span>
      <h1 class="display-lg" style="margin-top:var(--s3);"><?php the_archive_title(); ?></h1>
      <?php if ( get_the_archive_description() ) : ?>
        <p class="lead" style="margin-top:var(--s4);"><?php the_archive_description(); ?></p>
      <?php endif; ?>
    </div>

    <?php if ( have_posts() ) : ?>
      <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:var(--s6);padding:var(--s8) 0;">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('lx-product-card'); ?>>
            <a href="<?php the_permalink(); ?>" class="lx-card-link">
              <?php if ( has_post_thumbnail() ) : ?>
              <div class="lx-card-thumb"><?php the_post_thumbnail('luxora-card'); ?></div>
              <?php endif; ?>
              <div class="lx-card-body">
                <h2 class="lx-card-title"><?php the_title(); ?></h2>
                <div class="lx-card-excerpt body-md"><?php the_excerpt(); ?></div>
              </div>
            </a>
          </article>
        <?php endwhile; ?>
      </div>
      <?php the_posts_navigation(); ?>
    <?php else : ?>
      <p style="padding:var(--s16) 0;text-align:center;" class="body-md"><?php esc_html_e('Nothing found.', 'luxora'); ?></p>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
