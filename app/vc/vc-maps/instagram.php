<?php

class WPBakeryShortCode_Tattoo_Instagram extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'tattoo_instagram';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Instagram',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Custom instagram.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/instagram.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Username', 'tattoostudio'),
            'param_name' => 'username'
        ),
        array(
            'type' => 'number',
            'admin_label' => true,
            'heading' => esc_html__('Number', 'tattoostudio'),
            'param_name' => 'number',
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tattoostudio'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
