<section id="section-details" class="section-details bg-White xl:pb-32">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-8 grid grid-cols-2 md:grid-cols-4 xl:grid-cols-8 gap-x-5">
        <div class="col-span-2 md:col-span-6 xl:col-span-8">
          <figure>
          <?php
            $img1 = get_field('details_image_main');
            if ($img1) {
              echo wp_get_attachment_image($img1, 'full', false, [
                'class' => 'w-full object-cover',
              ]);
            }
          ?>
          </figure>
        </div>
        <div class="col-span-2 md:col-span-3 xl:col-span-3 xl:pt-10">
          <h2 class="title-main"><?php the_field( 'details_title' ); ?></h2>
        </div>
        <div class="col-span-2 md:col-span-4 xl:col-span-5 xl:pt-10">
          <p><?php the_field( 'details_text' ); ?></p>
        </div>
      </div>
      <div class="col-span-2 md:col-span-6 xl:col-span-4">
        <?php
          $img2 = get_field('details_image_secondary');
          if ($img2) {
            echo wp_get_attachment_image($img2, 'full', false, [
              'class' => 'w-full object-cover xl:mt-56',
            ]);
          }
        ?>
      </div>
    </div>
  </div>
</section>