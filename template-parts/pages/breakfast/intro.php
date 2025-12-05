<?php
/**
 * Intro Section in the Breakfast Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="section-intro" class="section-intro bg-White pt-10 pb-[3.75rem] md:pt-14 md:pb-[3.75rem] xl:pt-24 xl:pb-[9.37rem]">
	<div class="theme-container">
		<div class="theme-grid">
			<?php if( get_field( 'intro_over_title' ) ) : ?>
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-4">
				<div class="title-secondary text-Brown">
					<h1><?php the_field( 'intro_over_title' ); ?></h1>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( is_front_page() ) : ?>
				<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-6 xl:col-start-2 xl:col-span-6">
			<?php else : ?>
				<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-5">
			<?php endif; ?>
				<div class="title-main text-Brown pt-[1.25rem] md:pt-[1.88rem] xl:pt-0">
					<h2><?php the_field( 'intro_title' ); ?></h2>
				</div>
			</div>
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-8 xl:col-span-4">
				<div class="body text-Brown pt-[1.25rem] md:pt-[1.88rem] xl:pt-0">
					<p><?php the_field( 'intro_text' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
