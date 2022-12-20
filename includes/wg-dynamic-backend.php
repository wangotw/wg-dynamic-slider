<?php

/*建立三個陣列，分別存圖片、標題、對外連結*/
$wg_image = [];
$wg_title = [];
$wg_link = [];

function backend(){
    /*全域變數宣告*/
global $wg_image, $wg_title, $wg_link;
    /*查詢post type diet*/
    $query_string = array(
        'post_type' => 'diet',
        'posts_per_page' => 1,
        'orderby' => 'title',
        'order' => 'asc'
    );
    $acf = new WP_Query($query_string);

    if($acf->have_posts()) {
        while($acf->have_posts()){
            $acf->the_post();
            //取得後台資料
            for($i = 0 ; $i < 5 ; $i++){
                $wg_image[$i] = get_field("image" . ($i+1));
                $wg_title[$i] = get_field("title" . ($i+1));
                $wg_link[$i] = get_field("link" . ($i+1));
            }
        }
    }
    //把資料傳給前端
    $to_frontend = [$wg_image, $wg_title, $wg_link];

    wp_reset_postdata();

    return $to_frontend;
}
?>