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
			$link = get_field( 'trails_link' );
			if ( $link ) :
				$link_url    = $link['url'];
				$link_title  = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php
			endif;
			?>
		</div>
	</div>
	<div class="theme-container theme-grid">
		<div class="col-span-2 md:col-span-6 xl:col-span-12">
			<div class="swiper trailsSwiper">
				<?php
				$trails_images = get_field( 'trails_slider' );
				if ( $trails_images ) :
					?>
					<ul class="swiper-wrapper">
						<?php foreach ( $trails_images as $trail_image_id ) : ?>
							<li class="swiper-slide">
								<figure class="relative overflow-hidden min-h-[574px]">
									<?php echo wp_get_attachment_image( $trail_image_id, 'full', false, array( 'class' => 'w-full h-full object-cover object-center' ) ); ?>
								</figure>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php
				endif;
				?>
				<div class="swiper-button-next trails-swiper-button-next"></div>
				<div class="swiper-button-prev trails-swiper-button-prev"></div>
			</div>
		</div>
	</div>
</section>