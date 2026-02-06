<?php

/**
 * Elementor Multiple Slider Widget.
 *
 * @since 1.0.0
 */

class Elementor_Multiple_Slider_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'multiple_slider';
	}

	public function get_title() {
		return __( 'Multiple Slider', 'star-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-slides';
	}

	public function get_categories() {
		return [ 'star-elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'slider_settings',
			[    
				'label' => __( 'Settings', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
            'show_slider_area',
            [
                'label' => __( 'Show Slider Area?', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'star-addons-for-elementor' ),
                'label_off' => __( 'No', 'star-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

		$this->add_control(
			'select_slider_design',
			[
				'label' => __( 'Select Slider Design', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'input_type' => 'SELECT',
				'options' => [
					'design-01' => __( 'Design 01', 'star-addons-for-elementor' ),
					'design-02' => __( 'Design 02', 'star-addons-for-elementor' ),
					'design-03' => __( 'Design 03', 'star-addons-for-elementor' ),
					'design-04' => __( 'Design 04', 'star-addons-for-elementor' ),
					'design-05' => __( 'Design 05', 'star-addons-for-elementor' ),
					'design-06' => __( 'Design 06', 'star-addons-for-elementor' ),
					'design-07' => __( 'Design 07', 'star-addons-for-elementor' ),
					'design-08' => __( 'Design 08', 'star-addons-for-elementor' ),
					'design-09' => __( 'Design 09', 'star-addons-for-elementor' ),
					'design-10' => __( 'Design 10', 'star-addons-for-elementor' ),
					'design-11' => __( 'Design 11', 'star-addons-for-elementor' ),
					'design-12' => __( 'Design 12', 'star-addons-for-elementor' ),
					'design-13' => __( 'Design 13', 'star-addons-for-elementor' ),
					'design-14' => __( 'Design 14', 'star-addons-for-elementor' ),
					'design-15' => __( 'Design 15', 'star-addons-for-elementor' )
				],
				'default' => 'design-01'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_content',
			[
				'label' => __( 'Content', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'slider_bg_image',
            [
                'label' => __( 'Slider Background Image', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ],
                'show_label' => true
            ]
        );

        $this->add_control(
            'slider_bg_color',
            [
                'label' => __( 'Slider Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.slider-area.style-one .hero-slider-area, .slider-area.style-two .home-slider, .slider-area.style-three .banner-slider, .slider-area.style-four .banner-slider, .slider-area.style-five .main-slider, .slider-area.style-six .slider-carousel, .slider-area.style-seven .hero-slider-area, .slider-area.style-eight .main-slider-image, .slider-area.style-nine .banner-slider-area::after, .slider-area.style-ten .home-banner-single-slide, .slider-area.style-eleven .hero-wrap, .slider-area.style-twelve .bg-overlay, .slider-area.style-thirteen .hero-wrap .hero-slide-item:after, .slider-area.style-fourteen .hero-wrap, .slider-area.style-fifteen .hero-wrap' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slider_subtitle',
            [
                'label' => __( 'Slider Subtitle', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Subtitle', 'star-addons-for-elementor' ),
                'description' => __('This field supports all HTML tag.', 'star-addons-for-elementor'),
                'default'  => __( 'Subtitle', 'star-addons-for-elementor' )
            ]
        );

        $repeater->add_control(
            'slider_title',
            [
                'label' => __( 'Slider Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'description' => __('This field supports all HTML tag.', 'star-addons-for-elementor'),
                'default'  => __( 'Title', 'star-addons-for-elementor' )
            ]
        );

        $repeater->add_control(
            'slider_desc',
            [
                'label' => __( 'Slider Description', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
                'description' => __('This field supports all HTML tag.', 'star-addons-for-elementor'),
                'default'  => __( 'Description', 'star-addons-for-elementor' )
            ]
        );

        $repeater->add_control(
            'slider_image',
            [
                'label' => __( 'Slider Image', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ],
                'show_label' => true
            ]
        );

        $repeater->add_control(
            'shape_image',
            [
                'label' => __( 'Shape Image', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ],
                'description' => __('This shape image is only for Design 14 and Design 15.', 'star-addons-for-elementor'),
                'show_label' => true
            ]
        );

        $repeater->add_control(
            'show_btn',
            [
                'label' => __( 'Show Button?', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'star-addons-for-elementor' ),
                'label_off' => __( 'No', 'star-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $repeater->add_control(
            'button_text1',
            [
                'label'     => esc_html__( 'Button Text', 'star-addons-for-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Text 1', 'star-addons-for-elementor'),
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_link_type1',
            [
                'label'         => esc_html__( 'Button Link Type', 'star-addons-for-elementor' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options' => [
                    '1'     => esc_html__( 'Link To Page', 'star-addons-for-elementor' ),
                    '2'     => esc_html__( 'External Link', 'star-addons-for-elementor' )
                ],
                'default' => '2',
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_link_to_page1',
            [
                'label'         => esc_html__( 'Button Link Page', 'star-addons-for-elementor' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => star_addons_get_page_as_list(),
                'condition' => [
                    'btn_link_type1' => '1',
                    'show_btn' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_ex_link1',
            [
                'label'     => esc_html__('Button External Link', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false
                ],
                'condition' => [
                    'btn_link_type1' => '2',
                    'show_btn' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'button_text2',
            [
                'label'     => esc_html__( 'Button Text', 'star-addons-for-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Text 2', 'star-addons-for-elementor'),
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_link_type2',
            [
                'label'         => esc_html__( 'Button Link Type', 'star-addons-for-elementor' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options' => [
                    '1'     => esc_html__( 'Link To Page', 'star-addons-for-elementor' ),
                    '2'     => esc_html__( 'External Link', 'star-addons-for-elementor' ),
                ],
                'default' => '2',
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_link_to_page2',
            [
                'label'         => esc_html__( 'Button Link Page', 'star-addons-for-elementor' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => star_addons_get_page_as_list(),
                'condition' => [
                    'btn_link_type2' => '1',
                    'show_btn' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_ex_link2',
            [
                'label'     => esc_html__('Button External Link', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false
                ],
                'condition' => [
                    'btn_link_type2' => '2',
                    'show_btn' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'show_additional_info',
            [
                'label' => __( 'Show Additional Info?', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => __('This section is only for Design 09.', 'star-addons-for-elementor'),
                'label_on' => __( 'Yes', 'star-addons-for-elementor' ),
                'label_off' => __( 'No', 'star-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'no'
            ]
        );

        $repeater->add_control(
            'agent_image',
            [
                'label'     => esc_html__( 'Agent Image', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ],
                'show_label' => true,
                'condition' => [
                    'show_additional_info' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'agent_name',
            [
                'label'     => esc_html__( 'Agent Name', 'star-addons-for-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Name', 'star-addons-for-elementor'),
                'condition' => [
                    'show_additional_info' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'agent_position',
            [
                'label'     => esc_html__( 'Agent Position', 'star-addons-for-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Position', 'star-addons-for-elementor'),
                'condition' => [
                    'show_additional_info' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'project_icon_type',
            [
                'label' => __( 'Project Icon Type', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'input_type' => 'SELECT',
                'options' => [
                    'general' => __( 'General', 'star-addons-for-elementor' ),
                    'library' => __( 'Library', 'star-addons-for-elementor' )
                ],
                'default' => 'general',
                'condition' => [
                    'show_additional_info' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'project_icon1', 
            [
                'label' => __( 'Project Icon', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::ICON,
                'input_type' => 'icon',
                'default'  => 'flaticon-bucket',
                'show_label' => true,
                'options' => star_addons_icons(),
                'condition' => [
                    'project_icon_type' => 'general',
                    'show_additional_info' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'project_icon2', 
            [
                'label' => __( 'Project Icon', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'input_type' => 'icon',
                'show_label' => true,
                'options' => star_addons_icons(),
                'condition' => [
                    'project_icon_type' => 'library',
                    'show_additional_info' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'project_name',
            [
                'label'     => esc_html__( 'Project Name', 'star-addons-for-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Name', 'star-addons-for-elementor'),
                'condition' => [
                    'show_additional_info' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'project_number',
            [
                'label'     => esc_html__( 'Project Number', 'star-addons-for-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Number', 'star-addons-for-elementor'),
                'condition' => [
                    'show_additional_info' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'slider',
            [
                'label' => __( 'Slider', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __( 'Slider #1', 'star-addons-for-elementor' ),
                        'list_content' => __( 'Slider Content', 'star-addons-for-elementor' )
                    ]
                ]
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'slider_style',
			[
				'label' => __( 'Style', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'slider_main_color',
            [
                'label' => __( 'Slider Main Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'slider_subtitle_color',
            [
                'label' => __( 'Slider Subtitle Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.slider-area span, .slider-area.style-one .hero-slider-area .slider-item .slider-text .top-title, .slider-area.style-two .main-banner-content .sub-title, .slider-area.style-three .banner-slider .single-banner-part .banner-iner h5, .slider-area.style-four .single-banner-content span, .slider-area.style-five .main-slider-content span, .slider-area.style-six .slider-carousel .slider-content-box span, .slider-area.style-seven .hero-slider-content h3, .slider-area.style-eight .main-slider-content .sub-title, .slider-area.style-nine .single-banner-content span, .slider-area.style-ten .home-banner-single-slide .banner-text-area span, .slider-area.style-eleven .hero-wrap .hero-content span, .slider-area.style-twelve .hero-wrap .hero-content span, .slider-area.style-thirteen .hero-wrap .hero-slide-item .hero-content span, .slider-area.style-fourteen .hero-wrap .hero-slide-item .hero-content span, .slider-area.style-fifteen .hero-wrap .hero-content span' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'slider_subtitle_typography',
                'selector' => '.slider-area span, .slider-area.style-one .hero-slider-area .slider-item .slider-text .top-title, .slider-area.style-two .main-banner-content .sub-title, .slider-area.style-three .banner-slider .single-banner-part .banner-iner h5, .slider-area.style-four .single-banner-content span, .slider-area.style-five .main-slider-content span, .slider-area.style-six .slider-carousel .slider-content-box span, .slider-area.style-seven .hero-slider-content h3, .slider-area.style-eight .main-slider-content .sub-title, .slider-area.style-nine .single-banner-content span, .slider-area.style-ten .home-banner-single-slide .banner-text-area span, .slider-area.style-eleven .hero-wrap .hero-content span, .slider-area.style-twelve .hero-wrap .hero-content span, .slider-area.style-thirteen .hero-wrap .hero-slide-item .hero-content span, .slider-area.style-fourteen .hero-wrap .hero-slide-item .hero-content span, .slider-area.style-fifteen .hero-wrap .hero-content span'
            ]
        );

        $this->add_control(
            'slider_title_color',
            [
                'label' => __( 'Slider Title Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.slider-area h1, .slider-area.style-one .hero-slider-area .slider-item .slider-text h1, .slider-area.style-two .main-banner-content h1, .slider-area.style-three .banner-slider .single-banner-part .banner-iner h2, .slider-area.style-four .single-banner-content h1, .slider-area.style-five .main-slider-content h1, .slider-area.style-six .slider-carousel .slider-content-box h1, .slider-area.style-seven .hero-slider-content h1, .slider-area.style-eight .main-slider-content h1, .slider-area.style-nine .single-banner-content h1, .slider-area.style-ten .home-banner-single-slide .banner-text-area h1, .slider-area.style-eleven .hero-wrap .hero-content h1, .slider-area.style-twelve .hero-wrap .hero-content h1, .slider-area.style-thirteen .hero-wrap .hero-slide-item .hero-content h1, .slider-area.style-fourteen .hero-wrap .hero-content h1, .slider-area.style-fifteen .hero-wrap .hero-content h1' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'slider_title_typography',
                'selector' => '.slider-area h1, .slider-area.style-one .hero-slider-area .slider-item .slider-text h1, .slider-area.style-two .main-banner-content h1, .slider-area.style-three .banner-slider .single-banner-part .banner-iner h2, .slider-area.style-four .single-banner-content h1, .slider-area.style-five .main-slider-content h1, .slider-area.style-six .slider-carousel .slider-content-box h1, .slider-area.style-seven .hero-slider-content h1, .slider-area.style-eight .main-slider-content h1, .slider-area.style-nine .single-banner-content h1, .slider-area.style-ten .home-banner-single-slide .banner-text-area h1, .slider-area.style-eleven .hero-wrap .hero-content h1, .slider-area.style-twelve .hero-wrap .hero-content h1, .slider-area.style-thirteen .hero-wrap .hero-slide-item .hero-content h1, .slider-area.style-fourteen .hero-wrap .hero-content h1, .slider-area.style-fifteen .hero-wrap .hero-content h1'
            ]
        );

        $this->add_control(
            'slider_desc_color',
            [
                'label' => __( 'Slider Description Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.slider-area p, .slider-area.style-one .hero-slider-area .slider-item .slider-text p, .slider-area.style-two .main-banner-content p, .slider-area.style-three .banner-slider .single-banner-part .banner-iner p, .slider-area.style-four .single-banner-content p, .slider-area.style-five .main-slider-content p, .slider-area.style-six .slider-carousel .slider-content-box p, .slider-area.style-seven .hero-slider-content p, .slider-area.style-eight .main-slider-content p, .slider-area.style-nine .single-banner-content p, .slider-area.style-ten .home-banner-single-slide .banner-text-area p, .slider-area.style-eleven .hero-wrap .hero-content p, .slider-area.style-twelve .hero-wrap .hero-content p, .slider-area.style-thirteen .hero-wrap .hero-slide-item .hero-content p, .slider-area.style-fourteen .hero-wrap .hero-content p, .slider-area.style-fifteen .hero-wrap .hero-content p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'slider_desc_typography',
                'selector' => '.slider-area p, .slider-area.style-one .hero-slider-area .slider-item .slider-text p, .slider-area.style-two .main-banner-content p, .slider-area.style-three .banner-slider .single-banner-part .banner-iner p, .slider-area.style-four .single-banner-content p, .slider-area.style-five .main-slider-content p, .slider-area.style-six .slider-carousel .slider-content-box p, .slider-area.style-seven .hero-slider-content p, .slider-area.style-eight .main-slider-content p, .slider-area.style-nine .single-banner-content p, .slider-area.style-ten .home-banner-single-slide .banner-text-area p, .slider-area.style-eleven .hero-wrap .hero-content p, .slider-area.style-twelve .hero-wrap .hero-content p, .slider-area.style-thirteen .hero-wrap .hero-slide-item .hero-content p, .slider-area.style-fourteen .hero-wrap .hero-content p, .slider-area.style-fifteen .hero-wrap .hero-content p'
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Button Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.default-btn1, .default-btn2, .default-btn2.active, .default-btn3, .default-btn4, .default-btn4.active, .slider-area.style-three .banner-btn, .default-btn5, .default-btn5.two, .default-button6, .slider-area.style-ten .banner-text-area .banner-button-group .default-button6:first-child, .slider-area.style-ten .home-banner-single-slide .banner-text-area .banner-button-group .default-button6:last-child, .slider-area.style-eleven .hero-wrap .hero-content .hero-btn .btn.style1, .slider-area.style-eleven .hero-wrap .hero-content .hero-btn .btn.style2, .slider-area.style-twelve .btn, .slider-area.style-thirteen .btn.style1, .slider-area.style-thirteen .btn.style2, .slider-area.style-fourteen .hero-slider-one .hero-slide-item .hero-content .btn, .slider-area.style-fifteen .btn.style1, .slider-area.style-fifteen .btn.style2' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Button Text Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.default-btn1, .default-btn2, .default-btn2.active, .default-btn3, .default-btn4, .default-btn4.active, .slider-area.style-three .banner-btn, .default-btn5, .default-btn5.two, .default-button6, .slider-area.style-ten .banner-text-area .banner-button-group .default-button6:first-child, .slider-area.style-ten .home-banner-single-slide .banner-text-area .banner-button-group .default-button6:last-child, .slider-area.style-eleven .hero-wrap .hero-content .hero-btn .btn.style1, .slider-area.style-eleven .hero-wrap .hero-content .hero-btn .btn.style2, .slider-area.style-twelve .btn, .slider-area.style-thirteen .btn.style1, .slider-area.style-thirteen .btn.style2, .slider-area.style-fourteen .hero-slider-one .hero-slide-item .hero-content .btn, .slider-area.style-fifteen .btn.style1, .slider-area.style-fifteen .btn.style2' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_bg_hover_color',
            [
                'label' => __( 'Button Background Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.default-btn1:hover, .default-btn2::before, .default-btn2::after, .default-btn2.active::before, .default-btn2.active::after, .default-btn3::before, .default-btn4:hover, .default-btn4.active:hover, .slider-area.style-three .banner-btn:hover, .default-btn5:hover, .default-button6:hover, .slider-area.style-ten .banner-text-area .banner-button-group .default-button6:first-child:hover, .slider-area.style-ten .home-banner-single-slide .banner-text-area .banner-button-group .default-button6:last-child:hover, .slider-area.style-eleven .hero-wrap .hero-content .hero-btn .btn.style1:after, .slider-area.style-eleven .hero-wrap .hero-content .hero-btn .btn.style2:after, .slider-area.style-twelve .btn:hover, .slider-area.style-twelve .btn:after, .slider-area.style-thirteen .btn:before, .slider-area.style-thirteen .btn.style2:before, .slider-area.style-fourteen .hero-slider-one .hero-slide-item .hero-content .btn:before, .slider-area.style-fourteen .hero-slider-one .hero-slide-item .hero-content .btn:after, .slider-area.style-fifteen .btn:before, .slider-area.style-fifteen .btn.style2:hover:before' => 'background-color: {{VALUE}}',
                    '.default-btn5:hover' => '-webkit-box-shadow: inset 0 0 0 2em {{VALUE}}',
                    '.default-btn5:hover' => 'box-shadow: inset 0 0 0 2em {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_text_hover_color',
            [
                'label' => __( 'Button Text Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.default-btn1:hover, .default-btn2:hover, .default-btn3:hover, .default-btn4:hover, .slider-area.style-three .banner-btn:hover, .default-btn5:hover, .default-button6:hover, .slider-area.style-ten .banner-text-area .banner-button-group .default-button6:first-child:hover, .slider-area.style-ten .home-banner-single-slide .banner-text-area .banner-button-group .default-button6:last-child:hover, .slider-area.style-eleven .hero-wrap .hero-content .hero-btn .btn.style1:hover, .slider-area.style-eleven .hero-wrap .hero-content .hero-btn .btn.style2:hover, .slider-area.style-twelve .btn:hover, .slider-area.style-thirteen .btn:hover, .slider-area.style-thirteen .btn.style2:hover i, .slider-area.style-fourteen .hero-slider-one .hero-slide-item .hero-content .btn:hover, .slider-area.style-fifteen .btn:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if( $settings['show_slider_area'] == 'yes' ):

			if( $settings['select_slider_design'] == 'design-01' ) :

				require plugin_dir_path( __FILE__ ) . 'designs/design-01.php';

			elseif( $settings['select_slider_design'] == 'design-02' ) : 

				require plugin_dir_path( __FILE__ ) . 'designs/design-02.php';

			elseif( $settings['select_slider_design'] == 'design-03' ) : 

				require plugin_dir_path( __FILE__ ) . 'designs/design-03.php';

			elseif( $settings['select_slider_design'] == 'design-04' ) : 

				require plugin_dir_path( __FILE__ ) . 'designs/design-04.php';

			elseif( $settings['select_slider_design'] == 'design-05' ) : 

				require plugin_dir_path( __FILE__ ) . 'designs/design-05.php';

			elseif( $settings['select_slider_design'] == 'design-06' ) :

				require plugin_dir_path( __FILE__ ) . 'designs/design-06.php';

			elseif( $settings['select_slider_design'] == 'design-07' ) :

				require plugin_dir_path( __FILE__ ) . 'designs/design-07.php';

			elseif( $settings['select_slider_design'] == 'design-08' ) :

				require plugin_dir_path( __FILE__ ) . 'designs/design-08.php';

			elseif( $settings['select_slider_design'] == 'design-09' ) :

				require plugin_dir_path( __FILE__ ) . 'designs/design-09.php';

		    elseif( $settings['select_slider_design'] == 'design-10' ) :

		    	require plugin_dir_path( __FILE__ ) . 'designs/design-10.php';

		    elseif( $settings['select_slider_design'] == 'design-11' ) :

		    	require plugin_dir_path( __FILE__ ) . 'designs/design-11.php';

		    elseif( $settings['select_slider_design'] == 'design-12' ) :

		    	require plugin_dir_path( __FILE__ ) . 'designs/design-12.php';

		    elseif( $settings['select_slider_design'] == 'design-13' ) :

		    	require plugin_dir_path( __FILE__ ) . 'designs/design-13.php';

		    elseif( $settings['select_slider_design'] == 'design-14' ) :

		    	require plugin_dir_path( __FILE__ ) . 'designs/design-14.php';

		    elseif( $settings['select_slider_design'] == 'design-15' ) :

		    	require plugin_dir_path( __FILE__ ) . 'designs/design-15.php';

		    endif;

            if( $settings['slider_main_color'] != '' ) : ?>
    
                <style type="text/css">
                    :root {
                        --mainColor1: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor2: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor3: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor4: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor5: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor6: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor7: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor8: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor9: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor10: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor11: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor12: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor13: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor14: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                        --mainColor15: <?php echo esc_attr( $settings['slider_main_color'] ); ?>;
                    }
                </style>

            <?php endif;

	    endif;

    }

}