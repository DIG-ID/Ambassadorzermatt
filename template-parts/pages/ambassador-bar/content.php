<?php
/**
 * Content Section that appears on Ambassador Bar Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="section-content" class="section-content bg-White pb-[3.75rem] md:pb-[6.25rem]">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-12 hidden md:block">
				<?php
				$c_img = get_field( 'content_image' );
				if ( $c_img ) :
					echo wp_get_attachment_image( $c_img, 'full', false, array( 'class' => 'w-full max-h-auto' ) );
				endif;
				?>
			</div>
			<div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-12 block md:hidden">
				<?php
				$c_img_m = get_field( 'content_image_mobile' );
				if ( $c_img_m ) :
					echo wp_get_attachment_image( $c_img_m, 'full', false, array( 'class' => 'w-full max-h-auto' ) );
				endif;
				?>
			</div>
			<div class="col-start-1 col-span-2 md:col-span-5 xl:col-span-6 pt-[2.47rem] md:pt-[3.75rem] xl:pt-[1.87rem] max-w-[300px] md:max-w-[500px] xl:max-w-none">
				<h2 class="text-Dark title-main"><?php the_field( 'content_title' ); ?></h2>
			</div>
			<div class="col-start-1 col-span-2 md:col-span-4 xl:col-start-1 xl:col-span-5 pt-[1.25rem] md:pt-[1.87rem]">
				<p class="text-Dark body"><?php the_field( 'content_text' ); ?></p>
			</div>
		</div>
	</div>
</section>
