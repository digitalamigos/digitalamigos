<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


//Add Custom Style on WP admin page
function admin_page_custom_style() {
  echo '<style> 
    #menu-pages a.menu-top,
    #menu-posts a.menu-top,
    #toplevel_page_wpcf7 a.menu-top,
    #toplevel_page_acf-options-general-settings a.menu-top {         
        color: #f91d1d !important; 
    }
  </style>';
}
add_action('admin_head', __NAMESPACE__ . '\\admin_page_custom_style');


/**
 * Deletes all CSS classes and id's, except for those listed in the array below
 */
function custom_wp_nav_menu($var) {
  return is_array($var) ? array_intersect($var, array(
    //List of allowed menu classes
    'menu-item',
    'current_page_item',
    'current_page_parent',
    'current_page_ancestor',
    'menu-item-has-children',
    'first',
    'last',
    'vertical',
    'horizontal'
    )
  ) : '';
}
add_filter('nav_menu_css_class', __NAMESPACE__ . '\\custom_wp_nav_menu');
add_filter('nav_menu_item_id', __NAMESPACE__ . '\\custom_wp_nav_menu');
add_filter('page_css_class', __NAMESPACE__ . '\\custom_wp_nav_menu');


/**
 * Replace menu class names
 */
function replace_menu_classes($text){
  $replace = array(
    //List of menu item classes that should be changed to "active"
    'menu-item' => 'nav-item',
    'current_page_item' => 'active',
    'menu-item-has-children' => 'parent',
    'current_page_ancestor' => 'selected',
  );
  $text = str_replace(array_keys($replace), $replace, $text);
    return $text;
  }
add_filter ('wp_nav_menu', __NAMESPACE__ . '\\replace_menu_classes');


/**
 * Add class to menu anchor
 */
function add_link_atts($atts) {
  $atts['class'] = "nav-link";
  return $atts;
}
add_filter( 'nav_menu_link_attributes', __NAMESPACE__ . '\\add_link_atts');


/**
 * Auto Play hero video
 */
function Oembed_youtube_no_title($html,$url,$args){
  if( !is_admin() ) {
    $url_string = parse_url($url, PHP_URL_QUERY);
    parse_str($url_string, $id);
    if (isset($id['v'])) {
        return '<iframe width="'.$args['width'].'" height="'.$args['height'].'" src="http://www.youtube.com/embed/'.$id['v'].'?autoplay=1&vq=hd1080&rel=0&showinfo=0" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>';
    }
    return $html;
  }
}
add_filter('oembed_result', __NAMESPACE__ . '\\Oembed_youtube_no_title',10,3);