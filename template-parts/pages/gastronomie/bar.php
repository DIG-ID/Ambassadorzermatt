<?php
/**
 * Bar Section that appears on Gastronomie Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="bar" class="bar bg-LightGray pt-[2.47rem] pb-[2.84rem] md:pt-[6.22rem] md:pb-[6.25rem] xl:pt-[9.38rem] xl:pb-[9.38rem]">
	<div class="theme-container">
		<div class="theme-grid">
			<!-- Overtitle + Title  -->
			<div class="col-span-2 md:col-span-6">
				<div class="title-secondary text-Dark">
					<h2><?php the_field( 'bar_overtitle' ); ?></h2>
				</div>
				<div class="title-main text-Dark pt-[1.25rem] md:pt-[0.78rem] xl:pt-[1.87rem]">
					<h3><?php the_field( 'bar_title' ); ?></h3>
				</div>
					<!-- Text + Button -->
				<div class="xl:grid xl:grid-cols-6 xl:gap-x-5 col-span-2 md:col-span-4 xl:col-span-6 pt-[1.25rem] md:pt-[1.88rem] xl:pt-[1.87rem]">
					<div class="col-span-2 md:col-span-4 xl:col-span-5">
						<div class="body text-Dark">
							<p><?php the_field( 'bar_text' ); ?></p>
						</div>
						<?php
						$blink = get_field( 'bar_button' );
						if ( $blink ) :
							$link_url    = $blink['url'];
							$link_title  = $blink['title'];
							$link_target = $blink['target'] ? $blink['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary my-[2.5rem] md:my-[3.75rem] xl:mt-[3.75rem]">
								<?php echo esc_html( $link_title ); ?>
							</a>
							<?php
						endif;
						?>
					</div>
				</div>
			</div>
			<!-- RIGHT IMAGE -->
			<div class="block md:hidden xl:block col-start-1 col-span-2 md:col-span-6 xl:col-start-7 xl:col-span-6">
				<?php
				$b_img = get_field( 'bar_image' );
				if ( $b_img ) :
					echo wp_get_attachment_image( $b_img, 'full', false, array( 'class' => 'w-full h-auto' ) );
				endif;
				?>
			</div>
			<div class="hidden md:block xl:hidden col-start-1 col-span-2 md:col-span-6 xl:col-start-7 xl:col-span-6">
				<?php
				$b_img_t = get_field( 'bar_image_tablet' );
				if ( $b_img_t ) :
					echo wp_get_attachment_image( $b_img_t, 'full', false, array( 'class' => 'w-full h-auto' ) );
				endif;
				?>
			</div>
		</div>
	</div>
</section>
