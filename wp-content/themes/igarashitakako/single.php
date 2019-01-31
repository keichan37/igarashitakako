<?php /* Template Name: 投稿ページ */ ?>

  <?php get_header(); ?>
    <div id="common">
      <div class="container">
        <div class="single-wrap">
          <div class="single">
            <div class="single-left">
              <?php while(have_posts()): the_post(); ?>
                <article>
                  <h1 class="single-title"><?php the_title(); ?></h1>

                  <ul class="grid-category">
                    <?php foreach((get_the_category()) as $cat){
                    echo '<li class="class_' . $cat->slug . '">' . $cat->cat_name . '</li>';
                    } ?>
                  </ul>
                  <ul>

                  <?php if ( !post_password_required( $post->ID ) ) : // パスワード保護?>

                    <?php
                      $thumbnail_id = get_post_thumbnail_id();
                      $thumbnail_url = wp_get_attachment_image_src($thumbnail_id,'large', true); //アイキャッチのURL取得
                    ?>
                    <?php if (has_post_thumbnail()): ?>
                      <img class="single-eyecatch" src="<?php echo $thumbnail_url[0]; ?>">
                    <?php else: ?>
                    <?php endif; ?>

                    <div class="single-content mce-content-body">
                  <?php endif; //パスワード保護 ?>

                      <?php the_content(); //本文 ?>

                  <?php if ( !post_password_required( $post->ID ) ) : // パスワード保護?>
                    </div>
                  <?php endif; //パスワード保護 ?>

                </article>
              <?php endwhile; ?>
            </div>
            <?php if (get_previous_post()):?>
              <?php previous_post_link('%link','<i class="icon icon-leftArrow"></i> %title',TRUE); ?>
            <?php endif; ?>
            <?php if (get_next_post()):?>
              <?php next_post_link('%link','%title <i class="icon icon-rightArrow"></i> ',TRUE); ?>
            <?php endif; ?>
          </div>
        </div>    
      </div>    
      
    </div>
    <?php get_footer(); ?>
