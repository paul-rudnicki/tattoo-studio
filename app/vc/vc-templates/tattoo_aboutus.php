<?php
$default_args = array(
  "version" => "",
  "subtitle" => "",
  "title" => "",
  "image" => "",
  "twitter" => "",
  "facebook" => "",
  "youtube" => "",
  "css" => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
?>

<?php 
$content = wpb_js_remove_wpautop($content, true);
if ($image) {
  $image = wp_get_attachment_image_src($image, 'full');
}

?>

<?php if ($version == 1): ?>
    
    <div class="about-2 rel-grid <?php echo esc_attr($css_class) ?>">
      <div class="rectangle-1"></div>
      <?php if ($image): ?>
        <div class="h_circle" style="background-image: url(<?php echo esc_url($image[0]) ?>);"></div>
      <?php endif ?>
      <div class="box_l_side">
        <div class="box_l_figure box">
          <?php if ($subtitle): ?>
            <h2><?php echo ts_esc_html($subtitle); ?></h2>
          <?php endif ?>
          
          <h1><?php echo ts_esc_html($title); ?></h1>
        </div>
        <div class="box_l_content">
          <?php echo ts_esc_html($content); ?>
        </div>
      </div>
      <?php ts_about_social($twitter, $facebook, $youtube); ?>
      <div class="rectangle-2"></div>
    </div>
    <div class="clearfix"></div>

<?php elseif($version == 2): ?>

      <div class="aboutus rel-grid <?php echo esc_attr($css_class) ?>">
        <div class="rectangle-3"></div>
        <div class="h_box_l">
          <div class="box_color"></div>
          <?php if ($image): ?>
            <div class="box_pic" style="background-image: url(<?php echo esc_url($image[0]) ?>);">

              <?php ts_about_social($twitter, $facebook, $youtube); ?>

              <div class="tri1"></div>
              <div class="tri2"></div>
              <div class="tri3"></div>
              <div class="tri4"></div>
            </div>
          <?php endif; ?>
          <div class="box_r_side">
            <div class="box_r_figure box">
              <h2><?php echo esc_html($subtitle); ?></h2>
              <h1><?php echo ts_esc_html($title); ?></h1>
            </div>
            <div class="box_r_content">
              <?php echo wpautop($content); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>

<?php else : ?>

      <div class="rel-grid <?php echo esc_attr($css_class) ?>">
        <div class="rectangle-3"></div>
        <div class="h_box_l about-3">

          <?php ts_about_social($twitter, $facebook, $youtube); ?>

          <div class="box_color-2" style="background-image: url(<?php echo esc_url($image[0]) ?>);"></div>
          <div class="box_r_side">
            <div class="rectangle-1 "></div>
            <div class="box_r_figure box">
              <h2><?php echo esc_html($subtitle); ?></h2>
              <h1><?php echo ts_esc_html($title); ?></h1>
            </div>
            <div class="box_r_content">
              <?php echo wpautop($content); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>

<?php endif; ?>


<?php 
 
?>