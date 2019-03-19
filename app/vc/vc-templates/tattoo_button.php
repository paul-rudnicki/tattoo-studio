<?php
$default_args = array(
	"version" => "h_button",
	"link" => "",
	"css" => "",
	"align" => ""
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$buttons = vc_param_group_parse_atts( $atts['buttons'] );

?>

<?php if (!empty($buttons)): ?>

		<p class="notifications <?php echo esc_attr($css_class) ?>" style="<?php echo esc_attr($align); ?>">

			<?php foreach ($buttons as $button): ?>

				<?php $link = vc_build_link( $button['link'] ); ?>

        <a href="<?php echo esc_url($link['url']); ?>" rel="<?php echo esc_attr($link['rel']) ?>" target="<?php echo esc_attr($link['target']); ?>" class="<?php echo esc_attr($version); ?>"><?php echo esc_html($link['title']) ?></a>

			<?php endforeach ?>

		</p>

<?php endif ?>