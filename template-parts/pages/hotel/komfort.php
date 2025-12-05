<?php
/**
 * Komfort Section in the Hotel Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="Komfort" class="Komfort bg-LightGray pt-[2.19rem] md:pt-[5.81rem] md:pb-[5.75rem] xl:pt-[5.56rem] xl:pb-[5.63rem]">
	<div class="theme-container">
		<div class="theme-grid">

			<!-- TEXT + BUTTON -->
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-6 order-1 md:order-none">
				<div class="title-main text-Dark">
					<h2><?php the_field( 'komfort_title' ); ?></h2>
				</div>

				<div class="xl:grid xl:grid-cols-6 xl:gap-x-5">
					<div class="xl:col-span-5">
						<div class="body text-Dark pt-[1.25rem] md:pt-[1.87rem] xl:pt-[1.87rem]">
							<?php the_field( 'komfort_text' ); ?>
						</div>

						<?php
						$klink = get_field( 'komfort_button' );
						if ( $klink ) :
							$link_url    = $klink['url'];
							$link_title  = $klink['title'];
							$link_target = $klink['target'] ? $klink['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary mb-[2.44rem] md:mb-[3.75rem] xl:mb-0 mt-[2.5rem] md:mt-[3.75rem] xl:mt-[4.1875rem]">
								<?php echo esc_html( $link_title ); ?>
							</a>
							<?php
						endif;
						?>

						<!-- LEFT IMAGE (desktop only, sits under content) -->
						<div class="hidden xl:block pb-[2.25rem] xl:pt-[8.62rem] relative col-start-1 col-span-2 md:col-start-1 md:col-span-5 xl:col-start-1 xl:col-span-5">
							<?php
							$k_img_l = get_field( 'komfort_image_left' );
							if ( $k_img_l ) :
								echo wp_get_attachment_image( $k_img_l, 'full', false, array( 'class' => 'w-auto h-full object-cover' ) );
							endif;
							?>
						</div>
					</div>
				</div>
			</div>

			<!-- RIGHT IMAGE  -->
			<div class="col-start-2 col-span-1 md:col-start-5 md:col-span-2 xl:col-start-8 xl:col-span-5 relative pb-[1.25rem] md:pb-0 order-2 md:order-none md:pt-[11.53rem] xl:pt-0 hidden md:block">
				<?php
				$k_img_r = get_field( 'komfort_image_right' );
				if ( $k_img_r ) :
					echo wp_get_attachment_image( $k_img_r, 'full', false, array( 'class' => 'relative md:w-full xl:w-auto md:max-h-[19.94rem] xl:max-h-none h-full object-cover' ) );
				endif;
				?>
			</div>

			<!-- LEFT IMAGE (mobile / tablet) -->
			<div class="block xl:hidden col-start-1 col-span-2 md:col-start-1 md:col-span-5 xl:col-start-2 xl:col-span-5 pb-[2.25rem] pt-8 xl:pt-[8.62rem] order-3 md:order-3">
				<?php
				$k_img_l2 = get_field( 'komfort_image_left' );
				if ( $k_img_l2 ) :
					echo wp_get_attachment_image( $k_img_l2, 'full', false, array( 'class' => 'w-auto h-full object-cover' ) );
				endif;
				?>
			</div>

		</div>
	</div>
</section>
