<?php
/**
 * Gutenberg theme support.
 *
 * @package Seraphim X
 * @author  Rafael Mendoza
 * @license GPL-2.0-or-later
 * @link    https://github.com/akosiraffytot
 */

//* Enqueues Gutenberg admin editor fonts and styles.

add_action( 'enqueue_block_editor_assets', 'seraphimx_block_editor_styles' );
function seraphimx_block_editor_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style(
		genesis_get_theme_handle() . '-gutenberg-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);

}

/**
 * Adds body classes to help with block styling.
 *
 * - `has-no-blocks` if content contains no blocks.
 * - `first-block-[block-name]` to allow changes based on the first block (such as removing padding above a Cover block).
 * - `first-block-align-[alignment]` to allow styling adjustment if the first block is wide or full-width.
 *
 * @param array $classes The original classes.
 * @return array The modified classes.
 */
add_filter( 'body_class', 'seraphimx_blocks_body_classes' );
function seraphimx_blocks_body_classes( $classes ) {

	if ( ! is_singular() || ! function_exists( 'has_blocks' ) || ! function_exists( 'parse_blocks' ) ) {
		return $classes;
	}

	if ( ! has_blocks() ) {
		$classes[] = 'has-no-blocks';
		return $classes;
	}

	$post_object = get_post( get_the_ID() );
	$blocks      = (array) parse_blocks( $post_object->post_content );

	if ( isset( $blocks[0]['blockName'] ) ) {
		$classes[] = 'first-block-' . str_replace( '/', '-', $blocks[0]['blockName'] );
	}

	if ( isset( $blocks[0]['attrs']['align'] ) ) {
		$classes[] = 'first-block-align-' . $blocks[0]['attrs']['align'];
	}

	return $classes;

}

// Add support for editor styles.
add_theme_support( 'editor-styles' );

// Enqueue editor styles.
add_editor_style( '/lib/gutenberg/style-editor.css' );

// Adds support for block alignments.
add_theme_support( 'align-wide' );

// Make media embeds responsive.
add_theme_support( 'responsive-embeds' );

// Add support for custom line heights.
add_theme_support( 'custom-line-height' );

// Add support for custom units.
add_theme_support( 'custom-units' );

add_action( 'after_setup_theme', 'seraphimx_content_width', 0 );
/**
 * Set content width to match the “wide” Gutenberg block width.
 */
function seraphimx_content_width() {

	$appearance = genesis_get_config( 'appearance' );

	$GLOBALS['content_width'] = apply_filters( 'seraphimx_content_width', $appearance['content-width'] );

}
