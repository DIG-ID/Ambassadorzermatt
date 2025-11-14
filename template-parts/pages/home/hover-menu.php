<section id="hover-menu" class="hover-menu bg-White pb-[6.25rem] md:pb-[6.25rem] xl:pb-[9.38rem]">
  <div class="theme-container">
    <div class="theme-grid">
    <?php if ( have_rows('hover_menu') ) : ?>
      <div
        class="col-start-1 xl:col-start-2 col-span-2 md:col-span-6 xl:col-span-10 group flex flex-row h-[80vh] md:h-[80vh] max-h-[240px] md:max-h-[340px] xl:max-h-[546px] overflow-visible gap-1 md:gap-3 xl:gap-5" aria-label="<?php esc_attr_e('Highlight menu', 'ambassador'); ?>"
      >
        <?php while ( have_rows('hover_menu') ) : the_row();
          $image_id = (int) get_sub_field('image');
          $title    = (string) get_sub_field('title');
          $desc     = (string) get_sub_field('description');
          $link     = get_sub_field('link');
          $href     = (is_array($link) && !empty($link['url'])) ? esc_url($link['url']) : '#';
          $target   = (is_array($link) && !empty($link['target'])) ? ' target="'.esc_attr($link['target']).'" rel="noopener"' : '';
          $alt_meta = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
          $alt      = $alt_meta ? esc_attr($alt_meta) : esc_attr($title);
        ?>
          <a href="<?php echo $href; ?>"<?php echo $target; ?>
             class="group/item relative flex-1 transition-[flex] duration-700 ease-in-out hover:flex-[2] group-hover:[&:not(:hover)]:flex-[1] hover:z-10">
            <div class="absolute left-0 right-0 bottom-0 top-0 z-0 transition-[top] duration-700 group-hover/item:-top-[40px] will-change-[top]">
              <?php
                if ( $image_id ) {
                  echo wp_get_attachment_image(
                    $image_id, 'full', false,
                    array(
                      'class'         => 'absolute inset-0 w-full h-full object-cover origin-bottom',
                      'alt'           => $alt,
                      'loading'       => 'lazy',
                    )
                  );
                }
              ?>

              <!-- Dark overlay (below text, below icon) -->
              <span class="dark-overlay pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-700 group-hover/item:opacity-80 z-10"></span>

              <?php
              $icon_id = (int) get_sub_field('icon'); // always ID
              $icon_markup = '';
              if ( $icon_id ) {
                // Optional: derive a decorative alt or keep empty
                $icon_alt = get_post_meta($icon_id, '_wp_attachment_image_alt', true);
                $icon_markup = wp_get_attachment_image(
                  $icon_id, 'full', false,
                  array(
                    'class'         => 'w-full h-10 object-contain',
                    'alt'           => $icon_alt ? esc_attr($icon_alt) : '',
                    'loading'       => 'lazy',
                  )
                );
              }
              ?>

              <!-- ALWAYS visible icon (top, above everything) -->
              <span class="pointer-events-none absolute left-0 right-0 top-0 flex justify-center pt-6 md:pt-8 z-30">
                <span class="w-16 h-16 md:w-20 md:h-20">
                  <?php if ($icon_markup) : ?>
                    <span class="block w-full h-full"><?php echo $icon_markup; ?></span>
                  <?php endif; ?>
                </span>
              </span>

              <!-- Text overlay (bottom, fades in on hover) -->
              <span class="pointer-events-none absolute inset-0 flex flex-col justify-end items-center opacity-0 transition-opacity duration-700 group-hover/item:opacity-100 z-20 pb-6 md:pb-8">
                <span class="max-w-[18ch] min-w-[18ch] md:max-w-[34ch] md:min-w-[34ch] xl:max-w-[38ch] xl:min-w-[38ch] text-center text-white px-6 opacity-0 transition-all duration-700 group-hover/item:opacity-100 group-hover/item:translate-y-0">
                  <?php if ( $title ) : ?>
                    <span class="block title-secondary text-LightGray !font-bold">
                      <?php echo esc_html($title); ?>
                    </span>
                  <?php endif; ?>
                  <?php if ( $desc ) : ?>
                    <span class="block text-LightGray">
                      <?php echo esc_html($desc); ?>
                    </span>
                  <?php endif; ?>
                </span>
              </span>
            </div>
          </a>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    </div>
  </div>
</section>
