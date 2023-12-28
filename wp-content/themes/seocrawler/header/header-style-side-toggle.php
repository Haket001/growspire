<?php
	/* a template for displaying the header area */
?>	
<header class="seocrawler-header-wrap seocrawler-header-style-side-toggle" >
	<?php
		$display_logo = seocrawler_get_option('general', 'header-side-toggle-display-logo', 'enable');
		if( $display_logo == 'enable' ){
			echo seocrawler_get_logo(array('padding' => false));
		}

		$navigation_class = '';
		if( seocrawler_get_option('general', 'enable-main-navigation-submenu-indicator', 'disable') == 'enable' ){
			$navigation_class = 'seocrawler-navigation-submenu-indicator ';
		}
	?>
	<div class="seocrawler-navigation clearfix <?php echo esc_attr($navigation_class); ?>" >
	<?php
		// print main menu
		if( has_nav_menu('main_menu') ){
			seocrawler_get_custom_menu(array(
				'container-class' => 'seocrawler-main-menu',
				'button-class' => 'seocrawler-side-menu-icon',
				'icon-class' => 'fa fa-bars',
				'id' => 'seocrawler-main-menu',
				'theme-location' => 'main_menu',
				'type' => seocrawler_get_option('general', 'header-side-toggle-menu-type', 'overlay')
			));
		}
	?>
	</div><!-- seocrawler-navigation -->
	<?php

		// menu right side
		$enable_search = (seocrawler_get_option('general', 'enable-main-navigation-search', 'enable') == 'enable')? true: false;
		$enable_cart = (seocrawler_get_option('general', 'enable-main-navigation-cart', 'enable') == 'enable' && class_exists('WooCommerce'))? true: false;
		if( $enable_search || $enable_cart ){ 
			echo '<div class="seocrawler-header-icon seocrawler-pos-bottom" >';

			// search icon
			if( $enable_search ){
				echo '<div class="seocrawler-main-menu-search" id="seocrawler-top-search" >';
				echo '<i class="fa fa-search" ></i>';
				echo '</div>';
				seocrawler_get_top_search();
			}

			// cart icon
			if( $enable_cart ){
				echo '<div class="seocrawler-main-menu-cart" id="seocrawler-main-menu-cart" >';
				echo '<i class="fa fa-shopping-cart" ></i>';
				seocrawler_get_woocommerce_bar();
				echo '</div>';
			}

			echo '</div>'; // seocrawler-main-menu-right-wrap
		}

	?>
</header><!-- header -->