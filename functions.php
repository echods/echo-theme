<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Echo
 * @since Echo 1.0
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
    require get_template_directory() . '/includes/back-compat.php';
}

// Helper functions.
require get_template_directory() . '/includes/helpers.php';

// Load registered navigations
require get_template_directory() . '/includes/settings/register-navs.php';

// Load registered navigations
require get_template_directory() . '/includes/settings/register-widgets.php';

// if (! function_exists('echo_setup')) {
//     /**
//      * Sets up theme defaults and registers support for various WordPress features.
//      *
//      * Note that this function is hooked into the after_setup_theme hook, which
//      * runs before the init hook. The init hook is too late for some features, such
//      * as indicating support for post thumbnails.
//      *
//      * @since Echo 1.0
//      *
//      * @return void
//      */
//     function echo_setup()
//     {
//         /*
//          * Make theme available for translation.
//          * Translations can be filed in the /languages/ directory.
//          * If you're building a theme based on Echo, use a find and replace
//          * to change 'echo' to the name of your theme in all the template files.
//          */
//         load_theme_textdomain('echo', get_template_directory() . '/languages');

//         // Add default posts and comments RSS feed links to head.
//         add_theme_support('automatic-feed-links');

//         /*
//          * Let WordPress manage the document title.
//          * This theme does not use a hard-coded <title> tag in the document head,
//          * WordPress will provide it for us.
//          */
//         add_theme_support('title-tag');

//         /**
//          * Add post-formats support.
//          */
//         add_theme_support(
//             'post-formats',
//             array(
//                 'link',
//                 'aside',
//                 'gallery',
//                 'image',
//                 'quote',
//                 'status',
//                 'video',
//                 'audio',
//                 'chat',
//             )
//         );

//         /*
//          * Enable support for Post Thumbnails on posts and pages.
//          *
//          * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
//          */
//         add_theme_support('post-thumbnails');
//         set_post_thumbnail_size(1568, 9999);

//         /*
//          * Switch default core markup for search form, comment form, and comments
//          * to output valid HTML5.
//          */
//         add_theme_support(
//             'html5',
//             array(
//                 'comment-form',
//                 'comment-list',
//                 'gallery',
//                 'caption',
//                 'style',
//                 'script',
//                 'navigation-widgets',
//             )
//         );

//         // Add theme support for selective refresh for widgets.
//         add_theme_support('customize-selective-refresh-widgets');

//         // Add support for full and wide align images.
//         add_theme_support('align-wide');

//         // Add support for responsive embedded content.
//         add_theme_support('responsive-embeds');

//         // Add support for custom line height controls.
//         add_theme_support('custom-line-height');

//         // Add support for custom units.
//         // This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
//         add_theme_support('custom-units');
//     }
// }
// add_action('after_setup_theme', 'echo_setup');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Echo 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function echo_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('echo_content_width', 750);
}
add_action('after_setup_theme', 'echo_content_width', 0);

/**
 * Enqueue scripts and styles.
 *
 * @since Echo 1.0
 *
 * @return void
 */
function echo_scripts()
{
    wp_enqueue_style('echo-style', get_template_directory_uri() . '/assets/css/app.css', array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('echo-style-override', get_template_directory_uri() . '/assets/css/override.css', array(), wp_get_theme()->get('Version'));

    // Main js script
    wp_enqueue_script(
        'echo-script',
        get_template_directory_uri() . '/assets/js/app.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );

    // Main js script
    wp_enqueue_script(
        'echo-script-override',
        get_template_directory_uri() . '/assets/js/override.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'echo_scripts');
