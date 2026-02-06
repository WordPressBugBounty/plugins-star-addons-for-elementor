<?php

/**
 * Elementor LP Course Category Widget.
 *
 * @since 1.2
 */

class Elementor_LP_Course_Category_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'lp-course-categories';
    }

    public function get_title() {
        return __( 'LearnPress Categories', 'star-addons-for-elementor' );
    }

    public function get_icon() {
        return 'eicon-product-categories';
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
                'default'  => __( 'All Course Categories', 'star-addons-for-elementor' )
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
                'selector' => '.star-lp-course-category-area'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'categories_content',
            [
                'label' => esc_html__( 'Categories Content', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'categories_item_type',
            [
                'label' => __( 'Categories Type', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'grid'  => __( 'Grid', 'star-addons-for-elementor' ),
                    'slide' => __( 'Slide', 'star-addons-for-elementor' )
                ],
                'default' => 'slide'
            ]
        );

        $this->add_control(
            'categories_item_column',
            [
                'label' => __( 'Select Categories Column', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'column-1' => __( '1', 'star-addons-for-elementor' ),
                    'columns-2' => __( '2', 'star-addons-for-elementor' ),
                    'columns-3' => __( '3', 'star-addons-for-elementor' ),
                    'columns-4' => __( '4', 'star-addons-for-elementor' )
                ],
                'default' => 'columns-3',
                'condition' => [
                    'categories_item_type' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Categories Order By', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'DESC'      => __( 'DESC', 'star-addons-for-elementor' ),
                    'ASC'       => __( 'ASC', 'star-addons-for-elementor' )
                ],
                'default' => 'DESC'
            ]
        );

        $this->add_control(
            'empty',
            [
                'label' => __( 'Hide Empty Category?', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'star-addons-for-elementor' ),
                'label_off' => __( 'No', 'star-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'show_count',
            [
                'label' => __( 'Show Categories Count', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'show'      => __( 'Show', 'star-addons-for-elementor' ),
                    'hide'       => __( 'Hide', 'star-addons-for-elementor' )
                ],
                'default' => 'show'
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
                    '{{WRAPPER}} .star-lp-course-category-area .section-title h2' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'section_desc_color',
            [
                'label' => __( 'Section Description Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-course-category-area .section-title p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'categories_style',
            [
                'label' => esc_html__( 'Categories Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'category_box_bg_color',
            [
                'label' => __( 'Category Box Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-course-category-area .star-lp-single-course-category' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'categories_img_height',
            [
                'label' => __( 'Categories Image Height', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 300
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-lp-course-category-area .star-lp-single-course-category img' => 'height: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->add_control(
            'categories_img_width',
            [
                'label' => __( 'Categories Image Width', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 300
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-lp-course-category-area .star-lp-single-course-category img' => 'width: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->add_control(
            'categories_title_color',
            [
                'label' => __( 'Categories Title Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-course-category-area .star-lp-single-course-category .category-title' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'categories_title_hover_color',
            [
                'label' => __( 'Categories Title Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-lp-course-category-area .star-lp-single-course-category .category-title:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display(); ?>

        <!-- Categories Column Style -->
        <?php if($settings['categories_item_type'] == 'grid') : 
            if( $settings['categories_item_column'] == 'column-1' ) :
                $categories_column = 'col-lg-12 col-md-4 col-sm-6'; 
            elseif( $settings['categories_item_column'] == 'columns-2' ) :
                $categories_column = 'col-lg-6 col-md-4 col-sm-6';
            elseif( $settings['categories_item_column'] == 'columns-3' ) :
                $categories_column = 'col-lg-4 col-md-4 col-sm-6';
            elseif( $settings['categories_item_column'] == 'columns-4' ) :
                $categories_column = 'col-lg-3 col-md-4 col-sm-6';
            endif; 
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

        $star_lp_cat_args = array(
            'taxonomy' => 'course_category',
            'order' => $settings['order'],
            'hide_empty' => $settings['empty']
        );

        $star_lp_cats = get_categories($star_lp_cat_args); ?>

        <div class="star-lp-course-category-area ptb-70">
            <div class="container-fluid">
                <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                </div>
                <?php if($settings['categories_item_type'] == 'grid') : ?>
                    <div class="lp-course-category-slider row">
                <?php elseif($settings['categories_item_type'] == 'slide') : ?>
                    <div class="lp-course-category-slider lp-course-category-slider-new owl-carousel owl-theme">
                <?php endif; ?>
                    <?php foreach($star_lp_cats as $star_lp_cat) :
                        $cat_id = $star_lp_cat->term_id;
                        $image_id = get_term_meta ( $cat_id, 'showcase-taxonomy-image-id', true ); ?>
                        <?php if($settings['categories_item_type'] == 'grid') : ?>
                            <div class="<?php echo esc_attr($categories_column); ?>">
                        <?php elseif($settings['categories_item_type'] == 'slide') : ?>
                            <div>
                        <?php endif; ?>
                            <div data-aos="fade-up" data-aos-duration="1200" class="star-lp-single-course-category">
                                <a href="<?php echo get_category_link( $star_lp_cat->term_id ) ?>">
                                    <?php echo wp_get_attachment_image ( $image_id, 'large' ); ?>
                                    <h4 class="category-title">
                                        <?php echo esc_attr($star_lp_cat->name); 
                                        if($settings['show_count'] == 'show') : 
                                            echo esc_attr( ' '.'('.$star_lp_cat->count.')' );
                                        endif; ?>
                                    </h4>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    <?php

    }

}
