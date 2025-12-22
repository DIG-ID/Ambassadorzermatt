<?php
/**
 * Intro Section in the Restaurant Carbon Page Template.
 *
 * @package ambassador-zermatt
 * @subpackage Section
 * @since 1.0.0
 */

?>

<section id="intro-restaurant-carbon" class="intro-restaurant-carbon bg-Dark pt-[2.5rem] pb-[6.25rem] md:pt-[6.25rem] xl:pb-0">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-4">
				<div class="title-big text-LightGray xl:max-w-[30rem]">
					<h1><?php the_field( 'intro_title' ); ?></h1>
				</div>
			</div>
			<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-8 xl:col-span-4">
				<div class="body text-LightGray pt-[1.25rem] xl:pt-0">
					<p><?php the_field( 'intro_text' ); ?></p>
					<a href="<?php the_field( 'general_table_reservation_url', 'option' ); ?>" target="_blank" class="btn btn-primary-dark mt-[2.5rem] md:mt-[3.75rem] mb-0 xl:mt-[3.75rem]"><?php esc_html_e( 'Tisch reservieren', 'ambassador' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
