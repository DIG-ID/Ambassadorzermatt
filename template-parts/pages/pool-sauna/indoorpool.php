<section id="section-indoorpool" class="section-indoorpool bg-LightGray pt-[2.81rem] pb-[2.78rem] md:pb-[3.84rem] md:pt-[3.88rem] xl:pt-[5.75rem] xl:pb-[5.69rem]">
  <div class="theme-container">
    <div class="theme-grid">

      <?php
      $img_left  = get_field('indoor_pool_image_left');
      $img_right = get_field('indoor_pool_image_right');
      ?>

      <!-- MOBILE/TABLET — Left image -->
      <div class="col-start-1 col-span-2 md:col-span-3 xl:hidden order-1">
        <?php
        if ($img_left) {
          echo wp_get_attachment_image($img_left, 'full', false, [
            'class'   => 'w-full max-h-auto',
            'loading' => 'eager',
            'decoding'=> 'async',
          ]);
        }
        ?>
        <!-- Tablet-only title (sits under left image) -->
        <h2 class="text-Dark title-main md:pt-[5rem] hidden md:block xl:hidden">
          <?php the_field('indoor_pool_title'); ?>
        </h2>
      </div>

      <!-- MOBILE/TABLET — Right image -->
      <div class="col-start-1 col-span-2 md:col-start-4 md:col-span-3 xl:hidden order-2 pt-[2.56rem] md:pt-0">
        <?php
        if ($img_right) {
          echo wp_get_attachment_image($img_right, 'full', false, [
            'class'   => 'w-full max-h-auto',
            'loading' => 'eager',
            'decoding'=> 'async',
          ]);
        }
        ?>
      </div>

      <!-- MOBILE ONLY — Title -->
      <div class="md:hidden col-start-1 col-span-2 order-3 pt-[2.47rem] pb-[1.25rem]">
        <h2 class="text-Dark title-main">
          <?php the_field('indoor_pool_title'); ?>
        </h2>
      </div>

      <!-- MOBILE/TABLET — Text -->
      <div class="col-start-1 col-span-2 md:col-span-4 xl:hidden order-4 md:pt-[1.87rem]">
        <p class="text-Dark body">
          <?php the_field('indoor_pool_text'); ?>
        </p>
      </div>
      
      <!-- DESKTOP — Row 1: Title -->
      <div class="hidden xl:block xl:col-start-2 xl:col-span-6 xl:order-1 pb-[1.88rem]">
        <h2 class="text-Dark title-main">
          <?php the_field('indoor_pool_title'); ?>
        </h2>
      </div>

      <!-- DESKTOP — Row 2: Text block -->
      <div class="hidden xl:block xl:col-start-2 xl:col-span-5 xl:order-2">
        <p class="text-Dark body">
          <?php the_field('indoor_pool_text'); ?>
        </p>

        <!-- DESKTOP — Row 3: Left image directly under text -->
        <div class="hidden xl:block xl:col-start-2 xl:col-span-5 xl:order-3 xl:pt-[3.75rem]">
          <?php
          if ($img_left) {
            echo wp_get_attachment_image($img_left, 'full', false, [
              'class'   => 'w-full h-auto object-cover',
              'loading' => 'eager',
              'decoding'=> 'async',
            ]);
          }
          ?>
        </div>
      </div>

      <!-- DESKTOP — Row 2: Right image aligned with text -->
      <div class="hidden xl:block xl:col-start-8 xl:col-span-5 xl:order-2">
        <?php
        if ($img_right) {
          echo wp_get_attachment_image($img_right, 'full', false, [
            'class'   => 'w-full max-h-auto',
            'loading' => 'eager',
            'decoding'=> 'async',
          ]);
        }
        ?>
      </div>

    </div>
  </div>
</section>