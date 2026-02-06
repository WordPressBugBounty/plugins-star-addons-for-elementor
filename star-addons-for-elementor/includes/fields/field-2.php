<?php

/* ----------------------------------------------------------------------------- */
/* Field Callbacks 1 */
/* ----------------------------------------------------------------------------- */

// Star Addons Widget Multiple Slider
function star_addons_widget_multiple_slider_enable_callback() { 
    $star_addons_widget_multiple_slider_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_multiple_slider_enable['star_addons_widget_multiple_slider_enable'] ) ) :
        $star_addons_widget_multiple_slider_enable_new = $star_addons_widget_multiple_slider_enable['star_addons_widget_multiple_slider_enable'];
    else:
        $star_addons_widget_multiple_slider_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="multiple_slider" name="new_settings2[star_addons_widget_multiple_slider_enable]" value="1" '.checked(1, $star_addons_widget_multiple_slider_enable_new, false).'>', 'star-addons-for-elementor').__('Multiple Slider', 'star-addons-for-elementor'); ?>
    <label for="multiple_slider"></label>
    <a class="starad-element-live-link" href="https://pages.mhrtheme.com/clump/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Slider
function star_addons_widget_slider_enable_callback() { 
    $star_addons_widget_slider_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_slider_enable['star_addons_widget_slider_enable'] ) ) :
        $star_addons_widget_slider_enable_new = $star_addons_widget_slider_enable['star_addons_widget_slider_enable'];
    else:
        $star_addons_widget_slider_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="slider" name="new_settings2[star_addons_widget_slider_enable]" value="1" '.checked(1, $star_addons_widget_slider_enable_new, false).'>', 'star-addons-for-elementor').__('Slider', 'star-addons-for-elementor'); ?>
    <label for="slider"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/slider/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }


// Star Addons Widget Banner
function star_addons_widget_banner_enable_callback() { 
    $star_addons_widget_banner_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_banner_enable['star_addons_widget_banner_enable'] ) ) :
        $star_addons_widget_banner_enable_new = $star_addons_widget_banner_enable['star_addons_widget_banner_enable'];
    else:
        $star_addons_widget_banner_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="banner" name="new_settings2[star_addons_widget_banner_enable]" value="1" '.checked(1, $star_addons_widget_banner_enable_new, false).'>', 'star-addons-for-elementor').__('Banner', 'star-addons-for-elementor'); ?>
    <label for="banner"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/banner/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Course
function star_addons_widget_course_enable_callback() { 
    $star_addons_widget_course_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_course_enable['star_addons_widget_course_enable'] ) ) :
        $star_addons_widget_course_enable_new = $star_addons_widget_course_enable['star_addons_widget_course_enable'];
    else:
        $star_addons_widget_course_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="course" name="new_settings2[star_addons_widget_course_enable]" value="1" '.checked(1, $star_addons_widget_course_enable_new, false).'>', 'star-addons-for-elementor').__('LP Courses', 'star-addons-for-elementor'); ?>
    <label for="course"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/lp-courses/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Category
function star_addons_widget_category_enable_callback() { 
    $star_addons_widget_category_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_category_enable['star_addons_widget_category_enable'] ) ) :
        $star_addons_widget_category_enable_new = $star_addons_widget_category_enable['star_addons_widget_category_enable'];
    else:
        $star_addons_widget_category_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="category" name="new_settings2[star_addons_widget_category_enable]" value="1" '.checked(1, $star_addons_widget_category_enable_new, false).'>', 'star-addons-for-elementor').__('LP Categories', 'star-addons-for-elementor'); ?>
    <label for="category"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/course-category/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Tag
function star_addons_widget_tag_enable_callback() { 
    $star_addons_widget_tag_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_tag_enable['star_addons_widget_tag_enable'] ) ) :
        $star_addons_widget_tag_enable_new = $star_addons_widget_tag_enable['star_addons_widget_tag_enable'];
    else:
        $star_addons_widget_tag_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="tag" name="new_settings2[star_addons_widget_tag_enable]" value="1" '.checked(1, $star_addons_widget_tag_enable_new, false).'>', 'star-addons-for-elementor').__('LP Tags', 'star-addons-for-elementor'); ?>
    <label for="tag"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/course-tag/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Team
