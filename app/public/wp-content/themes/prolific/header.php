<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage prolific
 */

/**
 * prolific_action_before_head hook
 * @since Prolific 1.0.0
 *
 * @hooked prolific_set_global -  0
 * @hooked prolific_doctype -  10
 */
do_action( 'prolific_action_before_head' );?>
	<head>

		<?php
		/**
		 * prolific_action_before_wp_head hook
		 * @since Prolific 1.0.0
		 *
		 * @hooked prolific_before_wp_head -  10
		 */
		do_action( 'prolific_action_before_wp_head' );

		wp_head();
		?>

	</head>
<body <?php body_class();?>>

<?php
/**
 * prolific_action_before hook
 * @since Prolific 1.0.0
 *
 * @hooked prolific_site_start - 20
 */
do_action( 'prolific_action_before' );

/**
 * prolific_action_before_header hook
 * @since Prolific 1.0.0
 *
 * @hooked prolific_skip_to_content - 10
 */
do_action( 'prolific_action_before_header' );


/**
 * prolific_action_header hook
 * @since Prolific 1.0.0
 *
 * @hooked prolific_header - 10
 */
do_action( 'prolific_action_header' );


/**
 * prolific_action_after_header hook
 * @since Prolific 1.0.0
 *
 * @hooked null
 */
do_action( 'prolific_action_after_header' );


/**
 * prolific_action_before_content hook
 * @since Prolific 1.0.0
 *
 * @hooked null
 */
do_action( 'prolific_action_before_content' );