<?php
/**
 * Intro Section in the Zimmer & Suiten Archive Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="section-intro" class="section-intro bg-White pt-10 pb-24 md:pt-14 md:pb-24 xl:pt-24 xl:pb-20">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-4">
				<h1 class="title-secondary text-Brown"><?php the_field( 'zimmer_suiten_intro_over_title', 'option' ); ?></h1>
			</div>
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-5 xl:col-start-2 xl:col-span-5">
				<div class="pt-[1.25rem] md:pt-[1.88rem] xl:pt-0">
					<h2 class="title-main text-Brown"><?php the_field( 'zimmer_suiten_intro_title', 'option' ); ?></h2>
				</div>
			</div>
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-8 xl:col-span-4">
				<div class="pt-[1.25rem] md:pt-[1.88rem] xl:pt-0">
					<p class="body text-Brown"><?php the_field( 'zimmer_suiten_intro_text', 'option' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
