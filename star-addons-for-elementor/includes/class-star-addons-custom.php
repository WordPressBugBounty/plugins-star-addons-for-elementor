<?php

/**
 * Get a list of all the allowed html tags.
 */
function star_get_allowed_html_tags($level = 'basic') {
	$allowed_html = [
		'b'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'i'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'u'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		's'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'br'     => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'em'     => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'del'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'ins'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'sub'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'sup'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'code'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'mark'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'small'  => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'strike' => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'abbr'   => [
			'title' => [],
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'span'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'strong' => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
	];

	if ('intermediate' === $level) {
		$tags = [
			'a'       => [
				'href'  => [],
				'title' => [],
				'class' => [],
				'id'    => [],
				'style' => [],
			],
			'q'       => [
				'cite'  => [],
				'class' => [],
				'id'    => [],
				'style' => [],
			],
			'img'     => [
				'src'    => [],
				'alt'    => [],
				'height' => [],
				'width'  => [],
				'class'  => [],
				'id'     => [],
				'style'  => [],
			],
			'dfn'     => [
				'title' => [],
				'class' => [],
				'id'    => [],
				'style' => [],
			],
			'time'    => [
				'datetime' => [],
				'class'    => [],
				'id'       => [],
				'style'    => [],
			],
			'cite'    => [
				'title' => [],
				'class' => [],
				'id'    => [],
				'style' => [],
			],
			'acronym' => [
				'title' => [],
				'class' => [],
				'id'    => [],
				'style' => [],
			],
			'hr'      => [
				'class' => [],
				'id'    => [],
				'style' => [],
			],
		];

		$allowed_html = array_merge($allowed_html, $tags);
	}

	return $allowed_html;
}

/**
 * Strip all the tags except allowed html tags
 */
function star_kses_intermediate($string = '') {
	return wp_kses($string, star_get_allowed_html_tags('intermediate'));
}

/**
 * Strip all the tags except allowed html tags
 */
function star_kses_basic($string = '') {
	return wp_kses($string, star_get_allowed_html_tags('basic'));
}

/**
 * Check a plugin activate
 */
function star_addons_plugin_active( $plugin ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( $plugin ) ) {
		return true;
	}
	return false;
}

/**
 * LearnPress Course List
 */
function star_addons_get_course_as_list() {
    $args = wp_parse_args(array(
        'post_type' => 'lp_course',
        'numberposts' => -1,
    ));

    $posts = get_posts($args);
    $post_options = array('' => '');

    if ($posts) {
        foreach ($posts as $post) {
            $post_options[$post->post_title] = $post->ID;
        }
    }
    $flipped = array_flip($post_options);
    return $flipped;
}

/**
 * LearnPress Course Category List
 */
function star_addons_get_courses_cat_list() {
	if ( ! star_addons_plugin_active( 'learnpress/learnpress.php' ) ) {
		return;
	}
	$courses_category_id = get_queried_object_id();
	$args = array(
		'parent' => $courses_category_id
	);

	$terms = get_terms( 'course_category', get_the_ID());
	$cat_options = array('' => __('Select A Category', 'star-addons-for-elementor'));

	if ($terms) {
		foreach ($terms as $term) {
			$cat_options[$term->name] = $term->name;
		}
	}
	return $cat_options;
}

/**
 * Default Page list
 */
function star_addons_get_page_as_list() {
    $args = wp_parse_args(array(
        'post_type' => 'page',
        'numberposts' => -1,
    ));

    $posts = get_posts($args);
    $post_options = array(esc_html__('Select A Page', 'star-addons-for-elementor') => '');

    if ($posts) {
        foreach ($posts as $post) {
            $post_options[$post->post_title] = $post->ID;
        }
    }
    $flipped = array_flip($post_options);
    return $flipped;
}

/**
 * Elementor Version Check For Icon Library
 */
function star_is_elementor_version($operator = '<', $version = '1.1') {
	return defined('ELEMENTOR_VERSION') && version_compare(ELEMENTOR_VERSION, $version, $operator);
}

/**
 * Elementor Icon Library
 */
function star_addons_render_icon($settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = []) {
	$migrated = isset($settings['__fa4_migrated'][$new_icon_id]);
	$is_new = empty($settings[$old_icon_id]);

	$attributes['aria-hidden'] = 'true';

	if (star_is_elementor_version('>=', '1.1') && ($is_new || $migrated)) {
		\Elementor\Icons_Manager::render_icon($settings[$new_icon_id], $attributes);
	} else {
		if (empty($attributes['class'])) {
			$attributes['class'] = $settings[$old_icon_id];
		} else {
			if (is_array($attributes['class'])) {
				$attributes['class'][] = $settings[$old_icon_id];
			} else {
				$attributes['class'] .= ' ' . $settings[$old_icon_id];
			}
		}
		printf('<i %s></i>', \Elementor\Utils::render_html_attributes($attributes));
	}
}

// Contact Forms List
function star_addons_get_wpcf7_list() {
    $options = array();
    if (function_exists('wpcf7')) {
        $wpcf7_form_list = get_posts(array(
            'post_type' => 'wpcf7_contact_form',
            'showposts' => 999
        ));
        $options[0] = esc_html('Select a Contact Form', 'star-addons-for-elementor');
        if (!empty($wpcf7_form_list) && !is_wp_error($wpcf7_form_list)) {
            foreach ($wpcf7_form_list as $post) {
                $options[$post->ID] = $post->post_title;
            }
        } else {
            $options[0] = esc_html('Create a Form First', 'star-addons-for-elementor');
        }
    }
    return $options;
}

