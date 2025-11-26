<section id="section-sauna" class="section-sauna bg-Dark pt-[2.44rem] pb-[2.38rem] md:pt-[4.25rem] md:pb-[4.25rem] xl:pt-[4.56rem] xl:pb-[4.5rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-span-2 xl:col-start-1 xl:col-span-6 pt-[2.5rem] md:pt-[1.75rem] xl:pt-[29.37rem] order-5 md:order-none">
                <?php
                    $imgLogo = get_field('sauna_image_left');
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
            <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-7 xl:col-span-6 order-1 md:order-none">
                <?php
                    $imgLogo = get_field('sauna_image_top');
                    $size  = 'full';

                    if ( $imgLogo ) {
                    echo wp_get_attachment_image(
                    $imgLogo,
                    $size,
                    false,
                    [
                    'class'    => 'w-full max-h-auto bleed-right-full',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                    ]
                    );
                    }
                ?>
                <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-8 xl:col-span-5 pt-[2.5rem] md:pt-[3.75rem] xl:pt-[6.31rem] order-2 md:order-none">
                    <h1 class="title-main text-LightGray"><?php the_field('sauna_title')?></h1>
                </div>
                <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-8 xl:col-span-5 pt-[1.25rem] md:pt-[1.88rem] order-3 md:order-none">
                    <h1 class="body text-LightGray"><?php the_field('sauna_text')?></h1>
                </div>
                <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-8 xl:col-span-5 pt-[1.25rem] md:pt-[1.88rem] order-4 md:order-none">
                    <h1 class="title-secondary text-LightGray"><?php the_field('sauna_features')?></h1>
                </div>
                <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-8 xl:col-span-5 pt-[2.5rem] md:pt-[3.75rem] xl:pt-[4.06rem] order-6 md:order-none">
                    <?php
                        $imgLogo = get_field('sauna_image_bottom');
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
    </div>
</section>