<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function learning_widgets_init(){
	register_sidebar( array(
		'name' => __('Main Sidebar', 'learning'),
		'id' => 'main-sidebar',
		'description' => __('widget are for Sidebar at home page','learning'),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __('Footer widget 1', 'learning'),
		'id' => 'footer1',
		'description' => __('widget area 1 for footer on home page','learning'),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __('Footer widget 2', 'learning'),
		'id' => 'footer2',
		'description' => __('widget area 2 for footer on home page','learning'),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __('Footer widget 3', 'learning'),
		'id' => 'footer3',
		'description' => __('widget area 3 for footer on home page','learning'),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'learning_widgets_init' );





?>