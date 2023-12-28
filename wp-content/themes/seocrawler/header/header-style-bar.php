<?php
	/* a template for displaying the header area */

	// header container
	$body_layout = seocrawler_get_option('general', 'layout', 'full');
	$body_margin = seocrawler_get_option('general', 'body-margin', '0px');
	$header_width = seocrawler_get_option('general', 'header-width', 'boxed');
	$header_style = seocrawler_get_option('general', 'header-bar-navigation-align', 'center');
	$header_background_style = seocrawler_get_option('general', 'header-background-style', 'solid');

	$header_wrap_class = '';
	if( $header_style == 'center-logo' ){
		$header_wrap_class .= ' seocrawler-style-center';
	}else{
		$header_wrap_class .= ' seocrawler-style-left';
	}

	$header_container_class = '';
	if( $header_width == 'boxed' ){
		$header_container_class .= ' seocrawler-container';
	}else if( $header_width == 'custom' ){
		$header_container_class .= ' seocrawler-header-custom-container';
	}else{
		$header_container_class .= ' seocrawler-header-full';
	}

	$navigation_wrap_class  = ' seocrawler-style-' . $header_background_style;
	$navigation_wrap_class .= ' seocrawler-sticky-navigation seocrawler-sticky-navigation-height';
	if( $header_style == 'center' || $header_style == 'center-logo' ){
		$navigation_wrap_class .= ' seocrawler-style-center';
	}else{
		$navigation_wrap_class .= ' seocrawler-style-left';
	}
	if( $body_layout == 'boxed' || $body_margin != '0px' ){
		$navigation_wrap_class .= ' seocrawler-style-slide';
	}else{
		$navigation_wrap_class .= '  seocrawler-style-fixed';
	}
	if( $header_background_style == 'transparent' ){
		$navigation_wrap_class .= ' seocrawler-without-placeholder';
	}

?>	
<header class="seocrawler-header-wrap seocrawler-header-style-bar seocrawler-header-background <?php echo esc_attr($header_wrap_class); ?>" >
	<div class="seocrawler-header-container clearfix <?php echo esc_attr($header_container_class); ?>">
		<div class="seocrawler-header-container-inner">
		<?php
			echo seocrawler_get_logo();

			$logo_right_text = seocrawler_get_option('general', 'logo-right-text');
			if( !empty($logo_right_text) ){
				echo '<div class="seocrawler-logo-right-text seocrawler-item-pdlr" >';
				echo gdlr_core_content_filter($logo_right_text);
				echo '</div>';
			}
		?>
		</div>
	</div>
</header><!-- header -->
<div class="seocrawler-navigation-bar-wrap <?php echo esc_attr($navigation_wrap_class); ?>" >
	<div class="seocrawler-navigation-background" ></div>
	<div class="seocrawler-navigation-container clearfix <?php echo esc_attr($header_container_class); ?>">
		<?php
			$navigation_class = '';
			if( seocrawler_get_option('general', 'enable-main-navigation-submenu-indicator', 'disable') == 'enable' ){
				$navigation_class .= 'seocrawler-navigation-submenu-indicator ';
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
			if( $header_style == 'center' || $header_style == 'center-logo' ){
				$menu_right_class = ' seocrawler-item-mglr seocrawler-navigation-top';
			}

			// menu right side
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
				if( has_nav_menu('right_menu') ){
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
			}
		?>
		</div><!-- seocrawler-navigation -->

	</div><!-- seocrawler-header-container -->
</div><!-- seocrawler-navigation-bar-wrap -->