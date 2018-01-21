<?php
/**
 * Core functions.
 *
 * @package Corpo_Eye
 */

if ( ! function_exists( 'corpo_eye_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function corpo_eye_get_option( $key = '' ) {

		global $corpo_eye_default_options;
		if ( empty( $key ) ) {
			return;
		}

		$default = ( isset( $corpo_eye_default_options[ $key ] ) ) ? $corpo_eye_default_options[ $key ] : '';
		$theme_options = (array)get_theme_mod( 'theme_options', $corpo_eye_default_options );
		$theme_options = array_merge( $corpo_eye_default_options, $theme_options );
		$value = '';
		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}
		return $value;

	}

endif;

if ( ! function_exists( 'corpo_eye_get_options' ) ) :

	/**
	 * Get all theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Theme options.
	 */
  function corpo_eye_get_options() {

    $value = array();
    $value = get_theme_mod( 'theme_options' );
    return $value;

  }

endif;
