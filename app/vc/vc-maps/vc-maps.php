<?php
/**
 * Initial setup
 * =============
 */

if( ! defined('TATTOO_VISUAL_COMPOSER_IMG') ){
    define('TATTOO_VISUAL_COMPOSER_IMG', get_template_directory_uri() . '/app/vc/img/');
}

$new_vc_dir = get_template_directory() . '/app/vc/vc-templates';
if ( function_exists( "vc_set_shortcodes_templates_dir" ) ) {
	vc_set_shortcodes_templates_dir( $new_vc_dir );
}

require_once get_template_directory() . '/app/vc/vc-maps/params/params.php';

// Load shortcode

require_once get_template_directory() . '/app/vc/vc-maps/header.php';
require_once get_template_directory() . '/app/vc/vc-maps/parallax.php';
require_once get_template_directory() . '/app/vc/vc-maps/gallery.php';
require_once get_template_directory() . '/app/vc/vc-maps/icons.php';
require_once get_template_directory() . '/app/vc/vc-maps/button.php';
require_once get_template_directory() . '/app/vc/vc-maps/countdown.php';
require_once get_template_directory() . '/app/vc/vc-maps/notification.php';
require_once get_template_directory() . '/app/vc/vc-maps/instagram.php';
require_once get_template_directory() . '/app/vc/vc-maps/aboutus.php';
require_once get_template_directory() . '/app/vc/vc-maps/posts.php';
require_once get_template_directory() . '/app/vc/vc-maps/artists-carousel.php';
require_once get_template_directory() . '/app/vc/vc-maps/testimonial.php';
require_once get_template_directory() . '/app/vc/vc-maps/artists.php';
require_once get_template_directory() . '/app/vc/vc-maps/twitter.php';
require_once get_template_directory() . '/app/vc/vc-maps/gallery-artist.php';
require_once get_template_directory() . '/app/vc/vc-maps/artists-row.php';

require_once get_template_directory() . '/app/vc/vc-maps/counter.php';

