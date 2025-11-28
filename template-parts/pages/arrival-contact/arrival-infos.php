<section id="section-activities" class="section-activities bg-LightGray ">
  <div class="theme-container">
    <div class="theme-grid border-black border-t-[1px]">

      <!-- Section title -->
      <div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-4 text-Dark title-main xl:pt-[2.44rem]">
        <h1><?php the_field('arrival_info_title'); ?></h1>
      </div>

      <!-- Repeater rows -->
      <?php if ( have_rows('arrival_info_repeater') ) : ?>
        <?php while ( have_rows('arrival_info_repeater') ) : the_row(); ?>

          <?php
            $title = get_sub_field('title');
            $text  = get_sub_field('text');
            $link  = get_sub_field('button');
          ?>
          <!-- One row of the list -->
          <?php if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self'; 
          ?>
          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn-arrow-wrapper col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-5 xl:col-span-8 border-b-[1px] border-Dark last:border-b-0 last:pb-[10.94rem] xl:pt-[3.13rem] xl:pb-[6.25rem]">
          <?php else: ?>
          <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-5 xl:col-span-8 border-b-[1px] border-Dark last:border-b-0 last:pb-[10.94rem] xl:pt-[3.13rem] xl:pb-[6.25rem]">
          <?php endif; ?>
          <!-- One row of the list -->
          

            <!-- Inner grid to split title / text -->
            <div class="grid grid-cols-2 md:grid-cols-5 xl:grid-cols-8 gap-5">

              <!-- Title column -->
              <div class="col-span-2 md:col-span-2 xl:col-span-3">
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
                    <div class="btn btn-arrow">
                        <?php echo esc_html($link_title); ?>
                    </div>
                <?php endif; ?>
            </div>
          <?php if ($link): ?>
          </a>
          <?php else: ?>
          </div>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <div class="theme-grid border-black border-t-[1px]">

      <!-- Section title -->
      <div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-4 text-Dark title-main xl:pt-[2.5rem]">
        <h1><?php the_field('arrival_info_title_2'); ?></h1>
      </div>

      <!-- Repeater rows -->
      <?php if ( have_rows('arrival_info_repeater_2') ) : ?>
        <?php while ( have_rows('arrival_info_repeater_2') ) : the_row(); ?>

          <?php
            $title = get_sub_field('title');
            $text  = get_sub_field('text');
            $link  = get_sub_field('button');
          ?>

          <!-- One row of the list -->
          <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-5 xl:col-span-8 border-Dark border-b-[1px] last:border-b-0 last:pb-[7rem] xl:pt-[3.19rem] xl:pb-[6.25rem]">

            <!-- Inner grid to split title / text -->
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