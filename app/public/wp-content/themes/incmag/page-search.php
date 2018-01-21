<?php
/*
Template Name: Search Page
*/
?>
<?php
get_header(); ?>

<div class="container">

	<div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">
		
			<div class="row">
				
				<div class="col-md-9">
					<div class="search-form-feature">
						<?php get_search_form(); ?>
					</div>
				</div>
				
				<div class="col-md-3">
					<?php get_sidebar(); ?>
				</div>
				
				<div class="comments-section">
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				</div>
				
			</div>
			
		</main><!-- #main -->
		
	</div><!-- #primary -->

<?php get_footer();