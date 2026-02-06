<?php

/**
 * Elementor Header Widget.
 *
 * @since 1.2
 */

class Elementor_Header_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'header';
    }

    public function get_title() {
        return __( 'Header', 'star-addons-for-elementor' );
    }

    public function get_icon() {
        return 'eicon-header';
    }

    public function get_categories() {
        return [ 'star-elements' ];
    }

    protected function _register_controls() {

        // Header
        $this->start_controls_section(
            'header_content',
            [
                'label' => __( 'Header', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'enable_header',
            [
                'label' => __( 'Enable Header', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => __( 'Yes', 'star-addons-for-elementor' ),
                    '2' => __( 'No', 'star-addons-for-elementor' )
                ],
                'default' => '1'
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
                'default' => 'yes',
                'condition' => [
                    'enable_header' => '1'
                ]
            ]
        );
        
        $this->add_control(
            'header_btn_text',
            [
                'label' => __( 'Button Text', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get Started', 'star-addons-for-elementor' ),
                'condition' => [
                    'enable_header' => '1',
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
                    'enable_header' => '1',
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'header_btn_icon',
            [
                'label' => __( 'Button Icon', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-arrow-alt-circle-right',
                    'library' => 'regular'
                ],
                'show_label' => true,
                'condition' => [
                    'enable_header' => '1',
                    'show_btn' => 'yes',
                    'want_to_add_icon' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'header_btn_link_type',
            [
                'label' => esc_html__( 'Button Link Type', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    '1'  => esc_html__( 'Link To Page', 'star-addons-for-elementor' ),
                    '2' => esc_html__( 'External Link', 'star-addons-for-elementor' )
                ], 
                'default' => '2',
                'condition' => [
                    'enable_header' => '1',
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'header_btn_link_to_page',
            [
                'label' => esc_html__( 'Button Link Page', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options' => star_addons_get_page_as_list(),
                'condition' => [
                    'enable_header' => '1',
                    'show_btn' => 'yes',
                    'header_btn_link_type' => '1'
                ]
            ]
        );

        $this->add_control(
            'header_btn_link',
            [
                'label'=> esc_html__('Button External Link', 'star-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true
                ],
                'condition' => [
                    'enable_header' => '1',
                    'show_btn' => 'yes',
                    'header_btn_link_type' => '2'
                ]
            ]
        );
        
        $this->end_controls_section();

        // Menu
        $this->start_controls_section(
            'menu_content',
            [
                'label' => __( 'Menu', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'select_menu', [
                'label' => __( 'Select Menu', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => star_addons_get_menu_array()
            ]
        );

        $this->end_controls_section();

        // Logo
        $this->start_controls_section(
            'logo_content',
            [
                'label' => __( 'Logo', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'main_logo',
            [
                'label' => __( 'Main Logo', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'show_label' => true

            ]
        );

        $this->add_control(
            'logo_img_height',
            [
                'label' => __( 'Desktop Logo Height', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-nav .navbar-brand img' => 'height: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->add_control(
            'logo_img_width',
            [
                'label' => __( 'Desktop Logo Width', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-nav .navbar-brand img' => 'width: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->add_control(
            'logo_mobile-img_height',
            [
                'label' => __( 'Mobile Logo Height', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-responsive-nav .logo img' => 'height: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->add_control(
            'logo_mobile_img_width',
            [
                'label' => __( 'Mobile Logo Width', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-responsive-nav .logo img' => 'width: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->end_controls_section();

        // Sticky
        $this->start_controls_section(
            'navbar_settings',
            [
                'label' => __( 'Sticky', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'is_sticky',
            [
                'label' => __( 'Sticky', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'star-addons-for-elementor' ),
                'label_off' => __( 'No', 'star-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );
        
        $this->end_controls_section(); 

        // Breadcrumb
        $this->start_controls_section(
            'breadcrumb_settings',
            [
                'label' => __( 'Breadcrumb', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'enable_breadcrumb',
            [
                'label' => __( 'Enable Breadcrumb', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => __( 'Yes', 'star-addons-for-elementor' ),
                    '2' => __( 'No', 'star-addons-for-elementor' )
                ],
                'default' => '1'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'label' => __( 'Background', 'star-addons-for-elementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '.star-page-title-area'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'menu_style',
            [
                'label' => __( 'Menu Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_header' => '1'
                ]
            ]
        );

        $this->add_control(
            'navbar_bg',
            [
                'label' => esc_html__( 'Navbar Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-navbar-area' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'sticky_navbar_bg',
            [
                'label' => esc_html__( 'Sticky Navbar Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-navbar-area.is-sticky' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'navbar_item_color',
            [
                'label' => esc_html__( 'Navbar Item Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.star-nav .navbar .navbar-nav .nav-item a, .star-nav .navbar .navbar-nav .nav-item .dropdown-menu li a' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'navbar_item_hover_active_color',
            [
                'label' => esc_html__( 'Navbar Item Hover/Active Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.star-nav .navbar .navbar-nav .nav-item:hover a, .star-nav .navbar .navbar-nav .nav-item .dropdown-menu li a:hover, .star-nav .navbar .navbar-nav .nav-item .dropdown-menu li a:focus, .star-nav .navbar .navbar-nav .nav-item.active a, .star-nav .navbar .navbar-nav .nav-item .dropdown-menu li.active a, .star-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li.active a, .star-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a' => 'color: {{VALUE}}'
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
                    'enable_header' => '1',
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
                    '{{WRAPPER}} .star-navbar-area .star-primary-btn' => 'background: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-navbar-area .star-primary-btn' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_bg_hover_color',
            [
                'label' => __( 'Button Background Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-navbar-area .star-primary-btn:before' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Button Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-navbar-area .star-primary-btn:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'breadcrumb_style',
            [
                'label' => __( 'Breadcrumb Style', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_breadcrumb' => '1'
                ]
            ]
        );

        $this->add_control(
            'breadcrumb_link_color',
            [
                'label' => __( 'Breadcrumb Link Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-page-title-content ol li a' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'breadcrumb_link_hover_color',
            [
                'label' => __( 'Breadcrumb Link Hover Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-page-title-content ol li a:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['enable_header'] == 1 ) :
            if( $settings['header_btn_link_type'] == 2 ) :
                $target = $settings['header_btn_link']['is_external'] ? ' target="_blank"' : '';
                $nofollow = $settings['header_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
            else:
                $target = '';
                $nofollow = '';
            endif;

            $header_btn_url = '';
            if($settings['header_btn_link_type'] == 1){
                $header_btn_url = get_page_link($settings['header_btn_link_to_page']); 
            } else {
                $header_btn_url = $settings['header_btn_link']['url'];
            }
            
            if( $settings['is_sticky'] == 'yes' ):
                echo __('<style>.star-navbar-area.is-sticky{display:block !important;}</style>');
            else:
                echo __('<style>.star-navbar-area.is-sticky{display:none !important;}</style>');
            endif;

            $main_logo = ! empty($settings['main_logo']['url']) ? $settings['main_logo']['url'] : '';

        endif;
        
        if( $settings['enable_header'] == 1 ) : ?>
        
            <!-- Start Navbar Area -->
            <div class="star-navbar-area">
                <div class="star-responsive-nav">
                    <div class="container-fluid">
                        <?php if( $main_logo != '' ): ?>
                            <div class="star-responsive-menu mean-container">
                        <?php else: ?>
                            <div class="star-responsive-menu mean-container title">
                        <?php endif; ?>
                            <div class="logo">
                                <a href="<?php echo esc_url( home_url( '/' ) );?>">
                                    <?php if( $main_logo != '' ): ?>
                                        <img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                    <?php else: ?>
                                        <h4><?php bloginfo( 'name' ); ?></h4>
                                    <?php endif; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="star-nav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php if( $main_logo != '' ): ?>
                                    <img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                <?php else: ?>
                                    <h2><?php bloginfo( 'name' ); ?></h2>
                                <?php endif; ?>
                            </a>
                            <div class="collapse navbar-collapse mean-menu">
                                <?php
                                    $star_menu = ! empty($settings['select_menu']) ? $settings['select_menu'] : '';
                                    $primary_nav_arg = [
                                        'menu'            => $star_menu,
                                        'container'       => null,
                                        'menu_class'      => 'navbar-nav',
                                        'depth'           => 4,
                                        'walker'          => new Star_Addons_Bootstrap_Navwalker(),
                                        'fallback_cb'     => 'Star_Addons_Bootstrap_Navwalker::fallback',
                                    ];
                            
                                    if( $settings['select_menu'] != '' ) : wp_nav_menu( $primary_nav_arg ); 
                                    else: 
                                        if( is_user_logged_in() ) {
                                        echo wp_kses_post( '<ul class="navbar-nav"><li class="nav-item"><a href="'.esc_url(home_url()).'/wp-admin/nav-menus.php">Create a menu</a></li></ul>', 'star-addons-for-elementor' );
                                        }
                                        else{
                                        echo wp_kses_post( '<ul class="navbar-nav"><li class="nav-item"><a href="'.esc_url(home_url()).'">Home</a></li></ul>', 'star-addons-for-elementor' );
                                        }
                                    endif;
                                ?>
                                <!-- Button Part Start --> 
                                <?php if( $settings['show_btn'] == 'yes' && $settings['header_btn_text'] != '' ): ?>
                                    <div class="others-option">
                                        <?php if($settings['want_to_add_icon'] == 'yes') : ?>
                                            <a href="<?php echo esc_url($header_btn_url); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-primary-btn">
                                                <?php star_addons_render_icon( $settings, 'icon', 'header_btn_icon' ); ?>
                                                <?php echo esc_html( $settings['header_btn_text'] ); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo esc_url($header_btn_url); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-primary-btn no-icon"><?php echo esc_html( $settings['header_btn_text'] ); ?></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Button Part End -->
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Navbar Area -->

        <?php endif;

        if( $settings['enable_breadcrumb'] == 1 ) : ?>

            <div class="star-page-title-area">
                <div class="container">
                    <div class="star-page-title-content">
                        <h1><?php single_post_title(); ?></h1>
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url( home_url('/') ); ?>"><?php echo esc_html('Home', 'star-addons-for-elementor'); ?></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php single_post_title(); ?>
                            </li>
                          </ol>
                        </nav>
                    </div>
                </div>
                <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_01.png'; ?>" alt="#" class="page_title_sharp_1">
                <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_02.png'; ?>" alt="#" class="page_title_sharp_2 custom-animation2">
                <img src="<?php echo plugin_dir_url( __FILE__ ) . '../public/img/shape_03.png'; ?>" alt="#" class="page_title_sharp_3 custom-animation3">
            </div>

        <?php endif;

    }

}
