<?php 

function theme_scripts_and_styles(){
    // Load in the Local CSS
    wp_enqueue_style(
        'idm250-styles', // <= the name of the stylesheet
        get_template_directory_uri() . 'dist/styles/main.css',
        [],//dependencies
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

?>