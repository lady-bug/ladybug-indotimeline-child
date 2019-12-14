<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IndoTimeline
 */

if ( !indotimeline_options('general_footer_widget_display') ) {
	return;
}

?>

<div class="footer-widget clearfix">
	<?php

		if ( !dynamic_sidebar( 'footer-widget' ) ) :
			the_widget('WP_Widget_Recent_Comments', 'title= Recent Comments');
			the_widget('WP_Widget_Tag_Cloud', 'title= Tags');
		endif; ?>

</div>