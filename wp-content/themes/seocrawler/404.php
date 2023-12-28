<?php
/**
 * The template for displaying 404 pages (not found)
 */

	get_header();

	echo '<div class="seocrawler-not-found-wrap" id="seocrawler-full-no-header-wrap" >';
	echo '<div class="seocrawler-not-found-background" ></div>';
	echo '<div class="seocrawler-not-found-container seocrawler-container">';
	echo '<div class="seocrawler-header-transparent-substitute" ></div>';
	
	echo '<div class="seocrawler-not-found-content seocrawler-item-pdlr">';
	echo '<h1 class="seocrawler-not-found-head" >' . esc_html__('404', 'seocrawler') . '</h1>';
	echo '<h3 class="seocrawler-not-found-title seocrawler-content-font" >' . esc_html__('Page Not Found', 'seocrawler') . '</h3>';
	echo '<div class="seocrawler-not-found-caption" >' . esc_html__('Sorry, we couldn\'t find the page you\'re looking for.', 'seocrawler') . '</div>';

	echo '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">';
	echo '<input type="text" class="search-field seocrawler-title-font" placeholder="' . esc_html__('Type Keywords...', 'seocrawler') . '" value="" name="s">';
	echo '<div class="seocrawler-top-search-submit"><i class="fa fa-search" ></i></div>';
	echo '<input type="submit" class="search-submit" value="Search">';
	echo '</form>';
	echo '<div class="seocrawler-not-found-back-to-home" ><a href="' . esc_url(home_url('/')) . '" >' . esc_html__('Or Back To Homepage', 'seocrawler') . '</a></div>';
	echo '</div>'; // seocrawler-not-found-content

	echo '</div>'; // seocrawler-not-found-container
	echo '</div>'; // seocrawler-not-found-wrap

	get_footer(); 
