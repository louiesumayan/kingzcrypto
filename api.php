<?php
session_start();
require('./inc/db.php');  //include config file with db connection details and other constants
$uid = $_SESSION['id'];



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
}
