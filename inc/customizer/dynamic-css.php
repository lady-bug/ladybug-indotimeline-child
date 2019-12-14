<?php

function indotimeline_custom_css() {

wp_enqueue_style( 'indotimeline-custom', get_template_directory_uri() . '/dist/css/custom.css');

// begin style block
$indotimeline_cutom_css = '';

/*
** Colors =====
*/

	// Body
	if ( ! get_theme_mod('background_color') ) {
		$indotimeline_cutom_css .= '
			body {
				background-color: #f1f1f1;
			}
		';
	}

	// Page Header
	$header_text_color = get_header_textcolor();

	if ( $header_text_color === 'blank' ) {
		$indotimeline_cutom_css .= '
			.site-branding .site-title,
			.site-branding .site-description {
				display: none;
			}
		';	
	} else {
		$indotimeline_cutom_css .= '
			.site-header .site-header-content .site-branding {
				color: #'. esc_attr ( $header_text_color ) .';
			}
		';			
	}
	
/*
** Header Image
*/
	// Background Header
	if ( get_header_image() ) {
		$indotimeline_cutom_css .= '
			.site-header .site-header-bg {
				background-image:url("'. esc_url( get_header_image() ) .'");
			}
		';
	}


	// Header Logo
	/*
	$indotimeline_cutom_css .= '
		.logo-img {
			max-width: '. (int)indotimeline_options( 'title_tagline_logo_width' ) .'px;
		}
	';
	*/

/*
** Site Identity
*/

	// Logo &  Tagline
	if ( ! display_header_text() ) {
		$indotimeline_cutom_css .= '
			.site-branding .site-title,
			.site-branding .site-description {
				display: none;
			}
		';		
	}


wp_add_inline_style('indotimeline-custom', $indotimeline_cutom_css);

} // end indotimeline_custom_css()
add_action( 'wp_enqueue_scripts', 'indotimeline_custom_css' );
