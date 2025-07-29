<?php

/**
 * Gridos
 *
 * Unikwp - Besim Dauti
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'GRIDOS_PARENT_DIR', get_template_directory() );
define( 'GRIDOS_CHILD_DIR', get_stylesheet_directory() );
define( 'GRIDOS_INCLUDES_DIR', GRIDOS_PARENT_DIR . '/framework' );
define( 'GRIDOS_CSS_DIR', GRIDOS_PARENT_DIR . '/assets/css' );
define( 'GRIDOS_JS_DIR', GRIDOS_PARENT_DIR . '/assets/js' );
define( 'GRIDOS_LANGUAGES_DIR', GRIDOS_PARENT_DIR . '/languages' );
define( 'GRIDOS_ELEMENTOR_DIR', GRIDOS_INCLUDES_DIR . '/elementor' );
define( 'GRIDOS_ELEMENTOR_WIDGETS_DIR', GRIDOS_ELEMENTOR_DIR . '/widgets' );

/**
 * Define URL Location Constants
 */
define( 'GRIDOS_PARENT_URL', get_template_directory_uri() );
define( 'GRIDOS_CHILD_URL', get_stylesheet_directory_uri() );
define( 'GRIDOS_INCLUDES_URL', GRIDOS_PARENT_URL . '/framework' );
define( 'GRIDOS_CSS_URL', GRIDOS_PARENT_URL . '/assets/css' );
define( 'GRIDOS_JS_URL', GRIDOS_PARENT_URL . '/assets/js' );
define( 'GRIDOS_LANGUAGES_URL', GRIDOS_PARENT_URL . '/languages' );
define( 'GRIDOS_ELEMENTOR_URL', GRIDOS_INCLUDES_URL . '/elementor' );
define( 'GRIDOS_ELEMENTOR_WIDGETS_URL', GRIDOS_ELEMENTOR_URL . '/widgets' );

require_once GRIDOS_INCLUDES_DIR . '/metabox/meta-box.php';
require_once GRIDOS_INCLUDES_DIR . '/customize.php';


if ( ! isset( $content_width ) ) {
    $content_width = 1140;
}

/** Add the Elementor compatibility files */
if ( defined( 'ELEMENTOR_VERSION' ) ) {
    require_once GRIDOS_ELEMENTOR_DIR . '/class-gridos-elementor.php';
    
    // Initialize Elementor features
    add_action( 'init', function() {
        Gridos_Elementor::instance();
    }, 0 );
}

// Register Elementor Locations
function gridos_register_elementor_locations( $elementor_theme_manager ) {
    $elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'gridos_register_elementor_locations' );


require_once get_template_directory() . '/includes/gridos-after-setup.php';
require_once get_template_directory() . '/includes/gridos-widgets.php';
require_once get_template_directory() . '/includes/gridos-scripts.php';
require_once get_template_directory() . '/includes/elementor-functions.php';
require_once get_template_directory() . '/includes/other-functions.php';
require_once get_template_directory() . '/includes/gridos-filter.php';
require_once get_template_directory() . '/includes/gridos_loadmore.php';
require_once get_template_directory() . '/includes/fonts-style-action.php';
require_once get_template_directory() . '/includes/gridos-comments.php';
require_once get_template_directory() . '/includes/gridos-required-plugins.php';

add_theme_support('post-thumbnails', array('post'));


// Automatically set image alt text, caption, and description to the file name on upload
add_action('add_attachment', function($post_ID) {
    $post = get_post($post_ID);
    if ($post && strpos($post->post_mime_type, 'image/') === 0) {
        $file = get_attached_file($post_ID);
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $filename = str_replace(['-', '_'], ' ', $filename); // Make it more readable

        // Update alt text
        update_post_meta($post_ID, '_wp_attachment_image_alt', $filename);

        // Update caption and description
        wp_update_post([
            'ID' => $post_ID,
            'post_excerpt' => $filename, // Caption
            'post_content' => $filename, // Description
        ]);
    }
});

// Test Comment