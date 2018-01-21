<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'prolific-design-panel', array(
    'priority'       => 190,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Layout/Design Option', 'prolific' )
) );

$wp_customize->get_section( 'background_image' )->panel = 'prolific-design-panel';
$wp_customize->get_section( 'background_image' )->priority = 50;

/*
* file for front page hiding content
*/
require prolific_file_directory('acmethemes/customizer/design-options/front-page-content.php');

/*
* file for sidebar layout
*/
require prolific_file_directory('acmethemes/customizer/design-options/sidebar-layout.php');

/*
* file for blog layout
*/
require prolific_file_directory('acmethemes/customizer/design-options/blog-layout.php');

/*
* file for color options
*/
require prolific_file_directory('acmethemes/customizer/design-options/colors-options.php');