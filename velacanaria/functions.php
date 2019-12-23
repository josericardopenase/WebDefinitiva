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
	
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );

function the_excerpt_more_link( $excerpt ){
    $post = get_post();
    $excerpt .= '<a class = "botonCL" href="'. get_permalink($post->ID) . '">continua leyendo...</a><br>.';
    return $excerpt;
}
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
}
add_filter( 'the_excerpt', 'the_excerpt_more_link', 21 );

function tn_custom_excerpt_length( $length ) {
return 40;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

?>