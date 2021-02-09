<?php


/* Register Menus in Front end */

function register_menus() {
    register_nav_menus(
      array(
        'top-meny' => __( 'Toppnavigering' ),
        'target-meny-sidor' => __( 'Målgruppsnavigering Undersidor' ),
        'sidfot-meny-left' => __( 'Sidfotsnavigering Vänster' ),
        'sidfot-meny-right' => __( 'Sidfotsnavigering Höger' )
      )
    );
  }
  
  add_action( 'init', 'register_menus' );
  add_theme_support( 'menus' );

  /**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function sfi_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url() . '" >
  <div class="sfi-search-form-wrapper">
  <input type="text" class="input input-search" placeholder="Sök här ..." value="'. get_search_query() .'" name="s" id="s"  autocomplete/>
  <button alt="Sökknapp" type="submit" class="button button-solid button-search " id="search-btn">
    <i class="fas fa-search"></i>
    <p>Sök</p>
  </button>
  </div>
  </form>';

  return $form;
}
add_filter( 'get_search_form', 'sfi_search_form' );

/* Add Thumbnailsupport for Posts */
add_theme_support( 'post-thumbnails' );

/* Add custom thumbnail for Start page */
add_image_size( 'featured-large', 530, 259, true );

/* Sidebar enableation */
add_action( 'widgets_init', 'gde_register_sidebars' );

function gde_register_sidebars() {

/* Register dynamic sidebar 'news_sidebar' */
    register_sidebar(
        array(
        'id' => 'news_sidebar',
        'name' => __( 'Sidopanel - Samlade nyheter' ),
        'description' => __( 'Sidopanel för samlade nyheter' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    )
    );

    register_sidebar(
      array(
      'id' => 'single_sidebar',
      'name' => __( 'Sidopanel - Enskilda nyheter' ),
      'description' => __( 'Sidopanel för Enskilda nyheter/kategorier' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>'
  )
  );
  }

  /* Removes default post-type in the admin as we are not using it */
  add_action('admin_menu','remove_default_post_type');

  function remove_default_post_type() {
    remove_menu_page('edit.php');
  }

  /* Adds support for Custom Post Type for Archive Widget */
  add_filter( 'getarchives_where', 'custom_getarchives_where' );
    function custom_getarchives_where( $where ){
      $where = str_replace( "post_type = 'post'", "post_type IN ( 'nyheter' )", $where );
      return $where;
  }

  // Change sub menu class
  function change_submenu_class($menu) {  
    $menu = preg_replace('/ class="sub-menu"/','/ class="mobile-sub-menu" /',$menu);  
    return $menu;  
  }  
  add_filter('wp_nav_menu','change_submenu_class');  

  /* Add SVG-support for media uploads in WP-Admin */
  function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');

  /* Custom Post Nyheter Rewrite */
  global $wp_rewrite;
  $nyheter_structure = '/nyheter/%year%/%monthnum%/%day%/%nyheter%/';
  $wp_rewrite->add_rewrite_tag("%nyheter%", '([^/]+)', "nyhet=");
  $wp_rewrite->add_permastruct('nyheter', $nyheter_structure, false);
  
?>
