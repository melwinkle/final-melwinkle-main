<!-- This is for making and employee inactive(fired) -->
<?php
require_once("../../employee/connection.php");
if(isset($_POST['delete'])){
    $EID=$_GET['eid'];


    $query="UPDATE Employee SET EmployeeStatus='INACTIVE' WHERE EmployeeID=$EID";
    $result=mysqli_query($conn,$query);

    if($result){
        header("Location: administrator_employee.php?updated&eid=$EID");
    }
    else{
        header("Location: administrator_employee.php?noupdated&eid=$EID");
    }
}



?>