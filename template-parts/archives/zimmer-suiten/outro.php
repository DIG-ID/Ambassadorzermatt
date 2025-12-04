<section id="section-outro" class="section-outro bg-LightGray relative md:min-h-[830] md:max-h-[830] xl:h-[785px] w-full z-20 flex flex-col justify-end md:justify-center">
  <picture>
    <?php
    $bgOutro_id = get_field( 'outro_image' );
    if ( $bgOutro_id ) :
      echo wp_get_attachment_image(
        $bgOutro_id,
        'full',
        false,
        [
          'class' => 'md:absolute inset-0 w-full h-1/2 md:h-full object-cover -z-10 object-center md:min-h-[440px]',
        ]
      );
    endif;
    ?>
    <?php
    $bgOutro_id = get_field( 'outro_image_tablet_mobile' );
    if ( $bgOutro_id ) :
      echo wp_get_attachment_image(
        $bgOutro_id,
        'full',
        false,
        [
          'class' => 'md:absolute inset-0 w-full h-1/2 md:h-full object-cover -z-10 object-center md:min-h-[440px]',
        ]
      );
    endif;
    ?>
  </picture>
  <div class="bg-[linear-gradient(#F3F3F3,#F3F3F3)] md:bg-[length:70%_100%] xl:bg-[length:50%_100%] bg-right bg-no-repeat pt-8 pb-16 md:py-16 xl:pt-16 xl:pb-12">
    <div class="theme-container">
      <div class="theme-grid">
        <div class="col-span-2 md:col-span-4 xl:col-span-5 col-start-1 md:col-start-3 xl:col-start-8">
          <h2 class="title-main text-Dark"><?php the_field( 'zimmer_suiten_outro_title', 'option' ); ?></h2>
          <p class="text-Dark pt-4 md:pt-0 xl:pt-8 pb-16"><?php the_field( 'zimmer_suiten_outro_description', 'option' ); ?></p>
          <?php
            $link = get_field( 'zimmer_suiten_outro_button', 'option' );
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
  </div>
</section>