<?php
/**
 * Setup theme
 */
function az_theme_setup() {

	register_nav_menus(
		array(
			'main-menu'      => __( 'Main Menu', 'ambassador' ),
			'main-mega-menu' => __( 'Main Mega Menu', 'ambassador' ),
			'footer-copyright-menu' => __( 'Footer Copyright Menu', 'ambassador' ),
			'footer-hotel-menu' => __( 'Footer Hotel Menu', 'ambassador' ),
			'footer-gastronomie-menu' => __( 'Footer Gastronomie Menu', 'ambassador' ),
			'footer-uber-uns-menu' => __( 'Footer Uber Uns Menu', 'ambassador' ),
			'footer-zermatt-erleben-menu' => __( 'Footer Zermatt Erleben Menu', 'ambassador' ),
		)
	);

	add_theme_support( 'menus' );

	add_theme_support( 'custom-logo' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	add_post_type_support( 'page', 'excerpt' );

	//add_image_size( 'zimmer-image', 1400, 770, array( 'center', 'center' ) );

}

add_action( 'after_setup_theme', 'az_theme_setup' );

/**
 * Register our sidebars and widgetized areas.
 */
function az_theme_footer_widgets_init() {

	register_sidebar(
		array(
			'name'          => 'Footer',
			'id'            => 'footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		),
	);

	register_sidebar(
		array(
			'name'          => 'Header Language Switcher',
			'id'            => 'header_ls',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

}

add_action( 'widgets_init', 'az_theme_footer_widgets_init' );

if ( ! function_exists( 'az_get_font_face_styles' ) ) :
	/**
	 * Get font face styles.
	 * This is used by the theme or editor to inject @import for Google Fonts.
	 */
	function az_get_font_face_styles() {
		return "
			@import url('https://use.typekit.net/yjm6usa.css');
		";
	}
endif;

if ( ! function_exists( 'az_preload_webfonts' ) ) :
	/**
	 * Preloads Google Fonts to improve performance.
	 */
	function az_preload_webfonts() {
		?>
		<link rel="preconnect" href="use.typekit.net" crossorigin>
		<?php
	}
endif;

add_action( 'wp_head', 'az_preload_webfonts' );


/**
 * Enqueue styles and scripts
 */
function az_theme_enqueue_styles() {

	//Get the theme data
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	// Register Theme main style.
	wp_register_style( 'theme-styles', get_template_directory_uri() . '/dist/css/main.css', array(), $theme_version );
	// Add styles inline.
	wp_add_inline_style( 'theme-styles', az_get_font_face_styles() );
	// Enqueue theme stylesheet.
	wp_enqueue_style( 'theme-styles' );
	//https://use.typekit.net/evg0ous.css first loaded fonts library backup
	//wp_enqueue_style( 'theme-fonts', 'https://use.typekit.net/buy6qwo.css', array(), $theme_version );

	wp_enqueue_script( 'jquery', false, array(), $theme_version, true );
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/dist/js/main.js', array( 'jquery' ), $theme_version, true );

	if ( is_page_template( 'page-templates/page-arrival-contacts.php' ) || is_admin() ) :
		wp_enqueue_script( 'google-map-settings', get_stylesheet_directory_uri() . '/assets/js/google-maps.js', array( 'jquery' ), $theme_version, true );
		wp_enqueue_script( 'google-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBAZN5TfX1aWmjodZ4e_6sOcaJV4D59jfo&callback=initMap&loading=async', array(), $theme_version, true );
	endif;
	
}

add_action( 'wp_enqueue_scripts', 'az_theme_enqueue_styles' );


/**
 * Remove <p> Tag From Contact Form 7.
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Lowers the metabox priority to 'core' for Yoast SEO's metabox.
 *
 * @param string $priority The current priority.
 *
 * @return string $priority The potentially altered priority.
 */
function az_theme_lower_yoast_metabox_priority( $priority ) {
	return 'core';
}

add_filter( 'wpseo_metabox_prio', 'az_theme_lower_yoast_metabox_priority' );



// Add dynamic favicons for light/dark mode.
function ambz_dynamic_favicons() {
	?>
	<!-- Dynamic favicons based on prefers-color-scheme -->
	<link rel="icon" href="<?php echo esc_url( get_theme_file_uri( 'assets/img/favicon/favicon-dark.png' ) ); ?>" media="(prefers-color-scheme: light)">
	<link rel="icon" href="<?php echo esc_url( get_theme_file_uri( 'assets/img/favicon/favicon-light.png' ) ); ?>" media="(prefers-color-scheme: dark)">
	<?php
}
add_action( 'wp_head', 'ambz_dynamic_favicons' );


// Theme custom template tags.
require get_template_directory() . '/inc/theme-template-tags.php';

// The theme admin settings.
require get_template_directory() . '/inc/theme-admin-settings.php';

// The theme custom menu walker settings.
require get_template_directory() . '/inc/theme-custom-menu-walker.php';



function my_console_log(...$data) {
	$json = json_encode($data);
	add_action('shutdown', function() use ($json) {
		 echo "<script>console.log({$json})</script>";
	});
}
// Google Map Init.
function ambassador_google_map_init() {
  if ( is_admin() ) :
    acf_update_setting( 'google_api_key', 'AIzaSyBAZN5TfX1aWmjodZ4e_6sOcaJV4D59jfo' );
  endif;
}
add_action( 'acf/init', 'ambassador_google_map_init' );