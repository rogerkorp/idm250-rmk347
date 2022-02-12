<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Roger Korpics</title>
        <link rel="icon" sizes="any" type="image/svg+xml" href="">
        <?php 
            wp_head();
            include_styles();
        ?>
    </head>
    <body <?php body_class(); ?> >
        <?php 
        wp_nav_menu(['theme_location' => 'primary_menu'])
        ?>