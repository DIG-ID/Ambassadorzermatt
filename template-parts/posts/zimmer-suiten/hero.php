<section id="section-hero" class="section-hero bg-White relative w-full z-10">
  <div class="theme-container">
    <div class="col-span-2 md:col-span-6 xl:col-span-12">
      <?php
      $bg_id = get_field( 'hero_intro_image' );
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
    </div>
  </div>
</section>
<?php get_template_part( 'template-parts/components/booking','bar' ); ?>