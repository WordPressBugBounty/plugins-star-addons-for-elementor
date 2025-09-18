<?php

/* ----------------------------------------------------------------------------- */
/* Field Callbacks 3 */
/* ----------------------------------------------------------------------------- */ 

// Star Addons Features Template
function star_addons_template_features_callback() { ?>

    <div class="starad-elements-area">
        <div class="container">

            <div class="section-title">
                <h2><?php echo esc_html__('Star Addons Features', 'star-addons-for-elementor'); ?></h2>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="star-single-example-box">
                        <div class="icon">
                            <i class='fas fa-desktop'></i>
                            <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../admin/img/shape.png'; ?>" alt="Logo" />
                        </div>
                        <h3><?php echo esc_html__('Fully Responsive Layout', 'star-addons-for-elementor'); ?></h3>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="star-single-example-box">
                        <div class="icon">
                            <i class='far fa-file-alt'></i>
                            <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../admin/img/shape.png'; ?>" alt="Logo" />
                        </div>
                        <h3><?php echo esc_html__('Most Resourceful Widgets', 'star-addons-for-elementor'); ?></h3>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="star-single-example-box">
                        <div class="icon">
                            <i class='far fa-edit'></i>
                            <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../admin/img/shape.png'; ?>" alt="Logo" />
                        </div>
                        <h3><?php echo esc_html__('Fully Customizable', 'star-addons-for-elementor'); ?></h3>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="star-single-example-box">
                        <div class="icon">
                            <i class='fas fa-mobile-alt'></i>
                            <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../admin/img/shape.png'; ?>" alt="Logo" />
                        </div>
                        <h3><?php echo esc_html__('Mobile Optimized', 'star-addons-for-elementor'); ?></h3>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="star-single-example-box">
                        <div class="icon">
                            <i class='fab fa-google'></i>
                            <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../admin/img/shape.png'; ?>" alt="Logo" />
                        </div>
                        <h3><?php echo esc_html__('Google Fonts', 'star-addons-for-elementor'); ?></h3>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="star-single-example-box">
                        <div class="icon">
                            <i class='fas fa-expand-arrows-alt'></i>
                            <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../admin/img/shape.png'; ?>" alt="Logo" />
                        </div>
                        <h3><?php echo esc_html__('Lifetime Update', 'star-addons-for-elementor'); ?></h3>
                    </div>
                </div>

            </div>

        </div>
    </div>

<?php }
