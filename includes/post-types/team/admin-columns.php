<?php

/*-------------------------------------------------------------------------------
    Custom Columns
-------------------------------------------------------------------------------*/

function my_echo_team_columns($columns)
{
    $columns = array(
        'cb'        => '<input type="checkbox" />',
        'title'     => 'Title',
        'email'  => 'Email',
        'date'      =>  'Date',
    );
    return $columns;
}

function my_custom_columns($column)
{
    global $post;
    if ($column == 'email') {
        the_field('email');
    }
}

add_action("manage_echo_team_posts_custom_column", "my_custom_columns");
add_filter("manage_edit-echo_team_columns", "my_echo_team_columns");
