<?php
if ( function_exists( 'add_theme_support' ) ):
  add_theme_support( 'menus' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
endif;

if ( function_exists('register_sidebars') ):
  register_sidebar(array(
    'name'=>'Sidebar',
    'before_title'=>'<h4>',
    'after_title'=>'</h4>'
  ));
endif;

add_editor_style( 'css/editor-style.css' );

function my_init_method() {
  if (is_admin() == false ):
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script( 'bootstrap' );
    wp_register_script( 'global', get_template_directory_uri() . '/js/global.js');
    wp_enqueue_script( 'global' );
    wp_register_script( 'timer', get_template_directory_uri() . '/js/jquery.timer.js');
    wp_enqueue_script( 'timer' );
  endif;
}
add_action('init', 'my_init_method');


// Add Custom Post type for thebe
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'thebe_client',
		array(
			'labels' => array('name' => __( 'Clients' ), 'singular_name' => __( 'Client' )),
			'public' => true, 
			'has_archive' => true, 
			'rewrite' => array('slug' => 'clients'),
			'menu_icon' => 'dashicons-groups',
			'menu_position' => 5 // places menu item directly below Posts
		)
	);
}

add_action('init','add_categories_to_cpt');
function add_categories_to_cpt(){
    register_taxonomy_for_object_type('category', 'thebe_client');
}

// CUSTOM ADMIN LOGIN HEADER LOGO
function my_custom_login_logo() {
    echo '<style type="text/css">
        .login h1 a { background-image:url(' . get_bloginfo('template_directory') . '/images/thebe-wp-logo.png) !important;
		              background-size:269px 62px;
					  width:269px;
					  height:62px; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

 

?>