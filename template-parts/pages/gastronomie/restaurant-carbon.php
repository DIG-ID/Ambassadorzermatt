<section id="restaurant-carbon" class="restaurant-carbon bg-Dark pt-[6.63rem] pb-[8.36rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-span-2 xl:col-span-3 pt-[26.5rem] relative -translate-x-[17.5rem] h-full">
                    <?php
                        $imgLogo = get_field('restaurant_carbon_image_left');
                        $size  = 'full';

                        if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                        $imgLogo,
                        $size,
                        false,
                        [
                        'class'    => 'absolute w-auto max-h-[58.89rem]',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        ]
                        );
                        }
                    ?>
            </div>
            <div class="col-start-1 col-span-2 md:col-span-2 xl:col-start-4 w-screen relative">
                    <?php
                        $imgLogo = get_field('restaurant_carbon_image_right');
                        $size  = 'full';

                        if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                        $imgLogo,
                        $size,
                        false,
                        [
                        'class'    => 'w-full max-h-[43.19rem]',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        ]
                        );
                        }
                    ?>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-4 xl:col-start-5 xl:col-span-5">
                <div class="title-secondary text-Brown xl:pt-[3.63rem]">
                    <p><?php the_field( 'restaurant_carbon_overtitle' ); ?></p>
                </div>
                <div class="title-main text-Brown xl:pt-[1.87rem]">
                    <h1><?php the_field( 'restaurant_carbon_title' ); ?></h1>
                </div>
                <div class="body text-Brown xl:pt-[1.87rem]">
                    <p><?php the_field( 'restaurant_carbon_text' ); ?></p>
                </div>
                <?php
                    $link = get_field('restaurant_carbon_button');
                    if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary-dark xl:mt-[3.75rem]">
                        <?php echo esc_html($link_title); ?>
                </a>
                    <?php endif;  ?>
            </div>
        </div>
    </div>
</section>