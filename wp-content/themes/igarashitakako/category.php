<?php get_header(); ?>
  <div id="top">
    <div class="container">
      <?php single_cat_title(); ?></h1>
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('partials/grid'); ?>
      <?php endwhile; ?>
        <div class="clearfix"></div>
      <?php wp_reset_query();?>
    </div>
    
  </div>
  <div class="footer"> 
    <?php get_footer(); ?>
  </div>
