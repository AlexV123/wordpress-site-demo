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

	<div class="row clearme">

<?php

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>

				<header>

					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>

				</header>

			<?php

			endif; ?>

		<?php endif; ?>
	<div class="row clearme">

		<div class="col-md-9">
			<h1><?php echo single_cat_title(); ?></h1>

		<div class="category-description">
			<?php echo category_description(); ?>
		</div>

		<?php

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>

			<?php

			endif;

			$count = 0; //set up counter variable

			/* Start the Loop */

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'frontpage-list'	);
	

			endwhile;
			the_posts_navigation();
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div>

		<div class="col-md-3 alignright">

			<?php get_sidebar(); ?>

		</div>

	</div><!-- .row -->

		</main><!-- #main -->

	</div><!-- #primary -->

</div>

<?php
get_footer();
