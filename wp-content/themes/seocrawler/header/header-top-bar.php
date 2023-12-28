<?php
	/* a template for displaying the top bar */

	if( seocrawler_get_option('general', 'enable-top-bar', 'enable') == 'enable' ){

		$top_bar_width = seocrawler_get_option('general', 'top-bar-width', 'boxed');
		$top_bar_container_class = '';

		if( $top_bar_width == 'boxed' ){
			$top_bar_container_class = 'seocrawler-container ';
		}else if( $top_bar_width == 'custom' ){
			$top_bar_container_class = 'seocrawler-top-bar-custom-container ';
		}else{
			$top_bar_container_class = 'seocrawler-top-bar-full ';
		}
		
		echo '<div class="seocrawler-top-bar" >';
		echo '<div class="seocrawler-top-bar-background" ></div>';
		echo '<div class="seocrawler-top-bar-container clearfix ' . esc_attr($top_bar_container_class) . '" >';

		$language_flag = seocrawler_get_wpml_flag();
		$left_text = seocrawler_get_option('general', 'top-bar-left-text', '');
		$top_bar_social = seocrawler_get_option('general', 'enable-top-bar-social', 'enable');
		if( !empty($left_text) || !empty($language_flag) || $top_bar_social == 'enable' ){
			echo '<div class="seocrawler-top-bar-left seocrawler-item-pdlr">';
			if( !empty($left_text) || !empty($language_flag) ){
				echo '<div class="seocrawler-top-bar-left-text" >';
				echo gdlr_core_escape_content($language_flag);
				echo gdlr_core_escape_content(gdlr_core_text_filter($left_text));
				echo '</div>';
			}

			if( $top_bar_social == 'enable' ){
				echo '<div class="seocrawler-top-bar-left-social" >';
				get_template_part('header/header', 'social');
				echo '</div>';	
			}
			echo '</div>';
		}

		$right_text = seocrawler_get_option('general', 'top-bar-right-text', '');
		if( !empty($right_text) ){
			echo '<div class="seocrawler-top-bar-right seocrawler-item-pdlr">';
			if( !empty($right_text) ){
				echo '<div class="seocrawler-top-bar-right-text">';
				echo gdlr_core_escape_content(gdlr_core_text_filter($right_text));
				echo '</div>';
			}
			echo '</div>';	
		}
		echo '</div>';
		echo '</div>';

	}  // top bar
?>