<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.pl, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function yourprefix_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function yourprefix_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object
 */
function yourprefix_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<div class="custom-field-row <?php echo $classes; ?>">
		<p><label for="<?php echo $id; ?>"><?php echo $label; ?></label></p>
		<p><input id="<?php echo $id; ?>" type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>"/></p>
		<p class="description"><?php echo $description; ?></p>
	</div>
	<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object
 */
function yourprefix_display_text_small_column( $field_args, $field ) {
	?>
	<div class="custom-column-display <?php echo $field->row_classes(); ?>">
		<p><?php echo $field->escaped_value(); ?></p>
		<p class="description"><?php echo $field->args( 'description' ); ?></p>
	</div>
	<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function yourprefix_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}


/**
* MetaBox for Post
**/

add_action( 'cmb2_admin_init', 'tatto_register_post_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function tatto_register_post_metabox() {
	$prefix = 'tatto_post_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Post Settings', 'tattoostudio' ),
		'object_types'  => array( 'post', ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Header Image', 'tattoostudio' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'tattoostudio' ),
		'id'   => $prefix . 'header_image',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Video URL', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your video URL.', 'tattoostudio' ),
		'id'   => $prefix . 'video_url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

}


/**
* MetaBox for Artist and Gallery Post Types
**/

add_action( 'cmb2_admin_init', 'tatto_register_custom_posts_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function tatto_register_custom_posts_metabox() {
	$prefix = 'tatto_custom_post_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Header Settings', 'tattoostudio' ),
		'object_types'  => array( 'tattoostudio-artists', 'tattoostudio-gallery' ), // Post type
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Header Image', 'tattoostudio' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'tattoostudio' ),
		'id'   => $prefix . 'header_image',
		'type' => 'file',
	) );
}


/**
* Artist Post Type
**/

add_action( 'cmb2_admin_init', 'tatto_register_artist_type' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function tatto_register_artist_type() {
	$prefix = 'tatto_artist_type_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Artist Settings', 'tattoostudio' ),
		'object_types'  => array( 'tattoostudio-artists' ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );

	// $cmb_demo->add_field( array(
	// 	'name'             => esc_html__( 'Box artist', 'tattoostudio' ),
	// 	'desc'             => esc_html__( 'Show or hide box artist in post.', 'tattoostudio' ),
	// 	'id'               => $prefix . 'box_show',
	// 	'type'             => 'radio_inline',
	// 	// 'show_option_none' => 'No Selection',
	// 	'options'          => array(
	// 		'show'   => esc_html__( 'Show', 'tattoostudio' ),
	// 		'hide' => esc_html__( 'Hide', 'tattoostudio' ),
	// 	),
	// 	'default' => 'hide'
	// ) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Background Image', 'tattoostudio' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'tattoostudio' ),
		'id'   => $prefix . 'background_image',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Role', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your artist role.', 'tattoostudio' ),
		'id'   => $prefix . 'role',
		'type' => 'text_small',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Header Size', 'tattoostudio' ),
		'desc' => esc_html__( 'px.', 'tattoostudio' ),
		'id'   => $prefix . 'size',
		'type' => 'text_small',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Header Line Height', 'tattoostudio' ),
		'desc' => esc_html__( 'px.', 'tattoostudio' ),
		'id'   => $prefix . 'line',
		'type' => 'text_small',
	) );


	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Twitter URL', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your twitter URL.', 'tattoostudio' ),
		'id'   => $prefix . 'twitter_url',
		'type' => 'text_url',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Facebook URL', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your facebook URL.', 'tattoostudio' ),
		'id'   => $prefix . 'facebook_url',
		'type' => 'text_url',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Youtube URL', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your video from youtube.', 'tattoostudio' ),
		'id'   => $prefix . 'youtube_url',
		'type' => 'text_url',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Text link', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your text link.', 'tattoostudio' ),
		'id'   => $prefix . 'gallery_text',
		'type' => 'text',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Link (url)', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your URL.', 'tattoostudio' ),
		'id'   => $prefix . 'gallery_url',
		'type' => 'text_url',
	) );
}


