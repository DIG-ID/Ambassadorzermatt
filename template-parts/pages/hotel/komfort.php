<section id="Komfort" class="Komfort bg-LightGray pt-[2.19rem] md:pt-[5.81rem] md:pb-[5.75rem] xl:pt-[5.56rem] xl:pb-[5.63rem]">
    <div class="theme-container">
        <div class="theme-grid">

            <!-- TEXT + BUTTON -->
            <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-6 order-1 md:order-none">
                <div class="title-main text-Dark">
                    <h1><?php the_field( 'komfort_title' ); ?></h1>
                </div>

                <div class="xl:grid xl:grid-cols-6 xl:gap-x-5">
                    <div class="xl:col-span-5">
                        <div class="body text-Dark pt-[1.25rem] md:pt-[1.87rem] xl:pt-[1.87rem]">
                            <?php the_field( 'komfort_text' ); ?>
                        </div>

                        <?php
                            $link = get_field('komfort_button');
                            if ($link):
                                $link_url    = $link['url'];
                                $link_title  = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <a href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>"
                               class="btn btn-primary mb-[2.44rem] md:mb-[3.75rem] xl:mb-0 mt-[2.5rem] md:mt-[3.75rem] xl:mt-[4.1875rem]">
                                <?php echo esc_html($link_title); ?>
                            </a>
                        <?php endif; ?>

                        <!-- LEFT IMAGE (desktop only, sits under content) -->
                        <div class="hidden xl:block pb-[2.25rem] xl:pt-[8.62rem] relative col-start-1 col-span-2 md:col-start-1 md:col-span-5 xl:col-start-1 xl:col-span-5">
                            <?php
                                $imgLogo = get_field('komfort_image_left');
                                $size    = 'full';

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

            <!-- RIGHT IMAGE  -->
            <div class="col-start-2 col-span-1 md:col-start-5 md:col-span-2 xl:col-start-8 xl:col-span-5 relative pb-[1.25rem] md:pb-0 order-2 md:order-none md:pt-[11.53rem] xl:pt-0 hidden md:block">
                <?php
                    $imgLogo = get_field('komfort_image_right');
                    $size    = 'full';

                    if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                            $imgLogo,
                            $size,
                            false,
                            [
                                'class'    => 'relative md:w-full xl:w-auto md:max-h-[19.94rem] xl:max-h-none h-full object-cover',
                                'loading'  => 'eager',
                                'decoding' => 'async',
                            ]
                        );
                    }
                ?>
            </div>

            <!-- LEFT IMAGE (mobile / tablet) -->
            <div class="block xl:hidden col-start-1 col-span-2 md:col-start-1 md:col-span-5 xl:col-start-2 xl:col-span-5 pb-[2.25rem] pt-8 xl:pt-[8.62rem] order-3 md:order-3">
                <?php
                    $imgLogo = get_field('komfort_image_left');
                    $size    = 'full';

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
</section>