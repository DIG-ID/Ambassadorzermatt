<?php

/**
 * This function open the main content.
 */
function theme_before_main_content() {
	?>
	<main id="main-content" class="main-content overflow-hidden mt-auto">
	<?php
}

add_action( 'before_main_content', 'theme_before_main_content' );

/**
 * This function closes the main content.
 */
function theme_after_main_content() {
	?>
	</main><!-- #main-content-->
	<?php
}

add_action( 'after_main_content', 'theme_after_main_content' );

/**
 * This function open the post content.
 */
function theme_before_post_content() {
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
}

add_action( 'before_post_content', 'theme_before_post_content' );

/**
 * This function closes the post content.
 */
function theme_after_post_content() {
	?>
	</article><!-- #article -->
	<?php
}

add_action( 'after_post_content', 'theme_after_post_content' );

/**
 * This function gest the rooms features.
 */
function theme_room_features() {
	if ( have_rows( 'features' ) ) :
		echo '<ul class="features">';
		while ( have_rows( 'features' ) ) :
			the_row();
			?>
			<li id="feature-item">
				<?php
				$fields = [
					'bed'      => __( 'Bett:', 'ambassadorzermatt' ),
					'size'     => __( 'Fläche:', 'ambassadorzermatt' ),
					'capacity' => __( 'Belegung:', 'ambassadorzermatt' ),
					'view'     => __( 'Aussicht:', 'ambassadorzermatt' ),
				];
				foreach ( $fields as $field_key => $label ) :
					$field_value = get_sub_field( $field_key );
					if ( $field_value ) :
						?>
						<p class="font-poppins font-normal text-sm text-blue-shade-5 tracking-[0.14px]">
							<span class="font-bold"><?php echo $label; ?></span> <?php echo esc_html( $field_value ); ?>
						</p>
						<?php
					endif;
				endforeach;
				?>
			</li>
			<?php
		endwhile;
		echo '</ul>';
	endif;
}

add_action( 'room_features', 'theme_room_features' );

/**
 * This theme logo.
 */
function theme_logo() {
	?>
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/ambassadorzermatt-header-logo.png" alt="Ambassador Zermatt Logo" title="Ambassador Zermatt Logo" />
	<?php
}

add_action( 'theme_logo', 'theme_logo' );

function theme_logo_sticky() {
	?>
	<svg xmlns="http://www.w3.org/2000/svg" width="150" height="107" viewBox="0 0 150 107" fill="none">
		<rect width="150" height="107" fill="#766A66"/>
		<path d="M40.5418 60.3193L42.6624 57.0093L45.5796 54.2225L57.4096 45.5586L64.955 31.7017L73.7423 31.2862L70.3305 43.9514L59.0236 60.756L53.0592 60.8621L49.3769 66.2417L40.5418 60.3208V60.3193ZM71.396 43.7755L74.8751 30.848L75.8465 25.5245L81.1473 29.9125L85.931 39.433L85.3855 46.4123L71.3945 43.7755H71.396ZM68.5521 22.3025L74.9603 24.9165L73.9829 30.2809L65.3839 30.6858L68.5521 22.3025ZM64.2152 31.0103L56.6593 44.8854L44.9594 53.4583L41.9495 56.327L39.7393 59.7507L36.4306 57.2792L30 67.5912H31.1597L36.6966 58.7121L39.9948 61.1775L40.0083 61.1547L49.6101 67.5897H49.6474L53.5778 61.8477L59.5481 61.7415L70.8341 44.9703L90.6504 67.5897H91.961L72.1014 44.9173L86.2777 47.5904L86.9323 39.2283L81.9273 29.2726L75.8256 24.2235L67.9947 21L64.2152 31.0087V31.0103Z" fill="#F3F3F3"/>
		<path d="M119.988 68.6812L101.769 52.8759L97.4204 49.8207L94.4554 55.6627L106.269 67.9565L105.567 68.6494L93.5079 56.1009C93.3615 55.9478 93.3256 55.7158 93.4227 55.5263L96.8032 48.8624C96.8689 48.7365 96.9855 48.641 97.12 48.6077C97.2575 48.5713 97.404 48.6001 97.519 48.6804L102.367 52.0874L120.625 67.9231L119.99 68.6797L119.988 68.6812Z" fill="#F3F3F3"/>
		<path d="M58.9323 61.5914L64.5619 67.5896H65.9129L59.6422 60.906L58.9323 61.5914ZM85.9025 42.05L93.3568 49.5872H97.2378V48.5926H93.7618L86.5944 41.3449L85.904 42.0485L85.9025 42.05ZM67.8302 21.934L73.9903 31.0405L74.3938 30.7585L74.1308 31.177L85.5692 38.5611L86.0953 37.7226L74.7405 30.3916L68.6387 21.3684L67.8302 21.9324V21.934Z" fill="#F3F3F3"/>
		<path d="M58.612 80.408L56.6932 80.69L58.083 82.0607L57.7557 84L59.4698 83.0857L61.1855 84L60.8582 82.0607L62.245 80.69L60.3292 80.408L59.4698 78.6431L58.612 80.408Z" fill="#F3F3F3"/>
		<path d="M69.4078 80.408L67.492 80.69L68.8758 82.0607L68.5515 84L70.2657 83.0857L71.9813 84L71.654 82.0607L73.0408 80.69L71.122 80.408L70.2657 78.6431L69.4078 80.408Z" fill="#F3F3F3"/>
		<path d="M80.2082 80.408L78.2893 80.69L79.6776 82.0607L79.3489 84L81.0645 83.0857L82.7786 84L82.4513 82.0607L83.8397 80.69L81.9208 80.408L81.0645 78.6431L80.2082 80.408Z" fill="#F3F3F3"/>
		<path d="M91.004 80.408L89.0852 80.69L90.4735 82.0607L90.1447 84L91.8604 83.0857L93.5745 84L93.2472 82.0607L94.634 80.69L92.7182 80.408L91.8604 78.6431L91.004 80.408Z" fill="#F3F3F3"/>
		<path d="M51.4462 81.4739H30.0001V82.0713H51.4462V81.4739Z" fill="#F3F3F3"/>
		<path d="M123 81.4739H99.884V82.0713H123V81.4739Z" fill="#F3F3F3"/>
	</svg>
	<?php
}