/*
*	Artist Post Type Gallery
*/
add_action( 'cmb2_admin_init', 'tatto_register_post_type_gallery' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function tatto_register_post_type_gallery() {
	$prefix = 'tattoo_post_type_gallery_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Gallery Settings', 'tattoostudio' ),
		'object_types' => array( 'tattoostudio-artists', 'tattoostudio-gallery' ),
	) );

	$cmb_group->add_field( array(
		'name'             => esc_html__( 'Type', 'tattoostudio' ),
		// 'desc'             => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'               => $prefix . 'type',
		'type'             => 'select',
		'options'          => array(
			'vertical' => esc_html__( 'Vertical', 'tattoostudio' ),
			'grid'   => esc_html__( 'Grid', 'tattoostudio' ),
		),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'gallery',
		'type'        => 'group',
		// 'description' => esc_html__( 'Generates reusable form entries', 'tattoostudio' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Images {#}', 'tattoostudio' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Image', 'tattoostudio' ),
			'remove_button' => esc_html__( 'Remove Image', 'tattoostudio' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Image', 'tattoostudio' ),
		'id'   => 'image',
		'type' => 'file',
	) );
}



/**
* Artist for Post
**/

add_action( 'cmb2_admin_init', 'tatto_register_post_artist' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function tatto_register_post_artist() {
	$prefix = 'tatto_post_artist_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Artist Settings', 'tattoostudio' ),
		'object_types'  => array( 'post', ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Box artist', 'tattoostudio' ),
		'desc'             => esc_html__( 'Show or hide box artist in post.', 'tattoostudio' ),
		'id'               => $prefix . 'box_show',
		'type'             => 'radio_inline',
		// 'show_option_none' => 'No Selection',
		'options'          => array(
			'show'   => esc_html__( 'Show', 'tattoostudio' ),
			'hide' => esc_html__( 'Hide', 'tattoostudio' ),
		),
		'default' => 'hide'
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Image', 'tattoostudio' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'tattoostudio' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Text', 'tattoostudio' ),
		'desc'    => esc_html__( 'Enter your artist description.', 'tattoostudio' ),
		'id'      => $prefix . 'text',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Twitter URL', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your twitter URL.', 'tattoostudio' ),
		'id'   => $prefix . 'twitter_url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Facebook URL', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your facebook URL.', 'tattoostudio' ),
		'id'   => $prefix . 'facebook_url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Youtube URL', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your video from youtube.', 'tattoostudio' ),
		'id'   => $prefix . 'youtube_url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Artist gallery url', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your URL to artist gallery.', 'tattoostudio' ),
		'id'   => $prefix . 'gallery_url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

}

/**
* Archive Settings
**/

add_action( 'cmb2_admin_init', 'tattoo_register_archive_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function tattoo_register_archive_metabox() {
	$prefix = 'tattoo_archive_';

	/**
	 * Metabox to add fields to categories and tags
	 */
	$cmb_term = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => esc_html__( 'Category Metabox', 'tattoostudio' ), // Doesn't output for term boxes
		'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
		'taxonomies'       => array( 'category', 'post_tag' ), // Tells CMB2 which taxonomies should have these fields
		// 'new_term_section' => true, // Will display in the "Add New Category" section
	) );

	$cmb_term->add_field( array(
		'name' => esc_html__( 'Header Image', 'tattoostudio' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'tattoostudio' ),
		'id'   => $prefix . 'header_image',
		'type' => 'file',
		'default' => get_template_directory_uri() . '/img/1920x475.png'
	) );

	$cmb_term->add_field( array(
		'name'  => esc_html__( 'Sidebar', 'tattoostudio' ),
		'desc'  => esc_html__( 'Show left, right or hide sidebar on archive page.', 'tattoostudio' ),
		'id'    => $prefix . 'sidebar',
		'type'  => 'radio_inline',
		'options'  => array(
			'left' 		=> esc_html__( 'Left sidebar', 'tattoostudio' ),
			'without' => esc_html__( 'Without sidebar', 'tattoostudio' ),
			'right'   => esc_html__( 'Right sidebar', 'tattoostudio' ),
		),
		'default' => 'right'
	) );

	// $cmb_term->add_field( array(
	// 	'name'     => esc_html__( 'Extra Info', 'tattoostudio' ),
	// 	'desc'     => esc_html__( 'field description (optional)', 'tattoostudio' ),
	// 	'id'       => $prefix . 'extra_info',
	// 	'type'     => 'title',
	// 	'on_front' => false,
	// ) );


	// $cmb_term->add_field( array(
	// 	'name' => esc_html__( 'Arbitrary Term Field', 'tattoostudio' ),
	// 	'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
	// 	'id'   => $prefix . 'term_text_field',
	// 	'type' => 'text',
	// ) );

}


