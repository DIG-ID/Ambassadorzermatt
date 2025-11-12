<?php
/**
 * Template Name: Home Template
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section','hero' );
			get_template_part( 'template-parts/modules/section','intro' );
			get_template_part( 'template-parts/pages/home/hover','menu' );
			get_template_part( 'template-parts/pages/home/hotel' );
			get_template_part( 'template-parts/pages/home/gastronomie' );
			get_template_part( 'template-parts/pages/home/pool','sauna' );
			get_template_part( 'template-parts/pages/home/erlebnisse' );
			get_template_part( 'template-parts/pages/home/tradition' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
