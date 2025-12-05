<?php
/**
 * Slopes Section in the Skiing Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section class="section-slopes bg-LightGray text-DarkGray py-12 md:py-20 xl:py-24">
	<div class="theme-container theme-grid">
		<div class="col-span-2 md:col-span-6 xl:col-span-12">
			<figure class="relative overflow-hidden mb-10 md:mb-16 xl:mb-10">
				<?php
				$slopes_image = get_field( 'slopes_image' );
				if ( $slopes_image ) :
					echo wp_get_attachment_image( $slopes_image, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[425px] xl:min-h-[650px]' ) );
				endif;
				?>
			</figure>
		</div>
		<div class="col-span-2 md:col-span-4 xl:col-span-5">
			<h2 class="title-main text-Dark mb-5 md:mb-8"><?php the_field( 'slopes_title' ); ?></h2>
			<p class="font-noto body text-Dark"><?php the_field( 'slopes_description' ); ?></p>
		</div>
	</div>
</section>
