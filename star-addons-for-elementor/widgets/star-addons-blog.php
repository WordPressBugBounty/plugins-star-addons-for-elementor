<?php

/**
 * Elementor Blog Widget.
 *
 * @since 1.2
 */

class Elementor_Blog_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'blog';
    }

    public function get_title() {
        return __( 'Blog', 'star-addons-for-elementor' );
    }

    public function get_icon() {
        return 'eicon-post';
    }

    public function get_categories() {
        return [ 'star-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Section Content', 'star-addons-for-elementor' ),
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
                'default'  => __( 'Our Featured Blog', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'section_desc',
            [
                'label' => __( 'Section Description', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
                'description' => __('This field support all html tag', 'star-addons-for-elementor'),
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'star-addons-for-elementor')
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'label' => __( 'Background', 'star-addons-for-elementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '.star-blog-area'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'blog_content',
            [
                'label' => esc_html__( 'Blog Content', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'blog_item_style',
            [
                'label' => __( 'Select Blog Style', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'grid' => __( 'Grid', 'star-addons-for-elementor' ),
                    'slider' => __( 'Slider', 'star-addons-for-elementor' )
                ],
                'default' => 'grid'
            ]
        );

        $this->add_control(
            'blog_sidebar',
            [
                'label' => __( 'Select Blog Sidebar', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'input_type' => 'SELECT',
                'options' => [
                    'no-sidebar' => __( 'No Sidebar', 'star-addons-for-elementor' ),
                    'left-sidebar' => __( 'Left Sidebar', 'star-addons-for-elementor' ),
                    'right-sidebar' => __( 'Right Sidebar', 'star-addons-for-elementor' )
                ],
                'default' => 'no-sidebar'
            ]
        );

        $this->add_control(
            'blog_item_column',
            [
                'label' => __( 'Select Blog Column', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'column-1' => __( '1', 'star-addons-for-elementor' ),
                    'columns-2' => __( '2', 'star-addons-for-elementor' ),
                    'columns-3' => __( '3', 'star-addons-for-elementor' ),
                    'columns-4' => __( '4', 'star-addons-for-elementor' )
                ],
                'default' => 'columns-3',
                'condition' => [
                    'blog_item_style' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'cat_name',
            [
                'label' => __( 'Choose Category', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => star_addons_get_blog_cat_list()
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Blog Order By', 'star-addons-for-elementor' ),
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
            'meta_desc',
            [
                'label' =>  __( 'Post Info', 'star-addons-for-elementor' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1'   => __( 'Show', 'star-addons-for-elementor' ),
                    '2'   => __( 'Hide', 'star-addons-for-elementor' ),
                ],
                'default' => '1',
            ]
        );

        $this->add_control(
            'cat_label',
            [
                'label' => __( 'Category Label', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Category:', 'star-addons-for-elementor'),
                'condition' => [
                    'meta_desc' => '1'
                ]
            ]
        );

        $this->add_control(
            'date_label',
            [
                'label' => __( 'Date Label', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Date:', 'star-addons-for-elementor'),
                'condition' => [
                    'meta_desc' => '1'
                ]
            ]
        );

        $this->add_control(
            'read_more',
            [
                'label' => __( 'Read More Button', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Read More', 'star-addons-for-elementor')
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
                    'blog_item_style' => 'grid'
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
                'default'   => __('View All Posts', 'star-addons-for-elementor'),
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'want_to_add_icon',
            [
                'label' => __( 'Want to Add Icon?', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'star-addons-for-elementor' ),
                'label_off' => __( 'No', 'star-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__( 'Button Icon', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'far fa-arrow-alt-circle-right',
                    'library' => 'regular'
                ],
                'condition' => [
                    'want_to_add_icon' => 'yes',
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

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Section Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'section_title_color',
            [
                'label' => __( 'Section Title Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .section-title h2' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'section_desc_color',
            [
                'label' => __( 'Section Description Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .section-title p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'blog_style',
            [
                'label' => esc_html__( 'Blog Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'blog_img_height',
            [
                'label' => __( 'Blog Image Height', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .star-single-blog img' => 'height: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->add_control(
            'blog_img_width',
            [
                'label' => __( 'Blog Image Width', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .star-single-blog img' => 'width: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->add_control(
            'blog_title_color',
            [
                'label' => __( 'Blog Title Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .star-single-blog .blog-title a' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'blog_title_hover_color',
            [
                'label' => __( 'Blog Title Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .star-single-blog .blog-title a:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'blog_link_color',
            [
                'label' => __( 'Blog Link Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .star-single-blog .star-link-btn, .star-single-blog .post-content .meta li a' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'blog_link_hover_color',
            [
                'label' => __( 'Blog Link Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .star-single-blog .star-link-btn:hover, .star-single-blog .post-content .meta li a:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'blog_slider_dots_color',
            [
                'label' => __( 'Blog Slider Dots Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-slides.owl-theme .owl-dots .owl-dot:hover span, .star-blog-slides.owl-theme .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .star-blog-slides.owl-theme .owl-dots .owl-dot:hover span::before, .star-blog-slides.owl-theme .owl-dots .owl-dot.active span::before' => 'background-color: {{VALUE}}'
                ],
                'condition' => [
                    'blog_item_style' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'blog_pagination_link_color',
            [
                'label' => __( 'Blog Pagination Link Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-pagination .page-numbers.current, .star-blog-pagination .page-numbers:hover' => 'color: {{VALUE}}'
                ],
                'condition' => [
                    'show_pagination' => 'yes',
                    'blog_item_style' => 'grid'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_style',
            [
                'label' => __( 'Button Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Button Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .star-default-btn::before' => 'background: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .star-default-btn' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_border_color',
            [
                'label' => __( 'Button Border Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .star-default-btn' => 'border-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Button Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .star-default-btn:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_border_hover_color',
            [
                'label' => __( 'Button Border Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-blog-area .star-default-btn:hover' => 'border-color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display(); ?>

        <!-- Blog Column Style -->
        <?php if($settings['blog_item_style'] == 'grid') : 
            if( $settings['blog_item_column'] == 'column-1' ) :
                $blog_column = 'col-lg-12 col-md-6 col-sm-12'; 
            elseif( $settings['blog_item_column'] == 'columns-2' ) :
                $blog_column = 'col-lg-6 col-md-6 col-sm-12';
            elseif( $settings['blog_item_column'] == 'columns-3' ) :
                $blog_column = 'col-lg-4 col-md-6 col-sm-12';
            elseif( $settings['blog_item_column'] == 'columns-4' ) :
                $blog_column = 'col-lg-3 col-md-6 col-sm-12';
            endif; 
        endif; ?>
        
        <!-- Blog Button Link -->
        <?php if($settings['btn_link_type'] == '2') : 
            $target = $settings['btn_ex_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $settings['btn_ex_link']['nofollow'] ? ' rel="nofollow"' : ''; 
        elseif($settings['btn_link_type'] == '1') : 
            $target = '';
            $nofollow = '';
        endif; 

        // Blog Query
        if( $settings['cat_name'] != '' ) {
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'post_type'         => 'post',
                'posts_per_page'    => $settings['count'],
                'order'             => $settings['order'],
                'tax_query'         => array(
                    array(
                        'taxonomy'      => 'category',
                        'field'         => 'slug',
                        'terms'         => $settings['cat_name'],
                        'hide_empty'    => false,
                        'paged' => $paged
                    )
                )
            );
        }

        else {
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'post_type'         => 'post',
                'posts_per_page'    => $settings['count'],
                'order'             => $settings['order'],
                'paged' => $paged
            );
        }

        $post_array = new \WP_Query( $args );

        // Get Button Link
        if($settings['show_btn'] == 'yes') {
            if($settings['btn_link_type'] == 1) {
                $btn_link = get_page_link( $settings['btn_link_to_page'] );
            } else {
                $btn_link = $settings['btn_ex_link']['url'];
            }
        }

        // Inline Editing
        $this-> add_inline_editing_attributes('title', 'none'); ?>
        
        <div class="star-blog-area ptb-70">
            <div class="container-fluid"> 
                <?php if($settings['section_title'] != '' && $settings['section_desc'] != '') : ?> 
                    <div data-aos="fade-up" data-aos-duration="800" class="section-title">
                        <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
                        <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                    </div>
                <?php endif; ?>
                <?php if($settings['blog_sidebar'] == 'left-sidebar' || $settings['blog_sidebar'] == 'right-sidebar') : ?>
                    <div class="row justify-content-center">
                <?php else: ?>
                    <div class="">
                <?php endif; ?>
                    <?php if($settings['blog_sidebar'] == 'left-sidebar') : ?> 
                        <div data-aos="fade-up" data-aos-duration="1200" class="col-lg-4 col-md-12">
                            <div class="blog-details-right-area left-sidebar">
                                <?php dynamic_sidebar('star-addons-blog-sidebar'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($settings['blog_sidebar'] == 'left-sidebar' || $settings['blog_sidebar'] == 'right-sidebar') : ?>
                        <div class="col-lg-8 col-md-12">
                    <?php endif; ?>
                    <?php if($settings['blog_item_style'] == 'grid') : ?>
                        <div class="row justify-content-center">
                    <?php elseif($settings['blog_item_style'] == 'slider') : ?>
                        <div class="star-blog-slides owl-carousel owl-theme">
                    <?php endif; ?>
                        <?php while($post_array->have_posts()): $post_array->the_post(); ?>
                        <?php if($settings['blog_item_style'] == 'grid') : ?>
                            <div class="<?php echo esc_attr( $blog_column ); ?>">
                        <?php elseif($settings['blog_item_style'] == 'slider') : ?>
                            <div class="blog-slider">
                        <?php endif; ?>
                            <div data-aos="fade-up" data-aos-duration="1600" class="star-single-blog">
                                <div class="post-image">
                                    <?php if( get_the_post_thumbnail_url() != '' ) : ?>
                                        <a href="<?php the_permalink(); ?>" class="d-block">
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID() ); ?>" alt="Image">
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="post-content">
                                    <?php if($settings['meta_desc'] == '1'): ?>
                                        <ul class="meta">
                                            <li>
                                                <span><?php echo esc_html( $settings['cat_label'] ); ?></span>
                                                <?php
                                                $post_cats = get_the_category();
                                                $count = 0;
                                                if ( $post_cats ) {
                                                    foreach( $post_cats as $cats ) {
                                                        $count++;
                                                        echo wp_kses_post('<a href="'.get_category_link($cats->term_id).'">'.$cats->name.'</a>');
                                                        if( $count > 0 ) break;
                                                    }
                                                }
                                                ?>
                                            </li>
                                             <li>
                                                <span><?php echo esc_html( $settings['date_label'] ); ?></span>
                                                <?php echo get_the_date('M d, Y'); ?>
                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                    <h3 class="blog-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <?php if( $settings['read_more'] != '' ): ?>
                                        <a href="<?php the_permalink(); ?>" class="star-link-btn">
                                            <?php echo esc_html( $settings['read_more'] ); ?>
                                            <i class='fa fa-arrow-right'></i>
                                        </a>
                                    <?php endif; ?>  
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                    </div>

                    <!-- Button Part Start --> 
                    <?php if( $settings['show_btn'] == 'yes' && $settings['button_text'] != '' ): ?>
                        <div data-aos="fade-up" data-aos-duration="1200" class="star-content-center">
                            <?php if($settings['want_to_add_icon'] == 'yes') : ?>
                                <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-default-btn">
                                    <?php star_addons_render_icon( $settings, 'icon', 'button_icon' ); ?>
                                    <?php echo esc_html( $settings['button_text'] ); ?></a>
                            <?php else: ?>
                                <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-default-btn no-icon"><?php echo esc_html( $settings['button_text'] ); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <!-- Button Part End -->
                    
                    <!-- Pagination Part Start -->
                    <?php if( $settings['show_pagination'] == 'yes' && $settings['blog_item_style'] == 'grid' ): ?>
                        <div data-aos="fade-up" data-aos-duration="1200" class="star-blog-pagination justify-content-center">
                            <div class="nav-links">
                                <?php 
                                    $star_paginate = 999999999;
                                    echo paginate_links( array(
                                        'base' => str_replace( $star_paginate, '%#%', get_pagenum_link( $star_paginate ) ),
                                        'format' => '?paged=%#%',
                                        'current' => max(1, get_query_var('paged') ),
                                        'total' => $post_array->max_num_pages,
                                        'prev_text' => '<i class="fa fa-arrow-left"></i>',
                                        'next_text' => '<i class="fa fa-arrow-right"></i>'
                                    ) ); 
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Pagination Part End --> 

                    </div>

                    <?php if($settings['blog_sidebar'] == 'right-sidebar') : ?> 
                        <div data-aos="fade-up" data-aos-duration="1200" class="col-lg-4 col-md-12">
                            <div class="blog-details-right-area right-sidebar">
                                <?php dynamic_sidebar('star-addons-blog-sidebar'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div> 
            </div>
        </div>

    <?php

    }

}
