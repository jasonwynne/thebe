<?php

/*
Template Name: Clients
*/


get_header(); 
?>

<div id="normal-page" class="row">

	<div class="col-sm-3 col-xs-12">
		<div class="page-title-holder"><?php the_title(); ?></div>
	</div>
	<div class="col-sm-9 col-xs-12">
	 <ul class="clearfix"> 
    <?php if(get_field('client_list')): ?>
      <?php while(has_sub_field('client_list')): ?> 
    
      <li class="client-single" >
      <?php if(get_sub_field('has_link')==1){ ?>
      <a href="<?php echo get_sub_field('onsite_link'); ?>"><?php echo get_sub_field('client_name'); ?></a>
      <?php }else{ ?>
        <?php echo get_sub_field('client_name'); ?>
        <?php } ?>    
      </li>
      
      
      
      <?php endwhile; ?>
    <?php endif; ?>
	  </ul>
	</div>

</div>

<?php get_footer(); ?>