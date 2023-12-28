<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<script type="text/javascript" src="https://app.secureprivacy.ai/script/5b4f25a47df5d7189c6c645b.js"></script>
	<!-- Hotjar Tracking Code for https://growspire.agency -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1690889,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
	<!-- MailerLite Universal -->
<script>
    (function(w,d,e,u,f,l,n){w[f]=w[f]||function(){(w[f].q=w[f].q||[])
    .push(arguments);},l=d.createElement(e),l.async=1,l.src=u,
    n=d.getElementsByTagName(e)[0],n.parentNode.insertBefore(l,n);})
    (window,document,'script','https://assets.mailerlite.com/js/universal.js','ml');
    ml('account', '715102');
</script>
<!-- End MailerLite Universal -->

	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MNMS8CH');</script>
<!-- End Google Tag Manager -->

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
	
	<!-- Global site tag (gtag.js) - Google Ads: 973710567 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-973710567"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-973710567');
</script>
	<script>
  gtag('event', 'page_view', {
    'send_to': 'AW-973710567',
    'value': 'replace with value',
    'items': [{
      'id': 'replace with value',
      'location_id': 'replace with value',
      'google_business_vertical': 'custom'
    }]
  });
</script>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNMS8CH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(49213768, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/49213768" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?php 
	$body_wrapper_class = '';

	$header_style = seocrawler_get_option('general', 'header-style', 'plain');
	if( $header_style == 'side' ){

		$header_side_class  = ' seocrawler-style-side';
		$header_side_style = seocrawler_get_option('general', 'header-side-style', 'top-left');

		switch( $header_side_style ){
			case 'top-left': 
				$header_side_class .= ' seocrawler-style-left';
				$body_wrapper_class .= ' seocrawler-left';
				break;
			case 'top-right': 
				$header_side_class .= ' seocrawler-style-right';
				$body_wrapper_class .= ' seocrawler-right';
				break;
			case 'middle-left':
			case 'middle-left-2':
				$header_side_class .= ' seocrawler-style-left seocrawler-style-middle';
				$body_wrapper_class .= ' seocrawler-left';
				break;
			case 'middle-right': 
			case 'middle-right-2': 
				$header_side_class .= ' seocrawler-style-right seocrawler-style-middle';
				$body_wrapper_class .= ' seocrawler-right';
				break;
			default: 
				break;
		}
	}else if( $header_style == 'side-toggle' ){

		$header_side_style = seocrawler_get_option('general', 'header-side-toggle-style', 'left');

		$header_side_class  = ' seocrawler-style-side-toggle';
		$header_side_class .= ' seocrawler-style-' . $header_side_style;
		$body_wrapper_class .= ' seocrawler-' . $header_side_style;

	}else if( $header_style == 'boxed' ){

		$body_wrapper_class .= ' seocrawler-with-transparent-header';
		
	}else{

		$header_background_style = seocrawler_get_option('general', 'header-background-style', 'solid');

		if( $header_background_style == 'transparent' ){
			if( $header_style == 'plain' ){
				$body_wrapper_class .= ' seocrawler-with-transparent-header';
			}else if( $header_style == 'bar' ){
				$body_wrapper_class .= ' seocrawler-with-transparent-navigation';
			}
		}
	}

	$layout = seocrawler_get_option('general', 'layout', 'full');
	if( $layout == 'full' && in_array($header_style, array('plain', 'bar', 'boxed')) ){
		$body_wrapper_class .= ' seocrawler-with-frame';
	}

	$post_option = seocrawler_get_post_option(get_the_ID());
	
	// mobile menu
	$body_outer_wrapper_class = '';
	if( empty($post_option['enable-header-area']) || $post_option['enable-header-area'] == 'enable' ){
		get_template_part('header/header', 'mobile');
	}else{
		$body_outer_wrapper_class = ' seocrawler-header-disable';
	}
	
	// preload
	$preload = seocrawler_get_option('plugin', 'enable-preload', 'disable');
	if( $preload == 'enable' ){
		echo '<div class="seocrawler-page-preload gdlr-core-page-preload gdlr-core-js" id="seocrawler-page-preload" data-animation-time="500" ></div>';
	}
?>
<div class="seocrawler-body-outer-wrapper <?php echo esc_attr($body_outer_wrapper_class); ?>">
	<?php
		get_template_part('header/header', 'bullet-anchor');

		if( $layout == 'boxed' ){
			if( !empty($post_option['body-background-type']) && $post_option['body-background-type'] == 'image' ){
				echo '<div class="seocrawler-body-background" ' . gdlr_core_esc_style(array(
					'background-image' => empty($post_option['body-background-image'])? '': $post_option['body-background-image'],
					'opacity' => empty($post_option['body-background-image-opacity'])? '': (floatval($post_option['body-background-image-opacity']) / 100)
				)) . ' ></div>';
			}else{
				$background_type = seocrawler_get_option('general', 'background-type', 'color');
				if( $background_type == 'image' ){
					echo '<div class="seocrawler-body-background" ></div>';
				}
			}
		}
	?>
	<div class="seocrawler-body-wrapper clearfix <?php echo esc_attr($body_wrapper_class); ?>">
	<?php  

		if( empty($post_option['enable-header-area']) || $post_option['enable-header-area'] == 'enable' ){

			if( $header_style == 'side' || $header_style == 'side-toggle' ){

				echo '<div class="seocrawler-header-side-nav seocrawler-header-background ' . esc_attr($header_side_class) . '" id="seocrawler-header-side-nav" >';

				// header - logo area
				get_template_part('header/header-style', $header_style); 

				echo '</div>';
				echo '<div class="seocrawler-header-side-content ' . esc_attr($header_side_class) . '" >';

				get_template_part('header/header', 'top-bar');

				// closing tag is in footer

			}else{

				// header slider
				$print_top_bar = false;
				if( !empty($post_option['header-slider']) && $post_option['header-slider'] != 'none' ){
					$print_top_bar = true;
					get_template_part('header/header', 'top-bar');

					get_template_part('header/header', 'top-slider');
				}

				// header nav area
				$close_div = false;
				if( $header_style == 'plain' ){
					if( $header_background_style == 'transparent' ){
						$close_div = true;
						echo '<div class="seocrawler-header-background-transparent" >';
					}
				}else if( $header_style == 'boxed' ){
					$close_div = true;
					echo '<div class="seocrawler-header-boxed-wrap" >';
				}

				// top bar area
				if( !$print_top_bar ){
					get_template_part('header/header', 'top-bar');
				}

				// header - logo area
				get_template_part('header/header-style', $header_style); 

				if( !empty($close_div) ){
					echo '</div>';
				}

			}

			// page title area
			get_template_part('header/header', 'title');
			
		} // enable header area

	?>
	<div class="seocrawler-page-wrapper" id="seocrawler-page-wrapper" >