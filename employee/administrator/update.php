<!-- This is for updating an employee's record -->


<?php
require_once("connection.php");
if(isset($_POST['submit'])){
    $EID=$_POST['id'];
    $FN=$_POST['fname'];
    $LN=$_POST['lname'];
    $D=$_POST['dob'];
    $G=$_POST['gender'];
    $A=$_POST['address'];
    $T=$_POST['tel'];
    $T1=$_POST['tel1'];
    $S=$_POST['status'];
    $ST=$_POST['shift'];
    $SA=$_POST['salary'];


    $query="UPDATE Employee SET EmployeeFname='$FN',EmployeeLname='$LN',EmployeeGender='$G',EmployeeDOB='$D',EmployeeAddress='$A',ShiftTime='$ST',Salary='$SA',EmployeeStatus='$S' WHERE EmployeeID=$EID";
    $querys="UPDATE EmployeeNumber SET TelNo1='$T',TelNo2='$T1' WHERE EmployeeID=$EID";
    $result=mysqli_query($conn,$query);
    $results=mysqli_query($conn,$querys);
    if($result & $results){
        header("Location: administrator_employee.php?updated&eid=$EID");
    }
    else{
        header("Location: administrator_employee.php?noupdated&eid=$EID?$SA");
    }
}



?>