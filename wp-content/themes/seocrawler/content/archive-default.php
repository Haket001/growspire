<?php
/**
 * The template part for displaying default archive
 */

	echo '<div class="seocrawler-content-area seocrawler-item-pdlr" >';

	while( have_posts() ){ the_post();

		get_template_part('content/content', 'full');
		
	} // while

	the_posts_pagination(array(
		'prev_text'          => esc_html__('Previous page', 'seocrawler'),
		'next_text'          => esc_html__('Next page', 'seocrawler'),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'seocrawler') . ' </span>',
	));

	echo '</div>'; // seocrawler-content-area