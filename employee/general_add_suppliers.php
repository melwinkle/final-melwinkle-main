<!-- This is for the adding a new supplier -->

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



    $inventoryid="SELECT SuppliersID from suppliers ORDER BY SuppliersID DESC LIMIT 1; ";
    $res_inventory=mysqli_query($conn,$inventoryid);
    $row_inventory=mysqli_fetch_assoc($res_inventory);
    $last_num=$row_inventory['SuppliersID'];

    


    if(isset($_POST['add'])){
        $Supplierid=$_POST["supplierid"];
        $Supplier_name=$_POST['companyname'];
        $Locate=$_POST['location'];
        $phone=$_POST['phone'];
        $type=$_POST['type'];
       

   


      


        $sql_insert="INSERT into suppliers(SuppliersID,CompanyName,CompanyLocation,TelephoneNumber,ProductType) values ('$Supplierid','$Supplier_name','$Locate','$phone','$type')";
        $result_i=mysqli_query($conn,$sql_insert);
        if($result_i) {
           
                    header("Location:general_suppliers.php?success=newinventoryadded");        
                    
                }
                else{
                    header("Location:general_add_suppliers.php?nosuccess&SID=".$Supplierid. "&CompanyName=" .$Suppliername."&Location=" .$Location."&phone=".$Sphone."&type=".$type); 
                }
            
       }
}

     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Suppliers</title>
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
<?php
$depart="SELECT DepartmentID from  Employee  where EmployeeID=$id";
$res=mysqli_query($conn,$depart);
$row_d=mysqli_fetch_assoc($res);

if($row_d['DepartmentID']==4){
  echo "<li><a href='../../employee/administrator/administrator_dashboard.php'><i class='icon ion-md-home' size='large'></i> Dashboard</a></li>
  <li><a href='../../employee/administrator/administrator_employee.php'><i class='icon ion-md-people' size='large'></i>Employee</a></li>
  <li><a href='../../employee/administrator/administrator_messages.php'><i class='icon ion-md-mail' size='large'></i> Messages</a></li>";
}else{
  echo "<li><a href='../../employee/employee_dashboard.php'><i class='icon ion-md-home' size='large'></i> Dashboard</a></li>
  <li><a href='../../employee/employee_messages.php'><i class='icon ion-md-mail' size='large'></i> Messages</a></li>";
}

?>
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
                            <a href="general_suppliers.php"><i class='icon ion-md-arrow-back' size='large'></i>BACK TO SUPPLIERS
                            
                            </a>
                        </h6> 
                   
                   
                    </div>
<div style="margin-top:3%;margin-left:30%">
<div class="card-header" style="width:70%;background:rgb(6, 24, 9)">
  <h5 class=" info-color white-text text-center py-4" style="color:white">
    <strong>NEW SUPPLIER DETAILS</strong>
  </h5>
  </div>
<form class="form-control" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width:70%" data-parsley-validate>
<div class="md-form form-group mt-5">

<label for="inventoryid">SUPPLIER ID</label><br>
<input  class="form-control" type="text" name="supplierid" id="inventoryid" placeholder="Last Supplier ID:<?php echo $last_num;?> " data-parsley-pattern="^[S0-9(2)]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter ID Properly(`SUPPLIER` NAME( S for Supplier eg S06)' value='<?php if(isset($_GET['SID'])){echo $_GET['SID'];}?>'><br>


<label for="inventory">COMPANY NAME</label><br>
<input  class="form-control" type="text" name="companyname" id="inventory" placeholder="Company Name" data-parsley-pattern="^[a-zA-Z0-9:- ]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter Company Name Properly' value='<?php if(isset($_GET['CompanyName'])){echo $_GET['CompanyName'];}?>'><br>


<label for="date">LOCATION</label><br>
<input  class="form-control" type="text" name="location" id="inventory" placeholder="Location" data-parsley-pattern="^[a-zA-Z0-9:- ]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter Location Properly' value='<?php if(isset($_GET['Location'])){echo $_GET['Location'];}?>'><br>


    


<label for="quantity">PHONE NUMBER</label><br>
  <input class="form-control quantity"  name="phone"  type="text" id="quantity" placeholder="Telephone number(0302,02)" data-parsley-maxlength="10" data-parsley-trigger="keyup" data-parsley-error-message='Enter Number properly' value='<?php if(isset($_GET['phone'])){echo $_GET['phone'];}?>'><br>

  
  <label for="product">PRODUCT TYPE</label><br>
  <select class="form-control" name="type" id="product" required>
  <option  value='<?php if(isset($_GET['type'])){echo $_GET['type'];}?>'><?php if(isset($_GET['type'])){echo $_GET['type'];}?></option>
    <?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'suppliers' AND COLUMN_NAME = 'ProductType' ";
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
</div>


<button type="submit" class="btn btn-primary btn-lg" style="margin-left:30%;width:40%" name="add" >ADD</button>
</form>
</div>

   


    
    

    


</body>

</html>