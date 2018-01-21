<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Corpo_Eye
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
	  /**
	   * Hook - corpo_eye_single_image.
	   *
	   * @hooked corpo_eye_add_image_in_single_display - 10
	   */
	  do_action( 'corpo_eye_single_image' );
	?>

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php corpo_eye_posted_on(); ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="entry-content-wrapper">
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corpo-eye' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry-content-wrapper -->

	<footer class="entry-footer">
		<?php corpo_eye_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
