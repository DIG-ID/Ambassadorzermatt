<?php
/**
 * Komfort Section in the Hotel Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-fondue-content" class="section-fondue-content bg-White xl:pt-11">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12">
                <?php
				$d_image_tl = get_field( 'content_image_full' );
				if ( $d_image_tl ) :
					echo wp_get_attachment_image( $d_image_tl, 'full', false, array( 'class' => 'w-auto h-auto object-cover' ) );
				endif;
				?>
            </div>
            <div class="col-span-2 md:col-span-5 xl:col-span-5 pt-9 md:pt-16 xl:pt-[275px]">
                <h1 class="title-main text-Dark"><?php echo get_field('content_title');?></h1>
            </div>
            <div class="col-span-2 md:col-span-4 xl:col-span-5 pt-7 md:pt-10 xl:pt-[275px]">
                <p class="text-Dark xl:pt-8"><?php echo get_field('content_text');?></p>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-3 md:col-span-4 xl:col-start-7 xl:col-span-6 pt-20 xl:pt-44 pb-28 xl:pb-52">
                <?php
				$d_image_tl = get_field( 'content_image_right' );
				if ( $d_image_tl ) :
					echo wp_get_attachment_image( $d_image_tl, 'full', false, array( 'class' => 'w-auto h-auto object-cover' ));
				endif;
				?>
            </div>
        </div>
        <div class="theme-grid">
			<?php if ( have_rows( 'content_hover' ) ) : ?>
				<div class="col-start-1 xl:col-start-4 col-span-2 md:col-span-6 xl:col-span-6 group grid grid-cols-2 md:grid-cols-6 xl:flex flex-row xl:min-h-[546px] xl:max-h-[546px] overflow-visible gap-5 mb-24 xl:mb-36 " aria-label="<?php esc_attr_e( 'Highlight menu', 'ambassador' ); ?>">
					<?php while ( have_rows( 'content_hover' ) ) : the_row();
						$image_id = get_sub_field('image');
						$desc     = get_sub_field('text');
						$link     = get_sub_field('link');
						$alt_meta = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
						$alt      = $alt_meta ? esc_attr($alt_meta) : esc_attr($title);
					?>
						<a <?php if (!empty($link)) : ?> href="<?php echo $link; ?>" target="_blank" <?php endif; ?> class="group/item relative col-span-2 md:col-span-6 xl:flex-1 transition-[flex] duration-700 ease-in-out hover:flex-[2] xl:group-hover:[&:not(:hover)]:flex-[1] hover:z-10">
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
											<p class="title-secondary text-LightGray text-center"><?php echo esc_html( $desc ); ?></p>
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