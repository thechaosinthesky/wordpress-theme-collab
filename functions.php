<?php

// Adding the CSS and JS files

function cbd_setup(){
  wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootswatch/4.5.2/flatly/bootstrap.min.css');
  wp_enqueue_style('fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css');
  wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), "all");

  wp_register_script("jquery", ("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"), NULL, "3.5.1", true);
  wp_register_script("bootstrap", ("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"), array("jquery"), "4.5.2", true);

  wp_enqueue_script("jquery");
  wp_enqueue_script("bootstrap");
  wp_enqueue_script("main", get_theme_file_uri('/assets/js/main.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'cbd_setup');

// Adding Theme Support

function cbd_init(){
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('html5',
    array('comment-list', 'comment-form', 'search-form')
  );
}

add_action('after_setup_theme', 'cbd_init');

// Custom Post types

function cbd_member_post_type() {
  register_post_type('member',
    array(
      'rewrite' => array('slug' => 'members'),
      'capability_type'    => 'post',
      'labels' => array(
        'name' => 'Members',
        'singular_name' => 'Member',
        'add_new_item' => 'Add New Member',
        'edit_item' => 'Edit Member'
      ),
      'menu-icon' => 'dashicons-clipboard',
      'public' => true,
      'has_archive' => true,
      'supports' => array(
        'title', 'thumbnail', 'editor', 'excerpt'
      )
    )
  );
}

add_action('init', 'cbd_member_post_type');

function cbd_homecard_post_type() {
  register_post_type('homecard',
    array(
      'rewrite' => array('slug' => 'homecard'),
      'capability_type'    => 'post',
      'labels' => array(
        'name' => 'Home Cards',
        'singular_name' => 'Home Card',
        'add_new_item' => 'Add New Home Card',
        'edit_item' => 'Edit Home Card'
      ),
      'menu-icon' => 'dashicons-clipboard',
      'public' => true,
      'has_archive' => true,
      'supports' => array(
        'title', 'thumbnail', 'editor', 'excerpt'
      )
    )
  );
}

add_action('init', 'cbd_homecard_post_type');

add_image_size( 'square', 300, 300, false); // Uncropped medium thumbnail size
add_image_size( 'square-small', 200, 200, false); // Uncropped medium thumbnail size

//--Register Menus--//

function register_my_menus() {
  register_nav_menus(
  array(
    'menu-main' => __( 'Menu Main' ),
    'menu-footer' => __( 'Menu Footer' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );


// Other includes
require_once('includes/site_contact_fields.php');
require_once('includes/bs4navwalker.php');
