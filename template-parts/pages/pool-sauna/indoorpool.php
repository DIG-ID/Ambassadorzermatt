<section id="section-indoorpool" class="section-indoorpool bg-LightGray pt-[2.81rem] pb-[2.78rem] md:pb-[3.84rem] md:pt-[3.88rem] xl:pt-[5.75rem] xl:pb-[5.69rem]">
    <div class="theme-container">
        <div class="theme-grid">
            
            <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-6 pt-[2.47rem] md:pt-[11.53rem] xl:pt-0 order-3 md:order-2 xl:order-none">
                <h1 class="text-Dark title-main"><?php the_field('indoor_pool_title')?></h1>
            </div>
            <div class="col-start-1 col-span-2 md:col-span-4 xl:col-start-2 xl:col-span-6 pt-[1.25rem] md:pt-[1.88rem] order-4 md:order-3 xl:order-none">
                <h1 class="text-Dark body"><?php the_field('indoor_pool_text')?></h1>
            </div>
            <div class="col-start-1 col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-5 xl:pt-[3.75rem] order-1 xl:order-none">
                <?php
                    $imgLogo = get_field('indoor_pool_image_left');
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
            <div class="col-start-1 col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-5 pt-[2.56rem] md:pt-0 xl:pt-[12rem] order-2 xl:order-none">
                <?php
                    $imgLogo = get_field('indoor_pool_image_right');
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