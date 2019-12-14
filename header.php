<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IndoTimeline
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'indotimeline' ); ?></a>

	<div class="section-header-wrapper">

		<?php if ( indotimeline_options('general_header_display') != "hide")  : ?>

		<header id="masthead" class="site-header js_header">
			<div class="site-header-bg js_header_bg"></div>

			<div class="site-header-content">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title link-inherit"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$indotimeline_description = get_bloginfo( 'description', 'display' );
					if ( $indotimeline_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $indotimeline_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
			</div>

		</header><!-- #masthead -->

		<?php endif ; ?>

		<div class="navbar-header">
			<div class="navbar-header-inner">
				<div class="container clearfix">
					<div class="navbar-btn nav-widget float-left js_sidebar_action">
						<i class="ionicons icon-now ion-ios-keypad itl-fz-26"></i>
						<i class="ionicons icon-gost ion-close itl-fz-23"></i>
					</div>

					<?php if ( !is_singular() && !is_404() ) : ?>
						<?php

						$indotimeline_social_media_facebook = indotimeline_options('social_media_facebook');
						$indotimeline_social_media_twitter = indotimeline_options('social_media_twitter');
						$indotimeline_social_media_instagram = indotimeline_options('social_media_instagram');
						$indotimeline_social_media_linkedin = indotimeline_options('social_media_linkedin');
						$indotimeline_social_media_whatapp = indotimeline_options('social_media_whatapp');

						if ( !empty( $indotimeline_social_media_facebook ) || !empty( $indotimeline_social_media_twitter ) || !empty( $indotimeline_social_media_instagram ) || !empty( $indotimeline_social_media_linkedin ) || !empty( $indotimeline_social_media_whatapp ) ) : ?>
							<div class="social-media float-left">
								<div class="social-icon">

									<?php if ( !empty( $indotimeline_social_media_facebook ) ) { ?>
										<a href="<?php echo esc_url( $indotimeline_social_media_facebook ) ; ?>" class="inline-block social-icon-in facebook">
											<i class="ionicons ion-social-facebook itl-fz-20"></i>
										</a>
									<?php } ?>

									<?php if ( !empty( $indotimeline_social_media_twitter ) ) { ?>
										<a href="<?php echo esc_url( $indotimeline_social_media_twitter ); ?>" class="inline-block social-icon-in twitter">
											<i class="ionicons ion-social-twitter itl-fz-20"></i>
										</a>
									<?php } ?>

									<?php if ( !empty( $indotimeline_social_media_instagram ) ) { ?>
										<a href="<?php echo esc_url( $indotimeline_social_media_instagram ); ?>" class="inline-block social-icon-in instagram">
											<i class="ionicons ion-social-instagram itl-fz-20"></i>
										</a>
									<?php } ?>

									<?php if ( !empty( $indotimeline_social_media_linkedin ) ) { ?>
										<a href="<?php echo esc_url( $indotimeline_social_media_linkedin ); ?>" class="inline-block social-icon-in linkedin">
											<i class="ionicons ion-social-linkedin itl-fz-20"></i>
										</a>
									<?php } ?>

									<?php if ( !empty( $indotimeline_social_media_whatapp ) ) { ?>
										<a href="tel:<?php echo esc_url( $indotimeline_social_media_whatapp  ); ?>" class="inline-block social-icon-in whatapp">
											<i class="ionicons ion-social-whatsapp-outline itl-fz-20"></i>
										</a>
									<?php } ?>

								</div>
							</div>
						<?php endif ; ?>
					<?php endif ; ?>

					<div class="float-right">

						<div class="navbar-btn navigation-menu float-right js_navigation_action">
							<i class="ionicons icon-now ion-navicon itl-fz-36"></i>
							<i class="ionicons icon-gost ion-close itl-fz-23"></i>
						</div>

					</div>
				</div>
			</div>

		</div>
		<!-- .navbar-header -->

		<nav id="site-navigation" class="main-navigation site-navigation">
			<div class="close-mobile-btn js_navigation_action">
				<i class="ionicons icon-gost ion-close itl-fz-23"></i>
			</div>
			<div class="container">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'indotimeline' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
				<div class="nav-search">
					<?php get_search_form(); ?>
				</div>

				<div class="nav-search-btn js_navigation_search_action">
					<i class="ionicons icon-now ion-ios-search-strong itl-fz-28"></i>
					<i class="ionicons icon-gost ion-close itl-fz-22"></i>
				</div>
				
			</div>
			
		</nav><!-- #site-navigation -->

	</div>
	<!-- .section-header-wrapper -->


	<div id="content" class="site-content">
