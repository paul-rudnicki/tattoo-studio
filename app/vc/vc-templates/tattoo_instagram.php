<?php 
$default_args = array(
  "username" => "",
  "number" => "3",
  "css" => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

if ($username) :

  $user_data = ts_instagram("https://api.instagram.com/v1/users/search?q=".$username."&access_token=1631861081.3a81a9f.9d7b2e2bc94f42df935055677efb2c4d");
  $user_data = json_decode($user_data);

  $userid = $user_data->data[0]->id;
  $number = (int) $number;
  if($number < 1) $number = 1;

  $feed_data = ts_instagram("https://api.instagram.com/v1/users/".$userid."/media/recent/?access_token=1631861081.3a81a9f.9d7b2e2bc94f42df935055677efb2c4d&count=" . $number);

  $feed_data = json_decode($feed_data);

  ?>

  <div class="container columns-3 insta_feeds <?php echo esc_attr($css_class) ?>">

    <?php foreach ($feed_data->data as $inst) : ?>
      

      <div class="h-column" style="background-image:url(<?php echo esc_url($inst->images->standard_resolution->url); ?>">
        <a href="<?php echo esc_url($inst->link); ?>"><span class="plus_cover"></span></a><div class="insta_feeds_inner" >
          <div class="insta_feeds_count">
            <p class="counter"><span class="insta_feeds_count_no"><?php echo esc_html($inst->likes->count); ?></span>
            <span class="insta_feeds_count_name"><?php _e( 'Likes', 'tattoostudio' ); ?></span></p>
          <p class="counter">  <span class="insta_feeds_count_no"><?php echo esc_html($inst->comments->count); ?></span>
            <span class="insta_feeds_count_name"><?php _e( 'Comments', 'tattoostudio' ); ?></span></p>
          </div>
        </div>
      </div>

    <?php endforeach; ?>

    <div class="clearfix"></div>
  </div>

<?php endif; ?>