<?php
get_header();
		do_action( 'before_main_content' );
      get_template_part( 'template-parts/archives/zimmer-suiten/hero' );
      get_template_part( 'template-parts/archives/zimmer-suiten/intro' );
      get_template_part( 'template-parts/archives/zimmer-suiten/content' );
      get_template_part( 'template-parts/archives/zimmer-suiten/outro' );
		do_action( 'after_main_content' );
get_footer();
