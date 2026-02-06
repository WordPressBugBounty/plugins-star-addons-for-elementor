<?php

/**
 * Elementor Pricing Widget.
 *
 * @since 1.0.0
 */

class Elementor_Pricing_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'pricing';
    }

	public function get_title() {
        return __( 'Pricing', 'star-addons-for-elementor' );
    }

	public function get_icon() {
        return 'eicon-price-table';
    }

	public function get_categories() {
        return [ 'star-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'pricing_section_area',
            [
                'label' => esc_html__( 'Pricing Section Area', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'pricing_top_title',
            [
                'label' => __( 'Pricing Top Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Top Title', 'star-addons-for-elementor' ),
                'default'  => __( 'Choose Plan', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'pricing_title',
            [
                'label' => __( 'Pricing Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'default'  => __( 'Pricing Package', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'pricing_desc',
            [
                'label' => __( 'Pricing Description', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'star-addons-for-elementor')
            ]
        );

        $this->add_control(
            'pricing_bg_color',
            [
                'label' => __( 'Pricing Area Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.pricing-area' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'pricing_tab_area',
            [
                'label' => esc_html__( 'Pricing Tab Area', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'first_tab_text',
            [
                'label' => __( 'First Tab Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'default'  => __( 'Monthly Plan', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'second_tab_text',
            [
                'label' => __( 'Second Tab Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'default'  => __( 'Yearly Plan', 'star-addons-for-elementor' )
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'single_pricing_price_x',
            [
                'label' => __( 'Price', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Price', 'star-addons-for-elementor' ),
                'default' => __( '$19/m', 'star-addons-for-elementor')
            ]
        );

        $repeater->add_control(
            'single_pricing_title_x',
            [
                'label' => __( 'Pricing Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'default' => __( 'Starter', 'star-addons-for-elementor')
            ]
        );

        $repeater->add_control(
            'single_pricing_desc_x',
            [
                'label' => __( 'Pricing Description', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
                'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
                'default' => __( 'Get your services up and running', 'star-addons-for-elementor')
            ]
        );

        $repeater->add_control(
            'single_pricing_feature_x',
            [
                'label' => __( 'Pricing Features', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Features', 'star-addons-for-elementor' ),
                'description' => __('This field supports all HTML tag', 'star-addons-for-elementor')
            ]
        );

        $repeater->add_control(
            'show_btn_x',
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
            'button_text_x',
            [
                'label'     => esc_html__( 'Button Text', 'star-addons-for-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Book Now', 'star-addons-for-elementor'),
                'condition' => [
                    'show_btn_x' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_link_type_x',
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
                    'show_btn_x' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_link_to_page_x',
            [
                'label'         => esc_html__( 'Button Link Page', 'star-addons-for-elementor' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => star_addons_get_page_as_list(),
                'condition' => [
                    'btn_link_type_x' => '1',
                    'show_btn_x' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_ex_link_x',
            [
                'label'     => esc_html__('Button External Link', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true
                ],
                'condition' => [
                    'btn_link_type_x' => '2',
                    'show_btn_x' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pricing_x',
            [
                'label' => __( 'Pricing', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __( 'Pricing #1', 'star-addons-for-elementor' ),
                        'list_content' => __( 'Pricing Content', 'star-addons-for-elementor' )
                    ]
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'single_pricing_price_y',
            [
                'label' => __( 'Price', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Price', 'star-addons-for-elementor' ),
                'default' => __( '$99/y', 'star-addons-for-elementor')
            ]
        );

        $repeater->add_control(
            'single_pricing_title_y',
            [
                'label' => __( 'Pricing Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'default' => __( 'Starter', 'star-addons-for-elementor')
            ]
        );

        $repeater->add_control(
            'single_pricing_desc_y',
            [
                'label' => __( 'Pricing Description', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
                'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
                'default' => __( 'Get your services up and running', 'star-addons-for-elementor')
            ]
        );

        $repeater->add_control(
            'single_pricing_feature_y',
            [
                'label' => __( 'Pricing Features', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Features', 'star-addons-for-elementor' ),
                'description' => __('This field supports all HTML tag', 'star-addons-for-elementor')
            ]
        );

        $repeater->add_control(
            'show_btn_y',
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
            'button_text_y',
            [
                'label'     => esc_html__( 'Button Text', 'star-addons-for-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __('Book Now', 'star-addons-for-elementor'),
                'condition' => [
                    'show_btn_y' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_link_type_y',
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
                    'show_btn_y' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_link_to_page_y',
            [
                'label'         => esc_html__( 'Button Link Page', 'star-addons-for-elementor' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => star_addons_get_page_as_list(),
                'condition' => [
                    'btn_link_type_y' => '1',
                    'show_btn_y' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'btn_ex_link_y',
            [
                'label'     => esc_html__('Button External Link', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true
                ],
                'condition' => [
                    'btn_link_type_y' => '2',
                    'show_btn_y' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pricing_y',
            [
                'label' => __( 'Pricing', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __( 'Pricing #1', 'star-addons-for-elementor' ),
                        'list_content' => __( 'Pricing Content', 'star-addons-for-elementor' )
                    ]
                ]
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display(); ?>
        
        <!-- START PRICING AREA -->
        <section class="pricing-area ptb-20">
            <div class="container-fluid">
                <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
                    <span class="top-title"><?php echo wp_kses_post($settings['pricing_top_title']); ?></span>
                    <h2><?php echo wp_kses_post($settings['pricing_title']); ?></h2>
                    <p><?php echo wp_kses_post($settings['pricing_desc']); ?></p>
                </div>
                <div class="pricing-tabs" data-aos="fade-up"
                        data-aos-duration="1200">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="monthly-plan-tab" data-bs-toggle="tab" href="#monthly-plan" role="tab" aria-controls="monthly-plan" aria-selected="true">
                                <?php echo esc_html($settings['first_tab_text']); ?>       
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="yearly-plan-tab" data-bs-toggle="tab" href="#yearly-plan" role="tab" aria-controls="yearly-plan" aria-selected="false">
                                <?php echo esc_html($settings['second_tab_text']); ?>
                            </a>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="monthly-plan" role="tabpanel">
                            <div class="row justify-content-center">
                                <?php foreach ( $settings['pricing_x'] as $item ) : ?>
                                    <div class="full-col col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                        <div class="single-pricing-item" data-aos="fade-up" data-aos-duration="1200">
                                            <div class="pricing-header">
                                                <h3><?php echo esc_html($item['single_pricing_title_x']); ?></h3>
                                                <p><?php echo wp_kses_post($item['single_pricing_desc_x']); ?></p>
                                            </div>
                                            <div class="price">
                                                <?php echo esc_html($item['single_pricing_price_x']); ?>
                                            </div>                        
                              
                                            <!-- Pricing Button Link -->
                                            <?php if($item['btn_link_type_x'] == '2') : 
                                                $target1 = $item['btn_ex_link_x']['is_external'] ? ' target="_blank"' : '';
                                                $nofollow1 = $item['btn_ex_link_x']['nofollow'] ? ' rel="nofollow"' : ''; 
                                            elseif($item['btn_link_type_x'] == '1') : 
                                                $target1 = '';
                                                $nofollow1 = '';
                                            endif;

                                            // Get Button Link
                                            if($item['show_btn_x'] == 'yes') {
                                                if($item['btn_link_type_x'] == 1) {
                                                    $btn_link1 = get_page_link( $item['btn_link_to_page_x'] );
                                                } else {
                                                    $btn_link1 = $item['btn_ex_link_x']['url'];
                                                }
                                            } ?>
                
                                            <!-- Button Part Start --> 
                                            <?php if( $item['show_btn_x'] == 'yes' && $item['button_text_x'] != '' ): ?>
                                                <a href="<?php echo esc_url($btn_link1); ?>" <?php echo wp_kses_post( $target1 ); ?> <?php echo wp_kses_post( $nofollow1 ); ?> class="link-btn"><?php echo esc_html( $item['button_text_x'] ); ?></a>
                                            <?php endif; ?>
                                            <!-- Button Part End -->

                                            <ul class="pricing-features">
                                                <?php echo wp_kses_post($item['single_pricing_feature_x']); ?>
                                            </ul>
 
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="yearly-plan" role="tabpanel">
                            <div class="row justify-content-center">
                                <?php foreach ( $settings['pricing_y'] as $item ) : ?>
                                    <div class="full-col col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                        <div class="single-pricing-item" data-aos="fade-up" data-aos-duration="1600">
                                            <div class="pricing-header">
                                                <h3><?php echo esc_html($item['single_pricing_title_y']); ?></h3>
                                                <p><?php echo wp_kses_post($item['single_pricing_desc_y']); ?></p>
                                            </div>
                                            <div class="price">
                                                <?php echo esc_html($item['single_pricing_price_y']); ?>
                                            </div>                        
                              
                                            <!-- Pricing Button Link -->
                                            <?php if($item['btn_link_type_y'] == '2') : 
                                                $target2 = $item['btn_ex_link_y']['is_external'] ? ' target="_blank"' : '';
                                                $nofollow2 = $item['btn_ex_link_y']['nofollow'] ? ' rel="nofollow"' : ''; 
                                            elseif($item['btn_link_type_y'] == '1') : 
                                                $target2 = '';
                                                $nofollow2 = '';
                                            endif;

                                            // Get Button Link
                                            if($item['show_btn_y'] == 'yes') {
                                                if($item['btn_link_type_y'] == 1) {
                                                    $btn_link2 = get_page_link( $item['btn_link_to_page_y'] );
                                                } else {
                                                    $btn_link2 = $item['btn_ex_link_y']['url'];
                                                }
                                            } ?>
                
                                            <!-- Button Part Start --> 
                                            <?php if( $item['show_btn_y'] == 'yes' && $item['button_text_y'] != '' ): ?>
                                                <a href="<?php echo esc_url($btn_link2); ?>" <?php echo wp_kses_post( $target2 ); ?> <?php echo wp_kses_post( $nofollow2 ); ?> class="link-btn"><?php echo esc_html( $item['button_text_y'] ); ?></a>
                                            <?php endif; ?>
                                            <!-- Button Part End -->

                                            <ul class="pricing-features">
                                                <?php echo wp_kses_post($item['single_pricing_feature_y']); ?>
                                            </ul>
 
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END PRICING AREA -->
    <?php

	}

}
