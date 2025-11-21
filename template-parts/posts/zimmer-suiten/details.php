<section id="section-details" class="section-details bg-White xl:pb-32">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-8 grid grid-cols-2 md:grid-cols-4 xl:grid-cols-8 gap-x-5">
        <div class="col-span-2 md:col-span-6 xl:col-span-8">
          <figure>
          <?php
            $img1 = get_field('details_image_main');
            if ($img1) {
              echo wp_get_attachment_image($img1, 'full', false, [
                'class' => 'w-full object-cover',
              ]);
            }
          ?>
          </figure>
        </div>
        <div class="col-span-2 md:col-span-3 xl:col-span-3 pt-10 xl:pt-24">
          <h2 class="title-main"><?php the_field( 'details_title' ); ?></h2>
        </div>
        <div class="col-span-2 md:col-span-4 xl:col-span-5 pt-10 xl:pt-24">
          <p class="mb-14"><?php the_field( 'details_text' ); ?></p>

          <div class="amenities-list mt-8">
            <?php 
            $terms = get_field('details_amenities');
            if ( $terms ) : ?>
              <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">
                <?php foreach ( $terms as $term ) : 
                  $icon_id = get_field( 'icon', $term );
                  ?>
                  <li class="flex items-center gap-7">
                    <?php if ( $icon_id ) : ?>
                      <span class="amenity-icon w-6 h-6 flex-shrink-0">
                        <?php
                          echo wp_get_attachment_image(
                            $icon_id,
                            'full',
                            false,
                            array(
                              'class' => 'w-full h-full object-contain'
                            )
                          );
                        ?>
                      </span>
                    <?php endif; ?>

                    <span class="amenity-label">
                      <?php echo esc_html( $term->name ); ?>
                    </span>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>

      </div>
      <div class="col-span-2 md:col-span-6 xl:col-span-4">
        <?php
          $img2 = get_field('details_image_secondary');
          if ($img2) {
            echo wp_get_attachment_image($img2, 'full', false, [
              'class' => 'w-full object-cover xl:mt-56',
            ]);
          }
        ?>
      </div>
    </div>
  </div>
</section>