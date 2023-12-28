<?php

	// declare woocommerce support
	add_action('after_setup_theme', 'seocrawler_woocommerce_support');
	if( !function_exists( 'seocrawler_woocommerce_support' ) ){
		function seocrawler_woocommerce_support(){
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
	}	

	// modify woocommerce wrapper
	remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	add_action('woocommerce_before_main_content', 'seocrawler_woocommerce_wrapper_start', 10);
	if( !function_exists( 'seocrawler_woocommerce_wrapper_start' ) ){
		function seocrawler_woocommerce_wrapper_start(){
			echo '<div class="seocrawler-content-container seocrawler-container">';
			echo '<div class="seocrawler-content-area seocrawler-item-pdlr seocrawler-sidebar-style-none clearfix" >';
		}
	}

	add_action('woocommerce_after_main_content', 'seocrawler_woocomemrce_wrapper_end', 10);
	if( !function_exists( 'seocrawler_woocomemrce_wrapper_end' ) ){
		function seocrawler_woocomemrce_wrapper_end(){
			echo '</div>'; // seocrawler-content-area
			echo '</div>'; // seocrawler-content-container
		}
	}

	// remove breadcrumbs on single product
	add_action('wp', 'seocrawler_init_woocommerce_hook');
	if( !function_exists( 'seocrawler_init_woocommerce_hook' ) ){
		function seocrawler_init_woocommerce_hook(){
			if( is_single() && get_post_type() == 'product' ){ 
				add_filter('woocommerce_product_description_heading', 'seocrawler_remove_woocommerce_tab_heading');
				add_filter('woocommerce_product_additional_information_heading', 'seocrawler_remove_woocommerce_tab_heading');

				remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
				remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
				remove_action('woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10);

				add_action('woocommerce_review_after_comment_text', 'woocommerce_review_display_rating', 10);
			}
		}
	}
	
	if( !function_exists( 'seocrawler_remove_woocommerce_tab_heading' ) ){
		function seocrawler_remove_woocommerce_tab_heading( $title ){
			return '';
		}
	}

	add_filter('woocommerce_review_gravatar_size', 'seocrawler_woocommerce_review_gravatar_size');
	if( !function_exists( 'seocrawler_woocommerce_review_gravatar_size' ) ){
		function seocrawler_woocommerce_review_gravatar_size( $size ){
			return 120;
		}
	}

	if( !function_exists('seocrawler_get_woocommerce_bar') ){
		function seocrawler_get_woocommerce_bar(){

			global $woocommerce;
			
			if(!empty($woocommerce)){
				
				echo '<span class="seocrawler-top-cart-count">' . $woocommerce->cart->cart_contents_count . '</span>';
				echo '<div class="seocrawler-top-cart-hover-area" ></div>';

				echo '<div class="seocrawler-top-cart-content-wrap" >';
				echo '<div class="seocrawler-top-cart-content" >';
				echo '<div class="seocrawler-top-cart-count-wrap" >';
				echo '<span class="head">' . esc_html__('Items : ', 'seocrawler') . ' </span>';
				echo '<span class="seocrawler-top-cart-count">' . $woocommerce->cart->cart_contents_count . '</span>'; 
				echo '</div>';
				
				echo '<div class="seocrawler-top-cart-amount-wrap" >';
				echo '<span class="head">' . esc_html__('Subtotal :', 'seocrawler') . ' </span>';
				echo '<span class="seocrawler-top-cart-amount">' . $woocommerce->cart->get_cart_total() . '</span>';
				echo '</div>';
				
				echo '<a class="seocrawler-top-cart-button" href="' . esc_url($woocommerce->cart->get_cart_url()) . '" >';
				echo esc_html__('View Cart', 'seocrawler');
				echo '</a>';

				echo '<a class="seocrawler-top-cart-checkout-button" href="' . esc_url($woocommerce->cart->get_checkout_url()) . '" >';
				echo esc_html__('Check Out', 'seocrawler');
				echo '</a>';
				echo '</div>';
				echo '</div>';
			}
		}
	}

	add_filter('add_to_cart_fragments', 'seocrawler_woocommerce_cart_ajax');
	if( !function_exists('seocrawler_woocommerce_cart_ajax') ){
		function seocrawler_woocommerce_cart_ajax($fragments){
			global $woocommerce;

			$fragments['span.seocrawler-top-cart-count'] = '<span class="seocrawler-top-cart-count">' . $woocommerce->cart->cart_contents_count . '</span>'; 
			$fragments['span.seocrawler-top-cart-amount'] = '<span class="seocrawler-top-cart-amount">' . $woocommerce->cart->get_cart_total() . '</span>';

			return $fragments;
		}
	}	

	add_filter('woocommerce_output_related_products_args', 'seocrawler_related_products_args');
	if( !function_exists('seocrawler_related_products_args') ){
		function seocrawler_related_products_args($args){
			if( class_exists('gdlr_core_pb_element_product') ){
				$num_fetch = seocrawler_get_option('general', 'woocommerce-related-product-num-fetch', '4');
				$args['posts_per_page'] = $num_fetch;
			}
			
			return $args;
		}
	}