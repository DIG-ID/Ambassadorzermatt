<section id="chefs" class="chefs bg-Dark pt-[6.25rem] xl:pt-36">
    <div class="theme-container">
        <div class="theme-grid md:pb-[6.85rem] xl:pb-[9.37rem]">
            <div class="col-span-2 xl:col-span-6 pt-[3.74rem] md:pt-0 order-2 md:order-none">
                <?php
                    $imgLogo = get_field('chefs_chef_image');
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
            <div class="col-span-2 md:col-start-3 md:col-span-4 xl:col-start-7 xl:col-span-5 order-1 md:order-none">
                <div class="title-secondary text-LightGray">
                    <h2><?php the_field('chefs_over_title')?></h2>
                </div>
                <div class="title-main text-LightGray pt-[1.88rem] md:pt-[1.36rem] xl:pt-[1.87rem]">
                    <h1><?php the_field('chefs_chef_name')?></h1>
                </div>
                <div class="body text-LightGray pt-[1.87rem]">
                    <p><?php the_field('chefs_chef_description')?></p>
                </div>
            </div>
        </div>
        <div class="theme-grid md:pb-[6.2rem] xl:pb-[9.37rem] pt-[6.23rem] md:pt-0">
            <div class="col-span-2 md:col-span-4 xl:col-span-5">
                <div class="title-secondary text-LightGray">
                    <h2><?php the_field('chefs_over_title_2')?></h2>
                </div>
                <div class="title-main text-LightGray pt-[1.88rem] md:pt-[1.36rem] xl:pt-[1.87rem]">
                    <h1><?php the_field('chefs_chef_name_2')?></h1>
                </div>
                <div class="body text-LightGray pt-[1.88rem] md:pt-[1.88rem]">
                    <p><?php the_field('chefs_chef_description_2')?></p>
                </div>
            </div>
            <div class="col-span-2 md:col-span-2 md:col-start-5 xl:col-start-7 xl:col-span-6 pt-[3.77rem] md:pt-0">
                <?php
                    $imgLogo = get_field('chefs_chef_image_2');
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