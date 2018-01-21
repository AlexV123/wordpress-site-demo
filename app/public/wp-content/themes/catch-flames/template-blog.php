<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template Name: Blog Template
 * Description: A Page Template that disables a blog
 *
 * @package Catch Themes
 * @subpackage Catch Flames Pro
 * @since Catch Flames Pro 1.0
 */

get_header(); ?>

			<?php
			$paged = intval( ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
			
			$blog_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $paged ) );
			
			if ( $blog_query->have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>

				<?php while ( $blog_query->have_posts() ) : 

					$blog_query->the_post();  ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

                <?php 
                // Pagination start
                if ( $blog_query->max_num_pages > 1 ) { ?>
			        <nav role="navigation" id="nav-below">
			        	<h3 class="assistive-text"><?php esc_html_e( 'Post navigation', 'catch-flames' ); ?></h3>
						<?php if ( function_exists('wp_pagenavi' ) )  {
			                wp_pagenavi();
			            }
			            elseif ( function_exists('wp_page_numbers' ) ) {
			                wp_page_numbers();
			            }
			            else { ?>
			                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'catch-flames' ), $blog_query->max_num_pages ); ?></div>
			                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'catch-flames' ) ); ?></div>
			            <?php
			            } ?>
			        </nav><!-- #nav -->
				<?php
				}; ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'catch-flames' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'catch-flames' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif;
			wp_reset_postdata(); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>