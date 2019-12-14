<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package IndoTimeline
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function indotimeline_body_classes( $classes ) {

	if ( indotimeline_options('timeline_timeline_indicator') == 'arrow' ) {
		$classes[] = 'timeline-use-arrow';
	}
	else if ( indotimeline_options('timeline_timeline_indicator') == 'bullet' ) {
		$classes[] = 'timeline-use-bullet';
	}else{
		$classes[] = 'timeline-no-indicator';
	}

	if ( !indotimeline_options('timeline_display_line')) {
		$classes[] = 'remove-timeline-line';
	}
	if ( !indotimeline_options('timeline_display_avatar')) {
		$classes[] = 'remove-timeline-avatar';
	}

	if ( indotimeline_options('general_header_display') == 'hide' ) {
		$classes[] = 'hide-header';
	}
	if ( indotimeline_options('general_widget_display') == 'show' ) {
		$classes[] = 'open-sidebar';
	}
	if ( indotimeline_options('general_navigation_display') == 'show' ) {
		$classes[] = 'open-main-navigation';
	}
	if ( indotimeline_options('general_sidebar_display') == 'left' ) {
		$classes[] = 'has-sidebar sidebar-left';
	}else if( indotimeline_options('general_sidebar_display') == 'right' ){
		$classes[] = 'has-sidebar sidebar-right';
	}
	if ( indotimeline_options('timeline_columns') == '2' ) {
		$classes[] = 'timeline-2-columns';
	}else if( indotimeline_options('timeline_columns') == '3' ){
		$classes[] = 'timeline-3-columns';
	}else if( indotimeline_options('timeline_columns') == '4' ){
		$classes[] = 'timeline-4-columns';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( is_single() ) {
		$classes[] = 'has-sidebar sidebar-right';
	}


	return $classes;
}
add_filter( 'body_class', 'indotimeline_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function indotimeline_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'indotimeline_pingback_header' );
