<section class="section-restaurant-carbon bg-Dark py-12 md:py-20 xl:py-24">
	<div class="theme-container theme-grid">
		<div class="col-span-2 md:col-span-2 xl:col-span-6 order-2 md:order-2">
			<figure class="relative overflow-hidden md:mt-[325px] xl:mt-40 md:-ml-[50vw] xl:ml-0">
				<?php
				$rc_image1 = get_field( 'restaurant_image_1' );
				if ( $rc_image1 ) :
					echo wp_get_attachment_image( $rc_image1, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[411px] max-h-[415px] md:min-h-[693px] md:max-h-[693px] xl:min-h-[1036px] xl:max-h-[1036px]' ) );
				endif;
				?>
			</figure>
		</div>
		<div class="col-span-2 md:col-span-4 xl:col-span-5 xl:col-start-8 order-1 md:order-2">
			<figure class="relative overflow-hidden mb-10 md:mb-16 xl:mb-24 md:-mr-[13%] xl:-mr-[2.5vw]">
				<?php
				$rc_image2 = get_field( 'restaurant_image_2' );
				if ( $rc_image2 ) :
					echo wp_get_attachment_image( $rc_image2, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[269px] max-h-[269px] md:min-h-[440px] md:max-h-[440px] xl:min-h-[518px] xl:max-h-[518px]' ) );
				endif;
				?>
			</figure>
			<h2 class="title-main text-LightGray mb-5 md:mb-8 md:max-w-[400px] xl:max-w-full "><?php the_field( 'restaurant_title' ); ?></h2>
			<p class="font-noto body text-LightGray mb-10 md:mb-0"><?php the_field( 'restaurant_description' ); ?></p>
		</div>
	</div>
</section>
