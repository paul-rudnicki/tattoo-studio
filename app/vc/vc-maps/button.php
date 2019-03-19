<?php

class WPBakeryShortCode_Tattoo_Button extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'Tattoo_button';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Buttons',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Custom buttons.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/button.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => __('Version', 'tattoostudio'),
            'param_name' => 'version',
            'value' => array(
                __('Ver.1', 'tattoostudio') => 'h_button',
                __('Ver.2', 'tattoostudio') => 'h_button-2',
                __('Ver.3', 'tattoostudio') => 'h_button-3',
                __('Ver.4', 'tattoostudio') => 'h_button-4',
            ),
        ),
        array(
            'type' => 'param_group',
            'value' => '',
            'param_name' => 'buttons',
            'heading' => __('Buttons (multiple field)', "tattoostudio"),
            "description" => __( "Add multiple buttons.", "tattoostudio" ),
            // Note params is mapped inside param-group:
            'params' => array(
                array(
                    "type" => "vc_link",
                    "class" => "",
                    // "admin_label" => true,
                    "heading" => __( "Button", "tattoostudio" ),
                    "param_name" => "link",
                ),
            )
        ),
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => __('Icons align', 'tattoostudio'),
            'param_name' => 'align',
            'value' => array(
                __('left', 'tattoostudio') => 'text-align:left;',
                __('right', 'tattoostudio') => 'text-align:right;',
                __('center', 'tattoostudio') => 'text-align:center;',
            ),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tattoostudio'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
