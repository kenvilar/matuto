<?php
/**
 * Matuto Theme Customizer
 *
 * @package Matuto
 */

/*
 * @param $wp_customize
 * */
function matuto_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) :
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'matuto_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'matuto_customize_partial_blogdescription',
		) );
	endif;
}
add_action( 'customize_register', 'matuto_customize_register' );

/**
 * Render the title.
 */
function matuto_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the tagline.
 */
function matuto_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Reload asynchronously.
 */
function matuto_customize_preview_js() {
	wp_enqueue_script(
		'matuto-customizer',
		get_template_directory_uri() . '/assets/js/customizer.js',
		array( 'customize-preview' ),
		'1.0.0',
		true
	);
}
add_action( 'customize_preview_init', 'matuto_customize_preview_js' );
