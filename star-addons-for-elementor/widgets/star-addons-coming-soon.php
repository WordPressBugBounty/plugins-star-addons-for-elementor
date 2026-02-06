<?php

/**
 * Elementor Coming Soon Widget.
 *
 * @since 1.0.0
 */

class Elementor_Coming_Soon_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'coming-soon';
    }

	public function get_title() {
        return __( 'Coming Soon', 'star-addons-for-elementor' );
    }

	public function get_icon() {
        return 'eicon-date';
    }

	public function get_categories() {
        return [ 'star-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'coming_soon_content',
            [
                'label' => esc_html__( 'Coming Soon Content', 'star-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'coming_soon_img',
            [
                'label' => __( 'Coming Soon Image', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ],
                'show_label' => true
            ]
        );

        $this->add_control(
            'coming_soon_subtitle',
            [
                'label' => __( 'Coming Soon Subtitle', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Subtitle', 'star-addons-for-elementor' ),
                'default'  => __( 'Coming Soon', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'coming_soon_title',
            [
                'label' => __( 'Coming Soon Title', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
                'default'  => __( 'We Are Launching Soon', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'coming_soon_date',
            [
                'label' => esc_html__( 'Coming Soon Date', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
                'default' => 'December 31, 2026 17:00:00'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'coming_soon_bg',
                'label' => __( 'Background', 'star-addons-for-elementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '.coming-soon-area'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'coming_soon_button',
            [
                'label' => esc_html__( 'Coming Soon Button', 'star-addons-for-elementor' ),
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
                'default'   => __('Homepage', 'star-addons-for-elementor'),
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon Type', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'input_type' => 'SELECT',
                'options' => [
                    'general' => __( 'General', 'star-addons-for-elementor' ),
                    'library' => __( 'Library', 'star-addons-for-elementor' ),
                ],
                'default' => 'general',
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_icon1', [
                'label' => __( 'Button Icon', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::ICON,
                'show_label' => true,
                'options' => star_addons_icons(),
                'default' => 'bx bx-paper-plane',
                'condition' => [
                    'icon_type' => 'general',
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_icon2', [
                'label' => __( 'Button Icon', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'show_label' => true,
                'condition' => [
                    'icon_type' => 'library',
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

    }

	protected function render() {

        $settings = $this->get_settings_for_display(); ?>

        <!-- Box Button Link -->
        <?php 
        if($settings['btn_link_type'] == '2') : 
            $target = $settings['btn_ex_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $settings['btn_ex_link']['nofollow'] ? ' rel="nofollow"' : ''; 
        elseif($settings['btn_link_type'] == '1') : 
            $target = '';
            $nofollow = '';
        endif;

        // Get Button Link
        if($settings['show_btn'] == 'yes') {
            if($settings['btn_link_type'] == 1) {
                $btn_link = get_page_link( $settings['btn_link_to_page'] );
            } else {
                $btn_link = $settings['btn_ex_link']['url'];
            }
        } ?>

        <!-- Start Coming Soon Area -->
        <div class="coming-soon-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="coming-soon-content">
                        <?php if( $settings['coming_soon_img']['url'] != '' ): ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                                <img src="<?php echo esc_url( $settings['coming_soon_img']['url'] ); ?>" alt="Image">
                            </a>
                        <?php endif; ?>
                        <span class="subtitle"><?php echo esc_html($settings['coming_soon_subtitle']); ?></span>
                        <h2><?php echo esc_html($settings['coming_soon_title']); ?></h2>
                        <div id="timer" class="flex-wrap d-flex justify-content-center">
                            <div id="days" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="hours" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="minutes" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="seconds" class="align-items-center flex-column d-flex justify-content-center"></div>
                        </div>
                        <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-default-btn icon">
                            <?php if( $settings['icon_type'] == 'general' && $settings['button_icon1'] != '' ) : ?>
                                <i class="<?php echo wp_kses_post( $settings['button_icon1'] ); ?>"></i>
                            <?php elseif( $settings['icon_type'] == 'library' && $settings['button_icon2'] != '' ) : 
                                star_addons_render_icon( $settings, 'icon', 'button_icon2' );
                            endif; ?>
                            <?php echo esc_html( $settings['button_text'] ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Coming Soon Area -->

        <script type="text/javascript">
            /*====================
            Count Time JS
            ======================*/
            function makeTimer() {
                var endTime = new Date("<?php echo esc_html($settings['coming_soon_date']); ?> PDT");          
                var endTime = (Date.parse(endTime)) / 1000;
                var now = new Date();
                var now = (Date.parse(now) / 1000);
                var timeLeft = endTime - now;
                var days = Math.floor(timeLeft / 86400); 
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
                if (hours < "10") { hours = "0" + hours; }
                if (minutes < "10") { minutes = "0" + minutes; }
                if (seconds < "10") { seconds = "0" + seconds; }
                jQuery("#days").html(days + "<span>Days</span>");
                jQuery("#hours").html(hours + "<span>Hours</span>");
                jQuery("#minutes").html(minutes + "<span>Minutes</span>");
                jQuery("#seconds").html(seconds + "<span>Seconds</span>");
            }
            setInterval(function() { makeTimer(); }, 300);
            
        </script>

    <?php

	}

}
