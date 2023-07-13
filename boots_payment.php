<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true){
    header("location: /login.php");
    exit;
}
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
    <script  src="https://kit.fontawesome.com/b7c265b79a.js"      crossorigin="anonymous"    ></script>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
   
    <title>KINGZ CRYPTO</title>
  </head>
  <body>
  <?php     include_once "./inc/nav2.php";  ?>
  <section class="tabs">
    <div class="container">
        <ul>
            <li class="">
                <a href="/boosts.php">
                    <span>Buy Boosts</span>
                </a>
            </li>
            <li class="is-active">
                <a href="/boots_payment.php">
                    <span>Your payments</span>
                </a>
            </li>
        </ul>
    </div>
</section>
<div class="container">
    <div class="mobile-navigation mt-3">
        <div class="current">
            <div class="dropdown-title">
                                    Buy Boosts
                            </div>
            <svg class="navigation-arrow" width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.96478 6.3128C6.02441 6.37053 6.10421 6.41774 6.19729 6.45035C6.29038 6.48296 6.39396 6.5 6.49912 6.5C6.60428 6.5 6.70786 6.48296 6.80094 6.45035C6.89403 6.41774 6.97382 6.37053 7.03346 6.3128L12.8839 0.679854C12.9516 0.614883 12.9913 0.538784 12.9987 0.459824C13.0061 0.380865 12.9809 0.302066 12.9258 0.231988C12.8708 0.16191 12.7879 0.103234 12.6863 0.0623343C12.5847 0.0214347 12.4683 -0.000124074 12.3496 5.37146e-07H0.648661C0.53025 0.000326559 0.414212 0.0221626 0.313027 0.0631601C0.211842 0.104158 0.129337 0.162766 0.0743855 0.232682C0.019434 0.302597 -0.00588502 0.381176 0.00115111 0.459966C0.00818723 0.538756 0.0473123 0.614777 0.114319 0.679854L5.96478 6.3128Z" fill="#00A676"></path>
            </svg>
        </div>
        <ul class="">
            <li>
                <a href="/boosts.php">Buy Boosts</a>
            </li>
            <li class="options">
                <a href="/boots_payment.php">Boost Payments</a>
            </li>
        </ul>
    </div>
</div>
<section class="ads reservations boosts">
        <div class="container">
            <h1>Your Payments</h1>
            <a href="/boosts" class="button is-primary">Buy More Boosts</a>
            <div class="title">
                Payment Pending
            </div>
            <p>
                It can take up to 30 minutes for the payment status to update!
            </p>
        </div>

                    <div class="container">
                <p>No reservations found</p>
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
                        <th>Boosts</th>
                        <th>Price</th>
                        <th>Date created</th>
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
                Payment Expired
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
                        <th>Boosts</th>
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
                Payment Canceled
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
                        <th>Boosts</th>
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
