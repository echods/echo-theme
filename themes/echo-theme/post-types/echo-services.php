<?php

if (!defined('ECHO_SERVICES_DIR')) {
    define('ECHO_SERVICES_DIR', dirname(__FILE__));
}

/**
 * Post Type Setting
 * @return null
 */
function echo_services_posttypes()
{
    $labels = [
        'name'  => 'Services',
        'singular_name' => 'Services',
        'menu_name' => 'Services',
        'name_admin_bar' => 'Services',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Service',
        'new_item' => 'New Service',
        'edit_item' => 'Edit Service',
        'view_item' => 'View Service',
        'all_items' => 'All Services',
        'search_items' => 'Search Services',
        'parent_item_colon' => 'Parent Service',
        'not_found' => 'No services found.',
        'not_found_in_trash' => 'No services found in Trash.',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true, // ?post_type={post_type_key}
        'show_ui' => true, // display user interface
        'show_in_nav_menus' => false, // whether post_type is avialable in navigation menus
        'show_in_menu' => true, // display in top of admin menu
        'menu_position' => 23,
        'menu_icon' => 'dashicons-admin-tools',
        'query_var' => true,
        'rewrite' => ['slug' => 'services'],
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'posts_per_page' => -1,
        'supports' => ['title', 'editor', 'thumbnail']
    ];
    register_post_type('echo_services', $args);
}
add_action('init', 'echo_services_posttypes');

/**
 * Flush rewrite rules
 * @return null
 */
function echo_services_flush()
{
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry,
    // when you add a post of this CPT.
    echo_services_posttypes();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'echo_services_flush');

/**
 * Change title
 * @return string
 */
function echo_services_title($title)
{
    $screen = get_current_screen();
    return ('echo_services' == $screen->post_type) ? 'Enter Service Title' : $title;
}
add_filter('enter_title_here', 'echo_services_title');

/**
 * Get all post type query
 * @return object
 */
function get_echo_services()
{
    $args = [
        'post_type' => 'echo_services',
        'posts_per_page' => -1, // Unlimited query set this number
    ];

    return new WP_Query($args);
}

/**
 * Get all post type image setup
 * @return null
 */
add_action('after_setup_theme', 'echo_services_image_setup');
function echo_services_image_setup()
{
    add_image_size('echo-services', 400, 600, array( 'center', 'top' )); // (cropped)
}
