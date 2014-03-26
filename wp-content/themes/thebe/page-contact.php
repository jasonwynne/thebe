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
	<?php
	  $mapImage = get_field('map_image');
	  $mapLink = get_field('map_link');
	  
	  if($mapLink == "" || $mapLink == null ){
	?>
    <img class="img-responsive" alt="<?php echo $mapImage['alt']; ?>" title="<?php echo $mapImage['title']; ?>" src="<?php echo $mapImage['url']; ?>" />
	<?php }else{ ?>
		<a href="<?php echo $mapLink ?>">
    <img class="img-responsive" alt="<?php echo $mapImage['alt']; ?>" title="<?php echo $mapImage['title']; ?>" src="<?php echo $mapImage['url']; ?>" />
		</a> 
	<?php } ?>
	</div>
	<?php endwhile; wp_reset_query(); ?>



</div>

<?php get_footer(); ?>