function star_addons_widget_team_enable_callback() { 
    $star_addons_widget_team_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_team_enable['star_addons_widget_team_enable'] ) ) :
        $star_addons_widget_team_enable_new = $star_addons_widget_team_enable['star_addons_widget_team_enable'];
    else:
        $star_addons_widget_team_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="team" name="new_settings2[star_addons_widget_team_enable]" value="1" '.checked(1, $star_addons_widget_team_enable_new, false).'>', 'star-addons-for-elementor').__('Team', 'star-addons-for-elementor'); ?>
    <label for="team"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/team-grid/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget About
function star_addons_widget_about_enable_callback() { 
    $star_addons_widget_about_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_about_enable['star_addons_widget_about_enable'] ) ) :
        $star_addons_widget_about_enable_new = $star_addons_widget_about_enable['star_addons_widget_about_enable'];
    else:
        $star_addons_widget_about_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="about" name="new_settings2[star_addons_widget_about_enable]" value="1" '.checked(1, $star_addons_widget_about_enable_new, false).'>', 'star-addons-for-elementor').__('About', 'star-addons-for-elementor'); ?>
    <label for="about"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/about-us/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Testimonial
function star_addons_widget_testimonial_enable_callback() { 
    $star_addons_widget_testimonial_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_testimonial_enable['star_addons_widget_testimonial_enable'] ) ) :
        $star_addons_widget_testimonial_enable_new = $star_addons_widget_testimonial_enable['star_addons_widget_testimonial_enable'];
    else:
        $star_addons_widget_testimonial_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="testimonial" name="new_settings2[star_addons_widget_testimonial_enable]" value="1" '.checked(1, $star_addons_widget_testimonial_enable_new, false).'>', 'star-addons-for-elementor').__('Testimonial', 'star-addons-for-elementor'); ?>
    <label for="testimonial"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/testimonial-grid/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Contact
function star_addons_widget_contact_enable_callback() { 
    $star_addons_widget_contact_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_contact_enable['star_addons_widget_contact_enable'] ) ) :
        $star_addons_widget_contact_enable_new = $star_addons_widget_contact_enable['star_addons_widget_contact_enable'];
    else:
        $star_addons_widget_contact_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="contact" name="new_settings2[star_addons_widget_contact_enable]" value="1" '.checked(1, $star_addons_widget_contact_enable_new, false).'>', 'star-addons-for-elementor').__('Contact', 'star-addons-for-elementor'); ?>
    <label for="contact"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/contact/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Blog
function star_addons_widget_blog_enable_callback() { 
    $star_addons_widget_blog_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_blog_enable['star_addons_widget_blog_enable'] ) ) :
        $star_addons_widget_blog_enable_new = $star_addons_widget_blog_enable['star_addons_widget_blog_enable'];
    else:
        $star_addons_widget_blog_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="blog" name="new_settings2[star_addons_widget_blog_enable]" value="1" '.checked(1, $star_addons_widget_blog_enable_new, false).'>', 'star-addons-for-elementor').__('Blog', 'star-addons-for-elementor'); ?>
    <label for="blog"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/blog/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Header
function star_addons_widget_header_enable_callback() { 
    $star_addons_widget_header_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_header_enable['star_addons_widget_header_enable'] ) ) :
        $star_addons_widget_header_enable_new = $star_addons_widget_header_enable['star_addons_widget_header_enable'];
    else:
        $star_addons_widget_header_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="header" name="new_settings2[star_addons_widget_header_enable]" value="1" '.checked(1, $star_addons_widget_header_enable_new, false).'>', 'star-addons-for-elementor').__('Header', 'star-addons-for-elementor'); ?>
    <label for="header"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/header/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Footer
function star_addons_widget_footer_enable_callback() { 
    $star_addons_widget_footer_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_footer_enable['star_addons_widget_footer_enable'] ) ) :
        $star_addons_widget_footer_enable_new = $star_addons_widget_footer_enable['star_addons_widget_footer_enable'];
    else:
        $star_addons_widget_footer_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="footer" name="new_settings2[star_addons_widget_footer_enable]" value="1" '.checked(1, $star_addons_widget_footer_enable_new, false).'>', 'star-addons-for-elementor').__('Footer', 'star-addons-for-elementor'); ?>
    <label for="footer"></label>
    <a class="starad-element-live-link" href="https://star-learn.mhrtheme.com/footer/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Demos
