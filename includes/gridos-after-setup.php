<?php

// Set up theme support
function gridos_setup() {

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'widgets' );
    add_theme_support('category-thumbnails');
    add_theme_support( 'elementor' );
    add_theme_support( 'elementor-pro' );
    // Add support for full width Elementor sections
    add_theme_support( 'align-wide' );
    add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);


    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'primary'    => esc_html__( 'Primary Menu', 'gridos' ),
    ) );

    load_theme_textdomain( 'gridos', get_template_directory() . '/languages' );
  
}
add_action( 'after_setup_theme', 'gridos_setup' );



