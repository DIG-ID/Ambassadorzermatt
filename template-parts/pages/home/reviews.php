<?php
/**
 * Reviews Section (TrustYou widgets) in the Home Page template.
 *
 * The iframeResizer script needed by the Meta Review widget is enqueued
 * in functions.php (az_theme_enqueue_styles).
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

$reviews_overtitle = get_field( 'reviews_overtitle' );
$reviews_title     = get_field( 'reviews_title' );

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

<section id="section-reviews" class="section-reviews bg-LightGray py-14 xl:py-24">
	<div class="theme-container">
		<div class="theme-grid">
			<?php if ( $reviews_overtitle || $reviews_title ) : ?>
				<div class="col-span-2 md:col-span-6 xl:col-span-12 text-Dark pb-10 xl:pb-16">
					<?php if ( $reviews_overtitle ) : ?>
						<p class="title-secondary"><?php echo esc_html( $reviews_overtitle ); ?></p>
					<?php endif; ?>
					<?php if ( $reviews_title ) : ?>
						<h2 class="title-main md:pt-5 xl:pt-4"><?php echo esc_html( $reviews_title ); ?></h2>
					<?php endif; ?>
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
