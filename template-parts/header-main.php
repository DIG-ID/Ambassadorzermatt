<header id="header-main" class="header-main w-full relative z-50 overflow-visible" itemscope itemtype="http://schema.org/WebSite">
  <div class="theme-container">
    <div class="grid grid-cols-3">
      <div class="col-span-1 flex items-center justify-start">
        <nav id="primary-nav" class="primary-nav" aria-label="<?php esc_attr_e( 'Main Menu', 'ambassadorzermatt' ); ?>" role="navigation">
          <?php
          if ( has_nav_menu( 'main-menu' ) ) :
            wp_nav_menu(
							array(
								'theme_location'  => 'main-menu',
								'menu_id'         => 'main-menu',
								'menu_class'      => 'main-menu-header flex flex-col lg:flex-row',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'fallback_cb'     => '__return_false',
							)
						);
          else :
            echo '<span>' . esc_html__( 'Please assign a menu to the Main Menu location', 'ambassadorzermatt' ) . '</span>';
          endif;
          ?>
        </nav>
      </div>
      <div class="col-span-1 flex items-center justify-center">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="header-logo absolute top-0 max-w-80 transition-all duration-500 ease-in-out" itemprop="url">
          <?php do_action( 'theme_logo' ); ?>
        </a>
      </div>
      <div class="col-span-1 flex items-center justify-end">
        <div class="menu-toggle">
          <button class="menu-toggle__button" aria-label="Menu Toggle" aria-controls="mega-menu-nav">
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
