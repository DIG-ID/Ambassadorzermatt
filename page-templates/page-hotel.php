<?php
/**
 * Template Name: Hotel Template
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section','hero' );
            get_template_part( 'template-parts/modules/section','intro' );
            get_template_part( 'template-parts/pages/hotel/komfort' );
            get_template_part( 'template-parts/pages/hotel/regional' );
            get_template_part( 'template-parts/pages/hotel/outro' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
