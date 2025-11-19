<section id="diversity" class="diversity bg-White pb-[3.74rem] xl:pb-[9.37rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="cols-start-1 col-span-2 md:col-span-2 xl:col-span-5 pt-[1.25rem] md:pt-[14.44rem] xl:pt-[21.12rem] order-2 md:order-none">
                <?php
                    $imgLogo = get_field('diversity_image_top_left');
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
            <div class="col-span-2 md:col-start-3 md:col-span-4 xl:col-start-6 xl:col-span-7 order-1 md:order-none pt-[1.25rem]">
                <?php
                    $imgLogo = get_field('diversity_image_top_right');
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
                <div class="col-start-1 col-span-5 xl:col-start-6 order-3 md:order-none">
                    <div class="title-main text-Dark pt-[2.51rem] md:pt-[1.23rem] xl:pt-[3.13rem]">
                        <h1><?php the_field('diversity_title')?></h1>
                    </div>
                    <div class="title-secondary text-Dark pt-[1.25rem] md:pt-[1.87rem] xl:pt-[3.75rem]">
                        <h2><?php the_field('diversity_schedule')?></h2>
                    </div>
                </div>
            </div>
            <div class="col-span-2 md:col-span-6 xl:col-span-12 pt-[2.49rem] md:pt-[3.75rem] xl:pt-[5.69rem] order-4 md:order-none">
            <?php
                $imgLogo = get_field('diversity_image_bottom');
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
</section>