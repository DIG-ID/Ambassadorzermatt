<?php
/**
 * Gastronomie Section in the Home Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-gastronomie" class="section-gastronomie bg-Dark py-11 md:py-24 xl:py-24">
	<div class="theme-container md:mb-14 xl:mb-0">
		<div class="theme-grid">
			<div class="col-span-2 md:col-span-6 xl:col-span-10 col-start-1 md:col-start-1 xl:col-start-2">
				<h2 class="title-secondary text-LightGray"><?php the_field('gastronomie_overtitle'); ?></h2>
			</div>
			<div class="col-span-2 md:col-span-6 xl:col-span-5 col-start-1 md:col-start-1 xl:col-start-2">
				<h3 class="title-main text-LightGray md:pt-5 xl:pt-4 md:mb-7 xl:mb-0"><?php the_field('gastronomie_title'); ?></h3>
			</div>
			<div class="col-span-2 md:col-span-4 xl:col-span-5">
				<p class="text-LightGray pt-4 md:pt-0 xl:pt-8 pb-10"><?php the_field( 'gastronomie_description' ); ?></p>
				<?php
					$link = get_field('gastronomie_button');
					if ($link):
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary-dark mb-12 md:mb-0 xl:mb-16">
					<?php echo esc_html($link_title); ?>
				</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="theme-container xl:pt-28">
		<div class="theme-grid">
		<?php if ( have_rows('hover_gastronomie') ) : ?>
			<div class="col-start-1 xl:col-start-2 col-span-2 md:col-span-6 xl:col-span-10 group grid grid-cols-2 md:grid-cols-6 xl:flex flex-wrap xl:flex-nowrap xl:flex-row md:min-h-[90dvh] xl:min-h-[546px] xl:max-h-[546px] overflow-visible gap-5 md:gap-6 xl:gap-5" aria-label="<?php esc_attr_e('Highlight menu', 'ambassador'); ?>"
			>
				<?php while ( have_rows('hover_gastronomie') ) : the_row();
					$image_id = get_sub_field('image');
					$desc     = get_sub_field('text');
					$link     = get_sub_field('link');
					$alt_meta = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
					$alt      = $alt_meta ? esc_attr($alt_meta) : esc_attr($title);
				?>
					<a href="<?php echo $link; ?>" class="group/item col-span-2 md:col-span-6 relative md:flex-1 transition-[flex] duration-700 ease-in-out xl:hover:flex-[2] xl:group-hover:[&:not(:hover)]:flex-[1] hover:z-10">
						<div class="xl:absolute left-0 right-0 bottom-0 top-0 z-0 transition-[top] duration-700 xl:group-hover/item:-top-[40px] xl:will-change-[top]">
							<?php
								if ( $image_id ) {
									echo wp_get_attachment_image(
										$image_id, 'full', false,
										array(
											'class' => 'md:absolute max-h-[200px] md:max-h-none inset-0 w-full h-full object-cover origin-bottom',
											'alt'   => $alt,
										)
									);
								}
							?>

							<span class="dark-overlay pointer-events-none absolute inset-0 opacity-80 xl:opacity-0 transition-opacity duration-700 group-hover/item:opacity-80 z-10"></span>

							<span class="pointer-events-none absolute inset-0 flex flex-col justify-end items-left xl:items-center opacity-100 xl:opacity-0 transition-opacity duration-700 group-hover/item:opacity-100 z-20 pb-6 md:pb-8">
								<span class="max-w-[38ch] min-w-[38ch] text-left xl:text-center text-white px-6 opacity-100 translate-y-2 transition-all duration-700 group-hover/item:opacity-100 group-hover/item:translate-y-0">
									<?php if ( $desc ) : ?>
										<h4 class="block title-secondary text-LightGray !font-bold">
											<?php echo $desc; ?>
										</h4>
									<?php endif; ?>
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