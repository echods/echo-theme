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
    require get_template_directory() . '/settings/back-compat.php';
}

// Theme starter functions.
require get_template_directory() . '/settings/theme.php';

// Helper functions.
require get_template_directory() . '/settings/helpers.php';

// Boostrap Walker
require get_template_directory() . '/settings/class-bootstrap-navwalker.php';

// Load registered navigations
require get_template_directory() . '/settings/register-navs.php';

// Load registered navigations
require get_template_directory() . '/settings/register-widgets.php';

// Load load advanced custom fields settings
require get_template_directory() . '/settings/plugins/advanced-custom-fields.php';

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

    // Load jQuery
    wp_enqueue_script("jquery");

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

/*
* All Custom Post Types
*/
require get_template_directory() . '/post-types/types.php';
