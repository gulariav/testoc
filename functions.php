<?php
/**
 * testoc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package testoc
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'testoc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function testoc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on testoc, use a find and replace
		 * to change 'testoc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'testoc', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'testoc' ),
			)
		);

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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'testoc_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_image_size( 'whats-hot-thumb', 50, 50, true ); 
	}
endif;
add_action( 'after_setup_theme', 'testoc_setup' );


/**
 * Loads OptionTree
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter('ot_theme_options_parent_slug', '__return_false');
add_filter( 'ot_show_pages', '__return_false' ); //Hide Option tree Setting page


function custom_theme_options_page_priority() {
    return 999;
}
add_filter('ot_admin_menu_priority', 'custom_theme_options_page_priority');

function create_pcs_admin_bar_menu() {

	if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

	global $wp_admin_bar;

	$menu_id = 'pcs-theme-options';
	$wp_admin_bar->add_menu(array(
		'id' => $menu_id, 
		'title' => __('Theme Options'), 
		'href' => admin_url('admin.php?page=ot-theme-options')
	));
}
add_action('admin_bar_menu', 'create_pcs_admin_bar_menu', 999);

/**
 * Theme Options
 */
require( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function testoc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'testoc_content_width', 640 );
}
add_action( 'after_setup_theme', 'testoc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function testoc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'testoc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'testoc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'testoc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function testoc_scripts() {
	wp_enqueue_style('bootstrap',get_stylesheet_directory_uri().'/bootstrap/css/bootstrap.css');
	wp_enqueue_style('owl-carousel',get_stylesheet_directory_uri().'/js/owl-carousel/owl.carousel.css');
	wp_enqueue_style('font-awesome',get_stylesheet_directory_uri().'/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('testoc-style', get_stylesheet_directory_uri().'/css/style.css' );
	//wp_enqueue_style('responsive',get_stylesheet_directory_uri().'/css/responsive.css');
	wp_enqueue_style('animate',get_stylesheet_directory_uri().'/css/animate.min.css');
	wp_enqueue_style('google-fonts','//fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap');
	wp_enqueue_style('fancybox',get_stylesheet_directory_uri().'/css/jquery.fancybox.min.css');
	wp_enqueue_style('style', get_stylesheet_uri() );

	//wp_enqueue_style('font-awesome','https://use.fontawesome.com/releases/v5.3.1/css/all.css');


	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.2.1.1.min.js', array(), '' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array(), '', true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), '', true );
	wp_enqueue_script( 'myscript', get_template_directory_uri() . '/js/internal.js', array(), '', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'testoc_scripts' );

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

