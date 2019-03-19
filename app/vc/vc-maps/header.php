<?php

class WPBakeryShortCode_Tattoo_Header extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'tattoo_header';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Header',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Custom header.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/header.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => __('Size', 'tattoostudio'),
            'param_name' => 'type',
            'value' => array(
                __('h1', 'tattoostudio') => 1,
                __('h2', 'tattoostudio') => 2,
                __('h3', 'tattoostudio') => 3,
                __('h4', 'tattoostudio') => 4,
                __('h5', 'tattoostudio') => 5,
                __('h6', 'tattoostudio') => 6,
            )
        ),
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Text normal', 'tattoostudio'),
            'param_name' => 'text'
        ),
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Text underline', 'tattoostudio'),
            'param_name' => 'text_underline'
        ),
        array(
            'type' => 'dropdown',
            // 'admin_label' => true,
            'class' => '',
            'heading' => __('Text align', 'tattoostudio'),
            'param_name' => 'align',
            'value' => array(
                __('left', 'tattoostudio') => 'text-align:left;',
                __('right', 'tattoostudio') => 'text-align:right;',
                __('center', 'tattoostudio') => 'text-align:center;',
            ),
        ),
        array(
            'type' => 'colorpicker',
            // 'admin_label' => true,
            'heading' => esc_html__('Text color', 'tattoostudio'),
            'param_name' => 'color'
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tattoostudio'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
