<?php

class WPBakeryShortCode_Tattoo_Artistscarousel extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'tattoo_artistscarousel';

$group_design = esc_html__('Design options', 'tattoostudio');

vc_map(array(
    'name' => 'Artists Carousel',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Custom artists carousel.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/users.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__("Artists id's", 'tattoostudio'),
            "description" => __( "Empty show all artists or enter them id's by comma: 23,34 etc.", "tattoostudio" ),
            'param_name' => 'ids'
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tattoostudio'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
