<?php
/**
 * Echo functions and definitions
 *
 * @package WordPress
 * @subpackage Echo
 * @since Echo 2.0
 */

$fontUrl = 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap';

/**
 * Custom widgets for template.
 */
require get_template_directory() . '/includes/helpers.php';

/**
 * Echo only works in WordPress 5.4.2 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.4.2-alpha', '<' ) ) {
	require get_template_directory() . 'includes/lib/back-compat.php';
}

if ( ! function_exists( 'echo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own echo_setup() function to override in a child theme.
 *
 * @since Echo 2.0
 */
function echo_setup() {
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Echo, use a find and replace
	 * to change 'echo' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'echo', get_template_directory() . '/languages' );

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
	 * Enable support for custom logo.
	 *
	 *  @since Echo 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 111,
		'width'       => 229,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 1200 );

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
		'script',
		'style',
	) );

	/*
	 * Load registered navigations
	 */
	require get_template_directory() . '/includes/navs-registered.php';

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', $fontUrl ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // echo_setup
add_action( 'after_setup_theme', 'echo_setup' );

/**
 * Custom widgets for template.
 */
require get_template_directory() . '/includes/widgets.php';

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Echo 2.0
 */
function echo_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'echo_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Echo 2.0
 */
function echo_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'echo-vendor-header', get_template_directory_uri() . '/assets/js/vendor.js', array('jquery'), '20200607', false );
	wp_enqueue_script( 'echo-script', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '20200607', true );
}
add_action( 'wp_enqueue_scripts', 'echo_scripts' );

/**
 * Enqueues scripts and styles.
 *
 * @since Echo 2.0
 */
function echo_styles() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'echo-fonts', $fontUrl, array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'echo-style', get_template_directory_uri() . '/assets/css/app.css');
}
add_action( 'wp_enqueue_scripts', 'echo_styles' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Echo 2.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function echo_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'echo_body_classes' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Echo 2.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function echo_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'echo_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since echo 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function echo_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'echo_widget_tag_cloud_args' );

/**
 * Walker class include.
 */
require get_template_directory() . '/includes/BootstrapWalker.php';

