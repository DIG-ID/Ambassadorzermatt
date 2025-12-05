<?php
/**
 * Hiking Content Section in the Hiking Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section class="section-hiking-content bg-LightGray py-12 md:py-20 xl:py-24">
	<div class="theme-container theme-grid mb-16 md:mb-24 xl:mb-32">
		<div class="col-span-2 md:col-span-6 xl:col-span-4 xl:col-start-2">
			<h2 class="title-main text-DarkGray mb-5 md:mb-8 xl:max-w-[360px]"><?php the_field( 'hiking_title' ); ?></h2>
			<div class="theme-grid">
				<div class="col-span-2 md:col-span-4 xl:col-span-12">
					<p class="font-noto body text-DarkGray mb-10 md:mb-16 xl:mb-0"><?php the_field( 'hiking_description' ); ?></p>
				</div>
			</div>
		</div>
		<div class="col-span-2 md:col-span-6 xl:col-start-7">
			<figure class="relative overflow-hidden">
				<?php
				$h_image = get_field( 'hiking_image' );
				if ( $h_image ) :
					echo wp_get_attachment_image( $h_image, 'full', false, array( 'class' => 'w-full h-full object-cover object-[80%_50%] md:object-center xl:object-[80%_50%] min-h-[425px] xl:min-h-[750px]' ) );
				endif;
				?>
			</figure>
		</div>
	</div>
	<div class="theme-container theme-grid">
		<div class="col-span-2 md:col-span-6 order-2 xl:order-1">
			<figure class="relative overflow-hidden">
				<?php
				$wh_image = get_field( 'winter_hiking_image' );
				if ( $wh_image ) :
					echo wp_get_attachment_image( $wh_image, 'full', false, array( 'class' => 'w-full h-full object-cover object-[95%_50%] md:object-center xl:object-[95%_50%] min-h-[425px] xl:min-h-[750px]' ) );
				endif;
				?>
			</figure>
		</div>
		<div class="col-span-2 md:col-span-6 xl:col-span-5 order-1 xl:order-2">
			<h2 class="title-main text-DarkGray mb-5 md:mb-8 xl:max-w-[443px]"><?php the_field( 'winter_hiking_title' ); ?></h2>
			<div class="theme-grid">
				<div class="col-span-2 md:col-span-4 xl:col-span-12">
					<p class="font-noto body text-DarkGray mb-10 md:mb-16 xl:mb-0"><?php the_field( 'winter_hiking_description' ); ?></p>
				</div>
			</div>
		</div>
	</div>

</section>
