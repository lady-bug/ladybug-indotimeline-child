<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IndoTimeline
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-inner">
		<?php
		/*
		<div class="post-top">
			<div class="post-top-inner">
				<div class="post-author">
					<?php indotimeline_posted_by(); ?>
				</div>
				<div class="post-date">
					<?php indotimeline_posted_on(); ?>
				</div>
			</div>
		</div>
		<!-- .post-top -->
		*/
		?>

		<div class="post-middle">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<?php indotimeline_post_thumbnail(); ?>

			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'indotimeline' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) : ?>
				<div class="post-bottom">
					<footer class="entry-footer">
						<?php
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Edit <span class="screen-reader-text">%s</span>', 'indotimeline' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							),
							'<span class="edit-link"><i class="ionicons ion-compose"></i>',
							'</span>'
						);
						?>
					</footer><!-- .entry-footer -->
				</div><!-- .post-bottom -->
			<?php endif; ?>

		</div>
		<!-- /.post-inner -->

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
