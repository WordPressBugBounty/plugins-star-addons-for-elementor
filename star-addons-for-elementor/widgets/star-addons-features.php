<?php

/**
 * Elementor Features Widget.
 *
 * @since 1.2
 */

class Elementor_Features_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'features';
	}

	public function get_title() {
		return __( 'Features', 'star-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'star-elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'features_section',
			[
				'label' => __( 'Features Section', 'star-addons-for-elementor' ),
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
				'default'  => __( 'We have Exellent Features', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label' => __( 'Section Description', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
				'description' => __('This field support all html tag', 'star-addons-for-elementor'),
				'default' => __( 'You will like all of the features in our plugin. 100% guaranteed satisfaction.', 'star-addons-for-elementor')
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'section_background',
				'label' => __( 'Background', 'star-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.preview-features-area'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'features_content',
			[
				'label' => __( 'Features Content', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'select_features_layout',
			[
				'label' => __( 'Features Layout', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'grid' => __( 'Grid', 'star-addons-for-elementor' ),
					'slider' => __( 'Slider', 'star-addons-for-elementor' )
				],
				'default' => 'grid'
			]
		);

		$this->add_control(
			'features_item_column',
			[
				'label' => __( 'Features Column', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'columns-2' => __( '2', 'star-addons-for-elementor' ),
					'columns-3' => __( '3', 'star-addons-for-elementor' ),
					'columns-4' => __( '4', 'star-addons-for-elementor' )
				],
				'default' => 'columns-4',
				'condition' => [
                    'select_features_layout' => 'grid'
                ]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'single_features_icon',
            [
                'label' => esc_html__( 'Icon', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'far fa-arrow-alt-circle-right',
                    'library' => 'regular'
                ]
            ]
        );

		$repeater->add_control(
			'single_features_name', [
				'label' => __( 'Name', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'default'  => __( 'Name of feature', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'single_features',
			[
				'label' => __( 'Single Features', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Single Features #1', 'star-addons-for-elementor' ),
						'list_content' => __( 'Single Features Content', 'star-addons-for-elementor' )
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
                    '{{WRAPPER}} .preview-features-area .section-title h2' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'section_desc_color',
			[
				'label' => __( 'Section Description Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .preview-features-area .section-title p' => 'color: {{VALUE}}'
                ]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'features_style',
			[
				'label' => __( 'Features Style', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'features_name_color',
			[
				'label' => __( 'Features Name Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .preview-features-area .single-feature-box h3' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'features_icon_height',
			[
				'label' => __( 'Features Icon Area Height', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100
					]
				],
				'selectors' => [
					'{{WRAPPER}} .preview-features-area .single-feature-box .icon' => 'height: {{SIZE}}{{UNIT}}'
				]
			]
		);

		$this->add_control(
			'features_icon_width',
			[
				'label' => __( 'Features Icon Area Width', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100
					]
				],
				'selectors' => [
					'{{WRAPPER}} .preview-features-area .single-feature-box .icon' => 'width: {{SIZE}}{{UNIT}}'
				]
			]
		);

		$this->add_control(
			'features_icon_size',
			[
				'label' => __( 'Features Icon Size', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100
					]
				],
				'selectors' => [
					'{{WRAPPER}} .preview-features-area .single-feature-box .icon i' => 'font-size: {{SIZE}}{{UNIT}}'
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display(); ?>

        <!-- Features Column Style -->
        <?php if($settings['select_features_layout'] == 'grid') :
		    if( $settings['features_item_column'] == 'columns-2' ) :
				$features_column = 'col-lg-6 col-md-6 col-sm-12';
			elseif( $settings['features_item_column'] == 'columns-3' ) :
				$features_column = 'col-lg-4 col-md-6 col-sm-12';
			elseif( $settings['features_item_column'] == 'columns-4' ) :
				$features_column = 'col-lg-3 col-md-6 col-sm-12';
			endif;
		endif; 

        ?>

        <!-- Start Features Area -->
    	<div class="preview-features-area ptb-100">
            <div class="container-fluid">
                <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                </div>
                <?php if($settings['select_features_layout'] == 'grid') : ?>
	            	<div class="row justify-content-center">
	            <?php elseif($settings['select_features_layout'] == 'slider') : ?>
	            	<div class="star-features-slides owl-carousel owl-theme">
	            <?php endif; ?>
                	<?php foreach ( $settings['single_features'] as $item ) : 
	                	if($settings['select_features_layout'] == 'grid') : ?>
	                	    <div class="<?php echo esc_attr( $features_column ); ?>">
	                	<?php elseif($settings['select_features_layout'] == 'slider') : ?>
	                	    <div>
	                    <?php endif; ?>
	                		<div data-aos="fade-up" data-aos-duration="1200" class="single-feature-box">
                                <div class="icon">
                                	<?php star_addons_render_icon( $item, 'icon', 'single_features_icon' ); ?>
	                            </div>
	                            <h3><?php echo esc_html($item['single_features_name']); ?></h3>
	                        </div>
	                	</div>			       
                    <?php endforeach; ?>			               
                </div>
            </div>
            <div class="shape-1">
            	<img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/box-shape-1.png'; ?>" alt="Image">
            </div>
            <div class="shape-2">
                <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/box-shape-2.png'; ?>" alt="Image">
            </div>
        </div>
	    <!-- End Features Area -->

    <?php

	}

}
