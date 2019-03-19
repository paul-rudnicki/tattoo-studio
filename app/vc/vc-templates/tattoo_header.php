<?php
$default_args = array(
	"type" => "",
	"text" => "",
	"text_underline" => "",
	"align" => "left",
	"color" => "",
	"css" => "",
);

extract( shortcode_atts( $default_args, $atts ) );
if ($color) $color = "color:" . $color;

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

?>

<h<?php echo esc_attr($type); ?> class="<?php echo esc_attr($css_class); ?>" style="<?php echo esc_attr($align); ?><?php echo esc_attr($color); ?>"><?php echo esc_html( $text ); ?>
	<?php if ($text_underline): ?>
		<span class="h_line"><?php echo esc_html( $text_underline ); ?></span>
	<?php endif ?>
</h<?php echo esc_attr($type); ?>>