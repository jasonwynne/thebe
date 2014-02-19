<?php get_header(); ?>

<div id="normal-page" class="row">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="col-md-3">
		<div class="page-title-holder"><?php the_title(); ?></div>
	</div>
	<div class="col-md-9">
		<?php the_content(); ?>
	</div>
	<?php endwhile; wp_reset_query(); ?>
</div>

<?php get_footer(); ?>