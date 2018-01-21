<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corpo_Eye
 */

	/**
	 * Hook - corpo_eye_action_after_content.
	 *
	 * @hooked corpo_eye_content_end - 10
	 */
	do_action( 'corpo_eye_action_after_content' );
?>

	<?php
	/**
	 * Hook - corpo_eye_action_before_footer.
	 *
	 * @hooked corpo_eye_add_footer_contact_section - 2
	 * @hooked corpo_eye_footer_start - 10
	 */
	do_action( 'corpo_eye_action_before_footer' );
	?>
    <?php
	  /**
	   * Hook - corpo_eye_action_footer.
	   *
	   * @hooked corpo_eye_footer_copyright - 10
	   */
	  do_action( 'corpo_eye_action_footer' );
	?>
	<?php
	/**
	 * Hook - corpo_eye_action_after_footer.
	 *
	 * @hooked corpo_eye_footer_end - 10
	 */
	do_action( 'corpo_eye_action_after_footer' );
	?>

<?php
	/**
	 * Hook - corpo_eye_action_after.
	 *
	 * @hooked corpo_eye_page_end - 10
	 * @hooked corpo_eye_footer_goto_top - 20
	 */
	do_action( 'corpo_eye_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
