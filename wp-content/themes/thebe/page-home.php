<?php
  /* Template Name: Home Page */
  get_header();
  
  $heroCount = 0;
?>



<?php get_header(); ?>

<div class="row">

	<div class="col-xs-12">

  <div class="home-hero-holder clearfix">	      
		<?php if(get_field('home_hero_slideshow')): ?>
	
			<?php while(has_sub_field('home_hero_slideshow')): 
				$hhImage = get_sub_field('home_hero_image');
				$linkType = get_sub_field('link_type');
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
			  <?php if($heroCount==0){?>
				<img class="img-responsive hcount<?php echo $heroCount; ?>" alt="<?php echo $hhImage['alt']; ?>"src="<?php echo $hhImage['url']; ?>" onload="setDivHeight();"/>
			  <?php }else{ ?>
				<img class="img-responsive hcount<?php echo $heroCount; ?>" alt="<?php echo $hhImage['alt']; ?>" title="<?php echo $hhImage['title']; ?>" src="<?php echo $hhImage['url']; ?>" />
			  <?php } ?>
			</div>
			<?php $heroCount = $heroCount+1; ?>
			
			<?php endwhile; ?>
        
		<?php endif; ?>
		<img class="img-responsive hh-blank blank-sizer" src="<?php bloginfo('template_directory'); ?>/images/blanks/hh-blank.jpg" alt="blank-sizer" />
		<div class="clear"></div>	  	
		</div>
	</div> <!-- End Home Hero Holder -->
	
	<div class="col-xs-12 slide-count-holder clearfix">
	  <div class="arrow-holder arrow-right" data-direction="r"><span class="glyphicon glyphicon-chevron-right"></span></div>
	  <div class="slide-count">(<span class="hh-curr-num">1</span>/<span class="hh-total">12</span>)</div>
	  <div class="arrow-holder arrow-left" data-direction="l"><span class="glyphicon glyphicon-chevron-left"></div>
	</div>


</div>




<?php get_footer(); ?>

<script type="text/javascript">

	
</script>