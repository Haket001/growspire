<?php
	/*	
	*	Goodlayers Option
	*	---------------------------------------------------------------------
	*	This file store an array of theme options
	*	---------------------------------------------------------------------
	*/	

	// save the css/js file 
	add_action('gdlr_core_after_save_theme_option', 'seocrawler_gdlr_core_after_save_theme_option');
	if( !function_exists('seocrawler_gdlr_core_after_save_theme_option') ){
		function seocrawler_gdlr_core_after_save_theme_option(){
			if( function_exists('gdlr_core_generate_combine_script') ){
				seocrawler_clear_option();

				gdlr_core_generate_combine_script(array(
					'lightbox' => seocrawler_gdlr_core_lightbox_type()
				));
			}
		}
	}

	// add the option
	$seocrawler_admin_option->add_element(array(
	
		// plugin head section
		'title' => esc_html__('Miscellaneous', 'seocrawler'),
		'slug' => 'seocrawler_plugin',
		'icon' => get_template_directory_uri() . '/include/options/images/plugin.png',
		'options' => array(
		
			// starting the subnav
			'thumbnail-sizing' => array(
				'title' => esc_html__('Thumbnail Sizing', 'seocrawler'),
				'customizer' => false,
				'options' => array(
				
					'enable-srcset' => array(
						'title' => esc_html__('Enable Srcset', 'seocrawler'),
						'type' => 'checkbox',
						'default' => 'disable',
						'description' => esc_html__('Enable this option will improve the performance by resizing the image based on the screensize. Please be cautious that this will generate multiple images on your server.', 'seocrawler')
					),
					'thumbnail-sizing' => array(
						'title' => esc_html__('Add Thumbnail Size', 'seocrawler'),
						'type' => 'custom',
						'item-type' => 'thumbnail-sizing',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					
				) // thumbnail-sizing-options
			), // thumbnail-sizing-nav		
			'plugins' => array(
				'title' => esc_html__('Plugins', 'seocrawler'),
				'options' => array(

					'lightbox' => array(
						'title' => esc_html__('Lightbox Type', 'seocrawler'),
						'type' => 'combobox',
						'options' => array(
							'ilightbox' => esc_html__('ilightbox', 'seocrawler'),
							'strip' => esc_html__('Strip', 'seocrawler'),
						)
					),
					'ilightbox-skin' => array(
						'title' => esc_html__('iLightbox Skin', 'seocrawler'),
						'type' => 'combobox',
						'options' => array(
							'dark' => esc_html__('Dark', 'seocrawler'),
							'light' => esc_html__('Light', 'seocrawler'),
							'mac' => esc_html__('Mac', 'seocrawler'),
							'metro-black' => esc_html__('Metro Black', 'seocrawler'),
							'metro-white' => esc_html__('Metro White', 'seocrawler'),
							'parade' => esc_html__('Parade', 'seocrawler'),
							'smooth' => esc_html__('Smooth', 'seocrawler'),		
						),
						'condition' => array( 'lightbox' => 'ilightbox' )
					),
					'link-to-lightbox' => array(
						'title' => esc_html__('Turn Image Link To Open In Lightbox', 'seocrawler'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					
				) // plugin-options
			), // plugin-nav		
			'additional-script' => array(
				'title' => esc_html__('Custom Css/Js', 'seocrawler'),
				'options' => array(
				
					'additional-css' => array(
						'title' => esc_html__('Additional CSS ( without <style> tag )', 'seocrawler'),
						'type' => 'textarea',
						'data-type' => 'text',
						'selector' => '#gdlr#',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'additional-mobile-css' => array(
						'title' => esc_html__('Mobile CSS ( screen below 767px )', 'seocrawler'),
						'type' => 'textarea',
						'data-type' => 'text',
						'selector' => '@media only screen and (max-width: 767px){ #gdlr# }',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'additional-head-script' => array(
						'title' => esc_html__('Additional Head Script ( without <script> tag )', 'seocrawler'),
						'type' => 'textarea',
						'wrapper-class' => 'gdlr-core-fullsize',
						'descriptin' => esc_html__('Eg. For analytics', 'seocrawler')
					),
					'additional-script' => array(
						'title' => esc_html__('Additional Script ( without <script> tag )', 'seocrawler'),
						'type' => 'textarea',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					
				) // additional-script-options
			), // additional-script-nav	
			'maintenance' => array(
				'title' => esc_html__('Maintenance Mode', 'seocrawler'),
				'options' => array(		
					'enable-maintenance' => array(
						'title' => esc_html__('Enable Maintenance / Coming Soon Mode', 'seocrawler'),
						'type' => 'checkbox',
						'default' => 'disable'
					),					
					'maintenance-page' => array(
						'title' => esc_html__('Select Maintenance / Coming Soon Page', 'seocrawler'),
						'type' => 'combobox',
						'options' => 'post_type',
						'options-data' => 'page'
					),

				) // maintenance-options
			), // maintenance
			'pre-load' => array(
				'title' => esc_html__('Preload', 'seocrawler'),
				'options' => array(		
					'enable-preload' => array(
						'title' => esc_html__('Enable Preload', 'seocrawler'),
						'type' => 'checkbox',
						'default' => 'disable'
					),
					'preload-image' => array(
						'title' => esc_html__('Preload Image', 'seocrawler'),
						'type' => 'upload',
						'data-type' => 'file', 
						'selector' => '.seocrawler-page-preload{ background-image: url(#gdlr#); }',
						'condition' => array( 'enable-preload' => 'enable' ),
						'description' => esc_html__('Upload the image (.gif) you want to use as preload animation. You could search it online at https://www.google.com/search?q=loading+gif as well', 'seocrawler')
					),
				)
			),
			'import-export' => array(
				'title' => esc_html__('Import / Export', 'seocrawler'),
				'options' => array(

					'export' => array(
						'title' => esc_html__('Export Option', 'seocrawler'),
						'type' => 'export',
						'action' => 'gdlr_core_theme_option_export',
						'options' => array(
							'all' => esc_html__('All Options(general/typography/color/miscellaneous) exclude widget, custom template', 'seocrawler'),
							'seocrawler_general' => esc_html__('General Option', 'seocrawler'),
							'seocrawler_typography' => esc_html__('Typography Option', 'seocrawler'),
							'seocrawler_color' => esc_html__('Color Option', 'seocrawler'),
							'seocrawler_plugin' => esc_html__('Miscellaneous', 'seocrawler'),
							'widget' => esc_html__('Widget', 'seocrawler'),
							'page-builder-template' => esc_html__('Custom Page Builder Template', 'seocrawler'),
						),
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'import' => array(
						'title' => esc_html__('Import Option', 'seocrawler'),
						'type' => 'import',
						'action' => 'gdlr_core_theme_option_import',
						'wrapper-class' => 'gdlr-core-fullsize'
					),

				) // import-options
			), // import-export
			
		
		) // plugin-options
		
	), 8);	