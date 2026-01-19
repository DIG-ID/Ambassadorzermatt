<?php
/**
 * Ski Section in the Guest Services Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-ski" class="section-ski bg-White pb-24 pt-12 md:pb-36 md:pt-24 xl:pb-40 xl:pt-24">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-7">
      <?php
        $imgSki = get_field('ski_image');
        if ($imgSki) {
          echo wp_get_attachment_image($imgSki, 'full', false, [
            'class' => 'w-full h-auto object-cover max-h-none md:max-h-[425px] xl:max-h-none xl:pr-10 mb-8 md:mb-16 xl:mb-0',
          ]);
        }
      ?>
      </div>
      <div class="col-span-2 md:col-span-6 xl:col-span-5 grid grid-cols-2 md:grid-cols-6 xl:grid-cols-5 gap-x-5">
        <div class="col-span-2 md:col-span-4 xl:col-span-5">
          <h2 class="title-main text-Dark mb-5 md:mb-7"><?php the_field('ski_first_title'); ?></h2>
          <p class="text-Dark mb-8 md:mb-14 xl:mb-24"><?php the_field('ski_first_text'); ?></p>
          <h2 class="title-main text-Dark mb-5 md:mb-7"><?php the_field('ski_second_title'); ?></h2>
          <p class="text-Dark mb-10 md:mb-0 xl:mb-24"><?php the_field('ski_second_text'); ?></p>
        </div>
        <div class="col-span-2 md:col-span-2 xl:col-span-5 block md:flex xl:block flex-col md:items-end md:justify-end pb-0 md:pb-16 xl:pb-0">
        <?php
          $imgBadge = get_field('ski_badge');
          if ($imgBadge) {
            echo wp_get_attachment_image($imgBadge, 'full', false, [
              'class' => 'w-full h-auto max-w-[150px] object-cover mx-auto md:mx-0',
            ]);
          }
        ?>
        </div>
      </div>
    </div>
  </div>
</section>