<?php
// Connection parameters
$localhost = "srv1041.hstgr.io";
$username = "u266886950_coinslot";
$password = "2023Piso!";
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
$query = "SELECT * FROM your_table WHERE column = :value";
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


 

?>
