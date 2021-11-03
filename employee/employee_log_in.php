
<!-- This is for login -->
<?php

require_once("connection.php");

if(isset($_POST['submit'])){
    $username=$_POST['EmployeeID'];
    $password=$_POST['Password'];

    $sqls = "SELECT * FROM Employee_Log_in WHERE EmployeeID = $username ";
    $querys =mysqli_query($conn,$sqls);
    $row = mysqli_fetch_assoc($querys);
    $passw=$row['Password'];
    

    

    if($querys){
        $time=date('Y-m-d H:i:s');
        $login = "INSERT INTO Employee_Time(EmployeeID,Report_Time) values ($username,'$time')";
            $report = mysqli_query($conn,$login);
            
			$depart="SELECT DepartmentID from Employee  where EmployeeID=$username";
			$row_d=mysqli_query($conn,$depart);
           
            if($row_d['DepartmentID']==4){

        $_SESSION["loggedin"] = true;
		$_SESSION['id'] = $username;
        header('Location: /final-melwinkle/administrator/administrator_dashboard.php');
            }else if($row_d['DepartmentID']==1){
                $_SESSION["loggedin"] = true;
                $_SESSION['id'] = $username;
                header('Location: employee_dashboard.php');
			}
			else{
				$_SESSION["loggedin"] = true;
                $_SESSION['id'] = $username;
                header('Location: employee_dashboard_1.php');
			}
    }
    else{
        header('Location: index.php?no');
    }
   
}

?>