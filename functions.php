<?php

/**
 * Pet Love This functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pet_Love_This
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function petlovethis_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Pet Love This, use a find and replace
		* to change 'petlovethis' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('petlovethis', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'petlovethis'),
			'menu-2' => esc_html__('Top Menu', 'petlovethis'),
			'menu-3' => esc_html__('Footer About Menu', 'petlovethis'),
			'menu-4' => esc_html__('Footer Discover', 'petlovethis'),
			'archive-categories' => esc_html__('Archive Top Categories', 'petlovethis'),
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
			'petlovethis_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
}
add_action('after_setup_theme', 'petlovethis_setup');





/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function petlovethis_content_width()
{
	$GLOBALS['content_width'] = apply_filters('petlovethis_content_width', 640);
}
add_action('after_setup_theme', 'petlovethis_content_width', 0);


/**
 *  Set custom image sizes
 * 
 */

add_action('after_setup_theme', 'custom_image_sizes');

function custom_image_sizes()
{
	add_image_size('lg_card_image', 600, 300, true);
	add_image_size('md_card_image', 324, 226, true);
	add_image_size('sm_card_image', 155, 103, true);
	add_image_size('xs_card_image', 155, 103, true);
	add_image_size('hero_image', 470, 310, true);
}



// Custom Logo

function petlovethis_custom_logo($img_classes = '')
{
	$logo = get_custom_logo();
	$logo_without_anchor_tag = preg_replace('/<a.*?>|<\/a>/', '', $logo); // Remove the anchor tag
	$logo_with_img_classes = str_replace('custom-logo', 'custom-logo ' . $img_classes, $logo_without_anchor_tag);
	echo $logo_with_img_classes;
}



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function petlovethis_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Footer 1', 'petlovethis'),
			'id'            => 'footer-1',
			'description'   => esc_html__('Add widgets here.', 'petlovethis'),
			'before_widget' => '<div id="%1$s" class="widget %2$s flex flex-col gap-8  text-white">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'petlovethis_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function petlovethis_scripts()
{

	wp_enqueue_style('petlovethis-style', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'));

	$script_path = get_template_directory() . '/js/navigation.js';
	$script_uri = get_template_directory_uri() . '/js/navigation.js';
	$script_version = filemtime($script_path);

	wp_enqueue_script('petlovethis-navigation', $script_uri, array(), $script_version, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'petlovethis_scripts');

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


require get_template_directory() . '/inc/shortcode.php';



require get_template_directory() . '/inc/widgets/detailed-about-us.php';


require get_template_directory() . '/inc/custom-function.php';



/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


function petlovesthis_fix_category_pagination($query_string = array())
{
	if (
		isset($query_string['category_name'])
		&& isset($query_string['name']) && $query_string['name'] === 'page'
		&& isset($query_string['page'])
	) {
		$paged = trim($query_string['page'], '/');
		if (is_numeric($paged)) {
			// we are not allowing 'page' as a page or post slug 
			unset($query_string['name']);
			unset($query_string['page']);

			// for a category archive, proper pagination query string  is 'paged'
			$query_string['paged'] = (int) $paged;
		}
	}
	return $query_string;
}
add_filter('request', 'petlovesthis_fix_category_pagination');
