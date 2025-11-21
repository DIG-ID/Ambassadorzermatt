<section class="section-inspiration bg-Dark text-LightGray py-12 md:py-20 xl:py-24">
	<div class="theme-container theme-grid">
		<div class="col-span-2 md:col-span-3 xl:col-span-7">
			<figure class="relative overflow-hidden mb-10 md:mb-16 xl:mb-10 md:-mr-4 xl:mr-10 ">
				<?php
				$in_image = get_field( 'inspiration_image_1' );
				if ( $in_image ) :
					echo wp_get_attachment_image( $in_image, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[411px] md:min-h-[610px] xl:min-h-[807px]' ) );
				endif;
				?>
			</figure>
			<h2 class="title-main text-LightGray mb-5 md:mb-8 max-w-[201px] md:max-w-[400px] md:-mr-32 xl:mr-0"><?php the_field( 'inspiration_title' ); ?></h2>
			<p class="font-noto body text-LightGray mb-10 md:mb-0 md:max-w-[560px] xl:max-w-[540px] md:-mr-32 xl:mr-0"><?php the_field( 'inspiration_description' ); ?></p>
		</div>
		<div class="col-span-2 md:col-span-3 xl:col-span-5">
			<div class="relative md:ml-4 xl:ml-0 md:translate-y-12 xl:mt-16 xl:-mr-[4vw]">
				<figure class="relative overflow-hidden mb-9 md:mb-6 xl:mb-20">
					<?php
					$in_image2 = get_field( 'inspiration_image_2' );
					if ( $in_image2 ) :
						echo wp_get_attachment_image( $in_image2, 'full', false, array( 'class' => 'w-full h-full object-cover min-h-[411px] md:min-h-[360px] xl:min-h-[477px]' ) );
					endif;
					?>
				</figure>
				<figure class="relative overflow-hidden">
					<?php
					$in_image3 = get_field( 'inspiration_image_3' );
					if ( $in_image3 ) :
						echo wp_get_attachment_image( $in_image3, 'full', false, array( 'class' => 'w-full h-full object-cover object-center min-h-[198px] max-h-[198px] md:min-h-[360px] md:max-h-[360px] xl:min-h-[477px] xl:max-h-[477px]' ) );
					endif;
					?>
				</figure>
			</div>

		</div>
	</div>
</section>