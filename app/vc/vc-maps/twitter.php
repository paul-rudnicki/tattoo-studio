<?php
class WPBakeryShortCode_Tattoo_Twitter extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'tattoo_twitter';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Twitter',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Custom tweet.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/twitter.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Screen name', 'tattoostudio'),
            'param_name' => 'screenname',
            'description' => 'Before use set <a href="'. get_admin_url(null, '?page=tattoo_options') .'">twitter settings</a>.',
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tattoostudio'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
