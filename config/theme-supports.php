<?php
/**
 * Seraphim X.
 *
 * Theme supports.
 *
 * @package Seraphim X
 * @author  Rafael Mendoza
 * @license GPL-2.0-or-later
 * @link    https://github.com/akosiraffytot
 */

return [
	'genesis-structural-wraps'				=> [
		'header',
		'menu-primary',
		'menu-secondary',
		'site-inner',
		'footer-widgets',
		'footer'
	],
	'genesis-custom-logo'             => [
		'height'      => 25,
		'width'       => 185,
		'flex-height' => true,
		'flex-width'  => true,
	],
	'html5'                           => [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'navigation-widgets',
		'search-form',
		'script',
		'style',
	],
	'genesis-accessibility'           => [
		'drop-down-menu',
		'headings',
		'search-form',
		'skip-links',
	],
	'genesis-after-entry-widget-area' => '',
	'genesis-footer-widgets'          => 3,
	'genesis-menus'                   => [
		'primary'   => __( 'Header Menu', 'seraphimx' ),
		'secondary' => __( 'Footer Menu', 'seraphimx' ),
	],
];