<?php
/* Template Name: Portfolio List
*/
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<div class="">

  <div class="portfolio-body">
    <?php the_content(); ?>

    <div class="portfolio-display-grid">
      
      <div class="portfilio-listing-container">
        <div class="portfilio-listing-upper-half"></div>
        <div class="portfilio-listing-bottom-half"><h2>Title of Piece</h2></div>
      </div>

      <div class="portfilio-listing-container">
        <div class="portfilio-listing-upper-half"></div>
        <div class="portfilio-listing-bottom-half"><h2>Title of Piece</h2></div>
      </div>

      <div class="portfilio-listing-container">
        <div class="portfilio-listing-upper-half"></div>
        <div class="portfilio-listing-bottom-half"><h2>Title of Piece</h2></div>
      </div>

      <div class="portfilio-listing-container">
        <div class="portfilio-listing-upper-half"></div>
        <div class="portfilio-listing-bottom-half"><h2>Title of Piece</h2></div>
      </div>

      <div class="portfilio-listing-container">
        <div class="portfilio-listing-upper-half"></div>
        <div class="portfilio-listing-bottom-half"><h2>Title of Piece</h2></div>
      </div>

      <div class="portfilio-listing-container">
        <div class="portfilio-listing-upper-half"></div>
        <div class="portfilio-listing-bottom-half"><h2>Title of Piece</h2></div>
      </div>

    </div>
  </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>