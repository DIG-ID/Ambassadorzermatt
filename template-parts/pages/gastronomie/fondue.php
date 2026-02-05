<?php
/**
 * Fondue Section that appears on Gastronomie Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="fondue" class="fondue bg-LightGray pt-[3rem] md:pt-[6.25rem] xl:pt-[4.56rem]">
	<div class="theme-container">
		<div class="theme-grid pb-9 md:pb-14 xl:pb-20">
			<div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-span-12">
				<h2 class="title-secondary text-Dark"><?php the_field( 'fondue_overtitle' ); ?></h2>
			</div>
			<div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-6">
				<div class="pt-[1.25rem] md:pt-[1.87rem] xl:pb-[3.75rem] ">
					<h3 class="title-main text-Dark "><?php the_field( 'fondue_title' ); ?></h3>
				</div>
			</div>
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-7 xl:col-span-5">
				<div class="pt-[1.25rem] pb-5 md:pb-0 md:pt-[1.87rem] xl:max-w-none">
					<p class="body text-Dark "><?php the_field( 'fondue_text' ); ?></p>
					<?php if ( get_field( 'fondue_dates' ) ) : ?>
						<p class="title-secondary text-Dark"><?php the_field( 'fondue_dates' ); ?></p>
					<?php endif; ?>
				</div>
				<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-7 xl:col-span-5">
					<?php
					$flink_1 = get_field( 'fondue_button' );
					if ( $flink_1 ) :
						$link_url    = $flink_1['url'];
						$link_title  = $flink_1['title'];
						$link_target = $flink_1['target'] ? $flink_1['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary mb-0 mt-[2.5rem] md:mb-0 md:mt-[3.75rem] xl:mb-0">
							<?php echo esc_html( $link_title ); ?>
						</a>
						<?php
					endif;
					?>
				</div>
			</div>
			
			</div>
			<div class="hidden md:block col-span-2 md:col-span-6 xl:col-span-12">
				<?php
				$f_img_f = get_field( 'fondue_image_full' );
				if ( $f_img_f ) :
					echo wp_get_attachment_image( $f_img_f, 'full', false, array( 'class' => 'w-full max-h-auto' ) );
				endif;
				?>
			</div>
			<div class="block md:hidden col-span-2 md:col-span-6 xl:col-span-12 ">
				<?php
				$f_img_fm = get_field( 'fondue_image_full_mobile' );
				if ( $f_img_fm ) :
					echo wp_get_attachment_image( $f_img_fm, 'full', false, array( 'class' => 'w-full max-h-auto' ) );
				endif;
				?>
			</div>
		</div>
	</div>
</section>
