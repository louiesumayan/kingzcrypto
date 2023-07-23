<?php
// Connection parameters
/*
$localhost = "srv1041.hstgr.io";
$username = "u266886950_coinslot";
$password = "2023Piso!";
$database = "u266886950_coins";
*/
$localhost = "localhost";
$username = "root";
$password = "";
$database = "u266886950_coins";


/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
if (!defined('DB_SERVER')) {
    define('DB_SERVER', $localhost);
    define('DB_USERNAME', $username);
    define('DB_PASSWORD', $password );
    define('DB_NAME', $database);
}


/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}




/*
// Example usage
$query = "SELECT * FROM user";
$params = [
    ':value' => 'some_value'
];
$results = executeQuery($query, $params);

// Process the results
foreach ($results as $row) {
    // Access row data using $row['column_name']
    echo $row['column_name'] . "<br>";
}
*/

// Function to execute a query and return the result set
function executeQuery($query, $params = []) {
    global $username, $password, $database;

    try {
        // Create a new PDO instance
        $dsn = "mysql:host=srv1041.hstgr.io;dbname=$database;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $pdo = new PDO($dsn, $username, $password, $options);

        // Prepare and execute the query
        $statement = $pdo->prepare($query);
        $statement->execute($params);

        // Fetch the results as associative array
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Close the connection
        $pdo = null;

        return $results;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}

function executeQueryv0($query, $params = []) {
    global $username, $password, $database;
    try {
        // Create a new PDO instance
        $dsn = "mysql:host=srv1041.hstgr.io;dbname=$database;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $pdo = new PDO($dsn, $username, $password, $options);

        // Prepare and execute the query
        $statement = $pdo->prepare($query);
        $statement->execute($params);

        // Check if the query was an update or insert
        $isUpdateOrInsert = $statement->rowCount() > 0;

        // If it was an update or insert, return the number of affected rows
        if ($isUpdateOrInsert) {
            $affectedRows = $statement->rowCount();
            $pdo = null;
            return $affectedRows;
        }

        // Fetch the results as an associative array for select queries
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Close the connection
        $pdo = null;

        // Return the results
        return $results;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}




function executeQueryV2($query, $mysqli) {
    $result = $mysqli->query($query);

    if ($result) {
        if ($result instanceof mysqli_result) {
            $data = [];

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            $result->free();
            return $data;
        } else {
            // Query executed successfully, but no data returned (e.g., an UPDATE or INSERT query)
            return true;
        }
    } else {
        die("Error executing the query: " . $mysqli->error);
    }
}

function executeQueryV3($query, $mysqli, $params) {
    $statement = $mysqli->prepare($query);
    
    if (!$statement) {
        die("Error preparing the query: " . $mysqli->error);
    }
    
    // Bind the parameters
    $bindParams = [];
    $bindParams[] = implode('', array_keys($params)); // Data types of the parameters
    
    foreach ($params as $param => $value) {
        $bindParams[] = &$params[$param];
    }
    
    call_user_func_array([$statement, 'bind_param'], $bindParams);
    
    $result = $statement->execute();
    
    if ($result) {
        if ($statement->result_metadata()) {
            $data = [];
            
            $statementResult = $statement->get_result();
            
            while ($row = $statementResult->fetch_assoc()) {
                $data[] = $row;
            }
            
            $statementResult->free();
            return $data;
        } else {
            // Query executed successfully, but no data returned (e.g., an UPDATE or INSERT query)
            return true;
        }
    } else {
        die("Error executing the query: " . $mysqli->error);
    }
}


function messagebox($message){
    echo "<div class='container'>
                <div class='message promoted-boost-message' style='margin-top: 1rem;'>
                    <i class='fas fa-info-circle'></i> $message
                </div>
            </div>";
}

function genID($length = 10) {
    $characters = '0123456789ABCDEF';
    $randomString = '#';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

function formatDateTime($dateTimeString)
{
    $timestamp = strtotime($dateTimeString);
    $formattedDate = date('d M Y - g A', $timestamp);
    return $formattedDate;
}



function genAdsid() {
    $uniqueString = substr(uniqid(), -8);
    return strtoupper($uniqueString);
}


function checkIfVotedByCoin($cid, $uid){
    global $mysqli;
    $sql = "SELECT * FROM voteduser WHERE coin_id = '$cid' and user_id = $uid";
    $res = executeQueryV2($sql, $mysqli);
    if (count($res) != 0 ){    
        //echo count($res);    
        return true;
    }

    
}

function saveVoted($cid, $uid){
    global $mysqli;
    $sql = "INSERT INTO `voteduser` (`coin_id`,`user_id`) VALUES ('$cid', '$uid')";
    if(executeQueryV2($sql, $mysqli)){
        return true;
    }
}


function coinVote($id, $user){
    global $mysqli;
    $cvote = "SELECT vote FROM coins where id = $id";
    $vote = executeQueryV2($cvote, $mysqli);
    if(!empty($vote)){
        //if vote is null
        if($vote[0]['vote'] == ''){
            $vote = 1;
        }else{
            $vote = intval($vote[0]['vote']) + 1;
        }
        
    }
    if(checkIfVotedByCoin($id, $user) != true ){
       
        
        $inVote = "UPDATE `coins` SET `vote` = '$vote' WHERE `id` = '$id'";    
        if(executeQueryV2($inVote, $mysqli)){
            if(saveVoted($id, $user)){
                header('Location: /');
                exit();
            }
           
        }
        
    }
}


function getBoostsByID($id){
    global $mysqli;
    $sql = "SELECT * FROM buy_boosts WHERE id = '$id'";
    $res = executeQueryV2($sql, $mysqli);
    if(!empty($res)){
        return $res[0]['totalboosts'];
    }else{
        return 0;
    }
    
}

function updateBoostsUserByID($id, $boosts, $operation){
    global $mysqli;
    $newboosts = intval($boosts);
    if($operation  == 'ADD'){
        //$operation  = "ADD"
        $sql = "UPDATE `user` SET `boosts` = IFNULL(`boosts`, 0) + $newboosts WHERE `id` = $id;";
    }
    if($operation  == 'MINUS'){
        //$operation  = "ADD"
        $sql = "UPDATE `user` SET `boosts` = IFNULL(`boosts`, 0) - $newboosts WHERE `id` = $id;";
    }   
    $res = executeQueryV2($sql, $mysqli);
    if(!empty($res)){
        return $res;
    }    
}

function updateCoinBoost($coin, $boosts){
    global $mysqli;
    //update coin boost table with new total coins and time stamp.
    $sql = "UPDATE coins SET boosts = IFNULL(`boosts`, 0) + $boosts WHERE symbol = '$coin'";
    $res1 = executeQueryV2($sql,$mysqli);
    if($res1){
        return true;
    }
}

 

?>
