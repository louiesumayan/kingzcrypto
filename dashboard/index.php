<?php 
session_start();
define( 'ABSPATH', dirname( __FILE__, 2 ) . '/' );
$tk = $_SESSION['_token'];


// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"])){
  header("location: /login.php");
  exit;
}

require_once ABSPATH."inc/db.php";

#vote handle
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if(isset($_SESSION['id'])){
    if(isset($_GET['tk']) && isset($_GET['cid']) && $_SESSION['_token'] == $_GET['tk']){
      $cid =  $_GET['cid'];
      $userid = $_SESSION['id'];
      //print_r($_GET);
      print_r(coinVote($cid, $userid));

    }
  }
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
  <?php  include_once ABSPATH."inc/search.php";  ?>
  <?php include_once ABSPATH."/inc/banner_top.php" ?>


  <br>
  <!-- part 1 -->
  <!--?php include_once ABSPATH."/inc/rocket1.php"; ?-->  

  <!-- part 2-->
  <?php include_once ABSPATH."/inc/promoted.php"; ?>  

  <!-- part 3-->
  <?php include_once ABSPATH."/inc/coin-list.php"; ?>  

  <?php include_once ABSPATH."/inc/banner_down.php" ?>

  <?php  include_once ABSPATH."/inc/ads_buttom.php";  ?>
    
  <?php include_once ABSPATH."/inc/footer.php"; ?>  
  

  <script  src="/assets/jquery-3.7.0.min.js" ></script>
  <script defer src="/assets/script/main.js"></script>
  </body>
</html>
