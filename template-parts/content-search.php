<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IndoTimeline
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('js_post'); ?>>

	<div class="post-inner">
	
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

		<div class="post-middle">
			<?php indotimeline_post_thumbnail(); ?>

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

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->

			<div class="post-bottom">
				<?php indotimeline_entry_footer(); ?>
			</div><!-- .entry-footer -->

		</div>
		<!-- /.post-inner -->

	</div>


</article><!-- #post-<?php the_ID(); ?> -->
