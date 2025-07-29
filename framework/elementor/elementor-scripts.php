<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function gridos_elementor_scripts() {
    // Frontend scripts
    if ( ! is_admin() ) {
        wp_enqueue_style(
            'gridos-elementor',
            GRIDOS_CSS_URL . '/elementor.css',
            [],
            GRIDOS_VERSION
        );
    }

    // Editor scripts
    if ( \Elementor\Plugin::$instance->preview->is_preview_mode() || \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
        wp_enqueue_style(
            'gridos-elementor-editor',
            GRIDOS_CSS_URL . '/elementor-editor.css',
            [],
            GRIDOS_VERSION
        );

        wp_enqueue_script(
            'gridos-elementor-editor',
            GRIDOS_JS_URL . '/elementor-editor.js',
            ['elementor-frontend'],
            GRIDOS_VERSION,
            true
        );
    }
}
add_action( 'elementor/frontend/after_register_scripts', 'gridos_elementor_scripts' );
