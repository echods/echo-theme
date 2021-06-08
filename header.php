<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Echo
 * @since Echo 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="h-100">
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Favicons -->
    <link rel="icon" href="<?php echo get_template_directory(); ?>/favicon.ico">

    <?php wp_head(); ?>
</head>

<body <?php body_class('d-flex flex-column h-100'); ?>>
<?php wp_body_open(); ?>

<?php get_template_part('partials/header/site-header'); ?>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <!-- <div class="container"> -->
