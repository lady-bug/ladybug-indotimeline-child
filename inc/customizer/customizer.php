<?php

/**
 * IndoTimeline Theme Customizer
 *
 * @package IndoTimeline
 */

function indotimeline_customize_register( $wp_customize ) {

/**
 * Sanitization Callbacks
 *
 */
	// checkbox
	function indotimeline_sanitize_checkbox( $input ) {
		return $input ? true : false;
	}
	
	// select
	function indotimeline_sanitize_select( $input, $setting ) {
		
		// get all select options
		$options = $setting->manager->get_control( $setting->id )->choices;
		
		// return default if not valid
		return ( array_key_exists( $input, $options ) ? $input : $setting->default );
	}

	// number absint
	function indotimeline_sanitize_number_absint( $number, $setting ) {

		// ensure $number is an absolute integer
		$number = absint( $number );

		// return default if not integer
		return ( $number ? $number : $setting->default );

	}

	// textarea
	function indotimeline_sanitize_textarea( $input ) {

		$allowedtags = array(
			'a' => array(
				'href' 		=> array(),
				'title' 	=> array(),
				'_blank'	=> array()
			),
			'img' => array(
				'src' 		=> array(),
				'alt' 		=> array(),
				'width'		=> array(),
				'height'	=> array(),
				'style'		=> array(),
				'class'		=> array(),
				'id'		=> array()
			),
			'br' 	 => array(),
			'em' 	 => array(),
			'strong' => array()
		);

		// return filtered html
		return wp_kses( $input, $allowedtags );

	}

	// Custom Controls
	function indotimeline_sanitize_custom_control( $input ) {
		return $input;
	}

/**
 * Reusable Functions
 *
 */
	// checkbox
	function indotimeline_checkbox_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;

		if ( $section !== 'header_image' ) {
			$section_id = 'indotimeline_'. $section;
		} else {
			$section_id = $section;
		}

		$wp_customize->add_setting( 'indotimeline_options['. $section .'_'. $id .']', array(
			'default'	 => indotimeline_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'indotimeline_sanitize_checkbox'
		) );
		$wp_customize->add_control( 'indotimeline_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> $section_id,
			'type'		=> 'checkbox',
			'priority'	=> $priority
		) );
	}

	// text
	function indotimeline_text_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'indotimeline_options['. $section .'_'. $id .']', array(
			'default'	 => indotimeline_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'indotimeline_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'indotimeline_'. $section,
			'type'		=> 'text',
			'priority'	=> $priority
		) );
	}

	// color
	function indotimeline_color_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'indotimeline_options['. $section .'_'. $id .']', array(
			'default'	 => indotimeline_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'indotimeline_options['. $section .'_'. $id .']', array(
			'label' 	=> $name,
			'section' 	=> 'indotimeline_'. $section,
			'priority'	=> $priority
		) ) );
	}

	// textarea
	function indotimeline_textarea_control( $section, $id, $name, $description, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'indotimeline_options['. $section .'_'. $id .']', array(
			'default'	 => indotimeline_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'indotimeline_sanitize_textarea'
		) );
		$wp_customize->add_control( 'indotimeline_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'description'	=> wp_kses_post($description),
			'section'		=> 'indotimeline_'. $section,
			'type'			=> 'textarea',
			'priority'		=> $priority
		) );
	}

	// url
	function indotimeline_url_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'indotimeline_options['. $section .'_'. $id .']', array(
			'default'	 => indotimeline_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control( 'indotimeline_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'indotimeline_'. $section,
			'type'		=> 'text',
			'priority'	=> $priority
		) );
	}

	// number absint
	function indotimeline_number_absint_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;

		if ( $section !== 'title_tagline' && $section !== 'header_image' ) {
			$section_id = 'indotimeline_'. $section;
		} else {
			$section_id = $section;
		}

		$wp_customize->add_setting( 'indotimeline_options['. $section .'_'. $id .']', array(
			'default'	 => indotimeline_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'indotimeline_sanitize_number_absint'
		) );
		$wp_customize->add_control( 'indotimeline_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> $section_id,
			'type'			=> 'number',
			'input_attrs' 	=> $atts,
			'priority'		=> $priority
		) );
	}

	// select
	function indotimeline_select_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'indotimeline_options['. $section .'_'. $id .']', array(
			'default'	 => indotimeline_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'indotimeline_sanitize_select'
		) );
		$wp_customize->add_control( 'indotimeline_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> 'indotimeline_'. $section,
			'type'			=> 'select',
			'choices' 		=> $atts,
			'priority'		=> $priority
		) );
	}

	// radio
	function indotimeline_radio_control( $section, $id, $name, $atts, $transport, $priority, $description = false) {
		global $wp_customize;

		if ( $section !== 'header_image' ) {
			$section_id = 'indotimeline_'. $section;
		} else {
			$section_id = $section;
		}

		$wp_customize->add_setting( 'indotimeline_options['. $section .'_'. $id .']', array(
			'default'	 => indotimeline_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'indotimeline_sanitize_select'
		) );
		$wp_customize->add_control( 'indotimeline_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'description'	=> $description,
			'section'		=> $section_id,
			'type'			=> 'radio',
			'choices' 		=> $atts,
			'priority'		=> $priority
		) );
	}

	// image
	function indotimeline_image_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'indotimeline_options['. $section .'_'. $id .']', array(
		    'default' 	=> indotimeline_options( $section .'_'. $id),
		    'type' 		=> 'option',
		    'transport' => $transport,
		    'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control(
			new WP_Customize_Image_Control( $wp_customize, 'indotimeline_options['. $section .'_'. $id .']', array(
				'label'    => $name,
				'section'  => 'indotimeline_'. $section,
				'priority' => $priority
			)
		) );
	}

	// image crop
	function indotimeline_image_crop_control( $section, $id, $name, $width, $height, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'indotimeline_options['. $section .'_'. $id .']', array(
			'default' 	=> '',
			'type' 		=> 'option',
			'transport' => $transport,
			'sanitize_callback' => 'indotimeline_sanitize_number_absint'
		) );
		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'indotimeline_options['. $section .'_'. $id .']', array(
				'label'    		=> $name,
				'section'  		=> 'indotimeline_'. $section,
				'flex_width'  	=> false,
				'flex_height' 	=> false,
				'width'       	=> $width,
				'height'      	=> $height,
				'priority' 		=> $priority
			)
		) );
	}


