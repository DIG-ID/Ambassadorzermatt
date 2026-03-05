<?php
/**
 * Main header of the theme.
 *
 * @package ambassador-zermatt
 * @subpackage Template
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>

	<body <?php body_class( 'relative' ); ?>>
		<?php do_action( 'wp_body_open' ); ?>
		<a class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[999] focus:bg-white focus:p-4" href="#main-content">
			<?php esc_html_e( 'Zum Inhalt springen', 'ambassador' ); ?>
		</a>
		<?php get_template_part( 'template-parts/header', 'main' ); ?>