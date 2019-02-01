<?php get_header(); ?>
  <div id="top">
    <div class="container">
      <?php
        $args = array(
          'paged' => $paged,
          'post_type' => 'post',
          'posts_per_page' => -1,
          'category_name' => 'portfolio',
          'post_status' => 'publish',
          'has_password' => false,
      );?>
      <?php query_posts( $args ); ?>
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
