<section id="fondue" class="fondue bg-LightGray pt-[3rem] md:pt-[6.25rem] xl:pt-[4.56rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-span-3">
                <div class="title-secondary text-Dark">
                    <p><?php the_field( 'fondue_overtitle' ); ?></p>
                </div>
            </div>
            <div class="col-span-2 md:col-span-4 xl:col-start-1 xl:col-span-9">
                <div class="title-main text-Dark pt-[1.25rem] md:pt-[1.86rem] xl:pt-[1.87rem]">
                    <h1><?php the_field( 'fondue_title' ); ?></h1>
                </div>
            </div>
            <div class="col-start-1 col-span-2 md:col-span-4 xl:col-span-5">
                <div class="body text-Dark pt-[1.25rem] md:pt-[1.87rem] xl:pb-[3.75rem] xl:max-w-[34.06rem]">
                    <p><?php the_field( 'fondue_text' ); ?></p>
                </div>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-5 md:col-span-2 xl:col-start-7 xl:col-span-5">
                <div class="title-secondary text-Dark pt-[1.25rem] md:pt-[1.87rem] md:max-w-[10rem] xl:max-w-none">
                    <p><?php the_field( 'fondue_dates' ); ?></p>
                </div>
                <div class="hidden xl:block col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-7 xl:col-span-5">
                <?php
                $link = get_field('fondue_button');
                if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary mb-[2.5rem] mt-[2.5rem] md:mb-[3.75rem] md:mt-[3.75rem] xl:mb-0">
                    <?php echo esc_html($link_title); ?>
            </a>
            <?php endif; ?>
            </div>
            </div>
            <div class="block xl:hidden col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-7 xl:col-span-5">
                <?php
                $link = get_field('fondue_button');
                if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary mb-[2.5rem] mt-[2.5rem] md:mb-[3.75rem] md:mt-[3.75rem] xl:mb-0">
                    <?php echo esc_html($link_title); ?>
            </a>
            <?php endif; ?>
            </div>
            </div>
            <div class="hidden md:block col-span-2 md:col-span-6 xl:col-span-12 ">
                    <?php
                        $imgLogo = get_field('fondue_image_full');
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
            <div class="block md:hidden col-span-2 md:col-span-6 xl:col-span-12 ">
                    <?php
                        $imgLogo = get_field('fondue_image_full_mobile');
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