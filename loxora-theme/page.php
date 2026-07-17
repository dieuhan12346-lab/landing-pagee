<?php get_header(); ?>
<main class="page is-active" style="display:block">
	<div class="wrap" style="padding:120px 0 80px">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 style="font-family:var(--font-serif);margin-bottom:24px"><?php the_title(); ?></h1>
			<div class="rich"><?php the_content(); ?></div>
		<?php endwhile; ?>
	</div>
</main>
<?php get_footer(); ?>
