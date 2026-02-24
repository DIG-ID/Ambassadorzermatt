<?php
/**
 * The Theme Otimizations.
 *
 * @package ambassador-zermatt
 * @subpackage Otimizations
 * @since 1.0.0
 */

// Remove reCAPTCHA scripts do CF7 globalmente.
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

// Carrega só nas páginas que têm formulário.
add_action(
	'wp_enqueue_scripts',
	function () {
		if ( is_page( 'arrival-contacts' ) ) {
			wpcf7_enqueue_scripts();
			wpcf7_enqueue_styles();
		}
	}
);

/**
 * Disable self-pingbacks.
 *
 * @param array $links Array of URLs to ping.
 */
function wpsites_disable_self_pingbacks( &$links ) {
	foreach ( $links as $l => $link ) :
		if ( 0 === strpos( $link, get_option( 'home' ) ) ) :
			unset( $links[ $l ] );
		endif;
	endforeach;
}

add_action( 'pre_ping', 'wpsites_disable_self_pingbacks' );

