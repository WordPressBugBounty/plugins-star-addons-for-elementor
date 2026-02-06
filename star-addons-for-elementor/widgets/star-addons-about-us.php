<?php

/**
 * Elementor About Widget.
 *
 * @since 1.2
 */

class Elementor_About_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'about-us';
    }

    public function get_title() {
        return __( 'About Us', 'star-addons-for-elementor' );
    }

    public function get_icon() {
        return 'eicon-info-box';
    }

    public function get_categories() {
        return [ 'star-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'about_content',
            [
                'label' => esc_html__( 'About Content', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'about_top_title',
            [
                'label' => __( 'About Top Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Top Title', 'star-addons-for-elementor' ),
                'description' => __('This field support all html tag', 'star-addons-for-elementor'),
                'default'  => __( 'About Us', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'about_title',
            [
                'label' => __( 'About Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'description' => __('This field support all html tag', 'star-addons-for-elementor'),
                'default'  => __( 'We are Experts Learning Institution', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'about_desc',
            [
                'label' => __( 'About Description', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua.', 'star-addons-for-elementor')
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'about_background',
                'label' => __( 'Background', 'star-addons-for-elementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '.star-about-area'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'about_image',
            [
                'label' => esc_html__( 'About Image', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'about_img',
            [
                'label' => __( 'About Image', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ],
                'show_label' => true
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
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'about_style',
            [
                'label' => esc_html__( 'About Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'about_top_title_color',
            [
                'label' => __( 'About Top Title Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-about-area .star-about-content h3' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'about_title_color',
            [
                'label' => __( 'About Title Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-about-area .star-about-content h1' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'about_desc_color',
            [
                'label' => __( 'About Description Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-about-area .star-about-content p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'about_img_height',
            [
                'label' => __( 'About Image Height', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-about-area .star-about-image img' => 'height: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->add_control(
            'about_img_width',
            [
                'label' => __( 'About Image Width', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-about-area .star-about-image img' => 'width: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display(); ?>
        
        <!-- Start About Area -->
        <div class="star-about-area ptb-70">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div data-aos="fade-up" data-aos-duration="1200" class="col-lg-6 col-md-12">
                        <div class="star-about-content">
                            <h3><?php echo wp_kses_post($settings['about_top_title']); ?></h3>
                            <h1><?php echo wp_kses_post($settings['about_title']); ?></h1>
                            <p><?php echo wp_kses_post($settings['about_desc']); ?></p>
                        </div>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1600" class="col-lg-6 col-md-12">
                        <div class="star-about-image">
                            <?php if( ! $settings['about_img']['url'] == '' ) : ?>
                                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'about_img' ); ?>
                            <?php endif; ?>
                        </div>
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_07.png'; ?>" alt="#" class="custom-animation1 about_bg">
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Area -->

        <?php

    }

}
