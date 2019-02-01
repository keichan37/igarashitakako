<?php get_header(); ?>
  <div id="page">
    <div class="container thin-container">
      <?php while(have_posts()): the_post(); ?>
        <section>
          <div class="page-content">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); //本文 ?>
          </div>
        </section>
      <?php endwhile; ?>
    </div>    
  </div>
<?php get_footer(); ?>
