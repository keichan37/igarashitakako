        <?php
          $thumbnail_id = get_post_thumbnail_id();
          $thumbnail_url = wp_get_attachment_image_src($thumbnail_id,'large', true);
        ?>
        <a class="grid" href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail()): ?>
            <img class="grid-eyecatch" src="<?php echo $thumbnail_url[0]; ?>" />
          <?php else: ?>
            <img class="grid-eyecatch" src="<?php echo get_template_directory_uri(); ?>/images/sample.jpg" />
          <?php endif; ?>

          <h5 class="grid-title"><?php the_title(); ?></h5>
          <ul class="grid-category">
            <?php
              $cats = get_the_category();
              foreach($cats as $cat):
              if($cat->parent) echo '<li class="class_' . $cat->slug . '">' . $cat->cat_name . '</li>';
              endforeach;
            ?>
          </ul>
        </a>
