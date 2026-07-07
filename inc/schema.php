<?php
/**
 * JSON-LD Structured Data (Schema.org)
 *
 * @package ambassador-zermatt
 * @subpackage Functionality
 * @since 1.0.0
 */

// @id values are always the canonical (DE) URLs — never translated variants.
define( 'AZ_SCHEMA_HOST',      'https://www.ambassadorzermatt.com' );
define( 'AZ_SCHEMA_HOTEL_ID',  AZ_SCHEMA_HOST . '/#hotel' );
define( 'AZ_SCHEMA_CARBON_ID', AZ_SCHEMA_HOST . '/restaurant-carbon/#restaurant' );
define( 'AZ_SCHEMA_FONDUE_ID', AZ_SCHEMA_HOST . '/fondue-igloo/#restaurant' );

function az_schema_get_page_id_by_template( string $template ): int {
	static $cache = [];

	if ( ! isset( $cache[ $template ] ) ) {
		$pages              = get_pages( [
			'meta_key'    => '_wp_page_template',
			'meta_value'  => $template,
			'number'      => 1,
			'post_status' => 'publish',
		] );
		$cache[ $template ] = ! empty( $pages ) ? (int) $pages[0]->ID : 0;
	}

	return $cache[ $template ];
}

// The contacts_address ACF field stores a multi-line block (hotel name, street, postal code).
// Returns only the street line for schema.org streetAddress.
function az_schema_extract_street_line( string $raw ): string {
	$lines = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', wp_strip_all_tags( $raw ) ) ) );

	foreach ( $lines as $line ) {
		if ( preg_match( '/\d/', $line ) && ! preg_match( '/^[A-Z]{2}-?\d{4}/', $line ) ) {
			return $line;
		}
	}

	return implode( ', ', $lines );
}

/**
 * Return the current or upcoming Fondue Igloo winter season as absolute dates.
 *
 * The season runs 15 December – 20 March and crosses the calendar-year boundary,
 * so the concrete YYYY-MM-DD dates are computed relative to "today" and never go
 * stale. Feeds schema.org openingHoursSpecification validFrom / validThrough.
 *
 * - In-season (15 Dec – 20 Mar): returns the season currently running.
 * - Off-season (21 Mar – 14 Dec): returns the upcoming winter season.
 *
 * @return array{validFrom:string,validThrough:string} ISO 8601 dates.
 */
function az_schema_fondue_season(): array {
	$year  = (int) current_time( 'Y' );
	$today = current_time( 'Y-m-d' );

	// If we're before this year's 20 March close, the running/upcoming season
	// started on 15 December of the previous year.
	$start_year = ( $today <= sprintf( '%d-03-20', $year ) ) ? $year - 1 : $year;

	return [
		'validFrom'    => sprintf( '%d-12-15', $start_year ),
		'validThrough' => sprintf( '%d-03-20', $start_year + 1 ),
	];
}

add_action( 'wp_head', 'az_output_schema', 5 );

