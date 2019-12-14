<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'single' );

							the_post_navigation();

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</div>
					<!-- /.page-detail -->
				</div>
				<!-- .main-content -->
				<div class="side-content">
					<?php get_sidebar(); ?>
				</div>

			</div>
			<!-- /.container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('fixed');
get_footer();
