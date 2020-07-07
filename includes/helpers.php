<?php

/*
 * Dump and die for debugging
 */
function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

/**
 * Function to return theme image file path
 *
 * @since Echo 2.0
 */
function echo_image($image) {
    $directory = get_template_directory_uri();
    echo "{$directory}/assets/img/{$image}";
}
