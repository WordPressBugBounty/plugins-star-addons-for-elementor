<?php

/**
 * Elementor LP Course Widget.
 *
 * @since 1.1
 */

class Elementor_LP_Course_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'lp-courses';
    }

    public function get_title() {
        return __( 'LearnPress Courses', 'star-addons-for-elementor' );
    }

    public function get_icon() {
        return 'eicon-image-box';
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
                'default'  => __( 'Our Featured Courses', 'star-addons-for-elementor' )
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
                'selector' => '.star-lp-courses-area'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'course_content',
            [
                'label' => esc_html__( 'Course Content', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'course_item_style',
            [
                'label' => __( 'Select Course Style', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'grid' => __( 'Grid', 'star-addons-for-elementor' ),
                    'list' => __( 'List', 'star-addons-for-elementor' )
                ],
                'default' => 'grid'
            ]
        );

        $this->add_control(
            'course_item_column',
            [
                'label' => __( 'Select Course Column', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'column-1' => __( '1', 'star-addons-for-elementor' ),
                    'columns-2' => __( '2', 'star-addons-for-elementor' ),
                    'columns-3' => __( '3', 'star-addons-for-elementor' ),
                    'columns-4' => __( '4', 'star-addons-for-elementor' )
                ],
                'default' => 'columns-3',
                'condition' => [
                    'course_item_style' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'cat_name',
            [
                'label' => __( 'Choose Category', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => star_addons_get_courses_cat_list()
            ]
        );

        $this->add_control(
            'filter',
            [
                'label' => __( 'Courses Filter By', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'recent' => __( 'Recent', 'star-addons-for-elementor' ),
                    'featured' => __( 'Featured', 'star-addons-for-elementor' )
                ],
                'default' => 'recent'
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Courses Order By', 'star-addons-for-elementor' ),
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
            'instructor_label',
            [
                'label'     => esc_html__( 'Instructor Label', 'star-addons-for-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Instructor', 'star-addons-for-elementor')
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
                'default'   => __('View All Courses', 'star-addons-for-elementor'),
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
                    '{{WRAPPER}} .star-lp-courses-area .section-title h2' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'section_desc_color',
            [
                'label' => __( 'Section Description Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .section-title p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'course_style',
            [
                'label' => esc_html__( 'Course Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'course_box_bg_color',
            [
                'label' => __( 'Course Box Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .lp-archive-courses .learn-press-courses[data-layout="grid"] .course .course-item .course-content, .star-lp-courses-area .lp-archive-courses .learn-press-courses[data-layout="list"] .course-item-list .lp_course' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'course_img_height',
            [
                'label' => __( 'Course Image Height', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .lp-archive-courses .learn-press-courses .course .course-item .course-wrap-thumbnail .course-thumbnail .thumbnail img' => 'height: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->add_control(
            'course_img_width',
            [
                'label' => __( 'Course Image Width', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .lp-archive-courses .learn-press-courses .course .course-item .course-wrap-thumbnail .course-thumbnail .thumbnail img' => 'width: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->add_control(
            'course_category_color',
            [
                'label' => __( 'Course Category Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-categories a' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'course_category_bg_color',
            [
                'label' => __( 'Course Category Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-categories a' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'course_title_color',
            [
                'label' => __( 'Course Title Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-permalink .course-title' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'course_title_hover_color',
            [
                'label' => __( 'Course Title Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-permalink .course-title:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'course_instructor_color',
            [
                'label' => __( 'Course Instructor Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-info .course-footer-instructor a' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .star-lp-courses-area .star-default-btn::before' => 'background: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .star-default-btn' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_border_color',
            [
                'label' => __( 'Button Border Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .star-default-btn' => 'border-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Button Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .star-default-btn:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_border_hover_color',
            [
                'label' => __( 'Button Border Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-courses-area .star-default-btn:hover' => 'border-color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display(); ?>

        <!-- Course Column Style -->
        <?php if($settings['course_item_style'] == 'grid') : 
            if( $settings['course_item_column'] == 'column-1' ) :
                $course_column = 'col-lg-12 col-md-6 col-sm-12'; 
            elseif( $settings['course_item_column'] == 'columns-2' ) :
                $course_column = 'col-lg-6 col-md-6 col-sm-12';
            elseif( $settings['course_item_column'] == 'columns-3' ) :
                $course_column = 'col-lg-4 col-md-6 col-sm-12';
            elseif( $settings['course_item_column'] == 'columns-4' ) :
                $course_column = 'col-lg-3 col-md-6 col-sm-12';
            endif; 
        endif; ?>
        
        <!-- Course Button Link -->
        <?php if($settings['btn_link_type'] == '2') : 
            $target = $settings['btn_ex_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $settings['btn_ex_link']['nofollow'] ? ' rel="nofollow"' : ''; 
        elseif($settings['btn_link_type'] == '1') : 
            $target = '';
            $nofollow = '';
        endif; 

        if ( ! star_addons_plugin_active( 'learnpress/learnpress.php' ) ) {
            if( is_user_logged_in() ):
                if ( file_exists( WP_PLUGIN_DIR . '/learnpress/learnpress.php' ) ) {
                    $lp_notice_title = __( 'Activate LearnPress', 'star-addons-for-elementor' );
                    $lp_notice_url = self_admin_url('plugins.php');
                }else{
                    $lp_notice_title = __( 'Install LearnPress', 'star-addons-for-elementor' );
                    $lp_notice_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=learnpress' ), 'install-plugin_learnpress' );
                } ?>
                <div class="container-fluid ptb-50">
                    <div class="alert alert-danger" role="alert">
                        <?php if ( file_exists( WP_PLUGIN_DIR . '/learnpress/learnpress.php' ) ) :
                            echo esc_html__( 'Please activate the LearnPress plugin.', 'star-addons-for-elementor' ); ?> <a href="<?php echo esc_url( $lp_notice_url ); ?>"><?php echo ' ' . esc_attr($lp_notice_title); ?></a>
                        <?php elseif(!file_exists( WP_PLUGIN_DIR . '/learnpress/learnpress.php' )) : 
                            echo esc_html__( 'Please Install the LearnPress plugin.', 'star-addons-for-elementor' ); ?> <a href="<?php echo esc_url( $lp_notice_url ); ?>"><?php echo ' ' . esc_attr($lp_notice_title); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            endif;
            return;
        }

        // Course Query
        if( $settings['cat_name'] != '' ) {
            if( $settings['filter'] == 'featured' ):
                $args = array(
                    'post_type'         => 'lp_course',
                    'posts_per_page'    => $settings['count'],
                    'order'             => $settings['order'],
                   //'meta_key'          => '_thumbnail_id',
                    'tax_query'         => array(
                        array(
                            'taxonomy'      => 'course_category',
                            'field'         => 'slug',
                            'terms'         => $settings['cat_name'],
                            'hide_empty'    => false
                        )
                    ),
                    'ignore_sticky_posts' => true,
                    'meta_query'          => array(
                        array(
                            'key'   => '_lp_featured',
                            'value' => 'yes'
                        )
                    )
                );
            else:
                $args = array(
                    'post_type'         => 'lp_course',
                    'posts_per_page'    => $settings['count'],
                    'order'             => $settings['order'],
                    //'meta_key'          => '_thumbnail_id',
                    'tax_query'         => array(
                        array(
                            'taxonomy'      => 'course_category',
                            'field'         => 'slug',
                            'terms'         => $settings['cat_name'],
                            'hide_empty'    => false
                        )
                    )
                );
            endif;
        }

        else {
            if( $settings['filter'] == 'featured' ):
                $args = array(
                    'post_type'         => 'lp_course',
                    'posts_per_page'    => $settings['count'],
                    'order'             => $settings['order'],
                    //'meta_key'          => '_thumbnail_id',
                    'ignore_sticky_posts' => true,
                    'meta_query'          => array(
                        array(
                            'key'   => '_lp_featured',
                            'value' => 'yes'
                        )
                    )
                );
            else:
                $args = array(
                    'post_type'         => 'lp_course',
                    'posts_per_page'    => $settings['count'],
                    'order'             => $settings['order'],
                    //'meta_key'          => '_thumbnail_id'
                );
            endif;
        }

        $post_array = new \WP_Query( $args );

        // Get Button Link
        if($settings['btn_link_type'] == 1) {
            $btn_link = get_page_link( $settings['btn_link_to_page'] );
        } else {
            $btn_link = $settings['btn_ex_link']['url'];
        }

        // Inline Editing
        $this-> add_inline_editing_attributes('title', 'none'); ?>
        
        <div class="star-lp-courses-area ptb-70">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- Courses Part Start --> 
                    <div id="content" class="site-content">
                        <div class="lp-archive-courses">
                            <div class="lp-content-area">
                                <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
                                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
                                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                                </div>
                                <div class="learn-press-courses" data-layout="<?php echo esc_attr($settings['course_item_style']); ?>">
                                    <?php while($post_array->have_posts()): $post_array->the_post(); ?>
                                    <?php if($settings['course_item_style'] == 'grid') : ?> <div class="<?php echo esc_attr($course_column); ?>">
                                    <?php elseif($settings['course_item_style'] == 'list') : ?> 
                                    <div class="course-item-list">
                                    <?php endif; ?>    
                                        <div data-aos="fade-up" data-aos-duration="1200" class="lp_course type-lp_course status-publish has-post-thumbnail hentry course">
                                            <div class="course-item">
                                                <div class="course-wrap-thumbnail">
                                                    <div class="course-thumbnail">
                                                        <a href="<?php the_permalink(); ?>" bis_skin_checked="1">
                                                            <div class="thumbnail-preview">
                                                                <div class="thumbnail">
                                                                    <div class="centered">
                                                                        <?php if( has_post_thumbnail()) :
                                                                            the_post_thumbnail();
                                                                        endif; ?>      
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div><!-- Start Course Content --> 
                                                <div class="course-content">
                                                    <div class="course-categories">
                                                        <?php
                                                        if ( ! get_the_terms( get_the_ID(), 'course_category' ) ) {
                                                            esc_html_e( '', 'learnpress' );
                                                        } else {
                                                            echo get_the_term_list( get_the_ID(), 'course_category', '' );
                                                        }
                                                        ?>   
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>" class="course-permalink"><h3 class="course-title"><?php the_title(); ?></h3>
                                                    </a>
                                                    <?php 
                                                    $user = LP_Global::user();
                                                    $course = LP_Global::course();
                                                    $price = $course->get_price_html(); ?>
                                                    <div class="course-info">
                                                        <div class="course-excerpt"><?php global $post; echo wp_trim_words( $post->post_content, 25 ); ?></div>
                                                        <div class="course-footer">
                                                            <div class="course-footer-instructor">
                                                                <?php echo esc_html( $settings['instructor_label'] ); ?>: <span><?php echo wp_kses_post( $course->get_instructor_html() ); ?></span>
                                                            </div>
                                                            <?php if ( $price ) { ?>
                                                                <div class="course-price">
                                                                    <?php if ( $course->has_sale_price() ) : ?>
                                                                        <span class="price">
                                                                            <del><?php echo $course->get_origin_price_html(); ?></del>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                    <span class="price">
                                                                        <?php echo wp_kses_post($price); ?>
                                                                    </span>
                                                                </div>
                                                            <?php } ?>
                                                        </div> 
                                                    </div>
                                                </div> 
                                                <!-- End Course Content --> 
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                    <?php wp_reset_query(); ?>
                                </ul>
                            </div>
                        </div>
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_04.png'; ?>" alt="#" class="course_sharp_1 custom-animation1">
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_05.png'; ?>" alt="#" class="course_sharp_2 custom-animation2">
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_06.png'; ?>" alt="#" class="course_sharp_3 custom-animation3">
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_03.png'; ?>" alt="#" class="course_sharp_4 custom-animation4">
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_05.png'; ?>" alt="#" class="course_sharp_5 custom-animation5">
                    </div>
                    <!-- Courses Part End -->
                    
                    <!-- Button Part Start --> 
                    <?php if( $settings['show_btn'] == 'yes' && $settings['button_text'] != '' ): ?>
                        <div data-aos="fade-up" data-aos-duration="1200" class="row justify-content-center">
                            <div class="star-content-center">
                                <?php if($settings['want_to_add_icon'] == 'yes') : ?>
                                    <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-default-btn">
                                        <?php star_addons_render_icon( $settings, 'icon', 'button_icon' ); ?>
                                        <?php echo esc_html( $settings['button_text'] ); ?></a>
                                <?php else: ?>
                                    <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-default-btn no-icon"><?php echo esc_html( $settings['button_text'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Button Part End --> 

                </div>
            </div>
        </div>

    <?php

    }

}
