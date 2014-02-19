<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?php wp_title(); ?></title>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="container"> <!-- closed in footer.php -->	
	<div id="header" class="row">	
	  <div class="col-xs-12 mobile-header-container clearfix visible-xs">		
			<div class="mobile-header-img" style="margin-bottom: 5px;">
			  <img src="<?php bloginfo('template_directory'); ?>/images/thebe-logo.png" alt="Thebe & Co. Logo" />
			</div>
		  <div class="mobile-menu">
        <?php wp_nav_menu( array( 'menu' => 'mobile') ); ?>
      </div>
		</div>
		<div class="col-xs-12 header-container clearfix hidden-xs">		
			<a class="header-logo-img" href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/thebe-logo.png" alt="Thebe & Co. Logo" /></a>
		  <?php wp_nav_menu( array( 'menu' => 'main', 'menu_class' => 'clearfix' ) ); ?> 
		  <?php wp_nav_menu( array( 'menu' => 'social', 'menu_class' => 'clearfix' ) ); ?>
		</div>
		
		
		
    <div class="col-xs-12 line-space-row-top">
      <hr>
    </div>
<!-- 
		<div class="col-md-2 hidden-xs">
			<?php wp_nav_menu( array( 'menu' => 'social', 'menu_class' => 'list-inline' ) ); ?>
		</div>
 -->
	</div> <!-- END Header -->
