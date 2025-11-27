<div id="menu-offcanvas" class="menu-offcanvas" aria-hidden="true" inert>

  <!-- Mega menu header (customizable) -->
  <header id="header-mega" class="header-main w-full relative z-[60] overflow-visible bg-White transition-opacity duration-700 ease-in-out border-b border-Brown" itemscope itemtype="http://schema.org/WebSite">
    <div class="theme-container">
      <div class="grid grid-cols-3">
        <div class="col-span-1 flex items-center justify-start">
          <!-- language selector mobile -->
          <div class="language-selector flex xl:hidden items-center py-3 md:py-5 xl:pt-[1px]">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/Ambassador-Zermatt-globe.svg"
                  class="mr-2" alt="Language Selector Globe Icon" title="Language Selector Globe Icon" />
            <?php do_action('wpml_add_language_selector'); ?>
          </div>
        </div>

        <div class="col-span-1 flex items-center justify-center">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="header-logo max-w-36 md:max-w-56 xl:max-w-60 transition-all duration-500 ease-in-out" itemprop="url">
            <?php do_action( 'theme_logo' ); ?>
          </a>
        </div>

        <div class="col-span-1 flex items-center justify-end pt-[37px] pb-[37px]">
          <div class="language-selector hidden xl:flex flex-row items-center mr-16">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/Ambassador-Zermatt-globe.svg" class="mr-3" alt="Language Selector Globe Icon" title="Language Selector Globe Icon" />
            <?php do_action('wpml_add_language_selector'); ?>
          </div>
          <div class="menu-toggle">
            <button class="menu-toggle__button !outline-none" aria-label="Menu Toggle" aria-controls="menu-offcanvas" aria-expanded="false">
              <span class="menu-toggle__bars">
                <span class="menu-toggle__bar menu-toggle__bar--top"></span>
                <span class="menu-toggle__bar menu-toggle__bar--middle"></span>
                <span class="menu-toggle__bar menu-toggle__bar--bottom"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Mega menu content -->
  <nav id="mega-menu-nav" class="primary-nav theme-container theme-grid mb-16 md:mb-32 xl:mb-[74px] mt-16 md:mt-20 xl:mt-14 2xl:mt-16 overflow-visible" aria-label="<?php esc_attr_e( 'Main Menu', 'ambassador' ); ?>" role="navigation">
    
    <!-- Left column: top-level only -->
    <div class="main-menu-col col-span-2 md:col-span-6 xl:col-span-6" data-menu-col>
      <?php
      if ( has_nav_menu( 'main-mega-menu' ) ) :
        wp_nav_menu( array(
          'theme_location' => 'main-mega-menu',
          'menu_id'        => 'main-mega-menu',
          'menu_class'     => 'menu-offcanvas__main-mega-menu',
          'container'      => false,
          'fallback_cb'    => false,
          'depth'          => 1, // <-- hide submenus in this column
          'walker'         => new Ambassador_Top_Level_Walker(),
        ) );
      else :
        echo '<span>' . esc_html__( 'Please assign a menu to the Main Mega Menu location', 'ambassador' ) . '</span>';
      endif;
      ?>
    </div>

    <!-- Right column: submenu panels (pre-rendered, hidden) -->
    <div class="sub-menu-col col-span-2 xl:col-span-3 hidden xl:block" data-menu-col>
      <?php ambassador_render_megamenu_panels( 'main-mega-menu' ); ?>
      <div class="submenu-empty-state text-sm opacity-70" data-empty hidden>
        <?php esc_html_e('No sub-items', 'ambassador'); ?>
      </div>
    </div>

    <div class="col-span-2 xl:col-span-3 overflow-visible hidden xl:block" data-menu-col>
      <div class="relative h-full flex justify-start overflow-visible">
        <?php
        /**
         * Build image list from ACF field on ALL menu items
         * Field name: 'image'  (change if needed)
         */
        $menu_images = array();

        $locations = get_nav_menu_locations();
        if ( ! empty( $locations['main-mega-menu'] ) ) {
          $menu_id    = $locations['main-mega-menu'];
          $menu_items = wp_get_nav_menu_items( $menu_id );

          if ( $menu_items ) {
            foreach ( $menu_items as $item ) {
              $img_id = get_field( 'image', $item ); // ACF on menu item

              if ( $img_id ) {
                $menu_images[] = array(
                  'img_id'       => $img_id,
                  'menu_item_id' => $item->ID,
                );
              }
            }
          }
        }

        if ( ! empty( $menu_images ) ) {
          foreach ( $menu_images as $index => $entry ) {
            $img_id       = $entry['img_id'];
            $menu_item_id = $entry['menu_item_id'];
            $is_first     = ( $index === 0 );

            echo wp_get_attachment_image(
              $img_id,
              'full',
              false,
              array(
                'class' => implode( ' ', array(
                  'mega-menu-photo',
                  'block', 'max-w-full', 'h-full', 'object-cover', 'select-none',
                  '2xl:w-auto', '2xl:object-contain',
                  '2xl:max-w-[min(85vw,460px)]',
                  '2xl:max-h-[calc(100vh-6rem)]',
                  'absolute', 'inset-0',
                  $is_first ? 'is-visible' : '',
                ) ),
                'data-menu-item-id' => $menu_item_id,
                'aria-hidden'       => $is_first ? 'false' : 'true',
              )
            );
          }
        }
        ?>
      </div>
    </div>

  </nav>
  <!-- Mobile submenu screen -->
    <div class="submenu-mobile xl:hidden" data-submenu-mobile aria-hidden="true">
      <div class="submenu-mobile__header border-b border-White flex items-center justify-between px-6 py-7 submenu-mobile__back">
        <button class="back-arrow w-[35px] h-[33px]">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="33" viewBox="0 0 38 36" fill="none">
            <path d="M36.5 34.0918L1.5 34.0918M1.5 34.0918L1.5 1.09179M1.5 34.0918L36.5 1.0918" stroke="#E7E5E5" stroke-width="3"/>
          </svg>
        </button>
       
      </div>

      <div class="submenu-mobile__body px-6 py-8 min-h-[564px]" data-submenu-mobile-body>
        <?php
          ambassador_render_megamenu_panels( 'main-mega-menu' );
        ?>
        <div class="submenu-empty-state text-sm opacity-70" data-empty hidden>
          <?php esc_html_e('No sub-items', 'ambassador'); ?>
        </div>
      </div>
      <hr class="border-t border-White">

      <div class="theme-container theme-grid pb-8 md:pb-0 bg-Brown">
        <div class="col-span-2 md:col-span-6 xl:col-span-12 flex flex-col md:flex-row justify-center items-center md:justify-between md:items-center py-6 md:pt-9 text-Brown gap-y-4">
          <div class="flex flex-col md:flex-row items-center justify-around w-full gap-y-10 md:gap-y-0">
            <a href="<?php the_field( 'general_booking_url','option' ); ?>" target="_blank" class="btn btn-sticky-bar-light max-w-64"><?php esc_html_e( 'Jetzt buchen','ambassador' ); ?></a>
            <a href="<?php the_field( 'general_table_reservation_url','option' ); ?>" target="_blank" class="btn btn-sticky-bar-light max-w-64"><?php esc_html_e( 'Tisch reservieren','ambassador' ); ?></a>
          </div>
        </div>
      </div>
    </div>

  <hr class="border-t border-Brown">

  <div class="theme-container theme-grid pb-8 md:pb-0">
    <div class="col-span-2 md:col-span-6 xl:col-span-12 flex flex-col md:flex-row justify-center items-center md:justify-between md:items-center py-6 md:pt-9 text-Brown gap-y-4">
      <div class="flex flex-col md:flex-row items-center justify-around w-full gap-y-10 md:gap-y-0">
        <a href="<?php the_field( 'general_booking_url','option' ); ?>" target="_blank" class="btn btn-primary-light max-w-64"><?php esc_html_e( 'Jetzt buchen','ambassador' ); ?></a>
        <a href="<?php the_field( 'general_table_reservation_url','option' ); ?>" target="_blank" class="btn btn-primary-light max-w-64"><?php esc_html_e( 'Tisch reservieren','ambassador' ); ?></a>
      </div>
    </div>
  </div>
</div>
