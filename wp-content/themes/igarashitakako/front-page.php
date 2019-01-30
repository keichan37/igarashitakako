<?php get_header(); ?>
  <div id="top">
    <div class="container">
      <?php
        $args = array(
          'paged' => $paged,
          'post_type' => 'post',
          'posts_per_page' => -1,
          'post_status' => 'publish',
          'has_password' => false,
        ); ?>
      <?php query_posts( $args ); ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php
          $thumbnail_id = get_post_thumbnail_id();
          $thumbnail_url = wp_get_attachment_image_src($thumbnail_id,'medium', true);
        ?>
        <a class="grid" href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail()): ?>
            <img class="grid-eyecatch" src="<?php echo $thumbnail_url[0]; ?>" />
          <?php else: ?>
            <img class="grid-eyecatch" src="<?php echo get_template_directory_uri(); ?>/images/sample.jpg" />
          <?php endif; ?>

          <h5 class="grid-title underline-left"><?php the_title(); ?></h5>
          <ul class="grid-category">
            <?php foreach((get_the_category()) as $cat){
            echo '<li class="class_' . $cat->slug . '">' . $cat->cat_name . '</li>';
            } ?>
          </ul>
        </a>

        <?php endwhile; ?>
        <div class="clearfix"></div>
      <?php wp_reset_query();?>
    </div>
    
  </div>
  <div class="footer"> 
    <?php get_footer(); ?>
  </div>
