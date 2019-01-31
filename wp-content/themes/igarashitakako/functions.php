
<?php

/* アイキャッチ */
add_theme_support( 'post-thumbnails' );

add_filter( 'previous_posts_link_attributes', 'add_prev_posts_link_class' );
function add_prev_posts_link_class() {
  return 'class="prev-link"';
}
add_filter( 'next_posts_link_attributes', 'add_next_posts_link_class' );
function add_next_posts_link_class() {
  return 'class="next-link"';
}

?>
