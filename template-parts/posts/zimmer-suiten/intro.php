<?php
/**
 * Intro Section in the Single Zimmer & Suiten Single Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="section-intro" class="section-intro bg-White pt-8 pb-14 md:pt-8 md:pb-24 xl:pt-10 xl:pb-20">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-12 mb-7 md:mb-8 xl:mb-10">
				<a href="<?php the_field( 'back_to_overview_link','option' ); ?>" class="back_to_overview-wrapper flex flex-row items-center">
					<figure>
						<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
							<path d="M13.1055 22.0352L1.41297 11.3511M1.41297 11.3511L11.168 0.675323M1.41297 11.3511L22.8605 11.3594" stroke="#766A66" stroke-width="2"/>
						</svg>
					</figure>
					<span class="ml-3 text-Brown"><?php the_field( 'back_to_overview_label','option' ); ?></span>
				</a>
			</div>
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-4">
				<div class="title-secondary text-Brown">
					<h2><?php the_field( 'hero_intro_over_title' ); ?></h2>
				</div>
			</div>
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-5">
				<div class="title-main text-Brown pt-[1.25rem] md:pt-[1.88rem] xl:pt-0">
					<h1><?php the_field( 'hero_intro_title' ); ?></h1>
				</div>
			</div>
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-7 xl:col-span-5">
				<div class="body text-Brown pt-[1.25rem] md:pt-[1.88rem] xl:pt-0 grid grid-cols-2 md:grid-cols-4 xl:grid-cols-5 gap-x-5">
					<p class="mb-8 col-span-2 md:col-span-4 xl:col-span-4"><?php the_field( 'hero_intro_text' ); ?></p>
					<?php
						/*$link = get_field('hero_intro_button');
						if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';*/
					?>
					<a href="<?php the_field( 'general_booking_url', 'option' ); ?>" target="_blank" class="btn btn-primary-brown mb-0 col-span-2 md:col-span-4 xl:col-span-5">
						<?php echo esc_html_e( 'Jetzt buchen', 'ambassador' ); ?>
					</a>
					<?php /*endif;*/ ?>
				</div>
			</div>
		</div>
	</div>
</section>
