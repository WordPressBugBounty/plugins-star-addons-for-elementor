<?php
/**
 * Elementor Faq Widget.
 *
 * @since 1.0.0
 */

class Elementor_Faq_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'faq';
	}

	public function get_title() {
		return __( 'FAQ', 'star-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-accordion';
	}

	public function get_categories() {
		return [ 'star-elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'faq_section',
			[
				'label' => __( 'FAQ Section', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' => __( 'Section Title', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
				'default'  => __( 'Frequently Asked Questions', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label' => __( 'Section Description', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
				'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ipsum suspendisse.', 'star-addons-for-elementor')
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'faq_content',
			[
				'label' => __( 'FAQ Content', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
            'faq_icon_bg_color',
            [
                'label' => __( 'Icon Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.faq-accordion .accordion .accordion-title i' => 'background-color: {{VALUE}}'
                ]
            ]
        );

		$this->add_control(
            'faq_title_bg_color',
            [
                'label' => __( 'Title Background Color', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.faq-accordion .accordion .accordion-title' => 'background-color: {{VALUE}}'
                ]
            ]
        );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'single_faq_title_one', [
				'label' => __( 'Title', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
				'default'  => __( 'What do we mean by business?', 'star-addons-for-elementor' )
			]
		);

		$repeater->add_control(
			'single_faq_content_one', [
				'label' => __( 'Description', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
				'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
				'default'  => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, beatae, similique vel officia laboriosam autem aperiam distinctio fugiat a repudiandae nihil quis nesciunt hic sit. Facere animi voluptate nobis asperiores quis nesciunt hic sit. Facere animi voluptate nobis ipsum dolor sit amet, consectetur adipisicing elit. Aut, beatae, similique vel officia laboriosam laboriosam autem aperiam distinctio fugiat.', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'single_faq_one',
			[
				'label' => __( 'Single FAQ One', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Single FAQ #1', 'star-addons-for-elementor' ),
						'list_content' => __( 'SingleFAQ Content', 'star-addons-for-elementor' ),
					],
				
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'single_faq_title_two', [
				'label' => __( 'Title', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Title', 'star-addons-for-elementor' ),
				'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
				'default'  => __( 'Where should my business be involved?', 'star-addons-for-elementor' )
			]
		);

		$repeater->add_control(
			'single_faq_content_two', [
				'label' => __( 'Description', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
				'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
				'default'  => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, beatae, similique vel officia laboriosam autem aperiam distinctio fugiat a repudiandae nihil quis nesciunt hic sit. Facere animi voluptate nobis asperiores quis nesciunt hic sit. Facere animi voluptate nobis ipsum dolor sit amet, consectetur adipisicing elit. Aut, beatae, similique vel officia laboriosam laboriosam autem aperiam distinctio fugiat.', 'star-addons-for-elementor' )
			]
		);

		$this->add_control(
			'single_faq_two',
			[
				'label' => __( 'Single FAQ Two', 'star-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Single FAQ #1', 'star-addons-for-elementor' ),
						'list_content' => __( 'SingleFAQ Content', 'star-addons-for-elementor' ),
					],
				
				],
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Accordion widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.5
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display(); ?>

		<!-- START FAQ AREA -->
        <section class="accordion-area ptb-20">
            <div class="container-fluid">
                <div class="section-title" data-aos="fade-up"
                        data-aos-duration="1200">
                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                </div>
				
                <div class="row align-items-center">
                    <div class="full-col col-xl-6 col-lg-12">
                        <div class="faq-accordion" data-aos="fade-up"
                        data-aos-duration="1600">
                            <ul class="accordion">
                            	<?php foreach ( $settings['single_faq_one'] as $item ) : ?>
	                                <li class="accordion-item one">
	                                    <a class="accordion-title" href="javascript:void(0)">
	                                        <i class="bx bx-plus"></i>
	                                        <?php echo wp_kses_post($item['single_faq_title_one']); ?>
	                                    </a>
	                                    <p class="accordion-content">
	                                        <?php echo wp_kses_post($item['single_faq_content_one']); ?>
	                                    </p>
	                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="full-col col-xl-6 col-lg-12">
                        <div class="faq-accordion" data-aos="fade-up"
                        data-aos-duration="2000">
                            <ul class="accordion">
                            	<?php foreach ( $settings['single_faq_two'] as $item ) : ?>
	                                <li class="accordion-item">
	                                    <a class="accordion-title" href="javascript:void(0)">
	                                        <i class="bx bx-plus"></i>
	                                        <?php echo wp_kses_post($item['single_faq_title_two']); ?>
	                                    </a>
	                                    <p class="accordion-content">
	                                        <?php echo wp_kses_post($item['single_faq_content_two']); ?>
	                                    </p>
	                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
		</section>
		<!-- END FAQ AREA -->

    <?php 

    }

}
