<!-- This is the index and for log in -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 
require_once("/employee/connection.php");

if(isset($_POST['submit'])){ 
    $username=$_POST['EmployeeID'];
    $password=$_POST['Password'];

    $sqls = "SELECT * FROM Employee_Log_in WHERE EmployeeID = '$username '";
    $querys =mysqli_query($conn,$sqls);
    $row = mysqli_fetch_assoc($querys);
    $passw=$row['Password'];
    

    

   

    if(password_verify($password,$passw)){
      $stmt = $conn->prepare("INSERT INTO Employee_Time(EmployeeID,Report_Time) values (?,?)");
      $stmt->bind_param("ss", $username, $time);
      
      // set parameters and execute
      $username=$username;
      $time=date('Y-m-d H:i:s');
      $stmt->execute();
     

$stmt->close();
      
            
			$depart="SELECT DepartmentID from Employee  where EmployeeID=$username";
      $row_d=mysqli_query($conn,$depart);
      $res=mysqli_fetch_assoc($row_d);
           
            if($res['DepartmentID']==4){
              session_start();
        $_SESSION["loggedin"] = true;
		$_SESSION['id'] = $username;
        header('Location: administrator/administrator_dashboard.php?successful');
            }else if($res['DepartmentID']==1){
              session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION['id'] = $username;
                header('Location: employee_dashboard.php?successful');
			}
			else{
        session_start();
				$_SESSION["loggedin"] = true;
                $_SESSION['id'] = $username;
                header('Location: employee_dashboard_1.php?successful');
			}
    }
    else{
      echo "No verifivation";
        header('Location: index.php?unsuccessful');
    }
   
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bright Pharmacy </title>
	<meta charset="UTF-8">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/final-melwinkle/css/main.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <style>
    html{
      width:100%;
  height:100%;
    }
    body{
      color:black;
    font-family: 'Open Sans', sans-serif;
    font-size: 13px;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
    height:100%;
background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
background-size: 400% 400%;
animation: gradient 15s ease infinite;
}

@keyframes gradient {
0% {
    background-position: 0% 50%;
}
50% {
    background-position: 100% 50%;
}
100% {
    background-position: 0% 50%;
}
}
    </style>
</head>
<body >

  <br>
  <br>
  <br>
  <br>
<div style="text-align:center;color:white; font-family: 'Lucida Console', 'Courier New', monospace;">
<h1 style="font-size:100px"><i class='icon ion-md-bulb' size='large' style="color:yellow"></i>BRIGHT PHARMACY</h1>
</div>



<div  style="width:30%;margin-top:7%;margin-left:35%;margin-right:45%;border-radius:12px">

  <!--Card content-->
  

    <!-- Form -->
    <form class=" form-control"  method="POST"  action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <div class="md-form form-group mt-5">
      <!-- Email -->
      
      
        <input type="text" id="employeeid" class="form-control "  placeholder="EmployeeID" name="EmployeeID" style="width:90%" ><br>
        
      

      <!-- Password -->
   
  
     <input type="password" id="password" class="form-control"  placeholder="Password"name="Password"style="width:90%" >
        
   

     </div>
      <button class="btn btn-block my-4 waves-effect z-depth-0"  style="background:rgb(6, 24, 9);width:40%;margin-left:100px;color:white" name= "submit" type="submit">SIGN IN</button>
     
          <!-- Forgot password -->
          <a href="/final-melwinkle/employee/reset_password.php">Forgot password?</a> <p >New Employee?
        <a href="/final-melwinkle/employee/verify.php">Verify</a>
      </p>
        
      

      <!-- Sign in button -->
      

      <!-- Register -->
     

      <!-- Social login -->
     
				</form>
			
      
</div>


<?php
if(isset($_GET['unsuccessful'])){
  echo "<script>swal('Login Unsuccessful!Enter correct ID')</script>";
}
?>
</body>
</html>