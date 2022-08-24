<?php
function frontend($wg_image, $wg_title, $wg_link){
    $to_main = "
    <div class='container d-flex flex-row-reverse bd-highlight'>
    <div id='carouselExampleIndicators' class='carousel slide' data-bs-ride='carousel'>
    <div class='carousel-indicators'>
    ";
    //輪播底下的指示器
    for($i = 0 ; $i < count($wg_image) ; $i++){
        if($i === 0)
            $to_main .= "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 0'></button>";
        else
            $to_main .= "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$i' aria-label='Slide $i'></button>";
    }
    $to_main .= "
    </div>
    <div class='carousel-inner'>
    ";
    //輪播內部結構(圖片、標題、超連結)
    for($i = 0 ; $i < count($wg_image) ; $i++){
        if($i === 0)
            $to_main .= "<div class='carousel-item active' data-bs-interval='5000'>";  
        else
            $to_main .= "<div class='carousel-item' data-bs-interval='5000'>";
        
        //檢查是否有放超連結
        if($wg_link[$i]){
            $to_main .= "
            <a href='".$wg_link[$i]."' target = '_blank'>
            <img src='".$wg_image[$i]."' class='d-block w-100' alt='...' >
            </a>
            <div class='carousel-caption d-block position-absolute bottom-25 start-50 translate-middle'>
                <h2>".$wg_title[$i]."</h2>
            </div>
            </div>
            ";
        }else{
            $to_main .= "
            <img src='".$wg_image[$i]."' class='d-block w-100' alt='...' >
            <div class='carousel-caption d-block position-absolute bottom-25 start-50 translate-middle'>
                <h2>".$wg_title[$i]."</h2>
            </div>
            </div>
            ";
        }
    }
    $to_main .= "
    </div>
    <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>
        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
        <span class='visually-hidden'>Previous</span>
    </button>
    <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>
        <span class='carousel-control-next-icon' aria-hidden='true'></span>
        <span class='visually-hidden'>Next</span>
    </button>
    </div>
    </div>
    ";

    return $to_main;
}

?>