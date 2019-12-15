<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IndoTimeline
 */

// if ( indotimeline_options('general_sidebar_display') == "disable" ) {
// 	return;
// }
?>

<section class="sidebar sidebar-content link-inherit">

	<div class="sidebar-inner">
		<aside id="secondary" class="widget-area">
			<?php

				if ( !dynamic_sidebar( 'sidebar-content' ) ) :

					//the_widget('WP_Widget_Search', 'title= Search');
					//the_widget('WP_Widget_Archives', 'title= Archives');
					the_widget('WP_Widget_Categories', 'title= Categories');

				endif; ?>

		</aside><!-- #secondary -->
	</div>

</section>
<!-- .sidebar -->
