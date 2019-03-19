<?php
$default_args = array(
  "ids" => "",
  "css" => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$ids = trim($ids);
if ($ids) {
  $ids = explode(",", $ids);
  $args = array(
    'post__in'     => $ids,
    'post_type'   => 'tattoostudio-artists',
    'post_status' => 'publish',
    'posts_per_page' => 3,
  );
} else {
  $args = array(
    'post_type'   => 'tattoostudio-artists',
    'post_status' => 'publish',
    'posts_per_page' => 3,
  );
}

$query = new WP_Query( $args );

if ($query->have_posts()) : ?>

<div class="container columns-3 artists-3 <?php echo esc_attr($css_class) ?>">
  
  <?php while($query->have_posts()) : $query->the_post(); ?>

    <?php if (has_post_thumbnail()) {
      $post_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'ts-artists-thumbnail' );
      $image = $post_image[0];
     } else {
      $image = get_template_directory_uri() . '/img/528x640.png';
     }
     ?>
      <div class="h-column" style="background-image:url(<?php echo esc_url($image) ?>); background-repeat:no-repeat; background-position:center center;">
        <div class="artist_inner">
          <div class="arists_content">

            <?php get_template_part('templates/artist/social-media'); ?>

            <?php get_template_part('templates/artist/role'); ?>

            <div class="clearfix"></div>
            <h1><?php echo strip_tags(get_the_title()); ?></h1>
            <p><?php ts_the_excerpt(); ?></p>
            
            <a class="more_gallery" href="<?php the_permalink(); ?>"><?php _e( 'See artist gallery', 'tattoostudio' ); ?></a>
          </div>
        </div>
      </div>
  <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <div class="clearfix"></div>
</div>

<?php endif; ?>