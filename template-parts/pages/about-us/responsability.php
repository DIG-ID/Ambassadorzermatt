<section id="section-responsability" class="section-responsability bg-LightGray pt-[2.28rem] pb-[2.33rem] md:pt-[3.75rem] md:pb-[3.69rem] xl:pt-[5.44rem] xl:pb-[5.37rem]">
	<div class="theme-container">
		<div class="theme-grid">

			<!-- LEFT IMAGE -->
			<div class="col-span-2 md:col-span-5 xl:col-span-8 md:order-1 xl:order-1">
				<?php
				$img_left = get_field( 'responsability_image_left' );
				if ( $img_left ) :
					echo wp_get_attachment_image( $img_left, 'full', false, array( 'class' => 'w-full h-auto object-cover max-h-[198px] md:max-h-[335px] xl:max-h-[807px]' ) );
				endif;
				?>
			</div>

			<!-- RIGHT IMAGE -->
			<div class="col-span-1 col-start-2 md:col-span-2 xl:col-span-4 md:order-3 xl:order-2 hidden md:block">
				<figure class="mt-5 md:mt-7 xl:mt-0 xl:translate-y-96">
					<?php
					$img_right = get_field( 'responsability_image_right' );
					if ( $img_right ) :
						echo wp_get_attachment_image( $img_right, 'full', false, array( 'class' => 'w-full h-full object-cover max-h-[204px] md:max-h-[323px] xl:max-h-[814px] ' ) );
					endif;
					?>
				</figure>
			</div>

			<!-- Title + Text -->
			<div class="col-span-2 md:col-span-4 xl:col-span-5 xl:grid xl:grid-cols-5 md:order-2 xl:order-3">
				<!-- Title -->
				<div class=" xl:col-span-4 pt-[2.48rem] md:pt-[3.79rem] xl:pt-[1.88rem]">
					<h2 class="title-main text-Dark"><?php the_field( 'responsability_title' ); ?></h2>
				</div>

				<!-- Text  -->
				<div class="xl:col-span-5 pt-[1.25rem] md:pt-[1.9rem] xl:pt-[1.88rem]">
					<p class="body text-Dark"><?php the_field( 'responsability_text' ); ?></p>
				</div>
			</div>


		</div>
	</div>
</section>
