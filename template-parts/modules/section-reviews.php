<?php
/**
 * Reviews Module Section (TrustYou widgets).
 * Used on: Home template, Zimmer & Suiten archive and single.
 *
 * The iframeResizer script needed by the Meta Review widget is enqueued
 * in functions.php (az_theme_enqueue_styles) — add new templates there too.
 *
 * Optional args: 'bg' => background class (default 'bg-LightGray').
 *
 * @package ambassador-zermatt
 * @subpackage Module
 * @since 1.0.0
 */

$reviews_bg    = ( isset( $args['bg'] ) && $args['bg'] ) ? $args['bg'] : 'bg-LightGray';
$reviews_title = get_field( 'reviews_title', 'option' ); // Global title, same on every page.

$trustyou_base = 'https://api.trustyou.com/hotels/' . AZ_TRUSTYOU_HOTEL_ID;

$trust_score_url = add_query_arg(
	array(
		'key'   => AZ_TRUSTYOU_KEY,
		'size'  => 'xl',
		'scale' => 5,
	),
	$trustyou_base . '/trust_score.html'
);

$meta_review_url = add_query_arg(
	array(
		'key'     => AZ_TRUSTYOU_KEY,
		'display' => 'full',
		'scale'   => 5,
	),
	$trustyou_base . '/meta_review.html'
);
?>

<section id="section-reviews" class="section-reviews <?php echo esc_attr( $reviews_bg ); ?> py-14 xl:py-24">
	<div class="theme-container">
		<div class="theme-grid">
			<?php if ( $reviews_title ) : ?>
				<div class="col-span-2 md:col-span-6 xl:col-span-12 text-Dark pb-10 xl:pb-16">
					<h2 class="title-main"><?php echo esc_html( $reviews_title ); ?></h2>
				</div>
			<?php endif; ?>

			<!-- TrustYou: TrustScore -->
			<div class="col-span-2 md:col-span-6 xl:col-span-3 pb-10 xl:pb-0">
				<iframe
					class="section-reviews__score"
					src="<?php echo esc_url( $trust_score_url ); ?>"
					title="<?php esc_attr_e( 'TrustYou TrustScore', 'ambassador' ); ?>"
					scrolling="no"
					height="144"
					width="170"
					loading="lazy"
					style="border:none"
				></iframe>
			</div>

			<!-- TrustYou: Meta Review (height auto-adjusted by iframeResizer) -->
			<div class="col-span-2 md:col-span-6 xl:col-span-9">
				<iframe
					class="section-reviews__meta js-trustyou-meta"
					src="<?php echo esc_url( $meta_review_url ); ?>"
					title="<?php esc_attr_e( 'TrustYou Meta Review', 'ambassador' ); ?>"
					scrolling="no"
					width="100%"
					loading="lazy"
					style="border:none; width:100%; min-width:100%"
				></iframe>
			</div>
		</div>
	</div>
</section>
