<?php

/**
 * Elementor Slider Widget.
 *
 * @since 1.1
 */

class Elementor_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'slider';
    }

    public function get_title() {
        return __( 'Slider', 'star-addons-for-elementor' );
    }

    public function get_icon() {
        return 'eicon-post-slider';
    }

    public function get_categories() {
        return [ 'star-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'slider_content',
            [
                'label' => esc_html__( 'Slider Content', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slider_subtitle',
            [
                'label' => __( 'Slider Subtitle', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Subtitle', 'star-addons-for-elementor' ),
                'description' => __('This field support all html tag', 'star-addons-for-elementor'),
                'default'  => __( 'Welcome to our versity', 'star-addons-for-elementor' )
            ]
        );

        $repeater->add_control(
            'slider_title',
            [
                'label' => __( 'Slider Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'description' => __('This field support all html tag', 'star-addons-for-elementor'),
                'default'  => __( 'Education is the best key success in life.', 'star-addons-for-elementor' )
            ]
        );

        $repeater->add_control(
            'slider_image',
            [
                'label' => __( 'Slider Image', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ],
                'show_label' => true
            ]
        );

        $repeater->add_control(
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

        $repeater->add_control(
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

        $repeater->add_control(
            'want_to_add_icon',
            [
                'label' => __( 'Want to Add Icon?', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'star-addons-for-elementor' ),
                'label_off' => __( 'No', 'star-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
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

        $repeater->add_control(
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

        $repeater->add_control(
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

        $repeater->add_control(
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

        $this->add_control(
            'slider',
            [
                'label' => __( 'Slider', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __( 'Slider #1', 'star-addons-for-elementor' ),
                        'list_content' => __( 'Slider Content', 'star-addons-for-elementor' )
                    ]
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'slider_style',
            [
                'label' => esc_html__( 'Slider Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'slider_subtitle_color',
            [
                'label' => __( 'Slider Subtitle Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-slider .single-banner-part .banner-iner h5' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'slider_title_color',
            [
                'label' => __( 'Slider Title Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-slider .single-banner-part .banner-iner h2' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __( 'Arrow Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-slider .owl-nav button.owl-next, .star-banner-slider .owl-nav button.owl-prev' => 'background: {{VALUE}};border-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'arrow_bg_hover_color',
            [
                'label' => __( 'Arrow Background Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-slider .owl-nav button.owl-next:hover, .star-banner-slider .owl-nav button.owl-prev:hover' => 'background: {{VALUE}};border-color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_style',
            [
                'label' => __( 'Button Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Button Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-slider .single-banner-part .banner-iner .star-secondary-btn' => 'background: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_border_color',
            [
                'label' => __( 'Button Border Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-slider .single-banner-part .banner-iner .star-secondary-btn' => 'border-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-slider .single-banner-part .banner-iner .star-secondary-btn' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_bg_hover_color',
            [
                'label' => __( 'Button Background Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-slider .single-banner-part .banner-iner .star-secondary-btn:hover' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_border_hover_color',
            [
                'label' => __( 'Button Border Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-slider .single-banner-part .banner-iner .star-secondary-btn:hover' => 'border-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Button Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-banner-slider .single-banner-part .banner-iner .star-secondary-btn:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display(); ?>

        <!-- Start Slider Area -->
        <section class="star-banner-slider owl-carousel">
            <?php foreach (  $settings['slider'] as $item ) { 
                if($item['btn_link_type'] == '2') : 
                    $target = $item['btn_ex_link']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $item['btn_ex_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                elseif($item['btn_link_type'] == '1') : 
                    $target = '';
                    $nofollow = '';
                endif; 

                // Get Button Link
                if($item['btn_link_type'] == 1) {
                    $btn_link = get_page_link( $item['btn_link_to_page'] );
                } else {
                    $btn_link = $item['btn_ex_link']['url'];
                } ?>

            <div class="single-banner-part" style="background-image: url(<?php echo esc_url( $item['slider_image']['url'] ); ?>)">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-8">
                            <div class="banner-iner">
                                <h5><?php echo esc_attr($item['slider_subtitle']); ?></h5>
                                <h2><?php echo esc_attr($item['slider_title']); ?></h2>
                                <!-- Button Part Start --> 
                                <?php if( $item['show_btn'] == 'yes' && $item['button_text'] != '' ): ?>
                                    <?php if($item['want_to_add_icon'] == 'yes') : ?>
                                        <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-secondary-btn">
                                            <?php star_addons_render_icon( $item, 'icon', 'button_icon' ); ?>
                                            <?php echo esc_html( $item['button_text'] ); ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-secondary-btn no-icon"><?php echo esc_html( $item['button_text'] ); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <!-- Button Part End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </section>
        <!-- End Slider Area -->

        <?php

    }

}
