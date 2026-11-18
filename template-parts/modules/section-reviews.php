<?php
/**
 * Reviews Module Section (TrustYou Meta Review widget).
 * Used on: Zimmer & Suiten archive and single.
 *
 * The iframeResizer script needed by the Meta Review widget is enqueued
 * in functions.php (az_theme_enqueue_styles) — add new templates there too.
 *
 * @package ambassador-zermatt
 * @subpackage Module
 * @since 1.0.0
 */

$reviews_title = get_field( 'reviews_title', 'option' ); // Global title, same on every page.

$meta_review_url = add_query_arg(
	array(
		'key'     => AZ_TRUSTYOU_KEY,
		'display' => 'full',
		'scale'   => 5,
	),
	'https://api.trustyou.com/hotels/' . AZ_TRUSTYOU_HOTEL_ID . '/meta_review.html'
);
?>

<section id="section-reviews" class="section-reviews bg-White pb-14 xl:pb-24">
	<div class="theme-container">
		<div class="theme-grid">
			<?php if ( $reviews_title ) : ?>
				<div class="col-span-2 md:col-span-6 xl:col-span-12 text-Dark pb-10 xl:pb-16">
					<h2 class="title-main"><?php echo esc_html( $reviews_title ); ?></h2>
				</div>
			<?php endif; ?>

			<!-- TrustYou: Meta Review (height auto-adjusted by iframeResizer).
				The iframe is cross-origin, so its CSS can't be changed; mix-blend-multiply
				makes its white background take the section's background colour. -->
			<div class="col-span-2 md:col-span-6 xl:col-span-12">
				<iframe
					class="section-reviews__meta js-trustyou-meta mix-blend-multiply"
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
