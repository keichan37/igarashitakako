<?php

add_theme_support( 'post-thumbnails' );
add_theme_support('menus');

add_filter( 'previous_post_link', 'add_prev_post_link_class' );
function add_prev_post_link_class($output) {
  return str_replace('<a href=', '<a class="prev-link" href=', $output);
}
add_filter( 'next_post_link', 'add_next_post_link_class' );
function add_next_post_link_class($output) {
  return str_replace('<a href=', '<a class="next-link" href=', $output);
}
add_action( 'wp_footer', 'mycustom_wp_footer' );
  
function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '/contact/thanks';
}, false );
</script>
<?php
}
?>

