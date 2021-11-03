<!-- This is for viewing all inventory items -->

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



    $inventoryid="SELECT InventoryID from Inventory where InventoryID LIKE 'M%' ORDER BY InventoryID DESC LIMIT 1 ";
    $res_inventory=mysqli_query($conn,$inventoryid);
    $row_inventory=mysqli_fetch_assoc($res_inventory);
    $last_num=$row_inventory['InventoryID'];

    


    if(isset($_POST['add'])){
        $Inventoryid=$_POST["inventoryid"];
        $Inventory_name=$_POST['inventoryname'];
        $Expiry_date=$_POST['expirydate'];
        $Suppliers_id=$_POST['supplier'];
        $Number_items=$_POST['quantity'];
        $price= $_POST['price'];
        $product= $_POST['product'];
        $brand=$_POST['brand'];

   

        $sql_m="SELECT CompanyName FROM suppliers where SuppliersID='$Suppliers_id'";
        $result_mod=mysqli_query($conn,$sql_m);
        $r_mod=mysqli_fetch_array($result_mod);
        $SN=$r_mod[0];
      


        $sql_insert="INSERT into Inventory(InventoryID,InventoryName,ExpiryDate,SuppliersID,NumberofItems,Price) values ('$Inventoryid','$Inventory_name','$Expiry_date','$Suppliers_id',$Number_items,$price)";
        $result_i=mysqli_query($conn,$sql_insert);
        if($result_i) {
            $sql_supp="SELECT ProductType from suppliers where SuppliersID='$Suppliers_id'";
            $supp_result=mysqli_query($conn,$sql_supp);
            $supp_row=mysqli_fetch_assoc($supp_result);
            if($supp_row['ProductType']=="Medicine"){
                
                $sql_inser="INSERT into Medicine(InventoryID,MedicineType) values ('$Inventoryid','$product')";
                $sq_result=mysqli_query($conn,$sql_inser);
                if($sq_result){
                    header("Location:employee_inventory.php?msuccess=newinventoryadded");        
                    
                }
                else{
                    header("Location:inventory.php?mnosuccess&EID=".$Inventoryid. "&InventoryName=" .$Inventory_name."&ED=" .$Expiry_date."&SID=".$Suppliers_id."&NI=".$Number_items. "&Price=".$price."&SN=".$SN); 
                }
            }
                
        }
        else{
            header("Location:inventory.php?nosuccess&EID=".$Inventoryid. "&InventoryName=" .$Inventory_name."&ED=" .$Expiry_date."&SID=".$Suppliers_id."&NI=".$Number_items. "&Price=".$price."&SN=".$SN); 
        }
       }
}

     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales</title>
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
                            <a href="employee_inventory.php"><i class='icon ion-md-arrow-back' size='large'></i>BACK TO INVENTORY
                            
                            </a>
                        </h6> 
                   
                   
                    </div>
<div style="margin-top:3%;margin-left:30%">
<div class="card-header" style="width:70%;background:rgb(6, 24, 9)">
  <h5 class=" info-color white-text text-center py-4" style="color:white">
    <strong>NEW MEDICINE DETAILS</strong>
  </h5>
  </div>
<form class="form-control" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width:70%" data-parsley-validate>
<div class="md-form form-group mt-5">

<label for="inventoryid">INVENTORY ID</label><br>
<input  class="form-control" type="text" name="inventoryid" id="inventoryid" placeholder="Last INVENTORY ID:<?php echo $last_num;?> " data-parsley-pattern="^[M0-9(3)]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter ID Properly(INVENTORY NAME( M for Medicine eg M020)' value='<?php if(isset($_GET['EID'])){echo $_GET['EID'];}?>'><br>


<label for="inventory">INVENTORY NAME</label><br>
<input  class="form-control" type="text" name="inventoryname" id="inventory" placeholder="Inventory Name" data-parsley-pattern="^[a-zA-Z0-9:- ]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter  Name Properly' value='<?php if(isset($_GET['InventoryName'])){echo $_GET['InventoryName'];}?>'><br>


<label for="date">EXPIRY DATE</label><br>
<input   class="form-control"type="date" name="expirydate" id="date" value='<?php if(isset($_GET['ED'])){echo $_GET['ED'];}?>'><br>

<label for="product">TYPE</label><br>
<select class="form-control" name="product" id="product">
<option  value='<?php if(isset($_GET['Type'])){echo $_GET['Type'];}?>'><?php if(isset($_GET['Type'])){echo $_GET['Type'];}?></option>

    <?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Medicine' AND COLUMN_NAME = 'MedicineType' ";
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

<label for="supp">SUPPLIER</label><br>
<select class="form-control" name="supplier" id="supp">
<option  value='<?php if(isset($_GET['SID'])){echo $_GET['SID'];}?>'><?php if(isset($_GET['SN'])){echo $_GET['SN'];}?></option>
    <?php 
     $sql_m="SELECT SuppliersID,CompanyName FROM suppliers where ProductType='Medicine'";
     $result_mod=mysqli_query($conn,$sql_m);
     while($row_mod = mysqli_fetch_assoc($result_mod)) {
         echo "<option name='supplier' id='supp' value={$row_mod['SuppliersID']}>{$row_mod['CompanyName']}</option>";
     }
    ?>
    
</select><br>










<label for="quantity">QUANTITY</label><br>
  <input class="form-control quantity" min="0" name="quantity" value="0" type="number" id="quantity" placeholder="Quantity"  data-parsley-trigger="keyup" data-parsley-error-message='Quantity Cannot be 0' value='<?php if(isset($_GET['NI'])){echo $_GET['NI'];}?>'><br>

  
  <label for="price">PRICE(GHC)</label><br>
  <input class="form-control quantity" min="0" name="price" value="0" type="number" id="price" placeholder="Price(Ghc)" data-parsley-trigger="keyup" data-parsley-error-message='Quantity Cannot be 0' value='<?php if(isset($_GET['Price'])){echo $_GET['Price'];}?>'><br>
</div>

<button type="submit" class="btn btn-primary btn-lg" style="margin-left:30%;width:40%" name="add" >ADD</button>
</form>
</div>

   


    
    

    



</body>

</html>