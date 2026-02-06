<?php

/**
 * Elementor Testimonial Widget.
 *
 * @since 1.2
 */

class Elementor_Testimonial_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'star-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'star-elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'testimonial_section',
			[
				'label' => __( 'Testimonial Section', 'star-addons-for-elementor' ),
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
				'default'  => __( 'Our Featured Testimonial', 'star-addons-for-elementor' )
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
				'selector' => '.star-testimonial-area'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'testimonial_content',
			[
				'label' => __( 'Testimonial Content', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'select_testimonial_style',
			[
				'label' => __( 'Testimonial Style', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'grid' => __( 'Grid', 'star-addons-for-elementor' ),
					'slider' => __( 'Slider', 'star-addons-for-elementor' )
				],
				'default' => 'slider'
			]
		);

		$this->add_control(
			'testimonial_item_column',
			[
				'label' => __( 'Testimonial Column', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'columns-2' => __( '2', 'star-addons-for-elementor' ),
					'columns-3' => __( '3', 'star-addons-for-elementor' ),
					'columns-4' => __( '4', 'star-addons-for-elementor' )
				],
				'default' => 'columns-3',
				'condition' => [
                    'select_testimonial_style' => 'grid'
                ]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'single_testimonial_img', [
				'label' => __( 'Image', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ],
				'show_label' => true
			]
		);

		$repeater->add_control(
			'single_testimonial_name', [
				'label' => __( 'Name', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'default'  => __( 'Adam Smith', 'star-addons-for-elementor' )
			]
		);

		$repeater->add_control(
			'single_testimonial_position', [
				'label' => __( 'Designation', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Designation', 'star-addons-for-elementor' ),
				'default'  => __( 'English Lecturer', 'star-addons-for-elementor' )
			]
		);

		$repeater->add_control(
            'single_testimonial_icon',
            [
                'label' => esc_html__( 'Icon', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
					'value' => 'fas fa-quote-right',
					'library' => 'solid'
				],
            ]
        );

		$repeater->add_control(
			'single_testimonial_comment',
			[
				'label' => __( 'Comment', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Comment', 'star-addons-for-elementor' ),
				'description' => __('This field support all html tag', 'star-addons-for-elementor'),
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'star-addons-for-elementor')
			]
		);

		$this->add_control(
			'single_testimonial',
			[
				'label' => __( 'Single Testimonial', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Single Testimonial #1', 'star-addons-for-elementor' ),
						'list_content' => __( 'Single Testimonial Content', 'star-addons-for-elementor' )
					]
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
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
                    '{{WRAPPER}} .star-testimonial-area .section-title h2' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'section_desc_color',
			[
				'label' => __( 'Section Description Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-testimonial-area .section-title p' => 'color: {{VALUE}}'
                ]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'testimonial_style',
			[
				'label' => __( 'Testimonial Style', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'testimonial_comment_color',
			[
				'label' => __( 'Comment Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-testimonial-area .star-single-testimonial-box .comment' => 'color: {{VALUE}}'
                ]
			]
		);

		$this->add_control(
			'testimonial_name_color',
			[
				'label' => __( 'Name Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-single-testimonial-box h3' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'testimonial_designation_color',
			[
				'label' => __( 'Designation Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-single-testimonial-box .designation' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'testimonial_dots_color',
			[
				'label' => __( 'Slider Dots Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-testimonial-slides.owl-theme .owl-dots .owl-dot:hover span, .star-testimonial-slides.owl-theme .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .star-testimonial-slides.owl-theme .owl-dots .owl-dot:hover span::before, .star-testimonial-slides.owl-theme .owl-dots .owl-dot.active span::before' => 'background-color: {{VALUE}}'
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'testimonial_img_style',
			[
				'label' => __( 'Image Style', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

        $this->add_control(
			'testimonial_image_height',
			[
				'label' => __( 'Image Height', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000
					]
				],
				'selectors' => [
					'{{WRAPPER}} .star-single-testimonial-box img' => 'height: {{SIZE}}{{UNIT}}'
				]
			]
		);

		$this->add_control(
			'testimonial_image_width',
			[
				'label' => __( 'Image Width', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000
					]
				],
				'selectors' => [
					'{{WRAPPER}} .star-single-testimonial-box img' => 'width: {{SIZE}}{{UNIT}}'
				]
			]
		);

		$this->add_control(
			'testimonial_image_border_color',
			[
				'label' => __( 'Image Border Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-single-testimonial-box img' => 'border-color: {{VALUE}}'
                ]
			]
		);

		$this->add_control(
            'testimonial_image_border_radius',
            [
                'label' => __( 'Border Radius', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .star-single-testimonial-box img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display(); ?>

        <!-- Testimonial Column Style -->
        <?php if($settings['select_testimonial_style'] == 'grid') :
		    if( $settings['testimonial_item_column'] == 'columns-2' ) :
				$testimonial_column = 'col-lg-6 col-md-6 col-sm-12';
			elseif( $settings['testimonial_item_column'] == 'columns-3' ) :
				$testimonial_column = 'col-lg-4 col-md-6 col-sm-12';
			elseif( $settings['testimonial_item_column'] == 'columns-4' ) :
				$testimonial_column = 'col-lg-3 col-md-6 col-sm-12';
			endif;
		endif; ?>

        <!-- Start Testimonial Area -->
    	<div class="star-testimonial-area ptb-70">
            <div class="container-fluid">
                <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                </div>
                <?php if($settings['select_testimonial_style'] == 'grid') : ?>
            	    <div class="row justify-content-center">
            	<?php elseif($settings['select_testimonial_style'] == 'slider') : ?>
            	    <div class="star-testimonial-slides owl-carousel owl-theme">
                <?php endif; ?>
                	<?php foreach ( $settings['single_testimonial'] as $item ) : ?>
                		<?php if($settings['select_testimonial_style'] == 'grid') : ?>
	                	    <div class="<?php echo esc_attr( $testimonial_column ); ?> pb-70">
	                	<?php elseif($settings['select_testimonial_style'] == 'slider') : ?>
	                	    <div>
	                    <?php endif; ?>
	                        <div data-aos="fade-up" data-aos-duration="1200" class="star-single-testimonial-box">
	                			<div class="desc">
	                				<?php star_addons_render_icon( $item, 'icon', 'single_testimonial_icon' ); ?>
	                				<p class="comment"><?php echo wp_kses_post($item['single_testimonial_comment']); ?></p>
	                            </div>
	                            <div class="client-info">
	                            	<div class="d-flex align-items-center justify-content-center">
		                                <?php if( ! $item['single_testimonial_img']['url'] == '' ) : ?>
			                                <img src="<?php echo esc_url( $item['single_testimonial_img']['url'] ); ?>" alt="image">
		                                <?php endif; ?>
		                                <div class="title">
		                                	<h3>
			                                	<?php echo esc_html($item['single_testimonial_name']); ?>
			                                </h3>
			                                <span class="designation">
			                                	<?php echo esc_html($item['single_testimonial_position']); ?>
			                                </span>
		                                </div>
		                            </div>
	                            </div>
	                        </div>
	                	</div>			       
                    <?php endforeach; ?>			               
                </div>
                <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_08.png'; ?>" alt="#" class="testimonial_bg">
            </div>
        </div>
	    <!-- End Testimonial Area -->

    <?php

	}

}
