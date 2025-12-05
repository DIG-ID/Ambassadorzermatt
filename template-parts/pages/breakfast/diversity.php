<?php
/**
 * Diversity Section in the Breakfast Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="diversity" class="diversity bg-White pb-[3.74rem] xl:pb-[9.37rem]">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-2 xl:col-span-5 pt-[1.25rem] md:pt-[11.44rem] xl:pt-[14.12rem] order-2 md:order-none hidden md:block">
				<?php
				$d_image_tl = get_field( 'diversity_image_top_left' );
				if ( $d_image_tl ) :
					echo wp_get_attachment_image( $d_image_tl, 'full', false, array( 'class' => 'w-full max-h-auto md:min-h-[316px] bleed-left-full-md bleed-left-full-xl object-cover object-left md:object-right float-right md:float-none max-h-[25dvh] md:max-h-none max-w-[80%] md:max-w-none ' ) );
				endif;
				?>
			</div>
			<div class="col-span-2 md:col-start-3 md:col-span-4 xl:col-start-6 xl:col-span-7 order-1 md:order-none">
				<?php
				$d_img_tr = get_field( 'diversity_image_top_right' );
				if ( $d_img_tr ) :
					echo wp_get_attachment_image( $d_img_tr, 'full', false, array( 'class' => 'w-full max-h-auto bleed-right-full-md bleed-right-half-xl' ) );
				endif;
				?>
				<div class="col-start-1 col-span-2 md:col-span-5 xl:col-start-6 order-3 md:order-none hidden xl:block">
					<div class="title-main text-Dark  xl:pt-[3.13rem]">
						<h2><?php the_field( 'diversity_title' ); ?></h2>
					</div>
					<div class="title-secondary text-Dark xl:pt-[3.75rem]">
						<p><?php the_field( 'diversity_schedule' ); ?></p>
					</div>
				</div>
			</div>
				<div class="col-start-1 col-span-2 md:col-span-5 xl:col-start-6 order-3 md:order-none block xl:hidden">
					<div class="title-main text-Dark pt-[2.51rem] md:pt-[1.23rem]">
						<h2><?php the_field( 'diversity_title' ); ?></h2>
					</div>
					<div class="title-secondary text-Dark pt-[1.25rem] md:pt-[1.87rem]">
						<p><?php the_field( 'diversity_schedule' ); ?></p>
					</div>
				</div>
			</div>
			<div class="col-span-2 md:col-span-6 xl:col-span-12 pt-[2.49rem] md:pt-[3.75rem] xl:pt-[5.69rem] order-4 md:order-none">
				<?php
				$d_img_b = get_field( 'diversity_image_bottom' );
				if ( $d_img_b ) :
					echo wp_get_attachment_image( $d_img_b, 'full', false, array( 'class' => 'w-full max-h-auto' ) );
				endif;
				?>
			</div>
		</div>
	</div>
</section>