function star_addons_widget_demos_enable_callback() { 
    $star_addons_widget_demos_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_demos_enable['star_addons_widget_demos_enable'] ) ) :
        $star_addons_widget_demos_enable_new = $star_addons_widget_demos_enable['star_addons_widget_demos_enable'];
    else:
        $star_addons_widget_demos_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="demos" name="new_settings2[star_addons_widget_demos_enable]" value="1" '.checked(1, $star_addons_widget_demos_enable_new, false).'>', 'star-addons-for-elementor').__('Demos', 'star-addons-for-elementor'); ?>
    <label for="demos"></label>
    <a class="starad-element-live-link" href="https://star-addons.mhrtheme.com/#demos" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Features
function star_addons_widget_features_enable_callback() { 
    $star_addons_widget_features_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_features_enable['star_addons_widget_features_enable'] ) ) :
        $star_addons_widget_features_enable_new = $star_addons_widget_features_enable['star_addons_widget_features_enable'];
    else:
        $star_addons_widget_features_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="features" name="new_settings2[star_addons_widget_features_enable]" value="1" '.checked(1, $star_addons_widget_features_enable_new, false).'>', 'star-addons-for-elementor').__('Features', 'star-addons-for-elementor'); ?>
    <label for="features"></label>
    <a class="starad-element-live-link" href="https://star-addons.mhrtheme.com/#features" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Call
function star_addons_widget_call_enable_callback() { 
    $star_addons_widget_call_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_call_enable['star_addons_widget_call_enable'] ) ) :
        $star_addons_widget_call_enable_new = $star_addons_widget_call_enable['star_addons_widget_call_enable'];
    else:
        $star_addons_widget_call_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="call" name="new_settings2[star_addons_widget_call_enable]" value="1" '.checked(1, $star_addons_widget_call_enable_new, false).'>', 'star-addons-for-elementor').__('Call To Action', 'star-addons-for-elementor'); ?>
    <label for="call"></label>
    <a class="starad-element-live-link" href="https://star-addons.mhrtheme.com/#call-to-action" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Photo
function star_addons_widget_photo_enable_callback() { 
    $star_addons_widget_photo_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_photo_enable['star_addons_widget_photo_enable'] ) ) :
        $star_addons_widget_photo_enable_new = $star_addons_widget_photo_enable['star_addons_widget_photo_enable'];
    else:
        $star_addons_widget_photo_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="photo" name="new_settings2[star_addons_widget_photo_enable]" value="1" '.checked(1, $star_addons_widget_photo_enable_new, false).'>', 'star-addons-for-elementor').__('PhotoGallery', 'star-addons-for-elementor'); ?>
    <label for="photo"></label>
    <a class="starad-element-live-link" href="https://newsz.mhrtheme.com/photogallery/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Video
function star_addons_widget_video_enable_callback() { 
    $star_addons_widget_video_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_video_enable['star_addons_widget_video_enable'] ) ) :
        $star_addons_widget_video_enable_new = $star_addons_widget_video_enable['star_addons_widget_video_enable'];
    else:
        $star_addons_widget_video_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="video" name="new_settings2[star_addons_widget_video_enable]" value="1" '.checked(1, $star_addons_widget_video_enable_new, false).'>', 'star-addons-for-elementor').__('VideoGallery', 'star-addons-for-elementor'); ?>
    <label for="video"></label>
    <a class="starad-element-live-link" href="https://newsz.mhrtheme.com/videogallery/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Product
function star_addons_widget_product_enable_callback() { 
    $star_addons_widget_product_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_product_enable['star_addons_widget_product_enable'] ) ) :
        $star_addons_widget_product_enable_new = $star_addons_widget_product_enable['star_addons_widget_product_enable'];
    else:
        $star_addons_widget_product_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="product" name="new_settings2[star_addons_widget_product_enable]" value="1" '.checked(1, $star_addons_widget_product_enable_new, false).'>', 'star-addons-for-elementor').__('Products', 'star-addons-for-elementor'); ?>
    <label for="product"></label>
    <a class="starad-element-live-link" href="https://haine.mhrtheme.com/shop/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Categories
