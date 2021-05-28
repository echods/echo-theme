<?php
/**
 * Template Name: Flexible Content
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Echo
 * @since Echo 1.0
 */

get_header();

/**
 * Scan for flexible contents
 */
$directory = get_template_directory() . '/flexibles';
$files = scandir($directory);
dd($files);

get_footer();
