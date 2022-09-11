<?php
/**
 * Seraphim X.
 *
 * This file adds the sample page template to the Genesis Sample Theme.
 *
 * Template Name: Sample Template
 *
 * @package Seraphim X
 * @author  Rafael Mendoza
 * @license GPL-2.0-or-later
 * @link    https://github.com/akosiraffytot
 */


//* Adds landing page body class.
add_filter( 'body_class', 'seraphimx_landing_body_class' );
function seraphimx_landing_body_class( $classes ) {

	$classes[] = 'sample-template';
	return $classes;

}

/* Add customization below this line */

//* Runs the Genesis loop.
genesis();
