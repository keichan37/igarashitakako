<?php /* Template Name: 投稿ページ */ ?>

  <?php get_header(); ?>
    <div id="common">
      <div class="container">
        <div class="single-wrap">
          <div class="single">
            <div class="single-left">
              <?php while(have_posts()): the_post(); ?>
                <article>
                  <?php
                    $category = get_the_category();
                    $cat_id   = $category[0]->cat_ID;
                    $cat_name = $category[0]->cat_name;
                    $cat_slug = $category[0]->category_nicename;
                  ?>
                  <h1 class="single-title"><?php the_title(); ?></h1>

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
          </div>
        </div>    
      </div>    
      
    </div>
    <?php get_footer(); ?>
