<?php

if(version_compare('7.4', phpversion(), '>')){
    die('You must be using PHP 7.4 or greater.');
}

if(version_compare($GLOBALS['wp_version'], '5.4.2', '<')){
    die('You must be using WordPress 5.4.2 or greater. Please upgrade your WordPress');
}

//These lines are good practice to have here.
//They compare the version someone's using to run your theme with these numbers.
//If the numbers are too low, the site will kill itself, forcing them to upgrade.
//You should do this because you might be using syntax and features that are specific to that version of wordpress, meaning older versions might break.
//Set these ground rules early, it should be here from the start.


function include_styles(){
    wp_enqueue_style(
     'style', get_template_directory_uri() . '/style.css'/* , //google normalize CDN for a perma-link to stylesheets
     [],
     time() */  // REMOVE THESE TWO LINES ON LIVE
    );
}

add_action('wp_enqueue_style','include_styles');

function include_js(){
    wp_enqueue_script(
        'script.js',
        get_template_directory_uri() . '/dist/scripts/main.js',
        [], // $deps
        false, // $version
        true // $in_footer
    );
}

add_action('wp_enqueue_scripts','include_js');

function register_theme_navigation(){
    [
        'primary_menu' => 'Primary Menu' //you can have multiple, but you only need one.
    ];
}

add_action('after_setup_theme', 'register_theme_navigation');

function render_menu($menu_name){
    if (!$menu_name){
        return;
    }

    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id, ['order' => 'DESC']);
    return $menu_items;

}

function nd_dosth_theme_setup(){
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'nd_dosth_theme_setup');

function add_post_thumbnails_support(){
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'add_post_thumbnails_support');


function register_custom_post_type()
{
    $args = [
        'label' => 'Project',
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project'
        ],
        'supports' => [
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'page-attributes',
            'post-formats'
        ],
        // 'taxonomies'            => ['category', 'post_tag'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_in_rest' => true,
        'rewrite' => [ //without this, it will just use the registered post type by default. 
            'slug' => 'projects'
        ],
        // Dash Icons https://developer.wordpress.org/resource/dashicons/#media-audio
        'menu_icon' => 'dashicons-clipboard'
        // 'menu_icon'             => get_stylesheet_directory_uri() . '/static/images/icons/industries.png'
    ];

    register_post_type('idm-projects', $args);
//('projects' is a custom prefix and can be anything you want. It's important to use these to avoid conflicts.)

}

add_action('init', 'register_custom_post_type'); //This calls a function that creates a custom post type.



function register_taxonomies(){

    $labels = [
        'name' => _x('Test Catergory', 'taxonomy general name'),
        'singular_name' => _x('Test', 'taxonomy singular name'),
        'search_items' => __('Search Test'),
        'all_items' => __('All Test'),
        'parent_item' => __('Parent Test'),
        'parent_item_colon' => __('Parent Test:'),
        'edit_item' => __('Edit Test'),
        'update_item' => __('Update Test'),
        'add_new_item' => __('Add New Test'),
        'new_item_name' => __('New Test Name'),
        'menu_name' => __('Test'),
    ];

    // Now register the taxonomy
    register_taxonomy('idm-projects', ['idm-projects'], [
        'hierarchical' => true, //Should there be a hierarchy/children?
        'labels' => $labels, //Adds stuff from above.
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'idm-projects'],
    ]);


}

add_action('init', 'register_taxonomies', 0); //to register a custom taxonomy, 

?>