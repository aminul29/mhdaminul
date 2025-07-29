<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

final class Gridos_Elementor {
    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
        add_action( 'elementor/elements/categories_registered', [ $this, 'add_widget_categories' ] );
    }

    public function register_widgets( $widgets_manager ) {
        // Load widget files
        require_once GRIDOS_ELEMENTOR_WIDGETS_DIR . '/home-block.php';
        // Add more widget requires here

        // Register widgets
        try {
            $widgets_manager->register( new \Gridos\Elementor\Widgets\Home_Block() );
            // Register other widgets here
        } catch ( \Exception $e ) {
            wp_die( esc_html( $e->getMessage() ) );
        }
    }

    public function add_widget_categories( $elements_manager ) {
        $elements_manager->add_category(
            'gridos',
            [
                'title' => esc_html__( 'Gridos Widgets', 'gridos' ),
                'icon' => 'fa fa-plug',
            ]
        );
    }
}
