<?php
/**
 * Fallback template — required by WordPress.
 * Displays a list of recent posts when no more specific template matches.
 */
get_header();
?>
<main id="lx-main" class="lx-main">
  <div class="container">
    <div class="page-hero">
      <?php if ( is_home() && ! is_front_page() ) : ?>
        <h1 class="display-lg"><?php esc_html_e('Latest', 'luxora'); ?></h1>
      <?php else : ?>
        <h1 class="display-lg"><?php single_post_title(); ?></h1>
      <?php endif; ?>
    </div>

    <?php if ( have_posts() ) : ?>
      <div class="lx-posts-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:var(--s6);padding:var(--s10) 0;">
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

      <div style="display:flex;justify-content:center;padding:var(--s8) 0;">
        <?php the_posts_navigation(); ?>
      </div>

    <?php else : ?>
      <p style="padding:var(--s16) 0;text-align:center;" class="body-md">
        <?php esc_html_e('Nothing found here.', 'luxora'); ?>
      </p>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
