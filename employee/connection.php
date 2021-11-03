<!-- Connection file -->

<?php    
define('DB_HOST', 'us-cdbr-east-04.cleardb.com');
define('DB_NAME','heroku_924661b0d8cdfba');
define('DB_USER','b5985ab66224d4');
define('DB_PASS',"d2b1053e");

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($conn === false){
        die("ERROR: Could not connect. " . $conn->connect_error);
    }

?>