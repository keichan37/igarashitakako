  <?php get_header(); ?>
    <div id="summary" class="category">
      <div class="summary-cover scroll-cover">
        <div class="container">
          <h1>
            <?php if(is_category(recruit)): ?>
              <span class="icon icon-user"></span>
            <?php elseif(is_category(column)): ?>
              <span class="icon icon-paper"></span>
            <?php elseif(is_category(event)): ?>
              <span class="icon icon-calendar"></span>
            <?php elseif(is_category(interview)): ?>
              <span class="icon icon-chat"></span>
            <?php elseif(is_category(media)): ?>
              <span class="icon icon-browser"></span>
            <?php else: ?>
              <span class="icon icon-folder"></span>
            <?php endif; ?>
            <?php single_cat_title(); ?></h1>
          <?php echo category_description(); ?>
          <i>全<?php echo $wp_query->found_posts; ?>件</i>
        </div>
      </div>
      <div class="container">
        <div class="summary-grid-wrap">
          <?php if(have_posts()): while(have_posts()):the_post(); ?>
            <?php get_template_part('partials/summary-grid'); ?>
          <?php endwhile; endif; ?>
        </div>
        <?php if (function_exists("pagination")) {
          pagination($custom_query->max_num_pages);
        } ?>
      </div>
    </div>    
      
  </div>    
  <?php get_footer(); ?>
