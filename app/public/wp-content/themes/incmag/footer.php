<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package incmag
 */

?>


	</div><!-- #content -->
	
<div class="footer-wrapper">

	<footer id="colophon" class="site-footer container" role="contentinfo">
	
		<div class="footer-bar">
		
			<h2 class="footer-title"><?php bloginfo( 'name' ); ?></h2>	
			<div class="title-signature">
				<p><?php bloginfo( 'description' ); ?></p>
			</div>
		
		</div>
		
		<div class="row">
		
		<div class="footer-fourth col-md-3">
			<?php dynamic_sidebar( 'footer-2' ); ?>		
		</div>
				<div class="footer-fourth col-md-3">
			<?php dynamic_sidebar( 'footer-3' ); ?>		
		</div>
				<div class="footer-fourth col-md-3">
			<?php dynamic_sidebar( 'footer-4' ); ?>		
		</div>
				<div class="footer-fourth col-md-3">
			<?php dynamic_sidebar( 'footer-5' ); ?>		
		</div>
		
		</div>
		
		<div class="site-info">

				<?php incmag_footer(); ?> 
				
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
	
	</div>
 
 </div><!-- .container -->

 </div><!-- #page -->
<div off-canvas="slide-navigation left shift">
	<h2 class="slide-title"><?php bloginfo( 'name' ); ?></h2>	
	<?php wp_nav_menu( 
		array( 
			'theme_location' => 'canvas2', 
			'menu_id' => '',
			'menu_class' => 'small canvasmenu',
			'menu_id' => 'canvas2'
		) 
	); ?>
</div>	

<?php wp_footer(); ?>



</div>
</body>
</html>