/**
 * Blog Category List
 */
function star_addons_get_blog_cat_list() {
	$blog_category_id = get_queried_object_id();
	$args = array(
		'parent' => $blog_category_id
	);

	$terms = get_terms( 'category', get_the_ID());
	$cat_options = array('' => __('Select A Category', 'star-addons-for-elementor'));

	if ($terms) {
		foreach ($terms as $term) {
			$cat_options[$term->name] = $term->name;
		}
	}
	return $cat_options;
}

/**
 * Get the existing menus in array format
 * @return array
 */
function star_addons_get_menu_array() {
    $star_addons_menus = wp_get_nav_menus();
    //$star_addons_menu_array = [];
    $star_addons_menu_array = array('' => __('Select A Menu', 'star-addons-for-elementor'));
    foreach ( $star_addons_menus as $star_addons_menu ) {
        $star_addons_menu_array[$star_addons_menu->slug] = $star_addons_menu->name;
    }
    return $star_addons_menu_array;
}

// JS Load From Footer
if  ( ! function_exists( 'star_addons_scripts' ) ) :

	function star_addons_scripts() {

		wp_enqueue_script( 'star-addons-public', plugin_dir_url( __FILE__ ) . '../public/js/star-addons-public.js', array( 'jquery' ), false );
	}
	add_action('wp_footer', 'star_addons_scripts');

endif;

// Sidebar Register
function star_addons_sidebar() {
	register_sidebar(array(
        'name'          => 'Star Addons Footer',
        'description'   => __('Add widgets here to appear in your star addons footer', 'star-addons-for-elementor'),
        'id'            => 'star-addons-footer',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
        'before_widget' => '<div class="col-lg-3 col-sm-12 col-md-6"><div class="single-footer-widget">',
        'after_widget' =>'</div></div>'
    ));
    if ( star_addons_plugin_active( 'woocommerce/woocommerce.php' ) ) { 
	    register_sidebar(array(
	        'name'          => 'Star Addons Shop Sidebar',
	        'id'            => 'star-addons-shop-sidebar',
	        'description'   => esc_html__( 'Add widgets here.', 'star-addons-for-elementor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
	    ));
    }
}

add_action('widgets_init' , 'star_addons_sidebar');

/**
 * Product Category List
 */
function star_addons_get_products_cat_list() {
	$products_category_id = get_queried_object_id();
	$args = array(
		'parent' => $products_category_id
	);

	$terms = get_terms( 'product_cat', get_the_ID());
	$cat_options = array(esc_html__('', 'star-addons-for-elementor') => 'Select A Category');
    
    if ( star_addons_plugin_active( 'woocommerce/woocommerce.php' ) ) { 
		if ($terms) {
			foreach ($terms as $term) {
				$cat_options[$term->name] = $term->name;
			}
		}
    }
	return $cat_options;
}

/**
 * Product Category Slug List
 */
function star_addons_get_products_cat_slug_list() {
	$products_category_id = get_queried_object_id();
	$args = array(
		'parent' => $products_category_id
	);

	$terms = get_terms( 'product_cat', get_the_ID());
	$cat_options = array(esc_html__('', 'star-addons-for-elementor') => 'Select A Category');
    
    if ( star_addons_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		if ($terms) {
			foreach ($terms as $term) {
				$cat_options[$term->slug] = $term->name;
			}
		}
	}
	return $cat_options;
}

/**
 * Product Short Description Length
 */
add_filter('woocommerce_short_description', 'star_addons_woocommerce_short_description', 10, 1);
function star_addons_woocommerce_short_description($post_excerpt){
    if ( ! is_product() ) {
        $post_excerpt = substr($post_excerpt, 0, 110);
    }
    return $post_excerpt;
}

/**
 * Custom Posts Register
 */
function star_addons_custom_posts() {

    register_post_type('star-add-services',
        array(
            'labels' => array(
                'name' => esc_html__('Services', 'star-addons-for-elementor'),
                'singular_name' => esc_html__('Service', 'star-addons-for-elementor'),
            ),
            'menu_icon'             => 'dashicons-feedback',
            'supports'              => array('title', 'editor', 'thumbnail'),
            'public'                => true,
            'show_in_rest'          => true,
            'publicly_queryable'    => true,
            'has_archive'           => false,
            'taxonomies '           => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => true,
            'exclude_from_search'   => false,
            'capability_type'       => 'post',
            'yarpp_support'         => true
        )
	);

	register_post_type('star-add-portfolio',
        array(
            'labels' => array(
                'name' => esc_html__('Portfolio', 'star-addons-for-elementor'),
                'singular_name' => esc_html__('Portfolio', 'star-addons-for-elementor'),
            ),
            'menu_icon'             => 'dashicons-portfolio',
            'supports'              => array('title', 'editor', 'thumbnail'),
            'public'                => true,
            'show_in_rest'          => true,
            'publicly_queryable'    => true,
            'has_archive'           => false,
            'taxonomies '           => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => true,
            'exclude_from_search'   => false,
            'capability_type'       => 'post',
            'yarpp_support'         => true
        )
	);
}

add_action('init', 'star_addons_custom_posts');
