<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Matuto
 *
 *
 * @param $classes
 *
 * @return array
 */
function matuto_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'matuto_body_classes' );

/**
 * pingback url auto-discovery header
 */
function matuto_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'matuto_pingback_header' );