/*
* Page Header Settings
*/

add_action( 'cmb2_admin_init', 'tattoo_register_page_header_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function tattoo_register_page_header_metabox() {
	$prefix = 'tattoo_page_headers_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Page Settings', 'tattoostudio' ),
		'object_types'  => array( 'page', ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );

	$cmb_demo->add_field( array(
		'name'  => esc_html__( 'Headers', 'tattoostudio' ),
		'desc'  => esc_html__( 'Choose type of header you want to display.', 'tattoostudio' ),
		'id'    => $prefix . 'choose',
		'type'  => 'radio_inline',
		'options'  => array(
			'small' 		=> esc_html__( 'Small header', 'tattoostudio' ),
			'image' => esc_html__( 'Image header', 'tattoostudio' ),
			'video'   => esc_html__( 'Video header', 'tattoostudio' ),
			'slider'   => esc_html__( 'Slider header', 'tattoostudio' ),
		),
		'default' => 'small'
	) );

	$cmb_demo->add_field( array(
		'name'  => esc_html__( 'Menus', 'tattoostudio' ),
		'desc'  => 'Choose type of menu. If you want hamburger, you have must <a href="'. get_admin_url(null, 'nav-menus.php') .'">create</a> it before.',
		'id'    => $prefix . 'menu',
		'type'  => 'radio_inline',
		'options'  => array(
			'normal' 		=> esc_html__( 'Normal', 'tattoostudio' ),
			'hamburger' => esc_html__( 'Hamburger', 'tattoostudio' ),
		),
		'default' => 'normal'
	) );

}


/*
* Page Small Header Settings
*/

add_action( 'cmb2_admin_init', 'tattoo_register_page_small_header_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function tattoo_register_page_small_header_metabox() {
	$prefix = 'tattoo_page_small_headers_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Small Header Settings', 'tattoostudio' ),
		'object_types'  => array( 'page', ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Image', 'tattoostudio' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'tattoostudio' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

}


/*
* Page Image Header Settings
*/

add_action( 'cmb2_admin_init', 'tattoo_register_page_image_header_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function tattoo_register_page_image_header_metabox() {
	$prefix = 'tattoo_page_image_headers_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Image Header Settings', 'tattoostudio' ),
		'object_types'  => array( 'page', ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Image', 'tattoostudio' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'tattoostudio' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Title', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your title.', 'tattoostudio' ),
		'id'   => $prefix . 'title',
		'type' => 'textarea_small',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Text', 'tattoostudio' ),
		'desc'    => esc_html__( 'Enter your text.', 'tattoostudio' ),
		'id'      => $prefix . 'text',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Button Text', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your button text.', 'tattoostudio' ),
		'id'   => $prefix . 'button_text',
		'type' => 'text_medium',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Buttton URL', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your button url.', 'tattoostudio' ),
		'id'   => $prefix . 'button_url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

}


/*
* Page Video Header Settings
*/

