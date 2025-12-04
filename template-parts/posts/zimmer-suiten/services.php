<section id="section-services" class="section-services bg-LightGray pt-10 pb-10 md:py-12 xl:pt-20 xl:pb-24">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-5 mb-8 xl:mb-0">
        <p class="title-secondary text-Dark"><?php the_field( 'services_over_title' ); ?></p>
        <h2 class="title-main text-Dark pt-[1.25rem] md:pt-[1.88rem] xl:pt-0"><?php the_field( 'services_title' ); ?></h2>     
      </div>
      <div class="col-span-2 md:col-span-2 xl:col-span-3">
        <p class="text-Dark"><?php the_field( 'services_services_list_1' ); ?></p>
      </div>
      <div class="col-span-2 md:col-span-2 xl:col-span-3">
        <p class="text-Dark"><?php the_field( 'services_services_list_2' ); ?></p>
      </div>
      <div class="col-span-2 md:col-span-4 xl:col-span-5 col-start-1 md:col-start-1 xl:col-start-6 pt-8 xl:pt-14">
        <?php
          $link = get_field('services_button');
          if ($link):
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary">
          <?php echo esc_html($link_title); ?>
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>