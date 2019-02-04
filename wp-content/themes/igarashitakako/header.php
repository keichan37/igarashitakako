<!doctype html>
<html>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <meta content="no-cache" http-equiv="Pragma">
    <meta content="no-cache" http-equiv="Cache-Control">
    <meta content="0" http-equiv="Expires">
    <meta content="text/css" http-equiv="Content-Style-Type">
    <meta content="text/javascript" http-equiv="Content-Script-Type">
    <meta content="index, follow" name="robots">
    <meta content="width=device-width, initial-scale=1" id="viewport" name="viewport">

    <title><?php bloginfo('name'); ?></title>
    <meta name="twitter:title" content="<?php bloginfo('name'); ?>">
    <meta content="<?php bloginfo('name'); ?>" property="og:title">
    <meta content="website" property="og:type">
    <meta content="<?php echo home_url(null, 'http'); ?>" property="og:url">
    <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />

    <?php if ( is_home() || is_front_page() ) : ?>
      <title><?php bloginfo('name'); ?></title>
    <?php else: ?>
      <title><?php wp_title( '', true, '' ); ?></title>
      <meta content="article" property="og:type" />
    <?php endif; ?>
    
    <?php if ( $post->keywords ): ?>
      <meta name="keywords" content="<?php echo esc_attr( $post->keywords ); ?>" />
    <?php else: ?>
      <meta name="keywords" content="五十嵐貴子,グラフィックデザイナー,劇場用プログラム" />
    <?php endif; ?>

    <meta content="igarashitakako" property="og:site_name">
    <meta content="<?php echo get_template_directory_uri(); ?>/OGP.jpg" property="og:image">
    <meta name="twitter:image:src" content="<?php echo get_template_directory_uri(); ?>/OGP.jpg">
    <meta content="ja_JP" property="og:locale">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/editor.css" type="text/css" media="all" />
    <link rel="stylesheet" href="https://rdgothic-icons.s3.amazonaws.com/rdgothic-icons.css" type="text/css" media="all" />
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
    <link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/apple-touch-icon.png" />
    
    <script type="text/javascript" src="//webfont.fontplus.jp/accessor/script/fontplus.js?55gB3urzk3w%3D&delay=1&aa=1&ab=2"" charset="utf-8"></script>

    <?php wp_head(); ?>
  </head>
  <body <?php body_class( $class ); ?>>
    <?php /* ?>
      <?php include_once("analyticstracking.php") ?>
    <?php */ ?>
    <div id="wrap">
      <header>
        <a href="/" id="brand"><?php get_template_part('partials/brand'); ?></a>
        <strong id="title">五十嵐 貴子</strong>
        <?php wp_nav_menu( array('menu' => 'global_menu', 'menu_class' => 'global_menu')); ?>
        <div class="clearfix"></div>
      </header>
