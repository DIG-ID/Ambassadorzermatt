<section class="section-winter-and-summer bg-LightGray py-16 md:py-20 xl:py-32">
	<div class="theme-container theme-grid">
		<div class="winter-and-summer-content grid col-span-2 md:col-span-6 xl:col-span-11 xl:col-start-2">
			<div class="winter-content order-1 mb-9 md:mb-24 xl:mb-0">
				<h2 class="title-main font-inria text-Dark mb-5 md:mb-8"><?php the_field( 'winter_and_summer_winter_title' ) ?></h2>
				<p class="font-noto body text-Dark"><?php the_field( 'winter_and_summer_winter_description' ) ?></p>
			</div>
			<div class="winter-image xl:grid xl:grid-cols-6 xl:gap-x-5 order-2 mb-16 xl:mb-0">
				<figure class="relative overflow-hidden xl:col-span-5 xl:col-start-2">
					<?php
					$winter_image_landscape = get_field( 'winter_and_summer_winter_image' );
					if ( $winter_image_landscape ) :
						echo wp_get_attachment_image( $winter_image_landscape, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[425px] hidden invisible md:block md:visible lg:hidden lg:invisible' ) );
					endif;
					$winter_image_portrait = get_field( 'winter_and_summer_winter_image' );
					if ( $winter_image_portrait ) :
						echo wp_get_attachment_image( $winter_image_portrait, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[425px] xl:min-h-[682px] md:hidden md:invisible lg:block lg:visible' ) );
					endif;
					?>
				</figure>
			</div>
			<div class="summer-content xl:grid xl:grid-cols-6 xl:gap-x-5 order-4 xl:order-3">
				<div class="xl:col-span-5">
					<h2 class="title-main font-inria text-Dark mb-5 md:mb-8"><?php the_field( 'winter_and_summer_summer_title' ) ?></h2>
					<p class="font-noto body text-Dark"><?php the_field( 'winter_and_summer_summer_description' ) ?></p>
				</div>
			</div>
			<div class="summer-image order-3 xl:order-4 mb-11 mb:mb-16 xl:mb-0">
				<figure class="relative overflow-hidden xl:mr-6">
					<?php
					$summer_image_landscape = get_field( 'winter_and_summer_summer_image' );
					if ( $summer_image_landscape ) :
						echo wp_get_attachment_image( $summer_image_landscape, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[425px] hidden invisible md:block md:visible lg:hidden lg:invisible' ) );
					endif;
					$summer_image_portrait = get_field( 'winter_and_summer_summer_image' );
					if ( $summer_image_portrait ) :
						echo wp_get_attachment_image( $summer_image_portrait, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[425px] xl:min-h-[682px] md:hidden md:invisible lg:block lg:visible' ) );
					endif;
					?>
				</figure>
			</div>
		</div>
	</div>
</section>
