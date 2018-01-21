<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package incmag
 */

get_header(); ?>
<div class="container">
	<div id="primary" class="content-area frontpage">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() && ! is_page() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif; ?>



			<div class="row">
			<?php
			$count = 0; //set up counter variable
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			$count++;
			
			if ($count == 1) {
					get_template_part( 'template-parts/content', 'frontpage'	);
			}			
			if (($count == 2) || ($count == 3) || ($count == 5) || ($count == 4)) {
				get_template_part( 'template-parts/content', 'frontpage-mini'	);
			}			

		
			endwhile; ?>
			</div>
		<?php 
		endif; ?>

		<div class="row clearme">
		<?php if ( ! is_page() ) : ?>
			<div class="col-md-9">
		<?php else : ?>
			<div class="col-md-12">
		<?php endif; ?>
		
		<?php
		if ( have_posts() && ! is_page() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				
			<?php
			endif;
			$count = 0; //set up counter variable
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			$count++;

			if ($count >= 6) {
				get_template_part( 'template-parts/content', 'frontpage-list'	);
			}			

			endwhile;	
			
			the_posts_pagination();
			
		else :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page-fullwidth' );
			endwhile;
		endif; ?>
		
		</div>
		<?php if ( ! is_page() ) : ?>
		<div class="col-md-3 alignright">

			<?php get_sidebar(); ?>
		
		</div
		<?php endif; ?>

	</div><!-- .row -->
	
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php

get_footer();
