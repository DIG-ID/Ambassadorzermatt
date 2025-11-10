<section id="reional" class="regional bg-Dark pt-[6.12  rem] pb-[6.06rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-span-2 xl:col-span-3 pt-[26.5rem] relative -translate-x-[17.5rem] h-full">
                    <?php
                        $imgLogo = get_field('regional_image_left');
                        $size  = 'full';

                        if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                        $imgLogo,
                        $size,
                        false,
                        [
                        'class'    => 'absolute w-auto max-h-[85.4375rem]',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        ]
                        );
                        }
                    ?>
            </div>
            <div class="col-start-1 col-span-2 md:col-span-2 xl:col-start-4 w-screen relative">
                    <?php
                        $imgLogo = get_field('regional_image_right');
                        $size  = 'full';

                        if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                        $imgLogo,
                        $size,
                        false,
                        [
                        'class'    => 'w-full max-h-[43.19rem]',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        ]
                        );
                        }
                    ?>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-4 xl:col-start-5 xl:col-span-5">
                <div class="title-main text-Brown xl:pt-[6.5rem]">
                    <h1><?php the_field( 'regional_title' ); ?></h1>
                </div>
                <div class="body text-Brown xl:pt-[1.87rem]">
                    <p><?php the_field( 'regional_text' ); ?></p>
                </div>
                <?php
                    $link = get_field('regional_button');
                    if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary-dark xl:mt-[3.75rem]">
                        <?php echo esc_html($link_title); ?>
                </a>
                    <?php endif;  ?>
            </div>
        </div>
    </div>
</section>