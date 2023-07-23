    
<?php

function compareDates($dateToCompare) {
    // Step 1: Get today's date
    $today = date("Y-m-d"); // Format: YYYY-MM-DD

    // Step 2: Convert the input date to a comparable format
    $input_timestamp = strtotime($dateToCompare);
    $input_comparable = date("Y-m-d", $input_timestamp); // Format: YYYY-MM-DD

    // Step 3: Compare the two dates
    if ($today > $input_comparable) {
        //return "Today is after $dateToCompare.";
        return false;
       
    } elseif ($today < $input_comparable) {
        //return "Today is before $dateToCompare.";
        return false;
       
    } else {
       // return "Today is $dateToCompare.";
        return true;
       
    }
}

$sql = "SELECT dates_banners, pid FROM buy_ads WHERE type like '%banner%' AND status = 'PAID'  ";
$b = executeQueryV2($sql, $mysqli);
if(!empty($b)){
    foreach($b as $i=> $val){
        $dat = $val['dates_banners'];
        if( strpos($dat, ',') !== false){
            $nd = explode(',', $dat);           
            for ($i=0; $i < count($nd); $i++) { 
                if(compareDates($nd[$i]) == true){
                    echo $nd[$i];
                    $img = "/upload/ads/user/banner/".$val['pid'].".gif" ;           
                }else{
                    $img = "/upload/ads/top/left.gif";                    
                }
            }
        }
        
    }
}

?>
    
    
    
    <div class="container">
        <div class="has-banner">
            <div class="banner pro">
                <a href="" class="pro-image" target="_blank">
                    <img class="is-hidden-mobile" src="<?php if(isset($img) ){ echo $img; }  ?>" alt="">
                    <img class="is-hidden-tablet" src="<?php if(isset($img) ){ echo $img; }  ?>" alt="">
                </a>
                <a href="" class="pro-image" target="_blank">
                    <img class="is-hidden-mobile" src="/upload/ads/top/right.gif" alt="">
                    <img class="is-hidden-tablet" src="https://storage.googleapis.com/coinsniper-assets/images/Obrjp8rikLj6XJJdX5B2EsyW7ifUxgH3CSRTmneS.gif" alt="">
                </a>
            </div>
            <a href="" class="contact">Your banner here? Contact us!</a>
        </div>
    </div>

<?php

?>

    <!-- promoted  -->
    <div class="container">
        <a href="" class="premium-banner-2" target="_blank">
            <img src="/upload/ads/buttom/desktop.png" alt="" class="desktop">
            <img src="/upload/ads/tablet.png" alt="" class="tablet">
            <img src="/upload/ads/mobile.png" alt="" class="mobile">
        </a>
    </div>