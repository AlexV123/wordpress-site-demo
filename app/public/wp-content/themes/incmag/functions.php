<?php
/**
 * incmag functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package incmag
 */

if ( ! function_exists( 'incmag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function incmag_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on incmag, use a find and replace
	 * to change 'incmag' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'incmag', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'incmag-postview-large', 1560, 715, true);
	add_image_size( 'incmag-frontpage-featured', 731, 508, true ); 
	add_image_size( 'incmag-frontpage-list', 446, 256, true );
	add_image_size( 'incmag-frontpage-mini', 351, 240, true );
	add_image_size( 'incmag-thumb-square', 140, 140, array( 'center', 'center' ));
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'incmag' ),
	) );
	register_nav_menus( array(
		'canvas2' => esc_html__( 'Canvas2', 'incmag' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'incmag_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'incmag_setup' );

if ( ! function_exists( 'incmag_custom_excerpt_length' ) ) :
	function incmag_custom_excerpt_length( $length ) {
		return 24;
	}
	add_filter( 'excerpt_length', 'incmag_custom_excerpt_length', 999 );
endif;

function incmag_excerpt_more( $more ) {
    return ' ... <a class="read-more-link" href="'.get_the_permalink().'" rel="nofollow">Read More</a>';
}
add_filter( 'excerpt_more', 'incmag_excerpt_more' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function incmag_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'incmag_content_width', 640 );
}
add_action( 'after_setup_theme', 'incmag_content_width', 0 );


 


function incmag_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'incmag' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'incmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'incmag' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'incmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer1', 'incmag' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'incmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer2', 'incmag' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'incmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer3', 'incmag' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'incmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer4', 'incmag' ),
		'id'            => 'footer-5',
		'description'   => esc_html__( 'Add widgets here.', 'incmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
}
add_action( 'widgets_init', 'incmag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function incmag_scripts() {
	
	wp_enqueue_style( 'incmag-skeleton', get_template_directory_uri() . '/css/bootstrap.css');
	
	wp_enqueue_style( 'incmag-slidebars', get_template_directory_uri() . '/css/slidebars.css');	

	wp_enqueue_style( 'incmag-awesome', get_template_directory_uri() . '/css/font-awesome.css' );		
	
	wp_enqueue_style( 'incmag-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'work-sans-font', get_template_directory_uri() . '/css/google.fonts.css' );

	wp_enqueue_script( 'incmag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

		
	wp_enqueue_script( 'incmag-skeleton-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'incmag-slidebars', get_template_directory_uri() . '/js/slidebars.js', array(), '20151215', true );	
	
	wp_enqueue_script( 'incmag-slidebars-init', get_template_directory_uri() . '/js/slidebars-init.js', array(), '20151215', true );					

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'incmag_scripts' );
/**
 * Custom footer credits
 */
require get_template_directory() . '/inc/footer-credits.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

if ( ! function_exists( 'incmag_posted_on_name' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function incmag_posted_on_name() {
	
	global $post;
	$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
	$user_description = get_the_author_meta( 'user_description', $post->post_author );
	$user_mail = get_the_author_meta('user_email', $post->post_author);
	$user_link = get_the_author_meta('url', $post->post_author);

	$byline = sprintf(
		'<footer class="author_bio_section"><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><p class="author_name">' . esc_html( get_the_author() ) . '</p></a></span><p class="author_details">' . get_avatar( get_the_author_meta('user_email') , 90 ) . nl2br( $user_description ). '</p><p><a href="mailto:' . nl2br( $user_mail ). '">Contact</a> | <a href="' . $user_link .'" target="_blank" rel="external">Website</a></p></footer>'
	);

	echo '<span class="author-name">' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'incmag_author_meta' ) ) :

	function incmag_author_meta( $content ) {
		global $post;

		if ( is_single() && isset( $post->post_author ) ) {
			$display_name = get_the_author_meta( 'display_name', $post->post_author );

		if ( empty( $display_name ) )
			$display_name = get_the_author_meta( 'nickname', $post->post_author );
			$user_description = get_the_author_meta( 'user_description', $post->post_author );
			$user_website = get_the_author_meta('url', $post->post_author);
			$user_mailadd = get_the_author_meta('user_email', $post->post_author);
			$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
	 
		if ( ! empty( $display_name ) )
			$author_details = '<p class="author_name">' . $display_name . '</p>';

		if ( ! empty( $user_description ) )
			$author_details .= '<p class="author_details">' . get_avatar( get_the_author_meta('user_email') , 90 ) . nl2br( $user_description ). '</p>';
			$author_details .= '<p class="author_links"><a href="'. $user_posts .'">View all posts by ' . $display_name . '</a>';  

		if ( ! empty( $user_website ) ) {
			$author_details .= ' | <a href="mailto:' . $user_mailadd .' ">Contact</a> | <a href="' . $user_website .'" target="_blank" rel="nofollow">Website</a></p>';

		} else { 
			$author_details .= '</p>';
		}
			$content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
		}
		return $content;
	}
	
endif;