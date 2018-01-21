<?php
/**
 * incmag Theme Customizer.
 *
 * @package incmag
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function incmag_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	$wp_customize->add_section('incmag_footer_settings', array(
		'title' => __('Footer Settings', 'incmag') ,
		'priority' => 67
	));
	$wp_customize->add_section('incmag_theme_settings', array(
		'title' => __('Theme Settings', 'incmag') ,
		'priority' => 68
	));
	$wp_customize->add_section('incmag_theme_support', array(
		'title' => __('Theme Support', 'incmag') ,
		'priority' => 201
	));
	$wp_customize->add_setting('accent_color', array(
		'sanitize_callback' => 'incmag_sanitize_text',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
		'label' => __('Accent color', 'incmag') ,
		'description' => __('Pick a bold, contrasty color for best results.', 'incmag') ,
		'section' => 'colors',
		'default' => 'ff2d55'
	)));
	/*
	* Options for showing tagline
	*/
	$wp_customize->add_setting('show_desc', array(
		'default' => 1,
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'incmag_sanitize_text'
	));
	$wp_customize->add_control('show_desc', array(
		'label' => __('Display tagline', 'incmag') ,
		'section' => 'title_tagline',
		'settings' => 'show_desc',
		'type' => 'checkbox',
		'std' => 1
	));
	/*
	* Options for showing logo
	*/
	$wp_customize->add_setting('show_logo', array(
		'default' => 1,
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'incmag_sanitize_text'
	));
	$wp_customize->add_control('show_logo', array(
		'label' => __('Display logo', 'incmag') ,
		'section' => 'title_tagline',
		'settings' => 'show_logo',
		'type' => 'checkbox',
		'std' => 1
	));
	$wp_customize->add_setting('incmag_logo', array(
		'default' => get_template_directory_uri() . '/images/default-logo.png',
		'sanitize_callback' => 'esc_url'
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'incmag_logo', array(
		'label' => __('Logo', 'incmag') ,
		'section' => 'title_tagline',
		'settings' => 'incmag_logo'
	)));
	/*
	* Options for setting missing square image
	*/
	$wp_customize->add_setting('incmag_default_thumb', array(
		'default' => get_template_directory_uri() . '/images/default-image.jpg',
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'incmag_default_thumb', array(
		'label' => __('Default image placeholder', 'incmag') ,
		'section' => 'incmag_theme_settings',
		'settings' => 'incmag_default_thumb'
	)));
	/*
	* Options for setting missing large image
	*/
	$wp_customize->add_setting('incmag_default_large', array(
		'default' => get_template_directory_uri() . '/images/default-image-large.jpg',
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'incmag_default_large', array(
		'label' => __('Large image placeholder', 'incmag') ,
		'section' => 'incmag_theme_settings',
		'settings' => 'incmag_default_large'
	)));
	
	/*
	* Footer settings
	*/
	$wp_customize->add_setting('footer_text', array(
		'default' => 'Copyright',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
		'sanitize_callback' => 'incmag_sanitize_text'
	));
	$wp_customize->add_control('footer_text', array(
		'label' => __('Copyright text for bottom of footer', 'incmag') ,
		'section' => 'incmag_footer_settings',
		'settings' => 'footer_text',
		'type' => 'text'
	));
	$wp_customize->add_setting('incmag_upgrade_notice', array(
		'sanitize_callback' => 'incmag_sanitize_text'
	));
	
	$upgrade_link = "https://incredibleplanet.net/incmag";
	$author_link = "https://incredibleplanet.net";
	
	if (!class_exists('incredible_planet_license')) {
		$wp_customize->add_control(new incmag_support_info($wp_customize, 'incmag_upgrade_notice', array(
			'settings' => 'incmag_upgrade_notice',
			'section' => 'incmag_footer_settings',
			'description' => '<div class="support-text"><p>Please <a href=" '. $upgrade_link .' " target="_blank">upgrade</a> to the paid version of this theme for an easy way of disabling the footer credits, as well as other benefits such as dedicated support and more features. Thank you!</p></div>'
		)));
	}
	/*
	* Support and help links
	*/
	$wp_customize->add_setting('incmag_support_text', array(
		'sanitize_callback' => 'incmag_sanitize_text'
	));
	$wp_customize->add_control(new incmag_support_info($wp_customize, 'incmag_support_text', array(
		'settings' => 'incmag_support_text',
		'section' => 'incmag_theme_support',
		'description' => '<div class="support-text"><h3>Setting up the theme</h3><ol><li>Configure all sections in the customizer (Appearance -> Customize)</li><li>Set menu locations to respective settings</li><li>Drag menu widgets to footer area for footer menus</li><li>Regenerate thumbnails (use free plugin found on wordpress.org)</li></ol></div>'
	)));
	
	if (!class_exists('incredible_planet_license')) {
		
		$wp_customize->add_setting('incmag_links', array(
			'sanitize_callback' => 'incmag_sanitize_text'
		));
		
		$wp_customize->add_control(new incmag_support_info($wp_customize, 'incmag_links', array(
			'settings' => 'incmag_links',
			'section' => 'incmag_theme_support',
			'description' => '<div class="links"><a href=" '. $author_link .' " target="_blank">' . __('Demo', 'incmag') . '</a><br /><a href=" '. $upgrade_link .' " target="_blank">' . __('Documentation', 'incmag') . '</a><br /><a href=" '. $upgrade_link .' " target="_blank">' . __('Upgrade to remove footer link', 'incmag') . '</a>',
		)));
		
		$wp_customize->add_setting('incmag_support_text_after', array(
			'sanitize_callback' => 'incmag_sanitize_text'
		));
		$wp_customize->add_control(new incmag_support_info($wp_customize, 'incmag_support_text_after', array(
			'settings' => 'incmag_support_text_after',
			'section' => 'incmag_theme_support',
			'description' => '<div class="support-text"><p>Thanks for trying out this theme! We hope you like it. Please use the links above to find out more details about how to use this theme.</p></div>'
		)));
	}	

}

