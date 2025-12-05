<?php
$bg_image_id  = get_field( 'erlebnisse_background' );
$bg_image_url = '';

if ( $bg_image_id ) {
	$bg_image_url = wp_get_attachment_image_url( $bg_image_id, 'full' );
}
?>

<section id="section-erlebnisse" class="section-erlebnisse bg-LightGray py-11 md:pt-11 md:pb-16 xl:pt-16 xl:pb-36" <?php if ( $bg_image_url ) : ?> style="background-image: url('<?php echo esc_url( $bg_image_url ); ?>'); background-repeat:no-repeat; background-size:cover; background-position:center top;" <?php endif; ?> >
	<div class="theme-container">
		<div class="theme-grid">
			<div class="col-span-2 md:col-span-6 xl:col-span-12">
				<h2 class="title-secondary text-Dark"><?php the_field( 'erlebnisse_overtitle' ); ?></h2>
				<h3 class="title-main text-Dark md:pt-5 xl:pt-4 md:mb-7 xl:mb-0"><?php the_field( 'erlebnisse_title' ); ?></h3>
			</div>
			<div class="col-span-2 md:col-span-4 xl:col-span-5">
				<p class="text-Dark pt-4 md:pt-0 xl:pt-8 pb-10 md:pb-16 xl:pb-24"><?php the_field( 'erlebnisse_description' ); ?></p>
			</div>
			<div class="col-span-2 md:col-span-6 xl:col-span-12">
				<?php if ( have_rows( 'erlebnisse_activities' ) ) : ?>
					<div class="group grid grid-cols-2 md:flex md:flex-row gap-5 md:gap-5 xl:gap-x-16" aria-label="<?php esc_attr_e( 'Highlight menu', 'ambassador' ); ?>"
					>
						<?php while ( have_rows('erlebnisse_activities') ) : the_row();
							$image_id = (int) get_sub_field('image');
							$title    = (string) get_sub_field('title');
							$link     = get_sub_field('link');
							$href     = (is_array($link) && !empty($link['url'])) ? esc_url($link['url']) : '#';
							$target   = (is_array($link) && !empty($link['target'])) ? ' target="'.esc_attr($link['target']).'" rel="noopener"' : '';
							$alt_meta = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
							$alt      = $alt_meta ? esc_attr($alt_meta) : esc_attr($title);
						?>
							<a href="<?php echo $link; ?>" class="group/item col-span-1 relative md:odd:mt-10 md:even:mb-10 flex duration-700 ease-in-out hover:z-10">
								<div class="z-0">
									<?php
										if ( $image_id ) {
											echo wp_get_attachment_image(
												$image_id, 'full', false,
												array(
													'class'         => 'inset-0 w-full h-full object-cover origin-bottom',
													'alt'           => $alt,
													'loading'       => 'lazy',
												)
											);
										}
									?>

									<!-- Dark overlay (below text, below icon) -->
									<span class="dark-overlay pointer-events-none absolute inset-0 opacity-80 transition-opacity duration-700 hover:opacity-0 z-10"></span>
									<span class="dark-overlay-visible pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-700 group-hover/item:opacity-60 z-10"></span>

									<!-- Text overlay (bottom, fades in on hover) -->
									<span class="pointer-events-none absolute inset-0 flex flex-row justify-between items-end opacity-100 transition-opacity duration-700 group-hover/item:opacity-100 z-20">
										<span class="text-White pl-3 xl:pl-5 opacity-100 translate-y-0 transition-all duration-700 group-hover/item:opacity-100 xl:group-hover/item:translate-y-6 pb-3 xl:pb-11">
											<?php if ( $title ) : ?>
												<h4><?php echo esc_html( $title ); ?></h4>
											<?php endif; ?>
										</span>
										<span class="pr-3 xl:pr-5 opacity-100 xl:opacity-0 translate-y-0 transition-all duration-700 xl:group-hover/item:opacity-100 xl:group-hover/item:translate-y-6 pb-3 xl:pb-12">
											<svg xmlns="http://www.w3.org/2000/svg" width="25" height="23" viewBox="0 0 25 23" fill="none">
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
	</div>
</section>