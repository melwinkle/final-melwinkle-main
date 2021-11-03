
<!-- This is to verify if an employee is in the system -->
<?php

require_once("../../employee/connection.php");
if(isset($_POST['submit'])){
  $full=$_POST['fullname'];
  $pieces = explode(" ", $full);
  $first=$pieces[0];
  $last=$pieces[1];
 



  $sql="SELECT EmployeeID,EmployeeFname,EmployeeLName from Employee where EmployeeFname='$first' and EmployeeLname='$last'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  if($result){
      $id=$row['EmployeeID'];
      $pass=$first."E".$id;
    header("Location: verify.php?verified&id=$id&password=$pass");
  }else{
    header("Location: verify.php?noreset&first=$first&last=$last");
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bright Pharmacy </title>
	<meta charset="UTF-8">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="sweetalert2.min.css">

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



<div  style="width:50%;margin-top:7%;margin-left:35%;margin-right:45%;border-radius:12px">


  <!--Card content-->
  
<!-- Search form -->
<form class="form-inline" method="post">
  <i class="fas fa-search" aria-hidden="true" action="<?php echo $_SERVER['PHP_SELF']; ?>"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" name="fullname"placeholder="Enter your First and Last Name"
    aria-label="Search">

      <button class="btn btn-block my-4 waves-effect z-depth-0"  style="background:rgb(6, 24, 9);width:40%;margin-left:100px;color:white" name= "submit" type="submit">SEARCH</button><br>
      <button type="button"  class="btn btn-primary" style="background:rgb(6, 24, 9);width:40%;margin-left:100px;color:white" onclick="log()">BACK TO LOGIN</button>
     
      </div>
</form>


<?php
if(isset($_GET['verified'])){
    echo"<script>swal('Verified!')</script>";
    $id=$_GET['id'];
    $password=$_GET['password'];
?>
<form class=" form-control"   >

<label for="">Employee ID</label><br>
    <input type="text" readonly value="<?php echo $id;?>"><br>

    <label for="">Original Password</label><br>
    <input type="text" readonly value="<?php echo $password;?>">


    <button type="button"  class="btn btn-primary" onclick="log()">BACK TO LOGIN</button>
</form>


<?php
}


else if(isset($_GET['noreset'])){
    echo"<script>swal('Not an Employee!')</script>";
}

?>
			
      
</div>


<script>

function log(){
    window.location.href=("../index.php");

}
</script>
</body>
</html>