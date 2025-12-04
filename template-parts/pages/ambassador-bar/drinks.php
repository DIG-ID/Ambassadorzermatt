<section id="section-drinks" class="section-drinks bg-LightGray pt-[3.09rem] md:pt-[7.06rem] xl:pt-[5.87rem] pb-[3.1rem] md:pb-[7.12rem] xl:pb-[9.44rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-span-4 xl:col-span-8">
                <div class="image-wrapper hidden xl:block">
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
                </div>
                <div class="image-wrapper block xl:hidden">
                <?php
                    $imgLogo = get_field('drinks_image_top_left_tablet');
                    $size  = 'full';

                    if ( $imgLogo ) {
                    echo wp_get_attachment_image(
                    $imgLogo,
                    $size,
                    false,
                    [
                    'class'    => 'w-full max-h-auto min-h-[411px] md:min-h-[616px]',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                    ]
                    );
                    }
                ?>
                </div>
                <div class="block md:hidden col-start-1 col-span-2 pt-[1.87rem]">
                <?php
                    $imgLogo = get_field('drinks_image_top_right_mobile');
                    $size  = 'full';

                    if ( $imgLogo ) {
                    echo wp_get_attachment_image(
                    $imgLogo,
                    $size,
                    false,
                    [
                    'class'    => 'w-full h-auto max-h-[376px] object-cover',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                    ]
                    );
                    }
                ?>
                </div>
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
            <div class="hidden md:block col-start-1 col-span-2 md:col-start-5 xl:col-start-9 xl:col-span-4 pt-[1.87rem] md:pt-[15.25rem] xl:pt-[20.125rem] order-2">
                <?php
                    $imgLogo = get_field('drinks_image_top_right');
                    $size  = 'full';

                    if ( $imgLogo ) {
                    echo wp_get_attachment_image(
                    $imgLogo,
                    $size,
                    false,
                    [
                    'class'    => 'w-full h-auto max-h-[376px] md:min-h-[617px] xl:min-h-[814px] object-cover',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                    ]
                    );
                    }
                ?>
            </div>
        </div>
    </div> 
    <!-- ========================================================= -->
    <!-- SECOND GRID — FULLY COMMENTED OUT (NOT REMOVED)          -->
    <!-- ========================================================= -->

    <!--
    <div class="theme-container pt-[5.19rem] md:pt-[7.75rem] xl:pt-[11.38rem]">
        <div class="theme-grid">
        <?php if ( have_rows('drinks_hover') ) : ?>
          <div class="col-start-1 xl:col-start-2 col-span-2 md:col-span-6 xl:col-span-10 group grid grid-cols-2 md:grid-cols-6 xl:flex flex-row xl:h-[80vh] xl:max-h-[546px] overflow-visible gap-5" aria-label="<?php esc_attr_e('Highlight menu', 'ambassador'); ?>">
            <?php while ( have_rows('drinks_hover') ) : the_row();
              $image_id = (int) get_sub_field('image');
              $desc     = (string) get_sub_field('text');
              $alt_meta = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
              $alt      = $alt_meta ? esc_attr($alt_meta) : esc_attr($title);
            ?>
              <div class="group/item relative col-span-1 md:col-span-3 xl:flex-1 transition-[flex] duration-700 ease-in-out hover:xl:flex-[2] xl:group-hover:[&:not(:hover)]:flex-[1] hover:z-10">
                <div class="xl:absolute left-0 right-0 bottom-0 top-0 z-0 transition-[top] duration-700 xl:group-hover/item:-top-[40px] xl:will-change-[top]">
                  <?php
                    if ( $image_id ) {
                      echo wp_get_attachment_image(
                        $image_id, 'full', false,
                        [
                          'class'         => 'xl:absolute inset-0 max-h-[235px] md:max-h-[550px] xl:max-h-none w-full h-full object-cover origin-bottom',
                          'alt'           => $alt,
                          'loading'       => 'lazy',
                        ]
                      );
                    }
                  ?>

                  <span class="dark-overlay pointer-events-none absolute inset-0 opacity-80 xl:opacity-0 transition-opacity duration-700 group-hover/item:opacity-80 z-10"></span>

                  <span class="pointer-events-none absolute inset-0 flex flex-col justify-end items-center opacity-100 xl:opacity-0 transition-opacity duration-700 group-hover/item:opacity-100 z-20 pb-6 md:pb-8">
                    <span class="max-w-[38ch] min-w-[38ch] text-center text-white px-6 opacity-100 xl:opacity-0 translate-y-2 transition-all duration-700 group-hover/item:opacity-100 group-hover/item:translate-y-0">
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
    -->

</section>