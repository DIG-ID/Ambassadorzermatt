<section id="section-tradition" class="section-tradition bg-LightGray relative h-[90dvh] md:min-h-[830] md:max-h-[830] xl:h-[785px] w-full z-20 flex flex-col justify-end md:justify-center">
	<?php
	$bg_id = get_field( 'tradition_image' );
	if ( $bg_id ) :
		echo wp_get_attachment_image( $bg_id, 'full', false, array( 'class' => 'hidden xl:block md:absolute inset-0 w-full h-1/2 md:h-full object-cover -z-10 object-center md:min-h-[440px]' ) );
	endif;
	?>
	<?php
	$bg_id_m = get_field( 'tradition_image_tablet_mobile' );
	if ( $bg_id_m ) :
		echo wp_get_attachment_image( $bg_id_m, 'full', false, array( 'class' => 'block xl:hidden md:absolute inset-0 w-full h-1/2 md:h-full object-cover -z-10 md:min-h-[440px] object-[0%_15%]' ) );
	endif;
	?>
	<div class="bg-[linear-gradient(#F3F3F3,#F3F3F3)] md:bg-[length:70%_100%] xl:bg-[length:50%_100%] bg-right bg-no-repeat pt-8 pb-16 md:py-16 xl:pt-16 xl:pb-12">
		<div class="theme-container">
			<div class="theme-grid">
				<div class="col-span-2 md:col-span-4 xl:col-span-5 col-start-1 md:col-start-3 xl:col-start-8">
					<h2 class="title-main text-Dark"><?php the_field( 'tradition_title' ); ?></h2>
					<p class="text-Dark pt-4 md:pt-0 xl:pt-8 pb-16"><?php the_field( 'tradition_description' ); ?></p>
					<?php
					$blink = get_field( 'tradition_button' );
					if ( $blink ) :
						$link_url = $blink['url'];
						$link_title = $blink['title'];
						$link_target = $blink['target'] ? $blink['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary">
							<?php echo esc_html( $link_title ); ?>
						</a>
						<?php
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
