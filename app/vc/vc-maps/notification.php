<?php

class WPBakeryShortCode_Tattoo_Notification extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'Tattoo_notification';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Notifications',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Custom notifications.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/notification.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => __('Version', 'tattoostudio'),
            'param_name' => 'version',
            'value' => array(
                __('Ver.1', 'tattoostudio') => 'h_button-3',
                __('Ver.2', 'tattoostudio') => 'h_button-4',
            ),
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            // "admin_label" => true,
            "heading" => __( "Url", "tattoostudio" ),
            "param_name" => "link",
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
