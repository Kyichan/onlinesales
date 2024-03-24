<?php
/**
 * Plugin Name: Product Category
 * Description: Showcase your Product Categories on any Page or Post with different styles.
 * Version: 1.4.0
 * Author: Kushang Tailor
 * Author URI:        https://profiles.wordpress.org/kushang78/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.html
 *
 * @author Kushang Tailor
 * @package Product Category
 * @version 1.4.0
 **/

if ( ! defined( 'PCW_PLUGIN_PATH' ) ) {
	define( 'PCW_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
	define( 'PCW_PLUGIN_VERSION', '1.4.0' );
}

// Check required plugin is activated or not with Admin Notice.
require_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) :
	include PCW_PLUGIN_PATH . '/includes/widget/woo-product-category-widget.php';
	include PCW_PLUGIN_PATH . '/includes/shortcode/shortcode.php';
	include PCW_PLUGIN_PATH . '/includes/elementor-widget/elementor-pcw-widget.php';

	/**
	 * Admin success Notices.
	 *
	 * @since 1.0.0
	 */
	function pcw_success_notice_hook_activation() {
		set_transient( 'pcw_success_notice_hook', true, 5 );
	}
	register_activation_hook( __FILE__, 'pcw_success_notice_hook_activation' );

	/**
	 * Admin success Notices.
	 *
	 * @since 1.0.0
	 */
	function pcw_success_notice() {
		if ( get_transient( 'pcw_success_notice_hook' ) ) {
			?>
			<div class="notice notice-success is-dismissible">
				<p><?php echo wp_kses_post( 'Done!.Product Category Plugin is ready to use. Thank You For Installing.', 'product-category' ); ?></p>
			</div>
			<?php
			delete_transient( 'pcw_success_notice_hook' );
		}
	}
	add_action( 'admin_notices', 'pcw_success_notice' );
else :
	/**
	 * Admin error Notices.
	 *
	 * @since 1.0.0
	 */
	function pcw_error_notice() {
		?>
		<div class="error notice">
			<p><?php echo wp_kses_post( '<b>This following plugins are recommended <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce</a></b> Plugin is not install OR activated!. Please install OR activate this plugin to use product category plugin', 'product-category' ); ?></p>
		</div>
		<?php
	}
	add_action( 'admin_notices', 'pcw_error_notice' );
endif;

/**
 * Load Stylesheet with wp_enqueue_style.
 *
 * @since 1.0.0
 */
function pcw_enqueue_style() {
	wp_register_style( 'style', plugins_url( '/admin/css/style.css', __FILE__ ), array(), PCW_PLUGIN_VERSION );
	wp_enqueue_style( 'style' );

	wp_register_style( 'admin-style', plugins_url( '/admin/css/admin.css', __FILE__ ), array(), PCW_PLUGIN_VERSION );
	wp_enqueue_style( 'admin-style' );

	wp_register_style( 'responsive', plugins_url( '/admin/css/responsive.css', __FILE__ ), array(), PCW_PLUGIN_VERSION );
	wp_enqueue_style( 'responsive' );
}
add_action( 'init', 'pcw_enqueue_style' );

/**
 * Load Google Fonts.
 *
 * @since 1.0.0
 */
function pcw_add_google_fonts() {
	wp_enqueue_style( 'google_web_fonts', 'https://fonts.googleapis.com/css?family=Amaranth|Arvo|Bungee+Shade|Chango|Courgette|Great+Vibes|Josefin+Sans|Lato|Lobster|Marvel|Montserrat|Open+Sans|Oswald|Poppins|Raleway|Roboto|Salsa|Special+Elite|Titillium+Web|Trade+Winds', array(), PCW_PLUGIN_VERSION );
}
add_action( 'wp_enqueue_scripts', 'pcw_add_google_fonts' );

/**
 * Custom 'Settings' link.
 *
 * @since 1.0.0
 * @param array $links - Custom 'Settings' link.
 */
function pcw_settings_link( $links ) {
	$settings_link = '<a href="admin.php?page=pcw_slug">Settings</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

$plugin_path = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin_path", 'pcw_settings_link' );


/**
 * Load the language file.
 *
 * @since 1.0.0
 */
function load_plugin_product_category() {
	$domain  = 'product-category';
	$mo_file = WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . get_locale() . '.mo';

	load_textdomain( $domain, $mo_file );
	load_plugin_textdomain( $domain, false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}
add_action( 'init', 'load_plugin_product_category' );
