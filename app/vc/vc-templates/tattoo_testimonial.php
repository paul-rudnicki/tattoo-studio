<?php
$default_args = array(
  "image_id" => "",
  "subtitle" => "",
  "title" => "",
  "css" => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$content = wpb_js_remove_wpautop($content, true);

?>
<!-- todo przeniesc do js -->
<script type="text/javascript">
  jQuery(function ($) {
    'use strict';
    $(function() {
      if ( $('.pattern_testimonials').length ) {
        var $parent = $('.pattern_testimonials').parent().parent().parent().parent();
        $('.pattern_testimonials').css('left', $parent.css('left'));
      }
    });
  });
</script>

<div class="row_grid <?php echo esc_attr($css_class) ?>">
  <div class="testimonials">
    <?php 
    if ($image_id) :
      $image = wp_get_attachment_image_src($image_id, 'full');
      // $image = wp_get_attachment_image_src($image_id, 'ts-testimonials');
    ?>
      <div class="h-column" style="background-image:url(<?php echo esc_url($image[0]) ?>);">
        <div class="testimonials_content">
          <?php if ($subtitle): ?>
            <h2><?php echo esc_html($subtitle); ?></h2>
          <?php endif ?>
          <?php if ($title): ?>
            <h1><?php echo esc_html($title); ?></h1>
          <?php endif ?>
          <?php echo wpautop($content); ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
<div class="pattern_testimonials"></div>
<div class="clearfix"></div>