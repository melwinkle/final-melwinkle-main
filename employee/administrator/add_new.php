
     <!-- This is the php file for adding a new employee in Pharmacy or Administrator -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 
session_start();
if(!($_SESSION["loggedin"])){
    header("Location:index.php");
}

require_once("../../employee/connection.php");

$id=$_SESSION['id'];


$sqls= "SELECT * FROM Employee WHERE EmployeeID = '".$_SESSION['id']."'";
$name = mysqli_query($conn,$sqls);
$rowname=mysqli_fetch_assoc($name);

$fname=$rowname['EmployeeFname'];
$lname=$rowname['EmployeeLname'];








?>
     
      <!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>

   <link rel="stylesheet" href="../../css/main.css">
   <link rel="stylesheet" href="../../css/sales.css">

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
          <a class="nav-link" href="../../employee/employee_profile.php"><?php
    

   

    
    

      if($fname && $lname) {
        echo  "Welcome, ".$fname." ".$lname;
      }
      else {
        echo "Employee";
      }
    
    ?></a>

    
        </li>


      </ul>
    </nav>

    <div class="wrapper"  >
  <nav id="sidebar" aria-label="side">
<ul class="list-items">


<li><a href='../../employee/administrator/administrator_dashboard.php'><i class='icon ion-md-home' size='large'></i> Dashboard</a></li>
<li><a href="../../employee/administrator/administrator_employee.php">  <i class='icon ion-md-people' size='large'></i> Employees</a></li>
<li><a href="../../employee/administrator/administrator_messages.php">  <i class='icon ion-md-mail' size='large'></i> Messages</a></li>
<li><a href="../../employee/employee_sales.php"><i class='icon ion-md-cash' size='large'></i> Sales</a></li>
<li><a href="../../employee/employee_inventory.php"> <i class='icon ion-md-hammer' size='large'></i> Inventory</a></li>
<li><a href="../../employee/customer/customer.php"> <i class='icon ion-md-people' size='large'></i> Customers</a></li>
<li><a href="../../employee/employee_tests.php">  <i class='icon ion-md-clipboard' size='large'></i> Tests</a></li>
<li><a href="../../employee/general_suppliers.php">  <i class='icon ion-md-basket' size='large'></i> Suppliers</a></li>
<li><a href='../../employee/bin.php'><i class='icon ion-md-trash' size='large'></i> Bin</a></li>
</ul>
</nav>
  </div>


  <div class="row" style="padding-left:20%;padding-right:5px;margin-top:5%">
                    <!--col -->
                 
                    <h6 class="text-muted vb">
                            <a href="administrator_employee.php"><i class='icon ion-md-arrow-back' size='large'></i>BACK TO EMPLOYEE
                            
                            </a>
                        </h6> 
                   
                   
                    </div>
      <div  style="margin-left:30%">
      <div class="card-header" style="width:85%;background:rgb(6, 24, 9)">
  <h5 class=" info-color white-text text-center py-4" style="color:white">
    <strong>NEW EMPLOYEE</strong>
  </h5>
  </div>
      </div>
      
      <!-- Modal body -->
      <div  style="margin-left:30%;width:60%">
      <form class="form-control" method="post" action="add_e.php" data-parsley-validate>
         <label for="">First Name</label><br>
        <input class="form-control" type="text" placeholder="First Name" name='fname'  data-parsley-pattern="^[a-zA-Z'-]+$" data-parsley-trigger="keyup" data-parsley-error-message="Name contains Alphabets (A-Za-z) and symbols ('-)"><br>




        <label for="">Last Name</label><br>
        <input class="form-control" type="text" placeholder="Last Name" name='lname' required data-parsley-pattern="^[a-zA-Z'-]+$" data-parsley-trigger="keyup" data-parsley-error-message="Name contains Alphabets (A-Za-z) and symbols ('-)"><br>

        <label for="">Date of Birth</label><br>
        <input class="form-control" type="date" placeholder="DOB"  name='dob' required><br>


        <label for="">Gender</label><br>
        <select class="form-control" name="gender" id="gender" required>

<?php 
  $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Employee' AND COLUMN_NAME = 'EmployeeGender' ";
  $result=mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result)) {
     $type=$row['COLUMN_TYPE'];

     $output = str_replace("enum('", "", $type);

// $output will now be: Equipment','Set','Show
     $output = str_replace("')", "", $output);

     // array $results contains the ENUM values
     $results = explode("','", $output);

     for($i = 0; $i < count($results); $i++) {
         echo "<option  value='$results[$i]'>$results[$i]</option>
     ";
     }
      
  }
  ?>
  
</select><br>

<label for="">Address</label><br>
        <input class="form-control" type="text" placeholder="Address"  name='address' required data-parsley-pattern="^[a-zA-Z0-9'-, ]+$" data-parsley-trigger="keyup" data-parsley-error-message="Name contains Alphanuemric characters (A-Za-z,0-9) and symbols ('-,)"><br>


        <label for="">Department</label><br>
        <select class="form-control" name="department" id="department" required>
        <option value=1>Pharmacy</option>
        <option value=4>Administrator</option>

  
</select><br>


<label for="">Telephone 1</label><br>
        <input class="form-control" type="text" placeholder="Telephone 1"  maxlength=10 name='tel' required data-parsley-pattern="^[0-9(10)]+$" data-parsley-trigger="keyup" data-parsley-error-message="Contains Numbers only from 0-9 and of length 10"><br>


        <label for="">Telephone 2</label><br>
        <input class="form-control" type="text" placeholder="Telephone 2"   maxlength=10 name='tel1' data-parsley-pattern="^[0-9(10)]+$" data-parsley-trigger="keyup" data-parsley-error-message="Contains Numbers only from 0-9 and of length 10"><br>


        <label for="">Employment Status</label><br>
        <select class="form-control" name="status" id="status" required>

<?php 
  $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Employee' AND COLUMN_NAME = 'EmployeeStatus' ";
  $result=mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result)) {
     $type=$row['COLUMN_TYPE'];

     $output = str_replace("enum('", "", $type);

// $output will now be: Equipment','Set','Show
     $output = str_replace("')", "", $output);

     // array $results contains the ENUM values
     $results = explode("','", $output);

     for($i = 0; $i < count($results); $i++) {
         echo "<option name='status' id='status' value='$results[$i]'>$results[$i]</option>
     ";
     }
      
  }
  ?>
  
</select><br>


<label for="">Employment Date</label><br>
<input class="form-control" type="date" name="employment" placeholder="Employment Date" name='date' required><br>

<label for="">Shift Time</label><br>
        <input class="form-control" type="time" placeholder="Shift Time" name='shift' required><br>
    
      
     
     
     
     
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" style="margin-left:20%;width:35%" name='submit'>ADD </button>
      </div>
      </div>
      </form>




</body>

</html>