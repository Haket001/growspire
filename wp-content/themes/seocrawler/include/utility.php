<?php
	/*	
	*	Goodlayers Utility File
	*	---------------------------------------------------------------------
	*	This file contains utility function in the theme
	*	---------------------------------------------------------------------
	*/
	
	// a comment callback function to create comment list
	if ( !function_exists('seocrawler_comment_list') ){
		function seocrawler_comment_list( $comment, $args, $depth ){

			$GLOBALS['comment'] = $comment;

			if ( 'div' == $args['style'] ) {
			    $tag = 'div';
			    $add_below = 'comment';
			} else {
			    $tag = 'li';
			    $add_below = 'div-comment';
			}

?>
<<?php echo esc_html($tag); ?> <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<article id="comment-<?php comment_ID(); ?>" class="comment-article">
		<div class="comment-avatar"><?php echo get_avatar( $comment, 90 ); ?></div>
		<div class="comment-body">
			<header class="comment-meta">
				<div class="comment-author seocrawler-title-font"><?php echo get_comment_author_link(); ?></div>
				<div class="comment-time seocrawler-info-font">
					<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
						<time datetime="<?php echo get_comment_time('c'); ?>">
							<?php echo get_comment_date() . ' ' . esc_html__('at', 'seocrawler') . ' ' . get_comment_time(); ?>
						</time>
					</a>
				</div>
			<div class="comment-reply">
				<?php comment_reply_link(array_merge($args, array(
					'reply_text' => esc_html__('Reply', 'seocrawler'), 
					'depth' => $depth, 
					'max_depth' => $args['max_depth'])
				)); ?>
			</div><!-- reply -->					
			</header>

			<?php if( '0' == $comment->comment_approved ){ ?>
				<p class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'seocrawler' ); ?></p>
			<?php } ?>

			<section class="comment-content">
				<?php comment_text(); ?>
				<?php edit_comment_link( esc_html__( 'Edit', 'seocrawler' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- comment-content -->

		</div><!-- comment-body -->
	</article><!-- comment-article -->
<?php

		}
	}
	
	// get option for uses
	if( !function_exists('seocrawler_get_option') ){
		function seocrawler_get_option($option, $key = '', $default = ''){
			$option = 'seocrawler_' . $option;
			
			if( empty($GLOBALS[$option]) ){
				$GLOBALS[$option] = get_option($option, '');
			}
				
			if( !empty($key) ){
				if( !empty($GLOBALS[$option][$key]) || (isset($GLOBALS[$option][$key]) && $GLOBALS[$option][$key] === '0') ){
					return $GLOBALS[$option][$key];
				}else{
					return $default;
				}
			}else{
				return $GLOBALS[$option];
			}
		}
	}

	// set option for temporary uses
	if( !function_exists('seocrawler_set_option') ){
		function seocrawler_set_option($option, $key = '', $value = ''){
			$option = 'seocrawler_' . $option;
			
			if( empty($GLOBALS[$option]) ){
				$GLOBALS[$option] = get_option($option, '');
			}
				
			if( !empty($key) ){
				if( !empty($GLOBALS[$option][$key]) ){
					$GLOBALS[$option][$key] = $value;
				}
			}
		}
	}

	// get post option for uses
	if( !function_exists('seocrawler_get_post_option') ){
		function seocrawler_get_post_option( $post_id, $key = 'gdlr-core-page-option' ){

			global $seocrawler_post_option;

			if( empty($seocrawler_post_option['id']) || $seocrawler_post_option['id'] != $post_id || 
				empty($seocrawler_post_option['key']) || $seocrawler_post_option['key'] != $key ){

				$seocrawler_post_option = array(
					'id' => $post_id,
					'key' => $key,
					'option' => get_post_meta($post_id, $key, true)
				);
			}

			return $seocrawler_post_option['option'];
		}
	}

	// get blog info :: originate from gdlr core plugin
	if( !function_exists('seocrawler_get_blog_info') ){
		function seocrawler_get_blog_info($args){
			
			$blog_info_prefix = array(
				'date' => '<i class="icon_clock_alt" ></i>',
				'tag' => '<i class="icon_tags_alt" ></i>',
				'category' => '<i class="icon_folder-alt" ></i>',
				'comment' => '<i class="icon_comment_alt" ></i>',
				'like' => '<i class="icon_heart_alt" ></i>',
				'author' => '<i class="icon_documents_alt" ></i>',
				'comment-number' => '<i class="icon_comment_alt" ></i>',
			);

			$ret = '';
			
			if( !empty($args['display']) ){
				foreach( $args['display'] as $blog_info ){
					
					$ret_temp = '';
					
					switch( $blog_info ){
						case 'date':
							$ret_temp .= '<a href="' . get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')) . '">';
							$ret_temp .= get_the_date();
							$ret_temp .= '</a>';
							break;
							
						case 'tag':
							$ret_temp .= get_the_term_list(get_the_ID(), 'post_tag', '', '<span class="gdlr-core-sep">,</span> ' , '');							
							break;
							
						case 'category':
							$ret_temp .= get_the_term_list(get_the_ID(), 'category', '', '<span class="gdlr-core-sep">,</span> ' , '' );;					
							break;
							
						case 'comment-number':
							$ret_temp .= get_comments_number() . ' ';
							break;
						
						case 'comment':
							ob_start();
							comments_number(
								esc_html__('no comments', 'seocrawler'), 
								esc_html__('one comment', 'seocrawler'), 
								esc_html__('% comments', 'seocrawler') 
							);
							$ret_temp .= '<a href="' . get_permalink() . '#respond" >';
							$ret_temp .= ob_get_contents();
							$ret_temp .= '</a>';
							ob_end_clean();								
							break;
							
						case 'author':
							ob_start();
							the_author_posts_link();
							$ret_temp .= ob_get_contents();
							ob_end_clean();					
							break;
					} // switch
					
					if( !empty($ret_temp) ){
						
						$ret .= '<div class="seocrawler-blog-info seocrawler-blog-info-font seocrawler-blog-info-' . esc_attr($blog_info) . '">';
						if( !empty($args['separator']) ){
							$ret .= '<span class="seocrawler-blog-info-sep" >' . $args['separator'] . '</span>';
						}
						if( (!isset($args['icon']) || $args['icon'] !== false) && !empty($blog_info_prefix[$blog_info]) ){
							$ret .= '<span class="seocrawler-head" >' . $blog_info_prefix[$blog_info] . '</span>';
						}
						$ret .= $ret_temp;
						$ret .= '</div>';
					}
					
				} // foreach
			} // $args['display']
			
			if( !empty($ret) && !empty($args['wrapper']) ){
				$ret = '<div class="seocrawler-blog-info-wrapper" >' . $ret . '</div>';
			}
			return $ret;
		}
	}

	// get the sidebar
	if( !function_exists('seocrawler_get_sidebar_wrap_class') ){
		function seocrawler_get_sidebar_wrap_class($sidebar_type){
			return ' seocrawler-sidebar-wrap clearfix seocrawler-line-height-0 seocrawler-sidebar-style-' . $sidebar_type;
		}
	}
	if( !function_exists('seocrawler_get_sidebar_class') ){
		function seocrawler_get_sidebar_class($args){

			// set default column
			if( empty($args['column']) ){
				if( $args['sidebar-type'] == 'both' ){
					$args['column'] = seocrawler_get_option('general', 'both-sidebar-width', 15);
				}else if( $args['sidebar-type'] == 'left' || $args['sidebar-type'] == 'right' ){
					$args['column'] = seocrawler_get_option('general', 'sidebar-width', 20);
				}else{
					$args['column'] = 60;
				}
			}

			// if center section
			if( $args['section'] == 'center' ){
				if( $args['sidebar-type'] == 'both' ){
					$args['column'] = 60 - (2 * intval($args['column']));
				}else if( $args['sidebar-type'] == 'left' || $args['sidebar-type'] == 'right' ){
					$args['column'] = 60 - intval($args['column']);
				}
			}

			$sidebar_class  = ' seocrawler-sidebar-' . $args['section'];
			$sidebar_class .= ' seocrawler-column-' . $args['column'];
			$sidebar_class .= ' seocrawler-line-height';

			return $sidebar_class; 
		}
	}
	if( !function_exists('seocrawler_get_sidebar') ){
		function seocrawler_get_sidebar($sidebar_type, $section, $sidebar_id){

			echo '<div class="' . seocrawler_get_sidebar_class(array('sidebar-type'=>$sidebar_type, 'section'=>$section)) . ' seocrawler-line-height" >';
			echo '<div class="seocrawler-sidebar-area seocrawler-item-pdlr" >';
			if( is_active_sidebar($sidebar_id) ){ 
				dynamic_sidebar($sidebar_id); 
			}
			echo '</div>';
			echo '</div>';

		}
	}

	// overlay menu
	if( !function_exists('seocrawler_get_top_search') ){
		function seocrawler_get_top_search(){
			add_filter('seocrawler_get_top_search_form', 'seocrawler_get_top_search_form_enable');
?>
<div class="seocrawler-top-search-wrap" >
	<div class="seocrawler-top-search-close" ></div>

	<div class="seocrawler-top-search-row" >
		<div class="seocrawler-top-search-cell" >
			<?php get_search_form() ?>
		</div>
	</div>

</div>
<?php
			remove_filter('seocrawler_get_top_search_form', 'seocrawler_get_top_search_form_enable');
		}
	}	
	if( !function_exists('seocrawler_get_top_search_form_enable') ){
		function seocrawler_get_top_search_form_enable( $top_search ){
			return true;
		}
	}