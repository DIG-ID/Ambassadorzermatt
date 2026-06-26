<?php
/**
 * JSON-LD Structured Data (Schema.org)
 *
 * @package ambassador-zermatt
 * @subpackage Functionality
 * @since 1.0.0
 */

// Canonical entity identifiers — never use translated URLs for @id values.
define( 'AZ_SCHEMA_HOST',      'https://www.ambassadorzermatt.com' );
define( 'AZ_SCHEMA_HOTEL_ID',  AZ_SCHEMA_HOST . '/#hotel' );
define( 'AZ_SCHEMA_CARBON_ID', AZ_SCHEMA_HOST . '/restaurant-carbon/#restaurant' );
define( 'AZ_SCHEMA_FONDUE_ID', AZ_SCHEMA_HOST . '/fondue-igloo/#restaurant' );

/**
 * Find a published page by its page template file.
 * Results are cached per request in a static array.
 *
 * @param string $template Relative template path, e.g. 'page-templates/page-hotel.php'.
 * @return int Post ID, or 0 if not found.
 */
function az_schema_get_page_id_by_template( string $template ): int {
	static $cache = [];

	if ( ! isset( $cache[ $template ] ) ) {
		$pages               = get_pages( [
			'meta_key'   => '_wp_page_template',
			'meta_value' => $template,
			'number'     => 1,
			'post_status' => 'publish',
		] );
		$cache[ $template ] = ! empty( $pages ) ? (int) $pages[0]->ID : 0;
	}

	return $cache[ $template ];
}

/**
 * Extract only the street line from a multi-line address block.
 *
 * The contacts_address ACF field stores a full formatted block, e.g.:
 *   Hotel Ambassador Zermatt
 *   Spissstrasse 10
 *   CH-3920 Zermatt
 *
 * schema.org streetAddress expects only the street line ("Spissstrasse 10").
 * Strategy: take the first line that contains a digit but is NOT a postal-code
 * line (pattern: two-letter country code followed by digits, e.g. "CH-3920").
 *
 * @param string $raw Raw value from the ACF contacts_address field.
 * @return string Street line only, or the full stripped string as fallback.
 */
function az_schema_extract_street_line( string $raw ): string {
	$lines = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', wp_strip_all_tags( $raw ) ) ) );

	foreach ( $lines as $line ) {
		// Has a digit, but is not a postal-code line like "CH-3920 Zermatt".
		if ( preg_match( '/\d/', $line ) && ! preg_match( '/^[A-Z]{2}-?\d{4}/', $line ) ) {
			return $line;
		}
	}

	// Fallback: return everything on one line if no street line was identified.
	return implode( ', ', $lines );
}

add_action( 'wp_head', 'az_output_schema', 5 );

/**
 * Dispatch and output JSON-LD blocks for the current page.
 * is_page_template() is WPML-safe: it matches the template file regardless of language.
 */
function az_output_schema(): void {
	$schemas = [];

	if ( is_front_page() || is_page_template( 'page-templates/page-hotel.php' ) ) {
		$schemas[] = az_schema_hotel();
	}

	if ( is_post_type_archive( 'zimmer-suiten' ) ) {
		// suppress_filters => false is required so WPML's language filter applies
		// and only posts in the current language are returned (not all variants).
		$rooms = get_posts( [
			'post_type'        => 'zimmer-suiten',
			'posts_per_page'   => -1,
			'post_status'      => 'publish',
			'orderby'          => 'menu_order',
			'order'            => 'ASC',
			'suppress_filters' => false,
		] );
		foreach ( $rooms as $room ) {
			$schemas[] = az_schema_hotelroom( $room->ID );
		}
	}

	if ( is_singular( 'zimmer-suiten' ) ) {
		$schemas[] = az_schema_hotelroom();
	}

	if ( is_page_template( 'page-templates/page-restaurant-carbon.php' ) ) {
		$schemas[] = az_schema_restaurant( 'carbon' );
	}

	if ( is_page_template( 'page-templates/page-fondue.php' ) ) {
		$schemas[] = az_schema_restaurant( 'fondue' );
	}

	// Gastronomie overview outputs both restaurant entities (confirmed decision).
	if ( is_page_template( 'page-templates/page-gastronomie.php' ) ) {
		$schemas[] = az_schema_restaurant( 'carbon' );
		$schemas[] = az_schema_restaurant( 'fondue' );
	}

	foreach ( $schemas as $schema ) {
		if ( empty( $schema ) ) {
			continue;
		}
		echo '<script type="application/ld+json">'
			. wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT )
			. '</script>' . "\n";
	}
}

