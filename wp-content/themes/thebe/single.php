<?php 

$my_post_type = get_post_type( $post );
$heroCount = 0;
get_header(); 
?>


<?php if($my_post_type == 'thebe_client'){ ?>

<div id="client-page" class="row">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
		$postid = get_the_ID();
		$post_categories = wp_get_post_categories( $postid );
		$cats = array();
		foreach($post_categories as $c){
			$cat = get_category( $c );
			if($cat->slug != 'featured-work' ){
				$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
			}
		}
	?>

	
	<div class="col-sm-9 col-sm-push-3 col-xs-12">
		<div class="home-hero-holder">
		<?php if(get_field('work_images')): ?>
	
			<?php while(has_sub_field('work_images')): 
				$workImage = get_sub_field('image');
				$linkType = get_sub_field('link_type');
				switch ($linkType) {
          case "page":
            $linkAttr =  get_sub_field('page_link');
            break;
          case "offsite":
            $linkAttr =  get_sub_field('offsite_link');
            break;
          case "video":
            $linkAttr =  get_sub_field('video_link');
            break;
          default:
            $linkAttr =  'none';
        }
			?> 
			
			<?php if($linkType != 'none'){ ?>
			<div class="home-hero-single hh-link" data-link="<?php echo $linkAttr; ?>" data-link-type="<?php echo $linkType; ?>">
			<?php }else{ ?>
			<div class="home-hero-single">
			<?php } ?>
				<img class="img-responsive hcount<?php echo $heroCount; ?>" alt="<?php echo $workImage['alt']; ?>" title="<?php echo $workImage['title']; ?>" src="<?php echo $workImage['url']; ?>" />
			</div>
			<?php endwhile; ?>

		<?php endif; ?>
		
		<img class="img-responsive client-blank blank-sizer" src="<?php bloginfo('template_directory'); ?>/images/blanks/client-blank.jpg" alt="blank-sizer" />
		<div class="clear"></div>	 
		</div><!-- END HOME HERO  -->
		
		<div class="slide-count-holder clearfix">
	    <div class="arrow-holder arrow-right" data-direction="r"><span class="glyphicon glyphicon-chevron-right"></span></div>
	    <div class="slide-count">(<span class="hh-curr-num">1</span>/<span class="hh-total">12</span>)</div>
	    <div class="arrow-holder arrow-left" data-direction="l"><span class="glyphicon glyphicon-chevron-left"></div>
	  </div>
	</div>


	
	<div class="col-sm-3 col-sm-pull-9 client-copy">
	
		
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
		<div class="client-cat-list">
		
		Similar Work: <br/>
		<span>
		<?php	
			$counter = 0;
			$totalCount = count($cats);
			
			foreach($cats as $c) {
				if( $counter < (count($cats)-1)){
					echo '<a href="' . home_url() . '/work/' . $c['slug'] . '">' . $c['name'] . '</a>, '; 
					}else{
					echo '<a href="' . home_url() . '/work/' . $c['slug'] . '">' . $c['name'] . '</a>';   
					}
				$counter++;
			}
							
			?>
			</span>			
		
		</div>
		
		
	  <?php endwhile; wp_reset_query(); ?>
	</div>
	
</div>


<?php }else{ ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <h1><?php the_title(); ?></h1>
  <?php the_content(); ?>
<?php endwhile; wp_reset_query(); ?>

<?php } ?>


<?php get_footer(); ?>
