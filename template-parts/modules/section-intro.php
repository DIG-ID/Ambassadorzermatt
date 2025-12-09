<?php
/**
 * Intro Module Section that appears on multiple page templates.
 *
 * @package ambassador-zermatt
 * @subpackage Module
 * @since 1.0.0
 */


global $post;
$is_child = is_page() && $post->post_parent;
$ot = get_field( 'intro_over_title' );

?>
<section id="section-intro" class="section-intro bg-White pt-10 <?php echo is_page_template( 'page-templates/page-arrival-contacts.php' ) ? 'pb-14' : 'pb-24'; ?> md:pt-14 md:pb-24 xl:pt-24 xl:pb-20">
	<div class="theme-container">
		<div class="theme-grid">
			<?php if ( $ot ) : ?>
				<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-4 xl:col-start-2 xl:col-span-4">
					<div class="title-secondary text-Brown">
						<?php if ( $is_child ) : ?>
							<h2><?php the_field( 'intro_over_title' ); ?></h2>
						<?php else : ?>
							<h1><?php the_field( 'intro_over_title' ); ?></h1>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( is_front_page() ) : ?>
				<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-6 xl:col-start-2 xl:col-span-6">
			<?php else : ?>
				<div class="col-start-1 col-span-2 md:col-start-1 md:col-span-5 xl:col-start-2 xl:col-span-5">
			<?php endif; ?>

				<div class="title-main text-Brown pt-[1.25rem] md:pt-[1.88rem] xl:pt-0">
					<?php if ( $ot ) : ?>
						<?php if ( $is_child ) : ?>
								<h1><?php the_field( 'intro_title' ); ?></h2>
							<?php else : ?>
								<h2><?php the_field( 'intro_title' ); ?></h2>
							<?php endif; ?>
					<?php else : ?>
						<h1><?php the_field( 'intro_title' ); ?></h1>
					<?php endif; ?>
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
