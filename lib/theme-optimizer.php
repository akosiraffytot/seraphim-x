<?php
/**
 * Invicta.
 *
 * This file adds the required functions for page optimization to Invicta Child Theme.
 *
 * @package Invicta
 * @author  Rafael Mendoza
 * @license GPL-2.0-or-later
 * @link    http://rafael.webpartnergroup.net/
 */

/**
 * Disable the emoji's
 */
add_action( 'init', 'invicta_disable_wp_emojis' );
function invicta_disable_wp_emojis() {

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'invicta_disable_wp_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'invicta_disable_wp_emojis_remove_dns_prefetch', 10, 2 );

}

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function invicta_disable_wp_emojis_tinymce( $plugins ) {

	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}

}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function invicta_disable_wp_emojis_remove_dns_prefetch( $urls, $relation_type ) {

	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;

}

/**
 * Dequeue WP Embed function
 */
add_action( 'wp_footer', 'my_deregister_scripts' );
function my_deregister_scripts(){
	wp_dequeue_script( 'wp-embed' );
}


/**
 * Add defer or async to js files
 */
function invicta_async_defer_js ( $url ) {
	// If file is not a .js file, do not alter
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	
	// Exclude jquery
	if ( strpos( $url, 'jquery.min.js' ) ) return $url;
	
	// Add defer tag to all JS files
	return "$url' defer defer='true";
}


/**
 * Check if login page
 */
function is_login_page() {
	return in_array(
		$GLOBALS['pagenow'], array(
			'wp-login.php'
		)
	);
}


/**
 * load function only on front page. do not load on admin dashboard and login page
 */
add_action( 'wp', function() {
	if ( ! is_admin() && ! is_login_page() ) {
		add_filter( 'clean_url', 'invicta_async_defer_js', 11, 1 );
	}
});


/**
 * Remove the Query Strings (version strings) from the resource URL
 */
add_filter( 'script_loader_src', 'invicta_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'invicta_remove_script_version', 15, 1 );
function invicta_remove_script_version( $src ) {
	$parts = explode( '?ver', $src );
	return $parts[0];
}

/**
 * Remove JQuery Migrate
 */
add_action( 'wp_default_scripts', 'invicta_remove_jquery_migrate' );
function invicta_remove_jquery_migrate( $scripts ) {
	if ( !is_admin() && isset( $scripts->registered['jquery'] ) ) {
		
		$script = $scripts->registered['jquery'];

		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}

	}
}