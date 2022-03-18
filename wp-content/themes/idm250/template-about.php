
<?php
/* Template Name: About Page
*/
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<div class="about-body">
  <?php if (has_post_thumbnail() ):
    echo get_the_post_thumbnail();
  endif;
  ?>
  <h1 class="about-title" style="background-color: <?php the_field('color'); ?>;"><?php the_title(); ?></h1>

  <div class="about-content">
    <?php the_content(); ?>
  </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>