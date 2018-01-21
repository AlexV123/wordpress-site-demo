<?php
/**
 * Header Top Left Options
 *
 * @since Prolific 1.0.0
 *
 * @param null
 * @return array $prolific_header_top_left_options
 *
 */
if ( !function_exists('prolific_header_top_left_options') ) :
    function prolific_header_top_left_options() {
        $prolific_header_top_left_options =  array(
            'email' => __( 'Email', 'prolific' ),
            'phone' => __( 'Phone', 'prolific' ),
            'both' =>  __( 'Both', 'prolific' ),
            'none' =>  __( 'None', 'prolific' )
        );
        return apply_filters( 'prolific_header_top_left_options', $prolific_header_top_left_options );
    }
endif;

/**
 * Header Top Right Options
 *
 * @since Prolific 1.0.0
 *
 * @param null
 * @return array $prolific_header_top_right_options
 *
 */
if ( !function_exists('prolific_header_top_right_options') ) :
    function prolific_header_top_right_options() {
        $prolific_header_top_right_options =  array(
            'social' => __( 'Social Links', 'prolific' ),
            'none' =>  __( 'None', 'prolific' )
        );
        return apply_filters( 'prolific_header_top_right_options', $prolific_header_top_right_options );
    }
endif;

/**
 * Featured Slider Number
 *
 * @since Prolific 1.0.0
 *
 * @param null
 * @return array $prolific_featured_slider_number
 *
 */
if ( !function_exists('prolific_featured_slider_number') ) :
    function prolific_featured_slider_number() {
        $prolific_featured_slider_number =  array(
            1 => __( '1', 'prolific' ),
            2 => __( '2', 'prolific' ),
            3 =>  __( '3', 'prolific' )
        );
        return apply_filters( 'prolific_featured_slider_number', $prolific_featured_slider_number );
    }
endif;

/**
 * Header logo/text display options alternative
 *
 * @since Prolific 1.0.2
 *
 * @param null
 * @return array $prolific_header_id_display_opt
 *
 */
if ( !function_exists('prolific_header_id_display_opt') ) :
    function prolific_header_id_display_opt() {
        $prolific_header_id_display_opt =  array(
            'logo-only' => __( 'Logo Only ( First Select Logo Above )', 'prolific' ),
            'title-only' => __( 'Site Title Only', 'prolific' ),
            'title-and-tagline' =>  __( 'Site Title and Tagline', 'prolific' ),
            'disable' => __( 'Disable', 'prolific' )
        );
        return apply_filters( 'prolific_header_id_display_opt', $prolific_header_id_display_opt );
    }
endif;


/**
 * Sidebar layout options
 *
 * @since Prolific 1.0.0
 *
 * @param null
 * @return array $prolific_sidebar_layout
 *
 */
if ( !function_exists('prolific_sidebar_layout') ) :
    function prolific_sidebar_layout() {
        $prolific_sidebar_layout =  array(
            'right-sidebar'=> __( 'Right Sidebar', 'prolific' ),
            'left-sidebar'=> __( 'Left Sidebar' , 'prolific' ),
            'no-sidebar'=> __( 'No Sidebar', 'prolific' )
        );
        return apply_filters( 'prolific_sidebar_layout', $prolific_sidebar_layout );
    }
endif;

/**
 * Blog layout options
 *
 * @since Prolific 1.0.0
 *
 * @param null
 * @return array $prolific_blog_layout
 *
 */
if ( !function_exists('prolific_blog_layout') ) :
    function prolific_blog_layout() {
        $prolific_blog_layout =  array(
            'full-image' => __( 'Show Image', 'prolific' ),
            'no-image' => __( 'No Image', 'prolific' )
        );
        return apply_filters( 'prolific_blog_layout', $prolific_blog_layout );
    }
endif;

/**
 *  Default Theme layout options
 *
 * @since Prolific 1.0.0
 *
 * @param null
 * @return array $prolific_theme_layout
 *
 */
if ( !function_exists('prolific_get_default_theme_options') ) :
    function prolific_get_default_theme_options() {

        $default_theme_options = array(
            /*header*/
            'prolific-header-top-left-option'  => 'none',
            'prolific-phone-number'  => '',
            'prolific-top-email'  => '',
            'prolific-header-top-right-option'  => 'none',
            'prolific-enable-sticky'  => 1,

            /*feature section options*/
            'prolific-feature-page'  => 0,
            'prolific-featured-slider-number'  => 2,
            'prolific-enable-feature'  => '',
            'prolific-feature-slider-enable-animation'  => 1,

            /*header options*/
            'prolific-header-id-display-opt' => 'title-only',
            'prolific-facebook-url'  => '',
            'prolific-twitter-url'  => '',
            'prolific-youtube-url'  => '',
            'prolific-google-plus-url'  => '',
            'prolific-enable-social'  => '',

            /*footer options*/
            'prolific-footer-copyright'  => __( '&copy; All right reserved 2016', 'prolific' ),
            'prolific-footer-bg-img'  => '',

            /*layout/design options*/
            'prolific-hide-front-page-content'  => '',
            'prolific-sidebar-layout'  => 'right-sidebar',
            'prolific-blog-archive-layout'  => 'full-image',
            'prolific-primary-color'  => '#e74c3c',
            
            'prolific-blog-archive-more-text'  => __( 'Read More', 'prolific' ),
            /*theme options*/
            'prolific-search-placholder'  => __( 'Search', 'prolific' ),
            'prolific-show-breadcrumb'  => 0
        );

        return apply_filters( 'prolific_default_theme_options', $default_theme_options );
    }
endif;


/**
 *  Get theme options
 *
 * @since Prolific 1.0.0
 *
 * @param null
 * @return array prolific_theme_options
 *
 */
if ( !function_exists('prolific_get_theme_options') ) :
    function prolific_get_theme_options() {

        $prolific_default_theme_options = prolific_get_default_theme_options();
        $prolific_get_theme_options = get_theme_mod( 'prolific_theme_options');
        if( is_array( $prolific_get_theme_options )){
            return array_merge( $prolific_default_theme_options ,$prolific_get_theme_options );
        }
        else{
            return $prolific_default_theme_options;
        }

    }
endif;