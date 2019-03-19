<?php
$default_args = array(
  "artistgallery" => '',
  "css" => ''
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

// echo '<pre>';
// var_dump($artistgallery);
// echo '</pre>';
// exit();

$args = array(
	'p'              => (int)$artistgallery,
	'post_type'   	 => 'tattoostudio-gallery',
	'post_status' 	 => 'publish',
	'posts_per_page' => 1,
);

$query = new WP_Query( $args );

// echo '<pre>';
// var_dump($query);
// echo '</pre>';
// exit();

if ($query->have_posts()) :
?>
<div class="img_gal <?php echo esc_attr($css_class) ?>">
	<?php while($query->have_posts()): $query->the_post(); ?>
	  <a href="<?php the_permalink(); ?>" class="h_button-gallery"><?php _e( 'See all tattoo images', 'tattoostudio' ); ?></a>
	  <?php $galleries = get_post_meta(get_the_ID(), 'tattoo_post_type_gallery_gallery', true); ?>
	  <?php if ($galleries): ?>
		  <ul>
		  	<?php $i = 1; ?>
		  	<?php foreach ($galleries as $gallery): ?>
			    <li style="background-image: url(<?php echo esc_url($gallery['image']); ?>); background-size:cover"><a href="<?php echo esc_url($gallery['image']); ?>" rel=""><span class="plus_cover"></span></a></li>

					<?php if($i++ == 4) break; ?>

		  	<?php endforeach ?>
		  </ul>
	  <?php endif ?>
	<?php endwhile; ?>
  <div class="clearfix"></div>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>