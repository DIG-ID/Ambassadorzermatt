<footer id="footer-main" class="footer-main relative w-full bg-Dark text-LightGray pt-8 md:pt-16 z-30">

	<!-- Top part of the footer -->
	<div class="theme-container">
		<div class="theme-grid">

			<!-- desktop row 1 logo, address, hotel and Zermatt erleben -->
			<!-- Logo -->
			<div class="footer-logo col-span-2 md:col-span-2 xl:col-span-3 order-1 md:order-1 xl:order-none">
				<?php
				$img_logo = get_field( 'general_theme_logo_white', 'option' );
				if ( $img_logo ) :
					echo wp_get_attachment_image(
						$img_logo,
						'full',
						false,
						array(
							'class'    => 'w-full h-auto',
							'loading'  => 'eager',
							'decoding' => 'async',
						)
					);
				endif;
				?>
			</div>

			<!-- Address -->
			<div class="footer-address col-span-2 md:col-span-2 xl:col-start-5 xl:col-span-3 order-4 md:order-3 xl:order-none">
				<div class="flex md:block">
					<p class="title-footer md:pb-4 xl:pb-8 w-32 md:w-auto"><?php esc_html_e( 'Address', 'ambassador' ); ?></p>
					<p class="footer-body"><?php the_field( 'general_address', 'option' ); ?></p>
				</div>
			</div>

			<!-- Hotel menu -->
			<div class="col-span-2 md:col-start-3 md:col-span-2 xl:col-start-8 xl:col-span-2 order-5 md:order-4 xl:order-none">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-hotel-menu',
						'container'      => false,
						'menu_class'     => 'footer-hotel-menu',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'fallback_cb'    => '__return_false',
					)
				);
				?>
			</div>

			<!-- Zermatt erleben -->
			<div class="col-span-2 md:col-start-5 md:col-span-2 xl:col-start-10 xl:col-span-3 order-7 md:order-5 xl:order-none">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-zermatt-erleben-menu',
						'container'      => false,
						'menu_class'     => 'footer-zermatt-erleben-menu',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'fallback_cb'    => '__return_false',
					)
				);
				?>
			</div>

			<!-- Desktop row 2 newsletter, kontakt, gastronomie and uber uns  -->
			<!-- Newsletter -->
			<div class="footer-newsletter col-span-2 md:col-start-5 md:col-span-2 xl:col-start-1 xl:col-span-3 order-2 md:order-2 xl:order-none">
				<p class="title-footer md:pb-4 xl:pb-8"><?php esc_html_e( 'Newsletter', 'ambassador' ); ?></p>
				<?php
				$nl_sc = get_field( 'newsletter_shortcode', 'option' );
				if ( $nl_sc ) :
					echo do_shortcode( $nl_sc );
				endif;
				?>
			</div>

			<!-- Kontakt -->
			<div class="footer-kontakt col-span-2 md:col-start-1 md:col-span-2 xl:col-start-5 xl:col-span-3 order-3 md:order-6 xl:order-none">
				<div class="flex md:block">
					<p class="title-footer md:pb-4 xl:pb-8 w-32 min-w-32 md:w-auto md:min-w-max"><?php esc_html_e( 'Kontakt', 'ambassador' ); ?></p>
					<span>
						<p class="footer-body break-words"><?php the_field( 'general_phone', 'option' ); ?></p>
						<p class="footer-body break-all"><?php the_field( 'general_e-mail', 'option' ); ?></p>
					</span>
				</div>
			</div>

			<!-- Gastronomie -->
			<div class="col-start-1 col-span-2 md:col-start-3 md:col-span-2 xl:col-span-2 xl:col-start-8 order-6 md:order-7 xl:order-none">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-gastronomie-menu',
						'container'      => false,
						'menu_class'     => 'footer-gastronomie-menu',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'fallback_cb'    => '__return_false',
					)
				);
				?>
			</div>

			<!-- Uber uns -->
			<div class="col-span-2 md:col-start-5 md:col-span-2 xl:col-start-10 xl:col-span-3 order-8 md:order-8 xl:order-none">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-uber-uns-menu',
						'container'      => false,
						'menu_class'     => 'uber-uns-hotel-menu',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'fallback_cb'    => '__return_false',
					)
				);
				?>
			</div>

		</div>
	</div>

	<!-- Separator -->
	<div class="relative py-8">
		<div class="footer-separator absolute w-full h-[1px] bg-White">
		</div>
	</div>

	<!-- Copyright menu -->
	<div class="theme-container">
		<div class="flex flex-col justify-center xl:flex-row xl:justify-between items-center gap-y-4 xl:gap-y-0 pb-8 xl:pb-8">

			<!-- Copyright text -->
			<p class="footer-small text-LightGray order-2 xl:order-1 text-center xl:text-end"><?php esc_html_e( '2025 © Hotel Ambassador Zermatt. All rights reserved', 'ambassador' ); ?></p>

			<!-- Datenschutz and AGB  -->
			<div class="flex items-center order-1 xl:order-2">
				<div class="footer-small text-LightGray">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-copyright-menu',
							'container'      => false,
							'menu_class'     => 'footer-copyright-menu',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'fallback_cb'    => '__return_false',
						)
					);
					?>
				</div>
			</div>

		</div>
	</div>

</footer>
