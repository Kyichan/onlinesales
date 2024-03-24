<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function ecommerce_mega_store_enqueue_google_fonts() {
	wp_enqueue_style( 'google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' );

	wp_enqueue_style( 'google-fonts-great-vibes', 'https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'ecommerce_mega_store_enqueue_google_fonts' );

if (!function_exists('ecommerce_mega_store_enqueue_scripts')) {

	function ecommerce_mega_store_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css',
			get_template_directory_uri() . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

		wp_enqueue_style( 'ecommerce-mega-store-block-style', get_theme_file_uri('/css/blocks.css') );

		wp_enqueue_style('ecommerce-mega-store-style', get_stylesheet_uri(), array() );

		wp_style_add_data('ecommerce-mega-store-style', 'rtl', 'replace');

		wp_enqueue_style(
			'ecommerce-mega-store-media-css',
			get_template_directory_uri() . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'ecommerce-ecommerce-mega-store-css',
			get_template_directory_uri() . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'ecommerce-mega-store-navigation',
			get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js',
			get_template_directory_uri() . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'ecommerce-mega-store-script',
			get_template_directory_uri() . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$css = '';

		if ( get_header_image() ) :

			$css .=  '
				#site-navigation,.page-template-frontpage #site-navigation{
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'ecommerce-mega-store-style', $css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'ecommerce-mega-store-style',$ecommerce_mega_store_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'ecommerce_mega_store_enqueue_scripts' );

}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('ecommerce_mega_store_after_setup_theme')) {

	function ecommerce_mega_store_after_setup_theme() {

		if ( ! isset( $content_width ) ) $content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'ecommerce-mega-store' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'wp-block-styles' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-background', array(
		  'default-color' => 'f3f3f3'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'width' => 1920,
			'height' => 100,
			'flex-height' => true,
			'flex-width' => true,
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'ecommerce_mega_store_after_setup_theme', 999 );

}

require get_template_directory() .'/core/includes/main.php';
require get_template_directory() .'/core/includes/tgm.php';
require get_template_directory() . '/core/includes/customizer.php';
load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue theme logo style */
/*-----------------------------------------------------------------------------------*/
function ecommerce_mega_store_logo_resizer() {

    $ecommerce_mega_store_theme_logo_size_css = '';
    $ecommerce_mega_store_logo_resizer = get_theme_mod('ecommerce_mega_store_logo_resizer');

	$ecommerce_mega_store_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($ecommerce_mega_store_logo_resizer).'px !important;
			width: '.esc_attr($ecommerce_mega_store_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'ecommerce-mega-store-style',$ecommerce_mega_store_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'ecommerce_mega_store_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function ecommerce_mega_store_global_color() {

    $ecommerce_mega_store_theme_color_css = '';
    $ecommerce_mega_store_global_color = get_theme_mod('ecommerce_mega_store_global_color');
    $ecommerce_mega_store_global_color_2 = get_theme_mod('ecommerce_mega_store_global_color_2');
		$ecommerce_mega_store_copyright_bg = get_theme_mod('ecommerce_mega_store_copyright_bg');

	$ecommerce_mega_store_theme_color_css = '
		.topheader,p.slider-button a,.slider button.owl-prev i:hover, .slider button.owl-next i:hover,#our-collection .box .box-content,#our-collection .tab-product:hover span.onsale,.comment-respond input#submit:hover,.comment-reply a:hover,.sidebar-area .tagcloud a:hover,footer,.scroll-up a:hover,nav.woocommerce-MyAccount-navigation ul li:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce a.added_to_cart:hover,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.sidebar-area h4.title, p.wp-block-tag-cloud a, .wp-block-button__link, .sidebar-area h4.title, .sidebar-area h1.wp-block-heading, .sidebar-area h2.wp-block-heading, .sidebar-area h3.wp-block-heading, .sidebar-area h4.wp-block-heading, .sidebar-area h5.wp-block-heading, .sidebar-area h6.wp-block-heading, .sidebar-area .wp-block-search__label, .sidebar-area .wp-block-search__button{
			background: '.esc_attr($ecommerce_mega_store_global_color).';
		}
		h1,h2,h3,h4,h5,h6,a,.translation-box .skiptranslate.goog-te-gadget,.logo a,.logo span,.header-search .open-search-form i,#main-menu ul li a,#main-menu ul.children li a ,#main-menu ul.sub-menu li a,pre,.blog_box,.blog_box h3,#our-collection h2,#our-collection button.tablinks,#our-collection button.tablinks.active,#our-collection button:hover,#our-collection p{
			color: '.esc_attr($ecommerce_mega_store_global_color).';
		}
		.sidebar-area h4.title,.sidebar-area select,.sidebar-area textarea, #comments textarea,.sidebar-area input[type="text"], #comments input[type="text"],.sidebar-area input[type="password"],.sidebar-area input[type="datetime"],.sidebar-area input[type="datetime-local"],.sidebar-area input[type="date"],.sidebar-area input[type="month"],.sidebar-area input[type="time"],.sidebar-area input[type="week"],.sidebar-area input[type="number"],.sidebar-area input[type="url"],.sidebar-area input[type="search"],.sidebar-area input[type="tel"],.sidebar-area input[type="color"],.sidebar-area .uneditable-input,#comments input[type="email"],#comments input[type="url"],.sh2{
			border-color: '.esc_attr($ecommerce_mega_store_global_color).';
		}
		.social-links i:hover,span.cart-item-box,#main-menu ul.children li a:hover,#main-menu ul.sub-menu li a:hover,p.slider-button a:hover,.slider button.owl-prev i, .slider button.owl-next i,.pagination .nav-links a:hover,.pagination .nav-links a:focus,.pagination .nav-links span.current,.ecommerce-mega-store-pagination span.current,.ecommerce-mega-store-pagination span.current:hover,.ecommerce-mega-store-pagination span.current:focus,.ecommerce-mega-store-pagination a span:hover,.ecommerce-mega-store-pagination a span:focus,.comment-respond input#submit,.comment-reply a,.sidebar-area .tagcloud a,.searchform input[type=submit],.searchform input[type=submit]:hover ,.searchform input[type=submit]:focus,.scroll-up a,nav.woocommerce-MyAccount-navigation ul li,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce a.added_to_cart,.menu-toggle,.dropdown-toggle,button.close-menu,#our-collection span.onsale{
			background: '.esc_attr($ecommerce_mega_store_global_color_2).';
		}
		a:hover,a:focus,#main-menu a:hover,#main-menu ul li a:hover,#main-menu li:hover > a,#main-menu a:focus,#main-menu ul li a:focus,#main-menu li.focus > a,#main-menu li:focus > a,#main-menu ul li.current-menu-item > a,#main-menu ul li.current_page_item > a,#main-menu ul li.current-menu-parent > a,#main-menu ul li.current_page_ancestor > a,#main-menu ul li.current-menu-ancestor > a,.post-meta i,.woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price,#our-collection ins span.woocommerce-Price-amount.amount,#our-collection h5 a,#our-collection h4,.post-single a, .page-single a, .sidebar-area .textwidget a, .comment-content a, .woocommerce-product-details__short-description a, #tab-description a, .extra-home-content a{
			color: '.esc_attr($ecommerce_mega_store_global_color_2).';
		}
		#our-collection button.tablinks.active{
			color: '.esc_attr($ecommerce_mega_store_global_color_2).'!important;
		}
		.sidebar-area h4.title, .sidebar-area h1.wp-block-heading, .sidebar-area h2.wp-block-heading, .sidebar-area h3.wp-block-heading, .sidebar-area h4.wp-block-heading, .sidebar-area h5.wp-block-heading, .sidebar-area h6.wp-block-heading, .sidebar-area .wp-block-search__label{
			border-color: '.esc_attr($ecommerce_mega_store_global_color_2).';
		}
		.copyright {
			background: '.esc_attr($ecommerce_mega_store_copyright_bg).';
		}
	';
    wp_add_inline_style( 'ecommerce-mega-store-style',$ecommerce_mega_store_theme_color_css );
    wp_add_inline_style( 'ecommerce-ecommerce-mega-store-css',$ecommerce_mega_store_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'ecommerce_mega_store_global_color' );

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('ecommerce_mega_store_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function ecommerce_mega_store_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'ecommerce-mega-store');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'ecommerce-mega-store'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php /* translators: %s: Date */ printf( esc_attr('%1$s at %2$s', '1: date, 2: time', 'ecommerce-mega-store'), esc_attr( get_comment_date() ), esc_attr( get_comment_time() ) ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( __( 'Edit', 'ecommerce-mega-store' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'ecommerce-mega-store'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for ecommerce_mega_store_comment()

if (!function_exists('ecommerce_mega_store_widgets_init')) {

	function ecommerce_mega_store_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','ecommerce-mega-store'),
			'id'   => 'ecommerce-mega-store-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'ecommerce-mega-store'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','ecommerce-mega-store'),
			'id'   => 'ecommerce-mega-store-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'ecommerce-mega-store'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'ecommerce_mega_store_widgets_init' );

}

function ecommerce_mega_store_get_categories_select() {
	$teh_cats = get_categories();
	$results = array();
	$count = count($teh_cats);
	for ($i=0; $i < $count; $i++) {
	if (isset($teh_cats[$i]))
  		$results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
	else
  		$count++;
	}
	return $results;
}

function ecommerce_mega_store_sanitize_select( $input, $setting ) {
	// Ensure input is a slug
	$input = sanitize_key( $input );

	// Get list of choices from the control
	// associated with the setting
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it;
	// otherwise, return the default
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'ecommerce_mega_store_loop_columns');
if (!function_exists('ecommerce_mega_store_loop_columns')) {
	function ecommerce_mega_store_loop_columns() {
		$columns = get_theme_mod( 'ecommerce_mega_store_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'ecommerce_mega_store_per_page', 20 );
function ecommerce_mega_store_per_page( $cols ) {
  	$cols = get_theme_mod( 'ecommerce_mega_store_product_per_page', 9 );
	return $cols;
}

add_action('after_switch_theme', 'ecommerce_mega_store_setup_options');
function ecommerce_mega_store_setup_options () {
    update_option('dismissed-get_started', FALSE );
}

?>
