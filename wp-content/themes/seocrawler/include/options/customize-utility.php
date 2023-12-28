<?php

	// use to clear an option for customize page
	if( !function_exists('seocrawler_clear_option') ){
		function seocrawler_clear_option(){
			$options = array('general', 'typography', 'color', 'plugin');

			foreach( $options as $option ){
				unset($GLOBALS['seocrawler_' . $option]);
			}
			
		}
	}