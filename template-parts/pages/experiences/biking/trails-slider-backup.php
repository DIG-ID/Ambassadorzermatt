<?php
/**
 * Trail Slider Section in the Biking Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<div class="col-span-2 md:col-span-6 xl:col-span-12 flex flex-col gap-y-8">
	<div class="swiper trailsSwiper w-full  hover:cursor-zoom-in">
		<?php
		$trails_images = get_field( 'trails_slider' );
		if ( $trails_images ) :
			?>
			<button type="button" class="trails-zoom-trigger absolute top-4 right-4 z-20 w-11 h-11 flex items-center justify-center" aria-label="<?php esc_attr_e( 'Bildergalerie öffnen', 'ambassador' ); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="43" height="44" viewBox="0 0 43 44" fill="none">
					<path d="M42.0253 39.6565L32.6422 30.03C38.7623 21.8523 37.2577 10.1347 29.2834 3.85854C21.308 -2.41763 9.88194 -0.874673 3.76286 7.30309C-2.3572 15.4809 -0.853607 27.1984 7.12174 33.4746C13.6577 38.6181 22.7474 38.6181 29.2834 33.4746L38.6744 43.1072C39.602 44.0585 41.1056 44.0585 42.0332 43.1072C42.9609 42.1559 42.9609 40.6139 42.0332 39.6626L42.0253 39.6565ZM2.72754 18.6833C2.72754 9.95945 9.62409 2.88698 18.1309 2.88698C26.6378 2.88698 33.5343 9.95945 33.5343 18.6833C33.5343 27.4071 26.6378 34.4796 18.1309 34.4796C9.62706 34.4705 2.73545 27.4031 2.72754 18.6833Z" fill="#F3F3F3"/>
				</svg>
			</button>
			<ul class="swiper-wrapper">
				<?php foreach ( $trails_images as $trail_image_id ) : ?>
					<li class="swiper-slide">
						<figure class="relative overflow-hidden w-full ">
							<?php
							echo wp_get_attachment_image(
								$trail_image_id,
								'full',
								false,
								array(
									'class' => 'w-full h-full object-cover min-h-[400px] md:min-h-[574px] max-h-[574px] transition-transform duration-500 ease-out xl:group-hover:scale-[1.04]',
									'data-fancybox' => 'biker-gallery',
								)
							);
							?>
						</figure>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php
		endif;
		?>
	</div>
	<div class="trailsSwiper-naviagtion relative h-10 flex justify-center items-center gap-6">
		<div class="swiper-button-prev trails-swiper-button-prev relative left-[initial] right-[initial] top-[initial] after:hidden">
			<svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M18.3926 31.6914L1.41343 16.1766M1.41343 16.1766L15.5791 0.673922M1.41343 16.1766L32.5582 16.1887" stroke="#766A66" stroke-width="2"/>
			</svg>
		</div>
		<div class="swiper-button-next trails-swiper-button-next relative left-[initial] right-[initial] top-[initial] after:hidden">
			<svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M14.0605 0.742188L31.1502 16.1351M31.1502 16.1351L17.0958 31.7388M31.1502 16.1351L0.00611703 16.3458" stroke="#766A66" stroke-width="2"/>
			</svg>
		</div>
	</div>
</div>
