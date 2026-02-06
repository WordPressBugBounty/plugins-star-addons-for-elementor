<?php

/**
 * Main Star Addons Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.2
 */
final class Elementor_Star_Addons {

	/**
	 * Plugin Version
	 *
	 * @since 1.2
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.2';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.5
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.2
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.2
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Star_Addons The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Star_Addons An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.2
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ] );

		add_action('elementor/init', [$this, 'star_register_new_category']);

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.2
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'star-addons-for-elementor' );

	}

	/**
	 * On Plugins Loaded
	 *
	 * Checks if Elementor has loaded, and performs some compatibility checks.
	 * If All checks pass, inits the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.2
	 *
	 * @access public
	 */
	public function on_plugins_loaded() {

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

	}

	/**
	 * Compatibility Checks
	 *
	 * Checks if the installed version of Elementor meets the plugin's minimum requirement.
	 * Checks if the installed PHP version meets the plugin's minimum requirement.
	 *
	 * @since 1.2
	 *
	 * @access public
	 */
	public function is_compatible() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return false;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return false;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return false;
		}

		return true;

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.2
	 *
	 * @access public
	 */
	public function init() {
	
		$this->i18n();

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
	}

	public function star_register_new_category() {
		\Elementor\Plugin::instance()->elements_manager->add_category(
			'star-elements',
			[
				'title' => esc_html__('Star Addons', 'star-addons-for-elementor'),
				'icon'  => 'fa fa-image'
			]
		);
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.2
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include enable options file
		require_once( __DIR__ . '/class-star-addons-enable.php' );

		// Include widget files
		require_once( __DIR__ . '../../widgets/star-addons-multiple-slider.php' );
		require_once( __DIR__ . '../../widgets/star-addons-slider.php' );
		require_once( __DIR__ . '../../widgets/star-addons-banner.php' );
		require_once( __DIR__ . '../../widgets/star-addons-lp-courses.php' );
		require_once( __DIR__ . '../../widgets/star-addons-lp-course-category.php' );
		require_once( __DIR__ . '../../widgets/star-addons-lp-course-tag.php' );
		require_once( __DIR__ . '../../widgets/star-addons-team.php' );
		require_once( __DIR__ . '../../widgets/star-addons-about-us.php' );
		require_once( __DIR__ . '../../widgets/star-addons-testimonial.php' );
		require_once( __DIR__ . '../../widgets/star-addons-contact.php' );
		require_once( __DIR__ . '../../widgets/star-addons-blog.php' );
		require_once( __DIR__ . '../../widgets/star-addons-header.php' );
		require_once( __DIR__ . '../../widgets/star-addons-footer.php' );
		require_once( __DIR__ . '../../widgets/star-addons-demos.php' );
		require_once( __DIR__ . '../../widgets/star-addons-features.php' );
		require_once( __DIR__ . '../../widgets/star-addons-call-to-action.php' );
		require_once( __DIR__ . '../../widgets/star-addons-photo-gallery.php' );
		require_once( __DIR__ . '../../widgets/star-addons-video-gallery.php' );
		require_once( __DIR__ . '../../widgets/star-addons-product.php' );
		require_once( __DIR__ . '../../widgets/star-addons-product-category.php' );
		require_once( __DIR__ . '../../widgets/star-addons-service.php' );
		require_once( __DIR__ . '../../widgets/star-addons-portfolio.php' );
		require_once( __DIR__ . '../../widgets/star-addons-pricing.php' );
		require_once( __DIR__ . '../../widgets/star-addons-faq.php' );
		require_once( __DIR__ . '../../widgets/star-addons-coming-soon.php' );

		// Register star addons widgets
		if( $star_addons_widget_multiple_slider_enable_new ) :
		    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Multiple_Slider_Widget() );
		endif;
		if( $star_addons_widget_slider_enable_new ) :
		    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Slider_Widget() );
		endif;
		if( $star_addons_widget_banner_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Banner_Widget() );
		endif;
		if( $star_addons_widget_course_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_LP_Course_Widget() );
		endif;
		if( $star_addons_widget_category_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_LP_Course_Category_Widget() );
		endif;
		if( $star_addons_widget_tag_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_LP_Course_Tag_Widget() );
		endif;
		if( $star_addons_widget_team_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Team_Widget() );
		endif;
		if( $star_addons_widget_about_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_About_Widget() );
		endif;
		if( $star_addons_widget_testimonial_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Testimonial_Widget() );
		endif;
		if( $star_addons_widget_contact_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Contact_Widget() );
		endif;
		if( $star_addons_widget_blog_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Blog_Widget() );
		endif;
		if( $star_addons_widget_header_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Header_Widget() );
		endif;
		if( $star_addons_widget_footer_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Footer_Widget() );
		endif;
		if( $star_addons_widget_demos_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Demos_Widget() );
		endif;
		if( $star_addons_widget_features_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Features_Widget() );
		endif;
		if( $star_addons_widget_call_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Call_To_Action_Widget() );
		endif;
		if( $star_addons_widget_photo_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Photo_Gallery_Widget() );
		endif;
		if( $star_addons_widget_video_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Video_Gallery_Widget() );
		endif;
		if( $star_addons_widget_product_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Product_Widget() );
		endif;
		if( $star_addons_widget_categories_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Product_Category_Widget() );
		endif;
		if( $star_addons_widget_service_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Service_Widget() );
		endif;
		if( $star_addons_widget_portfolio_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Portfolio_Widget() );
		endif;
		if( $star_addons_widget_pricing_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Pricing_Widget() );
		endif;
		if( $star_addons_widget_faq_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Faq_Widget() );
		endif;
		if( $star_addons_widget_coming_enable_new ) :
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Coming_Soon_Widget() );
		endif;
	}
	
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.2
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( file_exists( WP_PLUGIN_DIR . '/elementor/elementor.php' ) ) {
	        $star_notice_title = __( 'Activate Elementor', 'star-addons-for-elementor' );
	        $star_notice_url = wp_nonce_url( 'plugins.php?action=activate&plugin=elementor/elementor.php&plugin_status=all&paged=1', 'activate-plugin_elementor/elementor.php' );
	    }else{
	        $star_notice_title = __( 'Install Elementor', 'star-addons-for-elementor' );
	        $star_notice_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
	    }

	    $star_notice = star_kses_intermediate( sprintf(
	        __( '%1$s requires %2$s to be installed and activated. %3$s', 'star-addons-for-elementor' ),
	        '<strong>' . __( 'Star Addons for Elementor', 'star-addons-for-elementor' ) . '</strong>',
	        '<strong>' . __( 'Elementor', 'star-addons-for-elementor' ) . '</strong>',
	        '<a href="' . esc_url( $star_notice_url ) . '">' . $star_notice_title . '</a>'
	    ) );

	    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $star_notice );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.2
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'star-addons-for-elementor' ),
			'<strong>' . esc_html__( 'Star Addons for Elementor', 'star-addons-for-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'star-addons-for-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.2
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'star-addons-for-elementor' ),
			'<strong>' . esc_html__( 'Star Addons for Elementor', 'star-addons-for-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'star-addons-for-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

}

Elementor_Star_Addons::instance();