<section id="section-hero" class="section-hero relative w-full z-10">
  <?php $bg_id  = get_field('zimmer_suiten_hero_image', 'option'); ?>
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
<?php get_template_part( 'template-parts/components/booking','bar' ); ?>