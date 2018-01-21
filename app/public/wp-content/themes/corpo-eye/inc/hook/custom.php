<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Corpo_Eye
 */

if ( ! function_exists( 'corpo_eye_skip_to_content' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_skip_to_content() {
	?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'corpo-eye' ); ?></a><?php
	}
endif;

add_action( 'corpo_eye_action_before', 'corpo_eye_skip_to_content', 15 );


if ( ! function_exists( 'corpo_eye_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_site_branding() {

		?>
	    <div class="site-branding">

			<?php corpo_eye_the_custom_logo(); ?>

			<?php $show_title = corpo_eye_get_option( 'show_title' ); ?>
			<?php $show_tagline = corpo_eye_get_option( 'show_tagline' ); ?>
			<?php if ( true === $show_title || true === $show_tagline ) :  ?>
				<div id="site-identity">
					<?php if ( true === $show_title ) :  ?>
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ( true === $show_tagline ) :  ?>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php endif; ?>
				</div><!-- #site-identity -->
			<?php endif; ?>
	    </div><!-- .site-branding -->
    	<?php $search_in_header = corpo_eye_get_option( 'search_in_header' ); ?>
	    <?php if ( true === $search_in_header ) : ?>
	    	<div class="header-search-box">
		    	<a href="#" class="search-icon"><i class="fa fa-search"></i></a>
		    	<div class="search-box-wrap">
		    		<?php get_search_form(); ?>
		    	</div><!-- .search-box-wrap -->
		    </div><!-- .header-search-box -->
		<?php endif; ?>
	    <div id="main-nav">
	        <nav id="site-navigation" class="main-navigation" role="navigation">
	            <div class="wrap-menu-content">
					<?php
					wp_nav_menu(
						array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'fallback_cb'    => 'corpo_eye_primary_navigation_fallback',
						)
					);
					?>
	            </div><!-- .menu-content -->
	        </nav><!-- #site-navigation -->
	    </div> <!-- #main-nav -->
	    <?php
	}

endif;

add_action( 'corpo_eye_action_header', 'corpo_eye_site_branding' );

if ( ! function_exists( 'corpo_eye_mobile_navigation' ) ) :

	/**
	 * Mobile navigation.
	 *
	 * @since 2.0.0
	 */
	function corpo_eye_mobile_navigation() {
		?>
		<a id="mobile-trigger" href="#mob-menu"><i class="fa fa-bars"></i></a>
		<div id="mob-menu">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => '',
				'fallback_cb'    => 'corpo_eye_primary_navigation_fallback',
				) );
			?>
		</div><!-- #mob-menu -->
		<?php

	}

endif;
add_action( 'corpo_eye_action_before', 'corpo_eye_mobile_navigation', 20 );

