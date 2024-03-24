<?php

/**
* Get started notice
*/

add_action( 'wp_ajax_ecommerce_mega_store_dismissed_notice_handler', 'ecommerce_mega_store_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function ecommerce_mega_store_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function ecommerce_mega_store_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>

            <?php
            $current_screen = get_current_screen();
				if ($current_screen->id !== 'appearance_page_ecommerce-mega-store-guide-page') {
             $ecommerce_mega_store_comments_theme = wp_get_theme(); ?>
            <div class="ecommerce-mega-store-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
			<div class="ecommerce-mega-store-notice">
				<div class="ecommerce-mega-store-notice-img">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/admin-logo.png'); ?>" alt="<?php esc_attr_e('logo', 'ecommerce-mega-store'); ?>">
				</div>
				<div class="ecommerce-mega-store-notice-content">
					<div class="ecommerce-mega-store-notice-heading"><?php esc_html_e('Thanks for installing ','ecommerce-mega-store'); ?><?php echo esc_html( $ecommerce_mega_store_comments_theme ); ?></div>
					<p><?php printf(__('In order to fully benefit from everything our theme has to offer, please make sure you visit our <a href="%s">For Premium Options</a>.', 'ecommerce-mega-store'), esc_url(admin_url('themes.php?page=ecommerce-mega-store-guide-page'))); ?></p>
					<?php if (is_child_theme()) { ?>
						<?php $child_theme = wp_get_theme(); ?>
						<?php printf(esc_html__('You\'re using %1$s theme, It\'s a child theme of %2$s.', 'ecommerce-mega-store'), '<strong>' . $child_theme->Name . '</strong>', '<strong>' . esc_html__('ecommerce_mega_store', 'ecommerce-mega-store') . '</strong>'); 
						?>
						<?php
						$copy_link_args = array(
							'page' => 'ecommerce-mega-store',
							'action' => 'show_copy_settings',
						);
						$copy_link = add_query_arg($copy_link_args, admin_url('themes.php'));
						?>
						<?php printf('%s <a href="%s" class="go-to-setting">%s</a>', esc_html__('Now you can copy setting data from parent theme to this child theme', 'ecommerce-mega-store'), esc_url($copy_link), esc_html__('Copy Settings', 'ecommerce-mega-store')); ?>
					<?php } ?>
				</div>
			</div>
		</div>
        <?php }
	}
}

add_action( 'admin_notices', 'ecommerce_mega_store_deprecated_hook_admin_notice' );

add_action( 'admin_menu', 'ecommerce_mega_store_getting_started' );
function ecommerce_mega_store_getting_started() {
	add_theme_page( esc_html__('Get Started', 'ecommerce-mega-store'), esc_html__('Get Started', 'ecommerce-mega-store'), 'edit_theme_options', 'ecommerce-mega-store-guide-page', 'ecommerce_mega_store_test_guide');
}

function ecommerce_mega_store_admin_enqueue_scripts() {
	wp_enqueue_style( 'ecommerce-mega-store-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
	wp_enqueue_script( 'ecommerce-mega-store-admin-script', get_template_directory_uri() . '/js/ecommerce-mega-store-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'ecommerce-mega-store-admin-script', 'ecommerce_mega_store_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'ecommerce_mega_store_admin_enqueue_scripts' );

if ( ! defined( 'ECOMMERCE_MEGA_STORE_DOCS_FREE' ) ) {
define('ECOMMERCE_MEGA_STORE_DOCS_FREE',__('https://www.misbahwp.com/docs/ecommerce-mega-store-free-docs/','ecommerce-mega-store'));
}
if ( ! defined( 'ECOMMERCE_MEGA_STORE_DOCS_PRO' ) ) {
define('ECOMMERCE_MEGA_STORE_DOCS_PRO',__('https://www.misbahwp.com/docs/ecommerce-mega-store-pro-docs','ecommerce-mega-store'));
}
if ( ! defined( 'ECOMMERCE_MEGA_STORE_BUY_NOW' ) ) {
define('ECOMMERCE_MEGA_STORE_BUY_NOW',__('https://www.misbahwp.com/themes/ecommerce-mega-store-wordpress-theme/','ecommerce-mega-store'));
}
if ( ! defined( 'ECOMMERCE_MEGA_STORE_SUPPORT_FREE' ) ) {
define('ECOMMERCE_MEGA_STORE_SUPPORT_FREE',__('https://wordpress.org/support/theme/ecommerce-mega-store','ecommerce-mega-store'));
}
if ( ! defined( 'ECOMMERCE_MEGA_STORE_REVIEW_FREE' ) ) {
define('ECOMMERCE_MEGA_STORE_REVIEW_FREE',__('https://wordpress.org/support/theme/ecommerce-mega-store/reviews/#new-post','ecommerce-mega-store'));
}
if ( ! defined( 'ECOMMERCE_MEGA_STORE_DEMO_PRO' ) ) {
define('ECOMMERCE_MEGA_STORE_DEMO_PRO',__('https://www.misbahwp.com/demo/mega-store-ecommerce/','ecommerce-mega-store'));
}
if( ! defined( 'ECOMMERCE_MEGA_STORE_THEME_BUNDLE' ) ) {
define('ECOMMERCE_MEGA_STORE_THEME_BUNDLE',__('https://www.misbahwp.com/themes/wordpress-bundle/','ecommerce-mega-store'));
}

function ecommerce_mega_store_test_guide() { ?>
	<?php $ecommerce_mega_store_theme = wp_get_theme(); ?>
	
	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( ECOMMERCE_MEGA_STORE_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'ecommerce-mega-store' ) ?></a>			
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'ecommerce-mega-store' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( ECOMMERCE_MEGA_STORE_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'ecommerce-mega-store' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( ECOMMERCE_MEGA_STORE_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'ecommerce-mega-store' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','ecommerce-mega-store'); ?><?php echo esc_html( $ecommerce_mega_store_theme ); ?>  <span><?php esc_html_e('Version: ', 'ecommerce-mega-store'); ?><?php echo esc_html($ecommerce_mega_store_theme['Version']);?></span></h3>
				<img class="img_responsive" style="width:100%;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				<div id="description-inside">
					<?php
						$ecommerce_mega_store_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $ecommerce_mega_store_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>
		<div id="righty">
			<div class="postboxx donate">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'ecommerce-mega-store' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','ecommerce-mega-store'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( ECOMMERCE_MEGA_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'ecommerce-mega-store' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( ECOMMERCE_MEGA_STORE_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'ecommerce-mega-store' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( ECOMMERCE_MEGA_STORE_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'ecommerce-mega-store' ) ?></a>
					</div>
				</div>

				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'ecommerce-mega-store' ); ?></h3>
				<div class="inside theme-bundle">
					<p class="offer"><?php esc_html_e('Get 50+ Perfect WordPress Theme In A Single Package at just $79."','ecommerce-mega-store'); ?></p>
					<p class="coupon"><?php esc_html_e('Exclusive Offer !! Get Our Theme Pack of 60+ WordPress Themes At 10% Off','ecommerce-mega-store'); ?><span class="coupon-code"><?php esc_html_e('"Themespack10"','ecommerce-mega-store'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( ECOMMERCE_MEGA_STORE_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'ecommerce-mega-store' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','ecommerce-mega-store'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','ecommerce-mega-store'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','ecommerce-mega-store'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','ecommerce-mega-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>		    
	  		</div>
			</div>
		</div>
	</div>

<?php } ?>
