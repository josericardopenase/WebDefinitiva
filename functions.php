<?php
wp_enqueue_style( 'style', get_stylesheet_uri() );



/*<link href="Style.css" rel = "stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
<script src = "https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src= "script.js"></script>
<link rel="stylesheet" href="animate.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
<link rel = "stylesheet" href ="style2.css">
	<link rel="shortcut icon" href="LogoTab2.png" />*/
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
     )
   );
 }

 add_action( 'init', 'register_my_menus' );

function wpb_add_google_fonts() {
 wp_enqueue_style( 'animate', get_template_directory_uri()."/animate.css" );
wp_enqueue_style( 'animate_fonts1', get_template_directory_uri()."/fonts/icomoon.eot" );
wp_enqueue_style( 'animate_fonts2', get_template_directory_uri()."/fonts/icomoon.svg" );
wp_enqueue_style( 'animate_fonts3', get_template_directory_uri()."/fonts/icomoon.ttf" );
wp_enqueue_style( 'animate_fonts4', get_template_directory_uri()."/fonts/icomoon.woff" );
wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,800', false ); 
wp_enqueue_style( 'wpb-google-fonts2', 'https://fonts.googleapis.com/css?family=Inria+Serif&display=swap:400,800', false ); 
wp_enqueue_style( 'wpb-google-fonts3', 'https://fonts.googleapis.com/css?family=Poppins&display=swap', false ); 	
	
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/*
function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );
*/

if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
}
//add_filter( 'the_excerpt', 'the_excerpt_more_link', 21 );

/*
function tn_custom_excerpt_length( $length ) {
return 60;
}*/
function get_excerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" ([.*?])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 390);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$excerpt = "<p>".$excerpt."...</p>".
	"<div class ='date'>" . get_the_date( 'j / M / y' ) . "</div>".
	'<a class = "botonCL" href="'. get_permalink($post->ID) . '">continua leyendo...</a><br>';
return $excerpt;
}

//add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );
// Our custom post type function
function create_posttype() {
 
  register_post_type( 'regatistas',
  // CPT Options
      array(
          'labels' => array(
              'name' => __( 'Regatistas' ),
              'singular_name' => __( 'Regatista' )
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array('slug' => 'regatista'),
      )
  );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
  // Set UI labels for Custom Post Type
      $labels = array(
          'name'                => _x( 'Movies', 'Post Type General Name', 'twentythirteen' ),
          'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'twentythirteen' ),
          'menu_name'           => __( 'Movies', 'twentythirteen' ),
          'parent_item_colon'   => __( 'Parent Movie', 'twentythirteen' ),
          'all_items'           => __( 'All Movies', 'twentythirteen' ),
          'view_item'           => __( 'View Movie', 'twentythirteen' ),
          'add_new_item'        => __( 'Add New Movie', 'twentythirteen' ),
          'add_new'             => __( 'Add New', 'twentythirteen' ),
          'edit_item'           => __( 'Edit Movie', 'twentythirteen' ),
          'update_item'         => __( 'Update Movie', 'twentythirteen' ),
          'search_items'        => __( 'Search Movie', 'twentythirteen' ),
          'not_found'           => __( 'Not Found', 'twentythirteen' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
      );
       
  // Set other options for Custom Post Type
       
      $args = array(
          'label'               => __( 'movies', 'twentythirteen' ),
          'description'         => __( 'Movie news and reviews', 'twentythirteen' ),
          'labels'              => $labels,
          // Features this CPT supports in Post Editor
          'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
          // You can associate this CPT with a taxonomy or custom taxonomy. 
          'taxonomies'          => array( 'genres' ),
          /* A hierarchical CPT is like Pages and can have
          * Parent and child items. A non-hierarchical CPT
          * is like Posts.
          */ 
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'page',
      );
       
      // Registering your Custom Post Type
      register_post_type( 'regatistas', $args );
   
  }


   
  /* Hook into the 'init' action so that the function
  * Containing our post type registration is not 
  * unnecessarily executed. 
  */
   
  add_action( 'init', 'custom_post_type', 0 );
?>