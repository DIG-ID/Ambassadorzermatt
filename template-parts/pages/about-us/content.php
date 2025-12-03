<section id="section-content" class="section-content bg-White pb-[3.75rem] md:pb-[6.25rem] xl:pb-[9.38rem]">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="hidden md:block md:col-span-6 xl:col-span-12">
				<?php
				$img_1 = get_field( 'content_image' );
				if ( $img_1 ) :
					echo wp_get_attachment_image( $img_1, 'full', false, array( 'class' => 'w-full max-h-auto' ) );
				endif;
				?>
			</div>
			<div class="md:hidden col-start-1 col-span-2 ">
				<?php
				$img_1 = get_field( 'content_image' );
				if ( $img_1 ) :
					echo wp_get_attachment_image( $img_1, 'full', false, array( 'class' => 'w-full max-h-auto' ) );
				endif;
				?>
			</div>
			<div class="col-start-1 col-span-2 md:col-span-5 xl:col-span-6 pt-[2.47rem] md:pt-[3.75rem] xl:pt-[1.88rem]">
				<h1 class="title-main text-Dark"><?php the_field( 'content_title' )?></h1>
			</div>
			<div class="col-start-1 col-span-2 md:col-span-4 xl:col-start-1 xl:col-span-5 pt-[1.25rem] md:pt-[1.88rem]">
				<p class="body text-Dark"><?php the_field( 'content_text' )?></p>
			</div>
		</div>
	</div>
</section>
