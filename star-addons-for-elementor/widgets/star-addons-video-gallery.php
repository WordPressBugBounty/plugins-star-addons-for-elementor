<?php

/**
 * Elementor VideoGallery Widget.
 *
 * @since 1.2
 */

class Elementor_Video_Gallery_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'video-gallery';
	}

	public function get_title() {
		return __( 'VideoGallery', 'star-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-video-playlist';
	}

	public function get_categories() {
		return [ 'star-elements' ];
	}
	protected function _register_controls() {

		$this->start_controls_section(
			'default_section',
			[    
				'label' => __( 'Settings', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'select_video_style',
			[
				'label' => __( 'Select Video Style', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'input_type' => 'SELECT',
				'options' => [
					'style-01' => __( 'Style 01', 'star-addons-for-elementor' ),
					'style-02' => __( 'Style 02', 'star-addons-for-elementor' ),
					'style-03' => __( 'Style 03', 'star-addons-for-elementor' ),
					'style-04' => __( 'Style 04', 'star-addons-for-elementor' ),
					'style-05' => __( 'Style 05', 'star-addons-for-elementor' ),
					'style-06' => __( 'Style 06', 'star-addons-for-elementor' ),
					'style-07' => __( 'Style 07', 'star-addons-for-elementor' )
				],
				'default' => 'style-01'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'video_section',
			[
				'label' => __( 'Video Section', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'video_section_title',
			[
				'label' => __( 'Section Title', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'default'  => __( 'Design 1', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'video_section_desc',
			[
				'label' => __( 'Section Description', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'input_type' => 'textarea',
				'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'star-addons-for-elementor')
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'section_background',
				'label' => __( 'Background', 'star-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .video-area',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'video_content',
			[
				'label' => __( 'Video Content', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'video_title',
			[
				'label' => __( 'Video Title', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'default'  => __( 'Watch our video', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'video_desc',
			[
				'label' => __( 'Video Description', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
				'default' => __( 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus magna justo, laci nia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', 'star-addons-for-elementor'),
				'condition' => [
                    'select_video_style' => array('style-02', 'style-03', 'style-04', 'style-06', 'style-07'),
                ]
			]
		);

		$this->add_control(
			'icon_type',
			[
				'label' => __( 'Icon Type', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'input_type' => 'SELECT',
				'options' => [
					'general' => __( 'General', 'star-addons-for-elementor' ),
					'library' => __( 'Library', 'star-addons-for-elementor' ),
				],
				'default' => 'general'
			]
		);

		$this->add_control(
			'video_icon1', 
			[
				'label' => __( 'Video Icon', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'input_type' => 'icon',
				'default'  => 'bx bx-play',
				'show_label' => true,
				'options' => star_addons_icons(),
				'condition' => [
                    'icon_type' => 'general'
                ]
			]
		);

		$this->add_control(
			'video_icon2', 
			[
				'label' => __( 'Video Icon', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'input_type' => 'icon',
				'show_label' => true,
				'options' => star_addons_icons(),
				'condition' => [
                    'icon_type' => 'library'
                ]
			]
		);

		$this->add_control(
            'video_source',
            [
                'label' => __('Source', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'youtube',
                'options' => [
                    'youtube' => __('YouTube', 'star-addons-for-elementor'),
                    'vimeo' => __('Vimeo', 'star-addons-for-elementor'),
                    'self_hosted' => __('Self Hosted', 'star-addons-for-elementor'),
                ],
            ]
        );

        $this->add_control(
            'video_link_youtube',
            [
                'label' => __('Link', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Enter your URL (YouTube)', 'star-addons-for-elementor'),
                'label_block' => true,
                'default' => 'https://www.youtube.com/watch?v=7yfrDpwXAU0',
                'condition' => [
                    'video_source' => 'youtube',
                ],
            ]
        );

        $this->add_control(
            'video_link_vimeo',
            [
                'label' => __('Link', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Enter your URL (Vimeo)', 'star-addons-for-elementor'),
                'label_block' => true,
                'default' => 'https://vimeo.com/462650807',
                'condition' => [
                    'video_source' => 'vimeo',
                ],
            ]
        );

        $this->add_control(
            'video_link_external',
            [
                'label' => __('External URL', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_block' => false,
                'condition' => [
                    'video_source' => 'self_hosted',
                ],
            ]
        );

        $this->add_control(
            'video_hosted_url',
            [
                'label' => __('Choose File', 'elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_type' => 'video',
                'condition' => [
                    'video_source' => 'self_hosted',
                    'video_link_external' => '',
                ],
            ]
        );

        $this->add_control(
            'video_external_url',
            [
                'label' => __('Link', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Enter your URL', 'star-addons-for-elementor'),
                'label_block' => true,
                'show_label' => false,
                'condition' => [
                    'video_source' => 'self_hosted',
                    'video_link_external' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'video_start_time',
            [
                'label' => __('Start Time', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 10000,
                'step' => 1,
                'default' => '',
                'description' => __('Specify a start time (in seconds)', 'star-addons-for-elementor'),
                'condition' => [
                    'video_source' => 'self_hosted'
                ],
            ]
        );

        $this->add_control(
            'video_end_time',
            [
                'label' => __('End Time', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 10000,
                'step' => 1,
                'default' => '',
                'description' => __('Specify an end time (in seconds)', 'star-addons-for-elementor'),
                'condition' => [
                    'video_source' => 'self_hosted'
                ],
            ]
        );

		$this->add_control(
			'video_bg_img',
			[
				'label' => __( 'Video Background Image', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'show_label' => true
			]
		);

		$this->add_control(
			'video_shape_img',
			[
				'label' => __( 'Video Shape Image', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'show_label' => true,
				'condition' => [
                    'select_video_style' => 'style-07',
                ]
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Video widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.2
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$startTime = $settings['video_start_time'];
		$endTime = $settings['video_end_time']; 

		if( $settings['video_source'] == 'youtube' ) :
		    $video_link = $settings['video_link_youtube'];
		elseif( $settings['video_source'] == 'vimeo' ) :
		    $video_link = $settings['video_link_vimeo'];
		elseif( $settings['video_source'] == 'self_hosted' && $settings['video_link_external'] == '' ) :
			if( ! $endTime == '' ) : 
		        $video_link = $settings['video_hosted_url']['url'] . '#t=' . esc_attr($startTime) . ',' . esc_attr($endTime);
		    else:
		    	$video_link = $settings['video_hosted_url']['url'] . '#t=' . esc_attr($startTime);
		    endif;
		elseif( $settings['video_source'] == 'self_hosted' && $settings['video_link_external'] == 'yes' ) :
		    if( ! $endTime == '' ) : 
		        $video_link = $settings['video_external_url'] . '#t=' . esc_attr($startTime) . ',' . esc_attr($endTime);
		    else:
		    	$video_link = $settings['video_external_url'] . '#t=' . esc_attr($startTime);
		    endif;
		endif;   

        if( $settings['select_video_style'] == 'style-01' ) : ?>
			<!-- Start Video Design One Area -->
	        <section class="video-area pt-20 pb-20">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['video_section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['video_section_desc']); ?></p>
	                </div>
	                <div class="video-content style-one bg-1" style="background-image:url(<?php echo esc_url( $settings['video_bg_img']['url'] ); ?>);">
	                    <a href="<?php echo esc_attr($video_link); ?>" class="video-btn-one popup-video">
	                    	<?php if( $settings['icon_type'] == 'general' ) : ?>
                        	    <i class="<?php echo wp_kses_post( $settings['video_icon1'] ); ?>"></i>
                        	<?php else: 
                        		star_addons_render_icon( $settings, 'icon', 'video_icon2' ); 
                        	endif; ?>
	                    </a>
	                    <h3><?php echo esc_html($settings['video_title']); ?></h3>
	                </div>
	            </div>
	        </section>
	        <!-- End Video Design One Area -->
	    <?php elseif( $settings['select_video_style'] == 'style-02' ) : ?>
	    	<!-- Start Video Design Two Area -->
	        <section class="video-area pb-20">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['video_section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['video_section_desc']); ?></p>
	                </div>
	                <div class="video-bg">
	                	<div class="row align-items-center">
	                		<div class="col-lg-7">
	                			<h3><?php echo esc_html($settings['video_title']); ?></h3>
	                			<p><?php echo wp_kses_post($settings['video_desc']); ?></p>
	                		</div>
	                		<div class="col-lg-5">
	                			<div class="video-content bg-2">
	                				<?php if( ! $settings['video_bg_img']['url'] == '' ) : ?>
	                                    <img src="<?php echo esc_url( $settings['video_bg_img']['url'] ); ?>" alt="image">
                                    <?php endif; ?>
	                				<div class="video-btn-center">
	                					<a href="<?php echo esc_attr($video_link); ?>" class="video-btn-one popup-video">
	                						<?php if( $settings['icon_type'] == 'general' ) : ?>
			                            	    <i class="<?php echo wp_kses_post( $settings['video_icon1'] ); ?>"></i>
			                            	<?php else: 
			                            		star_addons_render_icon( $settings, 'icon', 'video_icon2' ); 
			                            	endif; ?>
	                					</a>
	                				</div>
	                			</div>
	                		</div>
			            </div>
		            </div>
	            </div>
	        </section>
	        <!-- End Video Design Two Area -->
	    <?php elseif( $settings['select_video_style'] == 'style-03' ) : ?>
	    	<!-- Start Video Design Three Area -->
	        <section class="video-area pb-20">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['video_section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['video_section_desc']); ?></p>
	                </div>
	            </div>
	            <div class="video-area-style-three" style="background-image:url(<?php echo esc_url( $settings['video_bg_img']['url'] ); ?>);">
	            	<div class="container">
		                <div class="video-bg">
		                	<div class="row align-items-center">
		                		<div class="col-lg-7">
		                			<h3><?php echo esc_html($settings['video_title']); ?></h3>
		                			<p><?php echo wp_kses_post($settings['video_desc']); ?></p>
		                		</div>
		                		<div class="col-lg-5">
		                			<div class="video-content bg-2 bg-3">
		                				<div class="video-btn-center">
		                					<a href="<?php echo esc_attr($video_link); ?>" class="video-btn-one popup-video">
		                						<?php if( $settings['icon_type'] == 'general' ) : ?>
				                            	    <i class="<?php echo wp_kses_post( $settings['video_icon1'] ); ?>"></i>
				                            	<?php else: 
				                            		star_addons_render_icon( $settings, 'icon', 'video_icon2' ); 
				                            	endif; ?>
		                					</a>
		                				</div>
		                			</div>
		                		</div>
				            </div>
				        </div>
		            </div>
	            </div>
	        </section>
	        <!-- End Video Design Three Area -->
	    <?php elseif( $settings['select_video_style'] == 'style-04' ) : ?>
	    	<!-- Start Video Design Four Area -->
	        <section class="video-area video-style-four pb-20">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['video_section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['video_section_desc']); ?></p>
	                </div>
	                <div class="video-bg">
	                	<div class="row align-items-center">
	                		<div class="col-lg-6">
	                			<div class="video-content bg-4">
	                				<?php if( ! $settings['video_bg_img']['url'] == '' ) : ?>
	                                    <img src="<?php echo esc_url( $settings['video_bg_img']['url'] ); ?>" alt="image">
                                    <?php endif; ?>
	                				<div class="video-btn-center">
	                					<a href="<?php echo esc_attr($video_link); ?>" class="video-play-btn popup-video">
	                						<?php if( $settings['icon_type'] == 'general' ) : ?>
			                            	    <i class="<?php echo wp_kses_post( $settings['video_icon1'] ); ?>"></i>
			                            	<?php else: 
			                            		star_addons_render_icon( $settings, 'icon', 'video_icon2' ); 
			                            	endif; ?>
	                					</a>
	                				</div>
	                			</div>
	                		</div>
	                		<div class="col-lg-6">
	                			<h3><?php echo esc_html($settings['video_title']); ?></h3>
	                			<p><?php echo wp_kses_post($settings['video_desc']); ?></p>
	                		</div>
			            </div>
			        </div>
	            </div>
	        </section>
	        <!-- End Video Design Four Area -->
	    <?php elseif( $settings['select_video_style'] == 'style-05' ) : ?>
	    	<!-- Start Video Design Five Area -->
	        <section class="video-area video-area-style-five pb-20">
	            <div class="container">
	                <div class="section-title white-title">
	                    <h2><?php echo wp_kses_post($settings['video_section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['video_section_desc']); ?></p>
	                </div>
        			<div class="video-content bg-5" style="background-image:url(<?php echo esc_url( $settings['video_bg_img']['url'] ); ?>);">
    					<a href="<?php echo esc_attr($video_link); ?>" class="video-btn-one popup-video">
    						<?php if( $settings['icon_type'] == 'general' ) : ?>
                        	    <i class="<?php echo wp_kses_post( $settings['video_icon1'] ); ?>"></i>
                        	<?php else: 
                        		star_addons_render_icon( $settings, 'icon', 'video_icon2' ); 
                        	endif; ?>
    					</a>
    					<h3><?php echo esc_html($settings['video_title']); ?></h3>
        			</div>
	            </div>
	        </section>
	        <!-- End Video Design Five Area -->
	    <?php elseif( $settings['select_video_style'] == 'style-06' ) : ?>
	    	<!-- Start Video Design Six Area -->
	        <section class="video-area video-area-style-six pb-20">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['video_section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['video_section_desc']); ?></p>
	                </div>
        			<div class="video-bg">
	                	<div class="row align-items-center">
	                		<div class="col-lg-7">
	                			<h3><?php echo esc_html($settings['video_title']); ?></h3>
	                			<p><?php echo wp_kses_post($settings['video_desc']); ?></p>
	                		</div>
	                		<div class="col-lg-5">
	                			<div class="video-content bg-6" style="background-image:url(<?php echo esc_url( $settings['video_bg_img']['url'] ); ?>);">
	                				<div class="video-btn-center">
	                					<a href="<?php echo esc_attr($video_link); ?>" class="video-btn-one popup-video">
	                						<?php if( $settings['icon_type'] == 'general' ) : ?>
			                            	    <i class="<?php echo wp_kses_post( $settings['video_icon1'] ); ?>"></i>
			                            	<?php else: 
			                            		star_addons_render_icon( $settings, 'icon', 'video_icon2' ); 
			                            	endif; ?>
	                					</a>
	                				</div>
	                			</div>
	                		</div>
			            </div>
			        </div>
	            </div>
	        </section>
	        <!-- End Video Design Six Area -->
	    <?php elseif( $settings['select_video_style'] == 'style-07' ) : ?>
	    	<!-- Start Video Design Seven Area -->
	        <section class="video-area video-area-style-seven pb-40">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['video_section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['video_section_desc']); ?></p>
	                </div>
        			<div class="video-bg">
	                	<div class="row align-items-center">
	                		<div class="col-lg-5 pr-0">
	                			<div class="video-content bg-7" style="background-image:url(<?php echo esc_url( $settings['video_bg_img']['url'] ); ?>);">
	                				<div class="video-btn-center">
	                					<a href="<?php echo esc_attr($video_link); ?>" class="video-btn-one popup-video">
	                						<?php if( $settings['icon_type'] == 'general' ) : ?>
			                            	    <i class="<?php echo wp_kses_post( $settings['video_icon1'] ); ?>"></i>
			                            	<?php else: 
			                            		star_addons_render_icon( $settings, 'icon', 'video_icon2' ); 
			                            	endif; ?>
	                					</a>
	                				</div>
	                			</div>
	                		</div>
	                		<div class="col-lg-7 pl-0">
	                			<div class="video-content-wrap" style="background-image:url(<?php echo esc_url( $settings['video_shape_img']['url'] ); ?>);">
		                			<h3><?php echo esc_html($settings['video_title']); ?></h3>
		                			<p><?php echo wp_kses_post($settings['video_desc']); ?></p>
		                		</div>
	                		</div>
			            </div>
			        </div>
	            </div>
	        </section>
	        <!-- End Video Design Seven Area -->
	    <?php endif;

    }

}
