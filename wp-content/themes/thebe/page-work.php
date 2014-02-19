<?php 
/* Template Name: Work Page */

$pageTitle = get_the_title();
global $post;
$slug = $post->post_name;

get_header(); 

?>


<?php if(is_page('work')){ ?>



<?php }else{?>

<div id="normal-page" class="row">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="col-md-3 col-xs-12">
			<div class="page-title-holder"><?php echo $pageTitle; ?></div>
	</div>
	<div class="col-md-9 col-xs-12 work-copy">
			<?php the_content(); ?>
	</div>
	<?php endwhile; wp_reset_query(); ?>
</div>

<?php } ?>

<?php get_footer(); ?>