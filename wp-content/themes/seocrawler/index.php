<?php
/**
 * The main template file
 */

	get_header();

	echo '<div class="seocrawler-content-container seocrawler-container">';
	echo '<div class="seocrawler-sidebar-style-none" >'; // for max width

	get_template_part('content/archive', 'default');

	echo '</div>'; // seocrawler-content-area
	echo '</div>'; // seocrawler-content-container

	get_footer(); 
