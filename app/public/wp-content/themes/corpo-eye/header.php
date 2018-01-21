<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corpo_Eye
 */

?><?php
	/**
	 * Hook - corpo_eye_action_doctype.
	 *
	 * @hooked corpo_eye_doctype -  10
	 */
	do_action( 'corpo_eye_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - corpo_eye_action_head.
	 *
	 * @hooked corpo_eye_head -  10
	 */
	do_action( 'corpo_eye_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * Hook - corpo_eye_action_before.
	 *
	 * @hooked corpo_eye_page_start - 10
	 * @hooked corpo_eye_skip_to_content - 15
	 */
	do_action( 'corpo_eye_action_before' );
	?>

    <?php
	  /**
	   * Hook - corpo_eye_action_before_header.
	   *
	   * @hooked corpo_eye_header_start - 10
	   */
	  do_action( 'corpo_eye_action_before_header' );
	?>
		<?php
		/**
		 * Hook - corpo_eye_action_header.
		 *
		 * @hooked corpo_eye_site_branding - 10
		 */
		do_action( 'corpo_eye_action_header' );
		?>
    <?php
	  /**
	   * Hook - corpo_eye_action_after_header.
	   *
	   * @hooked corpo_eye_header_end - 10
	   */
	  do_action( 'corpo_eye_action_after_header' );
	?>

	<?php
	/**
	 * Hook - corpo_eye_action_before_content.
	 *
	 * @hooked corpo_eye_content_start - 10
	 */
	do_action( 'corpo_eye_action_before_content' );
	?>
    <?php
	  /**
	   * Hook - corpo_eye_action_content.
	   */
	  do_action( 'corpo_eye_action_content' );
	?>
