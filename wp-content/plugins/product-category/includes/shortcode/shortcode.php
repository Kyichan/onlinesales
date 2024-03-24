<?php
/**
 * Class PCW_Title
 */
class PCW_Title {

	/**
	 * Name block.
	 *
	 * @var name of the block.
	 */
	public $name;

	/**
	 * Image path of block.
	 *
	 * @var image_path of the block.
	 */
	public $image_path;

	/**
	 * Title of the block.
	 *
	 * @param string $name string.
	 */
	public function __construct( $name ) {
		$this->name = $name;
		// $this->image = $image_path;
	}

	/**
	 * Title of the block
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function get_name() {
		return $this->name;
	}
}

/**
 * Admin Menus.
 *
 * @return void
 * @since 1.0.0
 */
function pcw_menu_page() {
	add_menu_page(
		__( 'product category', 'pcw' ),
		'Product Category',
		'edit_posts',
		'pcw_slug',
		'pcw_callback_function',
		'dashicons-category',
		60
	);
	add_submenu_page( 'pcw_slug', 'How to use?', 'How to use?', 'edit_posts', 'pcw_slug', 'pcw_callback_function' );
	add_submenu_page( 'pcw_slug', 'About Me', 'About', 'edit_posts', 'pcw_about', 'pcw_callback_function2' );
}
add_action( 'admin_menu', 'pcw_menu_page' );

/**
 * Admin Menus's function callback.
 *
 * @return void
 * @since 1.0.0
 */
function pcw_callback_function2() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Unauthorized user' );
	}
	?>
	<div class="admin-content-about">
		<div class="admin-about-text">
			<h1>Welcome to Product Category 1.4</h1>
			<p>Design and Customize your product category page as you want using Widget and Shortcode with Built-in Default 5 Styles. Now, turn your Product categories into your style as you want with advanced options with this plugin at no cost.<br><br>
				&#x25A3; Set Category as you want <br>
				&#x25A3; Select font-size, font-weight, font-family, letter-spacing etc. <br>
				&#x25A3; Set Number of columns per row <br>
				&#x25A3; Set Number of Categories <br>
				&#x25A3; Set Order of Categories <br>
				&#x25A3; Set Colors and some styles <br>
				&#x25A3; Set Pagination of your category page <br>
				&#x25A3; <strong>New:</strong> Show & Hide the Category Thumbnail image for your category page <br>
				&#x25A3; <strong>New:</strong> Now, "Alt Tag" is available for the Category image <br>
				&#x25A3; Product category widget for Elementor <a href="admin.php?page=pcw_slug">Learn more..</a><br>
			</p>
			<br>
		</div>
		<div class="admin-about-logo">
			<img src = "<?php echo esc_attr( plugins_url( '/images/logo.png', __FILE__ ) ); ?> ">
		</div>
		<div class="admin-about-wrap">
			<h2>What's New - Introduced in 1.1</h2>
			<br>
			<span>Now, Compatible With below Editors Using Shortcode & Custom Widgets.</span>
			<div class="compatible-editor">
				<div class="editor-block">
					<img src = "<?php echo esc_attr( plugins_url( '/images/editor1.png', __FILE__ ) ); ?> ">
					<p>Elementor</p>
				</div>
				<div class="editor-block">
					<img src = "<?php echo esc_attr( plugins_url( '/images/editor2.png', __FILE__ ) ); ?> ">
					<p>WP Page Bakary</p>
				</div>
				<div class="editor-block">
					<img src = "<?php echo esc_attr( plugins_url( '/images/editor3.png', __FILE__ ) ); ?> ">  
					<p>Gutenberg</p>
				</div>
				<div class="editor-block">
					<img src = "<?php echo esc_attr( plugins_url( '/images/editor4.png', __FILE__ ) ); ?> ">
					<p>SiteOrigin</p>
				</div>
			</div>
			<br>
			<h2>Getting Started With Product Category.</h2>
			<div class="pcw-videos-container">
				<iframe width="500" height="300" allowfullscreen="" src="https://www.youtube.com/embed/8QTuIYDXOng"></iframe>
				<iframe width="500" height="300" allowfullscreen="" src="https://www.youtube.com/embed/ot-h5iBZtnM"></iframe>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Callback function.
 *
 * @return void
 * @since 1.0.0
 */
