<?php
/**
 * The template for displaying all pages.
 * Template Name: Full Width Page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package incmag
 */

get_header(); ?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="row">
		<div class="col-md-12">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'fullwidth' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>
		<div class="col-md-12">
			<?php get_sidebar(); ?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();