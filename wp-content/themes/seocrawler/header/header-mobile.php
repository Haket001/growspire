<?php
	// mobile menu template
	
	echo '<div class="seocrawler-mobile-header-wrap" >';

	// top bar
	$top_bar = seocrawler_get_option('general', 'enable-top-bar-on-mobile', 'disable');
	if( $top_bar == 'enable' ){
		get_template_part('header/header', 'top-bar');
	}

	// header
	echo '<div class="seocrawler-mobile-header seocrawler-header-background seocrawler-style-slide" id="seocrawler-mobile-header" >';
	echo '<div class="seocrawler-mobile-header-container seocrawler-container" >';
	echo seocrawler_get_logo(array('mobile' => true));

	echo '<div class="seocrawler-mobile-menu-right" >';

	// search icon
	$enable_search = (seocrawler_get_option('general', 'enable-main-navigation-search', 'enable') == 'enable')? true: false;
	if( $enable_search ){
		echo '<div class="seocrawler-main-menu-search" id="seocrawler-mobile-top-search" >';
		echo '<i class="fa fa-search" ></i>';
		echo '</div>';
		seocrawler_get_top_search();
	}

	// cart icon
	$enable_cart = (seocrawler_get_option('general', 'enable-main-navigation-cart', 'enable') == 'enable' && class_exists('WooCommerce'))? true: false;
	if( $enable_cart ){
		echo '<div class="seocrawler-main-menu-cart" id="seocrawler-mobile-menu-cart" >';
		echo '<i class="fa fa-shopping-cart" ></i>';
		seocrawler_get_woocommerce_bar();
		echo '</div>';
	}

	// mobile menu
	if( has_nav_menu('mobile_menu') ){
		seocrawler_get_custom_menu(array(
			'type' => seocrawler_get_option('general', 'right-menu-type', 'right'),
			'container-class' => 'seocrawler-mobile-menu',
			'button-class' => 'seocrawler-mobile-menu-button',
			'icon-class' => 'fa fa-bars',
			'id' => 'seocrawler-mobile-menu',
			'theme-location' => 'mobile_menu'
		));
	}
	echo '</div>'; // seocrawler-mobile-menu-right
	echo '</div>'; // seocrawler-mobile-header-container
	echo '</div>'; // seocrawler-mobile-header

	echo '</div>'; // seocrawler-mobile-header-wrap