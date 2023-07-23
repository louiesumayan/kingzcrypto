    
   <?php
   $sql = "SELECT dates_premium, pid FROM buy_ads WHERE type like '%premium%' AND status = 'PAID'  ";
   $b = executeQueryV2($sql, $mysqli);
   if(!empty($b)){
       $date = "";
       foreach($b as $i=> $val){
           $dat = $val['dates_premium'];
           if( strpos($val['dates_premium'], ',') !== false){           
               $nd = explode(',', $dat); 
               for ($i=0; $i < count($nd); $i++) { 
                   if(compareDates($nd[$i]) == true){
                       echo $nd[$i];
                       $img2 = "/upload/ads/user/premium/".$val['pid'].".gif" ; 
                   }
               }
           }else{          
               if(compareDates($dat)){
                   $img2 = "/upload/ads/user/premium/".$val['pid'].".gif" ;  
               }
           }
       }
   }
   
   
   
   ?>
   
    
    
    
    <div class="container">
        <div class="premium-banner-2 premium-banner-center">
            <a href="" target="_blank">
                <img src="<?php if(isset($img2) ){ echo $img2; }else{ echo 'https://storage.googleapis.com/coinsniper-assets/images/hrm670Avpbb0B75XttqWCYEbFCD3fJro4VHEfsZ9.png';}  ?>" alt="" class="desktop">
                <img src="<?php if(isset($img2) ){ echo $img2; }else{ echo 'https://storage.googleapis.com/coinsniper-assets/images/ufnzcq3RFbQqtLto2wkpuxEGYPph5OtVbpERzDVB.png';}  ?>" alt="" class="tablet">
                <img src="<?php if(isset($img2) ){ echo $img2; }else{ echo 'https://storage.googleapis.com/coinsniper-assets/images/w4GLQXvtNvwWUzysDcmm9vIfR09BQfykfi2IqM35.png';}  ?>" alt="" class="mobile">
            </a>
            <a href="https://t.me/duncancoinsniper" class="contact">Your banner here? Contact us!</a>
        </div>
    </div>