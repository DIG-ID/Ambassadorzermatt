<section id="section-content" class="section-content bg-White text-Dark pb-8 md:pb-8 xl:pb-20">
  <div class="theme-container">
    <?php
    // Query zimmer-suiten posts
    $zimmer_args  = array(
      'post_type'      => 'zimmer-suiten',
      'posts_per_page' => -1,
      'post_status'    => 'publish',
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
    );

    $zimmer_query = new WP_Query( $zimmer_args );

    if ( $zimmer_query->have_posts() ) : ?>
      <ul class="theme-grid xl:[&>li:nth-child(2n+2)]:[--offset:16.25rem] xl:[&>li:nth-child(2n+2)]:mt-[var(--offset)] xl:[&>li:nth-child(2n+2)]:mb-[calc(var(--offset)*-1)] xl:pb-[16.25rem]">
        <?php
        while ( $zimmer_query->have_posts() ) :
          $zimmer_query->the_post();

          // Get custom fields
          $image_field   = get_field( 'hero_intro_image' );
          $description   = get_field( 'overview_small_description' );

          // Support both "ID" and "Image array" return formats
          $image_id = null;
          if ( is_array( $image_field ) && isset( $image_field['ID'] ) ) {
            $image_id = $image_field['ID'];
          } elseif ( is_numeric( $image_field ) ) {
            $image_id = (int) $image_field;
          }

          ?>
          <li class="col-span-6 mb-16 md:mb-20 xl:mb-16">
            <article id="experience-<?php the_ID(); ?>" <?php post_class( 'card card__experience' ); ?>>
              <header class="card-header mb-5 md:mb-8">
                <?php
                if ( $image_id ) :
                  // You can also use wp_get_attachment_image() if you prefer
                  echo '<a href="' . esc_url( get_permalink() ) . '">';
                  echo wp_get_attachment_image(
                    $image_id,
                    'full',
                    false,
                    array(
                      'class' => 'mb-8 max-h-[825px] w-full object-cover xl:object-center min-h-[400px] md:min-h-none md:max-h-none xl:min-h-[825px] xl:max-h-[825px]',
                    )
                  );
                  echo '</a>';
                endif;
                ?>
                <a href="<?php the_permalink(); ?>">
                  <h3 class="title-main"><?php the_title(); ?></h3>
                </a>
              </header><!-- .entry-header -->

              <div class="card-content md:grid md:grid-cols-6">
                <div class="md:col-span-6 xl:col-span-5 mb-10 md:mb-14 xl:mb-12 pt-6 md:pt-9 border-t border-Dark">
                  <div class="overview-description mb-7">
                    <?php
                    if ( $description ) {
                      echo wp_kses_post( $description );
                    } else {
                      the_excerpt();
                    }
                    ?>
                  </div>
                  <div class="overview-features">
                    <div class="flex flex-row items-center gap-7 mb-4">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/features_size.svg" alt="Size" title="Size" class="w-8" />
                      <p><?php the_field( 'overview_size' ); ?></p>
                    </div>
                    <div class="flex flex-row items-center gap-7 mb-4">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/features_bed.svg" alt="Size" title="Size" class="w-8" />
                      <p><?php the_field( 'overview_bed' ); ?></p>
                    </div>
                    <div class="flex flex-row items-center gap-7 mb-4">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/features_occupancy.svg" alt="Size" title="Size" class="w-8" />
                      <p><?php the_field( 'overview_occupancy' ); ?></p>
                    </div>
                  </div>
                </div>

                <div class="md:col-span-4 xl:col-span-5">
                  <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                    <?php esc_html_e( 'Mehr erfahren', 'ambassador' ); ?>
                  </a>
                </div>
              </div>
            </article>
          </li>
        <?php endwhile; ?>
      </ul>
      <?php
      wp_reset_postdata();
    endif;
    ?>
  </div>
</section>
