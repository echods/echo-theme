<?php

/**
 * Get all team query
 *
 * @return object
 */
function get_echo_team_members()
{
    $args = [
    'post_type' => 'echo_team',
    'posts_per_page' => -1, // Unlimited query set this number
  ];

    return new WP_Query($args);
}

/**
 * Change title
 *
 * @return string
 */
function echo_change_team_title($title)
{
    $screen = get_current_screen();
    return ('echo_team' == $screen->post_type) ? 'Enter Staff Member' : $title;
}
add_filter('enter_title_here', 'echo_change_team_title');

/**
 * Get all team image setup
 *
 * @return object
 */
add_action('after_setup_theme', 'echo_team_image_setup');
function echo_team_image_setup()
{
    add_image_size('echo-team', 400, 600, array( 'center', 'top' )); // (cropped)
}
