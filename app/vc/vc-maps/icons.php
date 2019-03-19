<?php

class WPBakeryShortCode_Tattoo_Icons extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'Tattoo_icons';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Icons',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Social icons.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/share.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => __('Version', 'tattoostudio'),
            'param_name' => 'version',
            'value' => array(
                __('Normal', 'tattoostudio') => 'normal',
                __('Circle', 'tattoostudio') => 'circle',
            ),
        ),
        array(
            'type' => 'param_group',
            'value' => '',
            'param_name' => 'icons',
            'heading' => __('Icons (multiple field)', "tattoostudio"),
            "description" => __( "Add multiple icons.", "tattoostudio" ),
            // Note params is mapped inside param-group:
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'class' => '',
                    'heading' => __('Type', 'tattoostudio'),
                    'param_name' => 'type',
                    'value' => array(
                        __('Twitter', 'tattoostudio') => 'twitter',
                        __('Facebook', 'tattoostudio') => 'facebook',
                        __('Youtube', 'tattoostudio') => 'youtube',
                    ),
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    // "admin_label" => true,
                    "heading" => __( "Url", "tattoostudio" ),
                    "param_name" => "url",
                    "description" => __( "Link to your social media.", "tattoostudio" )
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