/**
 * General Settings
 *
 */

	$wp_customize->add_section( 'indotimeline_general' , array(
		'title'		 => esc_html__( 'General Settings', 'indotimeline' ),
		'priority'	 => 2,
		'capability' => 'edit_theme_options'
	) );

		$options_yes_no = array(
			'show' => esc_html__( 'Show', 'indotimeline' ),
			'hide' 	=> esc_html__( 'Hide', 'indotimeline' ),
		);

		// Header Display
		indotimeline_radio_control( 'general', 'header_display', esc_html__( 'Header Display', 'indotimeline' ), $options_yes_no, 'refresh', 25 );

		// Widget Display
		// indotimeline_radio_control( 'general', 'widget_display', esc_html__( 'Widget Display', 'indotimeline' ), $options_yes_no, 'postMessage', 25 );

		// Widget Display
		// indotimeline_radio_control( 'general', 'navigation_display', esc_html__( 'Navigation Display', 'indotimeline' ), $options_yes_no, 'postMessage', 25 );


		$options_sidebar = array(
			'disable' => esc_html__( 'Disable', 'indotimeline' ),
			'left' 	=> esc_html__( 'Left', 'indotimeline' ),
			'right' 	=> esc_html__( 'Right', 'indotimeline' ),
		);

		// Sidebar Content
		// HIDE
		// indotimeline_radio_control( 'general', 'sidebar_display', esc_html__( 'Sidebar Display', 'indotimeline' ), $options_sidebar, 'refresh', 26 );


		$options_footer = array(
			'disable' => esc_html__( 'Disable', 'indotimeline' ),
			'show' 	=> esc_html__( 'Display', 'indotimeline' ),
		);


		// Footer Widget
		indotimeline_checkbox_control( 'general', 'footer_widget_display', esc_html__( 'Enable Footer Widget', 'indotimeline' ), 'refresh', 27 );

		indotimeline_text_control( 'general', 'container_width', esc_html__( 'Container Width', 'indotimeline' ), 'refresh', 5 );