add_action( 'theme_logo_sticky', 'theme_logo_sticky' );

/**
 * This theme logo for mobile.
 */
function theme_logo_mobile() {
	?>
	<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="418.7" height="499.1" fill="#0cc" viewBox="0 0 418.7 499.1"><path d="m178.1.1-34.4 206.6H95.2l2.2-13.7c-11.5 11.5-25.8 17.9-42.6 17.9-36.1 0-61.3-29.1-53.5-76.7 7-42.5 38.4-68.9 71.4-68.9 21.6 0 35.8 9.8 43.4 21.6L129.5.1h48.6zm-73.6 153.7 5.6-31.9c-4.8-10.4-13.4-15.1-24.6-15.1-16.8 0-31.4 11.2-34.7 31.6-3.1 17.1 3.4 30.8 22.4 30.8 11.4 0 22.6-5.1 31.3-15.4zM217.3 206.9h-48.4L193 69.7h48.4l-24.1 137.2zM197.1 23.5C199.4 10.4 211.7 0 226 0c17.9 0 29.4 14 26.3 31.1-2.5 13.4-14.8 23.8-29.1 23.8-17.7 0-29.2-14-26.1-31.4zM418.7 69.7l-22.4 127.4c-8.4 47.3-38.9 70-90.1 70-26.3 0-46.8-6.2-62.2-13.1l16.5-38.6c13.2 8.4 29.7 10.9 41.7 10.9 26.9 0 42.5-12.6 46.2-33l.6-3.6c-11.8 11.5-26 18.2-42.8 18.2-36.4 0-61.9-29.1-53.5-75 7-40.9 38.4-67.2 71.4-67.2 20.7 0 35.3 9.2 43.1 21.3l3.1-17.1h48.4zm-63.2 82.6 5.6-30.5c-4.5-10.1-13.7-14.8-24.6-14.8-17.1 0-30.5 10.9-34.4 28.8-3.1 15.1 2.8 30.2 23.2 30.2 10.6 0 21.5-4.2 30.2-13.7zM165.5 494.9h-48.4l24.1-137.2h48.4l-24.1 137.2zm-20.2-183.4c2.2-13.2 14.6-23.5 28.8-23.5 17.9 0 29.4 14 26.3 31.1-2.5 13.4-14.8 23.8-29.1 23.8-17.6 0-29.1-14-26-31.4zM377.3 298.9l-34.4 196h-48.4l2.2-13.7c-11.5 11.5-25.8 17.9-42.6 17.9-36.1 0-61.3-29.1-53.5-76.7 7-42.5 38.4-68.9 71.4-68.9 21.6 0 35.8 9.8 43.4 21.6l13.4-76.1h48.5zM303.7 442l5.6-31.9c-4.8-10.4-13.4-15.1-24.6-15.1-16.8 0-31.4 11.2-34.7 31.6-3.1 17.1 3.4 30.8 22.4 30.8 11.4 0 22.6-5.1 31.3-15.4zM36.3 494.9l10-54.9h55.3l-9.7 54.9z"></path></svg>
	<?php
}

