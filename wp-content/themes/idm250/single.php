
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<div class="single-body">
  <?php if (has_post_thumbnail() ):
    echo get_the_post_thumbnail();
  endif;
  ?>
  <h1 class="single-title" style="background-color: <?php the_field('color'); ?>;"><?php the_title(); ?></h1>
  <p class="single-title-date"><?php the_date()?></p>

  <div class="single-content">
    <?php the_content(); ?>
  </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>