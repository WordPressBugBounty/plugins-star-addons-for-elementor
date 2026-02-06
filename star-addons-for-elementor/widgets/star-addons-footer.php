<?php

/**
 * Elementor Footer Widget.
 *
 * @since 1.2
 */

class Elementor_Footer_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'footer';
    }

    public function get_title() {
        return __( 'Footer', 'star-addons-for-elementor' );
    }

    public function get_icon() {
        return 'eicon-footer';
    }

    public function get_categories() {
        return [ 'star-elements' ];
    }

    protected function _register_controls() {

        // Footer
        $this->start_controls_section(
            'footer_settings',
            [
                'label' => __( 'Footer', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'enable_footer',
            [
                'label' => __( 'Enable Footer Area', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => __( 'Yes', 'star-addons-for-elementor' ),
                    '2' => __( 'No', 'star-addons-for-elementor' )
                ],
                'default' => '1'
            ]
        );

        $this->add_control(
            'enable_copyright',
            [
                'label' => __( 'Enable Copyright Area', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => __( 'Yes', 'star-addons-for-elementor' ),
                    '2' => __( 'No', 'star-addons-for-elementor' )
                ],
                'default' => '1'
            ]
        );

        $this->add_control(
            'enable_go_top',
            [
                'label' => __( 'Enable Go To Top', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => __( 'Yes', 'star-addons-for-elementor' ),
                    '2' => __( 'No', 'star-addons-for-elementor' )
                ],
                'default' => '1'
            ]
        );
        
        $this->end_controls_section();

        // Copyright
        $this->start_controls_section(
            'copyright_settings',
            [
                'label' => __( 'Copyright', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'copyright_text',
            [
                'label' => __( 'Copyright Text', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'input_type' => 'WYSIWYG',
                'default' => __( 'Copyright @ 2025 Star Addons is Proudly Powered by MhrTheme.', 'star-addons-for-elementor')
            ]
        );

        $this->end_controls_section();

        // Link
        $this->start_controls_section(
            'link_settings',
            [
                'label' => __( 'Link', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'footer_link',
            [
                'label' => __( 'Footer Link Enable?', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'star-addons-for-elementor' ),
                'label_off' => __( 'No', 'star-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'first_link_text',
            [
                'label' => __( 'First Link Text', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'default'  => __( 'Privacy Policy', 'star-addons-for-elementor' ),
                'condition' => [
                    'footer_link' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'first_link_url',
            [
                'label' => __( 'First Link URL', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false
                ],
                'condition' => [
                    'footer_link' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'second_link_text',
            [
                'label' => __( 'Second Link Text', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Link', 'star-addons-for-elementor' ),
                'default'  => __( 'Terms & Conditions', 'star-addons-for-elementor' ),
                'condition' => [
                    'footer_link' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'second_link_url',
            [
                'label' => __( 'Second Link URL', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'Link', 'star-addons-for-elementor' ),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false
                ],
                'condition' => [
                    'footer_link' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'footer_style',
            [
                'label' => __( 'Footer Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_footer' => '1'
                ]
            ]
        );

        $this->add_control(
            'footer_bg',
            [
                'label' => esc_html__( 'Footer Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.star-footer-area' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'footer_heading_color',
            [
                'label' => esc_html__( 'Footer Heading Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.star-footer-area .single-footer-widget h3' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'footer_link_color',
            [
                'label' => esc_html__( 'Footer Link Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-footer-area .single-footer-widget .menu li a' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'footer_link_hover_color',
            [
                'label' => esc_html__( 'Footer Link Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-footer-area .single-footer-widget .menu li a:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'footer_icon_color',
            [
                'label' => esc_html__( 'Footer Icon Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-footer-area .single-footer-widget .footer-contact-info li i' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'social_style',
            [
                'label' => __( 'Social Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_footer' => '1'
                ]
            ]
        );

        $this->add_control(
            'social_bg',
            [
                'label' => esc_html__( 'Social Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-footer-area .single-footer-widget .social-links li a i' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'social_color',
            [
                'label' => esc_html__( 'Social Icon Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-footer-area .single-footer-widget .social-links li a i' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'social_bg_hover',
            [
                'label' => esc_html__( 'Social Background Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-footer-area .single-footer-widget .social-links li a:hover i' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'social_color_hover',
            [
                'label' => esc_html__( 'Social Icon Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-footer-area .single-footer-widget .social-links li a:hover i' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'copyright_style',
            [
                'label' => __( 'Copyright Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_copyright' => '1'
                ]
            ]
        );

        $this->add_control(
            'copyright_bg',
            [
                'label' => esc_html__( 'Copyright Area Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.star-copyright-area' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'copyright_link_color',
            [
                'label' => esc_html__( 'Copyright Area Link Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-copyright-area p a, .star-copyright-area ul li a' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'copyright_link_hover_color',
            [
                'label' => esc_html__( 'Copyright Area Link Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-copyright-area p a:hover, .star-copyright-area ul li a:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'go_top_style',
            [
                'label' => __( 'Go Top Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_go_top' => '1'
                ]
            ]
        );

        $this->add_control(
            'go_top_bg',
            [
                'label' => esc_html__( 'Go Top Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-go-top-area .go-top' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'go_top_color',
            [
                'label' => esc_html__( 'Go Top Icon Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-go-top-area .go-top' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'go_top_bg_hover',
            [
                'label' => esc_html__( 'Go Top Background Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-go-top-area .go-top:hover' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'go_top_color_hover',
            [
                'label' => esc_html__( 'Go Top Icon Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-go-top-area .go-top:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display(); ?>
        
        <?php if( $settings['enable_footer'] == 1 ) : ?>
            <footer class="star-footer-area ptb-70">
                <div class="container-fluid">
                    <div class="row">
                        <?php dynamic_sidebar('star-addons-footer'); ?>
                    </div>
                </div>
                <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_01.png'; ?>" alt="#" class="footer_sharp_1">
                <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_02.png'; ?>" alt="#" class="footer_sharp_2 custom-animation2">
                <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_03.png'; ?>" alt="#" class="footer_sharp_3 custom-animation3">
            </footer>
        <?php endif; ?>
        
        <?php if( $settings['enable_copyright'] == 1 ) : 

            if($settings['footer_link'] == 'yes') :

            $target1 = $settings['first_link_url']['is_external'] ? ' target="_blank"' : '';
            $nofollow1 = $settings['first_link_url']['nofollow'] ? ' rel="nofollow"' : '';
            $target2 = $settings['second_link_url']['is_external'] ? ' target="_blank"' : '';
            $nofollow2 = $settings['second_link_url']['nofollow'] ? ' rel="nofollow"' : '';

            endif; ?>

            <div class="star-copyright-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 col-sm-12">
                            <p><?php echo wp_kses_post( $settings['copyright_text'] ); ?></p>
                        </div>
                        <?php if($settings['footer_link'] == 'yes') : ?>
                            <div class="col-lg-6 col-md-5 col-sm-12">
                                <ul>
                                    <?php if( $settings['first_link_text'] != '' ) : ?>
                                    <li><a href="<?php echo esc_url($settings['first_link_url']['url']); ?>" <?php echo wp_kses_post( $target1 ); ?> <?php echo wp_kses_post( $nofollow1 ); ?> ><?php echo esc_html( $settings['first_link_text'] ); ?></a></li>
                                    <?php endif; ?>
                                    <?php if( $settings['second_link_text'] != '' ) : ?>
                                    <li><a href="<?php echo esc_url($settings['second_link_url']['url']); ?>" <?php echo wp_kses_post( $target2 ); ?> <?php echo wp_kses_post( $nofollow2 ); ?> ><?php echo esc_html( $settings['second_link_text'] ); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
            
        <?php if( $settings['enable_go_top'] == 1 ) : ?>
            <div class="star-go-top-area">
                <div class="go-top">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </div>
        <?php endif; 

    }

}
