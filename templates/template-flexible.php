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

        // Case : Hero Background Image CTA
        elseif (get_row_layout() == 'hero_image_cta'):
            require "{$flexibleDirectory}/hero_image_cta.php";

         // Case : Hero Background Image CTA & Image Left
         elseif (get_row_layout() == 'hero_text_image'):
            require "{$flexibleDirectory}/hero_text_image.php";


        // Case : Feature Section   
        elseif (get_row_layout() == 'features_section'):
            require "{$flexibleDirectory}/feature_section.php";

        // Case : Simple Paragraph Section   
        elseif (get_row_layout() == 'simple_section_paragraph'):
            require "{$flexibleDirectory}/simple_paragraph.php";

        // Case : Accordion List    
        elseif (get_row_layout() == 'accordion_list'):
            require "{$flexibleDirectory}/accordion_list.php";

            
                
        endif;

    endwhile;
endif;

get_footer();