if ( ! function_exists( 'corpo_eye_footer_copyright' ) ) :

	/**
	 * Footer copyright
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_footer_copyright() {

		// Check if footer is disabled.
		$footer_status = apply_filters( 'corpo_eye_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}

		// Footer Menu.
		$footer_menu_content = wp_nav_menu( array(
			'theme_location' => 'footer',
			'container'      => 'div',
			'container_id'   => 'footer-navigation',
			'depth'          => 1,
			'fallback_cb'    => false,
			'echo'           => false,
		) );

		// Copyright content.
		$copyright_text = corpo_eye_get_option( 'copyright_text' );
		$copyright_text = apply_filters( 'corpo_eye_filter_copyright_text', $copyright_text );
		if ( ! empty( $copyright_text ) ) {
			$copyright_text = wp_kses_data( $copyright_text );
		}

		// Powered by content.
		$powered_by_text = sprintf( esc_html__( 'Corpo Eye by %s', 'corpo-eye' ), '<a target="_blank" rel="designer" href="https://wenthemes.com/">' . esc_html__( 'WEN Themes', 'corpo-eye' ) . '</a>' );

		$show_social_in_footer = corpo_eye_get_option( 'show_social_in_footer' );

		$column_count = 0;

		if ( $footer_menu_content ) {
			$column_count++;
		}
		if ( $copyright_text ) {
			$column_count++;
		}
		if ( $powered_by_text ) {
			$column_count++;
		}
		if ( true === $show_social_in_footer && has_nav_menu( 'social' ) ) {
			$column_count++;
		}

		?>

		<div class="colophon-inner colophon-grid-<?php echo esc_attr( $column_count ); ?>">

		    <?php if ( ! empty( $copyright_text ) ) :  ?>
			    <div class="colophon-column">
			    	<div class="copyright">
			    		<?php echo $copyright_text; ?>
			    	</div><!-- .copyright -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( true === $show_social_in_footer && has_nav_menu( 'social' ) ) :  ?>
			    <div class="colophon-column">
			    	<div class="footer-social">
			    		<?php the_widget( 'Corpo_Eye_Social_Widget' ); ?>
			    	</div><!-- .footer-social -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( ! empty( $footer_menu_content ) ) : ?>
		    	<div class="colophon-column">
					<?php echo $footer_menu_content; ?>
		    	</div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( ! empty( $powered_by_text ) ) : ?>
			    <div class="colophon-column">
			    	<div class="site-info">
			    		<?php echo $powered_by_text; ?>
			    	</div><!-- .site-info -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		</div><!-- .colophon-inner -->

	    <?php
	}

endif;

add_action( 'corpo_eye_action_footer', 'corpo_eye_footer_copyright', 10 );


if ( ! function_exists( 'corpo_eye_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_add_sidebar() {

		global $post;

		$global_layout = corpo_eye_get_option( 'global_layout' );
		$global_layout = apply_filters( 'corpo_eye_filter_theme_global_layout', $global_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'corpo_eye_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

		// Include secondary sidebar.
		switch ( $global_layout ) {
			case 'three-columns':
			get_sidebar( 'secondary' );
			break;

			default:
			break;
		}

	}

endif;

add_action( 'corpo_eye_action_sidebar', 'corpo_eye_add_sidebar' );


if ( ! function_exists( 'corpo_eye_custom_posts_navigation' ) ) :

	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_custom_posts_navigation() {

		the_posts_pagination();

	}
endif;

add_action( 'corpo_eye_action_posts_navigation', 'corpo_eye_custom_posts_navigation' );


if ( ! function_exists( 'corpo_eye_add_image_in_single_display' ) ) :

	/**
	 * Add image in single post.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_add_image_in_single_display() {

		global $post;

		if ( has_post_thumbnail() ) {

			$values = get_post_meta( $post->ID, 'corpo_eye_theme_settings', true );
			$corpo_eye_theme_settings_single_image = isset( $values['single_image'] ) ? esc_attr( $values['single_image'] ) : '';

			if ( ! $corpo_eye_theme_settings_single_image ) {
				$corpo_eye_theme_settings_single_image = corpo_eye_get_option( 'single_image' );
			}

			if ( 'disable' !== $corpo_eye_theme_settings_single_image ) {
				$args = array(
					'class' => 'aligncenter',
				);
				the_post_thumbnail( esc_attr( $corpo_eye_theme_settings_single_image ), $args );
			}
		}

	}

endif;

add_action( 'corpo_eye_single_image', 'corpo_eye_add_image_in_single_display' );

if ( ! function_exists( 'corpo_eye_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_add_breadcrumb() {

		// Bail if Home Page.
		if ( is_front_page() || is_home() ) {
			return;
		}

		echo '<div id="breadcrumb">';
		corpo_eye_simple_breadcrumb();
		echo '</div><!-- #breadcrumb -->';

	}

endif;

add_action( 'corpo_eye_action_breadcrumb', 'corpo_eye_add_breadcrumb' );

if ( ! function_exists( 'corpo_eye_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_footer_goto_top() {

		echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up"></i></a>';

	}

endif;

add_action( 'corpo_eye_action_after', 'corpo_eye_footer_goto_top', 20 );

if ( ! function_exists( 'corpo_eye_add_front_page_widget_area' ) ) :

	/**
	 * Add Front Page Widget area.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_add_front_page_widget_area() {

		$current_id = corpo_eye_get_index_page_id();

		if ( is_front_page() && get_queried_object_id() === $current_id && $current_id > 0 ) {
			echo '<div id="sidebar-front-page-widget-area" class="widget-area">';
			if ( is_active_sidebar( 'sidebar-front-page-widget-area' ) ) {
				dynamic_sidebar( 'sidebar-front-page-widget-area' );
			}
			else {
				do_action( 'corpo_eye_action_default_front_page_widget_area' );
			}
			echo '</div><!-- #sidebar-front-page-widget-area -->';
		}

	}
endif;

add_action( 'corpo_eye_action_before_content', 'corpo_eye_add_front_page_widget_area', 7 );

if ( ! function_exists( 'corpo_eye_check_home_page_content' ) ) :

	/**
	 * Check home page content status.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $status Home page content status.
	 * @return bool Modified home page content status.
	 */
	function corpo_eye_check_home_page_content( $status ) {

		if ( is_front_page() ) {
			$home_content_status = corpo_eye_get_option( 'home_content_status' );
			if ( false === $home_content_status ) {
				$status = false;
			}
		}

		return $status;

	}

