<section class="section-winter-and-summer bg-LightGray py-16 md:py-20 xl:py-32">
	<div class="theme-container">
		<div class="winter-and-summer-content grid">
			<div class="winter-content order-1 mb-9 md:mb-24 xl:mb-0">
				<h2 class="title-main font-inria mb-5 md:mb-8"><?php the_field( 'winter_and_summer_winter_title' ) ?></h2>
				<p class="font-noto body"><?php the_field( 'winter_and_summer_winter_description' ) ?></p>
			</div>
			<div class="winter-image xl:grid xl:grid-cols-6 xl:gap-x-5 order-2 mb-16 xl:mb-0">
				<figure class="xl:col-span-5 xl:col-start-2">
					<?php
					$winter_image_portrait  = get_field( 'winter_and_summer_winter_image_portrait' );
					$winter_image_landscape = get_field( 'winter_and_summer_winter_image_landscape' );
					if ( $winter_image_portrait ) :
						echo wp_get_attachment_image( $winter_image_portrait, 'full', false, array( 'class' => 'w-full h-full max-h-[426px] xl:max-h-[682px] object-cover md:invisible md:hidden xl:visible xl:block' ) );
					endif;
					if ( $winter_image_landscape ) :
						echo wp_get_attachment_image( $winter_image_landscape, 'full', false, array( 'class' => 'w-full object-cover hidden invisible md:visible md:block xl:invisible xl:hidden' ) );
					endif;
					?>
				</figure>
			</div>
			<div class="summer-content xl:grid xl:grid-cols-6 xl:gap-x-5 order-4 xl:order-3">
				<div class="xl:col-span-5">
					<h2 class="title-main font-inria mb-5 md:mb-8"><?php the_field( 'winter_and_summer_summer_title' ) ?></h2>
					<p class="font-noto body"><?php the_field( 'winter_and_summer_summer_description' ) ?></p>
				</div>
			</div>
			<div class="summer-image order-3 xl:order-4 mb-11 mb:mb-16 xl:mb-0">
				<figure class="">
					<?php
					$summer_image_portrait  = get_field( 'winter_and_summer_summer_image_portrait' );
					$summer_image_landscape = get_field( 'winter_and_summer_summer_image_landscape' );
					if ( $summer_image_portrait ) :
						echo wp_get_attachment_image( $summer_image_portrait, 'full', false, array( 'class' => 'w-full h-full max-h-[426px] xl:max-h-[682px] object-cover md:invisible md:hidden xl:visible xl:block' ) );
					endif;
					if ( $summer_image_landscape ) :
						echo wp_get_attachment_image( $summer_image_landscape, 'full', false, array( 'class' => 'w-full object-cover hidden invisible md:visible md:block xl:invisible xl:hidden' ) );
					endif;
					?>
				</figure>
			</div>
		</div>
	</div>
</section>
