<?php get_header(); ?>
  <div id="single">
    <div class="container thin-container">
      <?php while(have_posts()): the_post(); ?>
        <article>
          <div class="single-content mce-content-body">
            <h1 class="single-title"><?php the_title(); ?></h1>
            <ul class="grid-category">
              <?php
                $cats = get_the_category();
                foreach($cats as $cat):
                if($cat->parent) echo '<li class="class_' . $cat->slug . '">' . $cat->cat_name . '</li>';
                endforeach;
              ?>
            </ul>
          <?php if ( !post_password_required( $post->ID ) ) : // パスワード保護?>
            <?php the_content(); //本文 ?>
          <?php endif; //パスワード保護 ?>
          </div>

        </article>
      <?php endwhile; ?>
      <?php if (get_previous_post()):?>
        <?php previous_post_link('%link','%title <i class="icon icon-rightArrow"></i>',TRUE); ?>
      <?php endif; ?>
      <?php if (get_next_post()):?>
        <?php next_post_link('%link','<i class="icon icon-leftArrow"></i> %title',TRUE); ?>
      <?php endif; ?>
  </div>    
</div>    
    
<?php get_footer(); ?>
