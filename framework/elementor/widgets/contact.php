<?php
/**
 * Gridos Elementor Global Widget Contact_Block.
 *
 * @package    Gridos - Unikwp
 * @subpackage Gridos
 * @since      Gridos 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Gridos_Elementor_Global_Widgets_Contact_Block extends Widget_Base {

	/**
	 * Retrieve Gridos_Elementor_Global_Widgets_Contact_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Gridos-Global-Widgets-Contact-Block';
	}

	/**
	 * Retrieve Gridos_Elementor_Global_Widgets_Contact_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Contact Block', 'gridos' );
	}

	/**
	 * Retrieve Gridos_Elementor_Global_Widget_Contact_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the Gridos_Elementor_Global_Widget_Contact_Block widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'gridos-widget-blocks' );
	}
	
	/**
	 * Register Gridos_Elementor_Global_Widget_Contact_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_Contact_block_title_manage',
			array(
				'label' => esc_html__( 'Contact Block', 'gridos' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Contact Form Title',
	        ]
	    );

	    $this->add_control(
	        'about_contact',
	        [
	            'label' => 'Contact Form 7 Shortcode',
	            'type' => Controls_Manager::WYSIWYG,
	        ]
	    );

	    $this->end_controls_section();

	}

	/**
	 * Render Gridos_Elementor_Global_Widgets_Contact_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : '';

	    // Output the section structure
	    ?>
    	
	    <div class="contact-wrapper">
            <h3 class="contact-title"><?php echo esc_html( $about_title ); ?></h3>
            <div class="w-form">
                <?php echo do_shortcode($settings['about_contact']); ?>
            </div>
        </div>

    <?php

	}
}
