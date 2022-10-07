<?php
/**
 * underscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package underscore
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * function qui cree mes menu
 */

function under_register_nav_menu(){
	register_nav_menus( array(
		'menu_primaire' => __( 'Menu primaire', 'text_domain' ),
		// 'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
	) );
}
add_action( 'after_setup_theme', 'under_register_nav_menu', 0 );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function under_setup() {

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
        add_theme_support( 'title-tag' );


        	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );


}

add_action( 'after_setup_theme', 'under_setup' );



/**
 * Enqueue scripts and styles.
 */
function under_scripts() {
	// wp_enqueue_style( 'under-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('under-style',
	get_template_directory_uri() . '/style.css', array(),
	filemtime(get_template_directory() . '/style.css'),
	false);
}
add_action( 'wp_enqueue_scripts', 'under_scripts' );


/** filtre pour les element des menu */







function igc31w_filtre_choix_menu($obj_menu, $arg){
    //echo "/////////////////  obj_menu";
    // var_dump($obj_menu);
    //  echo "/////////////////  arg";
    //  var_dump($arg);
 
    if ($arg->menu == "sidebar"){
    foreach($obj_menu as $cle => $value)
    {
      //  print_r($value);
       //$value->title = substr($value->title,7);
       $value->title = wp_trim_words($value->title,3,"...");
        //echo $value->title . '<br>';
     } 
    }
    //die();
    return $obj_menu;
}
add_filter("wp_nav_menu_objects","igc31w_filtre_choix_menu", 10,2);

