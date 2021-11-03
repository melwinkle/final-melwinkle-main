
<!-- This is to reset passwords -->
<?php

require_once("connection.php");
if(isset($_POST['submit'])){
  $reset=$_POST['newpassword'];
  $password=password_hash($reset,PASSWORD_DEFAULT);
$id=$_POST['id'];


  $sql="UPDATE Employee_Log_in set Password='$password' where EmployeeID=$id";
  $result=mysqli_query($conn,$sql);
  if($result){
    header("Location: ../index.php?reset");
  }else{
    header("Location: reset_password.php?noreset");
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
      
       <?php
		    	if(isset($_SESSION['message'])){
		    		?><br />
		    			<div class="alert alert-info text-center"><br />
					        <?php echo $_SESSION['message']; ?><br />
					    </div><br />
		    		<?php
		    		unset($_SESSION['message']);
		    	}
		    ?>


<input type="text" id="new" class="form-control "  placeholder="Employee ID" name="id" style="width:90%" ><br>
        
        <input type="password" id="new" class="form-control "  placeholder="New Password" name="newpassword" style="width:90%" ><br>
        
      

      <!-- Password -->
   
  
     <input type="password" id="repassword" class="form-control"  placeholder="Re-enter Password"name="Password"style="width:90%" >
        
   

  
      <button class="btn btn-block my-4 waves-effect z-depth-0"  style="background:rgb(6, 24, 9);width:40%;margin-left:100px;color:white" name= "submit" type="submit">RESET</button>
     
          
     
        
      

      </div>
				</form>
			
      
</div>

</body>
</html>