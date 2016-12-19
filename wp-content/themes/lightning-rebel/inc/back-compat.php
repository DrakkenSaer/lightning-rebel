<?php
/**
 * Lightning Rebel back compat functionality
 *
 * Prevents Lightning Rebel from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package WordPress
 * @subpackage Pharmacy_lightningrebel
 * @since Lightning Rebel 1.0
 */

/**
 * Prevent switching to Lightning Rebel on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Lightning Rebel 1.0
 */
function lightningrebel_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'lightningrebel_upgrade_notice' );
}
add_action( 'after_switch_theme', 'lightningrebel_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Lightning Rebel on WordPress versions prior to 4.4.
 *
 * @since Lightning Rebel 1.0
 *
 * @global string $wp_version WordPress version.
 */
function lightningrebel_upgrade_notice() {
	$message = sprintf( __( 'Lightning Rebel requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'lightningrebel' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since Lightning Rebel 1.0
 *
 * @global string $wp_version WordPress version.
 */
function lightningrebel_customize() {
	wp_die( sprintf( __( 'Lightning Rebel requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'lightningrebel' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'lightningrebel_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since Lightning Rebel 1.0
 *
 * @global string $wp_version WordPress version.
 */
function lightningrebel_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Lightning Rebel requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'lightningrebel' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'lightningrebel_preview' );
