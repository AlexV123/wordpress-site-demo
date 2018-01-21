<?php
/**
 * Theme Options.
 *
 * @package Corpo_Eye
 */

$default = corpo_eye_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'corpo-eye' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
	'title'      => __( 'Header Options', 'corpo-eye' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show_title.
$wp_customize->add_setting( 'theme_options[show_title]',
	array(
	'default'           => $default['show_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_title]',
	array(
	'label'    => __( 'Show Site Title', 'corpo-eye' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting show_tagline.
$wp_customize->add_setting( 'theme_options[show_tagline]',
	array(
	'default'           => $default['show_tagline'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tagline]',
	array(
	'label'    => __( 'Show Tagline', 'corpo-eye' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

$wp_customize->add_setting( 'theme_options[search_in_header]',
	array(
		'default'           => $default['search_in_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corpo_eye_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[search_in_header]',
	array(
		'label'    => __( 'Enable Search Form', 'corpo-eye' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
	'title'      => __( 'Layout Options', 'corpo-eye' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'theme_options[global_layout]',
	array(
	'default'           => $default['global_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global_layout]',
	array(
	'label'    => __( 'Global Layout', 'corpo-eye' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => corpo_eye_get_global_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_layout.
$wp_customize->add_setting( 'theme_options[archive_layout]',
	array(
	'default'           => $default['archive_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_layout]',
	array(
	'label'    => __( 'Archive Layout', 'corpo-eye' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => corpo_eye_get_archive_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_image.
$wp_customize->add_setting( 'theme_options[archive_image]',
	array(
	'default'           => $default['archive_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_image]',
	array(
	'label'    => __( 'Image in Archive', 'corpo-eye' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => corpo_eye_get_image_sizes_options(),
	'priority' => 100,
	)
);
// Setting archive_image_alignment.
$wp_customize->add_setting( 'theme_options[archive_image_alignment]',
	array(
	'default'           => $default['archive_image_alignment'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_image_alignment]',
	array(
	'label'           => __( 'Image Alignment in Archive', 'corpo-eye' ),
	'section'         => 'section_layout',
	'type'            => 'select',
	'choices'         => corpo_eye_get_image_alignment_options(),
	'priority'        => 100,
	'active_callback' => 'corpo_eye_is_image_in_archive_active',
	)
);
// Setting single_image.
$wp_customize->add_setting( 'theme_options[single_image]',
	array(
	'default'           => $default['single_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[single_image]',
	array(
	'label'    => __( 'Image in Single Post/Page', 'corpo-eye' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => corpo_eye_get_image_sizes_options( true, array( 'disable', 'large' ), false ),
	'priority' => 100,
	)
);

// Home Page Section.
$wp_customize->add_section( 'section_home_page',
	array(
	'title'      => __( 'Home Page Options', 'corpo-eye' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting home_overlap_status.
$wp_customize->add_setting( 'theme_options[home_overlap_status]',
	array(
	'default'           => $default['home_overlap_status'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[home_overlap_status]',
	array(
	'label'       => __( 'Enable Header Overlap', 'corpo-eye' ),
	'description' => __( 'Check this to enable overlapped header in Home page.', 'corpo-eye' ),
	'section'     => 'section_home_page',
	'type'        => 'checkbox',
	'priority'    => 100,
	)
);

// Setting home_content_status.
$wp_customize->add_setting( 'theme_options[home_content_status]',
	array(
	'default'           => $default['home_content_status'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[home_content_status]',
	array(
	'label'       => __( 'Show Home Content', 'corpo-eye' ),
	'description' => __( 'Check this to show page content in Home page.', 'corpo-eye' ),
	'section'     => 'section_home_page',
	'type'        => 'checkbox',
	'priority'    => 100,
	)
);

// Footer Contact Section.
$wp_customize->add_section( 'section_footer_contact',
	array(
	'title'      => __( 'Footer Contact Options', 'corpo-eye' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show_footer_contact.
$wp_customize->add_setting( 'theme_options[show_footer_contact]',
	array(
	'default'           => $default['show_footer_contact'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_footer_contact]',
	array(
		'label'    => __( 'Show Footer Contact', 'corpo-eye' ),
		'section'  => 'section_footer_contact',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting enable_footer_contact_background_image.
$wp_customize->add_setting( 'theme_options[enable_footer_contact_background_image]',
	array(
	'default'           => $default['enable_footer_contact_background_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_footer_contact_background_image]',
	array(
		'label'           => __( 'Enable Background Image', 'corpo-eye' ),
		'section'         => 'section_footer_contact',
		'type'            => 'checkbox',
		'priority'        => 100,
		'active_callback' => 'corpo_eye_is_footer_contact_active',
	)
);

// Setting footer_contact_background_image.
$wp_customize->add_setting( 'theme_options[footer_contact_background_image]',
	array(
	'default'           => $default['footer_contact_background_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_image',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'theme_options[footer_contact_background_image]',
		array(
		'label'           => __( 'Background Image', 'corpo-eye' ),
		'description'     => sprintf( __( 'Recommended Size: %1$dpx x %2$dpx', 'corpo-eye' ), 1940, 200 ),
		'section'         => 'section_footer_contact',
		'priority'        => 100,
		'settings'        => 'theme_options[footer_contact_background_image]',
		'active_callback' => 'corpo_eye_is_footer_contact_and_background_image_active',
		)
	)
);

// Setting enable_footer_contact_background_overlay.
$wp_customize->add_setting( 'theme_options[enable_footer_contact_background_overlay]',
	array(
	'default'           => $default['enable_footer_contact_background_overlay'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_footer_contact_background_overlay]',
	array(
		'label'           => __( 'Enable Background Overlay', 'corpo-eye' ),
		'section'         => 'section_footer_contact',
		'type'            => 'checkbox',
		'priority'        => 100,
		'active_callback' => 'corpo_eye_is_footer_contact_and_background_image_active',
	)
);

// Setting footer_contact_email.
$wp_customize->add_setting( 'theme_options[footer_contact_email]',
	array(
		'default'           => $default['footer_contact_email'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_email',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[footer_contact_email]',
	array(
		'label'           => __( 'Contact Email', 'corpo-eye' ),
		'section'         => 'section_footer_contact',
		'type'            => 'text',
		'priority'        => 100,
		'active_callback' => 'corpo_eye_is_footer_contact_active',
	)
);

// Setting footer_contact_address.
$wp_customize->add_setting( 'theme_options[footer_contact_address]',
	array(
		'default'           => $default['footer_contact_address'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[footer_contact_address]',
	array(
		'label'           => __( 'Contact Address', 'corpo-eye' ),
		'section'         => 'section_footer_contact',
		'type'            => 'text',
		'priority'        => 100,
		'active_callback' => 'corpo_eye_is_footer_contact_active',
	)
);

// Setting footer_contact_map_url.
$wp_customize->add_setting( 'theme_options[footer_contact_map_url]',
	array(
		'default'           => $default['footer_contact_map_url'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[footer_contact_map_url]',
	array(
		'label'           => __( 'Address Map URL', 'corpo-eye' ),
		'section'         => 'section_footer_contact',
		'type'            => 'url',
		'priority'        => 100,
		'active_callback' => 'corpo_eye_is_footer_contact_active',
	)
);

// Setting footer_contact_phone.
$wp_customize->add_setting( 'theme_options[footer_contact_phone]',
	array(
		'default'           => $default['footer_contact_phone'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[footer_contact_phone]',
	array(
		'label'           => __( 'Contact Phone', 'corpo-eye' ),
		'section'         => 'section_footer_contact',
		'type'            => 'text',
		'priority'        => 100,
		'active_callback' => 'corpo_eye_is_footer_contact_active',
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
	'title'      => __( 'Footer Options', 'corpo-eye' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'corpo-eye' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting show_social_in_footer.
$wp_customize->add_setting( 'theme_options[show_social_in_footer]',
	array(
		'default'           => $default['show_social_in_footer'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corpo_eye_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_in_footer]',
	array(
		'label'    => __( 'Show Social Icons', 'corpo-eye' ),
		'section'  => 'section_footer',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Blog Section.
$wp_customize->add_section( 'section_blog',
	array(
	'title'      => __( 'Blog Options', 'corpo-eye' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting blog_title.
$wp_customize->add_setting( 'theme_options[blog_title]',
	array(
	'default'           => $default['blog_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[blog_title]',
	array(
	'label'    => __( 'Blog Title', 'corpo-eye' ),
	'section'  => 'section_blog',
	'type'     => 'text',
	'priority' => 100,
	)
);


// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
	'default'           => $default['excerpt_length'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corpo_eye_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
	'label'       => __( 'Excerpt Length', 'corpo-eye' ),
	'description' => __( 'in words', 'corpo-eye' ),
	'section'     => 'section_blog',
	'type'        => 'number',
	'priority'    => 100,
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);

// Setting read_more_text.
$wp_customize->add_setting( 'theme_options[read_more_text]',
	array(
	'default'           => $default['read_more_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[read_more_text]',
	array(
	'label'    => __( 'Read More Text', 'corpo-eye' ),
	'section'  => 'section_blog',
	'type'     => 'text',
	'priority' => 100,
	)
);
