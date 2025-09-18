<?php

/**
 * Elementor Product Category Widget.
 *
 * @since 1.0.0
 */

class Elementor_Product_Category_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'product-category';
    }

	public function get_title() {
        return __( 'Product Categories', 'star-addons-for-elementor' );
    }

	public function get_icon() {
        return 'eicon-product-categories';
    }

	public function get_categories() {
        return [ 'star-elements' ];
    }

	protected function register_controls() {

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
                'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
                'default'  => __( 'Our Product Categories', 'star-addons-for-elementor' )
            ]
        );

        $this->add_control(
            'section_desc',
            [
                'label' => __( 'Section Description', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Description', 'star-addons-for-elementor' ),
                'description' => __('This field supports all HTML tag', 'star-addons-for-elementor'),
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'star-addons-for-elementor')
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'category_content',
			[
				'label' => esc_html__( 'Category Content', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
        );

        $this->add_control(
            'category_item_style',
            [
                'label' => __( 'Select Category Style', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'grid' => __( 'Grid', 'star-addons-for-elementor' ),
                    'slider' => __( 'Slider', 'star-addons-for-elementor' )
                ],
                'default' => 'grid'
            ]
        );

        $this->add_control(
            'category_item_column',
            [
                'label' => __( 'Select Category Column', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'column-1'  => __( '1', 'star-addons-for-elementor' ),
                    'columns-2' => __( '2', 'star-addons-for-elementor' ),
                    'columns-3' => __( '3', 'star-addons-for-elementor' ),
                    'columns-4' => __( '4', 'star-addons-for-elementor' ),
                    'columns-5' => __( '5', 'star-addons-for-elementor' )
                ],
                'default' => 'columns-3',
                'condition' => [
                    'category_item_style' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Category Order By', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'DESC'      => __( 'DESC', 'star-addons-for-elementor' ),
                    'ASC'       => __( 'ASC', 'star-addons-for-elementor' )
                ],
                'default' => 'DESC'
            ]
        );

        $this->add_control(
            'count',
            [
                'label' => __( 'Count', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 6
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display(); ?>

        <!-- Category Column Style -->
        <?php if($settings['category_item_style'] == 'grid') : 
            if( $settings['category_item_column'] == 'column-1' ) :
                $category_column = 'cat-col col-lg-12 col-md-6 col-sm-6'; 
            elseif( $settings['category_item_column'] == 'columns-2' ) :
                $category_column = 'cat-col col-lg-6 col-md-6 col-sm-6';
            elseif( $settings['category_item_column'] == 'columns-3' ) :
                $category_column = 'cat-col col-lg-4 col-md-6 col-sm-6';
            elseif( $settings['category_item_column'] == 'columns-4' ) :
                $category_column = 'cat-col col-lg-3 col-md-6 col-sm-6';
            elseif( $settings['category_item_column'] == 'columns-5' ) :
                $category_column = 'cat-col col-lg-2-4 col-md-4 col-sm-6';
            endif; 
        endif;

        if ( ! star_addons_plugin_active( 'woocommerce/woocommerce.php' ) ) {
            if( is_user_logged_in() ):
                if ( file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ) {
                    $wc_notice_title = __( 'Activate WooCommerce', 'star-addons-for-elementor' );
                    $wc_notice_url = self_admin_url('plugins.php');
                }else{
                    $wc_notice_title = __( 'Install WooCommerce', 'star-addons-for-elementor' );
                    $wc_notice_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=woocommerce' ), 'install-plugin_woocommerce' );
                } ?>
                <div class="container-fluid ptb-50">
                    <div class="alert alert-danger" role="alert">
                        <?php if ( file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ) :
                            echo esc_html__( 'Please activate the WooCommerce plugin.', 'star-addons-for-elementor' ); ?> <a href="<?php echo esc_url( $wc_notice_url ); ?>"><?php echo ' ' . esc_attr($wc_notice_title); ?></a>
                        <?php elseif(!file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' )) : 
                            echo esc_html__( 'Please Install the WooCommerce plugin.', 'star-addons-for-elementor' ); ?> <a href="<?php echo esc_url( $wc_notice_url ); ?>"><?php echo ' ' . esc_attr($wc_notice_title); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            endif;
            return;
        } ?>
        
        <!-- Start Category Area -->
        <section class="product-category-area">
            <div class="container-fluid">
                <div class="section-title">
                    <h2><?php echo wp_kses_post($settings['section_title']); ?></h2>
                    <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                </div>

                <?php if($settings['category_item_style'] == 'grid') : ?>
                    <div class="row justify-content-center">
                <?php elseif($settings['category_item_style'] == 'slider') : ?>
                    <div class="category-slider owl-carousel owl-theme">
                <?php endif; ?>

                <?php 
                    $orderby = 'name';
                    $order = $settings['order'];
                    $hide_empty = true;
                    $cat_per_page = $settings['count'];
                    $cat_args = array(
                        'orderby'    => $orderby,
                        'order'      => $order,
                        'hide_empty' => $hide_empty,
                        'number'     => $cat_per_page
                    );

                    $product_categories = get_terms( 'product_cat', $cat_args );

                    if( !empty($product_categories) ){
                        foreach ($product_categories as $key => $category) {

                            $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                            $image = wp_get_attachment_url( $thumbnail_id );
                            if($settings['category_item_style'] == 'grid') : ?>
                            <div class="<?php echo esc_attr( $category_column ); ?>">
                            <?php elseif($settings['category_item_style'] == 'slider') : ?>
                            <div class="category-wrap">
                            <?php endif; 
                            echo wp_kses_post('<div class="single-products-box">');
                            echo wp_kses_post('<div class="image"><a class="d-block" href="'.get_term_link($category).'" >');
                            if($image) : 
                                echo wp_kses_post('<img src="'.$image.'" alt="image" />');
                            else:
                                $placeholder_image = wc_placeholder_img_src();
                                echo wp_kses_post('<img src="'.$placeholder_image.'" alt="image" />');
                            endif;
                            echo wp_kses_post('</a></div>');
                            echo wp_kses_post('<div class="product-name"><h3><a href="'.get_term_link($category).'" >'.$category->name.'</a></h3></div><div class="product-overlay"></div>');
                            echo wp_kses_post('</div>'); ?>
                            </div>

                        <?php }

                    } ?>

                </div>
            </div>
        </section>
        <!-- End Category Area -->

    <?php

	}

}
