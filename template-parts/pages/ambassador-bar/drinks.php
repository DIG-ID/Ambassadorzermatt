<?php
/**
 * Drinks Section that appears on Ambassador Bar Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="section-drinks" class="section-drinks bg-LightGray pt-[3.09rem] md:pt-[7.06rem] xl:pt-[5.87rem] pb-[3.1rem] md:pb-[7.12rem] xl:pb-[9.44rem]">
	<div class="theme-container">
		<div class="theme-grid">

			<!-- LEFT IMAGE + TEXT COLUMN (ALL BREAKPOINTS) -->
			<div class="col-start-1 col-span-2 md:col-span-4 xl:col-span-7">

					<!-- Desktop left image -->
					<div class="image-wrapper hidden xl:block">
						<?php
						$d_img_tl = get_field( 'drinks_image_top_left' );
						if ( $d_img_tl ) :
							echo wp_get_attachment_image( $d_img_tl, 'full', false, array( 'class' => 'w-full max-h-auto' ) );
						endif;
						?>
					</div>

					<!-- Tablet + Mobile left image -->
					<div class="image-wrapper block xl:hidden">
						<?php
						$d_img_tlt = get_field( 'drinks_image_top_left_tablet' );
						if ( $d_img_tlt ) :
							echo wp_get_attachment_image( $d_img_tlt, 'full', false, array( 'class' => 'w-full max-h-auto min-h-[411px] md:min-h-[616px]' ) );
						endif;
						?>
					</div>

					<!-- MOBILE-ONLY RIGHT IMAGE (order #2 on mobile) -->
					<div class="block md:hidden pt-[1.87rem]">
						<?php
						$d_img_tr = get_field( 'drinks_image_top_right' );
						if ( $d_img_tr ) :
							echo wp_get_attachment_image( $d_img_tr, 'full', false, array( 'class' => 'w-full h-auto max-h-[376px] object-cover' ) );
						endif;
						?>
					</div>

					<!-- TEXT CONTENT (mobile order #3, tablet/desktop normal) -->
					<div class="pt-[2.47rem] md:pt-[3.78rem] xl:pt-[1.88rem] md:max-w-[300px] xl:max-w-none">
						<h2 class="title-main text-Dark "><?php the_field( 'drinks_title' ); ?></h2>
					</div>

					<div class="pt-[1.25rem] md:pt-[1.87rem] xl:max-w-[33.75rem]">
						<p class="text-Dark "><?php the_field( 'drinks_text' ); ?></p>
					</div>

					<div class="pt-[1.25rem] md:pt-[1.87rem]">
						<p class="title-secondary text-Dark"><?php the_field( 'drinks_schedule' ); ?></p>
					</div>
			</div>

			<!-- TABLET-ONLY RIGHT IMAGE -->
			<div class="hidden md:block xl:hidden md:col-start-5 md:col-span-2 md:pt-60">
				<?php
				$d_img_trt = get_field( 'drinks_image_top_right_tablet' );
				if ( $d_img_trt ) :
					echo wp_get_attachment_image( $d_img_trt, 'full', false, array( 'class' => 'w-full h-auto max-h-[617px] object-cover' ) );
				endif;
				?>
			</div>

			<!-- DESKTOP-ONLY RIGHT IMAGE -->
			<div class="hidden xl:block col-start-8 col-span-5 pt-[1.87rem] xl:pt-[20.125rem]">
				<?php
				$d_img_tr = get_field( 'drinks_image_top_right' );
				if ( $d_img_tr ) :
					echo wp_get_attachment_image( $d_img_tr, 'full', false, array( 'class' => 'w-full h-auto max-h-[376px] md:min-h-[617px] xl:min-h-[814px] object-cover' ) );
				endif;
				?>
			</div>

		</div>
	</div>

	<div class="theme-container pt-[5.19rem] md:pt-[7.75rem] xl:pt-[11.38rem]">
		<div class="theme-grid">
			<div class="col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-12">
				<div class="pt-[2.47rem] md:pt-[3.78rem] xl:pt-[1.88rem] md:max-w-[300px] xl:max-w-none">
					<h2 class="title-main text-Dark mb-10"><?php the_field( 'drinks_hover_title' ); ?></h2>
				</div>
			</div>
		</div>
		<div class="theme-grid">
			<?php if ( have_rows( 'drinks_hover' ) ) : ?>
				<div class="col-start-1 xl:col-start-2 col-span-2 md:col-span-6 xl:col-span-10 group grid grid-cols-2 md:grid-cols-6 xl:flex flex-row xl:min-h-[546px] xl:max-h-[546px] overflow-visible gap-5" aria-label="<?php esc_attr_e( 'Highlight menu', 'ambassador' ); ?>">
					<?php while ( have_rows( 'drinks_hover' ) ) : the_row();
						$image_id = get_sub_field('image');
						$desc     = get_sub_field('text');
						$link     = get_sub_field('link');
						$alt_meta = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
						$alt      = $alt_meta ? esc_attr($alt_meta) : esc_attr($title);
					?>
						<a <?php if (!empty($link)) : ?> href="<?php echo $link; ?>" target="_blank" <?php endif; ?> class="group/item relative col-span-1 md:col-span-3 xl:flex-1 transition-[flex] duration-700 ease-in-out hover:flex-[2] xl:group-hover:[&:not(:hover)]:flex-[1] hover:z-10">
							<div class="xl:absolute left-0 right-0 bottom-0 top-0 z-0 transition-[top] duration-700 xl:group-hover/item:-top-[40px] will-change-[top]">
								<?php
								if ( $image_id ) :
									echo wp_get_attachment_image(
										$image_id,
										'full',
										false,
										array(
											'class' => 'xl:absolute inset-0 max-h-[235px] md:max-h-[400px] xl:max-h-none w-full h-full object-cover origin-bottom',
											'alt'   => $alt,
										)
									);
								endif;
								?>

								<span class="dark-overlay pointer-events-none absolute inset-0 opacity-80 xl:opacity-0 transition-opacity duration-700 group-hover/item:opacity-80 z-10"></span>

								<span class="pointer-events-none absolute inset-0 flex flex-col md:flex-row justify-end md:justify-between items-center md:items-end opacity-100 transition-opacity duration-700 group-hover/item:opacity-100 z-20">
									<span class="text-White md:pl-5 opacity-100 xl:opacity-0 translate-y-0 transition-all duration-700 group-hover/item:opacity-100 xl:group-hover/item:translate-y-6 pb-3 md:pb-5 xl:pb-11">
										<?php if ( $desc ) : ?>
											<p class="title-secondary text-LightGray"><?php echo esc_html( $desc ); ?></p>
										<?php endif; ?>
									</span>
									<span class="md:pr-5 opacity-100 xl:opacity-0 translate-y-0 transition-all duration-700 group-hover/item:opacity-100 xl:group-hover/item:translate-y-6 pb-3 md:pb-5 xl:pb-12">
										<svg xmlns="http://www.w3.org/2000/svg" width="25" height="23" viewBox="0 0 25 23" fill="none" class="max-w-[18px] md:max-w-none">
											<path d="M0.673828 1H23.6738M23.6738 1V22M23.6738 1L0.673828 22" stroke="#E7E5E5" stroke-width="2"/>
										</svg>
									</span>
								</span>

							</div>
						</a>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			</div>
	</div>
</section>