function star_addons_widget_categories_enable_callback() { 
    $star_addons_widget_categories_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_categories_enable['star_addons_widget_categories_enable'] ) ) :
        $star_addons_widget_categories_enable_new = $star_addons_widget_categories_enable['star_addons_widget_categories_enable'];
    else:
        $star_addons_widget_categories_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="categories" name="new_settings2[star_addons_widget_categories_enable]" value="1" '.checked(1, $star_addons_widget_categories_enable_new, false).'>', 'star-addons-for-elementor').__('Product Categories', 'star-addons-for-elementor'); ?>
    <label for="categories"></label>
    <a class="starad-element-live-link" href="https://haine.mhrtheme.com/categories/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Service
function star_addons_widget_service_enable_callback() { 
    $star_addons_widget_service_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_service_enable['star_addons_widget_service_enable'] ) ) :
        $star_addons_widget_service_enable_new = $star_addons_widget_service_enable['star_addons_widget_service_enable'];
    else:
        $star_addons_widget_service_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="service" name="new_settings2[star_addons_widget_service_enable]" value="1" '.checked(1, $star_addons_widget_service_enable_new, false).'>', 'star-addons-for-elementor').__('Services', 'star-addons-for-elementor'); ?>
    <label for="service"></label>
    <a class="starad-element-live-link" href="https://hizmet.mhrtheme.com/service-grid-three-columns/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Portfolio
function star_addons_widget_portfolio_enable_callback() { 
    $star_addons_widget_portfolio_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_portfolio_enable['star_addons_widget_portfolio_enable'] ) ) :
        $star_addons_widget_portfolio_enable_new = $star_addons_widget_portfolio_enable['star_addons_widget_portfolio_enable'];
    else:
        $star_addons_widget_portfolio_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="portfolio" name="new_settings2[star_addons_widget_portfolio_enable]" value="1" '.checked(1, $star_addons_widget_portfolio_enable_new, false).'>', 'star-addons-for-elementor').__('Portfolio', 'star-addons-for-elementor'); ?>
    <label for="portfolio"></label>
    <a class="starad-element-live-link" href="https://hizmet.mhrtheme.com/portfolio-grid/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Pricing
function star_addons_widget_pricing_enable_callback() { 
    $star_addons_widget_pricing_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_pricing_enable['star_addons_widget_pricing_enable'] ) ) :
        $star_addons_widget_pricing_enable_new = $star_addons_widget_pricing_enable['star_addons_widget_pricing_enable'];
    else:
        $star_addons_widget_pricing_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="pricing" name="new_settings2[star_addons_widget_pricing_enable]" value="1" '.checked(1, $star_addons_widget_pricing_enable_new, false).'>', 'star-addons-for-elementor').__('Pricing', 'star-addons-for-elementor'); ?>
    <label for="pricing"></label>
    <a class="starad-element-live-link" href="https://hizmet.mhrtheme.com/pricing-table/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget FAQ
function star_addons_widget_faq_enable_callback() { 
    $star_addons_widget_faq_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_faq_enable['star_addons_widget_faq_enable'] ) ) :
        $star_addons_widget_faq_enable_new = $star_addons_widget_faq_enable['star_addons_widget_faq_enable'];
    else:
        $star_addons_widget_faq_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="faq" name="new_settings2[star_addons_widget_faq_enable]" value="1" '.checked(1, $star_addons_widget_faq_enable_new, false).'>', 'star-addons-for-elementor').__('FAQ', 'star-addons-for-elementor'); ?>
    <label for="faq"></label>
    <a class="starad-element-live-link" href="https://hizmet.mhrtheme.com/faq/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

// Star Addons Widget Coming
function star_addons_widget_coming_enable_callback() { 
    $star_addons_widget_coming_enable = (array)get_option('new_settings2');
    if( isset( $star_addons_widget_coming_enable['star_addons_widget_coming_enable'] ) ) :
        $star_addons_widget_coming_enable_new = $star_addons_widget_coming_enable['star_addons_widget_coming_enable'];
    else:
        $star_addons_widget_coming_enable_new = '';
    endif;
    echo __('<input type="checkbox" id="coming" name="new_settings2[star_addons_widget_coming_enable]" value="1" '.checked(1, $star_addons_widget_coming_enable_new, false).'>', 'star-addons-for-elementor').__('Coming Soon', 'star-addons-for-elementor'); ?>
    <label for="coming"></label>
    <a class="starad-element-live-link" href="https://hizmet.mhrtheme.com/coming-soon/" title="Live Demo" target="_blank"><i class="bx bx-log-in-circle"></i></a>
<?php }

