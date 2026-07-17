<?php get_header(); ?>
<main class="page is-active" style="display:block">
	<div class="wrap" style="padding:120px 0 80px">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1 style="font-family:var(--font-serif)"><?php the_title(); ?></h1>
			<div class="rich"><?php the_content(); ?></div>
		<?php endwhile; else : ?>
			<h1 style="font-family:var(--font-serif)">Nothing here yet</h1>
		<?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>
