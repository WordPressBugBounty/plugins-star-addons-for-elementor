<?php

/**
 * Elementor Call To Action Widget.
 *
 * @since 1.1
 */

class Elementor_call_to_action_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'star-call-to-action';
    }

    public function get_title() {
        return __( 'Call To Action', 'star-addons-for-elementor' );
    }

    public function get_icon() {
        return 'eicon-notes';
    }

    public function get_categories() {
        return [ 'star-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'call_to_action_content',
            [
                'label' => esc_html__( 'Call To Action Content', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'call_to_action_title',
            [
                'label' => __( 'Call To Action Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'description' => __('This field support all html tag', 'star-addons-for-elementor'),
                'default'  => __( 'Let’s Start Your Business Today!', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'call_to_action_desc',
            [
                'label' => __( 'Call To Action Description', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
                'description' => __('This field support all html tag', 'star-addons-for-elementor'),
                'default' => __( 'Start working with star addons, the impressive design, powerful features, and easy customization make website building faster, easier, and more professional than ever.', 'star-addons-for-elementor')
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'call-to-action_background',
                'label' => __( 'Background', 'star-addons-for-elementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '.call-to-action-area'
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
                'default'   => __('Purchase Now', 'star-addons-for-elementor'),
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
            'call_to_action_style',
            [
                'label' => esc_html__( 'Call To Action Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'call_to_action_title_color',
            [
                'label' => __( 'Call To Action Title Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .call-to-action-area .section-title h2' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'call_to_action_desc_color',
            [
                'label' => __( 'Call To Action Description Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .call-to-action-area .section-title p' => 'color: {{VALUE}}'
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

        <!-- Call To Action Button Link -->
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
        } ?>
        
        <!-- Start Preview Call To Action Area -->
        <section class="call-to-action-area text-center ptb-100" data-aos="fade-up" data-aos-duration="1200">
            <div class="container-fluid">
                <div class="section-title">
                    <h2 data-aos="fade-up" data-aos-duration="1600"><?php echo wp_kses_post($settings['call_to_action_title']); ?></h2>
                    <p data-aos="fade-up" data-aos-duration="2000"><?php echo wp_kses_post($settings['call_to_action_desc']); ?></p>
                </div>
                <div class="btn-box">
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
        </section>
        <!-- End Preview Call To Action Area -->
    
    <?php

    }

}