function pcw_callback_function() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Unauthorized user' );
	}
	$heading1 = new PCW_Title( 'How to use?' );
	$heading2 = new PCW_Title( 'Three ways to use!' );
	$heading3 = new PCW_Title( 'Using Product Category Widget in SiteOrigin' );
	$tab1     = new PCW_Title( 'Site Origin' );
	$tab2     = new PCW_Title( 'Shortcode' );
	$tab3     = new PCW_Title( 'Elementor' );
	?>
	<div class="admin-content">
		<h1><?php echo esc_html( $heading1->get_name() ); ?></h1><br>
		<h2><?php echo esc_html( $heading2->get_name() ); ?></h2>
		<div class="two-ways">
			<div class="tab">
				<button id="way1" class="tablinks" onclick="openTab(event, 'First')"><img src = "<?php echo esc_attr( plugins_url( '/images/siteorigin.svg', __FILE__ ) ); ?> " width="40px"><?php echo esc_html( $tab1->get_name() ); ?></button>
				<button id="way2" class="tablinks" onclick="openTab(event, 'Second')"><img src = "<?php echo esc_attr( plugins_url( '/images/shortcode.svg', __FILE__ ) ); ?> " width="40px"><?php echo esc_html( $tab2->get_name() ); ?></button>
				<button id="way3" class="tablinks" onclick="openTab(event, 'Third')"><img src = "<?php echo esc_attr( plugins_url( '/images/elementor.svg', __FILE__ ) ); ?> " width="40px"><?php echo esc_html( $tab3->get_name() ); ?></button>
			</div>
			<div id="First" class="tabcontent">
				<h3><?php echo esc_html( $heading3->get_name() ); ?></h3>
				<p style="color: red;"><b>Note: Required Site Origin Editor and Site Origin Widget Bundle!</b></p>
				<ul class="right-content">
					<li>
						<span>1. Create New Page</span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page1.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span>2. Give name to that page (EX . Product Category)</span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page2.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span>3. Click on Add Widget Button (using of site origin editor)</span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page3.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span>4. In Search area type Product category, Select that widget</span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page4.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span>5. Click on Edit,</span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page5.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span>6. Finally Use it!</span>
						<img src = "<?php echo esc_attr( plugins_url( '/images/page6.png', __FILE__ ) ); ?> ">
						<img class="img7" src = "<?php echo esc_attr( plugins_url( '/images/page7.png', __FILE__ ) ); ?> ">
						<img class="img8" src = "<?php echo esc_attr( plugins_url( '/images/page8.png', __FILE__ ) ); ?> ">
						<img src = "<?php echo esc_attr( plugins_url( '/images/page9.png', __FILE__ ) ); ?> ">
					</li>
				</ul>
			</div>

			<div id="Second" class="tabcontent">
				<h3>Using Shortcode</h3>
				<ul class="right-content">
					<li>
						<span>The Full Shortcode see like this!</span>
						<p style="color: red;"><b>Copy this shortcode and use it!</b></p>
						<div class="pre" id="short_code">
						<img onclick="CopyToClipboard('short_code')" class="icon" src = "<?php echo esc_attr( plugins_url( '/images/copy.png', __FILE__ ) ); ?> "></img>
						[PCW <b>number</b>="50" <b>columns</b>="5" <b>orderby</b>="name" <b>order</b>="ASC" <b>hide_empty</b>="1" <b>parent</b>="" <b>ids</b>="" <b>description</b>="false" <b>cat_image</b>="true" <b>font-size</b>="18px" <b>font-weight</b>="600" <b>font-family</b>="Josefin Sans" <b>letter-spacing</b>="2px" <b>color</b>="red"]
						</div>
						<p class="copied" style="margin: 0;">Copied</p>
						<script>
						jQuery(".copied").css("display", "none");
						function CopyToClipboard(containerid) {
							if (document.selection) { 
								var range = document.body.createTextRange();
								range.moveToElementText(document.getElementById(containerid));
								range.select().createTextRange();
								document.execCommand("copy"); 
								jQuery(".copied").css("display", "none");
							} else if (window.getSelection) {
								var range = document.createRange();
								range.selectNode(document.getElementById(containerid));
								window.getSelection().addRange(range);
								document.execCommand("copy");
								//alert("text copied");
								jQuery(".copied").css("display", "inline-block");
							}}
						</script>
					</li>
					<li>
						<span>All Shortcode Attributes</span>
						<ol class="atts">
							<li><b>[</b> Number <b>]</b></li>
							<p>This shortcode represents the number of categories.. ( EX. 10, 20, 30... )</p></br>

							<li><b>[</b> Columns <b>]</b></li>
							<p>This shortcode defines the number of columns categories are organized into. ( EX. 1, 2, 3, 4... max 6)</p></br>

							<li><b>[</b> Orderby <b>]</b></li>
							<p>Set Orderby of Product categories as you want. ( EX. name, slug etc... )</p></br>

							<li><b>[</b> Order <b>]</b></li>
							<p>Set Order of Product categories like ascending or descending. ( EX. ASC, DESC. )</p></br>

							<li><b>[</b> Hide_empty <b>]</b></li>
							<p>This shortcode represents Set to 1 to hide categories with no products or 0 to show them ( EX. 0, 1. )</p></br>

							<li><b>[</b> Parent <b>]</b></li>
							<p>This shortcode represents Set to 0 to only display top-level categories. ( EX. null, 1. )</p></br>

							<li><b>[</b> Ids <b>]</b></li>
							<p>Enter Product category ids which you want to display. ( EX. 26, 31 etc... )</p></br>

							<li><b>[</b> Description <b>]</b></li>
							<p>Show & Hide Product category Description by value of true and false ( EX. true, false. )</p></br>

							<li><b>[</b> Cat_Image <b>]</b></li>
							<p>Show & Hide Product category Thumbnail image by value of true and false ( EX. true, false. )</p></br>

							<li><b>[</b> Font-size <b>]</b></li>
							<p>Set font size of product categories ( EX. 15px, 22px etc... )</p></br>

							<li><b>[</b> Font-weight <b>]</b></li>
							<p>Set font weight of product categories ( EX. 300, 600 etc... )</p></br>

							<li><b>[</b> Font-family <b>]</b></li>
							<p>Set font family of product categories ( EX. Arial, Montserrat etc... )</p></br>

							<li><b>[</b> Letter-spacing <b>]</b></li>
							<p>Set letter spacing of product categories ( EX. 1px, 3px etc... )</p></br>

							<li><b>[</b> Color <b>]</b></li>
							<p>Set color of product categories ( EX. red, yellow, blue etc... )</p></br>
						</ol>
					</li>
				</ul>
			</div>

			<div id="Third" class="tabcontent">
				<h3>Using Product Category Widget in Elementor</h3>
				<p style="color: red;"><b>Note: Required Elementor Editor.</b></p>
				<ul class="right-content">
					<li>
						<span>1. Create New Page</span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page1.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span>2. Give name to that page (EX . Product Category)</span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page10.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span>3. Click on Edit with Elementor Button</span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page11.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span>4. In Search area type Product category, Select that widget</span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page12.png', __FILE__ ) ); ?> ">
					</li>
					<li>
						<span>5. Finally Use it!</span>
						<img src = "<?php echo esc_url( plugins_url( '/images/page13.png', __FILE__ ) ); ?> ">
						<img src = "<?php echo esc_url( plugins_url( '/images/page14.png', __FILE__ ) ); ?> ">
					</li>
				</ul>
			</div>
		</div>
		<script type="text/javascript">
			function openTab(evt, cityName) {
			// Declare all variables
			var i, tabcontent, tablinks;

			// Get all elements with class="tabcontent" and hide them
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}

			// Get all elements with class="tablinks" and remove the class "active"
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}

			// Show the current tab, and add an "active" class to the link that opened the tab
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " active";
			}
			document.getElementById("way1").click();
		</script>
	</div>
	<?php
}

