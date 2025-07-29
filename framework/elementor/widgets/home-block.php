<?php
/**
 * Gridos Elementor Global Widget Home_Block.
 *
 * @package    Gridos - Unikwp
 * @subpackage Gridos
 * @since      Gridos 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Gridos_Elementor_Global_Widgets_Home_Block extends Widget_Base {

	/**
	 * Retrieve Gridos_Elementor_Global_Widgets_Home_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Gridos-Global-Widgets-Home-Block';
	}

	/**
	 * Retrieve Gridos_Elementor_Global_Widgets_Home_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Home Block', 'gridos' );
	}

	/**
	 * Retrieve Gridos_Elementor_Global_Widget_Home_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the Gridos_Elementor_Global_Widget_Home_Block widget belongs to.
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
	 * Register Gridos_Elementor_Global_Widget_Home_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_Home_Block_title_manage',
			array(
				'label' => esc_html__( 'Home About', 'gridos' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'About Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'About',
	        ]
	    );

	    $this->add_control(
	        'about_subtitle',
	        [
	            'label' => 'About Subtitle',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Biography &amp; Abilities',
	        ]
	    );

	    $this->add_control(
	        'square_image',
	        [
	            'label' => 'Image',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'about_link',
	        [
	            'label' => 'About Link',
	            'type' => Controls_Manager::URL,
	            'default' => [
	                'url' => '#',
	            ],
	        ]
	    );

	    $this->end_controls_section();

	    // Widget title section
		$this->start_controls_section(
			'section_Home_Block_blogtitle_manage',
			array(
				'label' => esc_html__( 'Blog', 'gridos' ),
			)
		);

	    $this->add_control(
	        'blog_title',
	        [
	            'label' => 'Blog Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Blog',
	        ]
	    );

	    $this->add_control(
	        'blog_subtitle',
	        [
	            'label' => 'Blog Subtitle',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'buzz burst',
	        ]
	    );

	    $this->add_control(
	        'blog_image',
	        [
	            'label' => 'Image',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'blog_link',
	        [
	            'label' => 'Blog Page Link',
	            'type' => Controls_Manager::URL,
	            'default' => [
	                'url' => '#',
	            ],
	        ]
	    );

	    $this->end_controls_section();

	    // Widget title section
		$this->start_controls_section(
			'section_Home_Block_servicestitle_manage',
			array(
				'label' => esc_html__( 'Services', 'gridos' ),
			)
		);

	    $this->add_control(
	        'services_title',
	        [
	            'label' => 'Services Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Services',
	        ]
	    );

	    $this->add_control(
	        'services_subtitle',
	        [
	            'label' => 'Services Subtitle',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'elite solutions',
	        ]
	    );

	    $this->add_control(
	        'services_image',
	        [
	            'label' => 'Icon 1',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'services_image2',
	        [
	            'label' => 'Icon 2',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'services_image3',
	        [
	            'label' => 'Icon 3',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'services_link',
	        [
	            'label' => 'services Page Link',
	            'type' => Controls_Manager::URL,
	            'default' => [
	                'url' => '#',
	            ],
	        ]
	    );

	    $this->end_controls_section();

	    // Widget title section
		$this->start_controls_section(
			'section_Home_Block_worktitle_manage',
			array(
				'label' => esc_html__( 'Work', 'gridos' ),
			)
		);

	    $this->add_control(
	        'work_title',
	        [
	            'label' => 'Work Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Work',
	        ]
	    );

	    $this->add_control(
	        'work_subtitle',
	        [
	            'label' => 'Work Subtitle',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'inspiring selection',
	        ]
	    );

	    $this->add_control(
	        'work_image',
	        [
	            'label' => 'Image',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'work_link',
	        [
	            'label' => 'Work Page Link',
	            'type' => Controls_Manager::URL,
	            'default' => [
	                'url' => '#',
	            ],
	        ]
	    );

	    $this->end_controls_section();

	    // Widget title section
		$this->start_controls_section(
			'section_Home_Block_contacttitle_manage',
			array(
				'label' => esc_html__( 'Contact', 'gridos' ),
			)
		);

	    $this->add_control(
	        'contact_title',
	        [
	            'label' => 'Contact Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Contact',
	        ]
	    );

	    $this->add_control(
	        'contact_subtitle',
	        [
	            'label' => 'Contact Subtitle',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'lets talk',
	        ]
	    );

	    $this->add_control(
	        'contact_image',
	        [
	            'label' => 'Image',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'contact_link',
	        [
	            'label' => 'Contact Page Link',
	            'type' => Controls_Manager::URL,
	            'default' => [
	                'url' => '#',
	            ],
	        ]
	    );

	    $this->end_controls_section();

	}

	/**
	 * Render Gridos_Elementor_Global_Widgets_Home_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : 'About';
    	$about_subtitle = ! empty( $settings['about_subtitle'] ) ? $settings['about_subtitle'] : 'Biography &amp; Abilities';
    	$square_image = ! empty( $settings['square_image']['url'] ) ? $settings['square_image']['url'] : '';
    	$about_link = ! empty( $settings['about_link']['url'] ) ? $settings['about_link']['url'] : '#';

	    $blog_title = ! empty( $settings['blog_title'] ) ? $settings['blog_title'] : 'Blog';
    	$blog_subtitle = ! empty( $settings['blog_subtitle'] ) ? $settings['blog_subtitle'] : '';
    	$blog_image = ! empty( $settings['blog_image']['url'] ) ? $settings['blog_image']['url'] : '';
    	$blog_link = ! empty( $settings['blog_link']['url'] ) ? $settings['blog_link']['url'] : '#';

	    $services_title = ! empty( $settings['services_title'] ) ? $settings['services_title'] : 'Services';
    	$services_subtitle = ! empty( $settings['services_subtitle'] ) ? $settings['services_subtitle'] : '';
    	$services_image = ! empty( $settings['services_image']['url'] ) ? $settings['services_image']['url'] : '';
    	$services_image2 = ! empty( $settings['services_image2']['url'] ) ? $settings['services_image2']['url'] : '';
    	$services_image3 = ! empty( $settings['services_image3']['url'] ) ? $settings['services_image3']['url'] : '';
    	$services_link = ! empty( $settings['services_link']['url'] ) ? $settings['services_link']['url'] : '#';

	    $work_title = ! empty( $settings['work_title'] ) ? $settings['work_title'] : 'Work';
    	$work_subtitle = ! empty( $settings['work_subtitle'] ) ? $settings['work_subtitle'] : '';
    	$work_image = ! empty( $settings['work_image']['url'] ) ? $settings['work_image']['url'] : '';
    	$work_link = ! empty( $settings['work_link']['url'] ) ? $settings['work_link']['url'] : '#';

	    $contact_title = ! empty( $settings['contact_title'] ) ? $settings['contact_title'] : 'Contact';
    	$contact_subtitle = ! empty( $settings['contact_subtitle'] ) ? $settings['contact_subtitle'] : '';
    	$contact_image = ! empty( $settings['contact_image']['url'] ) ? $settings['contact_image']['url'] : '';
    	$contact_link = ! empty( $settings['contact_link']['url'] ) ? $settings['contact_link']['url'] : '#';


	    // Output the section structure
	    ?>
        


        <section>
	        <div class="home-wrapper">
	            <div class="w-layout-blockcontainer main-container w-container">
	                <div id="w-node-_9f90a540-f866-6cd5-898a-462c713a5490-652f8849" class="w-layout-layout home-stack wf-layout-layout">

	                	<div id="w-node-d6d3953d-a5d0-8a89-62c1-6c31b64c5a30-652f8849" class="w-layout-cell about-row">
                        	<a data-w-id="700b8ace-6395-ae52-faf8-a5babb050432" href="<?php echo esc_url( $about_link ); ?>" class="about-block w-inline-block">
                        		<div class="about-infos">
	                                <h2 class="about-title"><?php echo esc_html( $about_title ); ?></h2>
	                                <div class="subtitle-block">
	                                    <div class="about-subtitle"><?php echo esc_html( $about_subtitle ); ?></div>
	                                </div>
	                            </div>
					            <div class="about-bg-image" style="background-image: url(<?php echo esc_url( $square_image ); ?>);"></div>
					        </a>
					    </div>


	                    <div id="w-node-_0fc2bf67-cea5-3920-ed20-e98dc64d8481-652f8849" class="w-layout-cell top-row">
	                        <div id="w-node-e420a70b-3335-8a3c-6fd6-1dd47edee2da-652f8849" class="w-layout-layout top-row-stack wf-layout-layout">

	                        	<div id="w-node-_36d74deb-6b8a-0da6-6039-9b94f28851c1-652f8849" class="w-layout-cell blog-cell">
	                                <a data-w-id="e4e16621-820e-469b-a4af-8e8d1666fda4" href="<?php echo esc_url( $blog_link ); ?>" class="blog-block w-inline-block">
	                                    <div class="text-with-dot">
	                                        <div class="dot-text"><?php echo esc_html( $blog_subtitle ); ?></div>
	                                    </div>
	                                    <div class="blog-block-img">
		                                    <img
		                                        src="<?php echo esc_url( $blog_image ); ?>"
		                                        alt="blog"
		                                        class="blog-img"
		                                    />
	                                    </div>
	                                    <h3 class="main-title"><?php echo esc_html( $blog_title ); ?></h3>
	                                </a>
	                            </div>

	                            <div id="w-node-_9aed2215-b44e-81c1-9e6e-a5a496988f8e-652f8849" class="w-layout-cell service-cell">
	                                <a data-w-id="d8a7e28c-2b92-cd67-add9-9f030af83191" href="<?php echo esc_url( $services_link ); ?>" class="service-block w-inline-block">
	                                    <div class="text-with-dot">
	                                        <div class="dot-text"><?php echo esc_html( $services_subtitle ); ?></div>
	                                    </div>
	                                    <div class="service-circles">
	                                    	<?php if (! empty( $settings['services_image']['url'] )): ?>
	                                        <div class="service-box">
	                                        	<img src="<?php echo esc_url( $services_image ); ?>" loading="lazy" alt="services1" data-w-id="0f6d6d5b-bb14-ed12-0ca5-beb566a325d8" class="service-icon" />
	                                        </div>
	                                    	<?php endif; ?>
	                                    	<?php if (! empty( $settings['services_image2']['url'] )): ?>
	                                        <div class="service-box">
	                                        	<img src="<?php echo esc_url( $services_image2 ); ?>" loading="lazy" data-w-id="cb1fc4c3-7471-c733-0db4-33bc8bd171b2" alt="services2" class="service-icon" />
	                                        </div>
	                                    	<?php endif; ?>
	                                    	<?php if (! empty( $settings['services_image3']['url'] )): ?>
	                                        <div class="service-box">
	                                        	<img src="<?php echo esc_url( $services_image3 ); ?>" loading="lazy" data-w-id="107684f8-9bce-14b3-a655-691d66a0a747" alt="services3" class="service-icon" />
	                                        </div>
	                                    	<?php endif; ?>
	                                    </div>
	                                    <h3 class="main-title"><?php echo esc_html( $services_title ); ?></h3>
	                                </a>
	                            </div>

	                        </div>
	            		</div>

	                    <div id="w-node-d139f96c-d394-01f6-92f4-d1bfb9aa3473-652f8849" class="w-layout-cell bottom-row">
	                        <div id="w-node-_0dbb6643-982f-e318-23db-636b44288cf7-652f8849" class="w-layout-layout bottom-row-stack wf-layout-layout">
	                            <div id="w-node-_0dbb6643-982f-e318-23db-636b44288cf8-652f8849" class="w-layout-cell work-cell">
	                                <a data-w-id="b569344e-3ec5-14ba-63fe-3cb5296ed5ce" href="<?php echo esc_url( $work_link ); ?>" class="work-block w-inline-block">
	                                    <div class="text-with-dot">
	                                        <div class="dot-text"><?php echo esc_html( $work_subtitle ); ?></div>
	                                    </div>
	                                    <div class="circle-ball">
	                                    	<img src="<?php echo esc_url( $work_image ); ?>" loading="lazy" alt="work" class="ball-image" />
	                                    </div>
	                                    <h3 class="main-title"><?php echo esc_html( $work_title ); ?></h3>
	                                </a>
	                            </div>
	                            <div id="w-node-_0dbb6643-982f-e318-23db-636b44288cf9-652f8849" class="w-layout-cell contact-cell">
	                                <a data-w-id="e377f905-8e18-481e-ec90-7ba9c83f1b54" href="<?php echo esc_url( $contact_link ); ?>" class="contact-block w-inline-block">
	                                    <div class="text-with-dot">
	                                        <div class="dot-text"><?php echo esc_html( $contact_subtitle ); ?></div>
	                                    </div>
	                                    <img src="<?php echo esc_url( $contact_image ); ?>" loading="lazy" alt="contact" class="contact-img" />
	                                    <h3 class="main-title"><?php echo esc_html( $contact_title ); ?></h3>
	                                </a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
		<!-- End about-section -->
			
    
    <?php

	}
}
