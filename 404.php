<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package IndoTimeline
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container">

				<div class="page-detail">

					<section class="error-404 not-found itl-block">

						<div class="page-content">

							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'indotimeline' ); ?></h1>
							</header><!-- .page-header -->

							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'indotimeline' ); ?></p>

							<div class="widget">
								<?php 
									get_search_form();
									?>
							</div>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

					<div class="itl-block">
						<div class="itl-row">
							<div class="itl-cols-3">
								<?php
									the_widget( 'WP_Widget_Recent_Posts' );
								?>
							</div>
							<div class="itl-cols-3">
								<div class="widget widget_categories">
									<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'indotimeline' ); ?></h2>
									<ul>
										<?php
										wp_list_categories( array(
											'orderby'    => 'count',
											'order'      => 'DESC',
											'show_count' => 1,
											'title_li'   => '',
											'number'     => 10,
										) );
										?>
									</ul>
								</div><!-- .widget -->
							</div>
							<div class="itl-cols-3">
								<?php
									/* translators: %1$s: smiley */
									$indotimeline_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'indotimeline' ), convert_smilies( ':)' ) ) . '</p>';
									the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$indotimeline_archive_content" );
								?>
								
							</div>
							<div class="itl-cols-3">
								<?php
								the_widget( 'WP_Widget_Tag_Cloud' );
								?>
							</div>
						</div>
					</div>

				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
