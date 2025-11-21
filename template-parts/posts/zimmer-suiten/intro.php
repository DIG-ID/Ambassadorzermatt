<section id="section-intro" class="section-intro bg-White pt-10 pb-14 md:pt-14 md:pb-24 xl:pt-24 xl:pb-20">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-4">
                <div class="title-secondary text-Brown">
                    <p><?php the_field( 'hero_intro_over_title' ); ?></p>
                </div>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-5">
              <div class="title-main text-Brown pt-[1.25rem] md:pt-[1.88rem] xl:pt-0">
                <h1><?php the_title(); ?></h1>
              </div>
            </div>
            <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-7 xl:col-span-4">
                <div class="body text-Brown pt-[1.25rem] md:pt-[1.88rem] xl:pt-0">
                    <p class="mb-8"><?php the_field( 'hero_intro_text' ); ?></p>
                    <?php
                      /*$link = get_field('hero_intro_button');
                      if ($link):
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self';*/
                    ?>
                    <a href="<?php the_field( 'general_booking_url', 'option' ); ?>" target="_blank" class="btn btn-primary-brown mb-0">
                      <?php echo esc_html_e('Jetzt buchen','ambassador'); ?>
                    </a>
                    <?php /*endif;*/ ?>
                </div>
            </div>
        </div>
    </div>
</section>