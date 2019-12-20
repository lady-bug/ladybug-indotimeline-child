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

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<div class="container">
			<?php get_footer('widget'); ?>
			<div class="site-info">
				<span><?php echo esc_html__( 'Proudly powered by', 'indotimeline' ); ?></span>
				<a target="_blank" href="<?php echo esc_url( __( 'https://wordpress.org/', 'indotimeline' ) ); ?>">
					<?php echo esc_html__( 'WordPress', 'indotimeline' ); ?>
				</a>

					<?php
					//<span class="sep"> | </span>
					/* translators: 1: Theme name, 2: Theme author. */
					//printf( esc_html__( 'Theme: %1$s by %2$s.', 'indotimeline' ), 'IndoTimeline', '<a href="http://indodevapps.com">IndoDevApps</a>' );
					?>
			</div><!-- .site-info -->
		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
