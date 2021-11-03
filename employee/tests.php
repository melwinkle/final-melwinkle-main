
<!-- This is to view all tests -->
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
    else{
        header("Location: employee_log_in.php");
    }



   

    


    if(isset($_POST['add'])){
        $Inventory=$_POST['inventoryid'];
        $Customer=$_POST['customer'];
        $Date=$_POST['date'];
        $mode=$_POST['mode'];
        $bill= $_POST['bill'];



        $sql_mod="SELECT CustomerFName,CustomerLName FROM Customer where CustomerID=$Customer";
        $result_d=mysqli_query($conn,$sql_mod);
        $name=mysqli_fetch_array($result_d);
        $CN=$name[0]." ".$name[1];
        $sql_invent="SELECT * FROM Payment  WHERE PaymentMode='$mode'";
        $result=mysqli_query($conn,$sql_invent);
        if($rows = mysqli_fetch_assoc($result)) {
            $bills=$bill + $rows['PaymentFee'];
       
            
        }



        $sql_insert="INSERT into Administers(InventoryID,EmployeeID,CustomerID,DateAdministered,Bill,Payment) values ('$Inventory',$id,'$Customer','$Date',$bills,'$mode')";
        $result_i=mysqli_query($conn,$sql_insert);
        if($result_i) {
          $reduce="SELECT NumberofItems from Inventory where InventoryID='$Inventory'";
          $red=mysqli_query($conn,$reduce);
          $redu=mysqli_fetch_array($red);
          $newquant=$redu[0]-1;
          $upda="UPDATE Inventory set NumberofItems=$newquant where InventoryID='$Inventory'";
          $upda_r=mysqli_query($conn,$upda);
          if($upda_r){
            header("Location:employee_tests.php?success=newtransactionadded");            
        }else{
          header("Location:tests.php?nosuccess=newtransactionadded&EID=".$Inventory. "&Cid=" .$Customer."&date=" .$Date."&bill=".$bill."&mode=$mode"."&CN=".$CN); 
      }
      }
        else{
            header("Location:tests.php?nosuccess=newtransactionadded&EID=".$Inventory. "&Cid=" .$Customer."&date=" .$Date."&bill=".$bill."&mode=$mode"."&CN=".$CN); 
        }
       }
}

     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>

   <link rel="stylesheet" href="/final-melwinkle/css/main.css">
   <link rel="stylesheet" href="/final-melwinkle/css/sales.css">

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
    

    if($_SESSION["loggedin"]){
    $id=$_SESSION["id"];
    $sql="SELECT EmployeeFname,EmployeeLname FROM Employee inner join Employee_Log_in ON Employee.EmployeeID=Employee_Log_in.EmployeeID WHERE Employee.EmployeeID='$id'";
    $report ="SELECT * from Employee_Time where EmployeeID='$id'";
    $reports=mysqli_query($conn,$report);
    $results=mysqli_query($conn,$sql);

    
    

      if($fname && $lname) {
        echo  "Welcome, ".$fname." ".$lname;
      }
      else {
        echo "Employee";
      }
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
                    <!--col -->
                 
                    <h6 class="text-muted vb">
                            <a href="employee_tests.php"><i class='icon ion-md-arrow-back' size='large'></i>BACK To Tests
                            
                            </a>
                        </h6> 
                   
                   
                    </div>
<div style="margin-top:3%;margin-left:30%">
<div class="card-header" style="width:70%;background:rgb(6, 24, 9)">
  <h5 class=" info-color white-text text-center py-4" style="color:white">
    <strong>NEW TEST DETAILS</strong>
  </h5>
  </div>
<form class="form-control" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width:70%" data-parsley-validate>
<div class="md-form form-group mt-5">

<label for="inventory">INVENTORY ID</label><br>
<select class="form-control" name="inventoryid" id="inventory" required>
<option  value='<?php if(isset($_GET['EID'])){echo $_GET['EID'];}?>'><?php if(isset($_GET['EN'])){echo $_GET['EN'];}?></option>
    <?php 
     $sql_m="SELECT Tests.InventoryID,InventoryName FROM Inventory inner join Tests on Tests.InventoryID=Inventory.InventoryID ";
     $result_mod=mysqli_query($conn,$sql_m);
     while($row_mod = mysqli_fetch_assoc($result_mod)) {
         echo "<option name='inventoryid' id='pay' value={$row_mod['InventoryID']}>{$row_mod['InventoryName']}</option>";
     }
    ?>
    
</select><br>


<label for="cust">CUSTOMER NAME</label><br>
<select class="form-control" name="customer" id="customer" required>
<option  value='<?php if(isset($_GET['Cid'])){echo $_GET['Cid'];}?>'><?php if(isset($_GET['CN'])){echo $_GET['CN'];}?></option>
    <?php 
     $sql_mod="SELECT CustomerID,CustomerFName,CustomerLName FROM Customer";
     $result_d=mysqli_query($conn,$sql_mod);
     while($row_d = mysqli_fetch_assoc($result_d)) {
         echo "<option name='customer' id='cust' value={$row_d['CustomerID']}>".$row_d['CustomerFName']." ".$row_d['CustomerLName']."</option>";
     }
    ?>
    
</select><br>



<label for="datime">DATE ADMINISTERED</label><br>
<input   class="form-control"type="datetime-local" name="date" id="datime" required value='<?php if(isset($_GET['date'])){echo $_GET['date'];}?>' ><br>

<label for="pay">PAYMENT MODE</label><br>
<select class="form-control" name="mode" id="pay" required>
<option  value='<?php if(isset($_GET['mode'])){echo $_GET['mode'];}?>'><?php if(isset($_GET['mode'])){echo $_GET['mode'];}?></option>
    <?php 
     $sql_mode="SELECT PaymentMode FROM Payment ";
     $result_m=mysqli_query($conn,$sql_mode);
     while($row_m = mysqli_fetch_assoc($result_m)) {
         echo "<option name='paymode' id='pay' value={$row_m['PaymentMode']}>{$row_m['PaymentMode']}</option>";
     }
    ?>
    
</select><br>





<label for="quantity">BILL (GHC)</label><br>
  <input class="form-control quantity" min="0" name="bill" value="0" type="number" id="quantity" placeholder="Quantity" value='<?php if(isset($_GET['bill'])){echo $_GET['bill'];}?>'data-parsley-pattern="^[0-9]+$" data-parsley-trigger="keyup" data-parsley-error-message='Numbers Only'><br>

  
</div>


<button type="submit" class="btn btn-primary btn-lg" style="margin-left:30%;width:40%" name="add" >ADD</button>
</form>
</div>

   


    
    

    



</body>

</html>