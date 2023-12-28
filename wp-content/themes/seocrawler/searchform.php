<?php 
$top_search = apply_filters('seocrawler_get_top_search_form', false);
if( $top_search ){
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="text" class="search-field seocrawler-title-font" placeholder="<?php esc_html_e('Search...', 'seocrawler'); ?>" value="" name="s">
	<div class="seocrawler-top-search-submit"><i class="fa fa-search" ></i></div>
	<input type="submit" class="search-submit" value="Search">
	<div class="seocrawler-top-search-close"><i class="icon_close" ></i></div>
</form>
<?php }else{ ?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" class="search-field" placeholder="<?php esc_html_e('Search...', 'seocrawler'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
    <input type="submit" class="search-submit" value="<?php esc_html_e('Search', 'seocrawler'); ?>" />
</form>	
<?php } ?>