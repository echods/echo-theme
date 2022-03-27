<?php

/*
* Post Type Generator Class
*/
require get_template_directory() . '/post-types/PostTypeGenerator.php';

/*
* Register Post Types
*/
$postTypes = require get_template_directory() . '/post-types/register-types.php';

/*
 * Loop through registered post types
 */
foreach ($postTypes as $type) {
    $generate = new PostTypeGenerator($type);
    $generate->flush();
}
