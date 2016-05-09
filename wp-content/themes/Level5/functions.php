<?php
/**
 * level5 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package level5
 */

if ( ! function_exists( 'level5_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function level5_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on level5, use a find and replace
	 * to change 'level5' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'level5', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );


	/* img sizes */
	add_image_size( 'home-menu-logo', 162, 9999, false);
	add_image_size( 'home-employee', 259, 289, true);
	add_image_size( 'related-thumbnail', 206, 136, true);
	add_image_size( 'client-logo', 300, 9999, false);
	add_image_size( 'appraisal-image', 600, 9999, false);
  add_image_size( 'featured-image', 667, 348, false);
	add_image_size( 'grid-employee', 162, 188, true);
   
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'level5' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'level5_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'level5_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function level5_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'level5_content_width', 640 );
}
add_action( 'after_setup_theme', 'level5_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function level5_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'level5' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'level5_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function level5_scripts() {
	
	wp_enqueue_style( 'level5-style', get_template_directory_uri() . '/css/style.css', array(), '20160216' );
	wp_enqueue_style( 'market-wake-styles', get_stylesheet_uri(), array('level5-style') );

  wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/js/jquery.cycle2.min.js', array(), '20160216', true );
	wp_enqueue_script( 'cycle2-carousel', get_template_directory_uri() . '/js/jquery.cycle2.carousel.min.js', array(), '20160216', true );
  wp_enqueue_script( 'cycle2-center', get_template_directory_uri() . '/js/jquery.cycle2.center.min.js', array(), '20160216', true );
  wp_enqueue_script( 'float-labels', get_template_directory_uri() . '/js/floatlabel.js', array(), '20160216', true );
  wp_enqueue_script( 'hover-intent', get_template_directory_uri() . '/js/hoverintent.js', array(), '20160216', true );

  // OPTIONALLY ADD COMMENTS LATER
  //if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	//	wp_enqueue_script( 'comment-reply' );
	//}
}
add_action( 'wp_enqueue_scripts', 'level5_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

	//FEATURES
add_action( 'init', 'create_features' );
function create_features() {
     $labels = array(
    'name' => _x('Features', 'post type general name'),
    'singular_name' => _x('Feature', 'post type singular name'),
    'add_new' => _x('Add New', 'Feature'),
    'add_new_item' => __('Add New Feature'),
    'edit_item' => __('Edit feature'),
    'new_item' => __('New feature'),
    'view_item' => __('View feature'),
    'all_items' => __('All Features'),
    'search_items' => __('Search features'),
    'not_found' =>  __('No features found'),
    'not_found_in_trash' => __('No features found in Trash'),
    'parent_item_colon' => ''
  );

  $supports = array('title',  'page-attributes');

  register_post_type( 'feature',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
      'hierarchical' => false,
      'has_archive' => false,
      'rewrite' => array('slug' => 'feature'),
      'menu_icon'   => 'dashicons-businessman',
    )
  );
}

 //CUSTOM POST TYPE PLACEHOLDER TEXT
function wpb_change_title_text( $title ){
     $screen = get_current_screen();
     if( 'feature' == $screen->post_type ) {
      $title = 'Feature Title';
     }
     return $title;
}

/**
 * Remove empty paragraphs created by wpautop()
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 */
function remove_empty_p( $content ) {
    $content = force_balance_tags( $content );
    $content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
    $content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
    return $content;
}
add_filter('the_content', 'remove_empty_p', 20, 1);


//SCROLL FORMS TO ANCHOR ON CONFIRMATION / VALIDATION
add_filter( 'gform_confirmation_anchor', '__return_true' );
