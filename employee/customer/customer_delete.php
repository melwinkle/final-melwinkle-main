<!-- This is to make a customer inactive -->

<?php

require_once('../../employee/connection.php');
$cid=$_GET['cid'];


$delete="UPDATE Customer set CustomerStatus='INACTIVE' where CustomerID=$cid";



$rdelete=mysqli_query($conn,$delete);





if($rdelete){
    header("Location: customer.php?deleted={$cid}");
}
else{
    header("Location: customer_delete.php?notdeleted");
}
?>