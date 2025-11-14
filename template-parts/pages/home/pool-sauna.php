<section id="section-pool-sauna" class="section-pool-sauna bg-LightGray py-11 md:py-16 xl:pt-24 xl:pb-16">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-4 xl:col-span-5 mb-16 xl:mb-0">
        <p class="title-secondary text-Dark"><?php the_field('pool_sauna_overtitle'); ?></p>
        <h2 class="title-main text-Dark md:pt-5 xl:pt-4 md:mb-7 xl:mb-0"><?php the_field('pool_sauna_title'); ?></h2>
        <p class="text-Dark pt-4 md:pt-0 xl:pt-8 pb-16"><?php the_field( 'pool_sauna_description' ); ?></p>
        <?php
          $link = get_field('pool_sauna_button');
          if ($link):
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary mb-10 md:mb-0 xl:mb-16">
          <?php echo esc_html($link_title); ?>
        </a>
        <?php endif; ?>
      </div>
      <div class="col-span-2 md:col-span-6 xl:col-span-6 col-start-1 md:col-start-1 xl:col-start-7">
        <?php
          $imgHotel1_desktop = get_field('pool_sauna_image');
          if ($imgHotel1_desktop) {
            echo wp_get_attachment_image($imgHotel1_desktop, 'full', false, [
              'class' => 'w-full max-h-[55dvh] md:max-h-[60dvh] xl:max-h-none object-cover',
            ]);
          }
        ?>
      </div>
    </div>
  </div>
</section>