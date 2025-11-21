<?php
/**
 * Template Name: Experiences - Enjoyment Template
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section', 'hero' );
			get_template_part( 'template-parts/modules/section', 'intro' );
			get_template_part( 'template-parts/pages/experiences/enjoyment/breakfast' );
			get_template_part( 'template-parts/pages/experiences/enjoyment/restaurant' );
			get_template_part( 'template-parts/pages/experiences/enjoyment/culinary-and-bar' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
