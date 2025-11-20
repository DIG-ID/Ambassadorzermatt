<section class="section-child-pages bg-Dark text-white pt-16 pb-24 md:py-28 xl:py-36 border-b border-LightGray">
	<div class="theme-container">
		<div class="theme-grid">
			<div class="col-span-12">
				<h2 class="title-main mb-14 md:mb-16 xl:mb-20"><?php esc_html_e( 'Unsere Erlebniswelten', 'ambassador' ); ?></h2>
			</div>
		</div>
		<?php
		$featured_posts = get_field( 'child_pages' );
		if ( $featured_posts ) :
			?><ul class="theme-grid xl:[&>li:nth-child(2n+2)]:[--offset:16.25rem] xl:[&>li:nth-child(2n+2)]:mt-[var(--offset)] xl:[&>li:nth-child(2n+2)]:mb-[calc(var(--offset)*-1)] xl:pb-[16.25rem]"><?php
			foreach ( $featured_posts as $post ) :
				// Setup this post for WP functions (variable must be named $post).
				setup_postdata( $post ); ?>
				<li class="col-span-6 mb-16 md:mb-20 xl:mb-16">
					<article id="experience-<?php the_ID(); ?>" <?php post_class( 'card card__experience' ); ?>>
						<header class="card-header mb-5 md:mb-8">
							<?php
							if ( has_post_thumbnail() ) :
								?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class' => 'mb-8 max-h-[825px] w-full object-cover' ) ); ?></a><?php
							endif;
							?>
							<a href="<?php the_permalink(); ?>"><h3 class="title-main"><?php the_title(); ?></h3></a>
						</header><!-- .entry-header -->
						<div class="card-content">
							<div class="font-noto body mb-10 md:mb-14 xl:mb-12"><?php the_excerpt(); ?></div>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary-dark "><?php esc_html_e( 'Mehr erfahren', 'ambassador' ); ?></a>
						</div>
					</article>
				</li>
				<?php
			endforeach;
			?></ul><?php
			// Reset the global post object so that the rest of the page works correctly.
			wp_reset_postdata();
		endif;
		?>
	</div>
</section>
