<?php
	/*	
	*	Goodlayers Option
	*	---------------------------------------------------------------------
	*	This file store an array of theme options
	*	---------------------------------------------------------------------
	*/	

	$seocrawler_admin_option->add_element(array(
	
		// typography head section
		'title' => esc_html__('Typography', 'seocrawler'),
		'slug' => 'seocrawler_typography',
		'icon' => get_template_directory_uri() . '/include/options/images/typography.png',
		'options' => array(
		
			// starting the subnav
			'font-family' => array(
				'title' => esc_html__('Font Family', 'seocrawler'),
				'options' => array(
					'heading-font' => array(
						'title' => esc_html__('Heading Font', 'seocrawler'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.seocrawler-body h1, .seocrawler-body h2, .seocrawler-body h3, ' . 
							'.seocrawler-body h4, .seocrawler-body h5, .seocrawler-body h6, .seocrawler-body .seocrawler-title-font,' .
							'.seocrawler-body .gdlr-core-title-font{ font-family: #gdlr#; }' . 
							'.woocommerce-breadcrumb, .woocommerce span.onsale, ' .
							'.single-product.woocommerce div.product p.price .woocommerce-Price-amount, .single-product.woocommerce #review_form #respond label{ font-family: #gdlr#; }'
					),
					'navigation-font' => array(
						'title' => esc_html__('Navigation Font', 'seocrawler'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.seocrawler-navigation .sf-menu > li > a, .seocrawler-navigation .sf-vertical > li > a, .seocrawler-navigation-font{ font-family: #gdlr#; }'
					),	
					'content-font' => array(
						'title' => esc_html__('Content Font', 'seocrawler'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.seocrawler-body, .seocrawler-body .gdlr-core-content-font, ' . 
							'.seocrawler-body input, .seocrawler-body textarea, .seocrawler-body button, .seocrawler-body select, ' . 
							'.seocrawler-body .seocrawler-content-font, .gdlr-core-audio .mejs-container *{ font-family: #gdlr#; }'
					),
					'info-font' => array(
						'title' => esc_html__('Info Font', 'seocrawler'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.seocrawler-body .gdlr-core-info-font, .seocrawler-body .seocrawler-info-font{ font-family: #gdlr#; }'
					),
					'blog-info-font' => array(
						'title' => esc_html__('Blog Info Font', 'seocrawler'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.seocrawler-body .gdlr-core-blog-info-font, .seocrawler-body .seocrawler-blog-info-font{ font-family: #gdlr#; }'
					),
					'quote-font' => array(
						'title' => esc_html__('Quote Font', 'seocrawler'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.seocrawler-body .gdlr-core-quote-font, blockquote{ font-family: #gdlr#; }'
					),
					'testimonial-font' => array(
						'title' => esc_html__('Testimonial Font', 'seocrawler'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.seocrawler-body .gdlr-core-testimonial-content{ font-family: #gdlr#; }'
					),
					'additional-font' => array(
						'title' => esc_html__('Additional Font', 'seocrawler'),
						'type' => 'font',
						'data-type' => 'font',
						'customizer' => false,
						'default' => 'Georgia, serif',
						'description' => esc_html__('Additional font you want to include for custom css.', 'seocrawler')
					),
					'additional-font2' => array(
						'title' => esc_html__('Additional Font2', 'seocrawler'),
						'type' => 'font',
						'data-type' => 'font',
						'customizer' => false,
						'default' => 'Georgia, serif',
						'description' => esc_html__('Additional font you want to include for custom css.', 'seocrawler')
					),
					
				) // font-family-options
			), // font-family-nav
			
			'font-size' => array(
				'title' => esc_html__('Font Size', 'seocrawler'),
				'options' => array(
				
					'h1-font-size' => array(
						'title' => esc_html__('H1 Size', 'seocrawler'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '52px',
						'selector' => '.seocrawler-body h1{ font-size: #gdlr#; }' 
					),					
					'h2-font-size' => array(
						'title' => esc_html__('H2 Size', 'seocrawler'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '48px',
						'selector' => '.seocrawler-body h2, #poststuff .gdlr-core-page-builder-body h2{ font-size: #gdlr#; }' 
					),					
					'h3-font-size' => array(
						'title' => esc_html__('H3 Size', 'seocrawler'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '36px',
						'selector' => '.seocrawler-body h3{ font-size: #gdlr#; }' 
					),					
					'h4-font-size' => array(
						'title' => esc_html__('H4 Size', 'seocrawler'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '28px',
						'selector' => '.seocrawler-body h4{ font-size: #gdlr#; }' 
					),					
					'h5-font-size' => array(
						'title' => esc_html__('H5 Size', 'seocrawler'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '22px',
						'selector' => '.seocrawler-body h5{ font-size: #gdlr#; }' 
					),					
					'h6-font-size' => array(
						'title' => esc_html__('H6 Size', 'seocrawler'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '18px',
						'selector' => '.seocrawler-body h6{ font-size: #gdlr#; }' 
					),					
					'navigation-font-size' => array(
						'title' => esc_html__('Navigation Font Size', 'seocrawler'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '14px',
						'selector' => '.seocrawler-navigation .sf-menu > li > a, .seocrawler-navigation .sf-vertical > li > a{ font-size: #gdlr#; }' 
					),	
					'navigation-font-weight' => array(
						'title' => esc_html__('Navigation Font Weight', 'seocrawler'),
						'type' => 'text',
						'data-type' => 'text',
						'default' => '800',
						'selector' => '.seocrawler-navigation .sf-menu > li > a, .seocrawler-navigation .sf-vertical > li > a{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'seocrawler')
					),	
					'navigation-font-letter-spacing' => array(
						'title' => esc_html__('Navigation Font Letter Spacing', 'seocrawler'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.seocrawler-navigation .sf-menu > li > a, .seocrawler-navigation .sf-vertical > li > a{ letter-spacing: #gdlr#; }'
					),
					'navigation-text-transform' => array(
						'title' => esc_html__('Navigation Text Transform', 'seocrawler'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'uppercase' => esc_html__('Uppercase', 'seocrawler'),
							'lowercase' => esc_html__('Lowercase', 'seocrawler'),
							'capitalize' => esc_html__('Capitalize', 'seocrawler'),
							'none' => esc_html__('None', 'seocrawler'),
						),
						'default' => 'uppercase',
						'selector' => '.seocrawler-navigation .sf-menu > li > a, .seocrawler-navigation .sf-vertical > li > a{ text-transform: #gdlr#; }',
					),
					'content-font-size' => array(
						'title' => esc_html__('Content Size', 'seocrawler'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '15px',
						'selector' => '.seocrawler-body{ font-size: #gdlr#; }' 
					),
					'content-line-height' => array(
						'title' => esc_html__('Content Line Height', 'seocrawler'),
						'type' => 'text',
						'data-type' => 'text',
						'default' => '1.7',
						'selector' => '.seocrawler-body, .seocrawler-body p, .seocrawler-line-height, .gdlr-core-line-height{ line-height: #gdlr#; }'
					),
					
				) // font-size-options
			), // font-size-nav			
			
			'font-upload' => array(
				'title' => esc_html__('Font Uploader', 'seocrawler'),
				'reload-after' => true,
				'customizer' => false,
				'options' => array(
				
					'font-upload' => array(
						'title' => esc_html__('Upload Fonts', 'seocrawler'),
						'type' => 'custom',
						'item-type' => 'fontupload',
						'wrapper-class' => 'gdlr-core-fullsize',
					),
					
				) // fontupload-options
			), // fontupload-nav
		
		) // typography-options
		
	), 4);