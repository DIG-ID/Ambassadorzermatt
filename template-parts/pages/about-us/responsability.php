<section id="section-responsability" class="section-responsability bg-LightGray pt-[2.28rem] pb-[2.33rem] md:pt-[3.75rem] md:pb-[3.69rem] xl:pt-[5.44rem] xl:pb-[5.37rem]">
  <div class="theme-container">
    <div class="theme-grid">

      <!-- LEFT COLUMN: -->
      <div class="col-start-1 col-span-2 md:col-span-5 xl:col-start-1 xl:col-span-8 grid grid-cols-2 md:grid-cols-5 xl:grid-cols-8 gap-x-5">
        <div class="col-span-2 md:col-span-5 xl:col-span-8">
          <?php
          $img_left = get_field('responsability_image_left');
          if ($img_left) {
              echo wp_get_attachment_image(
              $img_left,
              'full',
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
        <!-- Title -->
        <div class="col-span-2 md:col-span-4 xl:col-span-4 pt-[2.48rem] md:pt-[3.79rem] xl:pt-[1.88rem]">
          <h1 class="title-main text-Dark">
            <?php the_field('responsability_title'); ?>
          </h1>
        </div>

        <!-- Text  -->
        <div class="col-span-2 md:col-span-4 xl:col-span-5 pt-[1.25rem] md:pt-[1.9rem] xl:pt-[1.88rem]">
          <p class="body text-Dark">
            <?php the_field('responsability_text'); ?>
          </p>
        </div>
      </div>

      <!-- RIGHT IMAGE -->
      <div class="col-start-2 col-span-1 md:col-start-5 md:col-span-2 xl:col-start-9 xl:col-span-4 pt-[1.25rem] md:pt-[1.88rem] xl:pt-[25.56rem]">
        <?php
          $img_right = get_field('responsability_image_right');
          if ($img_right) {
            echo wp_get_attachment_image(
              $img_right,
              'full',
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
    </div>
  </div>
</section>