<?php
/**
 * Hero Module Section that appears on multiple page templates.
 *
 * @package ambassador-zermatt
 * @subpackage Module
 * @since 1.0.0
 */

?>

<?php if ( 'full' === get_field( 'hero_section_type' ) ) : ?>
	<section id="section-hero" class="section-hero relative xl:h-[calc(100dvh-98px)] w-full z-10">
		<?php
		$bg_id = get_field( 'hero_image' );
		if ( $bg_id ) :
			echo wp_get_attachment_image( $bg_id, 'full', false, array( 'class' => 'pointer-events-none w-full h-full object-cover object-top min-h-[330px] md:min-h-[440px]' ) );
		endif;
		?>
	</section>
<?php else : ?>
	<section id="section-hero" class="section-hero relative w-full z-10">
		<?php
		$bg_id = get_field( 'hero_image' );
		if ( $bg_id ) :
			echo wp_get_attachment_image( $bg_id, 'full', false, array( 'class' => 'pointer-events-none w-full h-full object-cover object-center min-h-[230px] md:min-h-[440px] xl:max-h-[530px]' ) );
		endif;
		?>
	</section>
<?php endif; ?>
<?php get_template_part( 'template-parts/components/booking', 'bar' ); ?>
