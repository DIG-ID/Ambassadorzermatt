<?php
/**
 * Regionalt Section in the Hotel Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="regional" class="regional bg-Dark pt-[3.06rem] pb-[3.06rem] md:pt-[4.25rem] md:pb-[4.25rem] xl:pt-[6.12rem] xl:pb-[20.62rem]">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="block xl:hidden col-start-1 col-span-2 md:col-span-6 xl:col-start-1 xl:col-span-6 xl:pt-[15.44rem] relative h-full order-4 xl:order-none">
				<?php
				$r_img_ltm = get_field( 'regional_image_left_tablet_mobile' );
				if ( $r_img_ltm ) :
					echo wp_get_attachment_image( $r_img_ltm, 'full', false, array( 'class' => 'xl:absolute w-auto max-h-[85.4375rem]' ) );
				endif;
				?>
			</div>
			<div class="hidden xl:block col-start-1 col-span-2 md:col-span-6 xl:col-start-1 xl:col-span-6 xl:pt-[15.44rem] relative h-full order-4 xl:order-none">
				<?php
				$r_img_l = get_field( 'regional_image_left' );
				if ( $r_img_l ) :
					echo wp_get_attachment_image( $r_img_l, 'full', false, array( 'class' => 'xl:absolute w-auto max-h-[85.4375rem]' ) );
				endif;
				?>
			</div>
			<div class="col-start-1 col-span-2 md:col-start-2 md:col-span-5 xl:col-start-7 xl:w-screen relative order-1 xl:order-none">
				<?php
				$r_img_r = get_field( 'regional_image_right' );
				if ( $r_img_r ) :
					echo wp_get_attachment_image( $r_img_r, 'full', false, array( 'class' => 'w-auto max-h-[32.375rem]' ) );
				endif;
				?>
			</div>
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-8 xl:col-span-5 order-2 xl:order-none">
				<div class="pt-[2.47rem] md:pt-[3.75rem] xl:pt-[6.5rem]">
					<h2 class="title-main text-LightGray "><?php the_field( 'regional_title' ); ?></h2>
				</div>
				<div class="pt-[1.25rem] md:pt-[1.87rem] xl:max-w-[32rem]">
					<p class="body text-LightGray "><?php the_field( 'regional_text' ); ?></p>
				</div>
				<?php
				$rlink = get_field( 'regional_button' );
				if ( $rlink ) :
					$link_url    = $rlink['url'];
					$link_title  = $rlink['title'];
					$link_target = $rlink['target'] ? $rlink['target'] : '_self';
					?>
					<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary-dark mt-[2.5rem] mb-[2.5rem] md:mt-[3.75rem] md:mb-[3.75rem] xl:mb-[20.62] order-3 xl:order-none">
						<?php echo esc_html( $link_title ); ?>
					</a>
					<?php
				endif;
				?>
			</div>
		</div>
	</div>
</section>
