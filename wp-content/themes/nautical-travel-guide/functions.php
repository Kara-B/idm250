<?php 

function theme_scripts_and_styles(){
    // Load in the Local CSS
    wp_enqueue_style(
        'idm250-styles', // name of the stylesheet
        get_template_directory_uri() . '/dist/styles/main.css', // http://localhost:250/wp-content/themes/idm250-theme-02/dist/styles/main.css
        [], // dependencies
        filemtime(get_template_directory() . '/dist/styles/main.css'), // version number
        'all' // media
    );
    
    // Load in local JS {@link https://developer.wordpress.org/reference/functions/wp_enqueue_script/}
    wp_enqueue_script(
        'idm250-scripts', // name of the script
        get_template_directory_uri() . '/dist/scripts/main.js', // http://localhost:250/wp-content/themes/idm250-theme-02/dist/scripts/main.js
        [], // dependencies
        filemtime(get_template_directory() . '/dist/scripts/main.js'), // version number
        true // load in footer
    );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts_and_styles');
/*
* Enable support for Post Thumbnails on posts and pages.
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
add_theme_support('post-thumbnails');

// Add excerpt support to pages
add_post_type_support('page', 'excerpt');

/**
 * @link https://codex.wordpress.org/Navigation_Menus
 * @return void
 */
function register_theme_menus()
{
    register_nav_menus(
        [
            'primary-menu' => 'Primary Menu',
            'footer-menu' => 'Footer Menu'
        ]
    );
}
add_action('init', 'register_theme_menus');
function register_custom_post_types()
{
    // Register ___ post type
    register_post_type('event',
        [
            'labels' => [
                'name' => __('Events'),
                'singular_name' => __('Event')
            ],
            'public' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'events'],
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
        ]
    );
}

add_action('init', 'register_custom_post_types');

function register_custom_taxonomies()
{
    $args = [
        'labels' => [
            'name' => 'Event Categories',
            'singular_name' => 'Event Category',
            'search_items' => 'Search Event Categories',
            'all_items' => 'All Event Categories',
            'parent_item' => 'Parent Event Category',
            'parent_item_colon' => 'Parent Event Type:',
            'edit_item' => 'Edit Event Category',
            'update_item' => 'Update Event Category',
            'add_new_item' => 'Add New Event Category',
            'new_item_name' => 'New Event Type Name',
            'menu_name' => 'Event Categories',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'event/categories'],
        'show_in_rest' => true,
    ];

    $taxonomy_name = 'event-categories'; // name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
    $taxonomy_association = ['event']; // post types to associate with this taxonomy
    register_taxonomy($taxonomy_name, $taxonomy_association, $args);
}
add_action('init', 'register_custom_taxonomies');


/**
 * Save ACF fields to JSON in a directory in your theme
 * @return void
 */
function my_acf_json_save_point($path)
{
    $acf_directory = '/acf';
    $path = get_stylesheet_directory() . $acf_directory;
    return $path;
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

/**
 * Load ACF fields from JSON in a directory in your theme
 * @return void
 */
function my_acf_json_load_point($paths)
{
    unset($paths[0]);
    $acf_directory = '/acf';
    $paths[] = get_stylesheet_directory() . $acf_directory;
    return $paths;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function add_acf_options_page()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
        ]);
    }
}
add_action('init', 'add_acf_options_page');

function my_acf_init()
{
    // check function exists
    if (function_exists('acf_register_block')) {
        // register a testimonial block
        acf_register_block([
            'name' => 'midsection',
            'title' => __('Midsection Info'),
            'description' => __('A section for the middle of your page to display brief information.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => [ 'section', 'information', 'images'],
        ]);
        acf_register_block([
            'name' => 'page-hero',
            'title' => __('Page Hero'),
            'description' => __('A hero that is ideal for heading internal pages'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['hero', 'heading', 'header', 'images'],
        ]);
        acf_register_block([
            'name' => 'event-card',
            'title' => __('Event Card'),
            'description' => __('A card for displaying abbreviated info on the date and location of an event'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => [ 'section', 'information', 'images'],
        ]);
        acf_register_block([
            'name' => 'description',
            'title' => __('Page Description'),
            'description' => __('the description of a page, usually meant as a summary of an event'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => [ 'section', 'information', 'paragraph'],
        ]);
        acf_register_block([
            'name' => 'location-bar',
            'title' => __('Display Address'),
            'description' => __('A small block to highlight a buisnesses or events address'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => [ 'section', 'information', 'map'],
        ]);
        acf_register_block([
            'name' => 'text-divider',
            'title' => __('Title Divider'),
            'description' => __('A divider with a blue bar covering the length of the screen and custom text'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => [ 'section', 'information', 'divider', 'heading'],
        ]);
        acf_register_block([
            'name' => 'general-event',
            'title' => __('General Event'),
            'description' => __('A general block that displays a heading over an image, meant to act as a link to page with more information on an event'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => [ 'section', 'information', 'block', 'heading', 'image'],
        ]);
    }
}
add_action('acf/init', 'my_acf_init');
function my_acf_block_render_callback($block)
{
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);
    $block_directory = '/blocks';

    // include a template part from within the "blocks/{name-of-block.php}"
    if (file_exists(get_theme_file_path("{$block_directory}/{$slug}.php"))) {
        include get_theme_file_path("{$block_directory}/{$slug}.php");
    }
}


?>

