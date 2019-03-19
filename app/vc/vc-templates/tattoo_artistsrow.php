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
    'posts_per_page' => -1,
  );
} else {
  $args = array(
    'post_type'   => 'tattoostudio-artists',
    'post_status' => 'publish',
    'posts_per_page' => -1,
  );
}

$query = new WP_Query( $args );

if ($query->have_posts()) : ?>

  <div class="row_grid <?php echo esc_attr($css_class) ?>">

    <ul class="artists-2">
    
      <?php while($query->have_posts()) : $query->the_post(); ?>

        <li class="artist-2">
          <div class="artists-l">
            <?php if (has_post_thumbnail()) :
              $post_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'ts-artist-thumbnail' );
             ?>
              <div class="featimage-2" style="background-image:url(<?php echo esc_url($post_image[0]) ?>);"></div>
            <?php endif; ?>
          </div>
          <div class="artists-r">
            <div class="cat_name">
              <?php get_template_part('templates/artist/role'); ?>
            </div>
            <div class="artist_right-2">
              <div class="artist_content-2">
                <div class="inner_content">
                  <h1><?php the_title(); ?></h1>
                  <p><?php ts_the_excerpt(); ?></p>
                </div>
              </div>
              <?php get_template_part('templates/artist/social-media'); ?>
              <?php get_template_part('templates/artist/more-gallery'); ?>
            </div>
          </div>
        </li>

      <?php endwhile; ?>      
      
    </ul>

  </div>

<?php endif; ?>
<div class="clearfix"></div>
  