/**
 * Hotel schema — appears on homepage and /hotel/ page (all WPML language variants).
 *
 * Image and description come from the hotel page (not the current post),
 * so the schema is consistent whether rendered on the homepage or /hotel/.
 * Address and geo come from the arrival-contacts page (contacts_address + contacts_location).
 *
 * @return array<string, mixed>
 */
function az_schema_hotel(): array {
	$hotel_page_id    = az_schema_get_page_id_by_template( 'page-templates/page-hotel.php' );
	$contacts_page_id = az_schema_get_page_id_by_template( 'page-templates/page-arrival-contacts.php' );

	// ── Address ──────────────────────────────────────────────────────────────
	$address = [
		'@type'           => 'PostalAddress',
		'addressLocality' => 'Zermatt',
		'addressRegion'   => 'VS',
		'postalCode'      => '3920',
		'addressCountry'  => 'CH',
	];

	if ( $contacts_page_id ) {
		$street = get_field( 'contacts_address', $contacts_page_id );
		if ( $street ) {
			$address['streetAddress'] = az_schema_extract_street_line( $street );
		}
	}

	// ── Schema skeleton ──────────────────────────────────────────────────────
	$schema = [
		'@context' => 'https://schema.org',
		'@type'    => 'Hotel',
		'@id'      => AZ_SCHEMA_HOTEL_ID,
		'name'     => 'Hotel Ambassador Zermatt',
		'url'      => AZ_SCHEMA_HOST,
		'address'  => $address,
		'starRating'   => [ '@type' => 'Rating', 'ratingValue' => '4' ],
		// TODO: 'priceRange'     => '',   // e.g. '$$$$' — pending client data sheet
		// TODO: 'checkInTime'    => '',   // e.g. '15:00' — pending client data sheet
		// TODO: 'checkOutTime'   => '',   // e.g. '11:00' — pending client data sheet
		// TODO: 'amenityFeature' => [],   // list of LocationFeatureSpecification — pending client data sheet
	];

	// ── Phone & email (options) ───────────────────────────────────────────────
	$phone = get_field( 'general_phone', 'option' );
	if ( $phone ) {
		$schema['telephone'] = $phone;
	}

	$email = get_field( 'general_e-mail', 'option' );
	if ( $email ) {
		$schema['email'] = $email;
	}

	// ── Image (hotel page hero) ───────────────────────────────────────────────
	if ( $hotel_page_id ) {
		$hero_id = get_field( 'hero_image', $hotel_page_id );
		if ( $hero_id ) {
			$image_url = wp_get_attachment_image_url( $hero_id, 'full' );
			if ( $image_url ) {
				$schema['image'] = $image_url;
			}
		}
	}

	// ── Description (hotel page intro text) ──────────────────────────────────
	if ( $hotel_page_id ) {
		$description = get_field( 'intro_text', $hotel_page_id );
		if ( $description ) {
			$schema['description'] = wp_strip_all_tags( $description );
		}
	}

	// ── Geo coordinates (contacts page ACF map field) ─────────────────────────
	if ( $contacts_page_id ) {
		$location = get_field( 'contacts_location', $contacts_page_id );
		if ( ! empty( $location['lat'] ) && ! empty( $location['lng'] ) ) {
			$schema['geo'] = [
				'@type'     => 'GeoCoordinates',
				'latitude'  => $location['lat'],
				'longitude' => $location['lng'],
			];
		}
	}

	return $schema;
}

/**
 * HotelRoom schema — appears on each single zimmer-suiten post and on the archive.
 *
 * Accepts an explicit post ID so the archive handler can loop over all rooms
 * without touching the global post context. When called from is_singular(),
 * omit $post_id and the current post is used.
 *
 * Both image fields (details_image_main, hero_intro_image) return attachment IDs,
 * not arrays — converted to URL via wp_get_attachment_image_url().
 *
 * @param int $post_id Optional. Defaults to current post.
 * @return array<string, mixed>
 */
