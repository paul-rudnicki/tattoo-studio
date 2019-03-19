<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "tattoo_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'tattoo_options',
        'dev_mode' => TRUE,
        'use_cdn' => TRUE,
        'display_name' => 'Options',
        'display_version' => FALSE,
        'page_slug' => 'tattoo_options',
        'page_title' => 'Options',
        'update_notice' => TRUE,
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Options',
        'menu_icon' => 'dashicons-admin-generic',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'page_priority' => '4',
        'customizer' => TRUE,
        'default_mark' => '*',
        'hints' => array(
            'icon' => 'el el-adjust-alt',
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
        'dev_mode' => false,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    // $args['share_icons'][] = array(
    //     'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
    //     'title' => 'Visit us on GitHub',
    //     'icon'  => 'el el-github'
    //     //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
    //     'title' => 'Like us on Facebook',
    //     'icon'  => 'el el-facebook'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://twitter.com/reduxframework',
    //     'title' => 'Follow us on Twitter',
    //     'icon'  => 'el el-twitter'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://www.linkedin.com/company/redux-framework',
    //     'title' => 'Find us on LinkedIn',
    //     'icon'  => 'el el-linkedin'
    // );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'tattoostudio' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'tattoostudio' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'tattoostudio' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'tattoostudio' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'tattoostudio' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Basic Field', 'tattoostudio' ),
        'id'     => 'basic',
        'desc'   => __( 'Basic field with the no subsections.', 'tattoostudio' ),
        'icon'   => 'el el-home',
        'fields' => array(
            array(
                'id'       => 'opt-text',
                'type'     => 'text',
                'title'    => __( 'Example Text', 'tattoostudio' ),
                'desc'     => __( 'Example description.', 'tattoostudio' ),
                'subtitle' => __( 'Example subtitle.', 'tattoostudio' ),
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Basic Fieldss', 'tattoostudio' ),
        'id'    => 'basic',
        'desc'  => __( 'Basic fields as the subsections.', 'tattoostudio' ),
        'icon'  => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Text', 'tattoostudio' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'tattoostudio' ),
        'id'         => 'opt-text-subsection',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'text-example',
                'type'     => 'text',
                'title'    => __( 'Text Field', 'tattoostudio' ),
                'subtitle' => __( 'Subtitle', 'tattoostudio' ),
                'desc'     => __( 'Field Description', 'tattoostudio' ),
                'default'  => 'Default Text',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Text Area', 'tattoostudio' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'tattoostudio' ),
        'id'         => 'opt-textarea-subsection',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'textarea-example',
                'type'     => 'textarea',
                'title'    => __( 'Text Area Field', 'tattoostudio' ),
                'subtitle' => __( 'Subtitle', 'tattoostudio' ),
                'desc'     => __( 'Field Description', 'tattoostudio' ),
                'default'  => 'Default Text',
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'  => __( 'Header', 'tattoostudio' ),
        'id'     => 'logo',
        // 'desc'   => __( '', 'tattoostudio' ),
        'icon'   => 'el el-chevron-up',
        'fields' => array(
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __('Logo image', 'tattoostudio'),
                'default'  => array(
                    'url'=> get_template_directory_uri() . '/img/407x88.png',
                ),
            ),
            array(
                'id'       => 'default_background',
                'type'     => 'media',
                'url'      => true,
                'title'    => __('Default Background', 'tattoostudio'),
                'default'  => array(
                    'url'=> get_template_directory_uri() . '/img/1920x475.png',
                ),
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'  => __( 'Footer', 'tattoostudio' ),
        'id'     => 'footer',
        'desc'   => __( 'Basic field with the no subsections.', 'tattoostudio' ),
        'icon'   => 'el el-download-alt',
        // 'fields' => array(
        //     array(
        //         'id'       => 'aaa',
        //         'type'     => 'text',
        //         'title'    => __( 'Example Text', 'tattoostudio' ),
        //         'desc'     => __( 'Example description.', 'tattoostudio' ),
        //         'subtitle' => __( 'Example subtitle.', 'tattoostudio' ),
        //     )
        // )
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Left column', 'tattoostudio' ),
        'desc'       => __( 'Enter fields for footer left column.', 'tattoostudio' ),
        'id'         => 'footer_left',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer_left_visibility',
                'type'     => 'radio',
                'title'    => __('Visibility', 'tattoostudio'), 
                // 'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
                'desc'     => __('Show or hide footer left column.', 'tattoostudio'),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'on' => __('On', 'tattoostudio'), 
                    'off' => __('Off', 'tattoostudio'), 
                ),
                'default' => 'off'
            ),
            array(
                'id'       => 'footer_left_subtitle',
                'type'     => 'text',
                'title'    => __( 'Subtitle', 'tattoostudio' ),
                // 'subtitle' => __( 'Subtitle', 'tattoostudio' ),
                // 'desc'     => __( 'Field Description', 'tattoostudio' ),
            ),
             array(
                'id'       => 'footer_left_title',
                'type'     => 'text',
                'title'    => __( 'Title', 'tattoostudio' ),
                // 'subtitle' => __( 'Subtitle', 'tattoostudio' ),
                // 'desc'     => __( 'Field Description', 'tattoostudio' ),
            ),
            array(
                'id'=>'footer_left_description',
                'type' => 'textarea',
                'title' => __('Description', 'tattoostudio'), 
                // 'subtitle' => __('Custom HTML Allowed (wp_kses)', 'tattoostudio'),
                'desc' => __('Custom HTML allowed (a, br, em, strong)', 'tattoostudio'),
                'validate' => 'html_custom',
                // 'default' => '<br />Some HTML is allowed in here.<br />',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array()
                )
            ),
            array(
                'id'       => 'footer_left_link',
                'type'     => 'text',
                'title'    => __( 'Link to gallery', 'tattoostudio' ),
                'validate' => 'url',
                // 'subtitle' => __( 'Subtitle', 'tattoostudio' ),
                // 'desc'     => __( 'Field Description', 'tattoostudio' ),
            ),
            array(
                'id'       => 'footer_left_twitter',
                'type'     => 'text',
                'title'    => __( 'Twitter URL', 'tattoostudio' ),
                'validate' => 'url',
                // 'subtitle' => __( 'Subtitle', 'tattoostudio' ),
                // 'desc'     => __( 'Field Description', 'tattoostudio' ),
            ),
            array(
                'id'       => 'footer_left_facebook',
                'type'     => 'text',
                'title'    => __( 'Facebook URL', 'tattoostudio' ),
                'validate' => 'url',
                // 'subtitle' => __( 'Subtitle', 'tattoostudio' ),
                // 'desc'     => __( 'Field Description', 'tattoostudio' ),
            ),
            array(
                'id'       => 'footer_left_youtube',
                'type'     => 'text',
                'title'    => __( 'Youtube URL', 'tattoostudio' ),
                'validate' => 'url',
                // 'subtitle' => __( 'Subtitle', 'tattoostudio' ),
                // 'desc'     => __( 'Field Description', 'tattoostudio' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Center column', 'tattoostudio' ),
        'desc'       => __( 'Enter fields for footer center column.', 'tattoostudio' ),
        'id'         => 'footer_center',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer_center_visibility',
                'type'     => 'radio',
                'title'    => __('Visibility', 'tattoostudio'), 
                // 'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
                'desc'     => __('Show or hide footer center column.', 'tattoostudio'),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'on' => __('On', 'tattoostudio'), 
                    'off' => __('Off', 'tattoostudio'), 
                ),
                'default' => 'off'
            ),
            array(
                'id'=>'footer_center_address',
                'type' => 'textarea',
                'title' => __('Address', 'tattoostudio'), 
                // 'subtitle' => __('Custom HTML Allowed (wp_kses)', 'tattoostudio'),
                'desc' => __('Custom HTML allowed (a, br, em, strong)', 'tattoostudio'),
                'validate' => 'html_custom',
                // 'default' => '<br />Some HTML is allowed in here.<br />',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array()
                )
            ),
            array(
                'id'=>'footer_center_email',
                'type' => 'textarea',
                'title' => __('Email', 'tattoostudio'), 
                // 'subtitle' => __('Custom HTML Allowed (wp_kses)', 'tattoostudio'),
                'desc' => __('Custom HTML allowed (a, br, em, strong)', 'tattoostudio'),
                'validate' => 'html_custom',
                // 'default' => '<br />Some HTML is allowed in here.<br />',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array()
                )
            ),
            array(
                'id'=>'footer_center_phone',
                'type' => 'textarea',
                'title' => __('Phone', 'tattoostudio'), 
                // 'subtitle' => __('Custom HTML Allowed (wp_kses)', 'tattoostudio'),
                'desc' => __('Custom HTML allowed (a, br, em, strong)', 'tattoostudio'),
                'validate' => 'html_custom',
                // 'default' => '<br />Some HTML is allowed in here.<br />',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array()
                )
            ),
            array(
                'id'=>'footer_center_open',
                'type' => 'textarea',
                'title' => __('Open', 'tattoostudio'), 
                // 'subtitle' => __('Custom HTML Allowed (wp_kses)', 'tattoostudio'),
                'desc' => __('Custom HTML allowed (a, br, em, strong)', 'tattoostudio'),
                'validate' => 'html_custom',
                // 'default' => '<br />Some HTML is allowed in here.<br />',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array()
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Right column', 'tattoostudio' ),
        'desc'       => __( 'Enter fields for footer right column.', 'tattoostudio' ),
        'id'         => 'footer_right',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer_right_visibility',
                'type'     => 'radio',
                'title'    => __('Visibility', 'tattoostudio'), 
                // 'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
                'desc'     => __('Show or hide footer right column.', 'tattoostudio'),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'on' => __('On', 'tattoostudio'), 
                    'off' => __('Off', 'tattoostudio'), 
                ),
                'default' => 'off'
            ),
            array(
                'id'       => 'footer_right_shortcode',
                'type'     => 'text',
                'title'    => __( 'Contact Form 7', 'tattoostudio' ),
                // 'subtitle' => __( 'Subtitle', 'tattoostudio' ),
                'desc'     => __( 'Enter a shortcode', 'tattoostudio' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Map', 'tattoostudio' ),
        // 'desc'       => __( 'Enter fields for footer right column.', 'tattoostudio' ),
        'id'         => 'footer_map',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer_map_visibility',
                'type'     => 'radio',
                'title'    => __('Visibility', 'tattoostudio'), 
                // 'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
                'desc'     => __('Show or hide map.', 'tattoostudio'),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'on' => __('On', 'tattoostudio'), 
                    'off' => __('Off', 'tattoostudio'), 
                ),
                'default' => 'off'
            ),
            array(
                'id'       => 'footer_map_url',
                'type'     => 'textarea',
                'title'    => __( 'Google map URL', 'tattoostudio' ),
                'validate' => 'url',
                // 'subtitle' => __( 'Subtitle', 'tattoostudio' ),
                'desc'     => __( 'Visit <a href="https://www.google.com/maps">Google maps</a> to create your map (Step by step: 1. Click the menu symbol in the higher left corner and select "Your places" 2. Clik the Home or Work Button and set address 3. Click the Share button. On modal window "Embed map" choose short URL 4. Copy URL link and paste it).', 'tattoostudio' ),
            ),
            array(
                'id'   => 'footer_map_url',
                'type' => 'textarea',
                'title'    => __( 'Google map URL', 'tattoostudio' ),
                // 'subtitle' => __('Custom HTML Allowed (wp_kses)', 'tattoostudio'),
                'desc'     => __( 'Visit <a href="https://www.google.com/maps">Google maps</a> to create your map (Step by step: 1. Click the menu symbol in the higher left corner and select "Your places" 2. Clik the Home or Work Button and set address 3. Click the Share button. On modal window "Embed map" choose short URL 4. Copy URL link and paste it).', 'tattoostudio' ),
                'validate' => 'html_custom',
                'allowed_html' => array(
                    'iframe' => array(
                        'src' => array(),
                        'width' => array(),
                        'height' => array(),
                        'frameborder' => array(),
                        'style' => array(),
                        'allowfullscreen' => array()
                    )
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( '404', 'tattoostudio' ),
        'id'     => '404',
        'desc'   => __( 'You can create your own page 404', 'tattoostudio' ),
        'icon'   => 'el el-error-alt',
        'fields' => array(
            array(
                'id'       => '404-image',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Background image', 'tattoostudio'),
                'default'  => array(
                    'url'=> get_template_directory_uri() . '/img/1920x950.png',
                ),
            ),
            array(
                'id'=>'404-description',
                'type' => 'textarea',
                'title' => __('Description', 'tattoostudio'), 
                // 'subtitle' => __('Custom HTML Allowed (wp_kses)', 'tattoostudio'),
                'desc' => __('Custom HTML allowed (a, br, span, em, strong)', 'tattoostudio'),
                'validate' => 'html_custom',
                // 'default' => '<br />Some HTML is allowed in here.<br />',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array(),
                    'span' => array(),
                )
            ),
            array(
                'id'       => '404-button-text',
                'type'     => 'text',
                'title'    => __( 'Button text', 'tattoostudio' ),
                // 'desc'     => __( 'Example description.', 'tattoostudio' ),
                // 'subtitle' => __( 'Example subtitle.', 'tattoostudio' ),
            ),
            array(
                'id'       => '404-button-url',
                'type'     => 'text',
                'title'    => __( 'Button URL', 'tattoostudio' ),
                'validate' => 'url',
                // 'desc'     => __( 'Example description.', 'tattoostudio' ),
                // 'subtitle' => __( 'Example subtitle.', 'tattoostudio' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Twitter', 'tattoostudio' ),
        'id'     => 'twitter',
        'desc'   => __( "Details about your Twitter Application IMPORTANT: If you don't know how to make your twitter application, check our instructions under the form.", 'tattoostudio' ),
        'icon'   => 'el el-twitter',
        'fields' => array(
             array(
                'id'       => 'twitter-api-key',
                'type'     => 'text',
                'title'    => __( 'Twitter Application API Key (Consumer key)', 'tattoostudio' ),
                // 'desc'     => __( 'Example description.', 'tattoostudio' ),
                // 'subtitle' => __( 'Example subtitle.', 'tattoostudio' ),
            ),
            array(
                'id'       => 'twitter-api-secret',
                'type'     => 'text',
                'title'    => __( 'Twitter Application API Secret (Consumer secret)', 'tattoostudio' ),
                // 'desc'     => __( 'Example description.', 'tattoostudio' ),
                // 'subtitle' => __( 'Example subtitle.', 'tattoostudio' ),
            ),
            array(
                'id'       => 'twitter-token',
                'type'     => 'text',
                'title'    => __( 'OAuth Access Token', 'tattoostudio' ),
                // 'desc'     => __( 'Example description.', 'tattoostudio' ),
                // 'subtitle' => __( 'Example subtitle.', 'tattoostudio' ),
            ),
            array(
                'id'       => 'twitter-token-secret',
                'type'     => 'text',
                'title'    => __( 'OAuth Access Token Secret', 'tattoostudio' ),
                // 'desc'     => __( 'Example description.', 'tattoostudio' ),
                // 'subtitle' => __( 'Example subtitle.', 'tattoostudio' ),
            ),
            array(
                'id'   => 'twitter-info',
                'type' => 'info',
                'desc' => '<h2>How to setup your Twitter Application</h2>
            <p> There is few simple steps you need to follow</p>
            <ol>
                <li> Go to <a href="http://apps.twitter.com/" target="_blank">http://apps.twitter.com/</a> </li>
                <li> Login and click Create New App
                    <ol>
                    <li><strong>Name:</strong>  Give your app a unique name </li>
                    <li><strong>Description:</strong>  You do not have to worry much about the description- you can change this later. </li>
                    <li><strong>Website:</strong>  Put your website in the website field. It is supposed to be your applications publicly accessible home page. </li>
                    <li><strong>Callback URL:</strong>  You can ignore the Callback URL field. </li>
                    </ol>
                </li>
                <li>You will then be presented with lots of information, but were are not quite done yet. We now need to authorise the Twitter app for your Twitter account.<br/> To do this, click the Create my access token button. This takes a few seconds, so if you do not see the access tokens on the next screen,<br/> you may have to refresh the page a few times.</li>
                <li>Once you have done this, you can copy your <strong>Consumer Key</strong>, <strong>Consumer Secret</strong>, <strong>OAuth Access Token</strong>, <strong>OAuth Access Token Secret</strong> to form above.</li>
            </ol>',
            ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */
