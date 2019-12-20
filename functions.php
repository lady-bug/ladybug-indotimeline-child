<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'ms_theme_editor_child_css' ) ):
    function ms_theme_editor_child_css() {
        wp_enqueue_style( 'ms_theme_editor_child_ms_separate', trailingslashit( get_stylesheet_directory_uri() ) . 'ms-separate-style.css', array( 'indotimeline-style','indotimeline-build-style','indotimeline-build-icons','indotimeline-custom' ) );
    }
endif;

add_action( 'wp_enqueue_scripts', 'ms_theme_editor_child_css', 20 );

// END ENQUEUE PARENT ACTION

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ladybug_indotimeline_child_body_classes( $classes ) {

	if( is_page( ) ) {
		$classes[] = 'has-sidebar sidebar-right';
	}

	return $classes;
}
add_filter( 'body_class', 'ladybug_indotimeline_child_body_classes' );
?>
