<?php

/**
 * Elementor Banner Widget.
 *
 * @since 1.1
 */

class Elementor_Banner_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'banner';
    }

    public function get_title() {
        return __( 'Banner', 'star-addons-for-elementor' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return [ 'star-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'banner_content',
            [
                'label' => esc_html__( 'Banner Content', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'select_banner_style',
            [
                'label' => __( 'Banner Style', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style-01' => __( 'Style 01', 'star-addons-for-elementor' ),
                    'style-02' => __( 'Style 02', 'star-addons-for-elementor' )
                ],
                'default' => 'style-01'
            ]
        );

        $this->add_control(
            'banner_title',
            [
                'label' => __( 'Banner Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'description' => __('This field support all html tag', 'star-addons-for-elementor'),
                'default'  => __( 'Education is the best key success in life.', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'banner_desc',
            [
                'label' => __( 'Banner Description', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
                'description' => __('This field support all html tag', 'star-addons-for-elementor'),
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'star-addons-for-elementor')
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'banner_background',
                'label' => __( 'Background', 'star-addons-for-elementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .star-banner-area, {{WRAPPER}} .preview-banner-area'
            ]
        );

        $this->add_control(
            'banner_img',
            [
                'label' => __( 'Banner Image', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ],
                'show_label' => true,
                'condition' => [
                    'select_banner_style' => 'style-01'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'select_banner_style' => 'style-01'
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
            'banner_style',
            [
                'label' => esc_html__( 'Banner Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'banner_title_color',
            [
                'label' => __( 'Banner Title Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-area .star-banner-content h1, {{WRAPPER}} .preview-banner-area .inner-title h2' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'banner_desc_color',
            [
                'label' => __( 'Banner Description Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-area .star-banner-content p, {{WRAPPER}} .preview-banner-area .inner-title p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'banner_img_height',
            [
                'label' => __( 'Banner Image Height', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-banner-area .star-banner-image img' => 'height: {{SIZE}}{{UNIT}}'
                ],
                'condition' => [
                    'select_banner_style' => 'style-01'
                ]
            ]
        );

        $this->add_control(
            'banner_img_width',
            [
                'label' => __( 'Banner Image Width', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-banner-area .star-banner-image img' => 'width: {{SIZE}}{{UNIT}}'
                ],
                'condition' => [
                    'select_banner_style' => 'style-01'
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
                    '{{WRAPPER}} .star-primary-btn' => 'background: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-primary-btn' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_bg_hover_color',
            [
                'label' => __( 'Button Background Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-primary-btn:before' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Button Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-primary-btn:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display(); ?>

        <!-- Course Button Link -->
        <?php if($settings['btn_link_type'] == '2') : 
            $target = $settings['btn_ex_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $settings['btn_ex_link']['nofollow'] ? ' rel="nofollow"' : ''; 
        elseif($settings['btn_link_type'] == '1') : 
            $target = '';
            $nofollow = '';
        endif; 

        // Get Button Link
        if($settings['btn_link_type'] == 1) {
            $btn_link = get_page_link( $settings['btn_link_to_page'] );
        } else {
            $btn_link = $settings['btn_ex_link']['url'];
        }
        
        if($settings['select_banner_style'] == 'style-01') : ?>

            <!-- Start Banner Area -->
            <div class="star-banner-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div data-aos="fade-up" data-aos-duration="1200" class="col-lg-6 col-md-12">
                            <div class="star-banner-content">
                                <h1><?php echo wp_kses_post($settings['banner_title']); ?></h1>
                                <p><?php echo wp_kses_post($settings['banner_desc']); ?></p>
                                <!-- Button Part Start --> 
                                <?php if( $settings['show_btn'] == 'yes' && $settings['button_text'] != '' ): ?>
                                    <?php if($settings['want_to_add_icon'] == 'yes') : ?>
                                        <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-primary-btn">
                                            <?php star_addons_render_icon( $settings, 'icon', 'button_icon' ); ?>
                                            <?php echo esc_html( $settings['button_text'] ); ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-primary-btn no-icon"><?php echo esc_html( $settings['button_text'] ); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <!-- Button Part End -->
                            </div>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="1600" class="col-lg-6 col-md-12">
                            <div class="star-banner-image">
                                <?php if( ! $settings['banner_img']['url'] == '' ) : ?>
                                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'banner_img' ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Area -->

        <?php elseif($settings['select_banner_style'] == 'style-02') : ?>

            <div class="preview-banner-area ptb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="inner text-center">
                                <div class="inner-title">
                                    <h2 data-aos="fade-up" data-aos-duration="1200">
                                        <?php echo wp_kses_post($settings['banner_title']); ?>
                                    </h2>
                                    <p data-aos="fade-up" data-aos-duration="1600"><?php echo wp_kses_post($settings['banner_desc']); ?></p>
                                </div>
                                <div class="btn-box" data-aos="fade-up" data-aos-duration="2000">

                                    <!-- Button Part Start --> 
                                    <?php if( $settings['show_btn'] == 'yes' && $settings['button_text'] != '' ): ?>
                                        <?php if($settings['want_to_add_icon'] == 'yes') : ?>
                                            <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-primary-btn">
                                                <?php star_addons_render_icon( $settings, 'icon', 'button_icon' ); ?>
                                                <?php echo esc_html( $settings['button_text'] ); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-primary-btn no-icon"><?php echo esc_html( $settings['button_text'] ); ?></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <!-- Button Part End -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif;

    }

}
