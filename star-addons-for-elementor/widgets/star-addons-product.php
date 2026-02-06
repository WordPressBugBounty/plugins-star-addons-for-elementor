<?php

/**
 * Elementor Product Widget.
 *
 * @since 1.2
 */

class Elementor_Product_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'product';
    }

	public function get_title() {
        return __( 'Products', 'star-addons-for-elementor' );
    }

	public function get_icon() {
        return 'eicon-products';
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
                'default'  => __( 'Our Featured Products', 'star-addons-for-elementor' )
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
			'product_content',
			[
				'label' => esc_html__( 'Product Content', 'star-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
        );

        $this->add_control(
            'product_item_style',
            [
                'label' => __( 'Select Product Style', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'grid' => __( 'Grid', 'star-addons-for-elementor' ),
                    'slider' => __( 'Slider', 'star-addons-for-elementor' ),
                    'list' => __( 'List', 'star-addons-for-elementor' )
                ],
                'default' => 'grid'
            ]
        );

        $this->add_control(
            'product_sidebar',
            [
                'label' => __( 'Select Product Sidebar', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'input_type' => 'SELECT',
                'options' => [
                    'no-sidebar' => __( 'No Sidebar', 'star-addons-for-elementor' ),
                    'left-sidebar' => __( 'Left Sidebar', 'star-addons-for-elementor' ),
                    'right-sidebar' => __( 'Right Sidebar', 'star-addons-for-elementor' )
                ],
                'default' => 'no-sidebar'
            ]
        );

        $this->add_control(
            'product_item_column',
            [
                'label' => __( 'Select Product Column', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'column-1' => __( '1', 'star-addons-for-elementor' ),
                    'columns-2' => __( '2', 'star-addons-for-elementor' ),
                    'columns-3' => __( '3', 'star-addons-for-elementor' ),
                    'columns-4' => __( '4', 'star-addons-for-elementor' )
                ],
                'default' => 'columns-3',
                'condition' => [
                    'product_item_style' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'unique_section_ID',
            [
                'label' => __( 'Unique Widget ID', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'products-1 or products-2', 'star-addons-for-elementor' ),
                'description' => __('If you want to show more widgets on the same page.', 'star-addons-for-elementor'),
            ]
        );

        $this->add_control(
            'cat_name',
            [
                'label' => __( 'Choose Category', 'star-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => star_addons_get_products_cat_list()
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Product Order By', 'star-addons-for-elementor' ),
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
                'default' => 3
            ]
        );

        $this->add_control(
            'show_additional_buttons',
            [
                'label' =>  __( 'Show Additional Buttons', 'star-addons-for-elementor' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1'   => __( 'Show', 'star-addons-for-elementor' ),
                    '2'   => __( 'Hide', 'star-addons-for-elementor' )
                ],
                'default' => '1',
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label' =>  __( 'Show Pagination', 'star-addons-for-elementor' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1'   => __( 'Show', 'star-addons-for-elementor' ),
                    '2'   => __( 'Hide', 'star-addons-for-elementor' )
                ],
                'default' => '1',
                'condition' => [
                    'product_item_style' => array('grid', 'list')
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
                'label' 	=> esc_html__( 'Button Text', 'star-addons-for-elementor' ),
                'type' 		=> \Elementor\Controls_Manager::TEXT,
                'default' 	=> __('View All Products', 'star-addons-for-elementor'),
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'btn_link_type',
            [
                'label' 		=> esc_html__( 'Button Link Type', 'star-addons-for-elementor' ),
                'type' 			=> \Elementor\Controls_Manager::SELECT,
                'label_block' 	=> true,
                'options' => [
                    '1'  	=> esc_html__( 'Link To Page', 'star-addons-for-elementor' ),
                    '2' 	=> esc_html__( 'External Link', 'star-addons-for-elementor' ),
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
                'label' 		=> esc_html__( 'Button Link Page', 'star-addons-for-elementor' ),
                'type' 			=> \Elementor\Controls_Manager::SELECT,
                'label_block' 	=> true,
                'options' 		=> star_addons_get_page_as_list(),
                'condition' => [
                    'btn_link_type' => '1',
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'btn_ex_link',
            [
                'label'		=> esc_html__('Button External Link', 'star-addons-for-elementor'),
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

        <!-- Product Column Style -->
        <?php if($settings['product_item_style'] == 'grid') : 
            if( $settings['product_item_column'] == 'column-1' ) :
                $product_column = 'full-col col-lg-12 col-md-6 col-sm-6'; 
            elseif( $settings['product_item_column'] == 'columns-2' ) :
                $product_column = 'full-col col-lg-6 col-md-6 col-sm-6';
            elseif( $settings['product_item_column'] == 'columns-3' ) :
                $product_column = 'full-col col-lg-4 col-md-6 col-sm-6';
            elseif( $settings['product_item_column'] == 'columns-4' ) :
                $product_column = 'full-col col-xl-3 col-lg-4 col-md-6 col-sm-6';
            endif; 
        endif; ?>
        
        <!-- Product Button Link -->
        <?php if($settings['btn_link_type'] == '2') : 
            $target = $settings['btn_ex_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $settings['btn_ex_link']['nofollow'] ? ' rel="nofollow"' : ''; 
        elseif($settings['btn_link_type'] == '1') : 
            $target = '';
            $nofollow = '';
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
        } 

        // Product Query
        if( $settings['cat_name'] != '' ) {
            global $paged;
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $product_args = array(
                'post_type'         => 'product',
                'posts_per_page'    => $settings['count'],
                'order'             => $settings['order'],
                'paged'             => $paged,
                'tax_query'         => array(
                    array(
                        'taxonomy'      => 'product_cat',
                        'field'         => 'slug',
                        'terms'         => $settings['cat_name'],
                        'hide_empty'    => false
                    )
                )
            );
        }

        else {
            global $paged;
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $product_args = array(
                'post_type'         => 'product',
                'posts_per_page'    => $settings['count'],
                'order'             => $settings['order'],
                'paged'             => $paged
            );
        }

        $product_array = new \WP_Query( $product_args );

        // Get Button Link
        if($settings['show_btn'] == 'yes') {
            if($settings['btn_link_type'] == 1) {
                $btn_link = get_page_link( $settings['btn_link_to_page'] );
            } else {
                $btn_link = $settings['btn_ex_link']['url'];
            }
        }

        // Inline Editing
        $this-> add_inline_editing_attributes('title', 'none'); ?>

        <?php if($settings['product_item_style'] == 'grid' || $settings['product_item_style'] == 'slider' ) : ?>
        
            <!-- START PRODUCT AREA -->
            <section class="shop-area woocommerce">
                <div class="container-fluid"> 
            
                        <div class="row justify-content-center">
                            <?php if( $settings['product_sidebar'] == 'left-sidebar' ) : ?> 
                                <div class="full-col col-lg-4 col-md-12">
                                    <section class="products-area">
                                        <aside class="widget-area product-left-sidebar secondary">
                                            <?php dynamic_sidebar('star-addons-shop-sidebar'); ?>
                                        </aside>
                                    </section>
                                </div>
                            <?php endif; ?>
                            <?php if( $settings['product_sidebar'] == 'no-sidebar' ) : ?>
                                <div class="full-col col-lg-12 col-md-12">
                            <?php elseif( $settings['product_sidebar'] == 'left-sidebar' || $settings['product_sidebar'] == 'right-sidebar' ) : ?>
                                <div class="full-col col-lg-8 col-md-12">
                            <?php endif; ?>
                                <?php if($settings['product_item_style'] == 'grid') : ?>
                                    <div class="row justify-content-center">
                                <?php elseif($settings['product_item_style'] == 'slider') : ?>  
                                    <?php if( $settings['product_sidebar'] == 'no-sidebar' ) : ?>
                                        <div class="product-slider owl-carousel owl-theme">
                                    <?php elseif( $settings['product_sidebar'] == 'left-sidebar' || $settings['product_sidebar'] == 'right-sidebar' ) : ?>
                                        <div class="product-sidebar-slider owl-carousel owl-theme">
                                    <?php endif; ?>
                                <?php endif; ?>
                                    <?php while($product_array->have_posts()) : $product_array->the_post(); ?>
                                    <?php if($settings['product_item_style'] == 'grid') : ?>
                                        <div class="<?php echo esc_attr( $product_column ); ?>">
                                    <?php elseif($settings['product_item_style'] == 'slider') : ?>
                                        <div class="product-wrap">
                                    <?php endif; ?>
                                        <div class="single-products-box">
                                            <div class="image">
                                                <?php global $star_addons;
                                                global $product;
                                                woocommerce_template_loop_product_thumbnail(); ?>
                                                <?php woocommerce_template_loop_add_to_cart(); ?>
                                                <?php woocommerce_show_product_sale_flash();
                                                $star_addons_wc_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
                                                $star_addons_wc_placeholder_src = WC()->plugin_url() . '/assets/images/placeholder.png';
                                                if($settings['show_additional_buttons'] == '1') : ?>
                                                    <ul class="products-button">
                                                        <li class="product-popup-btn"><a href="#" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr($settings['unique_section_ID']); ?>productsQuickView<?php echo esc_attr(get_the_ID()); ?>"><i class='bx bx-show-alt'></i></a></li>
                                                        <?php if($star_addons_wc_image) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($star_addons_wc_image[0]); ?>" class="popup-btn">
                                                                    <i class="bx bx-scan"></i>
                                                                </a>
                                                            </li>
                                                        <?php else: ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($star_addons_wc_placeholder_src); ?>" class="popup-btn">
                                                                    <i class="bx bx-scan"></i>
                                                                </a>
                                                            </li> 
                                                        <?php endif; ?>
                                                        <li><a href="<?php the_permalink(); ?>"><i class='bx bx-link'></i></a></li>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                            <div class="content">
                                                <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                                <?php woocommerce_template_loop_price(); ?>
                                            </div>
                                        </div>

                                        <!-- Start Products Modal -->
                                        <div class="modal productsQuickView fade products" id="<?php echo esc_attr($settings['unique_section_ID']); ?>productsQuickView<?php echo esc_attr(get_the_ID());?>" tabindex="-1" aria-labelledby="<?php echo esc_attr($settings['unique_section_ID']); ?>productsQuickViewTitle<?php echo esc_attr(get_the_ID());?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="row">
                                                        <div class="full-col col-lg-7 col-md-12">
                                                            <div class="products-image">
                                                                <?php if(has_post_thumbnail()) :
                                                                    the_post_thumbnail('woocommerce');
                                                                else: 
                                                                    echo wc_placeholder_img();
                                                                endif; ?>
                                                            </div>
                                                        </div>

                                                        <div class="full-col col-lg-5 col-md-12">
                                                            <div class="products-content">
                                                                <h3><?php the_title(); ?></h3>
                                                                <?php woocommerce_template_loop_price(); ?>
                                                                <?php woocommerce_template_loop_rating(); ?>
                                                                <p><?php echo wp_trim_words( get_the_excerpt(), 60 ); ?></p>
                                                                <div class="products-add-to-cart">
                                                                    <?php woocommerce_template_single_add_to_cart(); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Products Modal -->

                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_query(); ?>
                                </div>

                                <?php 
                                $total_pages = $product_array->max_num_pages;
                                $total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
                                $current = max(1, get_query_var('paged'));
                                $base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
                                $format  = '/page/%#%';
                                if( $settings['show_pagination'] == 1 ) : ?>
                                    <div class="woocommerce-pagination-area text-center">
                                        <?php                                       
                                            $current_page = max(1, get_query_var('paged'));
                                            echo paginate_links(array(
                                                'base'      => $base,
                                                'format'    => $format,
                                                'add_args'  => false,
                                                'current'   => max( 1, $current ),
                                                'total'     => $total_pages,
                                                'prev_text' => '<i class="bx bx-chevrons-left"></i>',
                                                'next_text' => '<i class="bx bx-chevrons-right"></i>',
                                                'type'      => 'list',
                                                'end_size'  => 3,
                                                'mid_size'  => 3
                                            ));
                                        ?>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Button Part Start --> 
                                <?php if( $settings['show_btn'] == 'yes' && $settings['button_text'] != '' ): ?>
                                    <div class="btn-area text-center">
                                        <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-default-btn no-icon"><?php echo esc_html( $settings['button_text'] ); ?></a>
                                    </div>
                                <?php endif; ?>
                                <!-- Button Part End -->

                            </div>

                            <?php if( $settings['product_sidebar'] == 'right-sidebar' ) : ?> 
                                <div class="full-col col-lg-4 col-md-12">
                                    <section class="products-area">
                                        <aside class="widget-area product-right-sidebar secondary">
                                            <?php dynamic_sidebar('star-addons-shop-sidebar'); ?>
                                        </aside>
                                    </section>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>  
                </div>
            </section>
            <!-- END PRODUCT AREA -->

        <?php elseif($settings['product_item_style'] == 'list' ) : ?>

            <!-- START PRODUCT AREA -->
            <section class="shop-area woocommerce">
                <div class="container-fluid"> 
                    <?php if($settings['section_title'] != '' || $settings['section_desc'] != '') : ?> 
                        <div class="section-title">
                            <h2><?php echo esc_html($settings['section_title']); ?></h2>
                            <p><?php echo wp_kses_post($settings['section_desc']); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="row justify-content-center">

                        <?php if( $settings['product_sidebar'] == 'left-sidebar' ) : ?> 
                            <div class="full-col col-lg-4 col-md-12">
                                <section class="products-area">
                                    <aside class="widget-area product-left-sidebar secondary">
                                        <?php dynamic_sidebar('star-addons-shop-sidebar'); ?>
                                    </aside>
                                </section>
                            </div>
                        <?php endif; ?>

                        <?php if( $settings['product_sidebar'] == 'no-sidebar' ) : ?>
                            <div class="full-col col-lg-12 col-md-12">
                        <?php elseif( $settings['product_sidebar'] == 'left-sidebar' || $settings['product_sidebar'] == 'right-sidebar' ) : ?>
                            <div class="full-col col-lg-8 col-md-12">
                        <?php endif; ?>

                            <div class="product-list">
                                <?php while($product_array->have_posts()) : $product_array->the_post(); ?>
                                    <div class="single-products-box row">
                                        <div class="full-col col-lg-4 col-md-12 col-sm-12">
                                            <div class="image">
                                                <?php global $star_addons;
                                                global $product;
                                                woocommerce_template_loop_product_thumbnail(); ?>
                                                <?php woocommerce_template_loop_add_to_cart(); ?>
                                                <?php woocommerce_show_product_sale_flash();
                                                $star_addons_wc_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
                                                $star_addons_wc_placeholder_src = WC()->plugin_url() . '/assets/images/placeholder.png';
                                                if($settings['show_additional_buttons'] == '1') : ?>
                                                    <ul class="products-button">
                                                        <li class="product-popup-btn"><a href="#" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr($settings['unique_section_ID']); ?>productsQuickView<?php echo esc_attr(get_the_ID()); ?>"><i class='bx bx-show-alt'></i></a></li>
                                                        <?php if($star_addons_wc_image) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($star_addons_wc_image[0]); ?>" class="popup-btn">
                                                                    <i class="bx bx-scan"></i>
                                                                </a>
                                                            </li>
                                                        <?php else: ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($star_addons_wc_placeholder_src); ?>" class="popup-btn">
                                                                    <i class="bx bx-scan"></i>
                                                                </a>
                                                            </li> 
                                                        <?php endif; ?>
                                                        <li><a href="<?php the_permalink(); ?>"><i class='bx bx-link'></i></a></li>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="full-col col-lg-8 col-md-12 col-sm-12">
                                            <div class="content">
                                                <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                                <?php woocommerce_template_loop_price(); ?>
                                                <p><?php echo wp_trim_words( get_the_excerpt(), 60 ); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Start Products Modal -->
                                    <div class="modal productsQuickView fade products" id="<?php echo esc_attr($settings['unique_section_ID']); ?>productsQuickView<?php echo esc_attr(get_the_ID());?>" tabindex="-1" aria-labelledby="<?php echo esc_attr($settings['unique_section_ID']); ?>productsQuickViewTitle<?php echo esc_attr(get_the_ID());?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="row">
                                                    <div class="full-col col-lg-7 col-md-12">
                                                        <div class="products-image">
                                                            <?php if(has_post_thumbnail()) :
                                                                the_post_thumbnail('woocommerce');
                                                            else: 
                                                                echo wc_placeholder_img();
                                                            endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="full-col col-lg-5 col-md-12">
                                                        <div class="products-content">
                                                            <h3><?php the_title(); ?></h3>
                                                            <?php woocommerce_template_loop_price(); ?>
                                                            <?php woocommerce_template_loop_rating(); ?>
                                                            <p><?php echo wp_trim_words( get_the_excerpt(), 60 ); ?></p>
                                                            <div class="products-add-to-cart">
                                                                <?php woocommerce_template_single_add_to_cart(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Products Modal -->
                                    
                                <?php endwhile; ?>
                                <?php wp_reset_query(); ?>
                            </div>
                                
                            <?php 
                            $total_pages = $product_array->max_num_pages;
                            $total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
                            $current = max(1, get_query_var('paged'));
                            $base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
                            $format  = '/page/%#%';
                            if( $settings['show_pagination'] == 1 ) : ?>
                                <div class="woocommerce-pagination-area text-center">
                                    <?php                                       
                                        $current_page = max(1, get_query_var('paged'));
                                        echo paginate_links(array(
                                            'base'      => $base,
                                            'format'    => $format,
                                            'add_args'  => false,
                                            'current'   => max( 1, $current ),
                                            'total'     => $total_pages,
                                            'prev_text' => '<i class="bx bx-chevrons-left"></i>',
                                            'next_text' => '<i class="bx bx-chevrons-right"></i>',
                                            'type'      => 'list',
                                            'end_size'  => 3,
                                            'mid_size'  => 3
                                        ));
                                    ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Button Part Start --> 
                            <?php if( $settings['show_btn'] == 'yes' && $settings['button_text'] != '' ): ?>
                                <div class="btn-area text-center">
                                    <a href="<?php echo esc_url($btn_link); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?> class="star-default-btn no-icon"><?php echo esc_html( $settings['button_text'] ); ?></a>
                                </div>
                            <?php endif; ?>
                            <!-- Button Part End -->

                        </div>

                        <?php if( $settings['product_sidebar'] == 'right-sidebar' ) : ?> 
                            <div class="full-col col-lg-4 col-md-12">
                                <section class="products-area">
                                    <aside class="widget-area product-right-sidebar secondary">
                                        <?php dynamic_sidebar('star-addons-shop-sidebar'); ?>
                                    </aside>
                                </section>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>
            </section>
            <!-- END PRODUCT AREA -->

        <?php endif; ?>

    <?php

	}

}