/**
 * Timeline Settings
 *
 */

	$wp_customize->add_section( 'indotimeline_timeline' , array(
		'title'		 => esc_html__( 'Timeline Settings', 'indotimeline' ),
		'priority'	 => 3,
		'capability' => 'edit_theme_options'
	) );


		$load_more_type = array(
			'infinite' 		=> esc_html__( 'Infinite Scroll', 'indotimeline' ),
			'click' => esc_html__( 'By Click', 'indotimeline' ),
			'none' 	=> esc_html__( 'None', 'indotimeline' ),
		);

		// Load More Type
		indotimeline_select_control( 'timeline', 'load_more_type', esc_html__( 'Load More Type', 'indotimeline' ), $load_more_type, 'refresh', 25 );

		$content_type = array(
			'content' 		=> esc_html__( 'Content', 'indotimeline' ),
			'excerpt' => esc_html__( 'Excerpt', 'indotimeline' ),
		);


		// Timeline Avatar
		indotimeline_image_crop_control( 'timeline', 'avatar', esc_html__( 'Timeline Image Avatar', 'indotimeline' ), 100, 100, 'refresh', 26 );

		// Content Type
		indotimeline_radio_control( 'timeline', 'content_type', esc_html__( 'Content Type', 'indotimeline' ), $content_type, 'refresh', 25 );


		$timeline_indicator = array(
			'arrow'   => esc_html__( 'Arrow', 'indotimeline' ),
			'bullet' => esc_html__( 'Bullet', 'indotimeline' ),
			'disable' => esc_html__( 'Disable', 'indotimeline' )
		);

		// Timeline Indicator
		// indotimeline_radio_control( 'timeline', 'timeline_indicator', esc_html__( 'Timeline Indicator', 'indotimeline' ), $timeline_indicator, 'postMessage', 28, __( 'Display when timeline columns 2', 'indotimeline' ) );
		indotimeline_radio_control( 'timeline', 'timeline_indicator', esc_html__( 'Timeline Indicator', 'indotimeline' ), $timeline_indicator, 'postMessage', 28, __( 'Select timeline indicator', 'indotimeline' ) );


		$display_line = array(
			'yes'   => esc_html__( 'Yes', 'indotimeline' ),
			'no' => esc_html__( 'No', 'indotimeline' )
		);

		// Display Avatar
		indotimeline_checkbox_control( 'timeline', 'display_avatar', esc_html__( 'Enable Avatar', 'indotimeline' ), 'postMessage', 27 );
		
		// Display Line
		indotimeline_checkbox_control( 'timeline', 'display_line', esc_html__( 'Enable Vertical Line', 'indotimeline' ), 'postMessage', 27 );
		

		$columns = array(
			'2'   => esc_html__( '2 Columns', 'indotimeline' ),
			'3' => esc_html__( '3 Columns', 'indotimeline' ),
			'4' => esc_html__( '4 Columns', 'indotimeline' )
		);

		// Timeline Columns
		// HIDE
		// indotimeline_radio_control( 'timeline', 'columns', esc_html__( 'Timeline Columns', 'indotimeline' ), $columns, 'refresh', 27 );


/**
 * Create Header Image
 *
 */
	
	/*
	$wp_customize->get_section( 'header_image' )->priority = 10;

	// Page Header label
	indotimeline_checkbox_control( 'header_image', 'label', esc_html__( 'Page Header', 'indotimeline' ), 'refresh', 1 );

	$bg_image_size = array(
		'cover'   => esc_html__( 'Cover', 'indotimeline' ),
		'initial' => esc_html__( 'Pattern', 'indotimeline' )
	);

	// Background Image Size
	indotimeline_radio_control( 'header_image', 'bg_image_size', esc_html__( 'Background Image Size', 'indotimeline' ), $bg_image_size, 'refresh', 10 );
	*/


/**
 * Create Site Identity
 *
 */

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Logo Width, Next Version
	/*
	indotimeline_number_absint_control( 'title_tagline', 'logo_max_width', esc_html__( 'Logo Max Width', 'indotimeline' ), array( 'step' => '10' ), 'postMessage', 8 );

	$wp_customize->get_control( 'custom_logo' )->transport = 'selective_refresh';
	*/


/**
 * Social Media
 *
 */

	// add social media section
	$wp_customize->add_section( 'indotimeline_social_media' , array(
		'title'		 => esc_html__( 'Social Media Settings', 'indotimeline' ),
		'priority'	 => 33,
		'capability' => 'edit_theme_options'
	) );
	
	// Social Facebook
	indotimeline_url_control( 'social_media', 'facebook', esc_html__( 'Facebook', 'indotimeline' ), 'refresh', 5 );

	// Social Twitter
	indotimeline_url_control( 'social_media', 'twitter', esc_html__( 'Twitter', 'indotimeline' ), 'refresh', 9 );

	// Social Linkedin
	indotimeline_url_control( 'social_media', 'linkedin', esc_html__( 'Linkedin', 'indotimeline' ), 'refresh', 13 );

	// Social Instagram
	indotimeline_url_control( 'social_media', 'instagram', esc_html__( 'Instagram', 'indotimeline' ), 'refresh', 17 );

	// Social Whatapp
	indotimeline_text_control( 'social_media', 'whatapp', esc_html__( 'Whatapp', 'indotimeline' ), 'refresh', 17 );


}
add_action( 'customize_register', 'indotimeline_customize_register' );

/*
** Bind JS handlers to instantly live-preview changes
*/
function indotimeline_customize_preview_js() {
	wp_enqueue_script( 'indotimeline-customize-preview', get_theme_file_uri( '/inc/customizer/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'indotimeline_customize_preview_js' );
