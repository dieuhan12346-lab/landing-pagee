<?php
/**
 * Generic page template.
 * Used for standard WordPress pages (About, Contact, etc.)
 * unless a more specific page template overrides it.
 */
get_header();
?>
<main id="lx-main" class="lx-main">
  <?php while ( have_posts() ) : the_post(); ?>

    <div class="page-hero center">
      <div class="container">
        <?php if ( has_category() || has_tag() ) :
            $terms = get_the_terms(get_the_ID(), 'category');
            if ( $terms ) : ?>
            <span class="eyebrow"><?php echo esc_html($terms[0]->name); ?></span>
        <?php endif; endif; ?>
        <h1 class="display-lg" style="margin-top:var(--s3);"><?php the_title(); ?></h1>
        <?php if ( has_excerpt() ) : ?>
          <p class="lead" style="margin-top:var(--s4);max-width:600px;margin-inline:auto;"><?php the_excerpt(); ?></p>
        <?php endif; ?>
      </div>
    </div>

    <div class="section section-white">
      <div class="container">
        <div class="entry-content legal-content" style="max-width:800px;margin:0 auto;">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

  <?php endwhile; ?>
</main>
<?php get_footer(); ?>
