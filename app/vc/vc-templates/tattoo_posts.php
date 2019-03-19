<?php 
$default_args = array(
  "number" => "3",
  "css" => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$number = (int)$number < 1 ? 1 : $number;
 
$args = array(
  'post_type'   => 'post',
  'post_status' => 'publish',
  'posts_per_page'         => $number,
);
$query = new WP_Query( $args );

if ($query->have_posts()): ?>
  
  <div class="row_grid <?php echo esc_attr($css_class) ?>" style="padding-left: 15px; padding-right: 15px;">
    <div class="columns-3 posts">

    <?php while($query->have_posts()): $query->the_post(); ?>

      <div class="h-column">
        <article>
        <?php if (has_post_thumbnail()) :
          $post_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'ts-post-latest' );
        ?>
          <div class="post_image" style="background-image:url(<?php echo esc_url($post_image[0]); ?>);"><a href="<?php the_permalink(); ?>"></a>
          </div>
        <?php endif ?>
          <div class="post_content">
            <p class="post_name"><?php _e( 'Post', 'tattoostudio' ); ?></p>
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p class="post_date"><?php the_date(get_option('date_format')); ?></p>
            <p class="post_text"><?php ts_the_excerpt(145); ?></p>
            <a class="more_gallery" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'tattoostudio' ); ?></a><div class="clearfix"></div>
          </div>
        </article>
      </div>

    <?php endwhile; ?>

    </div>
  </div>
  <div class="clearfix"></div>

<?php endif; ?>