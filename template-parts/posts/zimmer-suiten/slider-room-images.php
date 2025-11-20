<section id="section-details" class="section-details bg-White xl:pb-32">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="room-images-swiper-col col-span-2 md:col-span-6 xl:col-span-12">
        <?php
        $slider = get_field( 'room_images' );
          if ( $slider ) :
            ?>
            <div class="swiper room-images-swiper">
              <div class="swiper-wrapper">
                <?php
                $counter = 0;
                foreach ( $slider as $slider_id ) :
                  ?>
                  <div class="swiper-slide">
                    <div class="slide-bg slide-bg--<?php echo esc_attr( $counter ); ?> w-full min-h-[574px] bg-cover" style="background-image: url('<?php echo esc_url( wp_get_attachment_image_url( $slider_id, 'full' ) ); ?>');background-size: cover; background-repeat: no-repeat;"></div>
                  </div>
                  <?php
                  $counter++;
                endforeach;
                ?>
              </div>
            </div>
            <?php
          endif;
        ?>
        <div class="controls max-w-40 flex flex-row justify-between items-center mx-auto z-10">
          <div class="swiper-button-prev !relative mr-7"></div>
          <div class="swiper-button-next !relative ml-7"></div>
        </div>
      </div>
    </div>
  </div>
</section>