add_action( 'cmb2_admin_init', 'tattoo_register_page_video_header_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function tattoo_register_page_video_header_metabox() {
	$prefix = 'tattoo_page_video_headers_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Video Header Settings', 'tattoostudio' ),
		'object_types'  => array( 'page', ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Image', 'tattoostudio' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'tattoostudio' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Video', 'tattoostudio' ),
		'desc' => esc_html__( 'Upload an video or enter a URL.', 'tattoostudio' ),
		'id'   => $prefix . 'video',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Title', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your title.', 'tattoostudio' ),
		'id'   => $prefix . 'title',
		'type' => 'textarea_small',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Text', 'tattoostudio' ),
		'desc'    => esc_html__( 'Enter your text.', 'tattoostudio' ),
		'id'      => $prefix . 'text',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Button Text', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your button text.', 'tattoostudio' ),
		'id'   => $prefix . 'button_text',
		'type' => 'text_medium',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Buttton URL', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your button url.', 'tattoostudio' ),
		'id'   => $prefix . 'button_url',
		'type' => 'text_url',
	) );

}

/* Slider Header Settings */

add_action( 'cmb2_admin_init', 'tattoo_register_sliders_header_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function tattoo_register_sliders_header_metabox() {
	$prefix = 'tattoo_sliders_header_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Slider Header Settings', 'tattoostudio' ),
		'object_types' => array( 'page', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'slider',
		'type'        => 'group',
		// 'description' => esc_html__( 'Generates reusable form entries', 'tattoostudio' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Slider {#}', 'tattoostudio' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Slider', 'tattoostudio' ),
			'remove_button' => esc_html__( 'Remove Slider', 'tattoostudio' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Image', 'tattoostudio' ),
		'id'   => 'image',
		'type' => 'file',
	) );


	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Title', 'tattoostudio' ),
		'id'         => 'title',
		'type'       => 'textarea_small',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => esc_html__( 'Text', 'tattoostudio' ),
		'description' => esc_html__( 'Write a short description for this slide.', 'tattoostudio' ),
		'id'          => 'description',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Button Text', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your button text.', 'tattoostudio' ),
		'id'   => 'button_text',
		'type' => 'text_medium',
	) );


	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Buttton URL', 'tattoostudio' ),
		'desc' => esc_html__( 'Enter your button url.', 'tattoostudio' ),
		'id'   => 'button_url',
		'type' => 'text_url',
	) );

}


/*
* Maintance Settings
*/

add_action( 'cmb2_admin_init', 'tattoo_register_page_maintance_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function tattoo_register_page_maintance_metabox() {
	$prefix = 'tattoo_page_maintance_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Maintenance Settings', 'tattoostudio' ),
		'object_types'  => array( 'page', ), // Post type
		// 'show_on_cb' => 'maintenace_show', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Date', 'tattoostudio' ),
		// 'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'date',
		'type' => 'text_date',
		'date_format' => 'Y/m/d',
	) );

}






















