<?php
/**
 * _corrupcion functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _corrupcion
 */

if ( ! function_exists( '_corrupcion_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _corrupcion_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _corrupcion, use a find and replace
		 * to change '_corrupcion' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_corrupcion', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', '_corrupcion' ),
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
		add_theme_support( 'custom-background', apply_filters( '_corrupcion_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', '_corrupcion_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _corrupcion_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_corrupcion_content_width', 640 );
}
add_action( 'after_setup_theme', '_corrupcion_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _corrupcion_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_corrupcion' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_corrupcion' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_corrupcion_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _corrupcion_scripts() {
	wp_enqueue_style( '_corrupcion-tachyons', get_template_directory_uri() . '/css/tachyons.min.css' );
	wp_enqueue_style( '_corrupcion-style', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_script( '_corrupcion-JS', get_template_directory_uri() . '/js/_corrupcion.js', array('jquery', 'jquery-ui-slider'), '20151215', true );
    
    wp_enqueue_script( '_corrupcion-jq-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), '20120206', false );
	wp_enqueue_style( '_corrupcion-jq-ui-style', get_template_directory_uri() . '/css/jq-ui/jquery-ui.min.css', array(), '20120206', false );

	wp_enqueue_script( '_corrupcion-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( '_corrupcion-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_corrupcion_scripts' );

// Take off pesky admin bar
add_filter('show_admin_bar', '__return_false');

// ************************
// **Begin Compromiso CPT**
// ************************
function custom_post_type() {
 
/*** testimonials ***/
    $labels = array(
        'name'               => 'Compromisos',
        'singular_name'      => 'Compromiso',
        'menu_name'          => 'Compromisos',
        'name_admin_bar'     => 'Compromiso',
        'add_new'            => 'Añadir Nuevo',
        'add_new_item'       => 'Añadir Nuevo Compromiso',
        'new_item'           => 'Nuevo Compromiso',
        'edit_item'          => 'Editar Compromiso',
        'view_item'          => 'Ver Compromiso',
        'all_items'          => 'Todos Los Compromisos',
        'search_items'       => 'Buscar Compromisos',
        //'parent_item_colon'  => 'Parent Testimonials:',
        'not_found'          => 'No se encontraron compromisos.',
        'not_found_in_trash' => 'No se encontraron compromisos en la basura.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-id-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'compromisos' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
        'taxonomies'         => array( 'category' )
    );
    register_post_type( 'compromiso', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action( 'init', 'custom_post_type', 0 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

