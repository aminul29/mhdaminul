<?php
/**
 * Implements the compatibility for the Elementor plugin in gridos  theme.
 *
 * @package    Gridos - Unikwp
 * @subpackage Gridos 
 * @since      Gridos 1.0
 */


if ( ! function_exists( 'gridos_elementor_active_page_check' ) ) :

	/**
	 * Check whether Elementor plugin is activated and is active on current page or not
	 *
	 * @return bool
	 *
	 * @since gridos 1.0
	 */
	function gridos_Elementor_active_page_check() {
		global $post;

		if ( defined( 'ELEMENTOR_VERSION' ) && get_post_meta( $post->ID, '_elementor_edit_mode', true ) ) {
			return true;
		}

		return false;
	}

endif;

if ( ! function_exists( 'gridos_elementor_widget_render_filter' ) ) :

	/**
	 * Render the default WordPress widget settings, ie, divs
	 *
	 * @param $args the widget id
	 *
	 * @return array register sidebar divs
	 *
	 * @since gridos 1.0
	 */
	function gridos_Elementor_widget_render_filter( $args ) {

		return
			array(
				'before_widget' => '<section class="widget ' . gridos_widget_class_names( $args[ 'widget_id' ] ) . ' clearfix">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="heading2 widget-title">',
				'after_title'   => '</h2>',
			);
	}

endif;

add_filter( 'elementor/widgets/wordpress/widget_args', 'gridos_elementor_widget_render_filter' ); // WPCS: spelling ok.

if ( ! function_exists( 'gridos_widget_class_names' ) ) :

	/**
	 * Render the widget classes for Elementor plugin compatibility
	 *
	 * @param $widgets_id the widgets of the id
	 *
	 * @return mixed the widget classes of the id passed
	 *
	 * @since gridos Custom1.0
	 */
	function gridos_widget_class_names( $widgets_id ) {

		$widgets_id = str_replace( 'wp-widget-', '', $widgets_id );

		$classes = gridos_widgets_classes();

		$return_value = isset( $classes[ $widgets_id ] ) ? $classes[ $widgets_id ] : 'widget_featured_block';

		return $return_value;
	}

endif;


/**
 * Load the gridos Custom Elementor widgets file and registers it
 */
if ( ! function_exists( 'gridos_elementor_widgets_registered' ) ) :

	/**
	 * Load and register the required Elementor widgets file
	 *
	 * @param $widgets_manager
	 *
	 * @since gridos Custom 1.0
	 */
	function gridos_elementor_widgets_registered( $widgets_manager ) {

		// Require the files
		// 1. Block Widgets
		
		require GRIDOS_ELEMENTOR_WIDGETS_DIR . '/home-block.php';
		require GRIDOS_ELEMENTOR_WIDGETS_DIR . '/about-block.php';
		require GRIDOS_ELEMENTOR_WIDGETS_DIR . '/tools-block.php';
		require GRIDOS_ELEMENTOR_WIDGETS_DIR . '/award-block.php';
		require GRIDOS_ELEMENTOR_WIDGETS_DIR . '/services-block.php';
		require GRIDOS_ELEMENTOR_WIDGETS_DIR . '/work.php';
		require GRIDOS_ELEMENTOR_WIDGETS_DIR . '/contact.php';

		

		// Register the widgets
		// 1. Block Widgets
		
		$widgets_manager->register_widget_type( new \Elementor\Gridos_Elementor_Global_Widgets_Home_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Gridos_Elementor_Global_Widgets_About_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Gridos_Elementor_Global_Widgets_Tools_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Gridos_Elementor_Global_Widgets_Award_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Gridos_Elementor_Global_Widgets_Services_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Gridos_Elementor_Global_Widgets_Work_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Gridos_Elementor_Global_Widgets_Contact_Block() );
		
		
	}

endif;

add_action( 'elementor/widgets/widgets_registered', 'gridos_elementor_widgets_registered' );

if ( ! function_exists( 'gridos_elementor_category' ) ) :

	/**
	 * Add the Elementor category for use in gridos Custom widgets as seperator
	 *
	 * @since gridos Custom 1.0
	 */
	function gridos_Elementor_category() {

		// Register widget block category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'gridos-widget-blocks', array(
			'title' => esc_html__( 'gridos Custom Widget Blocks', 'gridos' ),
		), 1 );

		// Register widget grid category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'gridos-widget-grid', array(
			'title' => esc_html__( 'gridos Custom Widget Grid', 'gridos' ),
		), 1 );

		// Register widget global category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'gridos-widget-global', array(
			'title' => esc_html__( 'gridos Custom Global Widgets', 'gridos' ),
		), 1 );
	}

endif;

add_action( 'elementor/init', 'gridos_elementor_category' );
