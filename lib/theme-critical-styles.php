<?php
/**
 * Seraphim X.
 *
 * This file adds crtical css to the Seraphim X Child Theme.
 *
 * @package Seraphim X
 * @author  Rafael Mendoza
 * @license GPL-2.0-or-later
 * @link    https://github.com/akosiraffytot
 */

/**
 * Enqueque critical style
 */
add_action( 'wp_enqueue_scripts', 'seraphimx_optimize_enqueue_scripts', 1 );
function seraphimx_optimize_enqueue_scripts() {

	$critical_handle = genesis_get_theme_handle() . '-critical';
	
	wp_register_style( $critical_handle , false );
	
	wp_enqueue_style( $critical_handle );

	$critical_css = "
	
		/* theme critical css */

		/* Fonts
		--------------------------------------------- */

		@font-face {
			font-family: 'Josefin Sans';
			src: url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-Bold.eot');
			src: url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-Bold.eot?#iefix') format('embedded-opentype'),
					url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-Bold.woff2') format('woff2'),
					url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-Bold.woff') format('woff'),
					url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-Bold.ttf') format('truetype');
			font-weight: 700;
			font-style: normal;
			font-display: swap;
		}
		
		@font-face {
				font-family: 'Josefin Sans';
				src: url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-Light.eot');
				src: url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-Light.eot?#iefix') format('embedded-opentype'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-Light.woff2') format('woff2'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-Light.woff') format('woff'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-Light.ttf') format('truetype');
				font-weight: 300;
				font-style: normal;
				font-display: swap;
		}
		
		@font-face {
				font-family: 'Josefin Sans';
				src: url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-SemiBold.eot');
				src: url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-SemiBold.eot?#iefix') format('embedded-opentype'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-SemiBold.woff2') format('woff2'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-SemiBold.woff') format('woff'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-SemiBold.ttf') format('truetype');
				font-weight: 600;
				font-style: normal;
				font-display: swap;
		}
		
		@font-face {
				font-family: 'Josefin Sans';
				src: url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-LightItalic.eot');
				src: url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-LightItalic.eot?#iefix') format('embedded-opentype'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-LightItalic.woff2') format('woff2'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-LightItalic.woff') format('woff'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-LightItalic.ttf') format('truetype');
				font-weight: 300;
				font-style: italic;
				font-display: swap;
		}
		
		@font-face {
				font-family: 'Josefin Sans';
				src: url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-SemiBoldItalic.eot');
				src: url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-SemiBoldItalic.eot?#iefix') format('embedded-opentype'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-SemiBoldItalic.woff2') format('woff2'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-SemiBoldItalic.woff') format('woff'),
						url('/wp-content/themes/seraphim-x/lib/assets/fonts/JosefinSans-SemiBoldItalic.ttf') format('truetype');
				font-weight: 600;
				font-style: italic;
				font-display: swap;
		}	

		.flex{-webkit-box-sizing:border-box;box-sizing:border-box;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-flex:0;-ms-flex:0 1 auto;flex:0 1 auto;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;-ms-flex-wrap:wrap;flex-wrap:wrap;margin:0 -10px}
		.flex.nogutter{margin:0}
		.flex.nogutter > .col{padding:0}
		.col{-webkit-box-sizing:border-box;box-sizing:border-box;-webkit-box-flex:0;-ms-flex:0 0 auto;flex:0 0 auto;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;-ms-flex-preferred-size:0;flex-basis:0;max-width:100%;min-width:0;padding:0 10px}
		.col-fixed{-webkit-box-flex:initial;-ms-flex:initial;flex:initial}
		.col-1{-ms-flex-preferred-size:8.33333%;flex-basis:8.33333%;max-width:8.33333%}
		.col-2{-ms-flex-preferred-size:16.66667%;flex-basis:16.66667%;max-width:16.66667%}
		.col-3{-ms-flex-preferred-size:25%;flex-basis:25%;max-width:25%}
		.col-4{-ms-flex-preferred-size:33.33333%;flex-basis:33.33333%;max-width:33.33333%}
		.col-5{-ms-flex-preferred-size:41.66667%;flex-basis:41.66667%;max-width:41.66667%}
		.col-6{-ms-flex-preferred-size:50%;flex-basis:50%;max-width:50%}
		.col-7{-ms-flex-preferred-size:58.33333%;flex-basis:58.33333%;max-width:58.33333%}
		.col-8{-ms-flex-preferred-size:66.66667%;flex-basis:66.66667%;max-width:66.66667%}
		.col-9{-ms-flex-preferred-size:75%;flex-basis:75%;max-width:75%}
		.col-10{-ms-flex-preferred-size:83.33333%;flex-basis:83.33333%;max-width:83.33333%}
		.col-11{-ms-flex-preferred-size:91.66667%;flex-basis:91.66667%;max-width:91.66667%}
		.col-12{-ms-flex-preferred-size:100%;flex-basis:100%;max-width:100%}
		@media only screen and (max-width: 360px) {
		.col-xs{-webkit-box-flex:100%;-ms-flex:100%;flex:100%;max-width:100%}
		}
		@media only screen and (max-width: 480px) {
		.col-sm{-webkit-box-flex:100%;-ms-flex:100%;flex:100%;max-width:100%}
		}
		@media only screen and (max-width: 768px) {
		.col-md{-webkit-box-flex:100%;-ms-flex:100%;flex:100%;max-width:100%}
		}
		@media only screen and (max-width: 960px) {
		.col-lg{-webkit-box-flex:100%;-ms-flex:100%;flex:100%;max-width:100%}
		}
		@media only screen and (max-width: 1200px) {
		.col-xl{-webkit-box-flex:100%;-ms-flex:100%;flex:100%;max-width:100%}
		}
 
		.site-header {
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
		}

		.admin-bar .site-header-container { top: 32px }

		.site-header .wrap {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
					flex-wrap: wrap;
			-webkit-box-orient: horizontal;
			-webkit-box-direction: normal;
					-ms-flex-direction: row;
							flex-direction: row;
		}

		.header-widget-area { float: right; padding: 30px 0; }

		.mobile-nav{text-align:center;display:none}
		.mobile-nav-toggle{color:#205b92;cursor:pointer;display:block;padding:14px 15px;font-size:35px;line-height:1;float: right;}

		.sidr{display:block;position:fixed;top:0;height:100%;z-index:999999;width:260px;overflow-x:hidden;overflow-y:auto;background-color:#fff;box-shadow:0 0 10px 0 rgba(113, 113, 113, 0.5)}
		.sidr.sidr-left{left:-260px;right:auto}
		.sidr-inner:not(:last-child){margin-bottom:0}
		.sidr-class-custom-logo-link{display:block;box-shadow:0 0 5px #dadada;padding:20px 15px;text-align:center}
		.sidr-class-custom-logo{max-width:230px}
		.sidr-class-menu-item a{border-bottom:1px solid #e0e0e0;font-size:16px;padding:18px 15px;display:block;color: #333}
		.sidr-class-menu-item a:hover,.sidr-class-menu-item a:focus(text-decoration:none);
		.sidr-class-sub-menu{padding-left:20px;display:none}
		.sidr-class-sub-menu a{font-size:15px}
		.sidr-inner li {margin-bottom: 0}
		.sidr-inner li::before {display: none}

		.site-inner {
			clear: both;
			margin-bottom: 40px;
			margin-top: 40px;
		}

		.wrap {
			max-width: 1400px;
			margin: 0 auto;
			padding: 0 4.16666666666667%;
		}
		
		.site-header .flex .nav-primary, 
		.site-header .flex .title-area,
		.site-header .flex .mobile-nav {
			-webkit-box-flex: 1;
			    -ms-flex-positive: 1;
			        flex-grow: 1;
			-ms-flex-item-align: center;
			    align-self: center;
		}

		.title-area {
			max-width: 200px;
			padding: 15px 0;
		}

		.custom-logo-link {
			display: block;
			width: 100%;
			max-width: 200px;
		}

		.title-area,
		.custom-logo-link {
			-webkit-transition: max-width .3s ease-in;
			transition: max-width .3s ease-in;
		}

		.isscroll .title-area {
			max-width: 150px;
		}

		.isscroll custom-logo-link {
			max-width: 95px;
		}

		.header-widget-area {
			padding: 0;
			-webkit-box-flex: 1;
					-ms-flex-positive: 1;
							flex-grow: 1;
			text-align: right;
		}

		.site-header-wrapper {
			-webkit-box-align: center;
					-ms-flex-align: center;
							align-items: center;
		}

		.genesis-nav-menu {
			clear: both;
			line-height: 1;
			width: 100%;
			font-size: 0;
		}
		
		.genesis-nav-menu .menu-item {
			display: inline-block;
			position: relative;
		}
		
		.genesis-nav-menu a,
		.genesis-nav-menu .current-menu-item > a {
			cursor: pointer;
			color: #FFF;
			display: block;
			font-family: 'Josefin Sans';
			font-size: 20px;
			font-weight: 600;
			outline-offset: -1px;
			text-decoration: none;
			text-transform: uppercase;
			padding: 15px 13px;
		}

		.genesis-nav-menu .menu-item:focus,
		.genesis-nav-menu .menu-item:hover {
			position: relative;
		}

		.genesis-nav-menu a:focus,
		.genesis-nav-menu a:hover {
			color: #c7f4ff;
			text-decoration: none;
		}

		.genesis-nav-menu .sub-menu a:focus,
		.genesis-nav-menu .sub-menu a:hover,
		.genesis-nav-menu .sub-menu .current-menu-item > a:focus,
		.genesis-nav-menu .sub-menu .current-menu-item > a:hover {
			color: #00a1c7;
			text-decoration: none;
		}

		.nav-primary,
		.nav-secondary {
			text-align: left;
		}

		.nav-primary {
			background-color: #00a1c7;
		}

		.widget:last-child,
		.widget p:last-child,
		.widget ul > li:last-of-type,
		.home-widget-area .widget:last-child {
			margin-bottom: 0 !important;
		}

		.entry-header {
			margin-bottom: 25px;
		}

		@media only screen and (max-width: 1134px) {
			.wrap {
				padding: 0 4%;
			}
		}

		@media only screen and (max-width: 1080px) {
			.genesis-nav-menu a {
				padding: 25px 8px;
			}
		}

		@media only screen and (max-width: 1024px) {
			.nav-primary, .nav-secondary { display: none }
			.mobile-nav { display: block }

			.sidr-class-menu-item a { font-weight: 600; }

			.custom-logo-link {
				max-width: 100px;
			}
		}
		
		@media only screen and (max-width: 860px) {
			.wrap {
				padding: 0 4.65116279069767%;
			}		
		}
		
		@media only screen and (max-width: 768px) {
			.entry-header {
				height: 280px;
			}

			.entry-title {
				font-size: 36px;
			}

			.entry-header .flex {
				padding-top: 115px;
			}

			.entry-title {
				font-size: 38px;
			}
		}
		
		@media only screen and (max-width: 640px) {
		}
		
		@media only screen and (max-width: 480px) {
			.before-header {
				line-height: 1.2;
				font-size: 15px;
				text-align: center;
			}
		}
		
		@media only screen and (max-width: 412px) {
			
		}
	";
	
	wp_add_inline_style( $critical_handle, $critical_css );

}