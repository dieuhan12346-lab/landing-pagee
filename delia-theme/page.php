<?php get_header(); ?>

<div class="delia-page">
    <div class="page-hero">
        <div class="page-hero-content">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
