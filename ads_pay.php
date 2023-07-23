<?php
   // Initialize the session
   session_start();
   
   // Check if the user is already logged in, if yes then redirect him to welcome page
   if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true){
       header("location: /login.php");
       exit;
   }
   require_once "./inc/db.php";

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST['packages'])){
         $data = $_POST['packages'];

         if (strpos($data, ',') !== false) {
            $splitData = explode(',', $data);
            print_r($splitData);
         }else{
            // one package
            echo $data;
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
      <title>KINGZ CRYPTO</title>
   </head>
   <body>
      <?php     include_once "./inc/nav2.php";  ?>
<section class="tabs">
    <div class="container">
        <ul>
            <li class="">
                <a href="https://coinsniper.net/ads">
                    <span>New reservation</span>
                </a>
            </li>
            <li class="is-active">
                <a href="https://coinsniper.net/ads/reservations">
                    <span>Your reservations</span>
                </a>
            </li>
        </ul>
    </div>
</section>

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

        <h1>Your Reservations</h1>

        <div class="title">
            Payment Pending
        </div>

        <p>
            It can take up to 30 minutes for the payment status to update!
        </p>
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
                        <th>Date created</th>
                        <th>Reservation time</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                                        <tr>
                        <td class="uppercase sticky-col">
                            <div>bef0368c</div>
                        </td>
                        <td>1 days</td>
                        <td>$ 150</td>
                        <td>16 Jul 2023 - 3 AM</td>
                        <td>
                            <div class="countdown countdown-pending" data-expires-at="2023-07-16T01:32:57.000000Z" id="countdown-bef0368c"><div class="countdown-timer">8h : 53m : 41s</div></div>
                        </td>
                        <td>
                            <form id="cancel-ad" action="/ads/bef0368c/cancel" method="POST">
                                <input type="hidden" name="_token" value="h09PalVtOA8jLDRytqdtQacVcx8W8uG9S5HqXkn2">                                <button form="cancel-ad" type="submit" class="button is-primary cancel">
                                    CANCEL
                                </button>
                            </form>
                            <a class="button is-primary" href="/ads/pay/bef0368c">PAY</a>
                        </td>
                    </tr>
                                    </tbody>
            </table>
        </div>
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
                        <th>Days</th>
                        <th>Price</th>
                        <th>Date created</th>
                        <th>Starts in</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                                    </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="title my-5">
            Reservation Expired
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
                                    </tbody>
            </table>
        </div>
    </div>
</section>




      
      <?php include_once "./inc/footer.php"; ?>
      <script  src="./assets/jquery-3.7.0.min.js" ></script>
      <script defer src="./assets/script/main.js"></script>
      
   </body>
</html>