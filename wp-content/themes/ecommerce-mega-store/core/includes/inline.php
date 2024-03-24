<?php


$ecommerce_mega_store_custom_css = '';

	/*---------------------------text-transform-------------------*/

	$ecommerce_mega_store_text_transform = get_theme_mod( 'menu_text_transform_ecommerce_mega_store','UPPERCASE');
    if($ecommerce_mega_store_text_transform == 'CAPITALISE'){

		$ecommerce_mega_store_custom_css .='#main-menu ul li a{';

			$ecommerce_mega_store_custom_css .='text-transform: capitalize ; font-size: 13px;';

		$ecommerce_mega_store_custom_css .='}';

	}else if($ecommerce_mega_store_text_transform == 'UPPERCASE'){

		$ecommerce_mega_store_custom_css .='#main-menu ul li a{';

			$ecommerce_mega_store_custom_css .='text-transform: uppercase ; font-size: 13px;';

		$ecommerce_mega_store_custom_css .='}';

	}else if($ecommerce_mega_store_text_transform == 'LOWERCASE'){

		$ecommerce_mega_store_custom_css .='#main-menu ul li a{';

			$ecommerce_mega_store_custom_css .='text-transform: lowercase ; font-size: 13px;';

		$ecommerce_mega_store_custom_css .='}';
	}

	/*---------------------------Container Width-------------------*/

	$ecommerce_mega_store_container_width = get_theme_mod('ecommerce_mega_store_container_width');

			$ecommerce_mega_store_custom_css .='body{';

				$ecommerce_mega_store_custom_css .='width: '.esc_attr($ecommerce_mega_store_container_width).'%; margin: auto;';

			$ecommerce_mega_store_custom_css .='}';

		/*---------------------------Slider-content-alignment-------------------*/

	$ecommerce_mega_store_slider_content_alignment = get_theme_mod( 'ecommerce_mega_store_slider_content_alignment','CENTER-ALIGN');

	 if($ecommerce_mega_store_slider_content_alignment == 'LEFT-ALIGN'){

			$ecommerce_mega_store_custom_css .='.blog_box{';

				$ecommerce_mega_store_custom_css .='text-align:left;';

			$ecommerce_mega_store_custom_css .='}';


		}else if($ecommerce_mega_store_slider_content_alignment == 'CENTER-ALIGN'){

			$ecommerce_mega_store_custom_css .='.blog_box{';

				$ecommerce_mega_store_custom_css .='text-align:center; right: 20%; left: 50%;';

			$ecommerce_mega_store_custom_css .='}';


		}else if($ecommerce_mega_store_slider_content_alignment == 'RIGHT-ALIGN'){

			$ecommerce_mega_store_custom_css .='.blog_box{';

				$ecommerce_mega_store_custom_css .='text-align:right; right: 20%; left: 50%;';

			$ecommerce_mega_store_custom_css .='}';

		}

		/*---------------------------Copyright Text alignment-------------------*/

		$ecommerce_mega_store_copyright_text_alignment = get_theme_mod( 'ecommerce_mega_store_copyright_text_alignment','LEFT-ALIGN');

		if($ecommerce_mega_store_copyright_text_alignment == 'LEFT-ALIGN'){

		$ecommerce_mega_store_custom_css .='.copy-text p{';

			$ecommerce_mega_store_custom_css .='text-align:left;';

		$ecommerce_mega_store_custom_css .='}';


		}else if($ecommerce_mega_store_copyright_text_alignment == 'CENTER-ALIGN'){

		$ecommerce_mega_store_custom_css .='.copy-text p{';

			$ecommerce_mega_store_custom_css .='text-align:center;';

		$ecommerce_mega_store_custom_css .='}';


		}else if($ecommerce_mega_store_copyright_text_alignment == 'RIGHT-ALIGN'){

		$ecommerce_mega_store_custom_css .='.copy-text p{';

			$ecommerce_mega_store_custom_css .='text-align:right;';

		$ecommerce_mega_store_custom_css .='}';

		}

		/*---------------------------related Product Settings-------------------*/


