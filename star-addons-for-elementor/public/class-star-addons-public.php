<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://mhrtheme.com
 * @since      1.2
 *
 * @package    Star_Addons_For_Elementor
 * @subpackage Star_Addons_For_Elementor/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Star_Addons_For_Elementor
 * @subpackage Star_Addons_For_Elementor/public
 * @author     MhrTheme <hello@mhrtheme.com>
 */
class Star_Addons_For_Elementor_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.2
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.2
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.2
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.2
	 */
	public function enqueue_styles() {
        
        wp_enqueue_style( 'star-addons-bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );

        $classes = get_body_class();

		if (! in_array('learnpress-page', $classes) ) {	
            wp_enqueue_style( 'star-addons-learnpress', plugin_dir_url( __FILE__ ) . 'css/learnpress.css', array(), $this->version, 'all' );
        }

        wp_enqueue_style( 'star-addons-owl-carousel', plugin_dir_url( __FILE__ ) . 'css/owl.carousel.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-owl-theme-default', plugin_dir_url( __FILE__ ) . 'css/owl.theme.default.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-animate', plugin_dir_url( __FILE__ ) . 'css/animate.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-meanmenu', plugin_dir_url( __FILE__ ) . 'css/meanmenu.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-aos', plugin_dir_url( __FILE__ ) . 'css/aos.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-font-awesome', plugin_dir_url( __FILE__ ) . 'css/star-addons-font-awesome.css', array(), $this->version, 'all' );

        wp_enqueue_style( 'star-addons-boxicons', plugin_dir_url( __FILE__ ) . 'css/star-addons-boxicons.min.css', array(), $this->version, 'all' );

        wp_enqueue_style( 'star-addons-remix', plugin_dir_url( __FILE__ ) . 'css/star-addons-remixicon.css', array(), $this->version, 'all' );

        wp_enqueue_style( 'star-addons-flaticon', plugin_dir_url( __FILE__ ) . 'fonts/flaticon_mycollection.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-odometer', plugin_dir_url( __FILE__ ) . 'css/odometer.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-magnific-popup', plugin_dir_url( __FILE__ ) . 'css/magnific-popup.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-woocommerce-main', plugin_dir_url( __FILE__ ) . 'css/woocommerce-main.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-woocommerce-responsive', plugin_dir_url( __FILE__ ) . 'css/woocommerce-responsive.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-magnific-popup', plugin_dir_url( __FILE__ ) . 'css/magnific-popup.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-public', plugin_dir_url( __FILE__ ) . 'css/star-addons-public.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'star-addons-public-responsive', plugin_dir_url( __FILE__ ) . 'css/star-addons-public-responsive.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.2
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( 'star-addons-bootstrap', plugin_dir_url( __FILE__ ) . 'js/bootstrap-bundle-min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'star-addons-owl-carousel', plugin_dir_url( __FILE__ ) . 'js/owl.carousel.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'star-addons-aos', plugin_dir_url( __FILE__ ) . 'js/aos.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'star-addons-meanmenu', plugin_dir_url( __FILE__ ) . 'js/meanmenu.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'star-addons-popper', plugin_dir_url( __FILE__ ) . 'js/popper.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'star-addons-odometer', plugin_dir_url( __FILE__ ) . 'js/odometer.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'star-addons-wow', plugin_dir_url( __FILE__ ) . 'js/wow.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'star-addons-magnific-popup', plugin_dir_url( __FILE__ ) . 'js/magnific-popup.min.js', array( 'jquery' ), $this->version, false );

	}

}
