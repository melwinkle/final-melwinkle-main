<!-- This is for adding a new customer to the system -->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 
     session_start();
     require_once("connection.php");


     if($_SESSION["loggedin"]){
        $id=$_SESSION["id"];
        $sql="SELECT * FROM Employee inner join Employee_Log_in ON Employee.EmployeeID=Employee_Log_in.EmployeeID WHERE Employee.EmployeeID='$id'";
        $results=mysqli_query($conn,$sql);

      if($row = mysqli_fetch_assoc($results)) {
        $fname=$row["EmployeeFname"];
       
        $lname=$row["EmployeeLname"];
    }





    


    if(isset($_POST['add'])){
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $gender=$_POST['gender'];
        $number=$_POST['phone'];
        $location=$_POST['locate'];
        $status=$_POST['status'];
        $diagnosis= $_POST['diag'];
        $checkup= $_POST['checkup'];


           
        


        $sql_insert = "INSERT INTO Customer ( CustomerFName, CustomerLName, CustomerGender, CustomerTelephone, CustomerAddress, Status, Diagnosis, LastCheckupDate) VALUES ('$fname', '$lname', '$gender', '$number', '$location', '$status', '$diagnosis','$checkup')";
        $result_i=mysqli_query($conn,$sql_insert);
        if($result_i) {
            header("Location:customer.php?success=newcustomeradded");            
        }
        else{
            header("Location:add_customer.php?nosuccess&First=".$fname. "&Last=" .$lname."&Gender=" .$gender."&number=".$number."&locate=".$location. "&Status=".$status. "&diag=" .$diagnosis. "&check=".$checkup); 
        }
       }
}

     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
    <link rel="stylesheet" href="/final-melwinkle/css/sales.css">
   <link rel="stylesheet" href="/final-melwinkle/css/main.css">
   
   <style>

input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {
      color: #468847;
      background-color: #DFF0D8;
      border: 1px solid #D6E9C6;
    }

    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
      color: #B94A48;
      background-color: #F2DEDE;
      border: 1px solid #EED3D7;
    }

    .parsley-errors-list {
      margin: 2px 0 3px;
      padding: 0;
      list-style-type: none;
      font-size: 0.9em;
      line-height: 0.9em;
      opacity: 0;
      color: #B94A48;

      transition: all .3s ease-in;
      -o-transition: all .3s ease-in;
      -moz-transition: all .3s ease-in;
      -webkit-transition: all .3s ease-in;
    }

    .parsley-errors-list.filled {
      opacity: 1;
    }
</style>

</head>


<body>

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Bright Pharmacy</a>
     
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="/final-melwinkle/employee/employee_profile.php"><?php
      
        echo  "Welcome, ".$fname." ".$lname;  
     
    ?></a>

    
        </li>


      </ul>
    </nav>

    <div class="wrapper"  >
  <nav id="sidebar" aria-label="side">
<ul class="list-items">
<?php
$depart="SELECT DepartmentID from  Employee  where EmployeeID=$id";
$res=mysqli_query($conn,$depart);
$row_d=mysqli_fetch_assoc($res);

if($row_d['DepartmentID']==4){
  echo "<li><a href='/final-melwinkle/employee/administrator/administrator_dashboard.php'><i class='icon ion-md-home' size='large'></i> Dashboard</a></li>
  <li><a href='/final-melwinkle/employee/administrator/administrator_employee.php'><i class='icon ion-md-people' size='large'></i>Employee</a></li>
  <li><a href='/final-melwinkle/employee/administrator/administrator_messages.php'><i class='icon ion-md-mail' size='large'></i> Messages</a></li>";
}else{
  echo "<li><a href='/final-melwinkle/employee/employee_dashboard.php'><i class='icon ion-md-home' size='large'></i> Dashboard</a></li>
  <li><a href='/final-melwinkle/employee/employee_messages.php'><i class='icon ion-md-mail' size='large'></i> Messages</a></li>";
}
?>
<li><a href="/final-melwinkle/employee/employee_sales.php"><i class='icon ion-md-cash' size='large'></i> Sales</a></li>
<li><a href="/final-melwinkle/employee/employee_inventory.php"> <i class='icon ion-md-hammer' size='large'></i> Inventory</a></li>
<li><a href="/final-melwinkle/employee/customer/customer.php"> <i class='icon ion-md-people' size='large'></i> Customers</a></li>
<li><a href="/final-melwinkle/employee/employee_tests.php">  <i class='icon ion-md-clipboard' size='large'></i> Tests</a></li>
<li><a href="/final-melwinkle/employee/general_suppliers.php">  <i class='icon ion-md-basket' size='large'></i> Suppliers</a></li>
<li><a href='/final-melwinkle/employee/bin.php'><i class='icon ion-md-trash' size='large'></i> Bin</a></li>
</ul>
</nav>
  </div>


  <div class="row" style="padding-left:20%;padding-right:5px;margin-top:5%">
                    <h6 class="text-muted vb">
                            <a href="customer.php"><i class='icon ion-md-arrow-back' size='large'></i>BACK TO CUSTOMER
                            
                            </a>
                        </h6> 
                    </div>
