<?php
namespace App\Controllers;
/**
* Setups Controller
*/
class SetupsController
{
	
	function __construct()
	{
		add_action( 'wp_enqueue_scripts', [ &$this, 'loadStyles' ] );
		add_action( 'wp_enqueue_scripts', [ &$this, 'loadScripts' ] );
		add_action( 'after_setup_theme', [&$this, 'afterSetupTheme' ] );
		add_action( 'init', [ &$this, 'themeSetup'] );
		add_action( 'widgets_init', [&$this, 'registerSidebar'] );
		add_action( 'widgets_init', [&$this, 'registerWidgets'] );

		add_filter('pre_get_posts', [&$this, 'SearchFilter'] );

		add_action( 'admin_enqueue_scripts', [&$this, 'loadAdminScripts'] );
	}

	public function afterSetupTheme()
	{
		add_theme_support( 'title-tag' );
		add_theme_support( "post-thumbnails" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-header' );
		add_theme_support( "custom-background" );
		add_theme_support( 'content-width', 766 );
	}

	public function loadAdminScripts($hook)
	{
		if ('post.php' != $hook) {
			return;
		}
		wp_enqueue_script( 'tattoo_admin_scripts', get_template_directory_uri() . '/js/admin/scripts.js' );
	}

	public function themeSetup()
	{
		add_image_size( 'ts-post-thumbnail', 766, 325, true );
		add_image_size( 'ts-post-latest', 371, 371, true );
		add_image_size( 'ts-post-thumbnail-archive', 766, 324, true );
		add_image_size( 'ts-artist-thumbnail', 585, 825, true );
		add_image_size( 'ts-artists-thumbnail', 528, 640, true );
		add_image_size( 'ts-testimonials', 430, 430, true );
		// add_image_size( 'ts-popular_posts', 370, 370, true );

		register_nav_menus( array(
			'top_menu_Left' => __('Main Menu Left', 'tattoostudio'),
			'top_menu_right' => __('Main Menu Right', 'tattoostudio'),
			'mobile_menu' => __('Mobile Menu', 'tattoostudio'),
			'top_menu_hamburger' => __('Hamburger Menu', 'tattoostudio'),
		) );

	}

	public function registerWidgets()
	{
		register_widget( 'TSPopularPosts' );
	}

	public function registerSidebar()
	{
		$args = array(
			'name'          => __( 'Main Sidebar', 'tattoostudio' ),
			'id'            => 'tattoo-main-sidebar',
			'description'   => __( 'Sidebar area.', 'tattoostudio' ),
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		);
	
		register_sidebar( $args );
	}

	public function SearchFilter($query)
	{
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}

	public function loadStyles()
	{
		wp_enqueue_style( 'tattoo-styles', get_template_directory_uri() . '/css/style.css', array() );
		wp_enqueue_style( 'tatto-fonts', 'https://fonts.googleapis.com/css?family=Abril+Fatface&amp;subset=latin-ext', array() );
		wp_enqueue_style( 'simplelightbox', get_template_directory_uri() . '/css/simplelightbox.css', array() );
		wp_enqueue_style( 'unslider', get_template_directory_uri() . '/css/unslider.css', array() );
		wp_enqueue_style( 'wp-core', get_template_directory_uri() . '/style.css', array() );
	}

	public function loadScripts()
	{
		wp_deregister_script( 'jquery' );

		wp_enqueue_script('jquery', get_template_directory_uri() . "/js/jquery-3.1.1.min.js", array(), null, false);

		wp_enqueue_script('simple-lightbox', get_template_directory_uri() . "/js/simple-lightbox.js", array(), null, true);

		wp_register_script( 'unslider', get_template_directory_uri() . "/js/unslider.js", array(), null, true );
		
		$tattoo_settings = array(
			'theme_directory_uri' => get_template_directory_uri()
		);
		wp_localize_script( 'unslider', 'tattoo_settings', $tattoo_settings );

		wp_enqueue_script('unslider');

		wp_enqueue_script('jquery-countdown', get_template_directory_uri() . "/js/jquery.countdown.js", array(), null, false);

		// <!-- Custom Js -->
		
		wp_enqueue_script('tattoo-custom', get_template_directory_uri() . "/js/scripts.js", array(), false, true);
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
	}
}