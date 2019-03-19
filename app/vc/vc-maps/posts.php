<?php

class WPBakeryShortCode_Tattoo_Posts extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'tattoo_posts';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Latest Posts',
    'base' => $basename,
    'category' => 'Tattoo',
    // 'description' => esc_html__('Custom countdown.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/posts.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'number',
            'admin_label' => true,
            'heading' => esc_html__('Number', 'tattoostudio'),
            'param_name' => 'counter_minutes',
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tattoostudio'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
