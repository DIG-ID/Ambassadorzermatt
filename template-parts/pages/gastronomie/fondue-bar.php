<section id="fondue-bar" class="fondue-bar bg-LightGray xl:pb-[9.38rem] xl:pt-[4.56rem]">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-4 xl:col-start-1 xl:col-span-3">
                <div class="title-secondary text-Dark">
                    <p><?php the_field( 'fondue_bar_overtitle' ); ?></p>
                </div>
            </div>
            <div class="xl:col-start-1 xl:col-span-9">
                <div class="title-main text-Dark xl:pt-[1.87rem]">
                    <h1><?php the_field( 'fondue_bar_title' ); ?></h1>
                </div>
            </div>
            <div class="col-start-1 col-span-5">
                <div class="body text-Dark xl:pt-[1.87rem] xl:pb-[3.75rem] xl:max-w-[34.06rem]">
                    <p><?php the_field( 'fondue_bar_text' ); ?></p>
                </div>
            </div>
            <div class="col-start-7 col-span-5">
                <div class="title-secondary text-Dark xl:pt-[1.87rem]   ">
                    <p><?php the_field( 'fondue_bar_dates' ); ?></p>
                </div>
                    <?php
                    $link = get_field('fondue_bar_button');
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
            <div class="col-start-1 col-span-2 md:col-span-2 xl:col-start-1 xl:col-span-12 ">
                    <?php
                        $imgLogo = get_field('fondue_bar_image_full');
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
<div class="theme-grid xl:pt-[9.38rem]">
  <!-- LEFT WRAPPER is its own 6-col grid -->
  <div class="xl:col-start-1 xl:col-span-6">
    <!-- Overtitle + Title (full width of left side) -->
    <div class="xl:col-span-6">
      <div class="title-secondary text-Dark">
        <p><?php the_field('fondue_bar_overtitle_2'); ?></p>
      </div>
      <div class="title-main text-Dark xl:pt-[1.87rem]">
        <h1><?php the_field('fondue_bar_title_2'); ?></h1>
  </div>
    </div>

    <!-- Text + Button (5/6 of the left side) -->
    <div class="xl:col-span-5 xl:pt-[1.87rem]">
      <div class="body text-Dark xl:max-w-[33.56rem]">
        <p><?php the_field('fondue_bar_text_2'); ?></p>
      </div>
        <?php
            $link = get_field('fondue_bar_button_2');
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
      $imgLogo = get_field('fondue_bar_image_half');
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