<?php
/**
 * Storage and Rental Section in the Skiing Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section class="section-storage-and-rental bg-Dark py-16 md:py-20 xl:py-32">
	<div class="theme-container theme-grid">
		<div class="storage-and-rental-content grid col-span-2 md:col-span-6 xl:col-span-12 gap-x-5">

			<div class="storage-image mb-24 md:mb-16 xl:mb-0 order-2 xl:order-1">
				<figure class="relative overflow-hidden">
					<?php
					$storage_image = get_field( 'storage_and_rental_storage_image' );
					if ( $storage_image ) :
						echo wp_get_attachment_image( $storage_image, 'full', false, array( 'class' => 'w-full h-full object-cover  min-h-[425px] xl:min-h-[807px]' ) );
					endif;
					?>
				</figure>
			</div>

			<div class="storage-content mb-16 xl:mb-0 order-1 xl:order-2 grid grid-cols-2 md:grid-cols-6 xl:grid-cols-5 gap-x-5">
				<div class="col-span-2 md:col-span-4 xl:col-span-5">
					<h2 class="title-main font-inria text-LightGray mb-5 md:mb-8"><?php the_field( 'storage_and_rental_storage_title' ) ?></h2>
					<p class="font-noto body text-LightGray"><?php the_field( 'storage_and_rental_storage_description' ) ?></p>
				</div>

			</div>

			<div class="rental-content mb-10 xl:mb-0 grid grid-cols-2 md:grid-cols-6 xl:grid-cols-7 gap-x-5 order-3 xl:order-3">
				<div class="col-span-2 md:col-span-4 xl:col-span-4">
					<h2 class="title-main font-inria text-LightGray mb-5 md:mb-8"><?php the_field( 'storage_and_rental_rental_title' ) ?></h2>
				</div>
				<div class="col-span-2 md:col-span-4 xl:col-span-4 mb-10 md:mb-0">
					
					<p class="font-noto body text-LightGray"><?php the_field( 'storage_and_rental_rental_description' ) ?></p>
				</div>
				<div class="col-span-2 md:col-span-2 xl:col-span-3 flex justify-center md:justify-end xl:justify-center items-center">
					<?php
					$rental_logo = get_field( 'storage_and_rental_rental_logo' );
					if ( $rental_logo ) :
						echo wp_get_attachment_image( $rental_logo, 'full', false, array( 'class' => 'w-full object-cover max-w-[150px]' ) );
					endif;
					?>
				</div>
			</div>

			<div class="rental-image order-4 xl:order-4">
				<figure class="relative overflow-hidden">
					<?php
					$rental_image = get_field( 'storage_and_rental_rental_image' );
					if ( $rental_image ) :
						echo wp_get_attachment_image( $rental_image, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[425px] xl:min-h-[649px]' ) );
					endif;
					?>
				</figure>
			</div>

		</div>
	</div>
</section>
