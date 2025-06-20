<?php

/**
 * wp-tailwind functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_tailwind
 */

use wp_tailwind\Core\Init;
use wp_tailwind\Fields\ACF;

if (!defined('DPS_DIR_PATH')) {
	define('DPS_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('DPS_DIR_URI')) {
	define('DPS_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('WP_TAILWIND_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('WP_TAILWIND_VERSION', '0.2.0');
}

if (!defined('WP_TAILWIND_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `wp_tailwind_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'WP_TAILWIND_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if (!function_exists('wp_tailwind_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_tailwind_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wp-tailwind, use a find and replace
		 * to change 'wp-tailwind' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('wp-tailwind', get_template_directory() . '/languages');

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

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'wp-tailwind'),
				'menu-2' => __('Footer Menu', 'wp-tailwind'),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'wp_tailwind_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_tailwind_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', 'wp-tailwind'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'wp-tailwind'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'wp_tailwind_widgets_init');

/**
 * Enqueue the block editor script.
 */
function wp_tailwind_enqueue_block_editor_script()
{
	wp_enqueue_script(
		'wp-tailwind-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		WP_TAILWIND_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', 'wp_tailwind_enqueue_block_editor_script');

/**
 * Enqueue scripts and styles.
 */
function wp_tailwind_scripts()
{
	wp_enqueue_style('wp-tailwind-style', get_stylesheet_uri(), array(), WP_TAILWIND_VERSION);
	wp_enqueue_script('wp-tailwind-script', get_template_directory_uri() . '/js/script.min.js', array(), WP_TAILWIND_VERSION, true);
	wp_enqueue_script('font-awesome-kit', 'https://kit.fontawesome.com/36d832afa0.js', array(), WP_TAILWIND_VERSION, true);

	/**
	 * Swiper Scripts and styles
	 */
	wp_enqueue_style('swiper-styles', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), WP_TAILWIND_VERSION);


	/**
	 * AOS and styles
	 */
	wp_enqueue_style('aos-styles', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), WP_TAILWIND_VERSION);
	wp_enqueue_script('aos-js', 'https://unpkg.com/aos@next/dist/aos.js', array(), WP_TAILWIND_VERSION, true);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'wp_tailwind_scripts', 100);

/**
 * Enqueue the script necessary to support Tailwind Typography in the block
 * editor, using an inline script to create a JavaScript array containing the
 * Tailwind Typography classes from WP_TAILWIND_TYPOGRAPHY_CLASSES.
 */
function wp_tailwind_enqueue_typography_script()
{
	if (is_admin()) {
		wp_enqueue_script(
			'wp-tailwind-typography',
			get_template_directory_uri() . '/js/tailwind-typography-classes.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			WP_TAILWIND_VERSION,
			true
		);
		wp_add_inline_script('wp-tailwind-typography', "tailwindTypographyClasses = '" . esc_attr(WP_TAILWIND_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}
add_action('enqueue_block_assets', 'wp_tailwind_enqueue_typography_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function wp_tailwind_tinymce_add_class($settings)
{
	$settings['body_class'] = WP_TAILWIND_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'wp_tailwind_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/Interfaces/WordPressHooks.php';

require get_template_directory() . '/Fields/ACF.php';

require get_template_directory() . '/Core/Init.php';

/**
 * Registering Custom Blocks
 */

if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types()
{
	// Define the directory path where your block files are located
	$block_directory = __DIR__ . '/Blocks';

	// Get a list of all PHP files in the directory
	$block_files = glob("$block_directory/**/");

	foreach ($block_files as $block_file) {
		register_block_type($block_file);
	}
}

/**
 * Add SVG to upload
 */
function ccMimeTypes($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_action('upload_mimes', 'ccMimeTypes');

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);

function fontawesome_icon_dashboard()
{
	echo "<style type='text/css' media='screen'>
      #adminmenu #menu-posts-press div.wp-menu-image:before {
	 font-family:'FontAwesome' !important; content:'\f0a4'; }	
	 </style>";
}
add_action('admin_head', 'fontawesome_icon_dashboard');
