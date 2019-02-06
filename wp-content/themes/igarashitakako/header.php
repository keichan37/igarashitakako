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

    <meta name="google-site-verification" content="18R_hQqP-k2uE9aR1imYLD3mtFYnXFdNWS-sj0-zF10" />

    <meta name="twitter:title" content="<?php bloginfo('name'); ?>">
    <meta content="<?php bloginfo('name'); ?>" property="og:title">
    <meta content="website" property="og:type">
    <meta content="<?php echo home_url(null, 'http'); ?>" property="og:url">
    <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />

    <?php if ( is_front_page() ) : ?>
      <title><?php bloginfo('name'); ?></title>
      <meta name="keywords" content="五十嵐貴子,映画宣伝,デザイン,デザイナー,グラフィックデザイナー,劇場用プログラム,ポスター,フライヤー" />
    <?php else: ?>
      <title><?php bloginfo('name'); ?> | <?php wp_title( '', true, '' ); ?></title>
      <meta content="article" property="og:type" />
      <meta name="keywords" content="五十嵐貴子,映画宣伝,デザイン,デザイナー,グラフィックデザイナー,劇場用プログラム,ポスター,フライヤー,<?php wp_title( '', true, '' ); ?>" />
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

    <?php if ( !(is_user_logged_in()) ) : ?>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133964076-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-133964076-1');
      </script>
    <?php endif; ?>

    <?php wp_head(); ?>
  </head>
  <body <?php body_class( $class ); ?>>
    <div id="wrap">
      <header>
        <a href="/" id="brand"><?php get_template_part('partials/brand'); ?></a>
        <strong id="title">五十嵐 貴子</strong>
        <?php wp_nav_menu( array('menu' => 'global_menu', 'menu_class' => 'global_menu')); ?>
        <div class="clearfix"></div>
      </header>
