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

?>