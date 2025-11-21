<section class="section-culinary-and-bar bg-LightGray py-12 md:py-20 xl:py-24">
	<div class="theme-container theme-grid mb-16 md:mb-24 xl:mb-32">
		<div class="col-span-2 md:col-span-6 order-2 xl:order-1">
			<figure class="relative overflow-hidden">
				<?php
				$c_image = get_field( 'culinary_image' );
				if ( $c_image ) :
					echo wp_get_attachment_image( $c_image, 'full', false, array( 'class' => 'w-full h-full object-cover object-[70%_50%] md:object-center xl:object-[70%_50%] min-h-[425px] max-h-[425px] xl:min-h-[823px] xl:max-h-[823px]' ) );
				endif;
				?>
			</figure>
		</div>
		<div class="col-span-2 md:col-span-6 xl:col-span-5 order-1 xl:order-2">
			<h2 class="title-main text-DarkGray mb-5 md:mb-8 xl:max-w-[443px]"><?php the_field( 'culinary_title' ); ?></h2>
			<div class="theme-grid">
				<div class="col-span-2 md:col-span-4 xl:col-span-12">
					<p class="font-noto body text-DarkGray mb-10 md:mb-16 xl:mb-0"><?php the_field( 'culinary_description' ); ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="theme-container theme-grid">
		<div class="col-span-2 md:col-span-6 xl:col-span-5">
			<h2 class="title-main text-DarkGray mb-5 md:mb-8 xl:max-w-[300px]"><?php the_field( 'bar_title' ); ?></h2>
			<div class="theme-grid">
				<div class="col-span-2 md:col-span-4 xl:col-span-12">
					<p class="font-noto body text-DarkGray mb-10 md:mb-16 xl:mb-0"><?php the_field( 'bar_description' ); ?></p>
				</div>
			</div>
		</div>
		<div class="col-span-2 md:col-span-6 xl:col-start-7">
			<figure class="relative overflow-hidden">
				<?php
				$b_image = get_field( 'bar_image' );
				if ( $b_image ) :
					echo wp_get_attachment_image( $b_image, 'full', false, array( 'class' => 'w-full h-full object-cover object-center min-h-[425px] max-h-[425px] xl:min-h-[823px] xl:max-h-[823px]' ) );
				endif;
				?>
			</figure>
		</div>
	</div>
</section>
