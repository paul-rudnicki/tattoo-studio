<?php

class WPBakeryShortCode_Tattoo_Parallax extends WPBakeryShortCode
{
}

/*** Parallax ***/

$basename = 'tattoo_parallax';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Tattoo_Parallax',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Your milestones, achievements, etc.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/image.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        // Text
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Text', 'tattoostudio'),
            'param_name' => 'text'
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tattoostudio'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
