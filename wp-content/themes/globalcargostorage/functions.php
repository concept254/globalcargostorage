<?php

/*
 *  Scripts and Styles
 */
require get_template_directory() . '/inc/class-mega-menu-walker.php';

function theme_scripts() {
    
    global $wp_styles;
    
    // wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    
    $wp_styles->add_data( 'html5', 'conditional', 'lt IE 9' );
    // wp_enqueue_style('slick-css', get_template_directory_uri() . '/css/slick.css');
    // wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,300,500,900');
    // wp_enqueue_style('fontawsome', get_template_directory_uri() . '/css/font-awesome.min.css');
    // wp_enqueue_style('print', get_template_directory_uri() . '/print.css', null, null, 'print');
    // wp_enqueue_style('style', get_stylesheet_uri());

    
    // wp_enqueue_script('jquery');
    // wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
    // wp_enqueue_script('googlemap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAGtUb_L6b2vxS8nCr8foE8M4w6EC2SH-I');
    // wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.js');
    // wp_enqueue_script('main', get_template_directory_uri() . '/js/main-script.js');
}

add_action('wp_enqueue_scripts', 'theme_scripts');

// initialize menu
add_action( 'after_setup_theme', 'menus_init' );

function menus_init() {   
  register_nav_menus(array(
      'header-menu' => __( 'Header Menu' ),
      'footer-column-1' => __( 'Footer column 1 menu' ),
      'footer-column-2' => __( 'Footer column 2 menu' ),
      'about-sidebar-menu' => __( 'About sidebar menu' ),
      'support-sidebar-menu' => __( 'Support sidebar menu' )
  ));
}

function my_theme_setup(){
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'my_theme_setup');

/**
 * Woocommerce Support
 */
add_theme_support( 'woocommerce' );

/** 
 * Walker
 */
class nav_menu_dropdown extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = Array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\" role=\"menu\">\n";
  }
}

function add_menu_link_class($atts, $item, $args)
{
    $atts['class'] = 'nav-link';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);


// woo theme


/**
  * Reviews and comments tab
 */

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );        // Remove the description tab
    unset( $tabs['reviews'] );      // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;
}

add_filter( 'excerpt_length', 'woo_custom_excerpt_length', 10 );
 
function woo_custom_excerpt_length ( $length ) {
    $length = 20;
    return $length;
} // End woo_custom_excerpt_length()

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 9;
  return $cols;
}

/**
  * Related Items Function
 */

function woo_related_products_limit() {
  global $product;

  $args['posts_per_page'] = 6;
  return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {

  $args['posts_per_page'] = 3; // 4 related products
  $args['columns'] = 4; // arranged in 4 columns
  return $args;
}

// Remove archive title on cat temp and others
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

    // Page Sidebar categories
  register_sidebar( array(
    'name' => 'Page sidebar',
  ) );

  // single Sidebar categories
  register_sidebar( array(
    'name' => 'Single post sidebar',
  ) );

  // single News Sidebar categories
  register_sidebar( array(
    'name' => 'Archive News sidebar',
  ) );

  // single News Sidebar categories
  register_sidebar( array(
    'name' => 'Shop filter one',
  ) );

// Stop loading the JavaScript and CSS stylesheet on all pages
  
  define('WPCF7_LOAD_JS', false);
  define('WPCF7_LOAD_CSS', false);

// infinit scroll on other pages
function my_load_infinite_scroll( $load_infinite_scroll ) {
    if( is_page(24) ){
      return true;
      return $load_infinite_scroll;
    }
}
add_filter('infinite_scroll_load_override', 'my_load_infinite_scroll');


// pagination link classes
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="next"';
}

function posts_link_attributes_2() {
    return 'class="prev"';
}

// post to post
function cgc_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'products_to_projects',
        'from' => 'product',
        'to' => 'project'
    ) );
}
add_action( 'p2p_init', 'cgc_connection_types' );

// post to post
function projecttoproduct_connection_types() {
  p2p_register_connection_type( array(
      'name' => 'projects_to_products',
      'from' => 'project',
      'to' => 'product'
  ) );
}

add_action( 'p2p_init', 'projecttoproduct_connection_types' );

// project custom query vars
function add_query_vars_filter( $vars ){
  $vars[] = "app";
  return $vars;
}
add_filter( 'app', 'add_query_vars_filter' );


function upsert_query_var($url, $var, $value) {
	
	// If URL has a query string
	if(strpos($url, '?') == false) {
		return $url . '?' . $var . '=' . $value;
	} else {
		return $url . '&' . $var . '=' . $value;
	}
}


// get project products
function get_project_products() {
     global $wpdb;
  $products_linked = $wpdb->get_col("SELECT DISTINCT p2p_from FROM $wpdb->p2p" );


  $postIds = array();

  foreach ($products_linked as $product_linked) {
    $postIds[] = $product_linked;
  }

  return $postIds;
}

function get_product_projects($productID) {
    global $wpdb;
    
    $query = "SELECT DISTINCT p2p_to FROM $wpdb->p2p WHERE p2p_from = $productID ";
    
  $projects_linked = $wpdb->get_col($query);
  
  return $projects_linked;
}

// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&#187;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Homepage';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<div id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<span class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></span>';
        echo '<span class="separator separator-home"> ' . $separator . ' </span>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<span class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></span>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<span class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></span>';
                echo '<span class="separator"> ' . $separator . ' </span>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<span class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></span>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<span class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></span>';
                echo '<span class="separator"> ' . $separator . ' </span>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<span class="item-cat">'.$parents.'</span>';
                    $cat_display .= '<span class="separator"> ' . $separator . ' </span>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<span class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></span>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<span class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></span>';
                echo '<span class="separator"> ' . $separator . ' </span>';
                echo '<span class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></span>';
              
            } else {
                  
                echo '<span class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></span>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<span class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></span>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<span class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></span>';
                    $parents .= '<span class="separator separator-' . $ancestor . '"> ' . $separator . ' </span>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<span class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></span>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<span class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></span>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<span class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></span>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<span class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></span>';
            echo '<span class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </span>';
               
            // Month link
            echo '<span class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></span>';
            echo '<span class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </span>';
               
            // Day display
            echo '<span class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></span>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<span class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></span>';
            echo '<span class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </span>';
               
            // Month display
            echo '<span class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></span>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<span class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></span>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<span class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></span>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<span class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></span>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<span class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></span>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<span>' . 'Error 404' . '</span>';
        }
       
        echo '</div>';
           
    }
       
}

// register custom fields