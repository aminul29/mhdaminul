<?php
/**
 * Gridos Elementor Global Widget Tools_Block.
 *
 * @package    Gridos - Unikwp
 * @subpackage Gridos
 * @since      Gridos 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Gridos_Elementor_Global_Widgets_Tools_Block extends Widget_Base {

	/**
	 * Retrieve Gridos_Elementor_Global_Widgets_Tools_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Gridos-Global-Widgets-Tools-Block';
	}

	/**
	 * Retrieve Gridos_Elementor_Global_Widgets_Tools_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Tools Block', 'gridos' );
	}

	/**
	 * Retrieve Gridos_Elementor_Global_Widget_Tools_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the Gridos_Elementor_Global_Widget_Tools_Block widget belongs to.
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
	 * Register Gridos_Elementor_Global_Widget_Tools_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_tools_block_title_manage',
			array(
				'label' => esc_html__( 'Tools Block', 'gridos' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Tools Title',
	        ]
	    );

	    
		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Tool Name', 'gridos' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_icon', [
				'label' => __( 'Icon Image', 'gridos' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Tool List', 'gridos' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

		$repeater = new Repeater();

	    $this->end_controls_section();

	    // Style Tab
	    $this->start_controls_section(
	        'section_style',
	        [
	            'label' => esc_html__('Style', 'gridos'),
	            'tab' => Controls_Manager::TAB_STYLE,
	        ]
	    );

	    // Title Style
	    $this->add_control(
	        'title_options',
	        [
	            'label' => esc_html__('Title', 'gridos'),
	            'type' => Controls_Manager::HEADING,
	            'separator' => 'before',
	        ]
	    );

	    $this->add_control(
	        'title_color',
	        [
	            'label' => esc_html__('Color', 'gridos'),
	            'type' => Controls_Manager::COLOR,
	            'selectors' => [
	                '{{WRAPPER}} .inner-pages-main-title' => 'color: {{VALUE}};',
	            ],
	        ]
	    );

	    $this->add_group_control(
	        Group_Control_Typography::get_type(),
	        [
	            'name' => 'title_typography',
	            'selector' => '{{WRAPPER}} .inner-pages-main-title',
	        ]
	    );

	    // Tools Items Style
	    $this->add_control(
	        'tools_items_options',
	        [
	            'label' => esc_html__('Tools Items', 'gridos'),
	            'type' => Controls_Manager::HEADING,
	            'separator' => 'before',
	        ]
	    );

	    $this->add_control(
	        'item_text_color',
	        [
	            'label' => esc_html__('Text Color', 'gridos'),
	            'type' => Controls_Manager::COLOR,
	            'selectors' => [
	                '{{WRAPPER}} .tools-item-text' => 'color: {{VALUE}};',
	            ],
	        ]
	    );

	    $this->add_group_control(
	        Group_Control_Typography::get_type(),
	        [
	            'name' => 'item_typography',
	            'selector' => '{{WRAPPER}} .tools-item-text',
	        ]
	    );

	    $this->add_responsive_control(
	        'tools_gap',
	        [
	            'label' => esc_html__('Items Gap', 'gridos'),
	            'type' => Controls_Manager::SLIDER,
	            'size_units' => ['px', 'em'],
	            'range' => [
	                'px' => [
	                    'min' => 0,
	                    'max' => 100,
	                ],
	            ],
	            'selectors' => [
	                '{{WRAPPER}} .tools-images' => 'gap: {{SIZE}}{{UNIT}};',
	            ],
	        ]
	    );

	    $this->add_responsive_control(
	        'tools_item_padding',
	        [
	            'label' => esc_html__('Item Padding', 'gridos'),
	            'type' => Controls_Manager::DIMENSIONS,
	            'size_units' => ['px', 'em', '%'],
	            'selectors' => [
	                '{{WRAPPER}} .tools-images' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	            ],
	        ]
	    );

	    $this->end_controls_section();
	}

	/**
	 * Render Gridos_Elementor_Global_Widgets_Tools_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : 'About';


	    // Output the section structure
	    ?>
		<div class="space-line"></div>
		<div class="tools">
            <h1 class="inner-pages-main-title"><?php echo esc_html( $about_title ); ?></h1>
            <div class="title-blue-line"></div>
            <div class="space-line"></div>
            <div class="tools-images">
            	<?php 
            		foreach (  $settings['list'] as $item ) { 
            	?>
                <div class="tools-item">
                    <div class="tools-item-text"><?php echo esc_html($item['list_title']); ?></div>
                    <img src="<?php echo esc_url($item['list_icon']['url']); ?>" loading="lazy" alt="tool" class="tools-item-image" />
                </div>
            	<?php } ?>
            </div>
        </div>
    
    <?php

	}
}