<div style="margin-top:3%;margin-left:30%">
<div class="card-header" style="width:70%;background:rgb(6, 24, 9)">
  <h5 class=" info-color white-text text-center py-4" style="color:white">
    <strong>NEW CUSTOMER DETAILS</strong>
  </h5>
  </div>
<form class="form-control" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width:70% " data-parsley-validate>
<div class="md-form form-group mt-5">

<label for="fname">FIRST NAME</label><br>
<input  class="form-control" type="text" name="fname" id="fname" placeholder="First Name " required value='<?php if(isset($_GET['First'])){echo $_GET['First'];}?>' required data-parsley-pattern="^[a-ZA-Z'-]+$" data-parsley-trigger="keyup" data-parsley-error-message="Alphabets Only(A-Z) and symbols('-)"><br>


<label for="SaleID">LAST NAME</label><br>
<input  class="form-control" type="text" name="lname" id="SaleID" placeholder="First Name " value='<?php if(isset($_GET['Last'])){echo $_GET['Last'];}?>' required data-parsley-pattern="^[a-ZA-Z'-]+$" data-parsley-trigger="keyup" data-parsley-error-message="Alphabets Only(A-Z) and symbols('-)"><br>

<label for="gender">GENDER</label><br>
<select class="form-control" name="gender" id="gender" required>
<option name='product' id='product' value='<?php echo $_GET['Gender'];?>'><?php if(isset($_GET['Gender'])){echo $_GET['Gender'];}?></option>
<?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Customer' AND COLUMN_NAME = 'CustomerGender' ";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
       $type=$row['COLUMN_TYPE'];

       $output = str_replace("enum('", "", $type);

// $output will now be: Equipment','Set','Show
       $output = str_replace("')", "", $output);

       // array $results contains the ENUM values
       $results = explode("','", $output);

       for($i = 0; $i < count($results); $i++) {
           echo "<option name='product' id='product' value='$results[$i]'>$results[$i]</option>
       ";
       }
        
    }
    ?>
    
</select><br>


<label for="address">ADDRESS</label><br>
<input  class="form-control" type="text" name="locate" id="address" placeholder="Location(eg; Spintex) " value='<?php if(isset($_GET['locate'])){echo $_GET['locate'];}?>' data-parsley-pattern="^[a-ZA-Z0-9'-,]+$" data-parsley-trigger="keyup" data-parsley-error-message="Alphanumeric Only(A-Z) and symbols('-,)"><br>



<label for="datime">PHONE NUMBER</label><br>
<input   class="form-control"type="text" name="phone" id="datime" value='<?php if(isset($_GET['number'])){echo $_GET['number'];}?>' maxlength=10 data-parsley-pattern="^[0-9(10)]+$" data-parsley-trigger="keyup" data-parsley-error-message="Only Numbers(0-9)"><br>

<label for="status">STATUS</label><br>

<select class="form-control" name="status" id="status" required>
<option   value='<?php if(isset($_GET['Status'])){echo $_GET['Status'];}?>'><?php if(isset($_GET['Status'])){echo $_GET['Status'];}?><option>
<?php echo $_GET['locate'];?></option>
<?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Customer' AND COLUMN_NAME = 'Status' ";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
       $type=$row['COLUMN_TYPE'];

       $output = str_replace("enum('", "", $type);

// $output will now be: Equipment','Set','Show
       $output = str_replace("')", "", $output);

       // array $results contains the ENUM values
       $results = explode("','", $output);

       for($i = 0; $i < count($results); $i++){
           echo "<option name='product' id='product' value='$results[$i]'>$results[$i]</option>
       ";
       }
        
    }
    ?>
    
</select><br>



<label for="diag">DIAGNOSIS</label><br>
<select class="form-control" name="diag" id="diag" required>
<option name='product' id='product' value='<?php if(isset($_GET['diag'])){echo $_GET['diag'];}?>'><?php if(isset($_GET['diag'])){echo $_GET['diag'];}?></option>
<?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Customer' AND COLUMN_NAME = 'Diagnosis' ";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
       $type=$row['COLUMN_TYPE'];

       $output = str_replace("enum('", "", $type);

// $output will now be: Equipment','Set','Show
       $output = str_replace("')", "", $output);

       // array $results contains the ENUM values
       $results = explode("','", $output);

       for($i = 0; $i < count($results); $i++) {
           echo "<option name='product' id='product' value='$results[$i]'>$results[$i]</option>
       ";
       }
        
    }
    ?>
    
</select><br>


<label for="datime">LAST CHECK-UP DATE</label ><br>
<input   class="form-control" type="date" name="checkup" id="datime" value='<?php if(isset($_GET['check'])){echo $_GET['check'];}?>' required><br>






  
</div>


<button type="submit" class="btn btn-primary btn-lg" style="margin-left:30%;width:40%" name="add" >ADD</button>
</form>
</div>

   

<?php if (isset($_GET['success'])){
  swal("Hello world!");
}?>
    
    

    



</body>

</html>