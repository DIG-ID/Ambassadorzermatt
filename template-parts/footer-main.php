<footer id="footer-main" class="footer-main relative w-full bg-Dark">
    <div class="theme-container">
        <div class="theme-grid col-span-2 md:col-span-6 xl:col-span-12 md:pt-[3.69rem] xl:pt-[4.2rem] xl:pb-[11.62rem] order-1 md:order-none">
            <!-- desktop row 1 logo, address, hotel and Zermatt erleben -->
            <!-- Logo -->
            <div class="col-start-1 col-span-2 md:col-span-2 xl:col-span-3">
                    <?php
                        $imgLogo = get_field('general_theme_logo_white','option');
                        $size  = 'full';

                        if ( $imgLogo ) {
                        echo wp_get_attachment_image(
                        $imgLogo,
                        $size,
                        false,
                        [
                        'class'    => 'w-full h-auto',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        ]
                        );
                        }
                    ?>
            </div>
            <!-- Address -->
            <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-2 xl:col-start-5 xl:col-span-3 order-4 md:order-none">
                <p class="body text-White pt-[0.5px] pb-12"><?php esc_html_e( 'Address','ambassador' ); ?></p>
                <p class="footer-body text-White"><?php the_field( 'general_address','option' ); ?></p>
            </div>
            <!-- Hotel menu -->
            <div class="col-start-1 col-span-2 md:col-start-3 md:col-span-2 xl:col-start-8 xl:col-span-2 order-5 md:order-none">
                <div class="body text-white">
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
            </div>
            <!-- Zermatt erleben -->
            <div class="col-start-1 col-span-2 md:col-start-5 md:col-span-2 xl:col-start-10 xl:col-span-3 pb-[5.31rem] order-7 md:order-none">
                <div class="text-white body">
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
            </div>
            <!-- Desktop row 2 newsletter, kontakt, gastronomie and uber uns  -->
            <!-- Newsletter -->
            <div class="col-start-1 col-span-2 md:col-start-5 md:col-span-2 xl:col-start-1 xl:col-span-3 md:pb-[8.19rem] xl:pb-0 order-2 md:order-none">
                <p class="title-footer text-White pb-8"><?php esc_html_e( 'Newsletter','ambassador' ); ?></p> 
            </div>
            <!-- Kontakt -->
            <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-2 xl:col-start-5 xl:col-span-3 order-3 md:order-none">
                <p class="body text-White pb-12"><?php esc_html_e( 'Kontakt','ambassador' ); ?></p>
                <p class="footer-body text-White"><?php the_field( 'general_phone','option' ); ?></p>
                <p class="footer-body text-White"><?php the_field( 'general_e-mail','option' ); ?></p>
            </div>
            <div class="bottom-side-wrapper">
                <!-- Gastronomie -->
                <div class="col-start-1 col-span-2 md:col-start-3 md:col-span-2 xl:col-span-2 xl:col-start-8 text-white body order-6 md:order-none">
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
            </div>
            <!-- Uber uns -->
            <div class="col-start-1 col-span-2 md:col-start-5 md:col-span-2 xl:col-start-10 xl:col-span-3 order-8 md:order-none">
                <div class="text-white body">
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
        <div class="relative">
            <div class="footer-separator absolute left-1/2 w-screen h-[1px] bg-White -translate-x-1/2">
            </div>
        </div>
        <!-- Copyright menu -->
        <!-- Datenschutz and AGB  -->
        <div class="theme-grid xl:pt-[1.75rem] xl:pb-[1.56rem]">
            <div class="flex justify-between items-center col-start-1 col-span-2 md:col-start-1 md:col-span-3 xl:col-start-5 xl:col-span-4">
                <div class="footer-small text-White">
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
            <!-- Copyright text -->
            <div class="col-start-1 col-span-2 xl:col-start-10 xl:col-span-3">
                <p class="footer-small text-White"><?php esc_html_e( '©2025 Company Name. All rights reserved','ambassador' ); ?></p>
            </div>
        </div>
    </div>
</footer>
