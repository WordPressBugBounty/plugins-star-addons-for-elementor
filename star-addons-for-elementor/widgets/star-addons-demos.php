<?php

/**
 * Elementor Demos Widget.
 *
 * @since 1.2
 */

class Elementor_Demos_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'demos';
	}

	public function get_title() {
		return __( 'Demos', 'star-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-kit-plugins';
	}

	public function get_categories() {
		return [ 'star-elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'demos_section',
			[
				'label' => __( 'Demos Section', 'star-addons-for-elementor' ),
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
				'default'  => __( 'Get Started with Pre-made Demos', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label' => __( 'Section Description', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
				'description' => __('This field support all html tag', 'star-addons-for-elementor'),
				'default' => __( 'We provided lots of widgets in multiple fields. All of these are 100% mobile responsive, easy to use, and customizable.', 'star-addons-for-elementor')
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'section_background',
				'label' => __( 'Background', 'star-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.preview-demos-area'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'demos_content',
			[
				'label' => __( 'Demos Content', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'select_demos_layout',
			[
				'label' => __( 'Demos Layout', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'grid' => __( 'Grid', 'star-addons-for-elementor' ),
					'slider' => __( 'Slider', 'star-addons-for-elementor' )
				],
				'default' => 'grid'
			]
		);

		$this->add_control(
			'demos_item_column',
			[
				'label' => __( 'Demos Column', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'columns-2' => __( '2', 'star-addons-for-elementor' ),
					'columns-3' => __( '3', 'star-addons-for-elementor' ),
					'columns-4' => __( '4', 'star-addons-for-elementor' )
				],
				'default' => 'columns-4',
				'condition' => [
                    'select_demos_layout' => 'grid'
                ]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'single_demos_img', [
				'label' => __( 'Image', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ],
				'show_label' => true
			]
		);

		$repeater->add_control(
			'single_demos_name', [
				'label' => __( 'Name', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'default'  => __( 'Name of widget', 'star-addons-for-elementor' )
			]
		);

		$repeater->add_control(
			'single_demos_link', [
				'label' => __( 'Link', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => true
                ],
			]
		);

		$this->add_control(
			'single_demos',
			[
				'label' => __( 'Single Demos', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Single Demos #1', 'star-addons-for-elementor' ),
						'list_content' => __( 'Single Demos Content', 'star-addons-for-elementor' )
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
                    '{{WRAPPER}} .preview-demos-area .section-title h2' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'section_desc_color',
			[
				'label' => __( 'Section Description Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .preview-demos-area .section-title p' => 'color: {{VALUE}}'
                ]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'demos_style',
			[
				'label' => __( 'Demos Style', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'demos_name_color',
			[
				'label' => __( 'Demos Name Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .preview-demos-area .single-demo-box h3' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'demos_image_height',
			[
				'label' => __( 'Demos Image Height', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000
					]
				],
				'selectors' => [
					'{{WRAPPER}} .single-demo-box .image-bg .image-demo-scroll, {{WRAPPER}} .preview-demos-area .image-bg' => 'height: {{SIZE}}{{UNIT}}'
				]
			]
		);

		$this->add_control(
			'demos_image_width',
			[
				'label' => __( 'Demos Image Width', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000
					]
				],
				'selectors' => [
					'{{WRAPPER}} .single-demo-box .image-bg .image-demo-scroll' => 'width: {{SIZE}}{{UNIT}}'
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display(); ?>

        <!-- Demos Column Style -->
        <?php if($settings['select_demos_layout'] == 'grid') :
		    if( $settings['demos_item_column'] == 'columns-2' ) :
				$demos_column = 'col-xl-6 col-lg-6 col-md-6 col-sm-12';
			elseif( $settings['demos_item_column'] == 'columns-3' ) :
				$demos_column = 'col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12';
			elseif( $settings['demos_item_column'] == 'columns-4' ) :
				$demos_column = 'col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12';
			endif;
		endif; 

        ?>

        <!-- Start Demos Area -->
    	<div class="preview-demos-area ptb-100">
            <div class="container-fluid">
                <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                </div>
                <?php if($settings['select_demos_layout'] == 'grid') : ?>
	            	<div class="row justify-content-center">
	            <?php elseif($settings['select_demos_layout'] == 'slider') : ?>
	            	<div class="star-demos-slides owl-carousel owl-theme">
	            <?php endif; ?>
                	<?php foreach ( $settings['single_demos'] as $item ) : 
                		$target = $item['single_demos_link']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['single_demos_link']['nofollow'] ? ' rel="nofollow"' : '';
	                	if($settings['select_demos_layout'] == 'grid') : ?>
	                	    <div class="<?php echo esc_attr( $demos_column ); ?>">
	                	<?php elseif($settings['select_demos_layout'] == 'slider') : ?>
	                	    <div>
	                    <?php endif; ?>
	                		<div data-aos="fade-up" data-aos-duration="1200" class="single-demo-box">
	                			<a href="<?php echo esc_url($item['single_demos_link']['url']); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?>>
	                                <span class="image-bg">
	                                    <span class="image-demo-scroll" style="background-image:url(<?php echo esc_url( $item['single_demos_img']['url'] ); ?>);"></span>
	                                </span>
	                                <h3><?php echo esc_html($item['single_demos_name']); ?></h3>
	                            </a>
	                        </div>
	                	</div>			       
                    <?php endforeach; ?>			               
                </div>
            </div>
        </div>
	    <!-- End Demos Area -->

    <?php

	}

}