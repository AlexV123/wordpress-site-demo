<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package incmag
 */

?>
<?php if ( ! is_page() ) : ?>

	<?php if ( has_post_thumbnail()) { ?>
		<div class="full-width-image">
			<?php the_post_thumbnail('incmag-postview-large'); ?>
		</div>
	<?php }
		else {
			$post_thumb_class = "no-featured-image";
		}
	?>

<?php endif; ?>

	<div class="row">
	
		<div class="col-md-8">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php if ($post_thumb_class == "no-featured-image") { ?>
				<div class="postview-image-no-wrap">
					<div class="title-no-image-positioning">
			<?php } 
				else { ?>
				<div class="postview-image-wrap">
					<div class="title-positioning">
				<?php } ?>
						<div class="entry-meta">
					
							<?php incmag_posted_on(); ?>
		
						</div><!-- .entry-meta -->

						<br>

						<?php
							the_title( '<h1 class="entry-title featured-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						?>

						<br />

						<div class="entry-meta">						
				
							<?php incmag_entry_listmeta(); ?>
							
						</div>

					</div>

				</div>
		
				<div class="entry-content postview-content">
				
					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'incmag' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

						wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'incmag' ),
						'after'  => '</div>',
						) );
					?>

				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		</div>
		
		<div class="col-md-3 col-md-offset-1">
		
			<?php get_sidebar(); ?>
			
		</div>
		
	</div>
