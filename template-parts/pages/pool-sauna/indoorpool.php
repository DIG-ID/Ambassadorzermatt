<section id="section-indoorpool" class="section-indoorpool bg-LightGray pt-[2.81rem] pb-[2.78rem] md:pb-[3.84rem] md:pt-[3.88rem] xl:pt-[5.75rem] xl:pb-[5.69rem]">
  <div class="theme-container">
    <div class="theme-grid">

      <!-- LEFT IMAGE -->
      <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-5 order-1">
        <?php
          $imgLogo = get_field('indoor_pool_image_left');
          $size    = 'full';

          if ( $imgLogo ) {
            echo wp_get_attachment_image(
              $imgLogo,
              $size,
              false,
              [
                'class'    => 'w-full h-auto',
                'loading'  => 'eager',
                'decoding' => 'async',
              ]
            );
          }
        ?>
        <h2 class="text-Dark title-main hidden md:block xl:hidden pt-[4.83rem]">
          <?php the_field( 'indoor_pool_title' ); ?>
        </h2>
      </div>

      <!-- RIGHT IMAGE -->
      <div class="col-start-1 col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-5 pt-[2.56rem] md:pt-0 xl:pt-0 order-2">
        <?php
          $imgLogo = get_field('indoor_pool_image_right');
          $size    = 'full';

          if ( $imgLogo ) {
            echo wp_get_attachment_image(
              $imgLogo,
              $size,
              false,
              [
                'class'    => 'w-full h-auto',
                'loading'  => 'eager',
                'decoding' => 'async',
              ]
            );
          }
        ?>
      </div>

      <!-- TITLE + TEXT (under left image on desktop, after both images on mobile/tablet) -->
      <div class="col-start-1 col-span-2 md:col-span-4 xl:col-start-2 xl:col-span-5 pb-[1.25rem] md:pb-[1.88rem] pt-[2.47rem] md:pt-0 xl:pt-[3.75rem] order-3">
        <h2 class="text-Dark title-main block md:hidden xl:block">
          <?php the_field( 'indoor_pool_title' ); ?>
        </h2>

        <div class="text-Dark body pt-[1.25rem] md:pt-[1.88rem]">
          <?php the_field( 'indoor_pool_text' ); ?>
        </div>
      </div>

    </div>
  </div>
</section>