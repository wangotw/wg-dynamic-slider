<?php
/*
Plugin Name: WG Dynamic Custom Slider
Plugin URI: https://www.iwangoweb.com/
Description: 動態投影片輪播短碼，使用者可選擇3~5個圖片並於前台顯示投影片輪播。
Version: 1.3
Author: 玩構網路
Author URI: https://www.iwangoweb.com/about/
*/

//引入前後端檔案
include_once plugin_dir_path( __FILE__ ) . 'includes/wg-dynamic-backend.php';
include_once plugin_dir_path( __FILE__ ) . 'includes/wg-dynamic-frontend.php';

function display_dynamic_slider(){
	$from_backend = backend();
	$wg_image = $from_backend[0];
	$wg_title = $from_backend[1];
	$wg_link = $from_backend[2];
	$from_frontend = frontend($wg_image, $wg_title, $wg_link);

	return $from_frontend;
} 
add_shortcode('dynamic_slider', 'display_dynamic_slider');

function add_css_cdn(){
/*引入 bootstrap css cdn*/
echo "
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css' integrity='sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0' crossorigin='anonymous' type='text/css' media='all' />
";
}
add_action('wp_head', 'add_css_cdn');

function add_js_cdn(){
/*引入 bootstrap js cdn*/
echo "
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js' integrity='sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ' crossorigin='anonymous'></script>
";
}
add_action('wp_footer', 'add_js_cdn');

?>