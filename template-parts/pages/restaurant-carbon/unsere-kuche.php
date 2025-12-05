<?php
/**
 * Unsere Kuche Section in the Restaurant Carbon Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="unsere-kuche" class="unsere-kuche bg-Dark pb-[6.26rem] md:pb-[6.32rem] xl:pb-0">
	<div class="theme-container">

		<!-- FIRST GRID: images + title/text/schedule + bottom-right image -->
		<div class="theme-grid">
			<!-- Top left image -->
			<div class="col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-6 md:pt-40 xl:pt-[9.5rem] xl:pb-[4.38rem]">
				<?php
					$imgLogo = get_field('unsere_kuche_image_top_left');
					if ( $imgLogo ) {
						echo wp_get_attachment_image(
							$imgLogo,
							'full',
							false,
							[
								'class'    => 'w-full h-auto object-cover',
								'loading'  => 'eager',
								'decoding' => 'async',
							]
						);
					}
				?>
			</div>

			<!-- Top right image -->
			<div class="col-span-2 md:col-span-3 xl:col-start-9 xl:col-span-4 pt-[1.875rem] md:pt-0">
				<figure class="bleed-right-child-alt h-full">
				<?php
					$imgLogo = get_field('unsere_kuche_image_top_right');
					if ( $imgLogo ) {
						echo wp_get_attachment_image(
							$imgLogo,
							'full',
							false,
							[
								'class'    => 'w-full h-auto object-cover max-h-[610px] xl:max-h-[1108px]',
								'loading'  => 'eager',
								'decoding' => 'async',
							]
						);
					}
				?>
				</figure>
			</div>

			<!-- Bottom left image -->
			<div class="col-span-2 xl:col-span-5 pt-[1.87rem] md:pt-[4.06rem] xl:pt-[1.94rem]">
				<figure class="bleed-left-child-alt h-full negative-mt-image">
				<?php
					$imgLogo = get_field('unsere_kuche_image_bottom_left');
					if ( $imgLogo ) {
						echo wp_get_attachment_image(
							$imgLogo,
							'full',
							false,
							[
								'class'    => 'w-full h-full object-cover max-h-[880px]',
								'loading'  => 'eager',
								'decoding' => 'async',
							]
						);
					}
				?>
				</figure>
			</div>

			<!-- Text block (title, text, schedule) + bottom right image -->
			<div class="col-span-2 md:col-start-3 md:col-span-4 xl:col-start-7 xl:col-span-6 md:pt-[4.06rem] xl:pt-36">
				<!-- Title -->
				<div class="title-main text-LightGray pt-[1.85rem] md:pt-0">
					<h2><?php the_field( 'unsere_kuche_title' ); ?></h2>
				</div>

				<!-- Description text -->
				<div class="text-LightGray pt-[1.87rem] xl:pt-[1.88rem] xl:max-w-[537px]">
					<p><?php the_field( 'unsere_kuche_text' ); ?></p>
				</div>

				<!-- Schedule -->
				<div class="title-secondary text-LightGray pt-[1.9rem] md:pt-[1.87rem] xl:pt-[2.81rem]">
					<p><?php the_field( 'unsere_kuche_schedule' ); ?></p>
				</div>

				<!-- Bottom right image -->
				<div class="pt-[1.88rem] md:pt-[4.82rem] xl:pt-[4.69rem]">
					<?php
						$imgLogo = get_field('unsere_kuche_image_bottom_right');
						if ( $imgLogo ) {
							echo wp_get_attachment_image(
								$imgLogo,
								'full',
								false,
								[
									'class'    => 'w-screen h-auto bleed-right-full',
									'loading'  => 'eager',
									'decoding' => 'async',
								]
							);
						}
					?>
				</div>
			</div>
		</div> <!-- /first theme-grid -->
	 
	
		<?php if ( have_rows('unsere_kuche_hover') ) : ?>
			<div class="theme-grid pt-20 md:pt-28 xl:pt-36 !hidden">
				<div class="col-start-1 xl:col-start-2 col-span-2 md:col-span-6 xl:col-span-10 group grid grid-cols-2 md:grid-cols-6 xl:flex flex-col md:flex-row h-[80vh] md:h-[80vh] xl:h-[60vh] overflow-visible gap-5" aria-label="<?php esc_attr_e('Highlight menu', 'ambassador'); ?>">
					
					<?php while ( have_rows('unsere_kuche_hover') ) : the_row();
						$image_id = get_sub_field('image');
						$desc     = get_sub_field('text');
						$link     = get_sub_field('link');
						$alt_meta = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
						$fallback_title = $image_id ? get_the_title($image_id) : '';
						$alt = $alt_meta ? esc_attr($alt_meta) : esc_attr($fallback_title);
					?>
						<a <?php if (!empty($link)) : ?> href="<?php echo $link; ?>" target="_blank" <?php endif; ?> class="group/item relative col-span-2 md:col-span-6 xl:flex-1 transition-[flex] duration-700 ease-in-out hover:flex-[2] group-hover:[&:not(:hover)]:flex-[1] hover:z-10">

							<div class="absolute left-0 right-0 bottom-0 top-0 z-0 transition-[top] duration-700 xl:group-hover/item:-top-[40px] will-change-[top]">

								<?php
									if ( $image_id ) {
										echo wp_get_attachment_image(
											$image_id,
											'full',
											false,
											[
												'class'   => 'absolute inset-0 w-full h-full object-cover origin-bottom',
												'alt'     => $alt,
												'loading' => 'lazy',
											]
										);
									}
								?>

								<?php if (!empty($link)) : ?>
									<span class="dark-overlay pointer-events-none absolute inset-0 opacity-80 xl:opacity-0 transition-opacity duration-700 group-hover/item:opacity-80 z-10"></span>
								<?php endif; ?>

								<?php if (!empty($link)) : ?>
									<span class="pointer-events-none absolute inset-0 flex flex-row justify-between items-end opacity-100 transition-opacity duration-700 group-hover/item:opacity-100 z-20">
										<span class="text-White pl-5 opacity-100 xl:opacity-0 translate-y-0 transition-all duration-700 group-hover/item:opacity-100 xl:group-hover/item:translate-y-6 pb-6 md:pb-11">
											<?php if ( $desc ) : ?>
												<p class="title-secondary text-LightGray"><?php echo esc_html($desc); ?></p>
											<?php endif; ?>
										</span>
										<span class="pr-5 opacity-100 xl:opacity-0 translate-y-0 transition-all duration-700 group-hover/item:opacity-100 xl:group-hover/item:translate-y-6 pb-6 md:pb-12">
											<svg xmlns="http://www.w3.org/2000/svg" width="25" height="23" viewBox="0 0 25 23" fill="none">
												<path d="M0.673828 1H23.6738M23.6738 1V22M23.6738 1L0.673828 22" stroke="#E7E5E5" stroke-width="2"/>
											</svg>
										</span>
									</span>
								<?php endif; ?>

							</div>
						</a>
					<?php endwhile; ?>

				</div>
			</div>
		<?php endif; ?>

	</div>
</section>
