<?php
session_start();
require('./inc/db.php');  //include config file with db connection details and other constants
require('mail.php');


if(isset($_SESSION['id'])){
    $uid = $_SESSION['id'];
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['api']) && $_POST['api'] == $_SESSION['_token']){
        if($_POST['boosts']){
            /*
            Array
                (
                    [api] => 4f69542b2d70f54609ba4e25d96fd38b
                    [boosts] => 1
                    [coins] => T1
                )
            */
            $symbol = $mysqli -> real_escape_string($_POST['coins']);
            $boosts = intval($mysqli -> real_escape_string($_POST['boosts']));
            if(updateCoinBoost($symbol, $boosts)){
                updateBoostsUserByID($uid, $boosts, 'MINUS');
                echo true;
            }
        }
    }

    if(isset($_POST['search'])){
        $query = '%'.$mysqli -> real_escape_string($_POST['search']).'%';
        $sql = "SELECT id, name, symbol, image_url, bsc_contract_address FROM coins WHERE name like '$query' AND status = 'approve'";
        $res = executeQueryV2($sql, $mysqli);
        if(!empty($res)){
             // Converting to JSON
            $jsonOutput = json_encode($res, JSON_PRETTY_PRINT);

            // Output the JSON
            echo $jsonOutput;
        }
    }
    if(isset($_POST['forgot']) && $_POST['email']){
        $email = $mysqli -> real_escape_string($_POST['email']);
        $sql = "SELECT * FROM user WHERE email = '$email' and auth IS NOT NULL";
        $res = executeQueryV2($sql, $mysqli);
        if(!empty($res) ){
            print_r($res);
            //sendHtmlEmail($res[0]['email'], $res[0]['name'], "Reset Your Paasword", "forgot", $res[0]['ticket']);
            //header('Location: /login.php');
            //exit();
        }

    }
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET['ticket'])){
        $ticket = $_GET['ticket'];
        $sql = "SELECT * FROM user WHERE ticket = '$ticket' and auth IS NULL";
        $res0 = executeQueryV2($sql, $mysqli);
        if(!empty($res0) ){
              $sqll = "UPDATE user set `auth` = 'user' WHERE ticket = '$ticket'";
              if(executeQueryV2($sqll,$mysqli)){
                header("Location: /login.php");
                exit();
              }
        }
    }

    if(isset($_GET['forgot'])){
        $ticket = $_GET['forgot'];
        $sql = "SELECT * FROM user WHERE ticket = '$ticket' and auth IS NOT NULL";
        $res0 = executeQueryV2($sql, $mysqli);
        if(!empty($res0)){ 
             // $sqll = "UPDATE user set `auth` = 'user' WHERE ticket = '$ticket'";
             // if(executeQueryV2($sqll,$mysqli)){
                $_SESSION['forgot'] = $ticket;
                header("Location: /reset.php");
                exit();
              
        }
        else{
            echo  "invalid ticket";
        }
    }
}
