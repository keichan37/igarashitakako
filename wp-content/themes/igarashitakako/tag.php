<?php get_header(); ?>
  <div id="tag">
    <div class="container">
      <h1><?php single_tag_title(); ?></h1>
      <?php if(have_posts()): while(have_posts()):the_post(); ?>
        <?php get_template_part('partials/grid'); ?>
      <?php endwhile; endif; ?>
      <?php if (function_exists("pagination")) {
        pagination($custom_query->max_num_pages);
      } ?>
    </div>
  </div>    
<?php get_footer(); ?>
