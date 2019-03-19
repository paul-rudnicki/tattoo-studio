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

  <div class="row_grid rel-grid <?php echo esc_attr($css_class) ?>">
    
    <div class="nav_artists">
      <a id="prev"><img alt="arrow_left" src="<?php echo get_template_directory_uri(); ?>/img/arr_l.png"></a>
      <a id="next"><img alt="arrow_right" src="<?php echo get_template_directory_uri(); ?>/img/arr_r.png"></a>
    </div>

    <ul class="artists">

    <?php while($query->have_posts()) : $query->the_post(); ?>

      <li class="artist">
        <?php get_template_part('templates/artist/thumbnail'); ?>
        
        <?php get_template_part('templates/artist/social-media'); ?>

        <div class="artist_right">
          <div class="rectangle-4"></div>
          <div class="artist_content">

            <?php get_template_part('templates/artist/role'); ?>

            <h1><?php the_title(); ?></h1>

            <p><?php ts_the_excerpt(); ?></p>
            
            <?php get_template_part('templates/artist/more-gallery'); ?>
          </div>
        </div>
      </li>

    <?php endwhile; ?>
       
    </ul>
  </div>
  <div class="clearfix"></div>

  <?php wp_reset_postdata(); ?>

<?php endif; ?>
