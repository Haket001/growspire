<?php
/**
 * The template for displaying archive not found
 */

	echo '<div class="seocrawler-not-found-wrap" id="seocrawler-full-no-header-wrap" >';
	echo '<div class="seocrawler-not-found-background" ></div>';
	echo '<div class="seocrawler-not-found-container seocrawler-container">';
	echo '<div class="seocrawler-header-transparent-substitute" ></div>';
	
	echo '<div class="seocrawler-not-found-content seocrawler-item-pdlr">';
	echo '<h1 class="seocrawler-not-found-head" >' . esc_html__('Not Found', 'seocrawler') . '</h1>';
	echo '<div class="seocrawler-not-found-caption" >' . esc_html__('Nothing matched your search criteria. Please try again with different keywords.', 'seocrawler') . '</div>';

	echo '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">';
	echo '<input type="text" class="search-field seocrawler-title-font" placeholder="' . esc_html__('Type Keywords...', 'seocrawler') . '" value="" name="s">';
	echo '<div class="seocrawler-top-search-submit"><i class="fa fa-search" ></i></div>';
	echo '<input type="submit" class="search-submit" value="Search">';
	echo '</form>';
	echo '<div class="seocrawler-not-found-back-to-home" ><a href="' . esc_url(home_url('/')) . '" >' . esc_html__('Or Back To Homepage', 'seocrawler') . '</a></div>';
	echo '</div>'; // seocrawler-not-found-content

	echo '</div>'; // seocrawler-not-found-container
	echo '</div>'; // seocrawler-not-found-wrap