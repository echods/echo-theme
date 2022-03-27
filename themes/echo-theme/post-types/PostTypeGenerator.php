<?php

/**
 * Custom Post Type Generator Class
 *
 * Used to help generate custom post types for Wordpress.
 * @link https://github.com/echods/echo-theme
 *
 * @author  icemancast
 * @link    https://echods.com
 * @version 1.0
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * Inspired by: https://github.com/jjgrainger/wp-custom-post-type-class/blob/master/src/CPT.php
 */

class PostTypeGenerator
{

    /**
     * Post type name.
     *
     * @var string $post_type_name Holds the name of the post type.
     */
    public $postTypeName;

    /**
     * Holds the singular name of the post type. This is a human friendly
     * name, capitalized with spaces assigned on __construct().
     *
     * @var string $singular Post type singular name.
     */
    public $singular;

    /**
     * Holds the plural name of the post type. This is a human friendly
     * name, capitalized with spaces assigned on __construct().
     *
     * @var string $plural Singular post type name.
     */
    public $plural;

    /**
     * Post type slug. This is a robot friendly name, all lowercase and uses
     * hyphens assigned on __construct().
     *
     * @var string $slug Holds the post type slug name.
     */
    public $slug;

    /**
     * Post type icon. This will be the icon used as post type.
     * hyphens assigned on __construct().
     *
     * @var string $icon Holds the post type dash icon.
     */
    public $icon;

    /**
     * Post type supports. This will give the post type support array.
     * hyphens assigned on __construct().
     *
     * @var string $supports if we should need.
     */
    public $supports;

    /**
     * Post type has archive. This will give the post type an archive.
     * hyphens assigned on __construct().
     *
     * @var string $hasArchive if we should need.
     */
    public $hasArchive;

    /**
     * Post type has category taxonomy.
     * hyphens assigned on __construct().
     *
     * @var string $hasTaxonomies if we should need.
     */
    public $hasTaxonomies;

    /**
     * Post type has category taxonomy name.
     * hyphens assigned on __construct().
     *
     * @var string $taxonomyName if we should need.
     */
    public $taxonomyName;

    /**
     * Post type menu position. This will give the post type an archive.
     * hyphens assigned on __construct().
     *
     * @var string $menuPosition menu position in admin.
     */
    public $menuPosition;

    /**
     * Post type image settings. This will give the post type image settings.
     * hyphens assigned on __construct().
     *
     * @var string $menuPosition menu position in admin.
     */
    public $imageSettings;

    /**
     * Constructor
     *
     * Register a custom post type.
     *
     * @param mixed $post_type_names The name(s) of the post type, accepts (post type name, slug, plural, singular).
     * @param array $options User submitted options.
     */
    public function __construct($options = [])
    {
        $archiveDefault = true;
        $hasTaxonomies = false;
        $taxonomyName = 'category';
        $menuPositionDefault = 20;

        $this->postTypeName = $options['register_name'];
        $this->singular = $options['singular'];
        $this->plural = $options['plural'];
        $this->slug = $options['slug'];
        $this->icon = $options['icon'];

        $this->hasArchive = isset($options['has_archive']) ? $options['has_archive'] : $archiveDefault;
        $this->hasTaxonomies = isset($options['has_taxonomies']) ? $options['has_taxonomies'] : $hasTaxonomies;
        $this->taxonomyName = isset($options['taxonomy_name']) ? $options['taxonomy_name'] : $taxonomyName;
        $this->menuPosition = isset($options['menu_position']) ? $options['menu_position'] : $menuPositionDefault;

        $this->supports = isset($options['supports']) ? $options['supports'] : ['title', 'editor', 'thumbnail'];

        if ($this->hasTaxonomies) {
            add_action('init', [$this, 'registerTaxonomy'], 0);
        }

        add_action('init', [$this, 'registerPostType']);
        add_filter('enter_title_here', [$this, 'setTitleInput']);

        if ($options['has_image_modifier'] && isset($options['image_settings'])) {
            $this->imageSettings = $options['image_settings'];
            add_action('after_setup_theme', [$this, 'imageSetup']);
        }
    }

    /**
     * Register Post Type
     *
     * @see http://codex.wordpress.org/Function_Reference/register_post_type
     */
    public function registerPostType()
    {
        $labels = [
            'name'  => $this->plural,
            'singular_name' => $this->singular,
            'menu_name' => $this->plural,
            'name_admin_bar' => $this->plural,
            'add_new' => 'Add New',
            'add_new_item' => 'Add New ' . $this->singular,
            'new_item' => 'New ' . $this->singular,
            'edit_item' => 'Edit ' . $this->singular,
            'view_item' => 'View ' . $this->singular,
            'all_items' => 'All ' . $this->plural,
            'search_items' => 'Search ' . $this->plural,
            'parent_item_colon' => 'Parent ' . $this->singular,
            'not_found' => 'No ' . $this->plural . ' found.',
            'not_found_in_trash' => 'No ' . $this->plural . ' found in Trash.',
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true, // ?post_type={post_type_key}
            'show_ui' => true, // display user interface
            'show_in_nav_menus' => false, // whether post_type is avialable in navigation menus
            'show_in_menu' => true, // display in top of admin menu
            'menu_position' => $this->menuPosition,
            'menu_icon' => $this->icon,
            'query_var' => true,
            'rewrite' => ['slug' => $this->slug],
            'capability_type' => 'post',
            'has_archive' => $this->hasArchive,
            'hierarchical' => false,
            'posts_per_page' => -1,
            'supports' => $this->supports,
        ];

        // Check that the post type doesn't already exist.
        if (! post_type_exists($this->postTypeName)) {

            // Register the post type.
            register_post_type($this->postTypeName, $args);
        }
    }

    public function registerTaxonomy()
    {
        $typeKey = strtolower($this->singular);

        $labels = [
            'name'              => _x($this->singular . ' Categories', 'taxonomy general name'),
            'singular_name'     => _x($this->singular . ' Category', 'taxonomy singular name'),
            'search_items'      => __('Search ' . $this->singular . ' Categories'),
            'all_items'         => __('All ' . $this->singular . ' Categories'),
            'parent_item'       => __('Parent ' . $this->singular . ' Category'),
            'parent_item_colon' => __('Parent ' . $this->singular . ' Category:'),
            'edit_item'         => __('Edit ' . $this->singular . ' Category'),
            'update_item'       => __('Update ' . $this->singular . ' Category'),
            'add_new_item'      => __('Add New ' . $this->singular . ' Category'),
            'new_item_name'     => __('New ' . $this->singular . ' Category'),
            'menu_name'         => __($this->singular . ' Categories'),
        ];

        $args = [
            'labels'        => $labels,
            'hierarchical'  => true,
            'rewrite'       => [
                'slug' => $typeKey . '/category',
                'with_front' => false
            ]
        ];

        register_taxonomy($typeKey . '_category', $this->postTypeName, $args);
    }

    /**
     * Change title
     * @return string
     */
    public function setTitleInput($title)
    {
        $screen = get_current_screen();
        return ($this->postTypeName == $screen->post_type) ? 'Enter ' . $this->singular . ' Title' : $title;
    }

    /**
     * Setup image sizes for post type
     * @return null
     */
    public function imageSetup()
    {
        add_image_size(
            $this->imageSettings['name'],
            $this->imageSettings['width'],
            $this->imageSettings['height'],
            ['center', 'top']
        ); // (cropped)
    }

    /**
     * Flush
     *
     * Flush rewrite rules programatically
     */
    public function flush()
    {
        flush_rewrite_rules();
    }
}
