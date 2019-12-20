<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IndoTimeline
 */

 if ( ! is_active_sidebar( 'sidebar-fixed' ) ) {
 	return;
 }
?>

<section class="sidebar sidebar-fixed link-inherit">
	<div class="close-mobile-btn js_sidebar_action">
		<i class="ionicons icon-gost ion-close itl-fz-23"></i>
	</div>
	<div class="sidebar-inner">
		<aside id="secondary" class="widget-area">
		<?php
			if ( !dynamic_sidebar( 'sidebar-fixed' ) ) :

				the_widget('WP_Widget_Pages', 'title= Pages');
				the_widget('WP_Widget_Meta', 'title= Meta');
				the_widget('WP_Widget_Calendar', 'title= Calendar');

			endif; ?>
		</aside><!-- #secondary -->
	</div>

</section>
<!-- .sidebar -->
