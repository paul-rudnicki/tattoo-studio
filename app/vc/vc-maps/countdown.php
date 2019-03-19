<?php

class WPBakeryShortCode_Tattoo_Countdown extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'tattoo_countdown';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Countdown',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Custom countdown.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/countdown.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'number',
            'admin_label' => true,
            'heading' => esc_html__('Minutes', 'tattoostudio'),
            'param_name' => 'counter_minutes',
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
