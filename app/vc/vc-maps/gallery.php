<?php

class WPBakeryShortCode_Tattoo_Gallery extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'tattoo_gallery';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Gallery',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Your custom gallery.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/gallery.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => __('Type', 'tattoostudio'),
            'param_name' => 'type',
            'value' => array(
                __('FullWidth', 'tattoostudio') => 'full-width',
                __('Grid', 'tattoostudio') => 'grid',
            ),
        ),
        // params group
        array(
            'type' => 'param_group',
            'value' => '',
            'param_name' => 'gallery',
            'heading' => __('Gallery (multiple field)', "tattoostudio"),
            "description" => __( "Add multiple gallery images.", "tattoostudio" ),
            // Note params is mapped inside param-group:
            'params' => array(
                array(
                    "type" => "attach_image",
                    "heading" => __("Image", "tattoostudio"),
                    // "holder" => "div",
                    "class" => "",
                    "param_name" => "image_id",
                ),
            )
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tattoostudio'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