add_action( 'theme_logo_mobile', 'theme_logo_mobile' );

/**
 * Implement and customize Yoast Breadcrumbs.
 */
function theme_breadcrumbs() {
	if ( function_exists( 'yoast_breadcrumb' ) ) :
		yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
	endif;
}

add_action( 'breadcrumbs', 'theme_breadcrumbs' );


/**
 * Socials for the website.
 */
function theme_socials() {

	$socials = [
		'facebook' => [
			'url' => get_field( 'socials_facebook', 'options' ),
			'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="26" fill="none" viewBox="0 0 15 26"><path stroke="#F3F3F3" d="m13.012 14.563.694-4.525h-4.34V7.102c0-1.238.606-2.444 2.55-2.444h1.974V.806S12.099.5 10.386.5C6.811.5 4.474 2.667 4.474 6.59v3.448H.5v4.524h3.974V25.5h4.891V14.562h3.647Z"/></svg>',
		],
		'twitter' => [
			'url' => get_field( 'socials_twitter', 'options' ),
			'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 14 13" fill="none"><path d="M12.5508 3.59668C12.5508 3.7334 12.5508 3.84277 12.5508 3.97949C12.5508 7.78027 9.67969 12.1279 4.40234 12.1279C2.76172 12.1279 1.25781 11.6631 0 10.8428C0.21875 10.8701 0.4375 10.8975 0.683594 10.8975C2.02344 10.8975 3.25391 10.4326 4.23828 9.66699C2.98047 9.63965 1.91406 8.81934 1.55859 7.6709C1.75 7.69824 1.91406 7.72559 2.10547 7.72559C2.35156 7.72559 2.625 7.6709 2.84375 7.61621C1.53125 7.34277 0.546875 6.19434 0.546875 4.7998V4.77246C0.929688 4.99121 1.39453 5.10059 1.85938 5.12793C1.06641 4.6084 0.574219 3.7334 0.574219 2.74902C0.574219 2.20215 0.710938 1.70996 0.957031 1.2998C2.37891 3.02246 4.51172 4.1709 6.89062 4.30762C6.83594 4.08887 6.80859 3.87012 6.80859 3.65137C6.80859 2.06543 8.09375 0.780273 9.67969 0.780273C10.5 0.780273 11.2383 1.1084 11.7852 1.68262C12.4141 1.5459 13.043 1.2998 13.5898 0.97168C13.3711 1.65527 12.9336 2.20215 12.332 2.55762C12.9062 2.50293 13.4805 2.33887 13.9727 2.12012C13.5898 2.69434 13.0977 3.18652 12.5508 3.59668Z" fill="#0E324A"/></svg>',
		],
		'instagram' => [
			'url' => get_field( 'socials_instagram', 'options' ),
			'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="none" viewBox="0 0 21 21"><rect width="20" height="20" x=".5" y=".5" stroke="#F3F3F3" rx="6"/><circle cx="10.5" cy="10.5" r="5" stroke="#F3F3F3"/><circle cx="16.5" cy="4.5" r="1" fill="#D9D9D9"/></svg>',
		],
		'linkedin' => [
			'url' => get_field( 'socials_linkedin', 'options' ),
			'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 13 13" fill="none"><path d="M2.73438 12.6904H0.191406V4.51465H2.73438V12.6904ZM1.44922 3.4209C0.65625 3.4209 0 2.7373 0 1.91699C0 1.12402 0.65625 0.467773 1.44922 0.467773C2.26953 0.467773 2.92578 1.12402 2.92578 1.91699C2.92578 2.7373 2.26953 3.4209 1.44922 3.4209ZM9.70703 12.6904V8.72559C9.70703 7.76855 9.67969 6.56543 8.36719 6.56543C7.05469 6.56543 6.86328 7.57715 6.86328 8.64355V12.6904H4.32031V4.51465H6.75391V5.63574H6.78125C7.13672 5.00684 7.95703 4.32324 9.1875 4.32324C11.7578 4.32324 12.25 6.01855 12.25 8.20605V12.6904H9.70703Z" fill="#0E324A"/></svg>',
		],
	];

	$html = '<div class="social-links">';

	foreach ( $socials as $platform => $social_data ) :
		if ( $social_data['url'] ) :
			$html .= sprintf(
				'<a href="%s" target="_blank" rel="noopener noreferrer" class="social-link social-link--%s">%s</a>',
				esc_url( $social_data['url'] ),
				esc_attr( $platform ),
				$social_data['svg']
				//ucfirst( $platform )
			);
		endif;
	endforeach;

	$html .= '</div>';

	echo $html;

}

add_action( 'socials', 'theme_socials' );
