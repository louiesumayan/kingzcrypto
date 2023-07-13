<?php 

session_start();

define( 'ABSPATH', dirname( __FILE__, 2 ) . '/' );

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"])){
  header("location: /login.php");
  exit;
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
    <script
      src="https://kit.fontawesome.com/b7c265b79a.js"
      crossorigin="anonymous"
    ></script>
   
    <link rel="stylesheet" href="/assets/css/main.css" />
     <link rel="stylesheet" href="/assets/css/style.css" />
    
    
    <!--script defer src="./assets/script/index.js"></script-->
    <title>KINGZ CRYPTO</title>
   
  </head>
  <body>
  <?php  include_once ABSPATH."inc/nav2.php";  ?>


  <br>
  <!-- part 1 -->
  <?php include_once ABSPATH."/inc/coin-header.php"; ?> 
    <!-- part 2-->
    <?php include_once ABSPATH."/inc/coin-body.php"; ?>  

        

<hr>
  <?php include_once ABSPATH."/inc/footer.php"; ?>  

  <script  src="/assets/jquery-3.7.0.min.js" ></script>
  <script defer src="/assets/script/main.js"></script>
  </body>
</html>
