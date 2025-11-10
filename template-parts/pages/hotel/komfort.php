<section id="Komfort" class="Komfort bg-LightGray xl:pt-[5.56rem] xl:pb-[5.63rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-8 xl:col-span-5 self-center">
            <?php
                    $imgLogo = get_field('komfort_image_right');
                    $size  = 'full';

                    if ( $imgLogo ) {
                    echo wp_get_attachment_image(
                    $imgLogo,
                    $size,
                    false,
                    [
                    'class'    => 'w-auto h-full object-cover',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                    ]
                    );
                    }
                ?>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-6">
                <div class="title-main text-Dark">
                    <h1><?php the_field( 'komfort_title' ); ?></h1>
                </div>
                <div class="body text-Dark xl:pt-[1.87rem] xl:max-w-[37.06rem]">
                    <?php the_field( 'komfort_text' ); ?>
                </div>
            </div>
        </div>
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-5">
                <?php
                    $link = get_field('komfort_button');
                    if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary xl:mt-[4.1875rem]">
                        <?php echo esc_html($link_title); ?>
                </a>
                    <?php endif;  ?>
                <div class="xl:pt-[8.62rem] relative">
                    <?php
                        $imgLogo = get_field('komfort_image_left');
                        $size  = 'full';

                        if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                        $imgLogo,
                        $size,
                        false,
                        [
                        'class'    => 'w-auto h-full object-cover',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        ]
                        );
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>