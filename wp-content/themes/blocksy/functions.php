<?php
/**
 * Blocksy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blocksy
 */

if (version_compare(PHP_VERSION, '5.7.0', '<')) {
	require get_template_directory() . '/inc/php-fallback.php';
	return;
}

require get_template_directory() . '/inc/init.php';

function custom_post_type_achievement() {
  
  // Set UI labels for Custom Post Type
      $labels = array(
          'name'                => _x( 'Prestasi Siswa', 'Post Type General Name', 'maarif' ),
          'singular_name'       => _x( 'Prestasi', 'Post Type Singular Name', 'maarif' ),
          'menu_name'           => __( 'Prestasis', 'maarif' ),
          'parent_item_colon'   => __( 'Parent Prestasi', 'maarif' ),
          'all_items'           => __( 'All Prestasis', 'maarif' ),
          'view_item'           => __( 'View Prestasi', 'maarif' ),
          'add_new_item'        => __( 'Add New Prestasi', 'maarif' ),
          'add_new'             => __( 'Add New', 'maarif' ),
          'edit_item'           => __( 'Edit Prestasi', 'maarif' ),
          'update_item'         => __( 'Update Prestasi', 'maarif' ),
          'search_items'        => __( 'Search Prestasi', 'maarif' ),
          'not_found'           => __( 'Not Found', 'maarif' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'maarif' ),
      );
        
  // Set other options for Custom Post Type
        
      $args = array(
          'label'               => __( 'prestasi', 'maarif' ),
          'description'         => __( 'Membahas tentang Berita Siswa Berpestasi di MI Maarif Ngipik', 'maarif' ),
          'labels'              => $labels,
          // Features this CPT supports in Post Editor
          'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes' ),
          // This is where we add taxonomies to our CPT
          'taxonomies'          => array( 'category' ),
      
          /* A hierarchical CPT is like Pages and can have
          * Parent and child items. A non-hierarchical CPT
          * is like Posts.
          */
          'hierarchical'        => true,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'menu_icon'           => 'dashicons-awards',
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'post',
          'show_in_rest' => true,
          'rest_base'          => 'prestasi',
          'rest_controller_class' => 'WP_REST_Posts_Controller',
    
      );
        
      // Registering your Custom Post Type
      register_post_type( 'prestasi', $args );
    
  }
    
  /* Hook into the 'init' action so that the function
  * Containing our post type registration is not 
  * unnecessarily executed. 
  */
    
  add_action( 'init', 'custom_post_type_achievement', 0 );
  
  add_action( 'pre_get_posts', 'add_my_post_types_to_query_achievement' );
    
  function add_my_post_types_to_query_achievement( $query ) {
      if ( is_home() && $query->is_main_query() )
          $query->set( 'post_type', array( 'post', 'prestasi' ) );
      return $query;
  }
  
  function custom_post_type_kegiatan() {
    
  // Set UI labels for Custom Post Type
      $labels = array(
          'name'                => _x( 'Agenda Kegiatan', 'Post Type General Name', 'maarif' ),
          'singular_name'       => _x( 'Agenda Kegiatan', 'Post Type Singular Name', 'maarif' ),
          'menu_name'           => __( 'Kegiatans', 'maarif' ),
          'parent_item_colon'   => __( 'Parent Kegiatan', 'maarif' ),
          'all_items'           => __( 'All Kegiatans', 'maarif' ),
          'view_item'           => __( 'View Kegiatan', 'maarif' ),
          'add_new_item'        => __( 'Add New Kegiatan', 'maarif' ),
          'add_new'             => __( 'Add New', 'maarif' ),
          'edit_item'           => __( 'Edit Kegiatan', 'maarif' ),
          'update_item'         => __( 'Update Kegiatan', 'maarif' ),
          'search_items'        => __( 'Search Kegiatan', 'maarif' ),
          'not_found'           => __( 'Not Found', 'maarif' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'maarif' ),
      );
        
  // Set other options for Custom Post Type
        
      $args = array(
          'label'               => __( 'agenda-kegiatan', 'maarif' ),
          'description'         => __( 'Informasi Agenda Kegiatan di MI Maarif Ngipik', 'maarif' ),
          'labels'              => $labels,
          // Features this CPT supports in Post Editor
          'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes' ),
          // This is where we add taxonomies to our CPT
          'taxonomies'          => array( 'category' ),
      
          /* A hierarchical CPT is like Pages and can have
          * Parent and child items. A non-hierarchical CPT
          * is like Posts.
          */
          'hierarchical'        => true,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 6,
          'menu_icon'           => 'dashicons-calendar',
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'post',
          'show_in_rest' => true,
          'rest_base'          => 'agenda-kegiatan',
          'rest_controller_class' => 'WP_REST_Posts_Controller',
    
      );
        
      // Registering your Custom Post Type
      register_post_type( 'agenda-kegiatan', $args );
    
  }
    
  /* Hook into the 'init' action so that the function
  * Containing our post type registration is not 
  * unnecessarily executed. 
  */
    
  add_action( 'init', 'custom_post_type_kegiatan', 0 );
  
  add_action( 'pre_get_posts', 'add_my_post_types_to_query_kegiatan' );
    
  function add_my_post_types_to_query_kegiatan( $query ) {
      if ( is_home() && $query->is_main_query() )
          $query->set( 'post_type', array( 'post', 'agenda-kegiatan' ) );
      return $query;
  }
  
  
