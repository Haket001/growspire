<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); 

	while( have_posts() ){ the_post();

		// print header title
		if( get_post_type() == 'post' ){
			get_template_part('header/header', 'title-blog');
		}

		$post_option = seocrawler_get_post_option(get_the_ID());
		$post_option['show-content'] = empty($post_option['show-content'])? 'enable': $post_option['show-content']; 

		if( empty($post_option['sidebar']) || $post_option['sidebar'] == 'default' ){
			$sidebar_type = seocrawler_get_option('general', 'blog-sidebar', 'none');
			$sidebar_left = seocrawler_get_option('general', 'blog-sidebar-left');
			$sidebar_right = seocrawler_get_option('general', 'blog-sidebar-right');
		}else{
			$sidebar_type = empty($post_option['sidebar'])? 'none': $post_option['sidebar'];
			$sidebar_left = empty($post_option['sidebar-left'])? '': $post_option['sidebar-left'];
			$sidebar_right = empty($post_option['sidebar-right'])? '': $post_option['sidebar-right'];
		}

		if( $sidebar_type != 'none' || $post_option['show-content'] == 'enable' ){
			echo '<div class="seocrawler-content-container seocrawler-container">';
			echo '<div class="' . seocrawler_get_sidebar_wrap_class($sidebar_type) . '" >';

			// sidebar content
			echo '<div class="' . seocrawler_get_sidebar_class(array('sidebar-type'=>$sidebar_type, 'section'=>'center')) . '" >';
			echo '<div class="seocrawler-content-wrap seocrawler-item-pdlr clearfix" >';

			// single content
			if( $post_option['show-content'] == 'enable' ){
				echo '<div class="seocrawler-content-area" >';
				if( in_array(get_post_format(), array('aside', 'quote', 'link')) ){
					get_template_part('content/content', get_post_format());
				}else{
					get_template_part('content/content', 'single');
				}
				echo '</div>';
			}
		}

		if( !post_password_required() ){
			if( $sidebar_type != 'none' ){
				echo '<div class="seocrawler-page-builder-wrap seocrawler-item-rvpdlr" >';
				do_action('gdlr_core_print_page_builder');
				echo '</div>';

			// sidebar == 'none'
			}else{
				ob_start();
				do_action('gdlr_core_print_page_builder');
				$pb_content = ob_get_contents();
				ob_end_clean();

				if( !empty($pb_content) ){
					if( $post_option['show-content'] == 'enable' ){
						echo '</div>'; // seocrawler-content-area
						echo '</div>'; // seocrawler_get_sidebar_class
						echo '</div>'; // seocrawler_get_sidebar_wrap_class
						echo '</div>'; // seocrawler_content_container
					}
					echo gdlr_core_escape_content($pb_content);
					echo '<div class="seocrawler-bottom-page-builder-container seocrawler-container" >'; // seocrawler-content-area
					echo '<div class="seocrawler-bottom-page-builder-sidebar-wrap seocrawler-sidebar-style-none" >'; // seocrawler_get_sidebar_class
					echo '<div class="seocrawler-bottom-page-builder-sidebar-class" >'; // seocrawler_get_sidebar_wrap_class
					echo '<div class="seocrawler-bottom-page-builder-content seocrawler-item-pdlr" >'; // seocrawler_content_container
				}
			}
		}

		// social share
		if( seocrawler_get_option('general', 'blog-social-share', 'enable') == 'enable' ){
			if( class_exists('gdlr_core_pb_element_social_share') ){
				$share_count = (seocrawler_get_option('general', 'blog-social-share-count', 'enable') == 'enable')? 'counter': 'none';

				echo '<div class="seocrawler-single-social-share seocrawler-item-rvpdlr" >';
				echo gdlr_core_pb_element_social_share::get_content(array(
					'social-head' => $share_count,
					'layout'=>'left-text', 
					'text-align'=>'center',
					'facebook'=>seocrawler_get_option('general', 'blog-social-facebook', 'enable'),
					'linkedin'=>seocrawler_get_option('general', 'blog-social-linkedin', 'enable'),
					'google-plus'=>seocrawler_get_option('general', 'blog-social-google-plus', 'enable'),
					'pinterest'=>seocrawler_get_option('general', 'blog-social-pinterest', 'enable'),
					'stumbleupon'=>seocrawler_get_option('general', 'blog-social-stumbleupon', 'enable'),
					'twitter'=>seocrawler_get_option('general', 'blog-social-twitter', 'enable'),
					'email'=>seocrawler_get_option('general', 'blog-social-email', 'enable'),
					'padding-bottom'=>'0px'
				));
				echo '</div>';
			}
		}

		// author section
		$author_desc = get_the_author_meta('description');
		if( !empty($author_desc) && seocrawler_get_option('general', 'blog-author', 'enable') == 'enable' ){
			echo '<div class="clear"></div>';
			echo '<div class="seocrawler-single-author" >';
			echo '<div class="seocrawler-single-author-wrap" >';
			echo '<div class="seocrawler-single-author-avartar seocrawler-media-image">' . get_avatar(get_the_author_meta('ID'), 90) . '</div>';
			
			echo '<div class="seocrawler-single-author-content-wrap" >';
			echo '<div class="seocrawler-single-author-caption seocrawler-info-font" >' . esc_html__('About the author', 'seocrawler') . '</div>';
			echo '<h4 class="seocrawler-single-author-title">';
			the_author_posts_link();
			echo '</h4>';

			echo '<div class="seocrawler-single-author-description" >' . gdlr_core_escape_content(gdlr_core_text_filter($author_desc)) . '</div>';
			echo '</div>'; // seocrawler-single-author-content-wrap
			echo '</div>'; // seocrawler-single-author-wrap
			echo '</div>'; // seocrawler-single-author
		}

		// prev - next post navigation
		if( seocrawler_get_option('general', 'blog-navigation', 'enable') == 'enable' ){
			$prev_post = get_previous_post_link(
				'<span class="seocrawler-single-nav seocrawler-single-nav-left">%link</span>',
				'<i class="arrow_left" ></i><span class="seocrawler-text" >' . esc_html__( 'Prev', 'seocrawler' ) . '</span>'
			);
			$next_post = get_next_post_link(
				'<span class="seocrawler-single-nav seocrawler-single-nav-right">%link</span>',
				'<span class="seocrawler-text" >' . esc_html__( 'Next', 'seocrawler' ) . '</span><i class="arrow_right" ></i>'
			);
			if( !empty($prev_post) || !empty($next_post) ){
				echo '<div class="seocrawler-single-nav-area clearfix" >' . $prev_post . $next_post . '</div>';
			}
		}

		// comments template
		if( comments_open() || get_comments_number() ){
			comments_template();
		}

		echo '</div>'; // seocrawler-content-area
		echo '</div>'; // seocrawler-get-sidebar-class

		// sidebar left
		if( $sidebar_type == 'left' || $sidebar_type == 'both' ){
			echo seocrawler_get_sidebar($sidebar_type, 'left', $sidebar_left);
		}

		// sidebar right
		if( $sidebar_type == 'right' || $sidebar_type == 'both' ){
			echo seocrawler_get_sidebar($sidebar_type, 'right', $sidebar_right);
		}

		echo '</div>'; // seocrawler-get-sidebar-wrap-class
	 	echo '</div>'; // seocrawler-content-container

	} // while

	get_footer(); 
?>