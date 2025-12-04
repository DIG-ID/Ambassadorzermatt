<section class="section-unique-experience bg-LightGray text-DarkGray py-10 md:py-20 xl:pb-24 xl:pt-0">
	<div class="theme-container theme-grid">
		<div class="ski-images-swiper-col col-span-2 md:col-span-6 xl:col-span-12 flex flex-col gap-y-8">
			<?php
        $slider = get_field( 'unique_experience_gallery' );
        if ( $slider ) :
          ?>
          <div class="relative group">
            <div class="swiper ski-images-swiper">
              <div class="swiper-wrapper">
                <?php
                $counter = 0;

                foreach ( $slider as $slider_id ) :
                  $image_url = wp_get_attachment_image_url( $slider_id, 'full' );
                  $image_alt = get_post_meta( $slider_id, '_wp_attachment_image_alt', true );
                  ?>
                  <div class="swiper-slide overflow-hidden">
                    <div class="block h-full">
                      <div class="slide-bg slide-bg--<?php echo esc_attr( $counter ); ?> w-full min-h-[400px] md:min-h-[574px] bg-cover bg-no-repeat bg-[80%] transition-transform duration-500 ease-out xl:group-hover:scale-[1.04]" style="background-image: url('<?php echo esc_url( $image_url ); ?>');"></div>
                    </div>
                  </div>
                  <?php
                  $counter++;
                endforeach;
                ?>
              </div>
            </div>
          </div>
          <?php
        endif;
        ?>

        <div class="controls relative min-h-8 max-w-24 flex flex-row justify-between items-center mx-auto z-10 mt-8">
          <div class="swiper-button-prev mr-7"></div>
          <div class="swiper-button-next ml-7"></div>
        </div>
      </div>

		
		<div class="col-span-2 md:col-span-4 xl:col-span-6 pt-10 md:pt-14">
			<h2 class="title-main text-Dark mb-5 md:mb-8"><?php the_field( 'unique_experience_title' ); ?></h2>
			<p class="font-noto body text-Dark"><?php the_field( 'unique_experience_description' ); ?></p>
		</div>
	</div>
</section>