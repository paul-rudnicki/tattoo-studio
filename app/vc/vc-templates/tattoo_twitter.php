<?php
$default_args = array(
  "screenname" => "",
  "css" => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

global $settings;

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$requestMethod = 'GET';
$getfield = '?screen_name='.esc_attr($screenname).'&count=1';

$twitter = new TwitterAPIExchange($settings);
$tweet = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

$tweet = json_decode($tweet);

if (!empty($tweet)) :
  foreach ($tweet as $t): ?>
    <?php 
    $image = str_replace('_normal.', '.', $t->user->profile_image_url);
    ?>
    <div class="row_grid <?php echo esc_attr($css_class); ?>">
      <div class="h-column cm-3">
        <div class="featimage-2" style="background-image:url(<?php echo esc_url($image); ?>);"></div>
      </div>
      <div class="h-column cm-6"><p class="twitter_news"><img alt="Tattoo Theme - FutureTeam" src="<?php echo get_template_directory_uri() ?>/img/twitter_white.png"></p>
        <h1><?php echo ts_esc_html($t->text); ?></h1>
      </div>
    </div>
    <div class="clearfix"></div>

<?php endforeach;
endif; ?>