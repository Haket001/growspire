<?php
	/* a template for displaying the header area */

	// header container
	$header_width = seocrawler_get_option('general', 'header-width', 'boxed');
	
	if( $header_width == 'boxed' ){
		$header_container_class = ' seocrawler-container';
	}else if( $header_width == 'custom' ){
		$header_container_class = ' seocrawler-header-custom-container';
	}else{
		$header_container_class = ' seocrawler-header-full';
	}

	$header_style = seocrawler_get_option('general', 'header-boxed-style', 'menu-right');
	$navigation_offset = seocrawler_get_option('general', 'fixed-navigation-anchor-offset', '');

	$header_wrap_class  = ' seocrawler-style-' . $header_style;
	$header_wrap_class .= ' seocrawler-sticky-navigation seocrawler-style-slide';
?>	
<header class="seocrawler-header-wrap seocrawler-header-style-boxed <?php echo esc_attr($header_wrap_class); ?>" <?php
		if( !empty($navigation_offset) ){
			echo 'data-navigation-offset="' . esc_attr($navigation_offset) . '" ';
		}
	?> >
	<div class="seocrawler-header-container clearfix <?php echo esc_attr($header_container_class); ?>">
		<div class="seocrawler-header-container-inner clearfix">	

			<div class="seocrawler-header-background  seocrawler-item-mglr" ></div>
			<div class="seocrawler-header-container-item clearfix">
				<?php

					if( $header_style == 'splitted-menu' ){
						add_filter('seocrawler_center_menu_item', 'seocrawler_get_logo');
					}else{
						echo seocrawler_get_logo();
					}

					$navigation_class = '';
					if( seocrawler_get_option('general', 'enable-main-navigation-submenu-indicator', 'disable') == 'enable' ){
						$navigation_class = 'seocrawler-navigation-submenu-indicator ';
					}
				?>
				<div class="seocrawler-navigation seocrawler-item-pdlr clearfix <?php echo esc_attr($navigation_class); ?>" >
				<?php
					// print main menu
					if( has_nav_menu('main_menu') ){
						$slide_bar = seocrawler_get_option('general', 'navigation-slide-bar', 'enable');
						echo '<div class="seocrawler-main-menu ' . ($slide_bar == 'enable'? 'seocrawler-with-slidebar': '') . '" id="seocrawler-main-menu" >';
						wp_nav_menu(array(
							'theme_location'=>'main_menu', 
							'container'=> '', 
							'menu_class'=> 'sf-menu',
							'walker' => new seocrawler_menu_walker()
						));
						echo '</div>';
					}

					// menu right side
					$menu_right_class = '';
					if( $header_style == 'center-menu' || $header_style == 'splitted-menu' ){
						$menu_right_class = ' seocrawler-item-mglr seocrawler-navigation-top seocrawler-navigation-right';
					}

					$enable_search = (seocrawler_get_option('general', 'enable-main-navigation-search', 'enable') == 'enable')? true: false;
					$enable_cart = (seocrawler_get_option('general', 'enable-main-navigation-cart', 'enable') == 'enable' && class_exists('WooCommerce'))? true: false;
					$enable_right_button = (seocrawler_get_option('general', 'enable-main-navigation-right-button', 'disable') == 'enable')? true: false;
					if( has_nav_menu('right_menu') || $enable_search || $enable_cart ){
						echo '<div class="seocrawler-main-menu-right-wrap clearfix ' . esc_attr($menu_right_class) . '" >';

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

						// menu right button
						if( $enable_right_button ){
							$button_link = seocrawler_get_option('general', 'main-navigation-right-button-link', '');
							$button_link_target = seocrawler_get_option('general', 'main-navigation-right-button-link-target', '_self');
							echo '<a class="seocrawler-main-menu-right-button" href="' . esc_url($button_link) . '" target="' . esc_attr($button_link_target) . '" >';
							echo seocrawler_get_option('general', 'main-navigation-right-button-text', '');
							echo '</a>';
						}

						// print right menu
						if( has_nav_menu('right_menu') && $header_style != 'splitted-menu' ){
							seocrawler_get_custom_menu(array(
								'container-class' => 'seocrawler-main-menu-right',
								'button-class' => 'seocrawler-right-menu-button seocrawler-top-menu-button',
								'icon-class' => 'fa fa-bars',
								'id' => 'seocrawler-right-menu',
								'theme-location' => 'right_menu',
								'type' => seocrawler_get_option('general', 'right-menu-type', 'right')
							));
						}

						echo '</div>'; // seocrawler-main-menu-right-wrap

						if( has_nav_menu('right_menu') && $header_style == 'splitted-menu' ){
							echo '<div class="seocrawler-main-menu-left-wrap clearfix seocrawler-item-pdlr seocrawler-navigation-top seocrawler-navigation-left" >';
							seocrawler_get_custom_menu(array(
								'container-class' => 'seocrawler-main-menu-right',
								'button-class' => 'seocrawler-right-menu-button seocrawler-top-menu-button',
								'icon-class' => 'fa fa-bars',
								'id' => 'seocrawler-right-menu',
								'theme-location' => 'right_menu',
								'type' => seocrawler_get_option('general', 'right-menu-type', 'right')
							));
							echo '</div>';
						}
					}
				?>
				</div><!-- seocrawler-navigation -->

			</div><!-- seocrawler-header-container-inner -->
		</div><!-- seocrawler-header-container-item -->
	</div><!-- seocrawler-header-container -->
</header><!-- header -->