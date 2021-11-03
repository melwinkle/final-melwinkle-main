<!-- This is to restore an employee's employment status -->
<?php


require_once("../../employee/connection.php");
if(isset($_POST['restore'])){
    $EID=$_GET['eid'];


    $query="UPDATE Employee SET EmployeeStatus='Active' WHERE EmployeeID=$EID";
    $result=mysqli_query($conn,$query);

    if($result){
        header("Location: administrator_employee.php?updated&eid=$EID");
    }
    else{
        header("Location: administrator_employee.php?noupdated&eid=$EID");
    }
}



?>