add_action('customize_register', 'incmag_customize_register');

function incmag_sanitize_text($input)
{
	return wp_kses_post(force_balance_tags($input));
}

function incmag_custom_css()
{
	$bg_img = get_header_image();
	
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');
	
	if ('' == get_theme_mod('background_color')) {
		$background_color = '#ffffff';
	}
	else {
		$background_color = get_theme_mod('background_color');
	}

	if ('' == get_theme_mod('accent_color')) {
		$accent_color = '#ff2d55';
	}
	else {
		$accent_color = get_theme_mod('accent_color');
	}

	// Start adding all the css rules together in one joined variable called $custom_css then join to the actual custom.css file.

	if ($background_color != '') {
		$custom_css = "
				body.custom-background {
					background-color:#{$background_color};
                }
				[canvas=container] {
					background:transparent;
				}
			";
	}

	if ($background_color != 'ffffff') {
		$custom_css.= "
					.sidebar-rules {
					background: white;
					padding: 1% 5%;
					margin-top: 15px;
				}
		";
	}

	if ($accent_color != '') {
		$custom_css.= "
			.entry-header i.fa.fa-bolt, 
			.mini i.fa.fa-bolt, 
			.list-articles i.fa.fa-newspaper-o, 
			.title-positioning .entry-meta, 
			.sidebar-rules h2.widget-title, 
			.sidebar-news input[type=submit], 
			.mini-category, 
			.tnp-widget-minimal input.tnp-submit, 
			.pagination a:hover, 
			.pagination .current,
			a.read-more-link,
			p.author_links a,
			span.load-more
			{
				background:{$accent_color};
			}
		";
	}

	if ($accent_color != '') {
		$custom_css.= "
			.title-positioning .entry-meta
			
			{
				-webkit-box-shadow: 10px 0 0 {$accent_color}, -10px 0 0 {$accent_color};
				-moz-box-shadow: 10px 0 0 {$accent_color}, -10px 0 0 {$accent_color};
				-ms-box-shadow: 10px 0 0 {$accent_color}, -10px 0 0 {$accent_color};
				-o-box-shadow: 10px 0 0 {$accent_color}, -10px 0 0 {$accent_color};
				box-shadow: 10px 0 0 {$accent_color}, -10px 0 0 {$accent_color};
			}
		";
	}

	if ($accent_color != '') {
		$custom_css.= "
			.list-articles .entry-footer a, 
			body a, 
			.author-short .author_links a, 
			.pop-category a,
			.type-post h3, 
			.list-articles .entry-footer a,
			p.pop-category i,
			.entry-footer i
			{
				color:{$accent_color};
			}
		";
	}

	// End of Color Options and my energy for the day

	wp_add_inline_style('custom-style', $custom_css);
}

add_action('wp_enqueue_scripts', 'incmag_custom_css');

if (class_exists('WP_Customize_Control')):
	class incmag_support_info extends WP_Customize_Control

	{
		public

		function render_content()
		{
?>
	    <span class="customize-control-title">
			<?php
			echo esc_html($this->label); ?>
		</span>

		<?php
			if ($this->description) { ?>
			<span class="description customize-control-description">
			<?php
				echo wp_kses_post($this->description); ?>
			</span>
		<?php
			}
		}
	}

endif;
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function incmag_customize_preview_js()
{
	wp_enqueue_script('incmag_customizer', get_template_directory_uri() . '/js/customizer.js', array(
		'customize-preview'
	) , '20151215', true);
}

add_action('customize_preview_init', 'incmag_customize_preview_js');