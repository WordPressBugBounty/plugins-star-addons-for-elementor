<!-- Start Slider Three Area -->
<div class="slider-area style-three">
    <div class="banner-slider owl-carousel" style="background-image: url(<?php echo esc_url( $settings['slider_bg_image']['url'] ); ?>)">

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

            <div class="single-banner-part" style="background-image: url(<?php echo esc_url( $item['slider_image']['url'] ); ?>)">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-8">
                            <div class="banner-iner">
                                <h5><?php echo wp_kses_post($item['slider_subtitle']); ?></h5>
                                <h2><?php echo wp_kses_post($item['slider_title']); ?></h2>
                                <p><?php echo wp_kses_post($item['slider_desc']); ?></p>
                                <?php if( $item['show_btn'] == 'yes' ): ?>
                                    <div class="slider-btn">
                                        <?php if( $item['button_text1'] != '' ): ?>
                                            <a href="<?php echo esc_url($btn_link1); ?>" <?php echo wp_kses_post( $target1 ); ?> <?php echo wp_kses_post( $nofollow1 ); ?> class="banner-btn"><?php echo esc_html( $item['button_text1'] ); ?></a>
                                        <?php endif; ?>
                                        <?php if( $item['button_text2'] != '' ): ?>
                                            <a href="<?php echo esc_url($btn_link2); ?>" <?php echo wp_kses_post( $target2 ); ?> <?php echo wp_kses_post( $nofollow2 ); ?> class="banner-btn"><?php echo esc_html( $item['button_text2'] ); ?></a>
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
</div>
<!-- End Slider Three Area -->