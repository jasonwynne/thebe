<?php 

  global $post;
	$postid = $post->ID;
	$postName = $post->post_name;
	$featuredCount = 0;
?>




<div class="row">
	<?php if (is_page('work')){ ?>
	<div class="col-xs-12">
	   <div class="page-title-holder">Client Stories</div> 
	<?php }else{ ?>
	<div class="col-xs-12 line-space-row-bottom">  
	  <hr>
	  <div class="page-title-holder" style="margin-top:15px;">Client Stories</div>
	<?php } ?>  
  </div>	
</div>


<div class="row" style="margin: 0 -5px;">
	
<?php
if($post->post_parent == 14 ) {
  $custom_query = new WP_Query( array('post_type' => 'thebe_client','category_name' => $postName, 'showposts' => -1 ));
}elseif(is_page('work')){
  $custom_query = new WP_Query( array('post_type' => 'thebe_client', 'showposts' => -1 ));
}else{
  $custom_query = new WP_Query( array('post_type' => 'thebe_client', 'post__not_in' => array($postid), 'category_name' => 'featured-work', 'showposts' => -1 ));
} 
while($custom_query->have_posts()) : $custom_query->the_post();
$postid = get_the_ID();
$featured_image = get_field('feature_work_image');
$featured_placard = get_field('feature_work_placard');
?>
	<div class="col-sm-3 col-xs-6 featured-work" data-link="<?php the_permalink(); ?>" data-post-id="<?php echo $postid ?>" style="padding: 5px;">
		<div class="fi-holder">
      <div class="fi-image">
          <img class="img-responsive fw-image fcount<?php echo $featuredCount; ?>" alt="<?php echo $featured_image['alt']; ?>" title="<?php echo $featured_image['title']; ?>" src="<?php echo $featured_image['url']; ?>" />
          <img class="img-responsive fw-placard" alt="<?php echo $featured_placard['alt']; ?>" title="<?php echo $featured_placard['title']; ?>" src="<?php echo $featured_placard['url']; ?>" />
      </div>
      <img class="img-responsive thumb-blank blank-sizer" src="<?php bloginfo('template_directory'); ?>/images/blanks/thumb-blank.jpg" alt="blank-sizer" />
		  <div class="clear"></div>	 
		</div>
	</div>
  
 <?php  $featuredCount = $featuredCount+1; ?>
<?php endwhile; wp_reset_query(); ?>
	

</div>

<script type="text/javascript">

	$(function () {

  	$('.featured-work').click(function(){
 		  window.location = $(this).attr('data-link');
 	  });
			
	}); // end doc ready for home page
		
</script>