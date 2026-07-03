<?php
/**
 * Single post template.
 */
get_header();
?>
<main id="lx-main" class="lx-main">
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="page-hero center">
      <div class="container">
        <div class="breadcrumb">
          <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'luxora'); ?></a>
          <span>/</span>
          <span><?php the_title(); ?></span>
        </div>
        <h1 class="display-lg"><?php the_title(); ?></h1>
        <p class="body-sm" style="margin-top:var(--s3);">
          <?php echo get_the_date(); ?>
          <?php if ( get_the_author() ) : ?> &nbsp;·&nbsp; <?php the_author(); ?><?php endif; ?>
        </p>
      </div>
    </div>
    <div class="section section-white">
      <div class="container">
        <article class="entry-content legal-content" style="max-width:780px;margin:0 auto;">
          <?php the_content(); ?>
        </article>
      </div>
    </div>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>
