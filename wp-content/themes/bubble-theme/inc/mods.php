<?php
/**
 * Functions used to implement options.
 *
 * @package bubble
 * @license GPL 2.0 
 */
 
 /**
 * Enqueue Google Fonts.
 */
function bubble_fonts() {
	// Font options.
	$fonts = array(
		get_theme_mod( 'heading_font', customizer_library_get_default( 'heading_font' ) ),
		get_theme_mod( 'body_font', customizer_library_get_default( 'body_font' ) )
	);
	$font_uri = customizer_library_get_google_font_uri( $fonts );
	// Load Google Fonts.
	wp_enqueue_style( 'bubble-fonts', $font_uri, array(), null, 'screen' );
}
add_action( 'wp_enqueue_scripts', 'bubble_fonts' );
