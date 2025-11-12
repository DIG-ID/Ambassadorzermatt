<?php
/**
 * Template Name: Restaurant Carbon Template
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section','hero' );
            get_template_part( 'template-parts/pages/restaurant-carbon/intro' );
            get_template_part( 'template-parts/pages/restaurant-carbon/unsere-kuche' );
			get_template_part( 'template-parts/pages/restaurant-carbon/chefs' );
            get_template_part( 'template-parts/pages/restaurant-carbon/ambassador-bar' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
