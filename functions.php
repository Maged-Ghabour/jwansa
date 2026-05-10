<?php
/**
 * Jwansa Clinic functions and definitions
 */

if ( ! function_exists( 'jwansa_setup' ) ) :
	function jwansa_setup() {
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'jwansa' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'jwansa_setup' );

/**
 * Enqueue scripts and styles.
 */
function jwansa_scripts() {
	wp_enqueue_style( 'jwansa-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'jwansa-script', get_template_directory_uri() . '/script.js', array(), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'jwansa_scripts' );

/**
 * Check if ACF is active and setup fields
 */
if( function_exists('acf_add_local_field_group') ):
    // Here we could register local ACF fields programmatically.
    // We will build the templates so that they check if get_field exists.
endif;
