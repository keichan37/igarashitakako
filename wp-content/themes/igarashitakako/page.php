<?php /* Template Name: 固定ページ */ ?>

  <?php get_header(); ?>
    <div id="common">
      <div class="container">
        <h1 id="page-h1"><?php the_title(); ?></h1>
        <div class="page-wrap">
          <?php while(have_posts()): the_post(); ?>
            <section>
              <div class="page-content"><?php the_content(); //本文 ?></div>
            </section>
          <?php endwhile; ?>
        </div>    
      
      </div>
    </div>
    <?php get_footer(); ?>
