<?php

/* ----------------------------------------------------------------------------- */
/* Field Callbacks 1 */
/* ----------------------------------------------------------------------------- */ 

// Star Addons General Template
function star_addons_template_general_callback() { ?>

	<!-- Start Elements Area -->
    <div class="starad-elements-area">
        <div class="container">

            <div class="star-home-banner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="star-home-banner-img">
                            <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../admin/img/banner.png'; ?>" alt="icon" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="star-home-banner-content">
                            <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../admin/img/logo.png'; ?>" alt="icon" />
                            <h2><?php echo esc_html('A Collection of Multiple Addons for Elementor', 'star-addons-for-elementor'); ?></h2>
                            <p><?php echo esc_html('The plugin has 33+ beautiful unique niche demo variations + more adding!', 'star-addons-for-elementor'); ?></p>
                            <a target="_blank" href="https://templatemonster.com/wordpress-plugins/321762.html" class="link-btn"><?php echo esc_html__('Buy Now', 'star-addons-for-elementor'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Elements Area -->

    <!-- Start Cart Area -->
    <div class="row">
        <div class="col-lg-6">
            <!-- Start Docs Area -->
            <div class="cart-services-box">
                <div class="icon">
                    <i class='bx bx-book-reader'></i>
                </div>
                <h3><?php echo esc_html__('Documentation', 'star-addons-for-elementor'); ?></h3>
                <p>
                    <?php echo esc_html__('Get started by spending some time with the documentation to get familiar with Star Addons.', 'star-addons-for-elementor'); ?>
                </p>
                <p><?php echo esc_html__('Download the plugin, unzip it, and then you will find the documentation folder.', 'star-addons-for-elementor'); ?></p>
                <a target="_blank" href="https://wordpress.org/plugins/star-addons-for-elementor/#installation" class="link-btn"><?php echo esc_html__('Documentation', 'star-addons-for-elementor'); ?></a>
            </div>
            <!-- End Docs Area -->
        </div>
        <div class="col-lg-6">
            <!-- Start Support Area -->
            <div class="cart-services-box">
                <div class="icon">
                    <i class='bx bx-support'></i>
                </div>
                <h3><?php echo esc_html__('Got something to say? Need help?', 'star-addons-for-elementor'); ?></h3>
                <p><?php echo esc_html__('If you have any more questions, visit our support on the WordPress support system.', 'star-addons-for-elementor'); ?></p>
                <p><?php echo esc_html__('You will also get world class support from our dedicated team, 24/7. We will respond to you within 5 minutes.', 'star-addons-for-elementor'); ?></p>
                <a target="_blank" href="https://wordpress.org/support/plugin/star-addons-for-elementor/" target="_blank" class="link-btn"><?php echo esc_html__('Support', 'star-addons-for-elementor'); ?></a>
            </div>
            <!-- End Support Area -->
        </div>
        <div class="col-lg-6">
            <!-- Start Review Area -->
            <div class="cart-services-box">
                <div class="icon">
                    <i class='bx bx-heart'></i>
                </div>
                <h3><?php echo esc_html__('Review', 'star-addons-for-elementor'); ?></h3>
                <p><?php echo esc_html__('We love to have you in Star Addons family. We are making it more awesome everyday.', 'star-addons-for-elementor'); ?></p>
                <p><?php echo esc_html__('Take your 2 minutes to review the plugin and spread the love to encourage us to keep it going.', 'star-addons-for-elementor'); ?></p>
                <a target="_blank" href="https://wordpress.org/plugins/star-addons-for-elementor/#reviews" class="link-btn"><?php echo esc_html__('Review', 'star-addons-for-elementor'); ?></a>
            </div>
            <!-- End Review Area -->
        </div>
        <div class="col-lg-6">
            <!-- Start Missing Area -->
            <div class="cart-services-box">
                <div class="icon">
                    <i class='bx bx-cog'></i>
                </div>
                <h3><?php echo esc_html__('Missing Any Feature?', 'star-addons-for-elementor'); ?></h3>
                <p><?php echo esc_html__('Are you in need of a feature that’s not available in our plugin? Please feel free to do a feature request by sending a mail.', 'star-addons-for-elementor'); ?></p>
                <p><?php echo esc_html__("We will try to our best to add your require feature in our plugin's future update.", 'star-addons-for-elementor'); ?></p>
                <a target="_self" href="mailto:hello@mhrtheme.com" class="link-btn"><?php echo esc_html__('Request Feature', 'star-addons-for-elementor'); ?></a>
            </div>
            <!-- End Missing Area -->
        </div>
        <!-- Start FAQ Area -->
        <div class="cart-faq-area">
            <div class="cart-services-box">
                <div class="faq-heading">
                    <div class="icon">
                        <i class='bx bx-star'></i>
                    </div>
                    <div class="content">
                        <h3><?php echo esc_html__('FAQ', 'star-addons-for-elementor'); ?></h3>
                        <h2><?php echo esc_html__('Frequently Asked Questions', 'star-addons-for-elementor'); ?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cart-services-content">
                            <h2><?php echo esc_html__('Can I use the plugin without Elementor Page Builder?', 'star-addons-for-elementor'); ?></h2>
                            <p><?php echo esc_html__("No. You cannot use without Elementor since it's an addon for Elementor.", 'star-addons-for-elementor'); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="cart-services-content">
                            <h2><?php echo esc_html__('Does it work with any theme?', 'star-addons-for-elementor'); ?></h2>
                            <p><?php echo esc_html__("Absolutely! It will work with any theme where Elementor works.", 'star-addons-for-elementor'); ?></p>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <!-- End FAQ Area -->
    </div>
    <!-- End Cart Area -->

<?php }
