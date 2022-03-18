<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title(); ?></title>
        <link rel="icon" sizes="any" type="image/svg+xml" href="wp-content/themes/idm250/assets/images/svg-icons/favicon.svg">
        <?php 
            wp_head();
            include_styles();
        ?>
    </head>
    <body <?php body_class(); ?> >
    <nav>
        <?php 
        wp_nav_menu(['theme_location' => 'primary_menu']);
        ?>
        <form class="search-box" action="<?php echo home_url(); ?>" method="get">
            <input type="text" name="s" value="" placeholder="Search...">
            <input type="hidden" name="post_status[]" value="'publish'">
            <button>Go</button>
        </form>
</nav>