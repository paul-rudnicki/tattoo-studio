<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="ie9"><![endif]-->


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="format-detection" content="telephone=no">
  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico">  

  <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <![endif]-->
  
  <?php wp_head(); ?>

</head>

<!-- Body -->

<body <?php body_class(); ?>>

  <!-- Header -->

  <header>

    <?php get_template_part('templates/nav/mobile'); ?>

    <?php if (is_page()): ?>
      
      <?php if (get_post_meta(get_the_ID(), 'tattoo_page_headers_menu', true) != 'hamburger'): ?>

        <?php get_template_part('templates/nav/top'); ?>

      <?php else : ?>

      <?php get_template_part('templates/nav/hamburger'); ?>

      <?php endif ?>

    <?php else: ?>

        <?php get_template_part('templates/nav/top'); ?>
        
    <?php endif ?>

  </header>