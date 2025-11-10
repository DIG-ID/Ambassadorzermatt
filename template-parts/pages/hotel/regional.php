<section id="reional" class="regional bg-Dark pt-[3.06rem] pb-[3.06rem] md:pt-[4.25rem] md:pb-[4.25rem] xl:pt-[6.12rem] xl:pb-[20.62rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-span-6 xl:col-start-1 xl:col-span-6 xl:pt-[15.44rem] relative h-full order-4 xl:order-none">
                    <?php
                        $imgLogo = get_field('regional_image_left');
                        $size  = 'full';

                        if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                        $imgLogo,
                        $size,
                        false,
                        [
                        'class'    => 'xl:absolute w-auto max-h-[85.4375rem]',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        ]
                        );
                        }
                    ?>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-7 relative order-1 xl:order-none">
                    <?php
                        $imgLogo = get_field('regional_image_right');
                        $size  = 'full';

                        if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                        $imgLogo,
                        $size,
                        false,
                        [
                        'class'    => 'w-auto max-h-[32.375rem]',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        ]
                        );
                        }
                    ?>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-4 xl:col-start-8 xl:col-span-5 order-2 xl:order-none">
                <div class="title-main text-Brown pt-[2.47rem] md:pt-[3.75rem] xl:pt-[6.5rem]">
                    <h1><?php the_field( 'regional_title' ); ?></h1>
                </div>
                <div class="body text-Brown pt-[1.25rem] md:pt-[1.87rem]">
                    <p><?php the_field( 'regional_text' ); ?></p>
                </div>
                <?php
                    $link = get_field('regional_button');
                    if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary-dark mt-[2.5rem] mb-[2.5rem] md:mt-[3.75rem] md:mb-[3.75rem] xl:mb-[20.62] order-3 xl:order-none">
                        <?php echo esc_html($link_title); ?>
                </a>
                    <?php endif;  ?>
            </div>
        </div>
    </div>
</section>