add_action( 'cmb2_admin_init', 'yourprefix_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function yourprefix_register_demo_metabox() {
	$prefix = 'yourprefix_demo_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Test Metabox', 'tattoostudio' ),
		'object_types'  => array( 'page', ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Test Text', 'tattoostudio' ),
		'desc'       => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'         => $prefix . 'text',
		'type'       => 'text',
		'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
		// 'column'          => true, // Display field value in the admin post-listing columns
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Small', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'textsmall',
		'type' => 'text_small',
		// 'repeatable' => true,
		// 'column' => array(
		// 	'name'     => esc_html__( 'Column Title', 'tattoostudio' ), // Set the admin column title
		// 	'position' => 2, // Set as the second column.
		// );
		// 'display_cb' => 'yourprefix_display_text_small_column', // Output the display of the column values through a callback.
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Medium', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'textmedium',
		'type' => 'text_medium',
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Read-only Disabled Field', 'tattoostudio' ),
		'desc'       => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'         => $prefix . 'readonly',
		'type'       => 'text_medium',
		'default'    => esc_attr__( 'Hey there, I\'m a read-only field', 'tattoostudio' ),
		'save_field' => false, // Disables the saving of this field.
		'attributes' => array(
			'disabled' => 'disabled',
			'readonly' => 'readonly',
		),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Custom Rendered Field', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'render_row_cb',
		'type' => 'text',
		'render_row_cb' => 'yourprefix_render_row_cb',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Website URL', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Email', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'email',
		'type' => 'text_email',
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Time', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'time',
		'type' => 'text_time',
		// 'time_format' => 'H:i', // Set to 24hr format
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Time zone', 'tattoostudio' ),
		'desc' => esc_html__( 'Time zone', 'tattoostudio' ),
		'id'   => $prefix . 'timezone',
		'type' => 'select_timezone',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Date Picker', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'textdate',
		'type' => 'text_date',
		// 'date_format' => 'Y-m-d',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Date Picker (UNIX timestamp)', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'textdate_timestamp',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => $prefix . 'timezone', // Optionally make this field honor the timezone selected in the select_timezone specified above
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Date/Time Picker Combo (UNIX timestamp)', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'datetime_timestamp',
		'type' => 'text_datetime_timestamp',
	) );

	// This text_datetime_timestamp_timezone field type
	// is only compatible with PHP versions 5.3 or above.
	// Feel free to uncomment and use if your server meets the requirement
	// $cmb_demo->add_field( array(
	// 	'name' => esc_html__( 'Test Date/Time Picker/Time zone Combo (serialized DateTime object)', 'tattoostudio' ),
	// 	'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
	// 	'id'   => $prefix . 'datetime_timestamp_timezone',
	// 	'type' => 'text_datetime_timestamp_timezone',
	// ) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Money', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'textmoney',
		'type' => 'text_money',
		// 'before_field' => '£', // override '$' symbol if needed
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Test Color Picker', 'tattoostudio' ),
		'desc'    => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'      => $prefix . 'colorpicker',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
		// 'attributes' => array(
		// 	'data-colorpicker' => json_encode( array(
		// 		'palettes' => array( '#3dd0cc', '#ff834c', '#4fa2c0', '#0bc991', ),
		// 	) ),
		// ),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Area', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'textarea',
		'type' => 'textarea',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Area Small', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'textareasmall',
		'type' => 'textarea_small',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Area for Code', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'textarea_code',
		'type' => 'textarea_code',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Title Weeeee', 'tattoostudio' ),
		'desc' => esc_html__( 'This is a title description', 'tattoostudio' ),
		'id'   => $prefix . 'title',
		'type' => 'title',
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Test Select', 'tattoostudio' ),
		'desc'             => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'               => $prefix . 'select',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'standard' => esc_html__( 'Option One', 'tattoostudio' ),
			'custom'   => esc_html__( 'Option Two', 'tattoostudio' ),
			'none'     => esc_html__( 'Option Three', 'tattoostudio' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Test Radio inline', 'tattoostudio' ),
		'desc'             => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'               => $prefix . 'radio_inline',
		'type'             => 'radio_inline',
		'show_option_none' => 'No Selection',
		'options'          => array(
			'standard' => esc_html__( 'Option One', 'tattoostudio' ),
			'custom'   => esc_html__( 'Option Two', 'tattoostudio' ),
			'none'     => esc_html__( 'Option Three', 'tattoostudio' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Test Radio', 'tattoostudio' ),
		'desc'    => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'      => $prefix . 'radio',
		'type'    => 'radio',
		'options' => array(
			'option1' => esc_html__( 'Option One', 'tattoostudio' ),
			'option2' => esc_html__( 'Option Two', 'tattoostudio' ),
			'option3' => esc_html__( 'Option Three', 'tattoostudio' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name'     => esc_html__( 'Test Taxonomy Radio', 'tattoostudio' ),
		'desc'     => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'       => $prefix . 'text_taxonomy_radio',
		'type'     => 'taxonomy_radio',
		'taxonomy' => 'category', // Taxonomy Slug
		// 'inline'  => true, // Toggles display to inline
	) );

	$cmb_demo->add_field( array(
		'name'     => esc_html__( 'Test Taxonomy Select', 'tattoostudio' ),
		'desc'     => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'       => $prefix . 'taxonomy_select',
		'type'     => 'taxonomy_select',
		'taxonomy' => 'category', // Taxonomy Slug
	) );

	$cmb_demo->add_field( array(
		'name'     => esc_html__( 'Test Taxonomy Multi Checkbox', 'tattoostudio' ),
		'desc'     => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'       => $prefix . 'multitaxonomy',
		'type'     => 'taxonomy_multicheck',
		'taxonomy' => 'post_tag', // Taxonomy Slug
		// 'inline'  => true, // Toggles display to inline
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Checkbox', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'checkbox',
		'type' => 'checkbox',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Test Multi Checkbox', 'tattoostudio' ),
		'desc'    => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'      => $prefix . 'multicheckbox',
		'type'    => 'multicheck',
		// 'multiple' => true, // Store values in individual rows
		'options' => array(
			'check1' => esc_html__( 'Check One', 'tattoostudio' ),
			'check2' => esc_html__( 'Check Two', 'tattoostudio' ),
			'check3' => esc_html__( 'Check Three', 'tattoostudio' ),
		),
		// 'inline'  => true, // Toggles display to inline
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Test wysiwyg', 'tattoostudio' ),
		'desc'    => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'      => $prefix . 'wysiwyg',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Image', 'tattoostudio' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'tattoostudio' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name'         => esc_html__( 'Multiple Files', 'tattoostudio' ),
		'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'tattoostudio' ),
		'id'           => $prefix . 'file_list',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'oEmbed', 'tattoostudio' ),
		'desc' => sprintf(
			/* translators: %s: link to codex.wordpress.pl/Embeds */
			esc_html__( 'Enter a youtube, twitter, or instagram URL. Supports services listed at %s.', 'tattoostudio' ),
			'<a href="https://codex.wordpress.pl/Embeds">codex.wordpress.pl/Embeds</a>'
		),
		'id'   => $prefix . 'embed',
		'type' => 'oembed',
	) );

	$cmb_demo->add_field( array(
		'name'         => 'Testing Field Parameters',
		'id'           => $prefix . 'parameters',
		'type'         => 'text',
		'before_row'   => 'yourprefix_before_row_if_2', // callback
		'before'       => '<p>Testing <b>"before"</b> parameter</p>',
		'before_field' => '<p>Testing <b>"before_field"</b> parameter</p>',
		'after_field'  => '<p>Testing <b>"after_field"</b> parameter</p>',
		'after'        => '<p>Testing <b>"after"</b> parameter</p>',
		'after_row'    => '<p>Testing <b>"after_row"</b> parameter</p>',
	) );

}

add_action( 'cmb2_admin_init', 'yourprefix_register_about_page_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function yourprefix_register_about_page_metabox() {
	$prefix = 'yourprefix_about_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_about_page = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'About Page Metabox', 'tattoostudio' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Test Text', 'tattoostudio' ),
		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'   => $prefix . 'text',
		'type' => 'text',
	) );

}