function az_schema_hotelroom( int $post_id = 0 ): array {
	if ( ! $post_id ) {
		$post_id = (int) get_the_ID();
	}

	// ── Features repeater (bed, size, capacity, view) ────────────────────────
	$features   = get_field( 'features', $post_id ) ?: [];
	$row        = ! empty( $features ) ? $features[0] : [];
	$bed_type   = $row['bed']      ?? '';
	$capacity   = $row['capacity'] ?? '';
	$floor_size = $row['size']     ?? '';

	// Extract number from strings like "2 Personen" or "bis 4 Personen".
	preg_match( '/\d+/', $capacity, $cap_matches );
	$max_occupancy = ! empty( $cap_matches[0] ) ? (int) $cap_matches[0] : 0;

	// ── Image — both fields return attachment IDs ─────────────────────────────
	$image_id = get_field( 'details_image_main', $post_id )
		?: get_field( 'hero_intro_image', $post_id );
	$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'full' ) : '';

	// ── Schema skeleton ───────────────────────────────────────────────────────
	$raw_name = get_field( 'hero_intro_title', $post_id ) ?: get_the_title( $post_id );
	// Replace <br> variants with a space before stripping so "Doppelzimmer<br>Standard"
	// doesn't collapse to "DoppelzimmerStandard".
	$raw_name = trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags(
		str_ireplace( [ '<br>', '<br/>', '<br />' ], ' ', $raw_name )
	) ) );

	$schema = [
		'@context' => 'https://schema.org',
		'@type'    => 'HotelRoom',
		'@id'      => get_permalink( $post_id ) . '#hotelroom',
		'name'     => $raw_name,
		'url'      => get_permalink( $post_id ),
		'isPartOf' => [
			'@type' => 'Hotel',
			'@id'   => AZ_SCHEMA_HOTEL_ID,
		],
	];

	$description = get_field( 'hero_intro_text', $post_id );
	if ( $description ) {
		$schema['description'] = wp_strip_all_tags( $description );
	}

	if ( $image_url ) {
		$schema['image'] = $image_url;
	}

	// ── Bed ──────────────────────────────────────────────────────────────────
	if ( $bed_type ) {
		$schema['bed'] = [
			'@type'     => 'BedDetails',
			'typeOfBed' => $bed_type,
		];
	}

	// ── Occupancy ────────────────────────────────────────────────────────────
	if ( $max_occupancy > 0 ) {
		$schema['occupancy'] = [
			'@type'    => 'QuantitativeValue',
			'maxValue' => $max_occupancy,
			'unitText' => 'person',
		];
	} elseif ( $capacity ) {
		// Fallback: raw text if no leading number was found.
		$schema['occupancy'] = [
			'@type'       => 'QuantitativeValue',
			'description' => $capacity,
		];
	}

	// ── Floor size ───────────────────────────────────────────────────────────
	if ( $floor_size ) {
		$schema['floorSize'] = [
			'@type'       => 'QuantitativeValue',
			'description' => $floor_size,
		];
	}

	// ── Amenities (taxonomy relationship → WP_Term objects) ──────────────────
	$amenity_terms = get_field( 'details_amenities', $post_id ) ?: [];
	if ( ! empty( $amenity_terms ) ) {
		$schema['amenityFeature'] = array_map(
			fn( $term ) => [
				'@type' => 'LocationFeatureSpecification',
				'name'  => $term->name,
				'value' => true,
			],
			$amenity_terms
		);
	}

	// ── Offers ───────────────────────────────────────────────────────────────
	// html_entity_decode: the stored URL may contain &amp; — decode to & for valid JSON-LD.
	$booking_url = html_entity_decode(
		get_field( 'general_booking_url', 'option' ) ?: get_permalink( $post_id ),
		ENT_QUOTES,
		'UTF-8'
	);
	$schema['offers'] = [
		'@type'         => 'Offer',
		'url'           => $booking_url,
		'priceCurrency' => 'CHF',
		'availability'  => 'https://schema.org/InStock',
	];

	return $schema;
}

/**
 * Restaurant schema — shared builder for Carbon and Fondue Igloo.
 *
 * @id and url are hardcoded to canonical (DE) URLs — never use get_permalink() here
 * since this function may be called from the gastronomie overview page.
 *
 * Field fallback chains handle all three calling contexts:
 *   - Gastronomie page: restaurant_carbon_text / fondue_text for description;
 *                       restaurant_carbon_image_left / fondue_image_full for image.
 *   - Individual page:  intro_text (same field on both) for description;
 *                       hero_image (shared section-hero module) for image.
 *
 * All image fields on these pages return attachment IDs (not arrays).
 *
 * @param 'carbon'|'fondue' $which Which restaurant entity to build.
 * @return array<string, mixed>
 */
