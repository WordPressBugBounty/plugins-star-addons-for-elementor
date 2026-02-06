<?php

/**
 * Elementor PhotoGallery Widget.
 *
 * @since 1.2
 */

class Elementor_Photo_Gallery_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'photo-gallery';
	}

	public function get_title() {
		return __( 'PhotoGallery', 'star-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-photo-library';
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
			'select_image_gallery_style',
			[
				'label' => __( 'Select Photo Gallery Style', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'input_type' => 'SELECT',
				'options' => [
					'style-01' => __( 'Style 01', 'star-addons-for-elementor' ),
					'style-02' => __( 'Style 02', 'star-addons-for-elementor' ),
					'style-03' => __( 'Style 03', 'star-addons-for-elementor' ),
					'style-04' => __( 'Style 04', 'star-addons-for-elementor' ),
					'style-05' => __( 'Style 05', 'star-addons-for-elementor' ),
					'style-06' => __( 'Style 06', 'star-addons-for-elementor' ),
					'style-07' => __( 'Style 07', 'star-addons-for-elementor' ),
					'style-08' => __( 'Style 08', 'star-addons-for-elementor' )
				],
				'default' => 'style-01'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'image_gallery_section',
			[
				'label' => __( 'Photo Gallery Section', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' => __( 'Section Title', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'default'  => __( 'Design 1', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label' => __( 'Section Description', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'input_type' => 'textarea',
				'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'star-addons-for-elementor')
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'image_gallery_content',
			[
				'label' => __( 'Photo Gallery Content', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image_gallery_type',
			[
				'label' => __( 'Select Gallery Type', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'input_type' => 'SELECT',
				'options' => [
					'grid' => __( 'Grid', 'star-addons-for-elementor' ),
					'mansory' => __( 'Mansory', 'star-addons-for-elementor' )
				],
				'default' => 'mansory'
			]
		);

		$this->add_control(
			'image_gallery_grid_column',
			[
				'label' => __( 'Select Photo Gallery Column', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'input_type' => 'SELECT',
				'options' => [
					'columns-2' => __( '2', 'star-addons-for-elementor' ),
					'columns-3' => __( '3', 'star-addons-for-elementor' ),
					'columns-4' => __( '4', 'star-addons-for-elementor' ),
					'columns-6' => __( '6', 'star-addons-for-elementor' )
				],
				'default' => 'columns-3',
				'condition' => [
                    'select_image_gallery_style' => array('style-05', 'style-06', 'style-08'),
                    'image_gallery_type' => 'grid'
                ]
			]
		);

		$this->add_control(
			'image_gallery_mansory_column',
			[
				'label' => __( 'Select Photo Gallery Column', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'input_type' => 'SELECT',
				'options' => [
					'columns-2' => __( '2', 'star-addons-for-elementor' ),
					'columns-3' => __( '3', 'star-addons-for-elementor' ),
					'columns-4' => __( '4', 'star-addons-for-elementor' ),
					'columns-6' => __( '6', 'star-addons-for-elementor' )
				],
				'default' => 'columns-3',
				'condition' => [
                    'image_gallery_type' => 'mansory'
                ]
			]
		);

		$this->add_control(
			'all_image_gallery', [
				'label' => __( 'Gallery', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
                'input_type' => 'gallery'
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Photo Gallery widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.2
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display(); ?>

		<!-- Photo Gallery Column Style -->
	    <?php if( $settings['image_gallery_grid_column'] == 'columns-2' ) :
			$image_gallery_grid_column = 'col-lg-6 col-md-6 col-sm-6';
		elseif( $settings['image_gallery_grid_column'] == 'columns-3' ) :
			$image_gallery_grid_column = 'col-lg-4 col-md-6 col-sm-6';
		elseif( $settings['image_gallery_grid_column'] == 'columns-4' ) :
			$image_gallery_grid_column = 'col-lg-3 col-md-6 col-sm-6';
		elseif( $settings['image_gallery_grid_column'] == 'columns-6' ) :
			$image_gallery_grid_column = 'col-lg-2 col-md-6 col-sm-6';
		endif; ?>

		<!-- Photo Gallery Column Style -->
	    <?php if( $settings['image_gallery_mansory_column'] == 'columns-2' ) :
			$image_gallery_mansory_column = 'col-lg-6 col-md-6 col-sm-6';
		elseif( $settings['image_gallery_mansory_column'] == 'columns-3' ) :
			$image_gallery_mansory_column = 'col-lg-4 col-md-6 col-sm-6';
		elseif( $settings['image_gallery_mansory_column'] == 'columns-4' ) :
			$image_gallery_mansory_column = 'col-lg-3 col-md-6 col-sm-6';
	    elseif( $settings['image_gallery_mansory_column'] == 'columns-6' ) :
			$image_gallery_mansory_column = 'col-lg-2 col-md-6 col-sm-6';
		endif;

		if($settings['image_gallery_type'] == 'grid') :
			$image_gallery_area = 'image-gallery-area';
		elseif($settings['image_gallery_type'] == 'mansory') :
			$image_gallery_area = 'image-gallery-mansory-area';
		endif;

		if( $settings['select_image_gallery_style'] == 'style-01' ) : ?>
			<!-- Start Photo Gallery Design One Area -->
	        <section class="<?php echo esc_attr($image_gallery_area); ?> style-one pt-20 gallery-popup">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
	                </div>
	                <div class="row justify-content-center">
	                	<?php foreach ( $settings['all_image_gallery'] as $image ) : ?>
	                		<?php if($settings['image_gallery_type'] == 'grid') : ?>
		                        <div class="col-lg-3 gallery gallery-g-mb-30">
		                    <?php elseif($settings['image_gallery_type'] == 'mansory') : ?>
		                        <div class="<?php echo esc_attr( $image_gallery_mansory_column ); ?> image-gallery-col gallery gallery-g-mb-30">    
		                    <?php endif; ?>
	                            <?php if($image['url'] != ''): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="Image">
                                    <a href="<?php echo esc_url($image['url']); ?>" class="full-screen">
                                        <i class="bx bx-image-alt"></i>
                                    </a>
                                <?php endif; ?>
		                    </div>
	                    <?php endforeach; ?>
	                </div>
	            </div>
	        </section>
	        <!-- End Photo Gallery Design One Area -->
        <?php elseif( $settings['select_image_gallery_style'] == 'style-02' ) : ?>
			<!-- Start Photo Gallery Design Two Area -->
	        <section class="<?php echo esc_attr($image_gallery_area); ?> style-two gallery-popup">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
	                </div>
	                <div class="row justify-content-center">
	                	<?php foreach ( $settings['all_image_gallery'] as $image ) : ?>
	                		<?php if($settings['image_gallery_type'] == 'grid') : ?>
		                        <div class="col-lg-4 gallery gallery-g-mb-30" data-aos="fade-left">
		                    <?php elseif($settings['image_gallery_type'] == 'mansory') : ?>
		                        <div class="<?php echo esc_attr( $image_gallery_mansory_column ); ?> image-gallery-col gallery gallery-g-mb-30" data-aos="fade-left">    
		                    <?php endif; ?>
	                            <?php if($image['url'] != ''): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="Image">
                                    <a href="<?php echo esc_url($image['url']); ?>" class="full-screen">
                                        <i class="bx bx-image-alt"></i>
                                    </a>
                                <?php endif; ?>
		                    </div>
	                    <?php endforeach; ?>
	                </div>
	            </div>
	        </section>
	        <!-- End Photo Gallery Design Two Area -->
	    <?php elseif( $settings['select_image_gallery_style'] == 'style-03' ) : ?>
			<!-- Start Photo Gallery Design Three Area -->
	        <section class="<?php echo esc_attr($image_gallery_area); ?> style-three gallery-popup">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
	                </div>
	                <div class="row justify-content-center">
	                	<?php foreach ( $settings['all_image_gallery'] as $image ) : ?>
	                		<?php if($settings['image_gallery_type'] == 'grid') : ?>
		                        <div class="col-lg-3 image-gallery-col" data-aos="fade-right">
		                    <?php elseif($settings['image_gallery_type'] == 'mansory') : ?>
		                        <div class="<?php echo esc_attr( $image_gallery_mansory_column ); ?> image-gallery-col" data-aos="fade-right">    
		                    <?php endif; ?> 
			                    <div class="gallery gallery-g-mb-30">    
		                            <?php if($image['url'] != ''): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="Image">
                                        <a href="<?php echo esc_url($image['url']); ?>" class="full-screen">
	                                        <i class="bx bx-image-alt"></i>
	                                    </a>
                                    <?php endif; ?>
			                    </div>
			                </div>
	                    <?php endforeach; ?>
	                </div>
	            </div>
	        </section>
	        <!-- End Photo Gallery Design Three Area -->
	    <?php elseif( $settings['select_image_gallery_style'] == 'style-04' ) : ?>
			<!-- Start Photo Gallery Design Four Area -->
	        <section class="<?php echo esc_attr($image_gallery_area); ?> style-four gallery-popup">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
	                </div>
	                <div class="row justify-content-center">
	                	<?php foreach ( $settings['all_image_gallery'] as $image ) : ?>
	                		<?php if($settings['image_gallery_type'] == 'grid') : ?>
		                        <div class="col-lg-3 image-gallery-col" data-aos="fade-left">
		                    <?php elseif($settings['image_gallery_type'] == 'mansory') : ?>
		                        <div class="<?php echo esc_attr( $image_gallery_mansory_column ); ?> image-gallery-col" data-aos="fade-left">    
		                    <?php endif; ?>
			                    <div class="gallery gallery-g-mb-30">    
		                            <?php if($image['url'] != ''): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="Image">
                                        <a href="<?php echo esc_url($image['url']); ?>" class="full-screen">
	                                        <i class="bx bx-image-alt"></i>
	                                    </a>
                                    <?php endif; ?>
			                    </div>
			                </div>
	                    <?php endforeach; ?>
	                </div>
	            </div>
	        </section>
	        <!-- End Photo Gallery Design Four Area -->
	    <?php elseif( $settings['select_image_gallery_style'] == 'style-05' ) : ?>
			<!-- Start Photo Gallery Design Five Area -->
	        <section class="<?php echo esc_attr($image_gallery_area); ?> gallery-popup">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
	                </div>
	                <div class="row justify-content-center">
	                	<?php foreach ( $settings['all_image_gallery'] as $image ) : ?>
	                		<?php if($settings['image_gallery_type'] == 'grid') : ?>
		                        <div class="image-gallery-col <?php echo esc_attr( $image_gallery_grid_column ); ?>" data-aos="fade-up">
		                    <?php elseif($settings['image_gallery_type'] == 'mansory') : ?>
		                        <div class="image-gallery-col <?php echo esc_attr( $image_gallery_mansory_column ); ?>" data-aos="fade-up">    
		                    <?php endif; ?> 
			                    <div class="gallery gallery-g-mb-30">    
		                            <?php if($image['url'] != ''): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="Image">
                                        <a href="<?php echo esc_url($image['url']); ?>" class="full-screen">
	                                        <i class="bx bx-image-alt"></i>
	                                    </a>
                                    <?php endif; ?>
			                    </div>
			                </div>
	                    <?php endforeach; ?>
	                </div>
	            </div>
	        </section>
	        <!-- End Photo Gallery Design Five Area -->
	    <?php elseif( $settings['select_image_gallery_style'] == 'style-06' ) : ?>
			<!-- Start Photo Gallery Design Six Area -->
	        <section class="<?php echo esc_attr($image_gallery_area); ?> style-six gallery-popup">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
	                </div>
	                <div class="row justify-content-center">
	                	<?php foreach ( $settings['all_image_gallery'] as $image ) : ?>
	                		<?php if($settings['image_gallery_type'] == 'grid') : ?>
		                        <div class="image-gallery-col <?php echo esc_attr( $image_gallery_grid_column ); ?>" data-aos="zoom-in">
		                    <?php elseif($settings['image_gallery_type'] == 'mansory') : ?>
		                        <div class="image-gallery-col <?php echo esc_attr( $image_gallery_mansory_column ); ?>" data-aos="zoom-in">   
		                    <?php endif; ?> 
			                    <div class="gallery gallery-g-mb-30">    
		                            <?php if($image['url'] != ''): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="Image">
                                        <a href="<?php echo esc_url($image['url']); ?>" class="full-screen">
	                                        <i class="bx bx-image-alt"></i>
	                                    </a>
                                    <?php endif; ?>
			                    </div>
			                </div>
	                    <?php endforeach; ?>
	                </div>
	            </div>
	        </section>
	        <!-- End Photo Gallery Design Six Area -->
	    <?php elseif( $settings['select_image_gallery_style'] == 'style-07' ) : ?>
			<!-- Start Photo Gallery Design Seven Area -->
	        <section class="<?php echo esc_attr($image_gallery_area); ?> style-seven gallery-popup">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
	                </div>
	                <div class="row justify-content-center">
	                	<?php foreach ( $settings['all_image_gallery'] as $image ) : ?>
	                		<?php if($settings['image_gallery_type'] == 'grid') : ?>
		                        <div class="col-lg-3 gallery gallery-g-mb-30" data-aos="zoom-out-up">
		                    <?php elseif($settings['image_gallery_type'] == 'mansory') : ?>
		                        <div class="<?php echo esc_attr( $image_gallery_mansory_column ); ?> image-gallery-col gallery gallery-g-mb-30" data-aos="zoom-out-up">   
		                    <?php endif; ?>    
	                            <?php if($image['url'] != ''): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="Image">
                                    <a href="<?php echo esc_url($image['url']); ?>" class="full-screen">
	                                    <i class="bx bx-image-alt"></i>
	                                </a>
                                <?php endif; ?>
		                    </div>
	                    <?php endforeach; ?>
	                </div>
	            </div>
	        </section>
	        <!-- End Photo Gallery Design Seven Area -->
	    <?php elseif( $settings['select_image_gallery_style'] == 'style-08' ) : ?>
			<!-- Start Photo Gallery Design Eight Area -->
	        <section class="<?php echo esc_attr($image_gallery_area); ?> style-eight pb-20 gallery-popup">
	            <div class="container">
	                <div class="section-title">
	                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
	                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
	                </div>
	                <div class="row justify-content-center">
	                	<?php foreach ( $settings['all_image_gallery'] as $image ) : ?>
	                		<?php if($settings['image_gallery_type'] == 'grid') : ?>
		                        <div class="image-gallery-col <?php echo esc_attr( $image_gallery_grid_column ); ?>" data-aos="fade-left">
		                    <?php elseif($settings['image_gallery_type'] == 'mansory') : ?>
		                        <div class="image-gallery-col <?php echo esc_attr( $image_gallery_mansory_column ); ?>" data-aos="fade-left">   
		                    <?php endif; ?> 
			                    <div class="gallery gallery-g-mb-30">    
		                            <?php if($image['url'] != ''): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="Image">
                                        <a href="<?php echo esc_url($image['url']); ?>" class="full-screen">
	                                        <i class="bx bx-image-alt"></i>
	                                    </a>
                                    <?php endif; ?>
			                    </div>
			                </div>
	                    <?php endforeach; ?>
	                </div>
	            </div>
	        </section>
	        <!-- End Photo Gallery Design Eight Area -->
	    <?php endif;

    }

}
