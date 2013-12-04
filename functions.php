<?php

require_once('radatomautoload.php');

function register_my_menus() {
  register_nav_menus(
    array(
      'menu-header' => __( 'Header Menu' ),
      'menu-footer' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function my_widgets_init() {
	register_sidebar(array(
	'name' => __( 'Sidebar' ),
	'id' => 'sidebar',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
	));

	//this is for the homepage reliability info
	register_sidebar(array(
	'name' => __( 'Plan Home-Page' ),
	'id' => 'plan',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
	));

	//this is for the efficient bit on the home page
	register_sidebar(array(
	'name' => __( 'Produce Home-Page' ),
	'id' => 'produce',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
	));

	//this is for the precise bit on the home page
	register_sidebar(array(
	'name' => __( 'Deploy Home-Page' ),
	'id' => 'deploy',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
	));

	//this is for the news letter
	register_sidebar(array(
	'name' => __( 'Footer News-Letter' ),
	'id' => 'footer-news-letter',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
	));

	//this is for the follow us section
	register_sidebar(array(
	'name' => __( 'Footer Follow-Us' ),
	'id' => 'footer-follow-us',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
	));

	//this is for the follow us section
	register_sidebar(array(
	'name' => __( 'Portfolio Widgets' ),
	'id' => 'portfolio',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
	));
}
add_action( 'init', 'my_widgets_init' );

//just a little dev trick that I use to make things simpler when using Foundation CSS
function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'my_filter_head');

//so we can have some featured images
add_theme_support( 'post-thumbnails' );

//keeping the generator tag hidden like a silly man
remove_action('wp_head', 'wp_generator');


function my_deregister_javascript() {
        if (!is_admin()) {
                wp_deregister_script('jquery');
        }
}
add_action( 'wp_enqueue_scripts', 'my_deregister_javascript', 100 );
?>