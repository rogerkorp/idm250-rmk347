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
     'style', get_stylesheet_uri()
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

?>