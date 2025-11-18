<?php if ( 'full' === get_field( 'hero_section_type' ) ) : ?>
	<section id="section-hero" class="section-hero relative xl:h-[calc(100dvh-98px)] w-full z-10">
  <?php $bg_id  = get_field('hero_image'); ?>
  <?php if ( $bg_id ) : ?>
    <picture aria-hidden="true" class="pointer-events-none">
      <source media="(max-width: 767px)" srcset="<?php echo esc_attr(wp_get_attachment_image_srcset( $bg_id, 'hero-mobile' ) ?: wp_get_attachment_image_url( $bg_id, 'hero-mobile' )); ?>" sizes="100vw" />
			<?php echo wp_get_attachment_image(
				$bg_id, 'full', false,
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
          $bg_id, 'full', false,
          [
            'class' => 'w-full h-full object-cover',
            'sizes' => 'full',
          ]
        ); ?>
      </picture>
    <?php endif; ?>
	</section>
<?php endif; ?>
<?php get_template_part( 'template-parts/modules/booking','bar' ); ?>