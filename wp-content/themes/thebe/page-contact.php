<?php

/*
Template Name: Contact  
*/


get_header(); 
?>

<div id="contact-page" class="row">


	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="col-sm-3 col-xs-12">
		<div class="page-title-holder"><?php the_title(); ?></div>
		<div class="contact-copy"><?php the_content(); ?></div>
	</div>
	<div class="col-sm-9 col-xs-12">
	  <a href="http://mapq.st/1kFHGIm">
		  <img class="img-responsive" alt="thebe-map" title="click to view on google maps" src="<?php bloginfo('template_directory'); ?>/images/thebe-map.jpg" />
		</a> 
	</div>
	<?php endwhile; wp_reset_query(); ?>



</div>

<?php get_footer(); ?>