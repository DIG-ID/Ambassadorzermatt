<section id="section-activities" class="section-activities bg-LightGray pt-20 md:pt-24 xl:pt-28">
  <div class="theme-container">
    <div class="theme-grid pb-7 xl:pb-14">
      <div class="col-span-2 md:col-span-6 xl:col-span-8">
        <h2 class="text-Dark title-main mb-4 xl:mb-8"><?php the_field('arrival_info_intro_title'); ?></h2>
      </div>
      <div class="col-span-2 md:col-span-4 xl:col-span-5">
        <p class="text-Dark"><?php the_field( 'arrival_info_intro_text' ); ?></p>
      </div>
    </div>
  </div>
  <div class="theme-container">
    <div class="theme-grid border-black border-t-[1px]">

      <!-- Section title -->
      <div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-4 text-Dark title-main pt-5 md:pt-7 xl:pt-10">
        <h2><?php the_field('arrival_info_title'); ?></h2>
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
          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn-arrow-wrapper col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-5 xl:col-span-8 border-b-[1px] border-Dark last:border-b-0 last:pb-20 md:last:pb-28 pt-10 pb-5 md:pt-8 md:pb-14 xl:pt-12 xl:pb-40">
          <?php else: ?>
          <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-5 xl:col-span-8 border-b-[1px] border-Dark last:border-b-0 last:pb-20 md:last:pb-28 pt-10 pb-5 md:pt-8 md:pb-14 xl:pt-12 xl:pb-40">
          <?php endif; ?>
          <!-- One row of the list -->
          

            <!-- Inner grid to split title / text -->
            <div class="grid grid-cols-8 md:grid-cols-5 xl:grid-cols-8 gap-5">

              <!-- Title column -->
              <div class="col-span-7 md:col-span-2 xl:col-span-3">
                <?php if ( $title ) : ?>
                  <h2 class="text-Dark title-secondary">
                    <?php echo esc_html( $title ); ?>
                  </h2>
                <?php endif; ?>
              </div>
              <?php
                if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
                <div class="col-span-1 md:col-start-5 xl:col-start-8 btn btn-arrow block md:hidden">
                    <?php echo esc_html($link_title); ?>
                </div>
              <?php endif; ?>
              <!-- Text column -->
              <div class="col-span-8 md:col-start-3 md:col-span-2 xl:col-start-4 xl:col-span-4">
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
                <div class="col-span-1 md:col-start-5 xl:col-start-8 btn btn-arrow !hidden md:!block">
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
      <div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-4 text-Dark title-main pt-5 md:pt-7 xl:pt-10">
        <h2><?php the_field('arrival_info_title_2'); ?></h2>
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
           <?php if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self'; 
          ?>
          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn-arrow-wrapper col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-5 xl:col-span-8 border-Dark border-b-[1px] last:border-b-0 last:pb-20 md:last:pb-28 pt-10 pb-5 md:pt-8 md:pb-14 xl:pt-12 xl:pb-40">
          <?php else: ?>
          <div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-5 xl:col-span-8 border-Dark border-b-[1px] last:border-b-0 last:pb-20 md:last:pb-28 pt-10 pb-5 md:pt-8 md:pb-14 xl:pt-12 xl:pb-40">
          <?php endif; ?>

            <!-- Inner grid to split title / text -->
            <div class="grid grid-cols-8 md:grid-cols-5 xl:grid-cols-8 gap-5">

              <!-- Title column -->
              <div class="col-span-7 md:col-span-2">
                <?php if ( $title ) : ?>
                  <h2 class="text-Dark title-secondary">
                    <?php echo esc_html( $title ); ?>
                  </h2>
                <?php endif; ?>
              </div>
              <?php
                if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
                <div class="col-span-1 btn btn-arrow block md:hidden">
                    <?php echo esc_html($link_title); ?>
                </div>
              <?php endif; ?>
              <!-- Text column -->
              <div class="col-span-8 md:col-start-3 md:col-span-2 xl:col-start-4 xl:col-span-4">
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
                <div class="md:col-start-5 xl:col-start-8 btn btn-arrow !hidden md:!block">
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
  </div>
</section>