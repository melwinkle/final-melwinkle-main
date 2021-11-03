
<!-- This is the php file for adding a new employee -->
<?php

require_once("connection.php");

if(isset($_POST['submit'])){
    $FN=$_POST['fname'];
    $LN=$_POST['lname'];
    $D=$_POST['dob'];
    $G=$_POST['gender'];
    $A=$_POST['address'];
    $T=$_POST['tel'];
    $T1=$_POST['tel1'];
    $S=$_POST['status'];
    $ST=$_POST['shift'];
    $DE=$_POST['department'];
    $STR=$_POST['employment'];
   




$main="INSERT INTO Employee( EmployeeFname, EmployeeLname, EmployeeGender, EmployeeDOB, EmployeeAddress, DepartmentID, ShiftTime, EmploymentDate, EmployeeStatus) VALUES ('$FN','$LN','$G','$D','$A',$DE,'$ST','$STR','$S')";
$main_result=mysqli_query($conn,$main);

if($main_result){

    $last="SELECT EmployeeID from Employee ORDER BY EmployeeID DESC LIMIT 1";
    $last_result=mysqli_query($conn,$last);
    $row=mysqli_fetch_assoc($last_result);
    $id=$row['EmployeeID'];
    $num="INSERT INTO EmployeeNumber(EmployeeID, TelNo1, TelNo2) VALUES ($id,'$T','$T1')";
    $num_result=mysqli_query($conn,$num);
    $pass=$FN."E".$id;
    $password=password_hash($pass,PASSWORD_DEFAULT);
    $details="INSERT INTO Employee_Log_in(EmployeeID, Password) VALUES ($id,'$password')";
    $details_result=mysqli_query($conn,$details);



   
    $depart="INSERT into Pharmacy(EmployeeID,Stockkeeper) VALUES($id,'Yes')";
    $depart_result=mysqli_query($conn,$depart);


    


    if($depart_result & $num_result & $details_result){
        header("Location: administrator_employee.php?success?id={$id}");
    }
    else{
        header("Location: administrator_employee.php?nosuccess&id={$id}&fname={$FN}&lname={$LN}&gender={$G}&date={$D}&address={$A}&departmentid={$DE}&shift={$ST}&employment={$STR}&status={$ST}&tel={$T}&tel1={$T1}");
    }
}
else{
    header("Location: administrator_employee.php?nosuccess&id={$id}&fname={$FN}&lname={$LN}&gender={$G}&date={$D}&address={$A}&departmentid={$DE}&shift={$ST}&employment={$STR}&status={$ST}&tel={$T}&tel1={$T1}");
}

    
}




if(isset($_POST['msubmit'])){
    $FN=$_POST['fname'];
    $LN=$_POST['lname'];
    $D=$_POST['dob'];
    $G=$_POST['gender'];
    $A=$_POST['address'];
    $T=$_POST['tel'];
    $T1=$_POST['tel1'];
    $S=$_POST['status'];
    $ST=$_POST['shift'];
    $DE=2;
    $STR=$_POST['employment'];
    $L=$_POST['location'];





$main="INSERT INTO Employee( EmployeeFname, EmployeeLname, EmployeeGender, EmployeeDOB, EmployeeAddress, DepartmentID, ShiftTime, EmploymentDate, EmployeeStatus) VALUES ('$FN','$LN','$G','$D','$A',$DE,'$ST','$STR','$S')";
$main_result=mysqli_query($conn,$main);

if($main_result){

    $last="SELECT EmployeeID from Employee ORDER BY EmployeeID DESC LIMIT 1";
    $last_result=mysqli_query($conn,$last);
    $row=mysqli_fetch_assoc($last_result);
    $id=$row['EmployeeID'];
    $num="INSERT INTO EmployeeNumber(EmployeeID, TelNo1, TelNo2) VALUES ($id,'$T','$T1')";
    $num_result=mysqli_query($conn,$num);
    $pass=$FN."E".$id;
    $password=password_hash($pass,PASSWORD_DEFAULT);
    $details="INSERT INTO Employee_Log_in(EmployeeID, Password) VALUES ($id,'$password')";
    $details_result=mysqli_query($conn,$details);



    $depart="INSERT into Maintenance(EmployeeID,CleaningLocation) VALUES($id,'$L')";
    $depart_result=mysqli_query($conn,$depart);




    


    if($depart_result & $num_result & $details_result){
        header("Location: administrator_employee.php?success?id={$id}");
    }
    else{
        header("Location: administrator_employee.php?nosuccess&id={$id}&fname={$FN}&lname={$LN}&gender={$G}&date={$D}&address={$A}&departmentid={$DE}&shift={$ST}&employment={$STR}&status={$ST}&tel={$T}&tel1={$T1}");
    }
}
else{
    header("Location: administrator_employee.php?nosuccess&id={$id}&fname={$FN}&lname={$LN}&gender={$G}&date={$D}&address={$A}&departmentid={$DE}&shift={$ST}&employment={$STR}&status={$ST}&tel={$T}&tel1={$T1}&cleaning={$L}");
}

    
}





if(isset($_POST['submits'])){
    $FN=$_POST['fname'];
    $LN=$_POST['lname'];
    $D=$_POST['dob'];
    $G=$_POST['gender'];
    $A=$_POST['address'];
    $T=$_POST['tel'];
    $T1=$_POST['tel1'];
    $S=$_POST['status'];
    $ST=$_POST['shift'];
    $DE=3;
    $STR=$_POST['employment'];





$main="INSERT INTO Employee( EmployeeFname, EmployeeLname, EmployeeGender, EmployeeDOB, EmployeeAddress, DepartmentID, ShiftTime, EmploymentDate, EmployeeStatus) VALUES ('$FN','$LN','$G','$D','$A',$DE,'$ST','$STR','$S')";
$main_result=mysqli_query($conn,$main);

if($main_result){

    $last="SELECT EmployeeID from Employee ORDER BY EmployeeID DESC LIMIT 1";
    $last_result=mysqli_query($conn,$last);
    $row=mysqli_fetch_assoc($last_result);
    $id=$row['EmployeeID'];
    $num="INSERT INTO EmployeeNumber(EmployeeID, TelNo1, TelNo2) VALUES ($id,'$T','$T1')";
    $num_result=mysqli_query($conn,$num);
    $pass=$FN."E".$id;
    $password=password_hash($pass,PASSWORD_DEFAULT);
    $details="INSERT INTO Employee_Log_in(EmployeeID, Password) VALUES ($id,'$password')";
    $details_result=mysqli_query($conn,$details);







 $depart="INSERT into Security(EmployeeID) VALUES($id)";
    $depart_result=mysqli_query($conn,$depart);
    


    if($depart_result & $num_result & $details_result){
        header("Location: administrator_employee.php?success?id={$id}");
    }
    else{
        header("Location: administrator_employee.php?nosuccess&id={$id}&fname={$FN}&lname={$LN}&gender={$G}&date={$D}&address={$A}&departmentid={$DE}&shift={$ST}&employment={$STR}&status={$ST}&tel={$T}&tel1={$T1}");
    }
}
else{
    header("Location: administrator_employee.php?nosuccess&id={$id}&fname={$FN}&lname={$LN}&gender={$G}&date={$D}&address={$A}&departmentid={$DE}&shift={$ST}&employment={$STR}&status={$ST}&tel={$T}&tel1={$T1}");
}

    
}




?>