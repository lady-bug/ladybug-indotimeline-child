<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IndoTimeline
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<div class="container">
				<div class="main-content"><div class="page-detail">
					<header class="entry-header">
						<?php single_tag_title( '<h1 class="entry-title">Tag: ', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<?php indotimeline_timeline_before() ?>

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						?>

					<?php indotimeline_timeline_after() ?>
					<?php the_posts_navigation(); ?>
				</div></div>
				<!-- .main-content -->

			</div>
			<!-- /.container -->

		<?php else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('fixed');
get_footer();
?>
