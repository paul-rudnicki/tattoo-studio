<?php
$default_args = array(
	"version" => "h_button-3",
	"link" => "",
	"align" => "",
	"css" => "",
);
extract( shortcode_atts( $default_args, $atts ) );

if ($version == 'h_button-3') {
	$type = 'good';
} else {
	$type = 'bad';
}

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$link = vc_build_link( $link ); ?>

<div class="notifications">
	<p class="<?php echo esc_attr($css_class) ?>" style="<?php echo esc_attr($align); ?>">
	  <img alt="<?php echo esc_attr($link['title']); ?>" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo esc_attr($type); ?>.png"><a href="<?php echo esc_url($link['url']); ?>" rel="<?php echo esc_attr($link['rel']) ?>" target="<?php echo esc_attr($link['target']); ?>" class="<?php echo esc_attr($version); ?>"><?php echo esc_html($link['title']) ?></a>
	</p>
</div>