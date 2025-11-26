<section id="section-content" class="section-content bg-White pb-[3.75rem] md:pb-[6.25rem] xl:pb-[9.38rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-12">
            <?php
                    $imgLogo = get_field('content_image');
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
            <div class="col-start-1 col-span-2 md:col-span-5 xl:col-span-6 pt-[2.47rem] md:pt-[3.75rem] xl:pt-[1.88rem]">
                <h1 class="title-main text-Dark"><?php the_field('content_title')?></h1>
            </div>
            <div class="col-start-1 col-span-2 md:col-span-4 xl:col-start-1 xl:col-span-5 pt-[1.25rem] md:pt-[1.88rem]">
                <p class="body text-Dark"><?php the_field('content_text')?></p>
            </div>
        </div>
    </div>
</section>