<section id="section-drinks" class="section-drinks bg-LightGray pt-[3.09] md:pt-[7.06rem] xl:pt-[5.87rem] pb-[3.1rem] md:pb-[7.12rem] xl:pb-[9.44rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-span-4 xl:col-span-8">
                <?php
                    $imgLogo = get_field('drinks_image_top_left');
                    $size  = 'full';

                    if ( $imgLogo ) {
                    echo wp_get_attachment_image(
                    $imgLogo,
                    $size,
                    false,
                    [
                    'class'    => 'w-full max-h-auto',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                    ]
                    );
                    }
                ?>
                <div class="title-main text-Dark pt-[2.47rem] md:pt-[3.78rem] xl:pt-[1.88rem]">
                    <h1><?php the_field('drinks_title') ?></h1>
                </div>
                <div class="body text-Dark pt-[1.25rem] md:pt-[1.87rem] xl:max-w-[33.75rem]">
                    <p><?php the_field('drinks_text') ?></p>
                </div>
                <div class="title-secundary text-Dark pt-[1.25rem] md:pt-[1.87rem]">
                    <p><?php the_field('drinks_schedule') ?></p>
                </div>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-5 xl:col-start-9 xl:col-span-4 pt-[1.87rem] md:pt-[22.31rem] xl:pt-[25.87rem]">
                <?php
                    $imgLogo = get_field('drinks_image_top_right');
                    $size  = 'full';

                    if ( $imgLogo ) {
                    echo wp_get_attachment_image(
                    $imgLogo,
                    $size,
                    false,
                    [
                    'class'    => 'w-full max-h-auto',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                    ]
                    );
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="theme-container xl:pt-28">
    <div class="theme-grid">
    <?php if ( have_rows('drinks_hover') ) : ?>
      <div class="col-start-1 xl:col-start-2 col-span-2 md:col-span-6 xl:col-span-10 group flex flex-row h-[80vh] md:h-[70vh] max-h-[264px] md:max-h-[340px] xl:max-h-[546px] overflow-visible gap-[20px]" aria-label="<?php esc_attr_e('Highlight menu', 'ambassador'); ?>"
      >
        <?php while ( have_rows('drinks_hover') ) : the_row();
          $image_id = (int) get_sub_field('image');
          $desc     = (string) get_sub_field('text');
          $alt_meta = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
          $alt      = $alt_meta ? esc_attr($alt_meta) : esc_attr($title);
        ?>
          <div class="group/item relative flex-1 transition-[flex] duration-700 ease-in-out hover:flex-[2] group-hover:[&:not(:hover)]:flex-[1] hover:z-10">
            <div class="absolute left-0 right-0 bottom-0 top-0 z-0 transition-[top] duration-700 group-hover/item:-top-[40px] will-change-[top]">
              <?php
                if ( $image_id ) {
                  echo wp_get_attachment_image(
                    $image_id, 'full', false,
                    array(
                      'class'         => 'absolute inset-0 w-full h-full object-cover origin-bottom',
                      'alt'           => $alt,
                      'loading'       => 'lazy',
                    )
                  );
                }
              ?>

              <!-- Dark overlay (below text, below icon) -->
              <span class="dark-overlay pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-700 group-hover/item:opacity-80 z-10"></span>

              <!-- Text overlay (bottom, fades in on hover) -->
              <span class="pointer-events-none absolute inset-0 flex flex-col justify-end items-center opacity-0 transition-opacity duration-700 group-hover/item:opacity-100 z-20 pb-6 md:pb-8">
                <span class="max-w-[38ch] min-w-[38ch] text-center text-white px-6 opacity-0 translate-y-2 transition-all duration-700 group-hover/item:opacity-100 group-hover/item:translate-y-0">
                  <?php if ( $desc ) : ?>
                    <span class="block title-secondary text-LightGray !font-bold">
                      <?php echo $desc; ?>
                    </span>
                  <?php endif; ?>
                </span>
              </span>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    </div>
  </div>
</section>