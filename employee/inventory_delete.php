<!-- This is to make an item unavailable -->
<?php

require_once('../../employee/connection.php');
$cid=$_GET['sid'];


$delete="UPDATE Inventory set Status='Unavailable' where InventoryID='$cid'";



$rdelete=mysqli_query($conn,$delete);





if($rdelete){
    header("Location: employee_inventory.php?deleted={$cid}");
}
else{
    header("Location: employee_inventory.php?notdeleted");
}
?>