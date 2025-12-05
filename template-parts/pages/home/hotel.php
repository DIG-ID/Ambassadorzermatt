<section id="section-hotel" class="section-hotel bg-LightGray py-11 md:py-16 xl:py-24">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="col-span-2 md:col-span-6 xl:col-span-12">
				<h2 class="title-secondary text-Dark"><?php the_field( 'hotel_overtitle' ); ?></h2>
				<h3 class="title-main text-Dark md:pt-5 xl:pt-4 md:mb-7 xl:mb-0"><?php the_field( 'hotel_title' ); ?></h3>
			</div>
			<div class="col-span-2 md:col-span-6 xl:col-span-12 grid grid-cols-2 md:grid-cols-6 xl:grid-cols-12 gap-x-5">
				<div class="col-span-2 md:col-span-4 xl:col-span-8 grid grid-cols-2 md:grid-cols-6 xl:grid-cols-8 gap-x-5">
					<div class="col-span-2 md:col-span-6 xl:col-span-5">
						<p class="text-Dark pt-4 md:pt-0 xl:pt-8 pb-8 lg:pb-16"><?php the_field( 'hotel_description' ); ?></p>
						<?php
							$link = get_field( 'hotel_button' );
							if ($link):
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary mb-10 md:mb-0 xl:mb-16">
							<?php echo esc_html($link_title); ?>
						</a>
						<?php endif; ?>
					</div>
					<div class="col-span-2 md:col-span-6 xl:col-span-8 hidden xl:block">
						<?php
							$imgHotel1_desktop = get_field('hotel_image_1');
							if ($imgHotel1_desktop) {
								echo wp_get_attachment_image($imgHotel1_desktop, 'full', false, [
									'class' => 'w-full h-auto object-cover',
								]);
							}
						?>
					</div>
				</div>
				<div class="col-span-2 md:col-span-2 xl:col-span-4 col-start-1 md:col-start-5 xl:col-start-9">
					<?php
						$imgHotel2 = get_field('hotel_image_2');
						if ($imgHotel2) {
							echo wp_get_attachment_image($imgHotel2, 'full', false, [
								'class' => 'w-full h-auto object-cover object-left md:object-center float-right md:float-none max-h-[25dvh] md:max-h-none',
							]);
						}
					?>
				</div>
				<div class="col-span-2 md:col-span-5 xl:col-span-8 block xl:hidden">
					<?php
						$imgHotel1 = get_field('hotel_image_1');
						if ($imgHotel1) {
							echo wp_get_attachment_image($imgHotel1, 'full', false, [
								'class' => 'w-full h-auto object-cover mt-5 md:mt-8',
							]);
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
