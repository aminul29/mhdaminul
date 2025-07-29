<?php
/**
 * Gridos Elementor Global Widget About_Block.
 *
 * @package    Gridos - Unikwp
 * @subpackage Gridos
 * @since      Gridos 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Gridos_Elementor_Global_Widgets_About_Block extends Widget_Base {

	/**
	 * Retrieve Gridos_Elementor_Global_Widgets_About_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Gridos-Global-Widgets-About-Block';
	}

	/**
	 * Retrieve Gridos_Elementor_Global_Widgets_About_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'About Block', 'gridos' );
	}

	/**
	 * Retrieve Gridos_Elementor_Global_Widget_About_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the Gridos_Elementor_Global_Widget_About_Block widget belongs to.
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
	 * Register Gridos_Elementor_Global_Widget_About_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_about_block_title_manage',
			array(
				'label' => esc_html__( 'About Block', 'gridos' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'Fullname / Company',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'About',
	        ]
	    );

	    $this->add_control(
	        'about_subtitle',
	        [
	            'label' => 'Occupation',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Biography &amp; Abilities',
	        ]
	    );

	    $this->add_control(
	        'about_description',
	        [
	            'label' => 'About Description',
	            'type' => Controls_Manager::TEXTAREA,
	        ]
	    );

	    $this->add_control(
	        'square_image',
	        [
	            'label' => 'Personal/Company Image',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->end_controls_section();

	    // Style Tab
	    $this->start_controls_section(
	        'section_style_title',
	        [
	            'label' => esc_html__('Title', 'gridos'),
	            'tab' => Controls_Manager::TAB_STYLE,
	        ]
	    );

	    $this->add_control(
	        'title_color',
	        [
	            'label' => esc_html__('Title Color', 'gridos'),
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

	    $this->end_controls_section();

	    // Subtitle Styles
	    $this->start_controls_section(
	        'section_style_subtitle',
	        [
	            'label' => esc_html__('Subtitle', 'gridos'),
	            'tab' => Controls_Manager::TAB_STYLE,
	        ]
	    );

	    $this->add_control(
	        'subtitle_color',
	        [
	            'label' => esc_html__('Subtitle Color', 'gridos'),
	            'type' => Controls_Manager::COLOR,
	            'selectors' => [
	                '{{WRAPPER}} .about-me-span' => 'color: {{VALUE}};',
	            ],
	        ]
	    );

	    $this->add_group_control(
	        Group_Control_Typography::get_type(),
	        [
	            'name' => 'subtitle_typography',
	            'selector' => '{{WRAPPER}} .about-me-span',
	        ]
	    );

	    $this->end_controls_section();

	    // Description Styles
	    $this->start_controls_section(
	        'section_style_description',
	        [
	            'label' => esc_html__('Description', 'gridos'),
	            'tab' => Controls_Manager::TAB_STYLE,
	        ]
	    );

	    $this->add_control(
	        'description_color',
	        [
	            'label' => esc_html__('Description Color', 'gridos'),
	            'type' => Controls_Manager::COLOR,
	            'selectors' => [
	                '{{WRAPPER}} .about-me-description' => 'color: {{VALUE}};',
	            ],
	        ]
	    );

	    $this->add_group_control(
	        Group_Control_Typography::get_type(),
	        [
	            'name' => 'description_typography',
	            'selector' => '{{WRAPPER}} .about-me-description',
	        ]
	    );

	    $this->add_control(
	        'text_justify',
	        [
	            'label' => esc_html__('Text Alignment', 'gridos'),
	            'type' => Controls_Manager::SELECT,
	            'default' => 'left',
	            'options' => [
	                'left' => esc_html__('Left', 'gridos'),
	                'center' => esc_html__('Center', 'gridos'),
	                'right' => esc_html__('Right', 'gridos'),
	                'justify' => esc_html__('Justify', 'gridos'),
	            ],
	            'selectors' => [
	                '{{WRAPPER}} .about-me-description' => 'text-align: {{VALUE}};',
	            ],
	        ]
	    );

	    $this->end_controls_section();

	    // Image Styles
	    $this->start_controls_section(
	        'section_style_image',
	        [
	            'label' => esc_html__('Image', 'gridos'),
	            'tab' => Controls_Manager::TAB_STYLE,
	        ]
	    );

	    $this->add_control(
	        'image_size',
	        [
	            'label' => esc_html__('Image Size', 'gridos'),
	            'type' => Controls_Manager::SLIDER,
	            'size_units' => ['px', '%'],
	            'range' => [
	                'px' => [
	                    'min' => 0,
	                    'max' => 1000,
	                ],
	                '%' => [
	                    'min' => 0,
	                    'max' => 100,
	                ],
	            ],
	            'selectors' => [
	                '{{WRAPPER}} .about-me-img' => 'width: {{SIZE}}{{UNIT}};',
	            ],
	        ]
	    );

	    $this->add_control(
	        'image_border_radius',
	        [
	            'label' => esc_html__('Border Radius', 'gridos'),
	            'type' => Controls_Manager::DIMENSIONS,
	            'size_units' => ['px', '%'],
	            'selectors' => [
	                '{{WRAPPER}} .about-me-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	            ],
	        ]
	    );

	    $this->end_controls_section();

	}

	/**
	 * Render Gridos_Elementor_Global_Widgets_About_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : 'About';
    	$about_subtitle = ! empty( $settings['about_subtitle'] ) ? $settings['about_subtitle'] : '';
    	$about_description = ! empty( $settings['about_description'] ) ? $settings['about_description'] : '';
    	$square_image = ! empty( $settings['square_image']['url'] ) ? $settings['square_image']['url'] : '';


	    // Output the section structure
	    ?>
		
		<div class="about-me">
            <div id="w-node-e3e05751-2ea1-230e-ac9e-9116c48e2401-846cff30" class="w-layout-layout about-me-2-col wf-layout-layout">
                <div id="w-node-e3e05751-2ea1-230e-ac9e-9116c48e2402-846cff30" class="w-layout-cell _2-columns">
                    <div class="about-me-info">
                        <h1 class="inner-pages-main-title"><?php echo esc_html( $about_title ); ?></h1>
                        <div class="title-blue-line"></div>
                        <div class="about-me-span"><?php echo esc_html( $about_subtitle ); ?></div>
                        <img src="<?php echo esc_url($square_image); ?>" loading="lazy" alt="about" class="about-me-img" />
                    </div>
                </div>
                <div id="w-node-e3e05751-2ea1-230e-ac9e-9116c48e2403-846cff30" class="w-layout-cell _2-columns">
                    <div class="about-me-text">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/circle.png" loading="lazy" data-w-id="e5ad8907-7dd0-6f80-4d27-a0b35591f00f" alt="circle" class="rotating-circle" />
                        <div class="about-me-description">
                            <?php echo esc_html( $about_description ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <?php

	}
}
