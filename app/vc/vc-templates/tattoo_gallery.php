<?php
$default_args = array(
  "gallery" => '',
  "type" => 'full-width',
  "css" => ''
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$galleries = vc_param_group_parse_atts( $atts['gallery'] );

?>

<?php if (!empty($galleries)): ?>
  
  <?php if ($type == 'full-width'): ?>
    
    <div class="container img_gal <?php echo esc_attr($css_class) ?>">

  <?php else: ?>
  
    <div class="container gal-grid <?php echo esc_attr($css_class) ?>">
      <div class="container_inner">

  <?php endif ?>
        <ul>
          <?php foreach($galleries as $gallery): ?>
            
            <?php $image = wp_get_attachment_image_src($gallery['image_id'], 'full'); ?>

            <li style="background-image: url(<?php echo esc_url($image[0]); ?>); background-size:cover">
              <a href="<?php echo esc_url($image[0]); ?>" rel=""><span class="plus_cover"></span></a>
            </li>

          <?php endforeach; ?>
        </ul>
        <div class="clearfix"></div>

  <?php if ($type == 'full-width'): ?>
    
    </div>

  <?php else: ?>
  
      </div>
    </div>

  <?php endif ?>

<?php endif; ?>