function az_output_schema(): void {
	$schemas = [];

	if ( is_front_page() || is_page_template( 'page-templates/page-hotel.php' ) ) {
		$schemas[] = az_schema_hotel();
	}

	if ( is_post_type_archive( 'zimmer-suiten' ) ) {
		// suppress_filters => false lets WPML filter results to the current language only.
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

	if ( is_page_template( 'page-templates/page-gastronomie.php' ) ) {
		$schemas[] = az_schema_restaurant( 'carbon' );
		$schemas[] = az_schema_restaurant( 'fondue' );
	}

	// az_schema_faq() returns [] when the page has no FAQ rows, so this is a
	// no-op on pages without FAQ content — no per-template condition needed.
	if ( is_singular() ) {
		$schemas[] = az_schema_faq();
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

function az_schema_hotel(): array {
	$hotel_page_id    = az_schema_get_page_id_by_template( 'page-templates/page-hotel.php' );
	$contacts_page_id = az_schema_get_page_id_by_template( 'page-templates/page-arrival-contacts.php' );

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

	$schema = [
		'@context'   => 'https://schema.org',
		'@type'      => 'Hotel',
		'@id'        => AZ_SCHEMA_HOTEL_ID,
		'name'       => 'Hotel Ambassador Zermatt',
		'url'        => AZ_SCHEMA_HOST,
		'address'    => $address,
		'starRating' => [ '@type' => 'Rating', 'ratingValue' => '4' ],
		'priceRange'     => '$$$ – (ca. CHF 300–600 pro Zimmer/Nacht je nach Saison und Zimmerkategorie)',
		'checkInTime'    => '15:00',
		'checkOutTime'   => '11:00',
		'amenityFeature' => [ 'Indoorpool', 'Whirlpool', 'Finnische Sauna', 'kostenloses WLAN', 'Skiverleih im Haus (Glacier Sport)', 'Skiraum (beheizt)', 'Gepack-service', 'Bahnhoftransfer (kostenpflichtig)', 'Concierge-Service', 'Bergbahntickets an der Rezeption', 'Balkon in allen Zimmern', 'Fruehstuecksbuffet' ],
	];

	$phone = get_field( 'general_phone', 'option' );
	if ( $phone ) {
		$schema['telephone'] = $phone;
	}

	$email = get_field( 'general_e-mail', 'option' );
	if ( $email ) {
		$schema['email'] = $email;
	}

	if ( $hotel_page_id ) {
		$hero_id = get_field( 'hero_image', $hotel_page_id );
		if ( $hero_id ) {
			$image_url = wp_get_attachment_image_url( $hero_id, 'full' );
			if ( $image_url ) {
				$schema['image'] = $image_url;
			}
		}

		$description = get_field( 'intro_text', $hotel_page_id );
		if ( $description ) {
			$schema['description'] = wp_strip_all_tags( $description );
		}
	}

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

function az_schema_hotelroom( int $post_id = 0 ): array {
	if ( ! $post_id ) {
		$post_id = (int) get_the_ID();
	}

	$features   = get_field( 'features', $post_id ) ?: [];
	$row        = ! empty( $features ) ? $features[0] : [];
	$bed_type   = $row['bed']      ?? '';
	$capacity   = $row['capacity'] ?? '';
	$floor_size = $row['size']     ?? '';

	preg_match( '/\d+/', $capacity, $cap_matches );
	$max_occupancy = ! empty( $cap_matches[0] ) ? (int) $cap_matches[0] : 0;

	$image_id  = get_field( 'details_image_main', $post_id ) ?: get_field( 'hero_intro_image', $post_id );
	$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'full' ) : '';

	$raw_name = get_field( 'hero_intro_title', $post_id ) ?: get_the_title( $post_id );
	// Replace <br> with a space before stripping — otherwise "Doppelzimmer<br>Standard" collapses to "DoppelzimmerStandard".
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

	if ( $bed_type ) {
		$schema['bed'] = [ '@type' => 'BedDetails', 'typeOfBed' => $bed_type ];
	}

	if ( $max_occupancy > 0 ) {
		$schema['occupancy'] = [
			'@type'    => 'QuantitativeValue',
			'maxValue' => $max_occupancy,
			'unitText' => 'person',
		];
	} elseif ( $capacity ) {
		$schema['occupancy'] = [ '@type' => 'QuantitativeValue', 'description' => $capacity ];
	}

	if ( $floor_size ) {
		$schema['floorSize'] = [ '@type' => 'QuantitativeValue', 'description' => $floor_size ];
	}

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

	// The stored booking URL may contain &amp; — decode to & for valid JSON-LD.
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

// @id and url are always canonical (DE) URLs — this function may be called from the
// gastronomie overview page, so get_permalink() must never be used here.
function az_schema_restaurant( string $which ): array {
	$contacts_page_id = az_schema_get_page_id_by_template( 'page-templates/page-arrival-contacts.php' );

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

	$menu_url           = '';
	$opening_hours      = '';
	$opening_hours_spec = [];

	if ( 'carbon' === $which ) {
		$name        = 'Restaurant Carbon';
		$id          = AZ_SCHEMA_CARBON_ID;
		$url         = AZ_SCHEMA_HOST . '/restaurant-carbon/';
		$description = get_field( 'restaurant_carbon_text' ) ?: get_field( 'intro_text' );
		$image_id    = get_field( 'restaurant_carbon_image_left' )
			?: get_field( 'hero_image' )
			?: get_field( 'unsere_kuche_image_top_left' );

		$serves_cuisine = [ 'Modern-alpin', 'Mediterran', 'Europaeisch (Schweizer Produkte mit mediterraner Inspiration)' ];
		$price_range    = '$$$ – gehoben (Vorspeisen CHF 18–36, Hauptgang CHF 36–60, Desserts CHF 12–16; ca. CHF 60–100 pro Person mit Getraenken)';

		$opening_hours = 'Mo-Su 18:30-22:00'; // hardcoded — update here if hours change

		$carbon_page_id = az_schema_get_page_id_by_template( 'page-templates/page-restaurant-carbon.php' );
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
		$description = get_field( 'fondue_text' ) ?: get_field( 'intro_text' );
		$image_id    = get_field( 'fondue_image_full' ) ?: get_field( 'hero_image' );

		$serves_cuisine = [ 'Schweizer', 'Walliser', 'Traditionell (Kaesespezialitaeten: Moitié-Moitié, Walliser Horu, Trueffel, Champagner)' ];
		$price_range    = '$$ – $$$ (Fondue CHF 36–52 pro Person; Vorspeisen CHF 12–36; Desserts CHF 12–14; alle Preise inkl. 8.1% MWST)';

		// Seasonal winter venue (15 Dec – 20 Mar). Expressed as a machine-readable
		// openingHoursSpecification so Google can parse the season as structured
		// hours; the concrete dates are computed dynamically in az_schema_fondue_season().
		// Daily times mirror Restaurant Carbon (Mo–Su 18:30–22:00) — adjust if they differ.
		$season             = az_schema_fondue_season();
		$opening_hours_spec = [
			[
				'@type'        => 'OpeningHoursSpecification',
				'dayOfWeek'    => [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' ],
				'opens'        => '18:30',
				'closes'       => '22:00',
				'validFrom'    => $season['validFrom'],
				'validThrough' => $season['validThrough'],
			],
		];

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
		'servesCuisine' => $serves_cuisine,
		'priceRange'    => $price_range,
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

	if ( ! empty( $opening_hours_spec ) ) {
		$schema['openingHoursSpecification'] = $opening_hours_spec;
	} elseif ( ! empty( $opening_hours ) ) {
		$schema['openingHours'] = $opening_hours;
	}

	// acceptsReservations accepts a URL or boolean true — use the options URL when available.
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

// Reads the same ACF structure that template-parts/pages/home/faq.php renders
// (faq → accordion_item → question/answer), so the schema always mirrors the
// visible content. All groups are merged into a single FAQPage — Google expects
// one FAQPage node per page. Returns [] when the field is empty or unassigned.
function az_schema_faq( int $post_id = 0 ): array {
	if ( ! $post_id ) {
		$post_id = (int) get_the_ID();
	}

	// Google only parses this limited tag set inside acceptedAnswer.text.
	$allowed_tags = [
		'a'      => [ 'href' => true, 'title' => true ],
		'br'     => [],
		'p'      => [],
		'div'    => [],
		'b'      => [],
		'strong' => [],
		'i'      => [],
		'em'     => [],
		'ol'     => [],
		'ul'     => [],
		'li'     => [],
		'h2'     => [],
		'h3'     => [],
		'h4'     => [],
		'h5'     => [],
		'h6'     => [],
	];

	$questions = [];

	foreach ( (array) ( get_field( 'faq', $post_id ) ?: [] ) as $group ) {
		foreach ( (array) ( $group['accordion_item'] ?? [] ) as $item ) {
			$question = trim( wp_strip_all_tags( $item['question'] ?? '' ) );
			$answer   = trim( wp_kses( $item['answer'] ?? '', $allowed_tags ) );

			if ( '' === $question || '' === $answer ) {
				continue;
			}

			$questions[] = [
				'@type'          => 'Question',
				'name'           => $question,
				'acceptedAnswer' => [
					'@type' => 'Answer',
					'text'  => $answer,
				],
			];
		}
	}

	if ( empty( $questions ) ) {
		return [];
	}

	return [
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'@id'        => get_permalink( $post_id ) . '#faqpage',
		'mainEntity' => $questions,
	];
}
