<?php
/**
 * Gridos Elementor Global Widget Services_Block.
 *
 * @package    Gridos - Unikwp
 * @subpackage Gridos
 * @since      Gridos 1.0
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Gridos_Elementor_Global_Widgets_Services_Block extends Widget_Base {

	/**
	 * Retrieve Gridos_Elementor_Global_Widgets_Services_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Gridos-Global-Widgets-Services-Block';
	}

	/**
	 * Retrieve Gridos_Elementor_Global_Widgets_Services_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Services Block', 'gridos' );
	}

	/**
	 * Retrieve Gridos_Elementor_Global_Widget_Services_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the Gridos_Elementor_Global_Widget_Services_Block widget belongs to.
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
	 * Register Gridos_Elementor_Global_Widget_Services_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_services_block_title_manage',
			array(
				'label' => esc_html__( 'Services Block', 'gridos' ),
			)
		);
	    
		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Services Name', 'gridos' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_desc', [
				'label' => __( 'Services Description', 'gridos' ),
				'type' => Controls_Manager::TEXTAREA,
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
            'section_style_services',
            [
                'label' => esc_html__('Services Style', 'gridos'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Service Item Style
        $this->add_control(
            'service_item_background',
            [
                'label' => esc_html__('Item Background', 'gridos'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'service_item_shadow',
                'selector' => '{{WRAPPER}} .service-item',
            ]
        );

        $this->add_responsive_control(
            'service_item_padding',
            [
                'label' => esc_html__('Item Padding', 'gridos'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Title Style
        $this->add_control(
            'heading_title_style',
            [
                'label' => esc_html__('Title', 'gridos'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'gridos'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-item-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .service-item-title',
            ]
        );

        // Description Style
        $this->add_control(
            'heading_description_style',
            [
                'label' => esc_html__('Description', 'gridos'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'gridos'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-item-paragraph' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .service-item-paragraph',
            ]
        );

        // Icon Style
        $this->add_control(
            'heading_icon_style',
            [
                'label' => esc_html__('Icon', 'gridos'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'gridos'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-image' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
	}

	/**
	 * Render Gridos_Elementor_Global_Widgets_Services_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    // Output the section structure
	    ?>

        <div class="w-layout-layout services-grid wf-layout-layout">

        	<?php 
        		foreach (  $settings['list'] as $item ) { 
        	?>
            <div class="w-layout-cell service-item">
                <img src="<?php echo esc_url($item['list_icon']['url']); ?>" loading="lazy" alt="service-icon" class="service-image" />
                <div class="service-infos">
                    <h4 class="service-item-title"><?php echo esc_html($item['list_title']); ?></h4>
                    <p class="service-item-paragraph"><?php echo esc_html($item['list_desc']); ?></p>
                </div>
            </div>
            <?php } ?>
            
        </div>
    
    <?php

	}
}
