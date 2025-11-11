<?php if ( 'full' === get_field( 'hero_section_type' ) ) : ?>
	<section id="section-hero" class="section-hero relative h-[calc(100dvh-98px)] md:h-[calc(100dvh-98px)] w-full z-10">
  <?php $bg_id  = get_field('hero_image'); ?>
  <?php if ( $bg_id ) : ?>
    <picture aria-hidden="true" class="pointer-events-none">
      <source media="(max-width: 767px)" srcset="<?php echo esc_attr(wp_get_attachment_image_srcset( $bg_id, 'hero-mobile' ) ?: wp_get_attachment_image_url( $bg_id, 'hero-mobile' )); ?>" sizes="100vw" />
			<?php echo wp_get_attachment_image(
				$bg_id,
				'full',
				false,
				[
					'class' => 'w-full h-full object-cover',
					'sizes' => '100vw',
				]
			); ?>
    </picture>
  <?php endif; ?>
	
	</section>
<?php else : ?>
	<section id="section-hero" class="section-hero relative w-full z-10">
    <?php $bg_id  = get_field('hero_image'); ?>
		<?php if ( $bg_id ) : ?>
      <picture aria-hidden="true" class="pointer-events-none">
        <source media="(max-width: 767px)" srcset="<?php echo esc_attr(wp_get_attachment_image_srcset( $bg_id, 'hero-mobile' ) ?: wp_get_attachment_image_url( $bg_id, 'hero-mobile' )); ?>" />
        <?php echo wp_get_attachment_image(
          $bg_id,
          'full',
          false,
          [
            'class' => 'w-full h-full object-cover',
            'sizes' => 'full',
          ]
        ); ?>
      </picture>
    <?php endif; ?>
	</section>
<?php endif; ?>
<div id="booking-bar" class="booking-bar hidden xl:block fixed theme-container theme-grid bottom-11 left-1/2 -translate-x-1/2 w-full z-30 mx-auto rounded-full bg-[rgba(118,106,102,0.35)]
            bg-gradient-to-b from-white/10 to-black/10
            backdrop-blur-xl backdrop-saturate-150">
    <div class="col-span-12 flex justify-center md:justify-around items-center pt-7 pb-8">
      <a href="<?php the_field( 'general_booking_url','option' ); ?>" target="_blank" class="btn btn-primary-light max-w-56"><?php esc_html_e( 'Jetzt buchen','ambassador' ); ?></a>
      <a href="<?php the_field( 'general_table_reservation_url','option' ); ?>" target="_blank" class="btn btn-primary-light max-w-56"><?php esc_html_e( 'Tisch reservieren','ambassador' ); ?></a>
    </div>
</div>