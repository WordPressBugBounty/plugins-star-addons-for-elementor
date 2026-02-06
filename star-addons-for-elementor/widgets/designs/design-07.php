<!-- Start Slider Seven Area -->
<div class="slider-area style-seven">
    <div class="hero-slider-area">
        <div class="hero-slider-wrap owl-theme owl-carousel" data-slider-id="1" style="background-image: url(<?php echo esc_url( $settings['slider_bg_image']['url'] ); ?>)">

            <?php foreach (  $settings['slider'] as $item ) : ?>

                <!-- Slider Button Link -->
                <?php if($item['btn_link_type1'] == '2') : 
                    $target1 = $item['btn_ex_link1']['is_external'] ? ' target="_blank"' : '';
                    $nofollow1 = $item['btn_ex_link1']['nofollow'] ? ' rel="nofollow"' : ''; 
                elseif($item['btn_link_type1'] == '1') : 
                    $target1 = '';
                    $nofollow1 = '';
                endif; 

                if($item['btn_link_type2'] == '2') : 
                    $target2 = $item['btn_ex_link2']['is_external'] ? ' target="_blank"' : '';
                    $nofollow2 = $item['btn_ex_link2']['nofollow'] ? ' rel="nofollow"' : ''; 
                elseif($item['btn_link_type2'] == '1') : 
                    $target2 = '';
                    $nofollow2 = '';
                endif; 

                // Get Button Link
                if($item['btn_link_type1'] == '1') {
                    $btn_link1 = get_page_link( $item['btn_link_to_page1'] );
                } else {
                    $btn_link1 = $item['btn_ex_link1']['url'];
                }

                if($item['btn_link_type2'] == '1') {
                    $btn_link2 = get_page_link( $item['btn_link_to_page2'] );
                } else {
                    $btn_link2 = $item['btn_ex_link2']['url'];
                }

                ?>

                <div class="hero-slider-item">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="custom-container">
                                <div class="row align-items-center">
                                    <div class="full-col col-lg-6 col-md-6">
                                        <div class="hero-slider-content">
                                            <h1><?php echo wp_kses_post($item['slider_title']); ?></h1>
                                            <h3><?php echo wp_kses_post($item['slider_subtitle']); ?></h3>
                                            <p><?php echo wp_kses_post($item['slider_desc']); ?></p>

                                            <?php if( $item['show_btn'] == 'yes' ): ?>
                                                <div class="slider-btn">
                                                    <?php if( $item['button_text1'] != '' ): ?>
                                                        <a href="<?php echo esc_url($btn_link1); ?>" <?php echo wp_kses_post( $target1 ); ?> <?php echo wp_kses_post( $nofollow1 ); ?> class="default-btn4"><?php echo esc_html( $item['button_text1'] ); ?></a>
                                                    <?php endif; ?>
                                                    <?php if( $item['button_text2'] != '' ): ?>
                                                        <a href="<?php echo esc_url($btn_link2); ?>" <?php echo wp_kses_post( $target2 ); ?> <?php echo wp_kses_post( $nofollow2 ); ?> class="default-btn4"><?php echo esc_html( $item['button_text2'] ); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                            
                                        </div>
                                    </div>
                                    <div class="full-col col-lg-6 col-md-6">
                                        <?php if( $item['slider_image']['url'] != '' ) : ?>
                                            <div class="hero-slider-img">
                                                <img decoding="async" src="<?php echo esc_url( $item['slider_image']['url'] ); ?>" alt="image">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

        <!-- Start Carousel Thumbs -->
        <div class="thumbs-wrap">
            <div class="owl-thumbs hero-slider-thumb" data-slider-id="1">
                <div class="owl-thumb-item">
                    <span></span>
                </div>

                <div class="owl-thumb-item">
                    <span></span>
                </div>

                <div class="owl-thumb-item">
                    <span></span>
                </div>
            </div>
        </div>
        <!-- End Carousel Thumbs -->

    </div>
</div>
<!-- End Slider Seven Area -->