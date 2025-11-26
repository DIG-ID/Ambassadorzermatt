<section id="section-contact" class="section-contact bg-White pb-[6.25rem] md:pb-[6.53rem] xl:pb-[9.38rem]">
  <div class="theme-container">
    <div class="theme-grid">    
      <?php
      $location = get_field( 'contacts_location' );
      if ( $location ) :
      ?>
        <div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-12 xl:pb-[3.31rem]">
          <div class="acf-map" data-zoom="17" data-zoom-mobile="16">
            <div
              class="marker"
              data-lat="<?php echo esc_attr( $location['lat'] ); ?>"
              data-lng="<?php echo esc_attr( $location['lng'] ); ?>">
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="col-start-1 col-span-2 md:col-span-3">
        <h2 class="title-secundary text-Dark"><?php the_field('contacts_address'); ?></h2>
      </div>

      <div class="col-start-1 col-span-2 md:col-span-4 xl:col-start-5 xl:col-span-4">
        <h2 class="title-secundary text-Dark"><?php the_field('contacts_phone_email'); ?></h2>
      </div>

      <div class="col-start-1 col-span-2 md:col-start-5 md:col-span-2 xl:col-start-10 xl:col-span-3">
        <p class="body text-Dark"><?php the_field('contacts_text'); ?></p>
      </div>
    </div>
  </div>
</section>