<section class="section-breakfast bg-LightGray py-12 md:py-20 xl:py-24">
	<div class="theme-container theme-grid">
		<div class="col-span-2 md:col-span-6 order-2 xl:order-1">
			<figure class="relative overflow-hidden">
				<?php
				$bf_image = get_field( 'breakfast_image' );
				if ( $bf_image ) :
					echo wp_get_attachment_image( $bf_image, 'full', false, array( 'class' => 'w-full h-full object-cover object-center min-h-[425px] max-h-[425px] xl:min-h-[620px] xl:max-h-[620px]' ) );
				endif;
				?>
			</figure>
		</div>
		<div class="col-span-2 md:col-span-6 xl:col-span-5 order-1 xl:order-2">
			<h2 class="title-main text-Dark mb-5 md:mb-8 xl:max-w-[300px]"><?php the_field( 'breakfast_title' ); ?></h2>
			<div class="theme-grid">
				<div class="col-span-2 md:col-span-4 xl:col-span-12">
					<p class="font-noto body text-Dark mb-10 md:mb-16 xl:mb-0"><?php the_field( 'breakfast_description' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