function az_schema_restaurant( string $which ): array {
	$contacts_page_id = az_schema_get_page_id_by_template( 'page-templates/page-arrival-contacts.php' );

	// ── Address (restaurants share the hotel's address) ───────────────────────
	$address = [
		'@type'           => 'PostalAddress',
		'addressLocality' => 'Zermatt',
		'addressRegion'   => 'VS',
		'postalCode'      => '3920',
		'addressCountry'  => 'CH',
	];

	if ( $contacts_page_id ) {
		$street = get_field( 'contacts_address', $contacts_page_id );
		if ( $street ) {
			$address['streetAddress'] = az_schema_extract_street_line( $street );
		}
	}

	// ── Per-restaurant fields ─────────────────────────────────────────────────
	$menu_url      = '';
	$opening_hours = '';

	if ( 'carbon' === $which ) {
		$name        = 'Restaurant Carbon';
		$id          = AZ_SCHEMA_CARBON_ID;
		$url         = AZ_SCHEMA_HOST . '/restaurant-carbon/';
		// Gastronomie page → carbon page fallback.
		$description = get_field( 'restaurant_carbon_text' ) ?: get_field( 'intro_text' );
		$image_id    = get_field( 'restaurant_carbon_image_left' )
			?: get_field( 'hero_image' )
			?: get_field( 'unsere_kuche_image_top_left' );

		$opening_hours  = 'Mo-Su 18:30-22:00';

		// Menu link: first non-empty link from the unsere_kuche_hover repeater.
		$carbon_page_id = az_schema_get_page_id_by_template( 'page-templates/page-restaurant-carbon.php' );
		$menu_url       = '';
		if ( $carbon_page_id ) {
			$hover_rows = get_field( 'unsere_kuche_hover', $carbon_page_id ) ?: [];
			foreach ( $hover_rows as $row ) {
				if ( ! empty( $row['link'] ) ) {
					$menu_url = $row['link'];
					break;
				}
			}
		}
	} else {
		$name        = 'Fondue Igloo';
		$id          = AZ_SCHEMA_FONDUE_ID;
		$url         = AZ_SCHEMA_HOST . '/fondue-igloo/';
		// Gastronomie page → fondue page fallback.
		$description = get_field( 'fondue_text' ) ?: get_field( 'intro_text' );
		$image_id    = get_field( 'fondue_image_full' ) ?: get_field( 'hero_image' );

		// Menu link: first non-empty link from the content_hover repeater.
		$fondue_page_id = az_schema_get_page_id_by_template( 'page-templates/page-fondue.php' );
		if ( $fondue_page_id ) {
			$hover_rows = get_field( 'content_hover', $fondue_page_id ) ?: [];
			foreach ( $hover_rows as $row ) {
				if ( ! empty( $row['link'] ) ) {
					$menu_url = $row['link'];
					break;
				}
			}
		}
	}

	$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'full' ) : '';

	// ── Schema skeleton ───────────────────────────────────────────────────────
	$schema = [
		'@context' => 'https://schema.org',
		'@type'    => 'Restaurant',
		'@id'      => $id,
		'name'     => $name,
		'url'      => $url,
		'address'  => $address,
		'isPartOf' => [
			'@type' => 'Hotel',
			'@id'   => AZ_SCHEMA_HOTEL_ID,
		],
		// TODO: 'servesCuisine' => [],   // e.g. ['Swiss', 'European'] — pending client data sheet
		// TODO: 'priceRange'    => '',   // pending client data sheet
		// TODO: 'openingHours'  => '',   // e.g. 'Mo-Su 18:00-23:00' — pending client data sheet
	];

	if ( $description ) {
		$schema['description'] = wp_strip_all_tags( $description );
	}

	if ( $image_url ) {
		$schema['image'] = $image_url;
	}

	if ( ! empty( $menu_url ) ) {
		$schema['menu'] = $menu_url;
	}

	if ( ! empty( $opening_hours ) ) {
		$schema['openingHours'] = $opening_hours;
	}

	// acceptsReservations accepts a boolean or a URL (schema.org).
	// Use the table reservation URL from options when set; fall back to true.
	$reservation_url = get_field( 'general_table_reservation_url', 'option' );
	$schema['acceptsReservations'] = $reservation_url ?: true;

	$phone = get_field( 'general_phone', 'option' );
	if ( $phone ) {
		$schema['telephone'] = $phone;
	}

	$email = get_field( 'general_e-mail', 'option' );
	if ( $email ) {
		$schema['email'] = $email;
	}

	return $schema;
}
