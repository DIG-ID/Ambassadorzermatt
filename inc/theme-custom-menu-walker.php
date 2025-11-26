<?php

// Top-level only walker, adds data-parent-id on <a> when the item has children
class Ambassador_Top_Level_Walker extends Walker_Nav_Menu {
  public function start_lvl( &$output, $depth = 0, $args = null ) {
    // Prevent output of nested <ul> in the left column
    if ( $depth === 0 ) { return; }
    parent::start_lvl( $output, $depth, $args );
  }

  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    if ( $depth > 0 ) return; // only top level

    $has_children = in_array('menu-item-has-children', (array) $item->classes, true);

    // always add data-menu-item-id
    $atts = ' data-menu-item-id="' . esc_attr( $item->ID ) . '"';

    // extra attributes only if it has children
    if ( $has_children ) {
      $atts .= ' data-parent-id="' . esc_attr( $item->ID ) . '" aria-haspopup="true" aria-expanded="false"';
      $atts .= ' aria-controls="submenu-panel-' . esc_attr( $item->ID ) . '"';
    }

    $classes = implode(' ', array_map('esc_attr', (array) $item->classes));
    $output .= '<li class="menu-item ' . $classes . '">';
    $output .= '<a class="mega-toplink" href="' . esc_url( $item->url ) . '"' . $atts . '>' . esc_html( $item->title ) . '</a>';
  }

  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    if ( $depth > 0 ) return;
    $output .= '</li>';
  }
}



function ambassador_render_megamenu_panels( $theme_location ) {
  $locations = get_nav_menu_locations();
  if ( empty($locations[$theme_location]) ) return;

  $menu_id = $locations[$theme_location];
  $items   = wp_get_nav_menu_items( $menu_id, ['update_post_term_cache' => false] );
  if ( empty($items) ) return;

  // Group children (depth=1) by their parent menu item ID
  $children_by_parent = [];
  foreach ( $items as $it ) {
    if ( (int) $it->menu_item_parent > 0 ) {
      // Keep only one level deep for this mega behavior
      $parent_id = (int) $it->menu_item_parent;
      $children_by_parent[$parent_id][] = $it;
    }
  }

  // Output a panel per parent that has children
  foreach ( $children_by_parent as $parent_id => $children ) {
    // Sort by menu_order so it matches WP’s order
    usort($children, fn($a,$b)=> $a->menu_order <=> $b->menu_order);
    echo '<ul class="submenu-panel space-y-2" id="submenu-panel-' . esc_attr($parent_id) . '" data-parent-id="' . esc_attr($parent_id) . '">';
    foreach ( $children as $child ) {
      $target = $child->target ? ' target="'. esc_attr($child->target) . '"' : '';
      $rel    = $child->xfn ? ' rel="'. esc_attr($child->xfn) . '"' : '';
      echo '<li class="submenu-item">
        <a class="submenu-link"
           href="' . esc_url($child->url) . '"
           data-menu-item-id="' . esc_attr( $child->ID ) . '"' . $target . $rel . '>'
           . esc_html($child->title) .
        '</a>
      </li>';
    }
    echo '</ul>';
  }
}

