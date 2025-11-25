<?php
get_header();
do_action( 'before_main_content' );
?>
<section class="section-error-404 not-found bg-Dark text-LightGray border-8 border-pink-300 h-[calc(100dvh-98px)] overflow-hidden">

	<div class="mx-auto w-full xl:max-w-[1590px]">

		<div class="flex justify-between h-full">

			<div class="flex flex-col items-center gap-16 -translate-y-[25%]">
				<img class="w-full object-cover max-w-[440px] max-h-[528px] opacity-50 transition-opacity ease-in-out duration-700 hover:opacity-100" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-1.jpg' ) ); ?>" alt="bg-1">
				<img class="w-full object-cover max-w-[440px] max-h-[528px] opacity-50 transition-opacity ease-in-out duration-700 hover:opacity-100" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-2.jpg' ) ); ?>" alt="bg-2">
				<img class="w-full object-cover max-w-[440px] max-h-[528px] opacity-50 transition-opacity ease-in-out duration-700 hover:opacity-100" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-3.jpg' ) ); ?>" alt="bg-3">
			</div>

			<div class="flex flex-col items-center gap-16 -translate-y-[20%]">
				<img class="w-full object-cover max-w-[440px] max-h-[528px] opacity-50 transition-opacity ease-in-out duration-700 hover:opacity-100" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-3.jpg' ) ); ?>" alt="bg-3">
				<div class="error-404-content flex flex-col items-center justify-center text-center max-w-[580px]">
					<div class="mb-8 md:mb-18 xl:mb-20">
						<h1 class="font-inria font-light text-[6.25rem] leading-[1] md:text-[12.5rem] tracking-[-0.0313rem]"><?php esc_html_e( '404', 'ambassador' ); ?></h1>
						<p class="font-inria body"><?php esc_html_e( 'Seite konnte nicht gefunden werden', 'ambassador' ); ?></p>
					</div>
					<div class="flex flex-col gap-6">
						<h2 class="font-inria font-bold italic text-[2.1875rem] tracking-[-0.0042rem]"><?php esc_html_e( 'Oops, da sind Sie falsch abgebogen', 'ambassador' ); ?></h2>
						<p class="font-noto body"><?php esc_html_e( 'Die Seite, die Sie suchen, konnten wir leider nicht finden. Aber keine Sorge, in Zermatt führen viele Wege zum Ziel und auf unserer Webseite entdecken Sie bestimmt den richtigen.', 'ambassador' ); ?></p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'zurück zur Startseite', 'ambassador' ); ?></a>
					</div>
				</div>
				<img class="w-full object-cover max-w-[440px] max-h-[528px] opacity-50 transition-opacity ease-in-out duration-700 hover:opacity-100" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-5.jpg' ) ); ?>" alt="bg-5">
			</div>
		
			<div class="flex flex-col items-center gap-16 -translate-y-[25%]">
				<img class="w-full object-cover max-w-[440px] max-h-[528px] opacity-50 transition-opacity ease-in-out duration-700 hover:opacity-100" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-6.jpg' ) ); ?>" alt="bg-6">
				<img class="w-full object-cover max-w-[440px] max-h-[528px] opacity-50 transition-opacity ease-in-out duration-700 hover:opacity-100" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-7.jpg' ) ); ?>" alt="bg-7">
				<img class="w-full object-cover max-w-[440px] max-h-[528px] opacity-50 transition-opacity ease-in-out duration-700 hover:opacity-100" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hotel-ambassador-zermatt-404-bg-1.jpg' ) ); ?>" alt="bg-1">
			</div>


		</div>
		
	</div>



</section>
<?php
do_action( 'after_main_content' );
get_footer();
