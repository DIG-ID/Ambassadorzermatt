<?php
/**
 * Intro section for the Fondue page template.
 *
 * @package ambassador-zermatt
 * @subpackage Page
 * @since 1.0.0
 */

$ot = get_field( 'intro_over_title' );

?>
<section id="section-intro" class="section-intro bg-White pt-10 pb-24 md:pt-14 md:pb-24 xl:pt-24 xl:pb-20">
	<div class="theme-container">
		<div class="theme-grid">
			<?php if ( $ot ) : ?>
				<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-4">
					<div class="title-secondary text-Brown">
						<h1><?php the_field( 'intro_over_title' ); ?></h1>
					</div>
				</div>
			<?php endif; ?>

			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-5 xl:col-start-2 xl:col-span-5">
				<div class="title-main text-Brown pt-[1.25rem] md:pt-[1.88rem] xl:pt-0">
					<?php if ( $ot ) : ?>
						<h2><?php the_field( 'intro_title' ); ?></h2>
					<?php else : ?>
						<h1><?php the_field( 'intro_title' ); ?></h1>
					<?php endif; ?>
				</div>
				<p class="text-Brown p-5 border-2 border-Brown mt-[1.25rem] md:mt-10 max-w-[440px] hidden xl:block"><?php the_field( 'intro_disclaimer'); ?></p>
			</div>

			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-8 xl:col-span-4">
				<div class="text-Brown pt-[1.25rem] md:pt-[1.88rem] xl:pt-0">
					<p><?php the_field( 'intro_text' ); ?></p>
					<p class="text-Brown mt-[1.25rem] md:mt-10 block xl:hidden"><?php the_field( 'intro_disclaimer'); ?></p>
					<?php
					$blink = get_field( 'intro_button' );
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
	</div>
</section>
