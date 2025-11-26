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
        // Collect up to 6 images from options: menu_item_1 ... menu_item_6
        $menu_images = array();
        for ( $i = 1; $i <= 6; $i++ ) {
          $img_id = get_field( "menu_item_{$i}", 'option' );
          if ( $img_id ) {
            $menu_images[] = $img_id;
          }
        }

        // Fallback to old single image if needed
        if ( empty( $menu_images ) ) {
          $mega_menu_image = get_field( 'mega_menu_image', 'option' );
          if ( $mega_menu_image ) {
            echo wp_get_attachment_image(
              $mega_menu_image,
              'full',
              false,
              array(
                'class' => implode( ' ', array(
                  'mega-menu-photo',
                  'mega-menu-photo--single',
                  'block', 'max-w-full', 'h-full', 'object-cover', 'select-none',
                  '2xl:w-auto', '2xl:object-contain',
                  '2xl:max-w-[min(85vw,460px)]',
                  '2xl:max-h-[calc(100vh-6rem)]',
                  'is-visible',
                ) ),
                'aria-hidden' => 'false',
              )
            );
          }
        } else {
          // Output one <img> per menu item, stacked; first is visible by default
          foreach ( $menu_images as $index => $img_id ) {
            $is_first = ( $index === 0 );
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
                'data-photo-index' => $index,
                'aria-hidden'       => $is_first ? 'false' : 'true',
              )
            );
          }
        }
        ?>
      </div>
    </div>

  </nav>

  <hr class="border-t border-Brown">

  <div class="theme-container theme-grid mb-16 md:mb-0">
    <div class="col-span-12 flex flex-col md:flex-row justify-center items-center md:justify-between md:items-center py-6 md:pt-9 text-Brown gap-y-4">
      <div class="flex flex-col md:flex-row items-center justify-around w-full gap-y-10 md:gap-y-0">
        <a href="<?php the_field( 'general_booking_url','option' ); ?>" target="_blank" class="btn btn-primary max-w-60"><?php esc_html_e( 'Jetzt buchen','ambassador' ); ?></a>
        <a href="<?php the_field( 'general_table_reservation_url','option' ); ?>" target="_blank" class="btn btn-primary max-w-60"><?php esc_html_e( 'Tisch reservieren','ambassador' ); ?></a>
      </div>
    </div>
  </div>
</div>
