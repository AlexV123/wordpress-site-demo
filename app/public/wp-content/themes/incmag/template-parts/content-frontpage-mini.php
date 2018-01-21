<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package incmag
 */

?>
<div class="col-md-3 mini-wrap">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header mini">
	
	<a href="<?php the_permalink(); ?>" >

		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail('incmag-frontpage-mini');
		} 
		else { 
			if ( '' == get_theme_mod( 'incmag_default_large' ) ) { 
				$incmag_default_large = ' '.get_template_directory_uri().'/images/default-image-large.jpg'; 
			} 
			else { 
				$incmag_default_large = esc_url(get_theme_mod('incmag_default_large')); 
			}
		?>
			<img src="<?php echo $incmag_default_large; ?>" alt="<?php the_title(); ?>" />
			
		<?php } ?>

	<i class="fa fa-bolt"></i>
	</a>
		<div class="title-positioning mini-title">

		<?php
			the_title( '<h3 class="entry-title featured-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		?>
		<br />
		<div class="entry-meta">
			<?php incmag_entry_listmeta(); ?>
		</div>
	</div>
	
	</header><!-- .entry-header -->
	
</article><!-- #post-## -->
</div>
