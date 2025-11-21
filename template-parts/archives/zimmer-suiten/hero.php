<section id="section-hero" class="section-hero relative w-full z-10">
  <?php
  $bg_id = get_field( 'zimmer_suiten_hero_image', 'option' );
  if ( $bg_id ) :
    echo wp_get_attachment_image(
      $bg_id,
      'full',
      false,
      [
        'class' => 'pointer-events-none w-full h-full object-cover object-center min-h-[230px] md:min-h-[440px]',
      ]
    );
  endif;
  ?>
</section>
<?php get_template_part( 'template-parts/components/booking','bar' ); ?>