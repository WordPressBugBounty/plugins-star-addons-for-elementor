<!-- Start Slider Thirteen Area -->
<div class="slider-area style-thirteen">
    <section class="hero-wrap" style="background-image: url(<?php echo esc_url( $settings['slider_bg_image']['url'] ); ?>)">
        <div class="hero-slider-one owl-carousel">

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

                <div class="hero-slide-item bg-f" style="background-image: url(<?php echo esc_url( $item['slider_image']['url'] ); ?>)">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-8">
                                <div class="hero-content">

                                    <span data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300"><?php echo wp_kses_post($item['slider_subtitle']); ?></span>
                                    <h1 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="500"><?php echo wp_kses_post($item['slider_title']); ?></h1>
                                    <p data-aos="fade-right" data-aos-duration="1000" data-aos-delay="800"><?php echo wp_kses_post($item['slider_desc']); ?></p>

                                    <?php if( $item['show_btn'] == 'yes' ): ?>
                                        <div class="hero-btn">
                                            <?php if( $item['button_text1'] != '' ): ?>
                                                <a href="<?php echo esc_url($btn_link1); ?>" <?php echo wp_kses_post( $target1 ); ?> <?php echo wp_kses_post( $nofollow1 ); ?> class="btn style1" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500"><?php echo esc_html( $item['button_text1'] ); ?><i class="flaticon-right-arrow"></i></a>
                                            <?php endif; ?>
                                            <?php if( $item['button_text2'] != '' ): ?>
                                                <a href="<?php echo esc_url($btn_link2); ?>" <?php echo wp_kses_post( $target2 ); ?> <?php echo wp_kses_post( $nofollow2 ); ?> class="btn style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500"><?php echo esc_html( $item['button_text2'] ); ?><i class="flaticon-right-arrow"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </section>
</div>
<!-- End Slider Thirteen Area -->