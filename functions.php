<?php
/**
 * Seraphim X.
 *
 * This file adds functions to the Seraphim X Theme.
 *
 * @package Seraphim X
 * @author  Rafael Mendoza
 * @license GPL-2.0-or-later
 * @link    https://github.com/akosiraffytot
 */

 
//* Starts the engine.
require_once get_template_directory() . '/lib/init.php';


//* Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';


//* Add critical css.
require_once get_stylesheet_directory() . '/lib/theme-critical-styles.php';


//* Sets localization (do not remove).
add_action( 'after_setup_theme', 'seraphimx_localization_setup' );
function seraphimx_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );

}


//* Adds theme page optimization.
// require_once get_stylesheet_directory() . '/lib/theme-optimizer.php';


//* Adds Gutenberg opt-in features and styling.
add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
function genesis_child_gutenberg_support() { 
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}


//* Enqueues scripts and styles.
add_action( 'wp_enqueue_scripts', 'seraphimx_enqueue_scripts_styles' );
function seraphimx_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_script(
		genesis_get_theme_handle() . '-sidr-js',
		get_stylesheet_directory_uri() . '/lib/assets/sidr-js/jquery.sidr.min.js',
		['jquery'],
		null,
		true
	);

	wp_enqueue_script(
		genesis_get_theme_handle() . '-global',
		get_stylesheet_directory_uri() . '/lib/assets/js/global-scripts.js',
		['jquery'],
		null,
		true
	);

	// Remove Gutenberg Block Resources and Library from homepage
	if ( is_home() || is_front_page() ) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-block-style' );
	}

	// remove superfish
	wp_deregister_script( 'superfish' );
	wp_deregister_script( 'superfish-args' );

}


//* Add additional classes to the body element.
add_filter( 'body_class', 'seraphimx_body_classes' );
function seraphimx_body_classes( $classes ) {

	$classes[] = 'seraphimx ';
	
	return $classes;
}


//* Add preconnect for Google Fonts.
add_filter( 'wp_resource_hints', 'seraphimx_resource_hints', 10, 2 );
function seraphimx_resource_hints( $urls, $relation_type ) {

	if ( wp_style_is( genesis_get_theme_handle() . '-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = [
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		];
	}

	/*
	if ( 'preconnect' === $relation_type ) {
		$urls[] = [
			'href' => 'https://www.google-analytics.com'
		];
	}
	*/

	return $urls;
}


//* Add desired theme supports.
add_action( 'after_setup_theme', 'seraphimx_theme_support', 9 );
function seraphimx_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}


//* Add desired post type supports.
add_action( 'after_setup_theme', 'seraphimx_post_type_support', 9 );
function seraphimx_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}


//* Adds image sizes.
//add_image_size( 'sidebar-featured', 75, 75, true );


//* Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );


//* Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );


//* Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );


//* Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );


//* Add mobile navigation menu.
/* add_action( 'genesis_header', function(){

	$menu = '<div class="mobile-nav">';
		$menu .= '<span class="mobile-nav-toggle"><i class="fas fa-solid fa-bars"></i></span>';
	$menu .= '</div>';

	echo $menu;

}, 10); */


//* Reduces secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'seraphimx_secondary_menu_args' );
function seraphimx_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}


//* Modifies size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'seraphimx_author_box_gravatar' );
function seraphimx_author_box_gravatar( $size ) {
	return 90;
}


//* Modifies size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'seraphimx_comments_gravatar' );
function seraphimx_comments_gravatar( $args ) {
	$args['avatar_size'] = 60;
	return $args;
}


//* Add Site name shortcode
add_shortcode( 'sitename', function() { return get_bloginfo(); } );


//* Add Go To Top link
add_action( 'genesis_after_footer', function() {
	echo '<span class="gotop">UP</span>';
});


//* Disable automatic WordPress plugin and theme updates:
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

//* Remove the site title
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );

//* Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );


//* Remove default theme logo markup
remove_action( 'after_setup_theme', 'genesis_output_custom_logo', 11 );


//* Add new logo with custom markup
add_action( 'genesis_site_title', function(){

	$dir = get_stylesheet_directory_uri() . '/images';

	$x = '<a href="'. get_bloginfo('url') .'" class="custom-logo-link" rel="home" aria-current="page">';

	
		
		$x .= '<img src="'. $dir .'/logo.png" alt="Logo" srcset="'. $dir .'/logo.png 185w, '. $dir .'/logo-mobile.png 370w" sizes="(max-width: 640px) 370px, 185px" width="185" height="25" style="max-width: 100%; height: auto;" class="custom-logo">';

	$x .='</a>';
 
	echo $x;

});


//* Register widget areas.
genesis_register_sidebar( array(
	'id'          => 'home-widget-one',
	'name'        => __( 'Home - Widget One', 'seraphimx' ),
	'description' => __( 'This is the widget 1 section of the Home page.', 'seraphimx' ),
) );

genesis_register_sidebar( array(
	'id'          => 'home-widget-two',
	'name'        => __( 'Home - Widget Two', 'seraphimx' ),
	'description' => __( 'This is the widget 2 section of the Home page.', 'seraphimx' ),
) );