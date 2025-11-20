<section id="section-details" class="section-details bg-White xl:pb-32">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-8">
        <?php
          $imgHotel1_desktop = get_field('details_image_main');
          if ($imgHotel1_desktop) {
            echo wp_get_attachment_image($imgHotel1_desktop, 'full', false, [
              'class' => 'w-full object-cover',
            ]);
          }
        ?>
      </div>
    </div>
  </div>
</section>