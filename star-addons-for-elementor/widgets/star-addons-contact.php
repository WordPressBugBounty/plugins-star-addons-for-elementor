<?php

/**
 * Elementor Contact Widget.
 *
 * @since 1.2
 */

class Elementor_Contact_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'contact';
	}

	public function get_title() {
		return __( 'Contact Form 7', 'star-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	public function get_categories() {
		return [ 'star-elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'contact_section',
			[
				'label' => __( 'Contact Section', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

	    $this->add_control(
			'section_title',
			[
				'label' => __( 'Section Title', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'description' => __('This field support all html tag', 'star-addons-for-elementor'),
				'default'  => __( 'Contact Us', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label' => __( 'Section Description', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
				'description' => __('This field support all html tag', 'star-addons-for-elementor'),
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'star-addons-for-elementor')
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'section_background',
				'label' => __( 'Background', 'star-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.star-contact-form-area'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'contact_info',
			[
				'label' => __( 'Contact Info', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'contact_info_title',
			[
				'label' => __( 'Contact Info Title', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'description' => __('This field support all html tag', 'star-addons-for-elementor'),
				'default'  => __( 'Get in touch', 'star-addons-for-elementor' )
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'single_contact_icon', [
				'label' => __( 'Icon', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'show_label' => true,
				'default' => [
                    'value' => 'fas fa-map-marker-alt',
                    'library' => 'solid'
                ]
			]
		);

		$repeater->add_control(
			'single_contact_title', [
				'label' => __( 'Title', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'description' => __('This field support all html tag', 'star-addons-for-elementor'),
				'default'  => __( 'Address:', 'star-addons-for-elementor' )
			]
		);

		$repeater->add_control(
			'single_contact_content', [
				'label' => __( 'Content', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Content', 'star-addons-for-elementor' ),
				'description' => __('This field support all html tag', 'star-addons-for-elementor'),
				'default'  => __( '175 5th Ave, New York, NY 10010, United States', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'single_contact_info',
			[
				'label' => __( 'Single Contact Info', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Single Contact #1', 'star-addons-for-elementor' ),
						'list_content' => __( 'Single Contact Content', 'star-addons-for-elementor' ),
					],
				
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'contact_form',
			[
				'label' => __( 'Contact Form', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'contact_form_title',
			[
				'label' => __( 'Contact Form Title', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'description' => __('This field support all html tag', 'star-addons-for-elementor'),
				'default'  => __( 'Drop us a message', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'contact_form_type',
			[
				'label' => __( 'Form Type', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'input_type' => 'SELECT',
				'options' => [
					'dropdown' => __( 'Dropdown', 'star-addons-for-elementor' ),
					'shortcode' => __( 'Shortcode', 'star-addons-for-elementor' ),
				],
				'default' => 'dropdown'
			]
		);

		$this->add_control(
            'select_contact_form',
            [
                'label' => esc_html__('Select Form', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options' => star_addons_get_wpcf7_list(),
                'default' => '0',
                'condition' => [
                    'contact_form_type' => 'dropdown'
                ]
            ]
        );

		$this->add_control(
			'contact_form_shortcode',
			[
				'label' => __( 'Contact Form Shortcode', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'input_type' => 'text',
				'placeholder' => __( 'Shortcode', 'star-addons-for-elementor' ),
				'condition' => [
                    'contact_form_type' => 'shortcode'
                ]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'contact_google_map',
			[
				'label' => __( 'Google Map', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'contact_google_map_code',
			[
				'label' => __( 'Google Map Embed Code', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Embed Code', 'star-addons-for-elementor' ),
				'default' => __( '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9401047993993!2d-73.99173408522613!3d40.74134344375791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a3f79e5b77%3A0x25011fc87ca4dae!2s175%205th%20Ave%2C%20New%20York%2C%20NY%2010010%2C%20USA!5e0!3m2!1sen!2sbd!4v1633785743068!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>', 'star-addons-for-elementor')
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'contact_section_style',
			[
				'label' => __( 'Section Style', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'section_title_color',
			[
				'label' => __( 'Section Title Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-contact-form-area .section-title h2' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'section_desc_color',
			[
				'label' => __( 'Section Description Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-contact-form-area .section-title p' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'contact_info_style',
			[
				'label' => __( 'Info Style', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'contact_info_heading_color',
			[
				'label' => __( 'Heading Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-get-in-touch h3' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'contact_info_icon_color',
			[
				'label' => __( 'Icon Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-get-in-touch ul li i' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'contact_info_title_color',
			[
				'label' => __( 'Title Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-get-in-touch ul li span' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'contact_info_data_color',
			[
				'label' => __( 'Data Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-get-in-touch ul li' => 'color: {{VALUE}}'
                ]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'contact_form_style',
			[
				'label' => __( 'Form Style', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'contact_form_heading_color',
			[
				'label' => __( 'Heading Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-contact-form h3' => 'color: {{VALUE}}'
                ]
			]
		);

		$this->add_control(
			'contact_label_color',
			[
				'label' => __( 'Label Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-contact-form label' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'contact_placeholder_color',
			[
				'label' => __( 'Placeholder Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-contact-form form input::placeholder, .star-contact-form form textarea::placeholder' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'contact_field_bg_color',
			[
				'label' => __( 'Field Background Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-contact-form form input:not(.star-contact-form form input[type="submit"]), .star-contact-form form textarea' => 'background-color: {{VALUE}}'
                ]
			]
		);

		$this->add_control(
			'contact_field_focus_border_color',
			[
				'label' => __( 'Field Foucs Border Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-contact-form form input:focus, .star-contact-form form textarea:focus' => 'border-color: {{VALUE}}'
                ]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'contact_button_style',
            [
                'label' => __( 'Button Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Button Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-contact-form form input[type="submit"]' => 'background: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-contact-form form input[type="submit"]' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_border_color',
            [
                'label' => __( 'Button Border Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-contact-form form input[type="submit"]' => 'border-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_bg_hover_color',
            [
                'label' => __( 'Button Background Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-contact-form form input[type="submit"]:hover' => 'background: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Button Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-contact-form form input[type="submit"]:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_border_hover_color',
            [
                'label' => __( 'Button Border Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-contact-form form input[type="submit"]:hover' => 'border-color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display(); ?>

		<!-- Start Contact Form Area -->
        <section class="star-contact-form-area ptb-70">
            <div class="container-fluid"> 
                <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                </div>
                <div class="row">
                	<div data-aos="fade-up" data-aos-duration="1600" class="col-lg-6">
                        <div class="star-get-in-touch">
                            <h3><?php echo wp_kses_post($settings['contact_info_title']); ?></h3>
                            <ul>
                            	<?php foreach ( $settings['single_contact_info'] as $item ) : ?>
	                                <li>
	                                	<div class="icon">
		                                	<?php star_addons_render_icon( $item, 'icon', 'single_contact_icon' ); ?>
		                                </div>
	                                    <span><?php echo wp_kses_post($item['single_contact_title']); ?></span>
	                                    <?php echo wp_kses_post($item['single_contact_content']); ?>
	                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="star-map">
                        	    <?php echo __($settings['contact_google_map_code']); ?>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="2000" class="col-lg-6">
                        <div class="star-contact-form">
                            <h3><?php echo wp_kses_post($settings['contact_form_title']); ?></h3>
                            <?php if($settings['contact_form_type'] == 'dropdown' && !empty($settings['select_contact_form'])) :
                                    echo do_shortcode('[contact-form-7 id="' . $settings['select_contact_form'] . '" ]');
                            else:
                                echo do_shortcode($settings['contact_form_shortcode']);
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Form Area -->

		<?php 

    }

}
