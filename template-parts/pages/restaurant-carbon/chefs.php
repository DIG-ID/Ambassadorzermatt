<section id="chefs" class="chefs bg-Dark xl:pt-[9.38rem] xl:pb-[9.38rem]">
    <div class="theme-container">
        <div class="theme-grid xl:pb-[9.37rem]">
            <div class="col-start-1 xl:col-span-6">
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
            <div class="col-start-1 xl:col-start-7 xl:col-span-5">
                <div class="title-secondary text-LightGray">
                    <h2><?php the_field('chefs_over_title')?></h2>
                </div>
                <div class="title-main text-LightGray xl:pt-[1.87rem]">
                    <h1><?php the_field('chefs_chef_name')?></h1>
                </div>
                <div class="body text-LightGray xl:pt-[1.87rem]">
                    <p><?php the_field('chefs_chef_description')?></p>
                </div>
            </div>
        </div>
        <div class="theme-grid xl:pb-[9.37rem]">
            <div class="col-start-1 xl:col-span-5">
                <div class="title-secondary text-LightGray">
                    <h2><?php the_field('chefs_over_title_2')?></h2>
                </div>
                <div class="title-main text-LightGray xl:pt-[1.87rem]">
                    <h1><?php the_field('chefs_chef_name_2')?></h1>
                </div>
                <div class="body text-LightGray xl:pt-[1.87rem]">
                    <p><?php the_field('chefs_chef_description_2')?></p>
                </div>
            </div>
            <div class="col-start-1 xl:col-start-7 xl:col-span-6">
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