<?php
   // Initialize the session
   session_start();
   
   // Check if the user is already logged in, if yes then redirect him to welcome page
   if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true){
       header("location: /login.php");
       exit;
   }
   require_once "./inc/db.php";
   
    
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
      <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
      <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
      <title>KINGZ CRYPTO - Ads Reservation</title>
   </head>
   <body>
      <?php     include_once "./inc/nav2.php";  ?>
      <?php  include_once "./inc/search.php";  ?>
      <section class="tabs">
         <div class="container">
            <ul>
               <li class="">
                  <a href="/ads.php">
                  <span>New reservation</span>
                  </a>
               </li>
               <li class="is-active">
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
                  <a href="/ads_reservations.php">Your reservations</a>
               </li>
            </ul>
         </div>
      </div>

      <?php include_once "./inc/banner_top.php" ?>

      <?php include_once "./inc/ads_input.php" ?>

      <?php include_once "./inc/banner_down.php" ?>

      <?php include_once "./inc/footer.php"; ?>
      <script  src="./assets/jquery-3.7.0.min.js" ></script>
      <script defer src="./assets/script/main.js"></script>
      <script defer src="./assets/js/app.js"></script>
   </body>
</html>