endif;

add_action( 'corpo_eye_filter_home_page_content', 'corpo_eye_check_home_page_content' );

if ( ! function_exists( 'corpo_eye_add_footer_contact_section' ) ) :

	/**
	 * Display footer contact section.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_add_footer_contact_section() {

		$show_footer_contact = corpo_eye_get_option( 'show_footer_contact' );

		if ( true !== $show_footer_contact ) {
			return;
		}

		$footer_contact_email   = corpo_eye_get_option( 'footer_contact_email' );
		$footer_contact_address = corpo_eye_get_option( 'footer_contact_address' );
		$footer_contact_map_url = corpo_eye_get_option( 'footer_contact_map_url' );
		$footer_contact_phone   = corpo_eye_get_option( 'footer_contact_phone' );
		$enable_footer_contact_background_image = corpo_eye_get_option( 'enable_footer_contact_background_image' );
		$footer_contact_background_image = corpo_eye_get_option( 'footer_contact_background_image' );
		$enable_footer_contact_background_overlay = corpo_eye_get_option( 'enable_footer_contact_background_overlay' );
		$style_text = '';
		if ( true === $enable_footer_contact_background_image && ! empty( $footer_contact_background_image) ) {
			$style_text = 'background-image:url(' . esc_url( $footer_contact_background_image ) . ');';
		}
		$overlay_class = ( true === $enable_footer_contact_background_overlay ) ? 'footer-contact-overlay-enabled' : 'footer-contact-overlay-disabled' ;
		?>

		<div id="footer-contact-section" style="<?php echo $style_text; ?>" class="<?php echo esc_attr( $overlay_class ); ?>">
			<div class="container">
			<div class="inner-wrapper">
				<div class="quick-contact">
						<?php if ( ! empty( $footer_contact_email ) ) : ?>
							<div class="quick-contact-item quick-email">
								<div class="quick-contact-wrapper">
									<i class="fa fa-envelope"></i>
									<div class="quick-contact-inner">
										<h4><?php esc_html_e( 'Email', 'corpo-eye' ); ?></h4>
										<a href="<?php echo esc_url( 'mailto:' . $footer_contact_email ); ?>"><?php echo esc_attr( antispambot( $footer_contact_email ) ); ?></a>
									</div> <!-- .quick-contact-inner -->
								</div>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $footer_contact_address ) ) : ?>
							<?php
							$link_open  = '';
							$link_close = '';
							if ( ! empty( $footer_contact_map_url ) ) {
								$link_open  = '<a href="' . esc_url( $footer_contact_map_url ) . '" target="_blank">';
								$link_close = '</a>';
							}
							?>

						  	<div class="quick-contact-item quick-address">
							  	<div class="quick-contact-wrapper">
							  		<i class="fa fa-map-marker"></i>
							  		<div class="quick-contact-inner">
								  		<h4><?php esc_html_e( 'Address', 'corpo-eye' ); ?></h4><?php echo $link_open; ?><?php echo esc_html( $footer_contact_address ); ?><?php echo $link_close; ?>
							  		</div> <!-- .quick-contact-inner -->
							  	</div>
						  	</div>
						<?php endif; ?>

						<?php if ( ! empty( $footer_contact_phone ) ) : ?>
							<div class="quick-contact-item quick-call">
								<div class="quick-contact-wrapper">
									<i class="fa fa-phone"></i>
									<div class="quick-contact-inner">
										<h4><?php esc_html_e( 'Phone', 'corpo-eye' ); ?></h4>
										<?php $phone_cleaned = preg_replace( '/\D+/', '', $footer_contact_phone ); ?>
										<a href="<?php echo esc_url( 'tel:' . $phone_cleaned ); ?>"><?php echo esc_attr( $footer_contact_phone ); ?></a>
									</div> <!-- .quick-contact-inner -->
								</div>
							</div>
						<?php endif; ?>
				</div><!-- .quick-contact -->
				</div> <!-- .innerwrapper -->
			</div><!-- .container -->
		</div><!-- #footer-contact-section -->
		<?php
	}
endif;

add_action( 'corpo_eye_action_before_footer', 'corpo_eye_add_footer_contact_section', 2 );

if ( ! function_exists( 'corpo_eye_add_custom_header' ) ) :

	/**
	 * Add Custom Header.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_add_custom_header() {

		$flag_apply_custom_header = apply_filters( 'corpo_eye_filter_custom_header_status', true );
		if ( true !== $flag_apply_custom_header ) {
			return;
		}
		$attribute = '';
		$attribute = apply_filters( 'corpo_eye_filter_custom_header_style_attribute', $attribute );
		?>
		<div id="custom-header" <?php echo ( ! empty( $attribute ) ) ? ' style="' . esc_attr( $attribute ) . '" ' : ''; ?>>
			<div class="container">
				<?php
					/**
					 * Hook - corpo_eye_action_custom_header.
					 */
					do_action( 'corpo_eye_action_custom_header' );
				?>
			</div><!-- .container -->
		</div><!-- #custom-header -->
		<?php

	}
