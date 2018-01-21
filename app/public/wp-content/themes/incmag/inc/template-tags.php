<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package incmag
 */

if ( ! function_exists( 'incmag_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function incmag_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		'<i class="fa fa-calendar"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'incmag' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><i class="fa fa-user"></i><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'incmag_posted_on_mini' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function incmag_posted_on_mini() {
	$time_string = '<time class="entry-date published " datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date 44 published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.

}
endif;


if ( ! function_exists( 'incmag_author' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function incmag_author() {

	$user_description = get_the_author_meta( 'user_description', $post->post_author );
	$byline = sprintf(
		'<footer class="author_bio_section"><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><p class="author_name">' . esc_html( get_the_author() ) . '</p></a></span><p class="author_details_bar">' . get_avatar( get_the_author_meta('user_email') , 90 ) .'</p><p class="author_links"><a href="'. $user_posts .'">View all posts</a></p></footer>'
	);

	echo '<span class="author-name">' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;


if ( ! function_exists( 'incmag_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function incmag_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'incmag' ) );
		if ( $categories_list && incmag_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'incmag' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'incmag' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'incmag' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'incmag' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'incmag' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

if ( ! function_exists( 'incmag_entry_listmeta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function incmag_entry_listmeta() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'incmag' ) );
		if ( $categories_list && incmag_categorized_blog() ) {
			printf( '<i class="fa fa-tags"></i><span class="cat-links">' . esc_html( '%1$s', 'incmag' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}

}
endif;


if ( ! function_exists( 'incmag_footer_credits' ) ):
/**
 * Credit footer
 */
function incmag_footer_credits() {
	$inc_link = "https://incredibleplanet.net";
	echo '<div class="footer-credits"><p>By <a href="'. esc_url($inc_link) .'">Incredible Planet</a></p></div>';
}
endif;
/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function incmag_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'incmag_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'incmag_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so incmag_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so incmag_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in incmag_categorized_blog.
 */
function incmag_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'incmag_categories' );
}
add_action( 'edit_category', 'incmag_category_transient_flusher' );
add_action( 'save_post',     'incmag_category_transient_flusher' );
