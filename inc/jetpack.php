<?php
/**
 * Jetpack Compatibility
 *
 * @package Matuto
 */

function matuto_jetpack_setup() {
	// Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'matuto_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'post-details' => array(
			'stylesheet' => 'matuto-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
	) );
}
add_action( 'after_setup_theme', 'matuto_jetpack_setup' );

function matuto_infinite_scroll_render() {
	while ( have_posts() ) :
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/post/content', get_post_format() );
		endif;
	endwhile;
}
