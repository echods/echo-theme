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

$flexibleDirectory = get_template_directory() . '/flexibles';

if (have_rows('content_modules')):
    while (have_rows('content_modules')): the_row();

        // Case: Paragraph
        if (get_row_layout() == 'paragraph'):
            require "{$flexibleDirectory}/paragraph.php";

        // Case: Hero
        elseif (get_row_layout() == 'hero'):
            require "{$flexibleDirectory}/hero.php";

        endif;

    endwhile;
endif;

get_footer();
