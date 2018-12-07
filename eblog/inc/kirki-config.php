<?php
/*
* kirki config
*/
Kirki::add_config( 'my_theme_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

 // Color
// Add new panel
Kirki::add_panel( 'my_colors', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'My Colors', 'Kirki' ),
    'description' => esc_attr__( 'My Colors description', 'Kirki' ),
) );
// Add New Section
Kirki::add_section( 'nav_settings', array(
    'title'         => esc_attr__( 'Navigation Settings', 'Kirki' ),
    'description'   => esc_attr__( 'Navigation Settings Description', 'Kirki' ),
    'panel'          => 'my_colors',
    'priority'       => 10,
) );
// add new control
Kirki::add_field( 'my_theme_config', array(
	'type'        => 'color',
	'settings'    => 'nav_bg_color',
	'label'       => __( 'Navigation Background', 'Kirki' ),
	'section'     => 'nav_settings',
	'default'     => '#333333',
	'output' => array(
		array(
			'element'  => '.main-navigation',
			'property' => 'background-color',
		),
	)
) );


// Text Area
Kirki::add_panel( 'my_home_sttings', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'My Home Settings', 'Kirki' )
) );
// Add New Section
Kirki::add_section( 'my_home_text', array(
    'title'         => esc_attr__( 'homepage texts', 'Kirki' ),
    'panel'          => 'my_home_sttings',
    'priority'       => 10,
) );
Kirki::add_field( 'my_theme_config', array(
	'type'     => 'textarea',
	'settings' => 'home_text_1',
	'label'    => __( 'Textarea Control', 'Kirki' ),
	'section'  => 'my_home_text',
	'default'  => esc_attr__( 'This is a defualt value', 'Kirki' ),
	'priority' => 10,
) );

// Typography
Kirki::add_panel( 'my_typography_settings', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Typography Settings', 'Kirki' )
) );
// Add New Section
Kirki::add_section( 'my_typography_settings', array(
    'title'         => esc_attr__( 'Headings', 'Kirki' ),
    'panel'          => 'my_typography_settings',
    'priority'       => 10,
) );
Kirki::add_field( 'my_theme_config', array(
	'type'        => 'typography',
	'settings'    => 'h1_typography',
	'label'       => esc_attr__( 'Heading 1', 'Kirki' ),
	'section'     => 'my_typography_settings',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '34px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
		'text-transform' => 'none',
		'text-align'     => 'left',
	),
	'priority'    => 10,
	'choices' => array(
	'fonts' => array(
		'google' => array( 'popularity', 30 ),
			),
	),
	'output'      => array(
		array(
			'element' => 'h1',
		),
	),
) );
// Heading h2 typography
Kirki::add_field( 'my_theme_config', array(
	'type'        => 'typography',
	'settings'    => 'h2_typography',
	'label'       => esc_attr__( 'Heading 2', 'Kirki' ),
	'section'     => 'my_typography_settings',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '24px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
		'text-transform' => 'none',
		'text-align'     => 'left',
	),
	'priority'    => 10,
	'choices' => array(
	'fonts' => array(
		'google' => array( 'popularity', 30 ),
			),
	),
	'output'      => array(
		array(
			'element' => 'h2',
		),
	),
) );