<section id="section-stay" class="section-stay bg-LightGray pt-[4.94rem] md:pt-[5.69rem] xl:pt-[6.5rem]">
  <div class="theme-container border-t-[1px] border-black border-b-[1px] xl:pb-[6.25rem]">
    <div class="theme-grid">

      <!-- Section title -->
      <div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-4 text-Dark title-main xl:pt-[3.19rem]">
        <h1><?php the_field('stay_title'); ?></h1>
      </div>

      <!-- Repeater rows -->
      <?php if ( have_rows('stay_repeater') ) : ?>
        <?php while ( have_rows('stay_repeater') ) : the_row(); ?>

          <?php
            $title = get_sub_field('title');
            $text  = get_sub_field('text');
            $link  = get_sub_field('button');
          ?>
          <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-5 xl:col-span-8 border-b-[1px] border-Dark last:border-b-0 md:pt-[2.02rem] md:pb-[3.7rem] xl:pt-[3.13rem] xl:pb-[6.25rem]">
            <!-- Inner grid  -->
            <div class="grid grid-cols-2 md:grid-cols-5 xl:grid-cols-8 gap-5">
              <!-- Title column -->
              <div class="col-span-2 md:col-span-2">
                <?php if ( $title ) : ?>
                  <h2 class="text-Dark title-secondary">
                    <?php echo esc_html( $title ); ?>
                  </h2>
                <?php endif; ?>
              </div>

              <!-- Text column -->
              <div class="col-span-2 md:col-start-3 md:col-span-2 xl:col-start-4 xl:col-span-4">
                <?php if ( $text ) : ?>
                  <p class="text-Dark body">
                    <?php echo esc_html( $text ); ?>
                  </p>
                <?php endif; ?>
              </div>
                <?php
                    if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-arrow">
                        <?php echo esc_html($link_title); ?>
                    </a>
                <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>