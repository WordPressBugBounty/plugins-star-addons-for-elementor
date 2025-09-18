<?php

/**
 * Elementor Team Widget.
 *
 * @since 1.1
 */

class Elementor_Team_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'star-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'star-elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'team_section',
			[
				'label' => __( 'Team Member Section', 'star-addons-for-elementor' ),
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
				'default'  => __( 'Featured Team Member', 'star-addons-for-elementor' )
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
				'selector' => '.star-team-member-area.style-one, .star-team-member-area.style-two'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'team_content',
			[
				'label' => __( 'Team Member Content', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'select_team_style',
			[
				'label' => __( 'Team Member Style', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-01' => __( 'Style 01', 'star-addons-for-elementor' ),
					'style-02' => __( 'Style 02', 'star-addons-for-elementor' )
				],
				'default' => 'style-01'
			]
		);

		$this->add_control(
			'select_team_layout',
			[
				'label' => __( 'Team Layout', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'grid' => __( 'Grid', 'star-addons-for-elementor' ),
					'slider' => __( 'Slider', 'star-addons-for-elementor' )
				],
				'default' => 'grid'
			]
		);

		$this->add_control(
			'team_item_column',
			[
				'label' => __( 'Team Member Column', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'columns-2' => __( '2', 'star-addons-for-elementor' ),
					'columns-3' => __( '3', 'star-addons-for-elementor' ),
					'columns-4' => __( '4', 'star-addons-for-elementor' )
				],
				'default' => 'columns-4',
				'condition' => [
                    'select_team_layout' => 'grid'
                ]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'single_team_img', [
				'label' => __( 'Image', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ],
				'show_label' => true
			]
		);

		$repeater->add_control(
			'single_team_name', [
				'label' => __( 'Name', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'default'  => __( 'Adam Smith', 'star-addons-for-elementor' )
			]
		);

		$repeater->add_control(
			'single_team_position', [
				'label' => __( 'Designation', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Designation', 'star-addons-for-elementor' ),
				'default'  => __( 'English Lecturer', 'star-addons-for-elementor' )
			]
		);

		$repeater->add_control(
			'show_social',
			[
				'label' => __( 'Want to Show Social?', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'star-addons-for-elementor' ),
                'label_off' => __( 'No', 'star-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'yes'
			]
		);

		$repeater->add_control(
			'single_social_icon1', 
			[
				'label' => __( 'Social Icon 1', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'show_label' => true,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'brand'
				],
				'condition' => [
                    'show_social' => 'yes'
                ]
			]
		);

		$repeater->add_control(
			'single_social_link1',
			[
				'label' => __( 'Social Link 1', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false
				],
				'condition' => [
                    'show_social' => 'yes'
                ]
			]
		);

		$repeater->add_control(
			'single_social_icon2', 
			[
				'label' => __( 'Social Icon 2', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'show_label' => true,
				'default' => [
					'value' => 'fab fa-instagram',
					'library' => 'brand'
				],
				'condition' => [
                    'show_social' => 'yes'
                ]
			]
		);

		$repeater->add_control(
			'single_social_link2',
			[
				'label' => __( 'Social Link 2', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false
				],
				'condition' => [
                    'show_social' => 'yes'
                ]
			]
		);

		$repeater->add_control(
			'single_social_icon3', 
			[
				'label' => __( 'Social Icon 3', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'show_label' => true,
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'brand'
				],
				'condition' => [
                    'show_social' => 'yes'
                ]
			]
		);

		$repeater->add_control(
			'single_social_link3',
			[
				'label' => __( 'Social Link 3', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false
				],
				'condition' => [
                    'show_social' => 'yes'
                ]
			]
		);

		$repeater->add_control(
			'single_social_icon4', 
			[
				'label' => __( 'Social Icon 4', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'show_label' => true,
				'default' => [
					'value' => 'fab fa-linkedin-in',
					'library' => 'brand'
				],
				'condition' => [
                    'show_social' => 'yes'
                ]
			]
		);

		$repeater->add_control(
			'single_social_link4',
			[
				'label' => __( 'Social Link 4', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false
				],
				'condition' => [
                    'show_social' => 'yes'
                ]
			]
		);

		$this->add_control(
			'single_team',
			[
				'label' => __( 'Single Team Member', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Single Team Member #1', 'star-addons-for-elementor' ),
						'list_content' => __( 'Single Team Member Content', 'star-addons-for-elementor' )
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
                    '{{WRAPPER}} .star-team-member-area .section-title h2' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'section_desc_color',
			[
				'label' => __( 'Section Description Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-team-member-area .section-title p' => 'color: {{VALUE}}'
                ]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'team_style',
			[
				'label' => __( 'Team Style', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'team_bg_color',
			[
				'label' => __( 'Team Background Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-single-team-box.style-one .content, 
                    {{WRAPPER}} .star-single-team-box.style-two .content' => 'background-color: {{VALUE}}'
                ]
			]
		);

		$this->add_control(
			'team_name_color',
			[
				'label' => __( 'Team Name Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-single-team-box h3' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'team_designation_color',
			[
				'label' => __( 'Team Designation Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-single-team-box .designation' => 'color: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'team_image_height',
			[
				'label' => __( 'Team Image Height', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000
					]
				],
				'selectors' => [
					'{{WRAPPER}} .star-single-team-box img' => 'height: {{SIZE}}{{UNIT}}'
				]
			]
		);

		$this->add_control(
			'team_image_width',
			[
				'label' => __( 'Team Image Width', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000
					]
				],
				'selectors' => [
					'{{WRAPPER}} .star-single-team-box img' => 'width: {{SIZE}}{{UNIT}}'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'social_style',
			[
				'label' => __( 'Social Style', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'social_icon_bg_color',
			[
				'label' => __( 'Social Icon Background Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-single-team-box ul li a' => 'background: {{VALUE}}'
                ]
			]
		);

		$this->add_control(
			'social_icon_color',
			[
				'label' => __( 'Social Icon Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-single-team-box ul li a' => 'color: {{VALUE}}'
                ]
			]
		);

		$this->add_control(
			'social_icon_bg_hover_color',
			[
				'label' => __( 'Social Icon Background Hover Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-single-team-box ul li a:hover' => 'background: {{VALUE}}'
                ]
			]
		);

		$this->add_control(
			'social_icon_hover_color',
			[
				'label' => __( 'Social Icon Hover Color', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .star-single-team-box ul li a:hover' => 'color: {{VALUE}}'
                ]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display(); ?>

        <!-- Team Column Style -->
        <?php if($settings['select_team_layout'] == 'grid') :
		    if( $settings['team_item_column'] == 'columns-2' ) :
				$team_column = 'col-lg-6 col-md-6 col-sm-12';
			elseif( $settings['team_item_column'] == 'columns-3' ) :
				$team_column = 'col-lg-4 col-md-6 col-sm-12';
			elseif( $settings['team_item_column'] == 'columns-4' ) :
				$team_column = 'col-lg-3 col-md-6 col-sm-12';
			endif;
		endif; ?>

        <!-- Start Team Member Area -->
        <?php if($settings['select_team_style'] == 'style-01') : ?>
	    	<div class="star-team-member-area ptb-70 style-one">
	            <div class="container-fluid"> 
                    <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
                        <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
                        <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                    </div>
	                <?php if($settings['select_team_layout'] == 'grid') : ?>
		            	<div class="row justify-content-center">
		            <?php elseif($settings['select_team_layout'] == 'slider') : ?>
		            	<div class="star-team-slides owl-carousel owl-theme">
		            <?php endif; ?>
	                	<?php foreach ( $settings['single_team'] as $item ) : ?>
		                	<?php if($settings['select_team_layout'] == 'grid') : ?>
		                	    <div class="<?php echo esc_attr( $team_column ); ?>">
		                	<?php elseif($settings['select_team_layout'] == 'slider') : ?>
		                	    <div>
		                    <?php endif; ?>
		                		<div data-aos="fade-up" data-aos-duration="1200" class="star-single-team-box style-one">
		                            <div class="image">
		                                <?php if( ! $item['single_team_img']['url'] == '' ) : ?>
			                                <img src="<?php echo esc_url( $item['single_team_img']['url'] ); ?>" alt="image">
		                                <?php endif; ?>
		                                <?php if( $item['show_social'] == 'yes' ) : ?>
			                                <ul class="social">
			                                    <li>
			                                    	<?php $target1 = $item['single_social_link1']['is_external'] ? ' target="_blank"' : '';
		                                            $nofollow1 = $item['single_social_link1']['nofollow'] ? ' rel="nofollow"' : ''; ?>
			                                    	<a href="<?php echo esc_url($item['single_social_link1']['url']); ?>" <?php echo wp_kses_post( $target1 ); ?> <?php echo wp_kses_post( $nofollow1 ); ?>>
					                                	<?php star_addons_render_icon( $item, 'icon', 'single_social_icon1' ); ?>
			                                    	</a>
			                                    </li>
			                                    <li>
			                                    	<?php $target2 = $item['single_social_link2']['is_external'] ? ' target="_blank"' : '';
		                                            $nofollow2 = $item['single_social_link2']['nofollow'] ? ' rel="nofollow"' : ''; ?>
			                                    	<a href="<?php echo esc_url($item['single_social_link2']['url']); ?>" <?php echo wp_kses_post( $target2 ); ?> <?php echo wp_kses_post( $nofollow2 ); ?>>
					                                	<?php star_addons_render_icon( $item, 'icon', 'single_social_icon2' ); ?>
			                                    	</a>
			                                    </li>
			                                    <li>
			                                    	<?php $target3 = $item['single_social_link3']['is_external'] ? ' target="_blank"' : '';
		                                            $nofollow3 = $item['single_social_link3']['nofollow'] ? ' rel="nofollow"' : ''; ?>
			                                    	<a href="<?php echo esc_url($item['single_social_link3']['url']); ?>" <?php echo wp_kses_post( $target3 ); ?> <?php echo wp_kses_post( $nofollow3 ); ?>>
					                                	<?php star_addons_render_icon( $item, 'icon', 'single_social_icon3' ); ?>
			                                    	</a>
			                                    </li>
			                                    <li>
			                                    	<?php $target4 = $item['single_social_link4']['is_external'] ? ' target="_blank"' : '';
		                                            $nofollow4 = $item['single_social_link4']['nofollow'] ? ' rel="nofollow"' : ''; ?>
			                                    	<a href="<?php echo esc_url($item['single_social_link4']['url']); ?>" <?php echo wp_kses_post( $target4 ); ?> <?php echo wp_kses_post( $nofollow4 ); ?>>
					                                	<?php star_addons_render_icon( $item, 'icon', 'single_social_icon4' ); ?>
			                                    	</a>
			                                    </li>
			                                </ul>
		                                <?php endif; ?>
		                            </div>
		                            <div class="content">
		                                <h3>
		                                	<?php echo esc_html($item['single_team_name']); ?>
		                                </h3>
		                                <span class="designation">
		                                	<?php echo esc_html($item['single_team_position']); ?>
		                                </span>
		                            </div>
		                        </div>
		                	</div>			       
	                    <?php endforeach; ?>			               
	                </div>
	            </div>
	        </div>
	    <?php elseif($settings['select_team_style'] == 'style-02') : ?>
	    	<div class="star-team-member-area ptb-100 style-two">
	            <div class="container">
	                <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
	                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
	                </div>
	                <?php if($settings['select_team_layout'] == 'grid') : ?>
		            	<div class="row justify-content-center">
		            <?php elseif($settings['select_team_layout'] == 'slider') : ?>
		            	<div class="star-team-slides owl-carousel owl-theme">
		            <?php endif; ?>
	                	<?php foreach ( $settings['single_team'] as $item ) : ?>
		                	<?php if($settings['select_team_layout'] == 'grid') : ?>
		                	    <div class="<?php echo esc_attr( $team_column ); ?>">
		                	<?php elseif($settings['select_team_layout'] == 'slider') : ?>
		                	    <div>
		                    <?php endif; ?>
		                		<div data-aos="fade-up" data-aos-duration="1200" class="star-single-team-box style-two">
		                            <div class="image">
		                                <?php if( ! $item['single_team_img']['url'] == '' ) : ?>
			                                <img src="<?php echo esc_url( $item['single_team_img']['url'] ); ?>" alt="image">
		                                <?php endif; ?>
		                                <?php if( $item['show_social'] == 'yes' ) : ?>
			                                <ul class="social">
			                                    <li>
			                                    	<?php $target1 = $item['single_social_link1']['is_external'] ? ' target="_blank"' : '';
		                                            $nofollow1 = $item['single_social_link1']['nofollow'] ? ' rel="nofollow"' : ''; ?>
			                                    	<a href="<?php echo esc_url($item['single_social_link1']['url']); ?>" <?php echo wp_kses_post( $target1 ); ?> <?php echo wp_kses_post( $nofollow1 ); ?>>
					                                	<?php star_addons_render_icon( $item, 'icon', 'single_social_icon1' ); ?>
			                                    	</a>
			                                    </li>
			                                    <li>
			                                    	<?php $target2 = $item['single_social_link2']['is_external'] ? ' target="_blank"' : '';
		                                            $nofollow2 = $item['single_social_link2']['nofollow'] ? ' rel="nofollow"' : ''; ?>
			                                    	<a href="<?php echo esc_url($item['single_social_link2']['url']); ?>" <?php echo wp_kses_post( $target2 ); ?> <?php echo wp_kses_post( $nofollow2 ); ?>>
					                                	<?php star_addons_render_icon( $item, 'icon', 'single_social_icon2' ); ?>
			                                    	</a>
			                                    </li>
			                                    <li>
			                                    	<?php $target3 = $item['single_social_link3']['is_external'] ? ' target="_blank"' : '';
		                                            $nofollow3 = $item['single_social_link3']['nofollow'] ? ' rel="nofollow"' : ''; ?>
			                                    	<a href="<?php echo esc_url($item['single_social_link3']['url']); ?>" <?php echo wp_kses_post( $target3 ); ?> <?php echo wp_kses_post( $nofollow3 ); ?>>
					                                	<?php star_addons_render_icon( $item, 'icon', 'single_social_icon3' ); ?>
			                                    	</a>
			                                    </li>
			                                    <li>
			                                    	<?php $target4 = $item['single_social_link4']['is_external'] ? ' target="_blank"' : '';
		                                            $nofollow4 = $item['single_social_link4']['nofollow'] ? ' rel="nofollow"' : ''; ?>
			                                    	<a href="<?php echo esc_url($item['single_social_link4']['url']); ?>" <?php echo wp_kses_post( $target4 ); ?> <?php echo wp_kses_post( $nofollow4 ); ?>>
					                                	<?php star_addons_render_icon( $item, 'icon', 'single_social_icon4' ); ?>
			                                    	</a>
			                                    </li>
			                                </ul>
		                                <?php endif; ?>
		                            </div>
		                            <div class="content">
		                                <h3>
		                                	<?php echo esc_html($item['single_team_name']); ?>
		                                </h3>
		                                <span class="designation">
		                                	<?php echo esc_html($item['single_team_position']); ?>
		                                </span>
		                            </div>
		                        </div>
		                	</div>			       
	                    <?php endforeach; ?>			               
	                </div>
	            </div>
	        </div>
        <?php endif; ?>
	    <!-- End Team Member Area -->

    <?php

	}

}
