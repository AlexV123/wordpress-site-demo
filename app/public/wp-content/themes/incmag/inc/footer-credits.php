<?php

/**
 * Custom footer credits
 * @package terra
 */
 
function incmag_footer()
{
	$footer_text = get_theme_mod('footer_text');
?>
	<p><?php echo esc_html($footer_text); ?></p>
<?php 
if ( ! class_exists('incredible_planet_license')):
	incmag_footer_credits(); 
endif;
}