add_action( 'cmb2_admin_init', 'yourprefix_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function yourprefix_register_repeatable_group_field_metabox() {
	$prefix = 'yourprefix_group_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Repeating Field Group', 'tattoostudio' ),
		'object_types' => array( 'page', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'demo',
		'type'        => 'group',
		'description' => esc_html__( 'Generates reusable form entries', 'tattoostudio' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Entry {#}', 'tattoostudio' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Entry', 'tattoostudio' ),
			'remove_button' => esc_html__( 'Remove Entry', 'tattoostudio' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Entry Title', 'tattoostudio' ),
		'id'         => 'title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => esc_html__( 'Description', 'tattoostudio' ),
		'description' => esc_html__( 'Write a short description for this entry', 'tattoostudio' ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Entry Image', 'tattoostudio' ),
		'id'   => 'image',
		'type' => 'file',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Image Caption', 'tattoostudio' ),
		'id'   => 'image_caption',
		'type' => 'text',
	) );

}

// add_action( 'cmb2_admin_init', 'yourprefix_register_user_profile_metabox' );
// /**
//  * Hook in and add a metabox to add fields to the user profile pages
//  */
// function yourprefix_register_user_profile_metabox() {
// 	$prefix = 'yourprefix_user_';

// 	/**
// 	 * Metabox for the user profile screen
// 	 */
// 	$cmb_user = new_cmb2_box( array(
// 		'id'               => $prefix . 'edit',
// 		'title'            => esc_html__( 'User Profile Metabox', 'tattoostudio' ), // Doesn't output for user boxes
// 		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
// 		'show_names'       => true,
// 		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
// 	) );

// 	$cmb_user->add_field( array(
// 		'name'     => esc_html__( 'Extra Info', 'tattoostudio' ),
// 		'desc'     => esc_html__( 'field description (optional)', 'tattoostudio' ),
// 		'id'       => $prefix . 'extra_info',
// 		'type'     => 'title',
// 		'on_front' => false,
// 	) );

// 	$cmb_user->add_field( array(
// 		'name'    => esc_html__( 'Avatar', 'tattoostudio' ),
// 		'desc'    => esc_html__( 'field description (optional)', 'tattoostudio' ),
// 		'id'      => $prefix . 'avatar',
// 		'type'    => 'file',
// 	) );

// 	$cmb_user->add_field( array(
// 		'name' => esc_html__( 'Facebook URL', 'tattoostudio' ),
// 		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
// 		'id'   => $prefix . 'facebookurl',
// 		'type' => 'text_url',
// 	) );

// 	$cmb_user->add_field( array(
// 		'name' => esc_html__( 'Twitter URL', 'tattoostudio' ),
// 		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
// 		'id'   => $prefix . 'twitterurl',
// 		'type' => 'text_url',
// 	) );

// 	$cmb_user->add_field( array(
// 		'name' => esc_html__( 'Google+ URL', 'tattoostudio' ),
// 		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
// 		'id'   => $prefix . 'googleplusurl',
// 		'type' => 'text_url',
// 	) );

// 	$cmb_user->add_field( array(
// 		'name' => esc_html__( 'Linkedin URL', 'tattoostudio' ),
// 		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
// 		'id'   => $prefix . 'linkedinurl',
// 		'type' => 'text_url',
// 	) );

// 	$cmb_user->add_field( array(
// 		'name' => esc_html__( 'User Field', 'tattoostudio' ),
// 		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
// 		'id'   => $prefix . 'user_text_field',
// 		'type' => 'text',
// 	) );

// }

// add_action( 'cmb2_admin_init', 'yourprefix_register_taxonomy_metabox' );
// /**
//  * Hook in and add a metabox to add fields to taxonomy terms
//  */
// function yourprefix_register_taxonomy_metabox() {
// 	$prefix = 'yourprefix_term_';

// 	/**
// 	 * Metabox to add fields to categories and tags
// 	 */
// 	$cmb_term = new_cmb2_box( array(
// 		'id'               => $prefix . 'edit',
// 		'title'            => esc_html__( 'Category Metabox', 'tattoostudio' ), // Doesn't output for term boxes
// 		'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
// 		'taxonomies'       => array( 'category', 'post_tag' ), // Tells CMB2 which taxonomies should have these fields
// 		// 'new_term_section' => true, // Will display in the "Add New Category" section
// 	) );

// 	$cmb_term->add_field( array(
// 		'name'     => esc_html__( 'Extra Info', 'tattoostudio' ),
// 		'desc'     => esc_html__( 'field description (optional)', 'tattoostudio' ),
// 		'id'       => $prefix . 'extra_info',
// 		'type'     => 'title',
// 		'on_front' => false,
// 	) );

// 	$cmb_term->add_field( array(
// 		'name' => esc_html__( 'Term Image', 'tattoostudio' ),
// 		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
// 		'id'   => $prefix . 'avatar',
// 		'type' => 'file',
// 	) );

// 	$cmb_term->add_field( array(
// 		'name' => esc_html__( 'Arbitrary Term Field', 'tattoostudio' ),
// 		'desc' => esc_html__( 'field description (optional)', 'tattoostudio' ),
// 		'id'   => $prefix . 'term_text_field',
// 		'type' => 'text',
// 	) );

// }

add_action( 'cmb2_admin_init', 'yourprefix_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page
 */
function yourprefix_register_theme_options_metabox() {

	$option_key = 'yourprefix_theme_options';

	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb2_metabox_form` helper function. See https://github.com/WebDevStudios/CMB2/wiki for more info.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'      => $option_key . 'page',
		'title'   => esc_html__( 'Theme Options Metabox', 'tattoostudio' ),
		'hookup'  => false, // Do not need the normal user/post hookup
		'show_on' => array(
			// These are important, don't remove
			'key'   => 'options-page',
			'value' => array( $option_key )
		),
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this option group.
	 * Prefix is not needed.
	 */
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Site Background Color', 'tattoostudio' ),
		'desc'    => esc_html__( 'field description (optional)', 'tattoostudio' ),
		'id'      => 'bg_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

}

/**
 * Only show this box in the CMB2 REST API if the user is logged in.
 *
 * @param  bool                 $is_allowed     Whether this box and its fields are allowed to be viewed.
 * @param  CMB2_REST_Controller $cmb_controller The controller object.
 *                                              CMB2 object available via `$cmb_controller->rest_box->cmb`.
 *
 * @return bool                 Whether this box and its fields are allowed to be viewed.
 */
function yourprefix_limit_rest_view_to_logged_in_users( $is_allowed, $cmb_controller ) {
	if ( ! is_user_logged_in() ) {
		$is_allowed = false;
	}

	return $is_allowed;
}

add_action( 'cmb2_init', 'yourprefix_register_rest_api_box' );
/**
 * Hook in and add a box to be available in the CMB2 REST API. Can only happen on the 'cmb2_init' hook.
 * More info: https://github.com/WebDevStudios/CMB2/wiki/REST-API
 */
function yourprefix_register_rest_api_box() {
	$prefix = 'yourprefix_rest_';

	$cmb_rest = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'REST Test Box', 'tattoostudio' ),
		'object_types'  => array( 'page', ), // Post type
		'show_in_rest' => WP_REST_Server::ALLMETHODS, // WP_REST_Server::READABLE|WP_REST_Server::EDITABLE, // Determines which HTTP methods the box is visible in.
		// Optional callback to limit box visibility.
		// See: https://github.com/WebDevStudios/CMB2/wiki/REST-API#permissions
		// 'get_box_permissions_check_cb' => 'yourprefix_limit_rest_view_to_logged_in_users',
	) );

	$cmb_rest->add_field( array(
		'name'       => esc_html__( 'REST Test Text', 'tattoostudio' ),
		'desc'       => esc_html__( 'Will show in the REST API for this box and for pages.', 'tattoostudio' ),
		'id'         => $prefix . 'text',
		'type'       => 'text',
	) );

	$cmb_rest->add_field( array(
		'name'       => esc_html__( 'REST Editable Test Text', 'tattoostudio' ),
		'desc'       => esc_html__( 'Will show in REST API "editable" contexts only (`POST` requests).', 'tattoostudio' ),
		'id'         => $prefix . 'editable_text',
		'type'       => 'text',
		'show_in_rest' => WP_REST_Server::EDITABLE// WP_REST_Server::ALLMETHODS|WP_REST_Server::READABLE, // Determines which HTTP methods the field is visible in. Will override the cmb2_box 'show_in_rest' param.
	) );
}
