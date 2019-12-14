<?php

/**
 * IndoTimeline Customizer Defaults
 *
 * @package IndoTimeline
 */
function indotimeline_options( $control ) {

	$indotimeline_options_defaults = array(
		'general_container_width' => '1170px',
		'general_footer_widget_display' => false,
		'general_sidebar_display' => 'disable',
		'general_navigation_display' => 'hide',
		'general_widget_display' => 'hide',
		'general_header_display' => 'show',
		'timeline_load_more_type' => 'infinite',
		'timeline_timeline_indicator' => 'arrow',
		'timeline_display_line' => true,
		'timeline_display_avatar' => true,
		'timeline_content_type' => 'content',
		'timeline_avatar' => '',
		'timeline_columns' => '2',
		'social_media_facebook' => '',
		'social_media_twitter' => '',
		'social_media_linkedin' => '',
		'social_media_instagram' => '',
		'social_media_whatapp' => ''
	);

	// merge defaults and options
	$indotimeline_options_defaults = wp_parse_args( get_option('indotimeline_options'), $indotimeline_options_defaults );

	// return control
	return $indotimeline_options_defaults[ $control ];

}