<?php
   // Initialize the session
   session_start();
   define( 'ABSPATH', dirname( __FILE__, 2 ) . '/' );
   // Check if the user is already logged in, if yes then redirect him to welcome page
   if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true){
       header("location: /login.php");
       exit;
   }
   require_once ABSPATH."inc/db.php";


   if ($_SERVER["REQUEST_METHOD"] == "GET") {
      //rid tk st Array ( [rid] => 6FC35E89 [tk] => c099157aab447ecb520e4559441e5349 [st] => paid )
      if(isset($_GET['st']) && isset($_GET['rid']) && isset($_GET['tk']) ){
        
         if($_SESSION['_token'] == $_GET['tk']){
           
            $rid = trim( $mysqli -> real_escape_string( $_GET['rid']));
            $st = trim( $mysqli -> real_escape_string( $_GET['st']));
            if($st == 'paid'){
               $sql = "UPDATE buy_ads SET status = 'PAID' WHERE pid = '$rid'";
            }
            if($st == 'cancel'){
               $sql = "UPDATE buy_ads SET status = 'CANCEL' WHERE pid = '$rid' ";
            }

            if(executeQueryV2($sql, $mysqli)){
               //echo $rid;
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
      <style>
         .rockback{
         background-image: url('./assets/img/boosts_back.png');
         }
      </style>
      <title>KINGZ CRYPTO - Ads Reservation</title>
   </head>
   <body>
      <?php     include_once ABSPATH."./inc/nav2.php";  ?>
      <?php  include_once ABSPATH."inc/search.php";  ?>
     
     
      <section class="ads reservations">
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
            <h1>Client Ads Reservations</h1>
            <div class="title">
               Payment Pending
            </div>
            <p>
               It can take up to 30 minutes for the payment status to update!
            </p>
         </div>
        
         <div class="container">
            <div class="title my-5">
               Payment Completed
            </div>
         </div>
         <div class="container containerless">
            <div class="scrollable">
               <div class="can-scroll has-text-right is-hidden-tablet">
                  <img src="/assets/img/table-move.svg" alt="">
               </div>
               <table class="table is-fullwidth">
                  <thead>
                     <tr>
                        <th class="sticky-col">
                           <div>#</div>
                        </th>
                        <th>User</th>
                        <th>Days</th>
                        <th>Price</th>
                        <th>Date created</th>                        
                        <th>Status</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php
                        $tk = $_SESSION['_token'];
                        $sql = "SELECT u.name, u.email, b.pid, b.tdays, b.tprice, b.reg_date, b.id, b.status  FROM user as u JOIN buy_ads as b ON u.id = b.userid WHERE status IS NULL";
                        $res = executeQueryV2($sql, $mysqli);
                        
                        if(!empty($res)){
                            foreach($res as $i => $row){
                                 $name = $row['name'];
                                $pid = $row['pid'];
                                $days = $row['tdays'];
                                $price = $row['tprice'];
                                $regdate = formatDateTime($row['reg_date']);
                                $status = $row['status'];
                                    if($status == ''){
                                        $status = 'Pending';
                                    }

                                echo "<tr>
                                        <td class='uppercase sticky-col'>
                                          <div>$pid</div>
                                        </td>
                                        <td>$name</td>
                                        <td>$days days</td>
                                        <td>$ $price</td>
                                        <td>$regdate</td>
                                        
                                        <td>
                                          <div class='has-buttons'>
                                             <a class='button is-danger cancel' href='/dashboard/ads.php?rid=$pid&tk=$tk&st=cancel'>Cancel</a>
                                             <a class='button is-primary' href='/dashboard/ads.php?rid=$pid&tk=$tk&st=paid'>PAID</a>
                                          </div>
                                        </td>
                                        <td></td>
                                    </tr>";
                            }
                        }
                    
                    ?>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="container">
            <div class="title my-5">
               Reservation Complete
            </div>
         </div>
         <div class="container containerless">
            <div class="scrollable">
               <div class="can-scroll has-text-right is-hidden-tablet">
                  <img src="/assets/img/table-move.svg" alt="">
               </div>
               <table class="table is-fullwidth">
                  <thead>
                     <tr>
                        <th class="sticky-col">
                           <div>#</div>
                        </th>
                        <th>Days</th>
                        <th>Price</th>
                        <th>Date Created</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php
                        $sql = "SELECT u.name, u.email, b.pid, b.tdays, b.tprice, b.reg_date, b.id, b.status  FROM user as u JOIN buy_ads as b ON u.id = b.userid WHERE status = 'PAID'";
                        $res = executeQueryV2($sql, $mysqli);
                     
                        if(!empty($res)){
                            foreach($res as $i => $row){
                              $name = $row['name'];
                              $pid = $row['pid'];
                              $days = $row['tdays'];
                              $price = $row['tprice'];
                              $regdate = formatDateTime($row['reg_date']);
                              $status = $row['status'];
                                  if($status == ''){
                                      $status = 'Pending';
                                  }


                                echo "<tr>
                                        <td class='uppercase sticky-col'>
                                            <div>$pid</div>
                                        </td>
                                        <td>$days days</td>
                                        <td>$ $price</td>
                                        <td>$regdate</td>
                                         <td>
                                            $status
                                        </td>
                                    </tr>";
                            }
                        }
                    
                    ?>
                     
                  </tbody>
               </table>
            </div>
         </div>
         <div class="container">
            <div class="title my-5">
               Reservation Canceled
            </div>
         </div>
         <div class="container containerless">
            <div class="scrollable">
               <div class="can-scroll has-text-right is-hidden-tablet">
                  <img src="/assets/img/table-move.svg" alt="">
               </div>
               <table class="table is-fullwidth">
                  <thead>
                     <tr>
                        <th class="sticky-col">
                           <div>#</div>
                        </th>
                        <th>Days</th>
                        <th>Price</th>
                        <th>Date Created</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php
                        $sql = "SELECT u.name, u.email, b.pid, b.tdays, b.tprice, b.reg_date, b.id, b.status  FROM user as u JOIN buy_ads as b ON u.id = b.userid WHERE status = 'CANCEL'";
                        $res = executeQueryV2($sql, $mysqli);
                     
                        if(!empty($res)){
                            foreach($res as $i => $row){
                                $pid = $row['pid'];
                                $days = $row['tdays'];
                                $price = $row['tprice'];
                                $regdate = formatDateTime($row['reg_date']);
                                $status = $row['status'];
                                    if($status == ''){
                                        $status = 'CANCEL';
                                    }

                                echo "<tr>
                                        <td class='uppercase sticky-col'>
                                            <div>$pid</div>
                                        </td>
                                        <td>$days days</td>
                                        <td>$ $price</td>
                                        <td>$regdate</td>
                                         <td>
                                            $status
                                        </td>
                                    </tr>";
                            }
                        }
                    
                    ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>


      <?php include_once ABSPATH."./inc/footer.php"; ?>
      <script  src="/assets/jquery-3.7.0.min.js" ></script>
      <script defer src="/assets/script/main.js"></script>
      <script defer src="/assets/js/app.js"></script>
   </body>
</html>