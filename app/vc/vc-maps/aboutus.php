<?php

class WPBakeryShortCode_Tattoo_Aboutus extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'Tattoo_aboutus';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'About Us',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Custom about us.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/aboutus.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => __('Version', 'tattoostudio'),
            'param_name' => 'version',
            'value' => array(
                __('Cricle', 'tattoostudio') => 1,
                __('Diamond', 'tattoostudio') => 2,
                __('Square', 'tattoostudio') => 3,
            ),
        ),
        array(
            'type' => 'textfield',
            // 'admin_label' => true,
            'heading' => esc_html__('Subtitle', 'tattoostudio'),
            'param_name' => 'subtitle'
        ),
        array(
            'type' => 'textarea',
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
            'type' => 'attach_image',
            // 'admin_label' => true,
            'heading' => esc_html__('Image', 'tattoostudio'),
            'param_name' => 'image'
        ),
        array(
            'type' => 'textfield',
            // 'admin_label' => true,
            'heading' => esc_html__('Twitter URL', 'tattoostudio'),
            'param_name' => 'twitter'
        ),
        array(
            'type' => 'textfield',
            // 'admin_label' => true,
            'heading' => esc_html__('Facebook URL', 'tattoostudio'),
            'param_name' => 'facebook'
        ),
        array(
            'type' => 'textfield',
            // 'admin_label' => true,
            'heading' => esc_html__('Youbube URL', 'tattoostudio'),
            'param_name' => 'youtube'
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tattoostudio'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
