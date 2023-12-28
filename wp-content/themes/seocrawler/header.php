<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
	$body_wrapper_class = '';

	$header_style = seocrawler_get_option('general', 'header-style', 'plain');
	if( $header_style == 'side' ){

		$header_side_class  = ' seocrawler-style-side';
		$header_side_style = seocrawler_get_option('general', 'header-side-style', 'top-left');

		switch( $header_side_style ){
			case 'top-left': 
				$header_side_class .= ' seocrawler-style-left';
				$body_wrapper_class .= ' seocrawler-left';
				break;
			case 'top-right': 
				$header_side_class .= ' seocrawler-style-right';
				$body_wrapper_class .= ' seocrawler-right';
				break;
			case 'middle-left':
			case 'middle-left-2':
				$header_side_class .= ' seocrawler-style-left seocrawler-style-middle';
				$body_wrapper_class .= ' seocrawler-left';
				break;
			case 'middle-right': 
			case 'middle-right-2': 
				$header_side_class .= ' seocrawler-style-right seocrawler-style-middle';
				$body_wrapper_class .= ' seocrawler-right';
				break;
			default: 
				break;
		}
	}else if( $header_style == 'side-toggle' ){

		$header_side_style = seocrawler_get_option('general', 'header-side-toggle-style', 'left');

		$header_side_class  = ' seocrawler-style-side-toggle';
		$header_side_class .= ' seocrawler-style-' . $header_side_style;
		$body_wrapper_class .= ' seocrawler-' . $header_side_style;

	}else if( $header_style == 'boxed' ){

		$body_wrapper_class .= ' seocrawler-with-transparent-header';
		
	}else{

		$header_background_style = seocrawler_get_option('general', 'header-background-style', 'solid');

		if( $header_background_style == 'transparent' ){
			if( $header_style == 'plain' ){
				$body_wrapper_class .= ' seocrawler-with-transparent-header';
			}else if( $header_style == 'bar' ){
				$body_wrapper_class .= ' seocrawler-with-transparent-navigation';
			}
		}
	}

	$layout = seocrawler_get_option('general', 'layout', 'full');
	if( $layout == 'full' && in_array($header_style, array('plain', 'bar', 'boxed')) ){
		$body_wrapper_class .= ' seocrawler-with-frame';
	}

	$post_option = seocrawler_get_post_option(get_the_ID());
	
	// mobile menu
	$body_outer_wrapper_class = '';
	if( empty($post_option['enable-header-area']) || $post_option['enable-header-area'] == 'enable' ){
		get_template_part('header/header', 'mobile');
	}else{
		$body_outer_wrapper_class = ' seocrawler-header-disable';
	}
	
	// preload
	$preload = seocrawler_get_option('plugin', 'enable-preload', 'disable');
	if( $preload == 'enable' ){
		echo '<div class="seocrawler-page-preload gdlr-core-page-preload gdlr-core-js" id="seocrawler-page-preload" data-animation-time="500" ></div>';
	}
?>
<div class="seocrawler-body-outer-wrapper <?php echo esc_attr($body_outer_wrapper_class); ?>">
	<?php
		get_template_part('header/header', 'bullet-anchor');

		if( $layout == 'boxed' ){
			if( !empty($post_option['body-background-type']) && $post_option['body-background-type'] == 'image' ){
				echo '<div class="seocrawler-body-background" ' . gdlr_core_esc_style(array(
					'background-image' => empty($post_option['body-background-image'])? '': $post_option['body-background-image'],
					'opacity' => empty($post_option['body-background-image-opacity'])? '': (floatval($post_option['body-background-image-opacity']) / 100)
				)) . ' ></div>';
			}else{
				$background_type = seocrawler_get_option('general', 'background-type', 'color');
				if( $background_type == 'image' ){
					echo '<div class="seocrawler-body-background" ></div>';
				}
			}
		}
	?>
	<div class="seocrawler-body-wrapper clearfix <?php echo esc_attr($body_wrapper_class); ?>">
	<?php  

		if( empty($post_option['enable-header-area']) || $post_option['enable-header-area'] == 'enable' ){

			if( $header_style == 'side' || $header_style == 'side-toggle' ){

				echo '<div class="seocrawler-header-side-nav seocrawler-header-background ' . esc_attr($header_side_class) . '" id="seocrawler-header-side-nav" >';

				// header - logo area
				get_template_part('header/header-style', $header_style); 

				echo '</div>';
				echo '<div class="seocrawler-header-side-content ' . esc_attr($header_side_class) . '" >';

				get_template_part('header/header', 'top-bar');

				// closing tag is in footer

			}else{

				// header slider
				$print_top_bar = false;
				if( !empty($post_option['header-slider']) && $post_option['header-slider'] != 'none' ){
					$print_top_bar = true;
					get_template_part('header/header', 'top-bar');

					get_template_part('header/header', 'top-slider');
				}

				// header nav area
				$close_div = false;
				if( $header_style == 'plain' ){
					if( $header_background_style == 'transparent' ){
						$close_div = true;
						echo '<div class="seocrawler-header-background-transparent" >';
					}
				}else if( $header_style == 'boxed' ){
					$close_div = true;
					echo '<div class="seocrawler-header-boxed-wrap" >';
				}

				// top bar area
				if( !$print_top_bar ){
					get_template_part('header/header', 'top-bar');
				}

				// header - logo area
				get_template_part('header/header-style', $header_style); 

				if( !empty($close_div) ){
					echo '</div>';
				}

			}

			// page title area
			get_template_part('header/header', 'title');
			
		} // enable header area

	?>
	<div class="seocrawler-page-wrapper" id="seocrawler-page-wrapper" >