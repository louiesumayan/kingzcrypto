<?php
   // Initialize the session
   session_start();
   $userid = $_SESSION['id']; // userlogged id
   
   // Check if the user is already logged in, if yes then redirect him to welcome page
   if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true){
       header("location: /login.php");
       exit;
   }
   require_once "./inc/db.php";

   function update_days_count($dates_banners, $days) {
      if (strpos($dates_banners, ',') !== false) {
          $split_data = explode(',', $dates_banners);
          $cnt = intval(count($split_data));
          $days += $cnt;
          echo 'multi days';
      } else {
         echo 'one days';
          $days += 1;
      }
      echo $days;
      return $days;
  }
  

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST['_token'])){        
         if($_SESSION['_token'] == $_POST['_token']){            
          //print_r($_POST);
            if(isset($_POST['dates_banners']) && isset($_POST['dates_promoted']) && isset($_POST['dates_premium']) && isset($_POST['dates_search'])){
               $dates_banners = trim(mysqli_real_escape_string($mysqli, $_POST['dates_banners']));
               $dates_promoted= trim(mysqli_real_escape_string($mysqli, $_POST['dates_promoted']));
               $dates_premium = trim(mysqli_real_escape_string($mysqli, $_POST['dates_premium']));
               $dates_search = trim(mysqli_real_escape_string($mysqli, $_POST['dates_search']));
               //price
               $bprice = trim(mysqli_real_escape_string($mysqli, $_POST['banner_price']));
               $proprice = trim(mysqli_real_escape_string($mysqli, $_POST['promoted_price']));
               $preprice = trim(mysqli_real_escape_string($mysqli, $_POST['premium_price']));
               $sprice = trim(mysqli_real_escape_string($mysqli, $_POST['search_price']));
               $tprice = trim(mysqli_real_escape_string($mysqli, $_POST['tprice']));
               $discount = trim(mysqli_real_escape_string($mysqli, $_POST['discount']));

               $banner = "";
               $bdays = 0;
               $prodays = 0;
               $predays = 0;
               $sdays = 0;

               if(!empty($dates_banners)){                 
                 $banner = ", banner";
                 //$bdays = update_days_count($dates_banners, $bdays);

                 if (strpos($dates_banners, ',') !== false) {
                        $split_data = explode(',', $dates_banners);
                        $cnt = intval(count($split_data));
                        $bdays += $cnt;                        
                  } else {                    
                        $bdays += 1;
                  }
               }

               if(!empty($dates_promoted)){                 
                  $banner = $banner . ", promoted";
                  //$prodays = update_days_count($dates_promoted, $prodays);
                  if (strpos($dates_promoted, ',') !== false) {
                        $split_data = explode(',', $dates_promoted);
                        $cnt = intval(count($split_data));
                        $prodays += $cnt;                        
                  } else {                    
                        $prodays += 1;
                  }
               }

               if(!empty($dates_premium)){                 
                  $banner = $banner . ", premium";
                  //$predays = update_days_count($dates_premium, $predays);
                  if (strpos($dates_premium, ',') !== false) {
                        $split_data = explode(',', $dates_premium);
                        $cnt = intval(count($split_data));
                        $predays += $cnt;                        
                  } else {                    
                        $predays += 1;
                  }
               }

               if(!empty($dates_search)){                  
                  $banner = $banner . ", search";
                  //$sdays = update_days_count($dates_search, $sdays);
                  if (strpos($dates_search, ',') !== false) {
                        $split_data = explode(',', $dates_search);
                        $cnt = intval(count($split_data));
                        $sdays += $cnt;                        
                  } else {                    
                        $sdays += 1;
                  }
               }

              

               $tdays = $bdays + $prodays + $predays + $sdays;

               $pid = genAdsid();
               $sql = "INSERT INTO `buy_ads` (`dates_banners`, `dates_promoted`, `dates_premium`, `dates_search`, `userid`, `pid`, `bprice`, `proprice`, `preprice`,`sprice`, `discount`, `type`, `tprice`, `bdays`, `prodays`, `predays`, `sdays`, `tdays`)
               VALUES ('$dates_banners', ' $dates_promoted', '$dates_premium', '$dates_search ',  '$userid', '$pid', '$bprice', '$proprice', '$preprice', '$sprice', '$discount', '$banner', '$tprice', '$bdays', '$prodays', '$predays', '$sdays', '$tdays');";
               
               //echo $sql;
               
               if(executeQueryV2($sql, $mysqli)){
                  header('Location: /pay.php');
                  exit();
               
               }
               
               
              

            }
         }
      }   
   }
   
    
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="shortcut icon" href="/assets/img/logo.png" type="image/x-icon" />
      <script  src="https://kit.fontawesome.com/b7c265b79a.js"      crossorigin="anonymous"    ></script>
      <link rel="stylesheet" href="/assets/css/style.css" />
      <link rel="stylesheet" href="/assets/css/main.css" />
      <link rel="stylesheet" href="/assets/css/bulma-calendar.min.css">
      <link rel="stylesheet" href="/assets/css/bulma-tooltip.css">
      <style>
         .rockback{
         background-image: url('./assets/img/boosts_back.png');
         }
      </style>
      <title>KINGZ CRYPTO - Ads </title>
   </head>
   <body>
      <?php     include_once "./inc/nav2.php";  ?>
      <?php  include_once "./inc/search.php";  ?>
      <section class="tabs">
         <div class="container">
            <ul>
                  <li class="is-active">
                     <a href="/ads.php">
                        <span>New reservation</span>
                     </a>
                  </li>
                  <li class="">
                     <a href="/ads_reservations.php">
                        <span>Your reservations</span>
                     </a>
                  </li>
            </ul>
         </div>
      </section>
      <div class="container">
         <div class="mobile-navigation mt-3">
            <div class="current">
               <div class="dropdown-title">
                  New reservation
               </div>
               <svg class="navigation-arrow" width="13" height="7" viewBox="0 0 13 7" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                     d="M5.96478 6.3128C6.02441 6.37053 6.10421 6.41774 6.19729 6.45035C6.29038 6.48296 6.39396 6.5 6.49912 6.5C6.60428 6.5 6.70786 6.48296 6.80094 6.45035C6.89403 6.41774 6.97382 6.37053 7.03346 6.3128L12.8839 0.679854C12.9516 0.614883 12.9913 0.538784 12.9987 0.459824C13.0061 0.380865 12.9809 0.302066 12.9258 0.231988C12.8708 0.16191 12.7879 0.103234 12.6863 0.0623343C12.5847 0.0214347 12.4683 -0.000124074 12.3496 5.37146e-07H0.648661C0.53025 0.000326559 0.414212 0.0221626 0.313027 0.0631601C0.211842 0.104158 0.129337 0.162766 0.0743855 0.232682C0.019434 0.302597 -0.00588502 0.381176 0.00115111 0.459966C0.00818723 0.538756 0.0473123 0.614777 0.114319 0.679854L5.96478 6.3128Z"
                     fill="#00A676" />
               </svg>
            </div>
            <ul class="options">
               <li>
                  <a href="/ads.php">New reservation</a>
               </li>
               <li>
                  <a href="https://coinsniper.net/ads/reservations">Your reservations</a>
               </li>
            </ul>
         </div>
      </div>

      <?php include_once "./inc/banner_top.php" ?>      

      <section class="ads">
         <div class="container">
         </div>
         <div class="container">
            <div class="columns" style="display:none;">
               <div class="column is-12">
                  <div class="discount-alert">
                     <div class="discount-header">
                        Temporary Discount: Higher Discounts!
                     </div>
                     <div class="discount-body">
                        We have just launched <b>CoinSniper V2!</b> To celebrate, we have increased all our discounts.
                        Take advantage of these discounts before they disappear!
                     </div>
                  </div>
               </div>
            </div>
            <h1>Book Your Coinsniper Ads</h1>
            <div class="title">
               How it works:
            </div>
            <div class="how-it-works">
               <div class="item">
                  <div class="timeline">
                     <div class="value">
                        1
                     </div>
                     <div class="timeline-right"></div>
                  </div>
                  <div class="timeline-text">
                     <div>Add your ads via the calendar.</div>
                  </div>
               </div>
               <div class="item">
                  <div class="timeline">
                     <div class="timeline-left"></div>
                     <div class="value">
                        2
                     </div>
                     <div class="timeline-right"></div>
                  </div>
                  <div class="timeline-text">
                     <div>
                        Click "Reserve & Pay" to reserve your selection.
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="timeline">
                     <div class="timeline-left"></div>
                     <div class="value">
                        3
                     </div>
                     <div class="timeline-right"></div>
                  </div>
                  <div class="timeline-text">
                     <div>
                        You will have to pay and admin validate your payment and after payment confirmation you should upload the banner
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="timeline">
                     <div class="timeline-left"></div>
                     <div class="value">
                        4
                     </div>
                     <div class="timeline-right"></div>
                  </div>
                  <div class="timeline-text">
                     <div>
                        Upload the assets for your ads after the payment.
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="timeline">
                     <div class="timeline-left"></div>
                     <div class="value">
                        5
                     </div>
                  </div>
                  <div class="timeline-text">
                     <div>
                        Ads will start running automatically!
                     </div>
                  </div>
               </div>
            </div>
            <div class="columns">
               <div class="column is-12-mobile is-12-tablet is-8-widescreen">
                  <div class="has-tabs">
                     <div class="columns">
                        <div class="column is-6">
                           <h2>1. Select type of ads</h2>
                           <div class="ad-types">
                              <?php
                                 $sql = "SELECT * FROM ads_list";
                                 $res = executeQueryV2($sql, $mysqli);                                
                                 if (count($res) == '0') {
                                    echo "<div class='adv-type is-active' data-type=''>
                                             <div class='title'>NO Types Available</div>
                                             <div class='ad-desc'>Contact the administrator for this issue </div>                                            
                                          </div>";
                                                                      
                                 }else{
                              ?>
                              <div class="adv-type <?php if(!empty($res)){ echo 'is-active'; }  ?>" data-type="banners">
                                 <div class="title"><?php if(isset($res) && !empty($res)){ echo $res[0]['name']; } ?></div>
                                 <div class="ad-desc"><?php if(isset($res) && !empty($res)){ echo $res[0]['desc']; } ?>
                                 </div>
                                 <div class="bottom">
                                    <div class="show-position">Show position</div>
                                    <div class="price"><span>$<?php if(isset($res) && !empty($res)){ echo $res[0]['price']; } ?> </span>/ day</div>
                                 </div>
                              </div>
                              <div class="adv-type" data-type="promoted">
                                 <div class="title"><?php if(isset($res) && !empty($res)){ echo $res[1]['name']; } ?></div>
                                 <div class="ad-desc"><?php if(isset($res) && !empty($res)){ echo $res[1]['desc']; } ?>
                                 </div>
                                 <div class="bottom">
                                    <div class="show-position">Show position</div>
                                    <div class="price"><span>$<?php if(isset($res) && !empty($res)){ echo $res[1]['price']; } ?> </span>/ day</div>
                                 </div>
                              </div>
                              <div class="adv-type" data-type="premium">
                                 <div class="title"><?php if(isset($res) && !empty($res)){ echo $res[2]['name']; } ?></div>
                                 <div class="ad-desc"><?php if(isset($res) && !empty($res)){ echo $res[2]['desc']; } ?>
                                 </div>
                                 <div class="bottom">
                                    <div class="show-position">Show position</div>
                                    <div class="price"><span>$<?php if(isset($res) && !empty($res)){ echo $res[2]['price']; } ?> </span>/ day</div>
                                 </div>
                              </div>
                              <div class="adv-type" data-type="search">
                                 <div class="title"><?php if(isset($res) && !empty($res)){ echo $res[3]['name']; } ?></div>
                                 <div class="ad-desc"><?php if(isset($res) && !empty($res)){ echo $res[3]['desc']; } ?></div>
                                 <div class="bottom">
                                    <div class="show-position search-ad">Show position</div>
                                    <div class="price"><span>$<?php if(isset($res) && !empty($res)){ echo $res[3]['price']; } ?>  </span>/ day</div>
                                 </div>
                              </div>
                              <?php } ?>
                           </div>
                        </div>
                        <div class="column is-6">
                           <h2>2. Select Dates</h2>
                           <div class="tabs-content <?php if(isset($res) && count($res) == '0'){echo 'is-hidden'; } ?>">
                              <div class="tab-content calendar-wrapper" id="banners">
                                 <input class="calendar" type="date" name="date" id="date-banners">
                                 <div class="calendar-bottom">No dates selected</div>
                              </div>
                              <div class="tab-content is-hidden calendar-wrapper" id="promoted">
                                 <input class="calendar" type="date" name="date" id="date-promoted">
                                 <div class="calendar-bottom">No dates selected</div>
                              </div>
                              <div class="tab-content is-hidden calendar-wrapper" id="premium">
                                 <input class="calendar" type="date" name="date" id="date-premium">
                                 <div class="calendar-bottom">No dates selected</div>
                              </div>
                              <div class="tab-content is-hidden calendar-wrapper" id="search">
                                 <input class="calendar" type="date" name="date" id="date-search">
                                 <div class="calendar-bottom">No dates selected</div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="columns is-hidden-tablet-only is-hidden-desktop-only">
                        <div class="column is-12">
                           <h2>Discounts</h2>
                           <div class="discounts">
                              <div class="items is-flex-wrap-wrap">
                                 <?php
                                    $sql = "SELECT * FROM ads_discount";
                                    $re0 = executeQueryV2($sql, $mysqli);
                                   
                                    if(!empty($re0)){
                                       foreach ($re0 as $row) {
                                          $day = $row['days'];
                                          $discount = $row['discount'];
                                          $pdiscount = $row['pdiscount'];

                                          echo "<div class='discount' data-days='$day'>
                                                   <div class='percent'>
                                                      <div>
                                                         <div class='old-value'> $pdiscount%</div>
                                                         <div class='value'>$discount%</div>
                                                         <div class='off'>OFF</div>
                                                      </div>
                                                   </div>
                                                   <div class='days'>$day DAYS+</div>
                                                </div>";
                                       }
                                    }
                                 ?>                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="column is-12-mobile is-12-tablet is-4-widescreen">
                  <h2>3. Confirm your order</h2>
                  <div class="columns <?php if(isset($res) && count($res) == '0'){echo 'is-hidden'; } ?>">
                     <div class="column is-12-mobile is-6-tablet is-12-widescreen">
                        <div class="confirm-order">
                           <div class="adv-type is-open banner" id="summary-banners">
                              <div class="top">
                                 <div class="name">Banner Ad</div>
                                 <div class="right">
                                    <div><span class="days">0</span> days</div>
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path
                                          d="M5.50595 5.8272C5.561 5.88049 5.63465 5.92407 5.72058 5.95417C5.8065 5.98427 5.90212 6 5.99919 6C6.09626 6 6.19187 5.98427 6.27779 5.95417C6.36372 5.92407 6.43738 5.88049 6.49243 5.8272L11.8928 0.627557C11.9554 0.567584 11.992 0.497339 11.9988 0.424453C12.0057 0.351568 11.9824 0.27883 11.9315 0.214143C11.8807 0.149456 11.8042 0.0952928 11.7105 0.0575393C11.6167 0.0197859 11.5092 -0.00011453 11.3996 4.95827e-07L0.598764 4.95827e-07C0.489461 0.000301439 0.38235 0.0204577 0.288948 0.0583016C0.195546 0.0961456 0.119388 0.150245 0.0686635 0.214783C0.0179391 0.279321 -0.00543232 0.351854 0.00106256 0.424584C0.00755745 0.497313 0.0436729 0.567486 0.105525 0.627557L5.50595 5.8272Z" />
                                    </svg>
                                 </div>
                              </div>
                              <div class="bottom">
                                 <table class="table is-fullwidth banner">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Date</th>
                                          <th>Type</th>
                                          <th>Price</th>
                                          <th></th>
                                       </tr>
                                    </thead>
                                    <tbody class="dates">
                                       <tr class="empty">
                                          <td class="has-text-centered" colspan="5">No dates selected...</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="adv-type promoted" id="summary-promoted">
                              <div class="top">
                                 <div class="name">Promoted Spot</div>
                                 <div class="right">
                                    <div><span class="days">0</span> days</div>
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path
                                          d="M5.50595 5.8272C5.561 5.88049 5.63465 5.92407 5.72058 5.95417C5.8065 5.98427 5.90212 6 5.99919 6C6.09626 6 6.19187 5.98427 6.27779 5.95417C6.36372 5.92407 6.43738 5.88049 6.49243 5.8272L11.8928 0.627557C11.9554 0.567584 11.992 0.497339 11.9988 0.424453C12.0057 0.351568 11.9824 0.27883 11.9315 0.214143C11.8807 0.149456 11.8042 0.0952928 11.7105 0.0575393C11.6167 0.0197859 11.5092 -0.00011453 11.3996 4.95827e-07L0.598764 4.95827e-07C0.489461 0.000301439 0.38235 0.0204577 0.288948 0.0583016C0.195546 0.0961456 0.119388 0.150245 0.0686635 0.214783C0.0179391 0.279321 -0.00543232 0.351854 0.00106256 0.424584C0.00755745 0.497313 0.0436729 0.567486 0.105525 0.627557L5.50595 5.8272Z" />
                                    </svg>
                                 </div>
                              </div>
                              <div class="bottom">
                                 <table class="table is-fullwidth promoted">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Date</th>
                                          <th>Type</th>
                                          <th>Price</th>
                                          <th></th>
                                       </tr>
                                    </thead>
                                    <tbody class="dates">
                                       <tr class="empty">
                                          <td class="has-text-centered" colspan="5">No dates selected...</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="adv-type premium" id="summary-premium">
                              <div class="top">
                                 <div class="name">Premium Banner</div>
                                 <div class="right">
                                    <div><span class="days">0</span> days</div>
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path
                                          d="M5.50595 5.8272C5.561 5.88049 5.63465 5.92407 5.72058 5.95417C5.8065 5.98427 5.90212 6 5.99919 6C6.09626 6 6.19187 5.98427 6.27779 5.95417C6.36372 5.92407 6.43738 5.88049 6.49243 5.8272L11.8928 0.627557C11.9554 0.567584 11.992 0.497339 11.9988 0.424453C12.0057 0.351568 11.9824 0.27883 11.9315 0.214143C11.8807 0.149456 11.8042 0.0952928 11.7105 0.0575393C11.6167 0.0197859 11.5092 -0.00011453 11.3996 4.95827e-07L0.598764 4.95827e-07C0.489461 0.000301439 0.38235 0.0204577 0.288948 0.0583016C0.195546 0.0961456 0.119388 0.150245 0.0686635 0.214783C0.0179391 0.279321 -0.00543232 0.351854 0.00106256 0.424584C0.00755745 0.497313 0.0436729 0.567486 0.105525 0.627557L5.50595 5.8272Z" />
                                    </svg>
                                 </div>
                              </div>
                              <div class="bottom">
                                 <table class="table is-fullwidth premium">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Date</th>
                                          <th>Type</th>
                                          <th>Price</th>
                                          <th></th>
                                       </tr>
                                    </thead>
                                    <tbody class="dates">
                                       <tr class="empty">
                                          <td class="has-text-centered" colspan="5">No dates selected...</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="adv-type search" id="summary-search">
                              <div class="top">
                                 <div class="name">Search Ad</div>
                                 <div class="right">
                                    <div><span class="days">0</span> days</div>
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path
                                          d="M5.50595 5.8272C5.561 5.88049 5.63465 5.92407 5.72058 5.95417C5.8065 5.98427 5.90212 6 5.99919 6C6.09626 6 6.19187 5.98427 6.27779 5.95417C6.36372 5.92407 6.43738 5.88049 6.49243 5.8272L11.8928 0.627557C11.9554 0.567584 11.992 0.497339 11.9988 0.424453C12.0057 0.351568 11.9824 0.27883 11.9315 0.214143C11.8807 0.149456 11.8042 0.0952928 11.7105 0.0575393C11.6167 0.0197859 11.5092 -0.00011453 11.3996 4.95827e-07L0.598764 4.95827e-07C0.489461 0.000301439 0.38235 0.0204577 0.288948 0.0583016C0.195546 0.0961456 0.119388 0.150245 0.0686635 0.214783C0.0179391 0.279321 -0.00543232 0.351854 0.00106256 0.424584C0.00755745 0.497313 0.0436729 0.567486 0.105525 0.627557L5.50595 5.8272Z" />
                                    </svg>
                                 </div>
                              </div>
                              <div class="bottom">
                                 <table class="table is-fullwidth search">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Date</th>
                                          <th>Type</th>
                                          <th>Price</th>
                                          <th></th>
                                       </tr>
                                    </thead>
                                    <tbody class="dates">
                                       <tr class="empty">
                                          <td class="has-text-centered" colspan="5">No dates selected...</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="promo is-hidden">
                              <div class="title">Promo Code</div>
                              <div class="promo-wrapper">
                                 <input type="text" id="promo-code" placeholder="Enter coupon code">
                                 <span id="apply-promo">Apply</span>
                                 <span id="remove-promo" class="is-hidden">Remove</span>
                              </div>
                           </div>
                           <div class="summary">
                              <div class="title">Order Summary</div>
                              <div class="totals">
                                 <table class="table is-fullwidth no-header">
                                    <tr class="subtotal">
                                       <td><b>Subtotal</b></td>
                                       <td class="right subtotal">$<span>0</span></td>
                                    </tr>
                                    <tr>
                                       <td><b>Discount</b></td>
                                       <td class="right discount"><span>0</span>%</td>
                                    </tr>
                                    <tr class="totals">
                                       <td><b>Total Price</b></td>
                                       <td class="right total-price">$<span>0</span></td>
                                    </tr>
                                 </table>
                              </div>
                              <form action="/ads.php" method="POST">
                                 <input type="hidden" name="_token" value="<?php echo $_SESSION['_token'] ?>">                                  
                                 <input type="hidden" name="dates_banners">
                                 <input type="hidden" name="banner_price">
                                 <input type="hidden" name="discount_id" id="discount-id">
                                 <input type="hidden" name="dates_promoted">
                                 <input type="hidden" name="promoted_price">
                                 <input type="hidden" name="dates_premium">
                                 <input type="hidden" name="premium_price">
                                 <input type="hidden" name="dates_search">
                                 <input type="hidden" name="search_price">
                                 <input type="hidden" name="tprice">
                                 <input type="hidden" name="discount">
                                 <button class="button checkout" disabled type="submit">
                                 RESERVE & PAY
                                 </button>
                              </form>
                           </div>
                           <div class="payment-methods is-hidden-tablet-only is-hidden-desktop-only">
                              
                           </div>
                        </div>
                     </div>
                     <div class="column is-hidden-mobile is-hidden-widescreen is-6-tablet">
                        <h2>Discounts</h2>
                      
                        <div class="discounts tablet">
                           <div class="items">
                           <?php
                              $sql = "SELECT * FROM ads_discount";
                              $re1 = executeQueryV2($sql, $mysqli);
                             
                              if($re1){
                                 foreach ($re1 as $row) {
                                    $day1 = $row['days'];
                                    $discount1 = $row['discount'];
                                    $pdiscount1 = $row['pdiscount'];

                                    echo "<div class='discount' data-days='$day1'>
                                             <div class='percent'>
                                                <div>
                                                   <div class='old-value'>$pdiscount1%</div>
                                                   <div class='value'>$discount1%</div>
                                                   <div class='off'>OFF</div>
                                                </div>
                                             </div>
                                             <div class='days'>$day1 DAYS+</div>
                                          </div>";
                                 }
                              }
                              
                           
                           ?>
                              
                           </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
            </div>
            <div class="columns">
              
            </div>
            <div class="need-help">
               Need help? <a class="button is-primary" target="_blank" href=""><img src="/assets/img/telegram-white.svg">Contact support</a>
            </div>
            <div class="modal placements-modal banners">
               <div class="modal-background"></div>
               <div class="modal-card">
                  <header class="modal-card-head">
                     <div class="modal-title">Ad Placements</div>
                     <div class="custom-modal-close">
                        Close 
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2.31818 19.6023C1.78786 20.1326 0.928052 20.1326 0.397737 19.6023C-0.132579 19.0719 -0.132579 18.2121 0.397737 17.6818L17.6817 0.397785C18.212 -0.132532 19.0718 -0.132533 19.6022 0.397784C20.1325 0.928102 20.1325 1.78792 19.6022 2.31823L2.31818 19.6023Z" fill="white"/>
                           <path d="M19.6023 17.6818C20.1326 18.2121 20.1326 19.0719 19.6023 19.6022C19.0719 20.1325 18.2121 20.1325 17.6818 19.6022L0.397842 2.31819C-0.132473 1.78787 -0.132474 0.928055 0.397842 0.397738C0.928157 -0.132579 1.78797 -0.132579 2.31828 0.397738L19.6023 17.6818Z" fill="white"/>
                        </svg>
                     </div>
                  </header>
                  <section class="modal-card-body">
                     <img class="desktop" src="/assets/img/placementsweb.png">
                  </section>
               </div>
            </div>
            <div class="modal placements-modal search">
               <div class="modal-background"></div>
               <div class="modal-card">
                  <header class="modal-card-head">
                     <div class="modal-title">Search Ad Placement</div>
                     <div class="custom-modal-close">
                        Close 
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2.31818 19.6023C1.78786 20.1326 0.928052 20.1326 0.397737 19.6023C-0.132579 19.0719 -0.132579 18.2121 0.397737 17.6818L17.6817 0.397785C18.212 -0.132532 19.0718 -0.132533 19.6022 0.397784C20.1325 0.928102 20.1325 1.78792 19.6022 2.31823L2.31818 19.6023Z" fill="white"/>
                           <path d="M19.6023 17.6818C20.1326 18.2121 20.1326 19.0719 19.6023 19.6022C19.0719 20.1325 18.2121 20.1325 17.6818 19.6022L0.397842 2.31819C-0.132473 1.78787 -0.132474 0.928055 0.397842 0.397738C0.928157 -0.132579 1.78797 -0.132579 2.31828 0.397738L19.6023 17.6818Z" fill="white"/>
                        </svg>
                     </div>
                  </header>
                  <section class="modal-card-body">
                     <img class="desktop" src="/assets/img/placementssearch.png">
                  </section>
               </div>
            </div>
         </div>
      </section>

      <?php include_once "./inc/banner_down.php" ?>

      <?php include_once "./inc/footer.php"; ?>
      <script  src="./assets/jquery-3.7.0.min.js" ></script>
      <script defer src="./assets/script/main.js"></script>
      <script defer src="./assets/js/app.js"></script>
      <script src="/assets/js/bulma-calendar.min.js"></script>
      <script>
         Date.prototype.addDays = function(days) {
             var date = new Date(this.valueOf());
             date.setDate(date.getDate() + days);
             return date;
          }
         
          $(document).ready(function() {
             
             let maxDate = new Date()
             maxDate = maxDate.addDays(91)
             bulmaCalendar.attach('#date-banners', {
                type: 'date',
                isRange: false,
                displayMode: 'inline',
                minDate: new Date(),
                maxDate: maxDate,
                showTodayButton: false,
                showClearButton: false,
                weekStart: 1,
                lang: 'en',
                dateFormat: 'd MMMM yyyy',
                color: 'info',
                disabledDates: ["2023-07-16", "2023-07-17"]
             });
             bulmaCalendar.attach('#date-promoted', {
                type: 'date',
                isRange: false,
                displayMode: 'inline',
                minDate: new Date(),
                maxDate: maxDate,
                showTodayButton: false,
                showClearButton: false,
                weekStart: 1,
                lang: 'en',
                dateFormat: 'd MMMM yyyy',
                color: 'info'
                //disabledDates: ["2023-07-16", "2023-07-17"]
             });
             bulmaCalendar.attach('#date-premium', {
                type: 'date',
                isRange: false,
                displayMode: 'inline',
                minDate: new Date(),
                maxDate: maxDate,
                showTodayButton: false,
                showClearButton: false,
                weekStart: 1,
                lang: 'en',
                dateFormat: 'd MMMM yyyy',
                color: 'info'
                //disabledDates: ["2023-07-16", "2023-07-17", "2023-07-18", "2023-07-19", "2023-07-20", "2023-07-21", "2023-07-22", "2023-07-23", "2023-07-24", "2023-07-25", "2023-07-26", "2023-07-27", "2023-07-28", "2023-07-29", "2023-07-30", "2023-07-31", "2023-08-01", "2023-08-02", "2023-08-03", "2023-08-04", "2023-08-05", "2023-08-06", "2023-08-07", "2023-08-08", "2023-08-09", "2023-08-10", "2023-08-11", "2023-08-12", "2023-08-13", "2023-08-14", "2023-08-15", "2023-08-16", "2023-08-17", "2023-08-18", "2023-08-19", "2023-08-20", "2023-08-21", "2023-08-22", "2023-08-23", "2023-08-24", "2023-08-25", "2023-08-26", "2023-08-27", "2023-08-28", "2023-08-29", "2023-08-30", "2023-08-31", "2023-09-01", "2023-09-02", "2023-09-03", "2023-09-04", "2023-09-05", "2023-09-06", "2023-09-07", "2023-09-08", "2023-09-09", "2023-09-10", "2023-09-11", "2023-09-12", "2023-09-13", "2023-09-14", "2023-09-15", "2023-09-16", "2023-09-17", "2023-09-18", "2023-09-19", "2023-09-20", "2023-09-21", "2023-09-22", "2023-09-23", "2023-09-24", "2023-09-25", "2023-09-26", "2023-09-27", "2023-09-28", "2023-09-29", "2023-09-30", "2023-10-01", "2023-10-02", "2023-10-03", "2023-10-04", "2023-10-05", "2023-10-06", "2023-10-07", "2023-10-08", "2023-10-09", "2023-10-10", "2023-10-11", "2023-10-12", "2023-10-13", "2023-10-14"]
             });
             bulmaCalendar.attach('#date-search', {
                type: 'date',
                isRange: false,
                displayMode: 'inline',
                minDate: new Date(),
                maxDate: maxDate,
                showTodayButton: false,
                showClearButton: false,
                weekStart: 1,
                lang: 'en',
                dateFormat: 'd MMMM yyyy',
                color: 'info'
                //disabledDates: ["2023-07-16"]
             });
         
             let dates_banners = [];
             let dates_promoted = [];
             let dates_premium = [];
             let dates_search = [];
             let coupon_code = null;
         
             document.querySelector('#date-banners').bulmaCalendar.on('select', function(datepicker) {
                const date = datepicker.data.value();
         
                if (isDateSelected(date, '#date-banners')) {
                      $('#summary-banners').find('[data-date="' + date + '"]')
                         .parent()
                         .find('.remove-date')
                         .click();
                      return;
                }
         
                openConfirmOrderTab('.adv-type.banner');
                addBanners(dates_banners, datepicker.data.value(), '<?php if(isset($res) && !empty($res)){ echo $res[0]['name']; } ?>', "<?php if(isset($res) && !empty($res)){ echo $res[0]['price']; } ?>", '#date-banners', 'banner');
             })
             document.querySelector('#date-promoted').bulmaCalendar.on('select', function(datepicker) {
                const date = datepicker.data.value();
         
                if (isDateSelected(date, '#date-promoted')) {
                      $('#summary-promoted').find('[data-date="' + date + '"]')
                         .parent()
                         .find('.remove-date')
                         .click();
                      return;
                }
         
                openConfirmOrderTab('.adv-type.promoted');
                addBanners(dates_promoted, datepicker.data.value(), '<?php if(isset($res) && !empty($res)){ echo $res[1]['name']; } ?>', "<?php if(isset($res) && !empty($res)){ echo $res[1]['price']; } ?>", '#date-promoted', 'promoted');
             })
             document.querySelector('#date-premium').bulmaCalendar.on('select', function(datepicker) {
                const date = datepicker.data.value();
         
                if (isDateSelected(date, '#date-premium')) {
                      $('#summary-premium').find('[data-date="' + date + '"]')
                         .parent()
                         .find('.remove-date')
                         .click();
                      return;
                }
         
                openConfirmOrderTab('.adv-type.premium');
                addBanners(dates_premium, datepicker.data.value(), '<?php if(isset($res) && !empty($res)){ echo $res[2]['name']; } ?>', "<?php if(isset($res) && !empty($res)){ echo $res[2]['price']; } ?>", '#date-premium', 'premium');
             })
             document.querySelector('#date-search').bulmaCalendar.on('select', function(datepicker) {
                const date = datepicker.data.value();
         
                if (isDateSelected(date, '#date-search')) {
                      $('#summary-search').find('[data-date="' + date + '"]')
                         .parent()
                         .find('.remove-date')
                         .click();
                      return;
                }
         
                openConfirmOrderTab('.adv-type.search');
                addBanners(dates_search, datepicker.data.value(), '<?php if(isset($res) && !empty($res)){ echo $res[3]['name']; } ?>', "<?php if(isset($res) && !empty($res)){ echo $res[3]['price']; } ?>", '#date-search', 'search');
             })
         
             $('.show-position').on('click', function(e) {
                e.preventDefault();
                if ($(this).hasClass('search-ad'))
                      $('.placements-modal.search').addClass('is-active');
                else
                      $('.placements-modal.banners').addClass('is-active');
             });
         
             $('.ad-types .adv-type').click(function(e) {
                $('.adv-type').removeClass('is-active');
                $(this).addClass('is-active');
                $(this).attr('data-type');
         
                $('.tabs-content .tab-content').addClass('is-hidden');
                $('#' + $(this).attr('data-type')).removeClass('is-hidden');
         
                if ($(this).attr('data-type') === 'banners') {
                      buildCalendarBottom(dates_banners);
                } else if ($(this).attr('data-type') === 'promoted') {
                      buildCalendarBottom(dates_promoted);
                } else if ($(this).attr('data-type') === 'premium') {
                      buildCalendarBottom(dates_premium);
                } else {
                      buildCalendarBottom(dates_search);
                }
             });
         
             $('.confirm-order .adv-type').click(function(e) {
                openConfirmOrderTab(this);
             });
         
             $('#apply-promo').on('click', function() {
                $.post('/api/apply-code?code=' + $('#promo-code').val(), {
                      _token: 'h09PalVtOA8jLDRytqdtQacVcx8W8uG9S5HqXkn2'
                }, function(response) {
                      if (response.status === 'success') {
                         coupon_code = response.data;
                         $('#discount-id').val(response.data.id);
                         updateTotals();
                         $('#remove-promo').removeClass('is-hidden');
                         $('#apply-promo').addClass('is-hidden');
                      }
                })
             });
         
             $('#remove-promo').on('click', function() {
                coupon_code = null;
                $('#discount-id').val('');
                $('#apply-promo').removeClass('is-hidden');
                $('#remove-promo').addClass('is-hidden');
                $('#promo-code').val('');
                updateTotals();
             })
         
             function openConfirmOrderTab(el) {
                $('.adv-type').removeClass('is-open');
                $(el).addClass('is-open');
             }
         
             function addBanners(items, date, title, price, calendarId, type) {
                if (items.includes(date)) {
                      return;
                }
         
                items.push(date)
                document.querySelector(calendarId)
                      .bulmaCalendar
                      .datePicker
                      .highlightedDates
                      .push(new Date(date))
         
                let count = items.length
                let row = `<tr class="day-${type}">\n` +
                      `    <td>${count}</td>\n` +
                      `    <td class="date" data-date="${date}">${date}</td>\n` +
                      `    <td>${title}</td>\n` +
                      `    <td>${price }</td>\n` +
                      `    <td><img class="remove-date" src="assets/img/payments/close.svg"></img></td>\n` +
                      `</tr>`
                $('table.' + type + ' tbody.dates').append(row)
         
                updateTotals();
                buildCalendarBottom(items);
             }
         
             function buildCalendarBottom(items) {
                if (items.length > 0) {
                      $('.calendar-bottom').html('');
                      items.forEach((item) => {
                         let row = `<div class="calendar-item">\n` +
                            `<img class="calendar" src="/assets/img/payments/calendar.svg">\n` +
                            `<span>${item}</span>\n` +
                            `<img class="remove-date" src="/assets/img/payments/close-calendar.svg">\n` +
                            `</div>`;
                         $('.calendar-bottom').append(row);
                      })
                } else {
                      $('.calendar-bottom').html('No dates selected');
                }
             }
         
             // Delete date from right overview
             $('tbody.dates').on('click', '.remove-date', function() {
                let date = $(this).parents('tr').find('.date').html()
                if ($(this).parents('tr').hasClass('day-banner')) {
                      dates_banners.remove(date)
                      unhighlightDate(date, '#date-banners')
                      buildCalendarBottom(dates_banners);
                } else if ($(this).parents('tr').hasClass('day-promoted')) {
                      dates_promoted.remove(date)
                      unhighlightDate(date, '#date-promoted')
                      buildCalendarBottom(dates_promoted);
                } else if ($(this).parents('tr').hasClass('day-premium')) {
                      dates_premium.remove(date)
                      unhighlightDate(date, '#date-premium')
                      buildCalendarBottom(dates_premium);
                } else {
                      dates_search.remove(date)
                      unhighlightDate(date, '#date-search')
                      buildCalendarBottom(dates_search);
                }
                $(this).parents('tr').remove();
                updateTotals();
             })
         
             // Delete date from bottom calendar overview
             $(".calendar-bottom").on('click', '.remove-date', function() {
                let date = $(this).parents('.calendar-item').find('span').html();
                let type = $(this).parents('.calendar-wrapper').attr('id');
         
                if (type === 'banners') {
                      dates_banners.remove(date)
                      unhighlightDate(date, '#date-banners')
                      buildCalendarBottom(dates_banners);
                      $(`table.banner td.date[data-date="${date}"]`).parents('tr').remove();
                } else if (type === 'promoted') {
                      dates_promoted.remove(date)
                      unhighlightDate(date, '#date-promoted')
                      buildCalendarBottom(dates_promoted);
                      $(`table.promoted td.date[data-date="${date}"]`).parents('tr').remove();
                } else if (type === 'premium') {
                      dates_premium.remove(date)
                      unhighlightDate(date, '#date-premium')
                      buildCalendarBottom(dates_premium);
                      $(`table.premium td.date[data-date="${date}"]`).parents('tr').remove();
                } else {
                      dates_search.remove(date)
                      unhighlightDate(date, '#date-search')
                      buildCalendarBottom(dates_search);
                      $(`table.search td.date[data-date="${date}"]`).parents('tr').remove();
                }
         
                updateTotals();
             })

             /*
             $re1
                  Array
                  (
                     [0] => Array
                        (
                              [id] => 1
                              [days] => 3
                              [discount] => 15
                              [pdiscount] => 10
                        )

                     [1] => Array
                        (
                              [id] => 2
                              [days] => 7
                              [discount] => 25
                              [pdiscount] => 20
                        )

                     [2] => Array
                        (
                              [id] => 3
                              [days] => 14
                              [discount] => 40
                              [pdiscount] => 25
                        )

                  )

             */
            //alert(" if(isset($re1)){ echo $re1[0]['days']; } ")
         
             function updateTotals() {
                $('.confirm-order .banner .days').html(dates_banners.length)
                $('.confirm-order .promoted .days').html(dates_promoted.length)
                $('.confirm-order .premium .days').html(dates_premium.length)
                $('.confirm-order .search .days').html(dates_search.length)
         
                let total_days = dates_banners.length + dates_promoted.length + dates_premium.length + dates_search.length
         
                let discount = 0;
         
                $('.discounts .discount').removeClass('is-active');
                var done = <?php if(isset($re1)){ echo $re1[0]['days']; } ?>; 
                var doned = <?php if(isset($re1)){ echo $re1[0]['discount']; } ?>; 

                var dtwo = <?php if(isset($re1)){ echo $re1[1]['days']; } ?>;
                var dtwod = <?php if(isset($re1)){ echo $re1[1]['discount']; } ?>; 

                var dthree = <?php if(isset($re1)){ echo $re1[2]['days']; } ?>;
                var dthreed = <?php if(isset($re1)){ echo $re1[2]['discount']; } ?>; 

         
                if (total_days >= done && total_days < dtwo ) {
                      discount = doned;
                      $('.discounts .discount[data-days="'+ done+'"]').addClass('is-active');
                } else if (total_days >= dtwo && total_days < dthree) {
                      discount = dtwod;
                      $('.discounts .discount[data-days="'+ dtwo+'"]').addClass('is-active');
                } else if (total_days >= dthree) {
                      discount = dthreed;
                      $('.discounts .discount[data-days="'+ dthree+'"]').addClass('is-active');
                }
         
                if (coupon_code !== null) {
                      discount = coupon_code.discount + discount;
                }
         
                $('.discount span').html(discount)
                var bprice = <?php if(isset($res) && !empty($res)){ echo intval($res[0]['price']); }else{ echo 0; } ?>;
                var proprice = <?php if(isset($res) && !empty($res)){ echo intval($res[1]['price']); }else{ echo 0; }  ?>;
                var preprice = <?php if(isset($res) && !empty($res)){ echo intval($res[2]['price']); }else{ echo 0; }  ?>;
                var sprice = <?php if(isset($res) && !empty($res)){ echo intval($res[2]['price']); }else{ echo 0; }  ?>;
                

         
                let subtotal = (dates_banners.length * bprice)
                subtotal += (dates_promoted.length * proprice)
                subtotal += (dates_premium.length * preprice)
                subtotal += (dates_search.length * sprice)
         
                let total = subtotal * ((100 - discount) / 100)
                subtotal = Math.floor(subtotal)
                subtotal = subtotal.toFixed(0)
                total = Math.floor(total)
                total = total.toFixed(0)
                $('.subtotal span').html(subtotal)
                $('.total-price span').html(total)
                $('[name=discount]').val(discount)
         
                $('[name=dates_banners]').val(dates_banners.join(','))
                $('[name=banner_price]').val(bprice)
                $('[name=dates_promoted]').val(dates_promoted.join(','))
                $('[name=promoted_price]').val(proprice)
                $('[name=dates_premium]').val(dates_premium.join(','))
                $('[name=premium_price]').val(preprice)
                $('[name=dates_search]').val(dates_search.join(','))
                $('[name=search_price]').val(bprice)
                $('[name=tprice]').val(total)
         
                console.log(total_days, subtotal, total, discount)
                if (total_days > 0) {
                      $('tr.empty').hide()
                      $('.checkout').attr('disabled', false)
                } else {
                      $('tr.empty').show()
                      $('.checkout').attr('disabled', true)
                }
             }
         
             Array.prototype.remove = function() {
                var what, a = arguments,
                      L = a.length,
                      ax;
                while (L && this.length) {
                      what = a[--L];
                      while ((ax = this.indexOf(what)) !== -1) {
                         this.splice(ax, 1);
                      }
                }
                return this;
             };
         
             function isDateSelected(date, selector) {
                let isSelected = false;
         
                document.querySelector(selector).bulmaCalendar.datePicker.highlightedDates.forEach(function(item, index) {
                      const check_date = item.getTime();
                      const date_time = new Date(date).getTime();
                      if (check_date == date_time) {
                         isSelected = true;
                      }
                });
         
                return isSelected;
             }
         
             function unhighlightDate(date, selector) {
                document.querySelector(selector).bulmaCalendar.datePicker.highlightedDates.forEach(function(item, index) {
                      let check_date = item.getTime();
                      let date_time = new Date(date).getTime();
                      if (check_date == date_time) {
                         console.log('removing')
                         document.querySelector(selector).bulmaCalendar.datePicker.highlightedDates.splice(index, 1);
                         document.querySelector(selector).bulmaCalendar.datePicker.refresh();
                      }
                });
         
                if (document.querySelector(selector).bulmaCalendar.datePicker.highlightedDates.length === 0) {
                      document.querySelector(selector).bulmaCalendar.datePicker.clear();
                }
             }
          })
         
      </script>
   </body>
</html>