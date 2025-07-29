<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register Elementor features
 */
function gridos_elementor_setup() {
    add_theme_support( 'elementor' );
    add_theme_support( 'elementor-pro' );
    add_theme_support( 'elementor-default-schemes' );
}
add_action( 'after_setup_theme', 'gridos_elementor_setup' );

/**
 * Elementor preview scripts
 */
function gridos_elementor_preview_scripts() {
    if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
        wp_enqueue_style( 'gridos-elementor-preview', get_template_directory_uri() . '/assets/css/elementor-preview.css', array(), '1.0' );
    }
}
add_action( 'elementor/preview/enqueue_styles', 'gridos_elementor_preview_scripts' );

/**
 * Ensure Elementor page templates work
 */
function gridos_elementor_page_templates( $page_templates ) {
    if ( version_compare( ELEMENTOR_VERSION, '2.0.0', '>=' ) ) {
        return $page_templates;
    }
    return array_merge( $page_templates, array(
        'elementor_canvas' => __( 'Elementor Canvas', 'gridos' ),
        'elementor_header_footer' => __( 'Elementor Full Width', 'gridos' ),
    ) );
}
add_filter( 'theme_page_templates', 'gridos_elementor_page_templates' );
