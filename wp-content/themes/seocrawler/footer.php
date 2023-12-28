<?php
/**
 * The template for displaying the footer
 */
	
	$post_option = seocrawler_get_post_option(get_the_ID());
	if( empty($post_option['enable-footer']) || $post_option['enable-footer'] == 'default' ){
		$enable_footer = seocrawler_get_option('general', 'enable-footer', 'enable');
	}else{
		$enable_footer = $post_option['enable-footer'];
	}	
	if( empty($post_option['enable-copyright']) || $post_option['enable-copyright'] == 'default' ){
		$enable_copyright = seocrawler_get_option('general', 'enable-copyright', 'enable');
	}else{
		$enable_copyright = $post_option['enable-footer'];
	}

	$fixed_footer = seocrawler_get_option('general', 'fixed-footer', 'disable');
	echo '</div>'; // seocrawler-page-wrapper

	if( $enable_footer == 'enable' || $enable_copyright == 'enable' ){

		if( $fixed_footer == 'enable' ){
			echo '</div>'; // seocrawler-body-wrapper

			echo '<footer class="seocrawler-fixed-footer" id="seocrawler-fixed-footer" >';
		}else{
			echo '<footer>';
		}

		if( $enable_footer == 'enable' ){

			$seocrawler_footer_layout = array(
				'footer-1'=>array('seocrawler-column-60'),
				'footer-2'=>array('seocrawler-column-15', 'seocrawler-column-15', 'seocrawler-column-15', 'seocrawler-column-15'),
				'footer-3'=>array('seocrawler-column-15', 'seocrawler-column-15', 'seocrawler-column-30',),
				'footer-4'=>array('seocrawler-column-20', 'seocrawler-column-20', 'seocrawler-column-20'),
				'footer-5'=>array('seocrawler-column-20', 'seocrawler-column-40'),
				'footer-6'=>array('seocrawler-column-40', 'seocrawler-column-20'),
			);
			$footer_style = seocrawler_get_option('general', 'footer-style');
			$footer_style = empty($footer_style)? 'footer-2': $footer_style;

			$count = 0;
			$has_widget = false;
			foreach( $seocrawler_footer_layout[$footer_style] as $layout ){ $count++;
				if( is_active_sidebar('footer-' . $count) ){ $has_widget = true; }
			}

			if( $has_widget ){ 
				echo '<div class="seocrawler-footer-wrapper" >';
				echo '<div class="seocrawler-footer-container seocrawler-container clearfix" >';
				
				$count = 0;
				foreach( $seocrawler_footer_layout[$footer_style] as $layout ){ $count++;
					echo '<div class="seocrawler-footer-column seocrawler-item-pdlr ' . esc_attr($layout) . '" >';
					if( is_active_sidebar('footer-' . $count) ){
						dynamic_sidebar('footer-' . $count); 
					}
					echo '</div>';
				}
				
				echo '</div>'; // seocrawler-footer-container
				echo '</div>'; // seocrawler-footer-wrapper 
			}

		} // enable footer

		if( $enable_copyright == 'enable' ){
			$copyright_style = seocrawler_get_option('general', 'copyright-style', 'center');
			
			if( $copyright_style == 'center' ){
				$copyright_text = seocrawler_get_option('general', 'copyright-text');

				if( !empty($copyright_text) ){
					echo '<div class="seocrawler-copyright-wrapper" >';
					echo '<div class="seocrawler-copyright-container seocrawler-container">';
					echo '<div class="seocrawler-copyright-text seocrawler-item-pdlr">';
					echo gdlr_core_escape_content(gdlr_core_text_filter($copyright_text));
					echo '</div>';
					echo '</div>';
					echo '</div>'; // seocrawler-copyright-wrapper
				}
			}else if( $copyright_style == 'left-right' ){
				$copyright_left = seocrawler_get_option('general', 'copyright-left');
				$copyright_right = seocrawler_get_option('general', 'copyright-right');

				if( !empty($copyright_left) || !empty($copyright_right) ){
					echo '<div class="seocrawler-copyright-wrapper" >';
					echo '<div class="seocrawler-copyright-container seocrawler-container clearfix">';
					if( !empty($copyright_left) ){
						echo '<div class="seocrawler-copyright-left seocrawler-item-pdlr">';
						echo gdlr_core_escape_content(gdlr_core_text_filter($copyright_left));
						echo '</div>';
					}

					if( !empty($copyright_right) ){
						echo '<div class="seocrawler-copyright-right seocrawler-item-pdlr">';
						echo gdlr_core_escape_content(gdlr_core_text_filter($copyright_right));
						echo '</div>';
					}
					echo '</div>';
					echo '</div>'; // seocrawler-copyright-wrapper
				}
			}
		}

		echo '</footer>';

		if( $fixed_footer == 'disable' ){
			echo '</div>'; // seocrawler-body-wrapper
		}
		echo '</div>'; // seocrawler-body-outer-wrapper

	// disable footer	
	}else{
		echo '</div>'; // seocrawler-body-wrapper
		echo '</div>'; // seocrawler-body-outer-wrapper
	}

	$header_style = seocrawler_get_option('general', 'header-style', 'plain');
	
	if( $header_style == 'side' || $header_style == 'side-toggle' ){
		echo '</div>'; // seocrawler-header-side-nav-content
	}

	$back_to_top = seocrawler_get_option('general', 'enable-back-to-top', 'disable');
	if( $back_to_top == 'enable' ){
		echo '<a href="#seocrawler-top-anchor" class="seocrawler-footer-back-to-top-button" id="seocrawler-footer-back-to-top-button"><i class="fa fa-angle-up" ></i></a>';
	}
?>

<?php wp_footer(); ?>

</body>
</html>