<?php 
/**
* Template Name: Maintance
*/
 ?>

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

    <div class="logo_mobile">
      <?php get_template_part('templates/nav/logo'); ?>
    </div>

    <div class="top_menu">
        <div class="logo">
          <?php get_template_part('templates/nav/logo'); ?>
        </div>
    </div>
    </header>

    <?php if (have_posts()): the_post(); ?>
      
      <?php if (has_post_thumbnail()) {
        $post_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        $image = $post_image[0];
      } else {
        $image = get_template_directory_uri() . '/img/1920x950.png';
      } 
      ?>
      <div class="h_slider h_slider-maintance" style="background-image: url('<?php echo esc_url($image); ?>');background-position-x: center;">
        <div id="h_content" class="h_content slide-in">
          <h1 class="h_title"><?php the_title(); ?></h1>
          <?php if (get_post_meta(get_the_ID(), 'tattoo_page_maintance_date', true)): ?>
            <div class="count_down" id="getting-started"></div>
            <script type="text/javascript">
              $('#getting-started').countdown('<?php echo esc_js(get_post_meta(get_the_ID(), 'tattoo_page_maintance_date', true)); ?>', function(event) {
                var $this = $(this).html(event.strftime('<div class="number"><h6>%D</h6><span class="days">Days</span></div></span>'
                + '<div class="number"><h6>%H</h6><span class="days">Hours</span></div></span>'
                + '<div class="number"><h6>%M</h6><span class="days">Minutes</span></div></span>'
                + '<div class="number"><h6>%S</h6><span class="days">Seconds</span></div></span>'));
              });
            </script>
          <?php endif ?>
          <div class="clearfix"></div>
          <div class="h_text"><?php echo get_the_content() ?></div>

        </div>
      </div>

    <?php endif ?>
  <!-- END Header -->

<?php get_footer(); ?>
