<?php
/**
 * Trails Section in the Biking Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section class="section-trails bg-LightGray text-DarkGray py-12 md:py-20 xl:py-24">
	<div class="theme-container theme-grid mb-14 xl:mb-24">
		<div class="col-span-2 md:col-span-4 xl:col-span-12">
			<h2 class="title-main text-Dark mb-5 md:mb-8"><?php the_field( 'trails_title' ); ?></h2>
		</div>
		<div class="col-span-2 md:col-span-4 xl:col-span-6">
			<p class="font-noto body text-Dark xl:pr-32 mb-10 xl:mb-0"><?php the_field( 'trails_description' ); ?></p>
		</div>
		<div class="col-span-2 md:col-span-4 xl:col-span-5">
			<p class="font-noto body text-Dark mb-10 md:mb-12"><?php the_field( 'trails_description_2' ); ?></p>
			<?php
			$tlink = get_field( 'trails_link' );
			if ( $tlink ) :
				$link_url    = $tlink['url'];
				$link_title  = $tlink['title'];
				$link_target = $tlink['target'] ? $tlink['target'] : '_self';
				?>
				<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php
			endif;
			?>
		</div>
	</div>
	<div class="theme-container theme-grid">
		<div class="trails-images-swiper-col col-span-2 md:col-span-6 xl:col-span-12 flex flex-col gap-y-8">
			<?php
				$slider = get_field( 'trails_slider' );
				if ( $slider ) :
					?>
					<div class="relative group">
						<div class="swiper trails-images-swiper">
							<div class="swiper-wrapper">
								<?php
								$counter = 0;

								foreach ( $slider as $slider_id ) :
									$image_url = wp_get_attachment_image_url( $slider_id, 'full' );
									$image_alt = get_post_meta( $slider_id, '_wp_attachment_image_alt', true );
									?>
									<div class="swiper-slide overflow-hidden">
										<div class="block h-full">
											<div class="slide-bg slide-bg--<?php echo esc_attr( $counter ); ?> w-full min-h-[400px] md:min-h-[574px] bg-cover bg-no-repeat bg-[80%] transition-transform duration-500 ease-out xl:group-hover:scale-[1.04]" style="background-image: url('<?php echo esc_url( $image_url ); ?>');"></div>
										</div>
									</div>
									<?php
									$counter++;
								endforeach;
								?>
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
