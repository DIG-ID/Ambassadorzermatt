<div id="menu-offcanvas" class="menu-offcanvas" aria-hidden="true" inert>
  <nav id="mega-menu-nav" class="primary-nav theme-container theme-grid mt-32 md:mt-44 xl:mt-40 2xl:mt-44"
       aria-label="<?php esc_attr_e( 'Main Menu', 'ambassadorzermatt' ); ?>" role="navigation">
    
    <!-- Left column: top-level only -->
    <div class="main-menu-col col-span-2 xl:col-span-6" data-menu-col>
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
        echo '<span>' . esc_html__( 'Please assign a menu to the Main Mega Menu location', 'ambassadorzermatt' ) . '</span>';
      endif;
      ?>
    </div>

    <!-- Right column: submenu panels (pre-rendered, hidden) -->
    <div class="sub-menu-col col-span-2 xl:col-span-3" data-menu-col>
      <?php ambassador_render_megamenu_panels( 'main-mega-menu' ); ?>
      <div class="submenu-empty-state text-sm opacity-70" data-empty hidden>
        <?php esc_html_e('No sub-items', 'ambassadorzermatt'); ?>
      </div>
    </div>

    <div class="col-span-2 xl:col-span-3" data-menu-col>
      <?php 
      $mega_menu_image = get_field( 'mega_menu_image','option' );
      echo wp_get_attachment_image( $mega_menu_image, 'full', false, array( 'class' => 'block' ) ); ?>
    </div>
  </nav>

  <div class="theme-container theme-grid mb-16 md:mb-0 md:mt-32 xl:mt-[74px] border-t border-Brown">
    <div class="col-span-12 flex flex-col md:flex-row justify-center items-center md:justify-between md:items-center py-6 md:pt-9 text-Brown gap-y-4">
      <div class="flex flex-col md:flex-row items-center">
        <?php if ( function_exists( 'dynamic_sidebar' ) ) { dynamic_sidebar( 'header_ls' ); } ?>
      </div>
    </div>
  </div>
</div>
