 <section id="outro" class="outro bg-LightGray pt-[5.38rem] pb-[5.38rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-4 xl:col-start-1 xl:col-span-5">
                <div class="title-secondary text-Dark">
                    <p><?php the_field('outro_overtitle'); ?></p>
                <div class="title-main text-Dark xl:pt-[1.87rem]">
                    <h1><?php the_field('outro_title'); ?></h1>
                </div>
            </div>
            <div class="xl:col-span-6 xl:pt-[1.87rem]">
                <div class="body text-Dark xl:max-w-[33.56rem]">
                    <p><?php the_field('outro_text'); ?></p>
                </div>
                <?php
                    $link = get_field('outro_button');
                    if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary xl:mt-[3.75rem]">
                        <?php echo esc_html($link_title); ?>
                </a>
                <?php endif; ?>
                </div>
            </div>
                <!-- RIGHT IMAGE -->
            <div class="xl:col-start-7 xl:col-span-6">
                <?php
                $imgLogo = get_field('outro_image');
                if ($imgLogo) {
                    echo wp_get_attachment_image($imgLogo, 'full', false, [
                    'class' => 'w-full h-auto',
                    'loading' => 'eager',
                    'decoding' => 'async',
                    ]);
                }
                ?>
            </div>
        </div>
    </div>
</section>