endif;

add_action( 'corpo_eye_action_before_content', 'corpo_eye_add_custom_header', 6 );

if ( ! function_exists( 'corpo_eye_add_title_in_custom_header' ) ) :

	/**
	 * Add title in Custom Header.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_add_title_in_custom_header() {
		$tag = 'h1';
		if ( is_front_page() ) {
			$tag = 'h2';
		}
		$custom_page_title = apply_filters( 'corpo_eye_filter_custom_page_title', '' );
		?>
		<div class="header-content">
			<div class="header-content-inner">
				<?php if ( ! empty( $custom_page_title ) ) : ?>
					<?php echo '<' . $tag . ' class="page-title">'; ?>
					<?php echo esc_html( $custom_page_title ); ?>
					<?php echo '</' . $tag . '>'; ?>
				<?php endif; ?>
			</div><!-- .header-content-inner -->
			<?php do_action( 'corpo_eye_action_breadcrumb' ); ?>
        </div><!-- .header-content -->
		<?php
	}

endif;

add_action( 'corpo_eye_action_custom_header', 'corpo_eye_add_title_in_custom_header' );

if ( ! function_exists( 'corpo_eye_customize_page_title' ) ) :

	/**
	 * Add title in Custom Header.
	 *
	 * @since 1.0.0
	 *
	 * @param string $title Title.
	 * @return string Modified title.
	 */
	function corpo_eye_customize_page_title( $title ) {

		if ( is_front_page() && 'posts' === get_option( 'show_on_front' ) ) {
			$title = corpo_eye_get_option( 'blog_title' );
		}
		elseif ( is_home() && ( $blog_page_id = corpo_eye_get_index_page_id( 'blog' ) ) > 0 ) {
			$title = get_the_title( $blog_page_id );
		}
		elseif ( is_singular() ) {
			$title = single_post_title( '', false );
		}
		elseif ( is_archive() ) {
			$title = strip_tags( get_the_archive_title() );
		}
		elseif ( is_search() ) {
			$title = sprintf( __( 'Search Results for: %s', 'corpo-eye' ),  get_search_query() );
		}
		elseif ( is_404() ) {
			$title = __( '404!', 'corpo-eye' );
		}
		return $title;
	}
endif;

add_filter( 'corpo_eye_filter_custom_page_title', 'corpo_eye_customize_page_title' );

if ( ! function_exists( 'corpo_eye_add_image_in_custom_header' ) ) :

	/**
	 * Add image in Custom Header.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_add_image_in_custom_header( $input ) {

		$image_details = array();

		if ( empty( $image_details ) ) {

			// Fetch from Custom Header Image.
			$image = get_header_image();
			if ( ! empty( $image ) ) {
				$image_details['url']    = $image;
				$image_details['width']  = get_custom_header()->width;
				$image_details['height'] = get_custom_header()->height;
			}
		}

		if ( ! empty( $image_details ) ) {
			$input .= 'background-image:url(' . esc_url( $image_details['url'] ) . ');';
			$input .= 'background-size:cover;';
		}

		return $input;

	}

endif;

add_filter( 'corpo_eye_filter_custom_header_style_attribute', 'corpo_eye_add_image_in_custom_header' );

if( ! function_exists( 'corpo_eye_check_custom_header_status' ) ) :

	/**
	 * Check status of custom header.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_check_custom_header_status( $input ) {

		if ( is_front_page() && ! is_home() ) {
			$input = false;
		}

		return $input;

	}

endif;

add_filter( 'corpo_eye_filter_custom_header_status', 'corpo_eye_check_custom_header_status' );

