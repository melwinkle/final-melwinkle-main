
<!-- This is to make a supplier inactive(delete) -->

<?php 
require_once("../../employee/connection.php");
$sid=$_GET['sid'];

if(isset($_POST['delete'])){
$delete="UPDATE suppliers set CompanyStatus='TERMINATED' where SuppliersID='$sid'";
$query=mysqli_query($conn,$delete);
if ($query){
    header("Location: general_suppliers.php?deleted&sid={$sid}");
}
else{
    header("Location: general_suppliers.php?notdeleted&sid={$sid}");
}

}
?>