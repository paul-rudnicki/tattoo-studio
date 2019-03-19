<?php
$default_args = array(
	"version" => "normal",
	"css" => "",
	"align" => ""
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$icons = vc_param_group_parse_atts( $atts['icons'] );

?>

<?php if (!empty($icons)): ?>
	<div class="check_social-v2 <?php echo esc_attr($css_class) ?>" style="<?php echo esc_attr($align); ?>">

		<?php if($version == 'normal'): ?>

			<?php foreach ($icons as $icon): ?>
				<a href="<?php echo esc_url($icon['url']) ?>" class="soc twitt"><img alt="<?php echo esc_attr($icon['type']); ?>" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo esc_attr($icon['type']); ?>.png"></a>
			<?php endforeach ?>

		<?php else: ?>

			<?php foreach ($icons as $icon): ?>
				<a href="<?php echo esc_url($icon['url']) ?>" class="soc2 twitt"><img alt="<?php echo esc_attr($icon['type']); ?>" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo esc_attr($icon['type']); ?>2.png"></a>
			<?php endforeach ?>

		<?php endif; ?>

	</div>
<?php endif ?>