<?php
/**
 * Outro Section in the Hotel Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="outro" class="outro bg-LightGray pt-[2.88rem] pb-[2.94rem] md:pt-[4.19rem] md:pb-[4.25rem] xl:pt-[5.38rem] xl:pb-[5.38rem]">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-1 xl:col-span-5 ">
				<div class="max-w-[14rem] md:max-w-none">
					<h2 class="title-secondary text-Dark "><?php the_field( 'outro_overtitle' ); ?></h2>
				<div class="pt-[1.25rem] md:pt-[0.75rem] xl:pt-[1.87rem]">
					<h3 class="title-main text-Dark"><?php the_field( 'outro_title' ); ?></h3>
				</div>
			</div>
			<div class="xl:col-span-6 pt-[1.22rem] md:pt-[1.86rem] xl:pt-[1.87rem]">
				<div class="xl:max-w-[33.56rem]">
					<p class="body text-Dark "><?php the_field( 'outro_text' ); ?></p>
				</div>
				<?php
				$olink = get_field( 'outro_button' );
				if ( $olink ) :
					$link_url    = $olink['url'];
					$link_title  = $olink['title'];
					$link_target = $olink['target'] ? $olink['target'] : '_self';
					?>
					<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary mb-[2.53rem] mt-[2.5rem] md:mb-[3.76rem] md:mt-[1.86rem] xl:mt-[3.75rem] ">
						<?php echo esc_html( $link_title ); ?>
					</a>
					<?php
				endif;
				?>
				</div>
			</div>
				<!-- RIGHT IMAGE -->
			<div class="md:hidden xl:block col-span-2 md:col-start-1 md:col-span-6 xl:col-start-7 xl:col-span-6 ">
				<?php
				$o_img = get_field( 'outro_image' );
				if ( $o_img ) :
					echo wp_get_attachment_image( $o_img, 'full', false, array( 'class' => 'w-full h-auto' ) );
				endif;
				?>
			</div>
			<div class="hidden md:block xl:hidden col-span-2 md:col-start-1 md:col-span-6 xl:col-start-7 xl:col-span-6 ">
				<?php
				$o_img_t = get_field( 'outro_image_tablet' );
				if ( $o_img_t ) :
					echo wp_get_attachment_image( $o_img_t, 'full', false, array( 'class' => 'w-full h-auto' ) );
				endif;
				?>
			</div>
		</div>
	</div>
</section>
