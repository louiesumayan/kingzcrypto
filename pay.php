<?php
// Initialize the session
session_start();


 

 
// Include config file
require_once "./inc/db.php";

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

  
  <section class="login">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="inner">
                    <div class="top">
                        <h1>SCAN TO PAY</h1>
                        <h2>Log in to get access to your CoinSniper account.</h2>
                    </div>
                    <div style="background-color: white;">
                    <img src="/assets/img/qr.webp" alt="" srcset="">
                    </div>
                   
                   

                    <br>
                    <div class="register">
                        Pay via Gcash with the message of your transaction ID e.g "C4CDE70B"
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
  


  
  <?php include_once "./inc/footer.php"; ?>
  <script  src="./assets/jquery-3.7.0.min.js" ></script>
  <script defer src="./assets/script/main.js"></script>
  </body>
</html>
