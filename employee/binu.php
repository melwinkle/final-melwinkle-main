<!-- This is to restore the Company or Customer status to active -->

<?php 
 
session_start();
require_once("connection.php");
$sid=$_GET['cid'];

if(isset($_GET['restorer'])){
$delete="UPDATE suppliers set CompanyStatus='ACTIVE' where SuppliersID='$sid'";
$query=mysqli_query($conn,$delete);
if ($query){
    header("Location: bin.php?restored&sid={$sid}");
}
else{
    header("Location: bin.php?notrestored&sid={$sid}");
}
}


else if(isset($_GET['restore'])){
    $delete="UPDATE Customer set CustomerStatus='ACTIVE' where CustomerID='$sid'";
    $query=mysqli_query($conn,$delete);
    if ($query){
        header("Location: bin.php?restored&sid={$sid}");
    }
    else{
        header("Location: bin.php?notrestored&sid={$sid}");
    }
    }

    else if(isset($_GET['restorei'])){
        $delete="UPDATE Inventory set Status='Available' where InventoryID='$sid'";
        $query=mysqli_query($conn,$delete);
        if ($query){
            header("Location: bin.php?restored&sid={$sid}");
        }
        else{
            header("Location: bin.php?notrestored&sid={$sid}");
        }
        }

?>