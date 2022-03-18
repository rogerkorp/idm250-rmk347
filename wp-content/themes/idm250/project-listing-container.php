<?php

    $featured_image = get_post_thumbnail_id();
    if (!$featured_image) {
        $featured_image['alt'] = 'Missing Image';
        $featured_image['src'] = '//via.placeholder.com/1058x705';
    };

    $project_categories = get_the_terms(get_the_ID(), 'idm-projects');
?>

<a href="<?php the_permalink(); ?>" class="portfilio-listing-container">
            <div class="portfilio-listing-upper-half">
                <img src="<?php echo $featured_image['src']; ?>"  alt="<?php echo $featured_image['alt']; ?>" >
            </div>
            <div class="portfilio-listing-bottom-half"><h2><?php the_title(); ?></h2></div>
            <?php if ($project_categories) {
                $total = count($project_categories) - 1;
                foreach ($project_categories as $key => $category) {
                    $category_link = get_term_link($category->term_id);
                    echo "<span class='portfilio-listing-container__tag'><a href='$category_link'>$category->name</a></span>";
            // Add comma after every loop. Let's not add it to the last item in the loop
                    if ($key != $total) {
                        echo ', ';
                    }
                }
            }
        ?>
    </a>