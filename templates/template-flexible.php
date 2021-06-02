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

if (have_rows('content_modules')):
    while (have_rows('content_modules')): the_row();

        /**
         * Scan for flexible contents
         */
        $directory = get_template_directory() . '/flexibles';
        $files = scandir($directory);
        $files = array_diff($files, ['.','..']);

        foreach ($files as $file) {
            require "{$directory}/{$file}";
        }

    endwhile;
endif;

get_footer();
