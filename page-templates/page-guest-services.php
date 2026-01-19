<?php
/**
 *
 * Template Name: Guest Services Template
 *
 * @package ambassador-zermatt
 * @subpackage Template
 * @since 1.0.0
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section', 'hero' );
			get_template_part( 'template-parts/modules/section', 'intro' );
			get_template_part( 'template-parts/pages/guest-services/stay' );
			get_template_part( 'template-parts/pages/guest-services/activities' );
			get_template_part( 'template-parts/pages/guest-services/ski' );
			get_template_part( 'template-parts/modules/section', 'outro' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
