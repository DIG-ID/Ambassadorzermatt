<section id="unsere-kuche" class="unsere-kuche bg-Dark pb-[6.26rem] md:pb-[6.32rem] xl:pb-[9.5rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-span-6 xl:col-start- xl:col-span-8 xl:pt-[25.06rem] xl:pb-[4.38rem]">
                    <?php
                        $imgLogo = get_field('unsere_kuche_image_top_left');
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
            <div class=" col-span-2 md:col-span-6 xl:col-start-9 xl:col-span-4">
                    <?php
                        $imgLogo = get_field('unsere_kuche_image_top_right');
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
            <div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-5 xl:pt-[1.94rem]">
                    <?php
                        $imgLogo = get_field('unsere_kuche_image_bottom_left');
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
            <div class=" xl:col-start-7 xl:col-span-5">
                <div class="title-main text-LightGray">
                <h1><?php the_field( 'unsere_kuche_title' ); ?></h1>
                </div>
                <div class="body text-LightGray xl:pt-[1.88rem] ">
                    <p><?php the_field( 'unsere_kuche_text' ); ?></p>
                </div>
                <div class="title-secondary text-LightGray xl:pt-[2.81rem]">
                    <p><?php the_field( 'unsere_kuche_schedule' ); ?></p>
                </div>
            <div class=" xl:pt-[4.69rem] xl:pb-[8.25rem]">
                    <?php
                        $imgLogo = get_field('unsere_kuche_image_bottom_right');
                        $size  = 'full';

                        if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                        $imgLogo,
                        $size,
                        false,
                        [
                        'class'    => 'w-screen max-h-auto',
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