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





/********************************************************************filtre de menu */


function igc31w_filtre_choix_menu($obj_menu, $arg){
    //echo "/////////////////  obj_menu";
    // var_dump($obj_menu);
    //  echo "/////////////////  arg";
    //  var_dump($arg);
 
    if ($arg->menu == "sidebar"){
    foreach($obj_menu as $cle => $value)
    {
      //  print_r($value);
       $value->title = substr($value->title, 8);
       $value->title = substr($value->title, 0, -6);
       $value->title = wp_trim_words($value->title,4,"...");
        //echo $value->title . '<br>';
     } 
    }
    //die();
    return $obj_menu;
}
add_filter("wp_nav_menu_objects","igc31w_filtre_choix_menu", 10,2);





/********************************************************************filtre de menu EVENEMENT*/



/* ----------------------------------------------------------- Ajout de la description dans menu */
function prefix_nav_description( $item_output, $item) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( '</a>',
        '<hr><span class="menu-item-description">' . $item->description . '</span><div class="menu__item__icone"><img src="https://eddym76.sg-host.com/wp-content/uploads/2022/08/multimedia-aha-awards-pubs-x-1.png"></div></a>',
              $item_output );
    }
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 2 );
// l'argument 10 : niveau de privilège
// l'argument 2 : le nombre d'argument dans la fonction de rappel: «prefix_nav_description»


/********************************************************************init sidebar */


add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	/* Register the 'footer-1' sidebar. */
	register_sidebar(
		array(
			'id'            => 'footer-1',
			'name'          => __( 'sidebar footer-1' ),
			'description'   => __( 'premier sidebar du footer' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	/* Repeat register_sidebar() code for additional sidebars. */
	register_sidebar(
		array(
			'id'            => 'footer-2',
			'name'          => __( 'sidebar footer-2' ),
			'description'   => __( 'deuxieme sidebar du footer' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-3',
			'name'          => __( 'sidebar footer-3' ),
			'description'   => __( '3ieme sidebar du footer' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'aside-1',
			'name'          => __( 'sidebar aside-1' ),
			'description'   => __( 'premier sidebar aside' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'aside-2',
			'name'          => __( 'sidebar aside-2' ),
			'description'   => __( 'deuxieme sidebar aside' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}


/**
 * fonction qui modifie la requete principale de wp (main query)
 * les article qui saficheront dans la page dacceuil seront les article de categorie acceuil
 */

function igc31w_filtre_requete( $query ) {
	if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
		$query->set( 'category_name', 'accueil' );
	}
}
add_action( 'pre_get_posts', 'igc31w_filtre_requete' );