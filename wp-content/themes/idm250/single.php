
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<div class="single-body">
  <h1 class="single-title"><?php the_title(); ?>
  </h1>

  <div class="single-content">
    <?php the_content(); ?>
  </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>