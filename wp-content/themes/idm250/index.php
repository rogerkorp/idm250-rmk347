<?php get_header(); ?>



<div class="portfolio-body">
  <div class="portfolio-display-grid">

<?php
      $search_word = $_GET['s'];
      $post_type = $_GET['post_type'];

      $args = [
          's' => $search_word,
          'post_type' => $post_type,
        ];

      $search_query = new WP_Query($args);
      
      if ($search_query->have_posts()){
          while ($search_query->have_posts()) : $search_query->the_post(); ?>

            <a href="<?php the_permalink()?>" class="portfilio-listing-container">
                <?php echo get_the_post_thumbnail() ?>
                <div class="portfilio-listing-bottom-half"><h2><?php the_title(); ?></h2></div>
            </a>


         <?php endwhile;
          wp_reset_postdata();
      } else {
        echo '</div><p class="no-results-found">Sorry! We found no results. Try searching for something else?</p>';
      };

    ?>
        </div>
    </div>
<?php get_footer(); ?>