<!-- Connection file -->

<?php 

    
define('DB_HOST', '127.0.0.1');
define('DB_NAME','AILEEN12372022');
define('DB_USER','root');
define('DB_PASS',getenv("MYSQLPASS") ?? "");


    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($conn === false){
        die("ERROR: Could not connect. " . $conn->connect_error);
    }



?>