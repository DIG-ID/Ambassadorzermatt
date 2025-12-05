<?php
/**
 * Culinary and Bar Section in the Enjoyment Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section class="section-culinary-and-bar bg-LightGray py-12 md:py-20 xl:py-24">
	<div class="theme-container theme-grid mb-16 md:mb-24 xl:mb-32">
		<div class="col-span-2 md:col-span-6 order-2 xl:order-1">
			<figure class="relative overflow-hidden">
				<?php
				$clandscape_image = get_field( 'culinary_image_landscape' );
				if ( $clandscape_image ) :
					echo wp_get_attachment_image( $clandscape_image, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[425px] hidden invisible md:block md:visible lg:hidden lg:invisible' ) );
				endif;
				$cportrait_image = get_field( 'culinary_image_portrait' );
				if ( $cportrait_image ) :
					echo wp_get_attachment_image( $cportrait_image, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[425px] xl:min-h-[823px] md:hidden md:invisible lg:block lg:visible' ) );
				endif;
				?>
			</figure>
		</div>
		<div class="col-span-2 md:col-span-6 xl:col-span-5 order-1 xl:order-2">
			<h2 class="title-main text-Dark mb-5 md:mb-8 xl:max-w-[443px]"><?php the_field( 'culinary_title' ); ?></h2>
			<div class="theme-grid">
				<div class="col-span-2 md:col-span-4 xl:col-span-12">
					<p class="font-noto body text-Dark mb-10 md:mb-16 xl:mb-0"><?php the_field( 'culinary_description' ); ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="theme-container theme-grid">
		<div class="col-span-2 md:col-span-6 xl:col-span-5">
			<h2 class="title-main text-Dark mb-5 md:mb-8 xl:max-w-[300px]"><?php the_field( 'bar_title' ); ?></h2>
			<div class="theme-grid">
				<div class="col-span-2 md:col-span-4 xl:col-span-12">
					<p class="font-noto body text-Dark mb-10 md:mb-16 xl:mb-0"><?php the_field( 'bar_description' ); ?></p>
				</div>
			</div>
		</div>
		<div class="col-span-2 md:col-span-6 xl:col-start-7">
			<figure class="relative overflow-hidden">
				<?php
				$blanscape_image = get_field( 'bar_image_landscape' );
				if ( $blanscape_image ) :
					echo wp_get_attachment_image( $blanscape_image, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[425px] hidden invisible md:block md:visible lg:hidden lg:invisible' ) );
				endif;
				$bportrait_image = get_field( 'bar_image_portrait' );
				if ( $bportrait_image ) :
					echo wp_get_attachment_image( $bportrait_image, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[425px] xl:min-h-[823px] md:hidden md:invisible lg:block lg:visible' ) );
				endif;
				?>
			</figure>
		</div>
	</div>
</section>
