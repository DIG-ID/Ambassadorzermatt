<section id="restaurant-carbon" class="restaurant-carbon relative w-full bg-Dark pt-[3.63rem] pb-[3.56rem] md:pt-[4.75rem] md:pb-[4.85rem] xl:pt-[6.63rem] xl:pb-[8.36rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-span-2 xl:col-span-3 md:pt-[19.5rem] xl:pt-[20.06rem] block relative h-full order-3 md:order-none">
                <div class="block relative md:flex justify-end overflow-visible">
                    <?php
                        $imgLogo = get_field('restaurant_carbon_image_left');
                        $size  = 'full';

                        if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                        $imgLogo,
                        $size,
                        false,
                        [
                        'class'    => 'block relative xl:absolute w-full h-auto bleed-left-full',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        ]
                        );
                        }
                    ?>
                </div>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-3 md:col-span-4 xl:col-start-4 xl:col-span-9 relative order-1 md:order-none">
                    <?php
                        $imgLogo = get_field('restaurant_carbon_image_right');
                        $size  = 'full';

                        if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                        $imgLogo,
                        $size,
                        false,
                        [
                        'class'    => 'w-full h-auto bleed-right-full',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        ]
                        );
                        }
                    ?>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-3 md:col-span-4 xl:col-start-5 xl:col-span-5 order-2 md:order-none">
                <div class="title-secondary text-Brown pt-[2.5rem] md:pt-[2.78rem] xl:pt-[3.63rem]">
                    <p><?php the_field( 'restaurant_carbon_overtitle' ); ?></p>
                </div>
                <div class="title-main text-Brown pt-[1.25rem] md:pt-[1.88rem] xl:pt-[1.87rem]">
                    <h1><?php the_field( 'restaurant_carbon_title' ); ?></h1>
                </div>
                <div class="body text-Brown pt-[1.25rem] md:pt-[1.88rem] xl:pt-[1.87rem]">
                    <p><?php the_field( 'restaurant_carbon_text' ); ?></p>
                </div>
                <?php
                    $link = get_field('restaurant_carbon_button');
                    if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary-dark mt-[2.5rem] mb-[2.5rem] md:mt-[3.75rem] md:mb-0 xl:mt-[3.75rem]">
                        <?php echo esc_html($link_title); ?>
                </a>
                    <?php endif;  ?>
            </div>
        </div>
    </div>
</section>