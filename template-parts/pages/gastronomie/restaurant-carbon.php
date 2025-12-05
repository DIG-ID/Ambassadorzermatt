<?php
/**
 * Restaurant Carbon Section that appears on Gastronomie Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="restaurant-carbon" class="restaurant-carbon overflow-hidden relative w-full bg-Dark pt-[3.63rem] pb-[3.56rem] md:pt-[4.75rem] md:pb-[4.85rem] xl:pt-[6.63rem] xl:pb-[8.36rem]">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="col-start-1 col-span-2 md:col-span-2 xl:col-span-3 md:pt-[19.5rem] xl:pt-[20.06rem] block relative h-full order-3 md:order-none">
				<div class="hidden relative md:flex justify-end overflow-visible">
					<?php
					$rc_img_l = get_field( 'restaurant_carbon_image_left' );
					if ( $rc_img_l ) :
						echo wp_get_attachment_image( $rc_img_l, 'full', false, array( 'class' => 'block relative xl:absolute w-full h-auto bleed-left-full md:min-h-[693px]' ) );
					endif;
					?>
				</div>
				<div class="block relative md:hidden justify-end overflow-visible">
					<?php
					$rc_img_lm = get_field( 'restaurant_carbon_image_left_mobile' );
					if ( $rc_img_lm ) :
						echo wp_get_attachment_image( $rc_img_lm, 'full', false, array( 'class' => 'block relative xl:absolute w-full h-auto bleed-left-full' ) );
					endif;
					?>
				</div>
			</div>
			<div class="col-start-1 col-span-2 md:col-start-3 md:col-span-4 xl:col-start-4 xl:col-span-9 relative order-1 md:order-none">
				<div class="hidden md:block xl:hidden">
					<?php
					$rc_img_rt = get_field( 'restaurant_carbon_image_right_tablet' );
					if ( $rc_img_rt ) :
						echo wp_get_attachment_image( $rc_img_rt, 'full', false, array( 'class' => 'w-full h-auto bleed-right-full' ) );
					endif;
					?>
				</div>
				<div class="block md:hidden xl:block">
					<?php
					$rc_img_r = get_field( 'restaurant_carbon_image_right' );
					if ( $rc_img_r ) :
						echo wp_get_attachment_image( $rc_img_r, 'full', false, array( 'class' => 'w-full h-auto bleed-right-full' ) );
					endif;
					?>
				</div>
				<div class="content-wrapper hidden md:block xl:hidden">
					<div class="pt-[2.5rem] md:pt-[2.78rem] xl:pt-[3.63rem]">
						<h2 class="title-secondary text-White"><?php the_field( 'restaurant_carbon_overtitle' ); ?></h2>
					</div>
					<div class="pt-[1.25rem] md:pt-[1.88rem] xl:pt-[1.87rem]">
						<h3 class="title-main text-White "><?php the_field( 'restaurant_carbon_title' ); ?></h3>
					</div>
					<div class="pt-[1.25rem] md:pt-[1.88rem] xl:pt-[1.87rem]">
						<p class="body text-White "><?php the_field( 'restaurant_carbon_text' ); ?></p>
					</div>
					<?php
					$rclink = get_field( 'restaurant_carbon_button' );
					if ( $rclink ) :
						$link_url    = $rclink['url'];
						$link_title  = $rclink['title'];
						$link_target = $rclink['target'] ? $rclink['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary-dark mt-[2.5rem] mb-[2.5rem] md:mt-[3.75rem] md:mb-0 xl:mt-[3.75rem]">
							<?php echo esc_html( $link_title ); ?>
						</a>
						<?php
					endif;
					?>
				</div>
			</div>
			<div class="block md:hidden xl:block col-start-1 col-span-2 md:col-start-3 md:col-span-4 xl:col-start-5 xl:col-span-5 order-2 md:order-none">
				<div class="pt-[2.5rem] md:pt-[2.78rem] xl:pt-[3.63rem]">
					<h2 class="title-secondary text-White "><?php the_field( 'restaurant_carbon_overtitle' ); ?></h2>
				</div>
				<div class="pt-[1.25rem] md:pt-[1.88rem] xl:pt-[1.87rem]">
					<h3 class="title-main text-White "><?php the_field( 'restaurant_carbon_title' ); ?></h3>
				</div>
				<div class="pt-[1.25rem] md:pt-[1.88rem] xl:pt-[1.87rem]">
					<p class="body text-White"><?php the_field( 'restaurant_carbon_text' ); ?></p>
				</div>
				<?php
				$rclink = get_field( 'restaurant_carbon_button' );
				if ( $rclink ) :
					$link_url    = $rclink['url'];
					$link_title  = $rclink['title'];
					$link_target = $rclink['target'] ? $rclink['target'] : '_self';
					?>
					<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary-dark mt-[2.5rem] mb-[2.5rem] md:mt-[3.75rem] md:mb-0 xl:mt-[3.75rem]">
						<?php echo esc_html( $link_title ); ?>
					</a>
					<?php
				endif;
				?>
			</div>
		</div>
	</div>
</section>
