<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IndoTimeline
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('js_post'); ?>>

	<div class="post-inner">

		<?php
		/*
		<div class="post-top">
			<div class="post-top-inner">
				<div class="post-author">
					 indotimeline_posted_by();
				</div>
				<div class="post-date">
					indotimeline_posted_on();
				</div>
			</div>
		</div>
		*/
		?>
		<!-- .post-top -->

		<div class="post-middle">

			<header class="entry-header link-inherit">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php //indotimeline_post_thumbnail();

			?>

			<div class="entry-content">
				<?php

					the_content( sprintf(
						wp_kses(
							// translators: %s: Name of current post. Only visible to screen readers
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'indotimeline' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );


				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'indotimeline' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<div class="post-bottom">
				<?php indotimeline_entry_footer(); ?>
			</div><!-- .post-bottom -->

		</div>
		<!-- /.post-inner -->

	</div>


</article><!-- #post-<?php the_ID(); ?> -->
