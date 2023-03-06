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
    register_post_type('albums',
        [
            'labels' => [
                'name' => __('Albums'),
                'singular_name' => __('Album')
            ],
            'public' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'albums'],
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
            'name' => 'Business Categories',
            'singular_name' => 'Business Category',
            'search_items' => 'Search Business Categories',
            'all_items' => 'All Business Categories',
            'parent_item' => 'Parent Business Category',
            'parent_item_colon' => 'Parent Business Type:',
            'edit_item' => 'Edit Business Category',
            'update_item' => 'Update Business Category',
            'add_new_item' => 'Add New Business Category',
            'new_item_name' => 'New Business Type Name',
            'menu_name' => 'Business Categories',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'business/categories'],
        'show_in_rest' => true,
    ];

    $taxonomy_name = 'business-categories'; // name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
    $taxonomy_association = ['business']; // post types to associate with this taxonomy
    register_taxonomy($taxonomy_name, $taxonomy_association, $args);
}
add_action('init', 'register_custom_taxonomies');
?>

