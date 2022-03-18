<?php
/* Template Name: IDM Projects List
*/
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<div class="">

  <div class="portfolio-body">
  <div class="portfolio-display-grid">
    <?php the_content(); ?>

    <?php 
    // the query
    $wpb_all_query = new WP_Query(array('post_type'=>'idm-projects', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
    
    <?php if ( $wpb_all_query->have_posts() ) : ?>
    
        <!-- the loop -->
        <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        
            <a href="<?php the_permalink()?>" class="portfilio-listing-container">
              <?php echo get_the_post_thumbnail() ?>
              <div class="portfilio-listing-bottom-half"><h2><?php the_title(); ?></h2></div>
          </a>

        
        <?php endwhile; 
        the_posts_pagination(
          [
              'mid_size' => 2,
              'prev_text' => 'Previous',
              'next_text' => 'Next'
          ]
      );?>
        <!-- end of the loop -->
    
    
        <?php wp_reset_postdata(); ?>
    
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>


    </div>
  </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>