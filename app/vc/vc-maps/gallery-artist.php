<?php

class WPBakeryShortCode_Tattoo_Galleryartist extends WPBakeryShortCode
{
}

/*** Button ***/

$basename = 'tattoo_galleryartist';

$group_design = esc_html__('Design options', 'tattoostudio');

$args = array(
    'post_type'   => 'tattoostudio-gallery',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);

$query = new WP_Query( $args );

$galleries = array();
if ($query->have_posts()) {
    while($query->have_posts()){ 
        $query->the_post();
        $galleries[get_the_title()] = get_the_ID();
    }
}
wp_reset_postdata();

vc_map(array(
    'name' => 'Artist Gallery',
    'base' => $basename,
    'category' => 'Tattoo',
    'description' => esc_html__('Your artist gallery.', 'tattoostudio'),
    'icon' => TATTOO_VISUAL_COMPOSER_IMG . 'icons/photos.png',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => __('Artist', 'tattoostudio'),
            'param_name' => 'artistgallery',
            'value' => $galleries,
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tattoostudio'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
