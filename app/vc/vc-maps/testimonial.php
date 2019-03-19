<?php

class WPBakeryShortCode_Tattoo_Testimonial extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'tattoo_testimonial';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Testimonial',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Custom testimonial.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/testimonial.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            "type" => "attach_image",
            "heading" => __("Image", "tattoostudio"),
            "class" => "",
            "description" => __( "Require.", "tattoostudio" ),
            "param_name" => "image_id",
        ),
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Subtitle', 'tattoostudio'),
            'param_name' => 'subtitle'
        ),
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Title', 'tattoostudio'),
            'param_name' => 'title'
        ),
        array(
            'type' => 'textarea_html',
            // 'admin_label' => true,
            'heading' => esc_html__('Description', 'tattoostudio'),
            'param_name' => 'content'
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tattoostudio'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
