<?php
get_header();
do_action( 'before_main_content' );
?>
<section class="section-error-404 not-found bg-Dark text-LightGray h-[calc(100dvh-49px)] md:h-[calc(100dvh-69px)] xl:h-[calc(100dvh-98px)] overflow-hidden">

	<div class="mx-auto w-full xl:max-w-[1590px]">

		<div class="flex justify-center gap-x-8 md:gap-x-12 xl:gap-x-16 h-full">

			<div class="flex flex-col items-center gap-8 md:gap-16 xl:-translate-y-[22%]">
				<img class="img-tile" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-1.jpg' ) ); ?>" alt="bg-1">
				<img class="img-tile" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-2.jpg' ) ); ?>" alt="bg-2">
				<img class="img-tile" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-3.jpg' ) ); ?>" alt="bg-3">
			</div>

			<div class="flex flex-col items-center gap-8 md:gap-16 -translate-y-[15%] md:-translate-y-[20%] xl:-translate-y-[15%]">
				<img class="img-tile" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-3.jpg' ) ); ?>" alt="bg-3">
				<div class="error-404-content flex flex-col items-center justify-center gap-y-9 md:gap-y-14 text-center w-full min-w-[260px] md:min-w-[360px] md:max-w-[360px] xl:min-w-[580px] xl:max-w-[580px]">
					<div class="">
						<h1><span class="font-inria font-light text-7xl md:text-8xl xl:leading-[160px] xl:text-[180px] tracking-[-0.0313rem]"><?php esc_html_e( '404', 'ambassador' ); ?></span> <br><span class="font-inria body"><?php esc_html_e( 'Seite konnte nicht gefunden werden.', 'ambassador' ); ?></span></h1>
					</div>
					<div class="flex flex-col gap-4">
						<h2 class="font-inria font-bold italic text-lg md:text-xl xl:text-3xl tracking-[-0.0042rem]"><?php esc_html_e( 'Oops, da sind Sie falsch abgebogen', 'ambassador' ); ?></h2>
						<p class="font-noto body !text-sm !md:text-base"><?php esc_html_e( 'Die Seite, die Sie suchen, konnten wir leider nicht finden. Aber keine Sorge, in Zermatt führen viele Wege zum Ziel und auf unserer Webseite entdecken Sie bestimmt den richtigen.', 'ambassador' ); ?></p>
					</div>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'zurück zur Startseite', 'ambassador' ); ?></a>
				</div>
				<img class="img-tile" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-5.jpg' ) ); ?>" alt="bg-5">
			</div>
		
			<div class="flex flex-col items-center gap-8 md:gap-16 xl:-translate-y-[22%]">
				<img class="img-tile" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-6.jpg' ) ); ?>" alt="bg-6">
				<img class="img-tile" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-7.jpg' ) ); ?>" alt="bg-7">
				<img class="img-tile" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-1.jpg' ) ); ?>" alt="bg-1">
			</div>


		</div>
		
	</div>



</section>
<?php
do_action( 'after_main_content' );
get_footer();
