<?php
/**
 * Seraphim X
 * 
 * This file adds the front page to the Seraphim X Theme.
 *
 * @package Seraphim X
 * @author  Rafael Mendoza
 * @license GPL-2.0-or-later
 * @link    https://github.com/akosiraffytot
 */

/**
 * Enqueque critical style
 */
add_action( 'wp_enqueue_scripts', 'seraphimx_home_inline_critical_css', 1 );
function seraphimx_home_inline_critical_css() {

	$critical_handle = genesis_get_theme_handle() . '-critical-home';
	
	wp_register_style( $critical_handle , false );
	
	wp_enqueue_style( $critical_handle );

	$critical_css = "
		/* front-page critical css */
		
		.home .site-inner {
			margin-bottom: 0;
		}

	";
	
	wp_add_inline_style( $critical_handle, $critical_css );

}


//* Enqueues homepage scripts and styles.
add_action( 'wp_enqueue_scripts', 'seraphimx_home_enqueue_scripts_styles' );
function seraphimx_home_enqueue_scripts_styles() {
}


add_action( 'genesis_meta', 'seraphimx_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 * @since 3.0.0
 */
function seraphimx_home_genesis_meta() {

	if ( is_active_sidebar( 'home-widget-one' ) || is_active_sidebar( 'home-widget-two' ) ) {

		// Force content-sidebar layout setting.
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

		// Add magazine-home body class.
		add_filter( 'body_class', 'seraphimx_home_body_class' );

		// Remove the default Genesis loop.
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		// Add homepage widgets.
		add_action( 'genesis_loop', 'seraphimx_homepage_widgets' );

		//* Add support for structural wraps

	}

}

// Add body class to front page.
function seraphimx_home_body_class( $classes ) {

	$classes[] = 'seraphimx-home';

	return $classes;

}

// Output the widget areas for the front page.
function seraphimx_homepage_widgets() {

	echo '<h2 class="screen-reader-text">' . __( 'Main Content', 'magazine-pro' ) . '</h2>';
	
	genesis_widget_area( 'home-widget-one', array(
		'before' => '<div class="home-widget-one home-widget-area widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	genesis_widget_area( 'home-widget-two', array(
		'before' => '<div class="home-widget-two home-widget-area widget-area  has-bg"><div class="wrap">',
		'after'  => '</div></div>',
	) );	
}


// add_action( 'wp_footer', 'seraphimx_homepage_footer_scripts', 100 ); 
function seraphimx_homepage_footer_scripts(){
	?>
		<script>
			jQuery(document).ready(function($){});
		</script>
	<?php
}

// Run the Genesis loop.
genesis();
