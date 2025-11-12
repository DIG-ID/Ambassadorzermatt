<section id="section-tradition" class="section-tradition bg-LightGray relative h-[100dvh] md:h-screen w-full z-20 flex flex-col justify-center">
  <picture>
    <source
      media="(max-width: 767px)"
      srcset="<?php echo esc_attr(
        wp_get_attachment_image_srcset( $id, 'hero-mobile' )
        ?: wp_get_attachment_image_url( $id, 'hero-mobile' )
      ); ?>"
      sizes="100vw" />
    <?php echo wp_get_attachment_image(
      get_field('tradition_image'),
      'full',
      false,
      [
        'class'          => 'absolute inset-0 w-full h-full object-cover -z-10',
        'sizes'          => '100vw',
        'fetchpriority'  => 'high',
        'decoding'       => 'async',
      ]
    ); ?>
  </picture>
  <div class="bg-[linear-gradient(#F3F3F3,#F3F3F3)] bg-[length:50%_100%] bg-right bg-no-repeat xl:pt-16 xl:pb-12">
    <div class="theme-container">
      <div class="theme-grid">
        <div class="col-span-2 md:col-span-6 xl:col-span-5 col-start-1 md:col-start-1 xl:col-start-8">
          <h2 class="title-main text-Dark"><?php the_field('tradition_title'); ?></h2>
          <p class="text-Dark pt-4 md:pt-0 xl:pt-8 pb-16"><?php the_field( 'tradition_description' ); ?></p>
          <?php
            $link = get_field('tradition_button');
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