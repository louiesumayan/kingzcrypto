    
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
        //echo  "Today is $dateToCompare.";
        return true;
       
    }
}

$sql = "SELECT dates_banners, pid FROM buy_ads WHERE type like '%banner%' AND status = 'PAID'  ";
$b = executeQueryV2($sql, $mysqli);
if(!empty($b)){
    $date = "";
    foreach($b as $i=> $val){
        $dat = $val['dates_banners'];
        if( strpos($val['dates_banners'], ',') !== false){           
            $nd = explode(',', $dat); 
            for ($i=0; $i < count($nd); $i++) { 
                if(compareDates($nd[$i]) == true){
                    //echo $nd[$i];
                    $img = "/upload/ads/user/banner/".$val['pid'].".gif" ; 
                }
            }
        }else{          
            if(compareDates($dat)){
                $img = "/upload/ads/user/banner/".$val['pid'].".gif" ;  
            }
        }
    }
}


?>
    
    
    
    <div class="container">
        <div class="has-banner">
            <div class="banner pro">
                <a href="" class="pro-image" target="_blank">
                    <img class="is-hidden-mobile" src="<?php if(isset($img) ){ echo $img; }else{ echo '/upload/ads/top/left.gif';}  ?>" alt="">
                    <img class="is-hidden-tablet" src="<?php if(isset($img) ){ echo $img; }else{ echo '/upload/ads/top/left.gif';}  ?>" alt="">
                </a>
                <a href="" class="pro-image" target="_blank">
                    <img class="is-hidden-mobile" src="<?php if(isset($img) ){ echo $img; }else{ echo '/upload/ads/top/left.gif';}  ?>" alt="">
                    <img class="is-hidden-tablet" src="<?php if(isset($img) ){ echo $img; }else{ echo '/upload/ads/top/left.gif';}  ?>" alt="">
                </a>
            </div>
            <a href="" class="contact">Your banner here? Contact us!</a>
        </div>
    </div>

<?php

$sql = "SELECT dates_promoted, pid FROM buy_ads WHERE type like '%promoted%' AND status = 'PAID'  ";
$b = executeQueryV2($sql, $mysqli);

if(!empty($b)){
    $date = "";
    foreach($b as $i=> $val){
        $dat = $val['dates_promoted'];
        if( strpos($val['dates_promoted'], ',') !== false){           
            $nd = explode(',', $dat); 
            for ($i=0; $i < count($nd); $i++) { 
                if(compareDates($nd[$i]) == true){
                    //echo $nd[$i];
                    $img1 = "/upload/ads/user/promoted/".$val['pid'].".gif" ; 
                }
            }
        }else{          
            if(compareDates($dat)){
                //echo $dat;
                $img1 = "/upload/ads/user/promoted/".$val['pid'].".gif" ;  
            }
        }
    }
}

?>

    <!-- promoted  -->
    <div class="container">
        <a href="" class="premium-banner-2" target="_blank">
            <img src="<?php if(isset($img1) ){ echo $img1; }else{ echo '/upload/ads/buttom/desktop.png';}  ?>" alt="" class="desktop">
            <img src="<?php if(isset($img1) ){ echo $img1; }else{ echo '/upload/ads/tablet.png';}  ?>" alt="" class="tablet">
            <img src="<?php if(isset($img1) ){ echo $img1; }else{ echo '/upload/ads/mobile.png';}  ?>" alt="" class="mobile">
        </a>
    </div>