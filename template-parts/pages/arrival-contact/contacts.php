<section id="section-contact" class="section-contact bg-White pb-24 md:pb-24 xl:pb-36">
  <div class="theme-container">
    <div class="theme-grid">    
      <?php
      $location = get_field( 'contacts_location' );
      if ( $location ) :
      ?>
        <div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-12 pb-10 md:pb-8 xl:pb-12">
          <div class="acf-map" data-zoom="17" data-zoom-mobile="16">
            <div
              class="marker"
              data-lat="<?php echo esc_attr( $location['lat'] ); ?>"
              data-lng="<?php echo esc_attr( $location['lng'] ); ?>">
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="col-start-1 col-span-2 md:col-span-4 xl:col-span-9 grid grid-cols-2 md:grid-cols-4 xl:grid-cols-9 gap-x-5">
        <div class="col-start-1 col-span-2 md:col-span-4 xl:col-span-3">
          <p class="title-secundary text-Dark"><?php the_field('contacts_address'); ?></p>
        </div>

        <div class="col-start-1 col-span-2 md:col-span-4 xl:col-start-5 xl:col-span-5 pt-5 md:pt-0">
          <p class="title-secundary text-Dark">
            <span><?php esc_html_e( 'Telefon: ' ); ?></span><a href="tel:<?php echo get_field( 'general_phone', 'option' ); ?>"><?php the_field( 'general_phone', 'option' ); ?></a></p>
          <p class="title-secundary text-Dark">
            <?php 
              $email = get_field( 'general_e-mail', 'option' );
              $safe_email = antispambot( $email );
            ?>
            <span><?php esc_html_e( 'E-Mail: ' ); ?><a href="mailto:<?php echo $safe_email; ?>"><?php echo $safe_email; ?></a>
          </p>
        </div>
      </div>
      <div class="col-start-1 col-span-2 md:col-start-5 md:col-span-2 xl:col-start-10 xl:col-span-3 pt-5 md:pt-0">
        <p class="body text-Dark"><?php the_field('contacts_text'); ?></p>
      </div>
    </div>
  </div>
</section>