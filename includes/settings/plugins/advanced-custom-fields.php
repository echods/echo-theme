<?php

/**
 * Advanced custom fields global options
 */
if (function_exists('acf_add_options_page')) {

    /*
        Add settings to custom post type menu
     */
    acf_add_options_sub_page(array(
        'page_title'     => 'Resource Settings',
        'menu_title'    => 'Settings',
        'parent_slug'    => 'edit.php?post_type=echo_team',
    ));

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Global Settings',
        'menu_title'    => 'Global',
        'parent_slug'   => 'theme-general-settings',
    ));
}