/**
 * Shortcode function.
 *
 * @param array $atts Attributes.
 * @return $atts
 * @since 1.0.0
 */
function product_categories_widget( $atts ) {

	global $woocommerce_loop, $wpdb;

	$atts = shortcode_atts(
		array(
			'number'         => null,
			'orderby'        => 'name',
			'order'          => 'ASC',
			'columns'        => '4',
			'hide_empty'     => 1,
			'parent'         => '',
			'ids'            => '',
			'description'    => true,
			'cat_image'      => true,
			'font-size'      => '',
			'font-weight'    => '',
			'font-family'    => '',
			'letter-spacing' => '',
			'color'          => '',
			'style'          => '',
			'pagination'     => '',
		),
		$atts
	);

	if ( isset( $atts['ids'] ) ) {
		$ids = explode( ',', $atts['ids'] );
		$ids = array_map( 'trim', $ids );
	} else {
		$ids = array();
	}

	$page     = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$per_page = $atts['number'];
	$offset   = ( $page > 0 ) ? $per_page * ( $page - 1 ) : 1;

	$hide_empty = ( $atts['hide_empty'] == true || $atts['hide_empty'] == 1 ) ? 1 : 0;

	$args = array(
		'number'     => $per_page,
		'offset'     => $offset,
		'orderby'    => $atts['orderby'],
		'order'      => $atts['order'],
		'hide_empty' => $hide_empty,
		'include'    => $ids,
		'pad_counts' => true,
		'child_of'   => $atts['parent'],
	);

	$product_categories = get_terms( 'product_cat', $args );
	if ( '' !== $atts['parent'] ) {
		$product_categories = wp_list_filter( $product_categories, array( 'parent' => $atts['parent'] ) );
	}

	if ( $hide_empty ) {
		foreach ( $product_categories as $key => $category ) {
			if ( $category->count == 0 ) {
				unset( $product_categories[ $key ] );
			}
		}
	}

	if ( $atts['number'] ) {
		$product_categories = array_slice( $product_categories, 0, $atts['number'] );
	}

	$columns                     = absint( $atts['columns'] );
	$woocommerce_loop['columns'] = $columns;

	ob_start();

	if ( $product_categories ) {
		?>
		<div class="product-container <?php echo esc_attr( $atts['style'] ); ?> columns-<?php echo esc_attr( $columns ); ?>">
		<?php
		foreach ( $product_categories as $category ) {
			?>
			<div class="product-cats">
				<?php
				if ( $atts['cat_image'] == 'true' ) {
					?>
					<div class="pro-img">
						<a href="<?php echo esc_url( get_category_link( $category ) ); ?>">
							<?php
							$thumbnail_id           = get_term_meta( $category->term_id, 'thumbnail_id', true );
							$empty_shop_catalog_img = plugins_url( 'product-category\admin\images\placeholder.png' );
							$image                  = wp_get_attachment_url( $thumbnail_id );

							if ( $image ) {
								echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( get_the_title( $thumbnail_id ) ) . '" />';
							} else {
								echo '<img src="' . esc_url( $empty_shop_catalog_img ) . '" alt="' . esc_attr( get_the_title( $thumbnail_id ) ) . '" class="pcw-placeholder"/>';
							}
							?>
							</a>
					</div>
					<?php
				}
				?>
				<div class="pro-info" style="letter-spacing: <?php echo esc_attr( $atts['letter-spacing'] ); ?>;">

					<?php
					$desc = $atts['description'];
					echo '<div class="pro_name">' . esc_attr( $category->name ) . ' (' . esc_attr( $category->count ) . ') </div>';
					if ( $desc == 'true' ) {
						echo '<div class="pro_desc">' . esc_attr( $category->description ) . '</div>';
					}
					?>
				</div>
			</div>
			<?php
		}
		?>
		</div>
		<style type="text/css">
			.pro_name{
				font-size: <?php echo esc_attr( $atts['font-size'] ); ?>;
				font-weight: <?php echo esc_attr( $atts['font-weight'] ); ?>;
				font-family: <?php echo esc_attr( $atts['font-family'] ); ?>;
				color: <?php echo esc_attr( $atts['color'] ); ?>;
			}
		</style>
		<?php
		if ( 'hide' !== $atts['pagination'] ) {
			?>
			<nav class="woocommerce-pagination pcw-product-cat">
				<?php
				$big   = 999999999;
				$total = wp_count_terms( 'product_cat' );
				echo wp_kses_post(
					paginate_links(
						array(
							'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format'    => '',
							'prev_text' => __( '&#x2190;' ),
							'next_text' => __( '&#x2192;' ),
							'type'      => 'list',
							'total'     => ceil( $total / $per_page ),
							'current'   => max( 1, get_query_var( 'paged' ) ),
						)
					)
				);
				?>
			</nav>
			<?php
		}
		woocommerce_product_loop_end();
	}

	wc_reset_loop();

	return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';
}
add_shortcode( 'PCW', 'product_categories_widget' );
