<?php 

session_start();
$ulid = $_SESSION['id'];
$tk = $_SESSION['_token'];
//print_r($_SESSION);

define( 'ABSPATH', dirname( __FILE__, 2 ) . '/' );


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) ){
  if($_SESSION['auth'] != 'admin'){
    header("location: /dashboard");
    exit;
  } 
}

require_once ABSPATH."inc/db.php";

//print_r(getBoostsByID($_SESSION['id']));
//print_r(updateBoostsUserByID($_SESSION['id'],'10', 'ADD'));

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if($_SESSION['auth'] == 'admin' && isset($_GET['tk']))
    if($_GET['tk'] == $_SESSION['_token']){
        if(isset($_GET['paid'])){
            $id = $mysqli -> real_escape_string($_GET['paid']);
            $bcredit = getBoostsByID($id);  
            $sql = "UPDATE buy_boosts SET status = 'complete' WHERE id = $id";
            updateBoostsUserByID($_SESSION['id'],$bcredit, 'ADD');                   
        }
        if(isset($_GET['cancel'])){ 
            $id = $mysqli -> real_escape_string($_GET['cancel']);  
            $sql = "UPDATE buy_boosts SET status = 'cancel' WHERE id = $id";                  
        }
        if(isset($sql)){
            echo $sql;
            if(executeQueryV2($sql, $mysqli)){
                header('Location: /dashboard/boosts.php');
                exit();
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


  <section class="ads reservations boosts">
        <div class="container">
            <h1>Client Payments</h1>          
            <div class="title">
                Payment Pending
            </div>
            <p>
                The Admin will update & verify the your payment and will credit your boosts sold.
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
                        <th>User</th>
                        <th>Boosts</th>
                        <th>Price</th>
                        <th>Date created</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $sql0 = "SELECT bbot.id, bbot.package, bbot.totalboosts, bbot.totalprice, bbot.pid, bbot.reg_date, bu.name, bu.email
                            FROM buy_boosts AS bbot
                            JOIN user AS bu ON bbot.userid = bu.id
                            WHERE  bbot.status IS NULL;";
                    $res0 = executeQueryV2($sql0, $mysqli);
                    if(!empty($res0)){         
                        //print_r($res0); 
                        foreach($res0 as $a => $row){
                            $id = $row['id'];                            
                            $user = strtoupper($row['name']);
                            $email = $row['email'];
                            $pid = $row['pid'];
                            $totalprice = $row['totalprice'];
                            $totalboosts = $row['totalboosts'];
                            $date = formatDateTime($row['reg_date']);
                            echo " <tr>
                                    <td class='uppercase sticky-col'>
                                        <div>
                                            <a href=''>$pid</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='listing-symbol'>$user</div>
                                        <div class='listing-name'>$email</div>
                                    </td>
                                    <td>$totalboosts Boosts</td>
                                    <td>$ $totalprice</td>
                                    <td>$date</td>
                                    <td>
                                        <div class='has-buttons'>
                                            <a href='/dashboard/boosts.php?cancel=$id&tk=$tk' class='button is-danger cancel' >Cancel</a>
                                            <a href='/dashboard/boosts.php?paid=$id&tk=$tk' class='button is-primary' >Paid</a>
                                        </div>
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
                        <th>Boosts</th>
                        <th>Price</th>
                        <th>Date created</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                   $sql0 = "SELECT bbot.id, bbot.package, bbot.totalboosts, bbot.totalprice, bbot.pid, bbot.reg_date, bu.name, bu.email
                            FROM buy_boosts AS bbot
                            JOIN user AS bu ON bbot.userid = bu.id
                            WHERE  bbot.status = 'complete';";
                    $res0 = executeQueryV2($sql0, $mysqli);
                    if(!empty($res0)){
                        //print_r($res0);
                        foreach($res0 as $a => $row){
                            $user = strtoupper($row['name']);
                            $email = $row['email'];
                            $pid = $row['pid'];
                            $totalprice = $row['totalprice'];
                            $totalboosts = $row['totalboosts'];
                            $date = formatDateTime($row['reg_date']);
                            echo "  <tr>
                                        <td class='uppercase sticky-col'>
                                            <div><a href=''>$pid</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='listing-symbol'>$user</div>
                                            <div class='listing-name'>$email</div>
                                        </td>
                                        <td>$totalboosts Boosts</td>
                                        <td>$ $totalprice</td>
                                        <td>$date</td>
                                        <td>
                                           Complete
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
                        <th>User</th>
                        <th>Boosts</th>
                        <th>Price</th>
                        <th>Date Created</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                   $sql0 = "SELECT bbot.id, bbot.package, bbot.totalboosts, bbot.totalprice, bbot.pid, bbot.reg_date, bu.name, bu.email
                            FROM buy_boosts AS bbot
                            JOIN user AS bu ON bbot.userid = bu.id
                            WHERE  bbot.status = 'cancel';";
                    $res0 = executeQueryV2($sql0, $mysqli);
                    if(!empty($res0)){
                       
                        foreach($res0 as $a => $row){
                            $user = strtoupper($row['name']);
                            $email = $row['email'];
                            $pid = $row['pid'];
                            $totalprice = $row['totalprice'];
                            $totalboosts = $row['totalboosts'];
                            $date = formatDateTime($row['reg_date']);
                            echo "  <tr>
                                        <td class='uppercase sticky-col'>
                                            <div><a href=''>$pid</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='listing-symbol'>$user</div>
                                            <div class='listing-name'>$email</div>
                                        </td>
                                        <td>$totalboosts Boosts</td>
                                        <td>$ $totalprice</td>
                                        <td>$date</td>
                                        <td>
                                            Canceled
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


        

  <hr>
  <?php include_once ABSPATH."/inc/footer.php"; ?>  

  <script  src="/assets/jquery-3.7.0.min.js" ></script>
  <script defer src="/assets/script/main.js"></script>
  </body>
</html>
