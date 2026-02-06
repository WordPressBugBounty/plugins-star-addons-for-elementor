<?php

/**
 * Elementor Service Widget.
 *
 * @since 1.0.0
 */

class Elementor_Service_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'service';
    }

	public function get_title() {
        return __( 'Services', 'star-addons-for-elementor' );
    }

	public function get_icon() {
        return 'eicon-posts-group';
    }

	public function get_categories() {
        return [ 'star-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Section Content', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => __( 'Section Subtitle', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Subtitle', 'star-addons-for-elementor' ),
                'default'  => __( 'Services', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __( 'Section Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
                'default'  => __( 'Explore Our Services', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'section_desc',
            [
                'label' => __( 'Section Description', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
                'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
                'default' => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore perferendis deleniti illum necessitati voluptates ipsum, ratione dolorum veritatis minus mollitia placeat.', 'star-addons-for-elementor')
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'service_content',
			[
				'label' => esc_html__( 'Service Content', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
        );

        $this->add_control(
            'service_item_style',
            [
                'label' => __( 'Select Service Style', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'grid' => __( 'Grid', 'star-addons-for-elementor' ),
                    'slider' => __( 'Slider', 'star-addons-for-elementor' )
                ],
                'default' => 'grid'
            ]
        );

        $this->add_control(
            'service_item_column',
            [
                'label' => __( 'Select Service Column', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'column-1' => __( '1', 'star-addons-for-elementor' ),
                    'columns-2' => __( '2', 'star-addons-for-elementor' ),
                    'columns-3' => __( '3', 'star-addons-for-elementor' ),
                    'columns-4' => __( '4', 'star-addons-for-elementor' )
                ],
                'default' => 'columns-3',
                'condition' => [
                    'service_item_style' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Service Order By', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'DESC'      => __( 'DESC', 'star-addons-for-elementor' ),
                    'ASC'       => __( 'ASC', 'star-addons-for-elementor' )
                ],
                'default' => 'DESC'
            ]
        );

        $this->add_control(
            'count',
            [
                'label' => __( 'Count', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 6
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label' => __( 'Show Pagination?', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'star-addons-for-elementor' ),
                'label_off' => __( 'No', 'star-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'service_item_style' => 'grid'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_content',
            [
                'label' => esc_html__( 'Button Content', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
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

        $this->add_control(
            'button_text',
            [
                'label'     => esc_html__( 'Button Text', 'star-addons-for-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __('View All Services', 'star-addons-for-elementor'),
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'btn_link_type',
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

        $this->add_control(
            'btn_link_to_page',
            [
                'label'         => esc_html__( 'Button Link Page', 'star-addons-for-elementor' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => star_addons_get_page_as_list(),
                'condition' => [
                    'btn_link_type' => '1',
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'btn_ex_link',
            [
                'label'     => esc_html__('Button External Link', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true
                ],
                'condition' => [
                    'btn_link_type' => '2',
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display(); ?>

        <!-- Service Column Style -->
        <?php if($settings['service_item_style'] == 'grid') : 
            if( $settings['service_item_column'] == 'column-1' ) :
                $service_column = 'full-col col-lg-12 col-md-6 col-sm-12'; 
            elseif( $settings['service_item_column'] == 'columns-2' ) :
                $service_column = 'full-col col-lg-6 col-md-6 col-sm-12';
            elseif( $settings['service_item_column'] == 'columns-3' ) :
                $service_column = 'full-col col-lg-4 col-md-6 col-sm-12';
            elseif( $settings['service_item_column'] == 'columns-4' ) :
                $service_column = 'full-col col-lg-3 col-md-6 col-sm-12';
            endif; 
        endif;

        // Service Query
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type'         => 'star-add-services',
            'posts_per_page'    => $settings['count'],
            'order'             => $settings['order'],
            'paged' => $paged
        );

        $post_array = new \WP_Query( $args );

        // Inline Editing
        $this-> add_inline_editing_attributes('title', 'none'); ?>
        
        <!-- START SERVICES AREA -->
        <section class="service-area ptb-20">
            <div class="container-fluid"> 
                <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
                    <span class="top-title"><?php echo wp_kses_post($settings['section_subtitle']); ?></span>
                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                </div>
                <?php if($settings['service_item_style'] == 'grid') : ?>
                    <div class="row justify-content-center">
                <?php elseif($settings['service_item_style'] == 'slider') : ?>
                    <div class="service-slider owl-carousel owl-theme">
                <?php endif; ?>
                    <?php while($post_array->have_posts()): $post_array->the_post(); ?>
                    <?php if($settings['service_item_style'] == 'grid') : ?>
                        <div data-aos="fade-up" data-aos-duration="1600" class="<?php echo esc_attr( $service_column ); ?>">
                    <?php elseif($settings['service_item_style'] == 'slider') : ?>
                        <div class="service-wrap">
                    <?php endif; ?>
                        <div class="single-service">
                            <?php if( get_the_post_thumbnail_url() != '' ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img class="service-img" src="<?php echo get_the_post_thumbnail_url(get_the_ID() ); ?>" alt="Image">
                                </a>
                            <?php endif; ?>
                            <div class="service-content">
                                <h4 class="service-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                <a class="arrow" href="<?php the_permalink(); ?>">
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
                
                <!-- Pagination Part Start -->
                <?php if( $settings['show_pagination'] == 'yes' && $settings['service_item_style'] == 'grid' ): ?>
                    <div data-aos="fade-up" data-aos-duration="1600" class="col-lg-12 col-md-12">
                        <div class="pagination-area star-blog-pagination text-center">
                            <div class="nav-links">
                                <?php 
                                    $star_addons_paginate = 999999999;
                                    echo paginate_links( array(
                                        'base' => str_replace( $star_addons_paginate, '%#%', get_pagenum_link( $star_addons_paginate ) ),
                                        'format' => '?paged=%#%',
                                        'current' => max(1, get_query_var('paged') ),
                                        'total' => $post_array->max_num_pages,
                                        'prev_text' => sprintf('<i class="bx bx-chevrons-left"></i>'),
                                        'next_text' => sprintf('<i class="bx bx-chevrons-right"></i>')
                                    ) ); 
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Pagination Part End -->

                <!-- Service Button Link -->
                <?php if($settings['btn_link_type'] == '2') : 
                    $target = $settings['btn_ex_link']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $settings['btn_ex_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                elseif($settings['btn_link_type'] == '1') : 
                    $target = '';
                    $nofollow = '';
                endif;

                // Get Button Link
                if($settings['show_btn'] == 'yes') {
                    if($settings['btn_link_type'] == 1) {
                        $btn_link = get_page_link( $settings['btn_link_to_page'] );
                    } else {
                        $btn_link = $settings['btn_ex_link']['url'];
                    }
                } ?>

                <!-- Button Part Start --> 
                <?php if( $settings['show_btn'] == 'yes' && $settings['button_text'] != '' ): ?>
                    <div data-aos="fade-up" data-aos-duration="1200" class="btn-area text-center">
                        <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-default-btn no-icon"><?php echo esc_html( $settings['button_text'] ); ?></a>
                    </div>
                <?php endif; ?>
                <!-- Button Part End --> 

            </div>
        </div>
        <!-- END SERVICES AREA -->

    <?php

	}

}
