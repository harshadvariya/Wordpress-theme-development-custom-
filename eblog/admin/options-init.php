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
    $opt_name = "options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'options',
        'display_name' => 'My Panel',
        'display_version' => '1.0.0',
        'page_slug' => 'eblog',
        'page_title' => 'Theme Options',
        'update_notice' => TRUE,
        'intro_text' => 'Manage Theme Options from this panel created by Eblog',
        'admin_bar' => TRUE,
        'menu_type' => 'submenu',
        'menu_title' => 'Theme Settings',
        'allow_sub_menu' => TRUE,
        'page_parent' => 'themes.php',
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
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
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

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
            'title'   => __( 'Theme Information 1', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'admin_folder' );
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
        'title'  => __( 'Basic Field', 'redux-framework-demo' ),
        'id'     => 'basic',
        'desc'   => __( 'Basic field with no subsections.', 'redux-framework-demo' ),
        'icon'   => 'el el-home',
        'fields' => array(
            array(
                'id'       => 'opt-text',
                'type'     => 'text',
                'title'    => __( 'Example Text', 'redux-framework-demo' ),
                'desc'     => __( 'Example description.', 'redux-framework-demo' ),
                'subtitle' => __( 'Example subtitle.', 'redux-framework-demo' ),
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'General Settings', 'redux-framework-demo' ),
        'id'    => 'general',
        'desc'  => __( 'Basic fields as subsections.', 'redux-framework-demo' ),
        'icon'  => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Logo', 'redux-framework-demo' ),
        'desc'       => __( 'Select Logo for your website' ),
        'id'         => 'logo-settings',
        'subsection' => true,
        'fields'     => array(
           array(
            'id'       => 'logo',
            'type'     => 'media', 
            'url'      => true,
            'title'    => __('Website Logo', 'redux-framework-demo'),
            'desc'     => __('Select Image File for your Logo', 'redux-framework-demo'),
            'default'  => array(
                'url'=> get_template_directory_uri(). '/images/logo.png'
            )
            ),
           array(
                'id'       => 'copyright-text',
                'type'     => 'textarea',
                'title'    => __( 'Footer Copyright', 'redux-framework-demo' ),
                'subtitle' => __( 'Enter text for your footer text copyright', 'redux-framework-demo' ),
                'desc'     => __( 'Enter text for your footer text copyright', 'redux-framework-demo' ),
                'default'  => 'develop by Eblog',
            )
        )
    ) );

      Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer Copyright', 'redux-framework-demo' ),
        'desc'       => __( 'Footer Copyright Text' ),
        'id'         => 'copyright-settings',
        'subsection' => true,
        'fields'     => array(
           array(
                'id'       => 'copyright-text',
                'type'     => 'textarea',
                'title'    => __( 'Footer Copyright', 'redux-framework-demo' ),
                'subtitle' => __( 'Enter text for your footer text copyright', 'redux-framework-demo' ),
                'desc'     => __( 'Enter text for your footer text copyright', 'redux-framework-demo' ),
                'default'  => 'develop by Eblog',
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Text Area', 'redux-framework-demo' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="http://docs.reduxframework.com/core/fields/textarea/" target="_blank">http://docs.reduxframework.com/core/fields/textarea/</a>',
        'id'         => 'opt-textarea-subsection',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'textarea-example',
                'type'     => 'textarea',
                'title'    => __( 'Text Area Field', 'redux-framework-demo' ),
                'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
                'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                'default'  => 'Default Text',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Header Settings', 'redux-framework-demo' ),
        'id'    => 'header-settings',
        'desc'  => __( 'Basic fields as subsections.', 'redux-framework-demo' ),
        'icon'  => 'el el-cog'
    ) );

       Redux::setSection( $opt_name, array(
        'title'      => __( 'Social Icons', 'redux-framework-demo' ),
        'desc'       => __( 'Manage Social media icon in header' ),
        'id'         => 'social-icon-settings',
        'subsection' => true,
        'fields'     => array(
          array(
                'id'       => 'social-icons',
                'type'     => 'switch', 
                'title'    => __('Show/Hide Icons', 'redux-framework-demo'),
                'subtitle' => __('You can show/hide social media icon in header', 'redux-framework-demo'),
                'default'  => true,
            )
        )
    ) );

    /*
     * <--- END SECTIONS
     */
