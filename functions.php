<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'ms_theme_editor_child_css' ) ):
    function ms_theme_editor_child_css() {
        wp_enqueue_style( 'ms_theme_editor_child_ms_separate', trailingslashit( get_stylesheet_directory_uri() ) . 'ms-separate-style.css', array( 'indotimeline-style','indotimeline-build-style','indotimeline-build-icons','indotimeline-custom' ) );
    }
endif;

add_action( 'wp_enqueue_scripts', 'ms_theme_editor_child_css', 20 );

// END ENQUEUE PARENT ACTION

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ladybug_indotimeline_child_body_classes( $classes ) {

	if( is_active_sidebar( 'sidebar-content' ) ) {
		$classes[] = 'has-sidebar sidebar-right';
	}

	return $classes;
}
add_filter( 'body_class', 'ladybug_indotimeline_child_body_classes' );


function ladybug_indotimeline_child_display_posts_shortcode_category_display( $category_display_text, $terms, $category_display, $original_atts ) {
  // Display categories the post is in.
  $category_display_text = '';

  if ( $category_display && is_object_in_taxonomy( get_post_type(), $category_display ) ) {
    $categories_list = get_the_category_list( esc_html__( ', ', 'ladybug_indotimeline_child' ) );

    if ( $categories_list) {
      $category_display_text = '<div class="post-bottom"><span class="cat-links"><i class="ionicons ion-folder"></i>Posted in ' . $categories_list . '</span></div>';
    }

    /**
     * Filter the list of categories attached to the current post.
     *
     * @since 2.4.2
     *
     * @param string   $category_display Current Category Display text
     */
    $category_display_text = apply_filters( 'ladybug_indotimeline_child_display_posts_shortcode_category_display', $category_display_text, $terms, $category_display, $original_atts );

    return $category_display_text;

//Posted in <a href="http://www.lady-bug.info/category/showcase/transcription/" rel="category tag">Transcription</a></span>
  }
}
add_filter( 'display_posts_shortcode_category_display', 'ladybug_indotimeline_child_display_posts_shortcode_category_display', 9, 5 );

//reorder display-posts elements and use html5 mark-up
function ladybug_indotimeline_child_display_posts_shortcode_output($output, $original_atts, $image, $title, $date, $excerpt, $inner_wrapper, $content, $class, $author, $category_display_text ){
  $inner = '';

  //remove span tag and add figure tag on img
  $pattern = '/<span class="image">/';
  $replacement ='';
  $image = preg_replace($pattern, $replacement, $image);
  $pattern = '/<\/span>/';
  $image = preg_replace($pattern, $replacement, $image);
  $image = '<figure>' . $image . '</figure>';

  //remove span and add h2 on title
  $pattern = '/<span class="title">/';
  $replacement ='';
  $title = preg_replace($pattern, $replacement, $title);
  $pattern = '/<\/span>/';
  $title = preg_replace($pattern, $replacement, $title);
  $title = '<h2>' . $title . '</h2>';

  //use article tag
  if('div' === $inner_wrapper){
    $inner_wrapper = 'article';
  }

  //use p tag for excerpt
  $pattern = '/<span/';
  $replacement ='<p';
  $excerpt = preg_replace($pattern, $replacement, $excerpt);
  $pattern = '/<\/span>/';
  $replacement ='</p>';
  $excerpt = preg_replace($pattern, $replacement, $excerpt);

  $output = '<' . $inner_wrapper . ' class="' . implode( ' ', $class ) . '">' . $image . $title . $date . $author . $excerpt . $content . $category_display_text . '</' . $inner_wrapper . '>';
  $inner .= apply_filters( 'ladybug_indotimeline_child_display_posts_shortcode_output', $output, $original_atts, $image, $title, $date, $excerpt, $inner_wrapper, $content, $class, $author, $category_display_text );
  return $inner;
}
add_filter( 'display_posts_shortcode_output', 'ladybug_indotimeline_child_display_posts_shortcode_output', 10, 11 );

//replace div open tag with section
function ladybug_indotimeline_child_display_posts_shortcode_wrapper_open($wrapper_open , $original_atts, $dps_listing ){
  $pattern = '/<div/';
  $replacement ='<section';
  $wrapper_open = preg_replace($pattern, $replacement, $wrapper_open);

  $open = apply_filters( 'ladybug_indotimeline_child_display_posts_shortcode_wrapper_open', $wrapper_open, $original_atts, $dps_listing );
  return $open;
}
add_filter('display_posts_shortcode_wrapper_open','ladybug_indotimeline_child_display_posts_shortcode_wrapper_open', 10, 3);

//replace div close tag with section
function ladybug_indotimeline_child_display_posts_shortcode_wrapper_close($wrapper_close, $original_atts, $dps_listing ){
  $pattern = '/<\/div>/';
  $replacement ='</section>';
  $wrapper_close = preg_replace($pattern, $replacement, $wrapper_close);

  $close = apply_filters( 'ladybug_indotimeline_child_display_posts_shortcode_wrapper_close', $wrapper_close, $original_atts, $dps_listing );
  return $close;
}
add_filter('display_posts_shortcode_wrapper_close','ladybug_indotimeline_child_display_posts_shortcode_wrapper_close', 10, 3);

?>
