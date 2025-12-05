<?php
/**
 * Slider Section in the Single Zimmer & Suiten Single Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="section-room-images" class="section-room-images bg-White pt-20 md:pt-24 xl:pt-0 pb-24 xl:pb-32">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="room-images-swiper-col col-span-2 md:col-span-6 xl:col-span-12">
				<?php
				$slider = get_field( 'room_images' );
				if ( $slider ) :
					?>
					<div class="relative group">
						<div class="swiper room-images-swiper">
							<div class="swiper-wrapper">
								<?php
								$counter = 0;

								foreach ( $slider as $slider_id ) :
									$image_url = wp_get_attachment_image_url( $slider_id, 'full' );
									$image_alt = get_post_meta( $slider_id, '_wp_attachment_image_alt', true );
									?>
									<div class="swiper-slide overflow-hidden">
										<a
											href="<?php echo esc_url( $image_url ); ?>"
											data-fancybox="room-gallery"
											data-caption="<?php echo esc_attr( $image_alt ); ?>"
											class="block h-full"
										>
											<div class="slide-bg slide-bg--<?php echo esc_attr( $counter ); ?> w-full min-h-[400px] md:min-h-[574px] bg-cover bg-no-repeat bg-center transition-transform duration-500 ease-out xl:group-hover:scale-[1.04]" style="background-image: url('<?php echo esc_url( $image_url ); ?>');"></div>
										</a>
									</div>
									<?php
									$counter++;
								endforeach;
								?>
							</div>
						</div>

						<!-- Magnifying glass icon (top-right) -->
						<div class="pointer-events-none absolute right-4 top-4 z-10">
							<div class="transition-transform duration-300 ease-out group-hover:scale-110">
								<svg xmlns="http://www.w3.org/2000/svg" width="43" height="44" viewBox="0 0 43 44" fill="none">
									<path d="M42.0253 39.6565L32.6422 30.03C38.7623 21.8523 37.2577 10.1347 29.2834 3.85854C21.308 -2.41763 9.88194 -0.874673 3.76286 7.30309C-2.3572 15.4809 -0.853607 27.1984 7.12174 33.4746C13.6577 38.6181 22.7474 38.6181 29.2834 33.4746L38.6744 43.1072C39.602 44.0585 41.1056 44.0585 42.0332 43.1072C42.9609 42.1559 42.9609 40.6139 42.0332 39.6626L42.0253 39.6565ZM2.72754 18.6833C2.72754 9.95945 9.62409 2.88698 18.1309 2.88698C26.6378 2.88698 33.5343 9.95945 33.5343 18.6833C33.5343 27.4071 26.6378 34.4796 18.1309 34.4796C9.62706 34.4705 2.73545 27.4031 2.72754 18.6833Z" fill="#F3F3F3"/>
								</svg>
							</div>
						</div>
					</div>
					<?php
				endif;
				?>

				<div class="controls relative min-h-8 max-w-24 flex flex-row justify-between items-center mx-auto z-10 mt-8">
					<div class="swiper-button-prev mr-7"></div>
					<div class="swiper-button-next ml-7"></div>
				</div>
			</div>

		</div>
	</div>
</section>
