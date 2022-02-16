<?php

//taxonomies are post categories.

//you need to give them a unique name to reference across the site.

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