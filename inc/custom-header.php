<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package IndoTimeline
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses indotimeline_header_style()
 */
function indotimeline_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'indotimeline_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 1440,
		'height'                 => 400,
		'flex-height'            => true,
		// 'wp-head-callback'       => 'indotimeline_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'indotimeline_custom_header_setup' );