$ecommerce_mega_store_related_product_setting = get_theme_mod('ecommerce_mega_store_related_product_setting',true);

	if($ecommerce_mega_store_related_product_setting == false){

		$ecommerce_mega_store_custom_css .='.related.products, .related h2{';

			$ecommerce_mega_store_custom_css .='display: none;';

		$ecommerce_mega_store_custom_css .='}';
	}

		/*---------------------------Scroll to Top Alignment Settings-------------------*/

	$ecommerce_mega_store_scroll_top_position = get_theme_mod( 'ecommerce_mega_store_scroll_top_position','Right');

	if($ecommerce_mega_store_scroll_top_position == 'Right'){

		$ecommerce_mega_store_custom_css .='.scroll-up{';

			$ecommerce_mega_store_custom_css .='right: 20px;';

		$ecommerce_mega_store_custom_css .='}';

	}else if($ecommerce_mega_store_scroll_top_position == 'Left'){

		$ecommerce_mega_store_custom_css .='.scroll-up{';

			$ecommerce_mega_store_custom_css .='left: 20px;';

		$ecommerce_mega_store_custom_css .='}';

	}else if($ecommerce_mega_store_scroll_top_position == 'Center'){

		$ecommerce_mega_store_custom_css .='.scroll-up{';

			$ecommerce_mega_store_custom_css .='right: 50%;left: 50%;';

		$ecommerce_mega_store_custom_css .='}';
	}

		/*---------------------------Pagination Settings-------------------*/


$ecommerce_mega_store_pagination_setting = get_theme_mod('ecommerce_mega_store_pagination_setting',true);

	if($ecommerce_mega_store_pagination_setting == false){

		$ecommerce_mega_store_custom_css .='.nav-links{';

			$ecommerce_mega_store_custom_css .='display: none;';

		$ecommerce_mega_store_custom_css .='}';
	}

/*--------------------------- Slider Opacity -------------------*/

	$ecommerce_mega_store_slider_opacity_color = get_theme_mod( 'ecommerce_mega_store_slider_opacity_color','0.6');

	if($ecommerce_mega_store_slider_opacity_color == '0'){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0';

		$ecommerce_mega_store_custom_css .='}';

		}else if($ecommerce_mega_store_slider_opacity_color == '0.1'){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0.1';

		$ecommerce_mega_store_custom_css .='}';

		}else if($ecommerce_mega_store_slider_opacity_color == '0.2'){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0.2';

		$ecommerce_mega_store_custom_css .='}';

		}else if($ecommerce_mega_store_slider_opacity_color == '0.3'){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0.3';

		$ecommerce_mega_store_custom_css .='}';

		}else if($ecommerce_mega_store_slider_opacity_color == '0.4'){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0.4';

		$ecommerce_mega_store_custom_css .='}';

		}else if($ecommerce_mega_store_slider_opacity_color == '0.5'){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0.5';

		$ecommerce_mega_store_custom_css .='}';

		}else if($ecommerce_mega_store_slider_opacity_color == '0.6'){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0.6';

		$ecommerce_mega_store_custom_css .='}';

		}else if($ecommerce_mega_store_slider_opacity_color == '0.7'){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0.7';

		$ecommerce_mega_store_custom_css .='}';

		}else if($ecommerce_mega_store_slider_opacity_color == '0.8'){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0.8';

		$ecommerce_mega_store_custom_css .='}';

		}else if($ecommerce_mega_store_slider_opacity_color == '0.9'){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0.9';

		$ecommerce_mega_store_custom_css .='}';

		}else if($ecommerce_mega_store_slider_opacity_color == '1.0'){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0.9';

		$ecommerce_mega_store_custom_css .='}';

		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$ecommerce_mega_store_overlay_option = get_theme_mod('ecommerce_mega_store_overlay_option', true);

	if($ecommerce_mega_store_overlay_option == false){

		$ecommerce_mega_store_custom_css .='.blog_inner_box img{';

			$ecommerce_mega_store_custom_css .='opacity:0.6;';

		$ecommerce_mega_store_custom_css .='}';
	}

	$ecommerce_mega_store_slider_image_overlay_color = get_theme_mod('ecommerce_mega_store_slider_image_overlay_color', true);

	if($ecommerce_mega_store_slider_image_overlay_color != false){

		$ecommerce_mega_store_custom_css .='.blog_inner_box{';

			$ecommerce_mega_store_custom_css .='background-color: '.esc_attr($ecommerce_mega_store_slider_image_overlay_color).';';

		$ecommerce_mega_store_custom_css .='}';
	}

