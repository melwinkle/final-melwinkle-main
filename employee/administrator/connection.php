<!-- This is the connection file -->
<?php 

    require_once('database.php');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($conn === false){
        die("ERROR: Could not connect. " . $conn->connect_error);
    }


?>