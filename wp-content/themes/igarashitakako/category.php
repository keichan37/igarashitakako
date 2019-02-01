<?php get_header(); ?>
  <div id="category">
    <div class="container">
      <h1 class=""><?php single_cat_title(); ?></h1>
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('partials/grid'); ?>
      <?php endwhile; ?>
        <div class="clearfix"></div>
      <?php wp_reset_query();?>
    </div>
  </div>
<?php get_footer(); ?>
