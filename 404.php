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
				<div class="main-content">

					<div class="page-detail">


						<div class="page-content">

							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'indotimeline' ); ?></h1>
							</header><!-- .page-header -->

							<p><?php esc_html_e( 'Sorry, it looks like nothing was found at this location. Use below links to get back on track.', 'indotimeline' ); ?></p>

						</div><!-- .page-content -->

						</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
