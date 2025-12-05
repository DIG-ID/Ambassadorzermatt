<?php
/**
 * Sauna Section in the Pool & Sauna Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-sauna" class="section-sauna bg-Dark pt-[2.44rem] pb-[2.38rem] md:pt-[4.25rem] md:pb-[4.25rem] xl:pt-[4.56rem] xl:pb-[4.5rem]">
	<div class="theme-container">
		<div class="theme-grid">

			<!-- TOP RIGHT IMAGE -->
			<div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-7 xl:col-span-6 xl:row-start-1 order-1">
				<?php
				$img_top = get_field( 'sauna_image_top' );
				if ( $img_top ) :
					echo wp_get_attachment_image( $img_top, 'full', false, array( 'class' => 'w-full max-h-auto bleed-right-full' ) );
				endif;
				?>
			</div>

			<!-- LEFT IMAGE (mobile + desktop, hidden on tablet) -->
			<div class="block md:hidden xl:block col-start-1 col-span-2 md:col-start-1 md:col-span-2 xl:col-start-1 xl:col-span-5 xl:row-start-2 pt-[2.5rem] md:pt-[3rem] xl:pt-0 order-3 xl:transform xl:-translate-y-[5rem]">
				<?php
				$img_left = get_field( 'sauna_image_left' );
				if ( $img_left ) :
					echo wp_get_attachment_image( $img_left, 'full', false, array( 'class' => 'w-full h-auto md:min-h-[54rem] bleed-left-full-md' ) );
				endif;
				?>
			</div>

			<!-- Tablet-only left image -->
			<div class="hidden md:block xl:hidden col-start-1 col-span-2 md:col-start-1 md:col-span-2 pt-[2.5rem] md:pt-[3rem] order-2">
				<?php
				$img_left = get_field( 'sauna_image_left_tablet' );
				if ( $img_left ) :
					echo wp_get_attachment_image( $img_left, 'full', false, array( 'class' => 'w-full h-auto md:min-h-[54rem] bleed-left-full-md' ) );
				endif;
				?>
			</div>

			<!-- ROW 2 – INNER GRID ON THE RIGHT (TEXT + BOTTOM IMAGE) -->
			<div class="col-start-1 col-span-2 md:col-start-3 md:col-span-4 xl:col-start-7 xl:col-span-6 xl:row-start-2 pt-[2.5rem] md:pt-[3rem] xl:pt-[6.31rem] order-2">
				<div class="grid grid-cols-1 gap-y-[1.25rem] md:gap-y-[1.88rem]">
					<!-- TITLE -->
					<div>
						<h2 class="title-main text-LightGray"><?php the_field( 'sauna_title' ); ?></h2>
					</div>

					<!-- TEXT -->
					<div>
						<p class="text-LightGray"><?php the_field( 'sauna_text' ); ?></p>
					</div>

					<!-- FEATURES -->
					<div>
						<h2 class="title-secondary text-LightGray !leading-[40px] md:!leading-[48px]">
							<?php the_field( 'sauna_features' ); ?>
						</h2>
					</div>

					<!-- BOTTOM IMAGE UNDER TEXT CONTENT (tablet/desktop) -->
					<div class="pt-[1.25rem] md:pt-[2.5rem] xl:pt-[4.06rem] hidden md:block">
						<?php
						$img_bottom = get_field( 'sauna_image_bottom' );
						if ( $img_bottom ) :
							echo wp_get_attachment_image( $img_bottom, 'full', false, array( 'class' => 'w-full max-h-auto' ) );
						endif;
						?>
					</div>
				</div>
			</div>

			<!-- BOTTOM IMAGE UNDER LEFT IMAGE (mobile only) -->
			<div class="col-start-1 col-span-2 pt-[1.25rem] md:pt-[2.5rem] xl:pt-[4.06rem] md:hidden order-4">
				<?php
				$img_bottom = get_field( 'sauna_image_bottom' );
				if ( $img_bottom ) :
					echo wp_get_attachment_image( $img_bottom, 'full', false, array( 'class' => 'w-full max-h-auto' ) );
				endif;
				?>
			</div>

		</div>
	</div>
</section>
