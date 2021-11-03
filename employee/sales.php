<!-- This is to view all sales -->

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



    $salesid="SELECT SaleId from Sellsto  ORDER BY SaleId DESC LIMIT 1;";
    $res_sale=mysqli_query($conn,$salesid);
    $row_sale=mysqli_fetch_assoc($res_sale);
    $last_num=$row_sale['SaleId'];

    


    if(isset($_POST['add'])){
        $Saleid=$_POST["sale"];
        $Inventory=$_POST['inventory'];
        $Customer=$_POST['customer'];
        $Date=$_POST['date'];
        $quantity=$_POST['quantity'];
        $mode= $_POST['paymode'];


        $sql_invent="SELECT Price FROM Inventory  WHERE InventoryID='$Inventory'";
        $result=mysqli_query($conn,$sql_invent);
        $fee_sql="SELECT PaymentFee from Payment where PaymentMode='$mode'";
        $fee_result=mysqli_query($conn,$fee_sql);
        $fee=mysqli_fetch_array($fee_result);
        if($rows = mysqli_fetch_assoc($result)) {
            $bills=$quantity * $rows['Price'] +$fee[0];
            $bill=sprintf("%.2f", $bills);
       
            
        }


        $sql_customer="SELECT CustomerID,CustomerLname FROM Customer  WHERE CustomerFName='$Customer'";
        $result_c=mysqli_query($conn,$sql_customer);
        if($row_c = mysqli_fetch_assoc($result_c)) {
            $CustomerID= $row_c['CustomerID'];
            $CN=$Customer." ".$row_c['CustomerLname'];
        }


        $sql_m="SELECT InventoryName FROM Inventory ";
     $result_mod=mysqli_query($conn,$sql_m);
     $r_mod=mysqli_fetch_array($result_mod);
     $IN=$r_mod[0];

        $sql_insert="INSERT into Sellsto(SaleId,InventoryID,EmployeeID,CustomerID,DateofSale,PaymentMode,Bill,Quantity) values ('$Saleid','$Inventory','$id',$CustomerID,'$Date','$mode',$bill,$quantity)";
        $result_i=mysqli_query($conn,$sql_insert);
        if($result_i) {
          $reduce="SELECT NumberofItems from Inventory where InventoryID='$Inventory'";
          $red=mysqli_query($conn,$reduce);
          $redu=mysqli_fetch_array($red);
          $newquant=$redu[0]-$quantity;

          $upda="UPDATE Inventory set NumberofItems=$newquant where InventoryID='$Inventory'";
          $upda_r=mysqli_query($conn,$upda);
          if($upda_r){
            header("Location:employee_sales.php?success=newtransactionadded");      
          }else{
            header("Location:sales.php?nosuccess=newtransactionaddedei&SID=".$Saleid. "&Cid=" .$CustomerID."&Iid=" .$Inventory."&bill=".$bill."&pr=".$bill."&mode=".$mode."&Date=".$Date."&quantity=".$quantity."&CN=".$CN."&IN=".$IN); 
        }      
        }
        else{
            header("Location:sales.php?nosuccess=newtransactionadded&SID=".$Saleid. "&Cid=" .$CustomerID."&Iid=" .$Inventory."&bill=".$bill."&mode=".$mode."&Date=".$Date."&quantity=".$quantity."&CN=".$CN."&IN=".$IN); 
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
                            <a href="employee_sales.php"><i class='icon ion-md-arrow-back' size='large'></i>BACK TO SALES
                            
                            </a>
                        </h6> 
                   
                   
                    </div>
<div style="margin-top:3%;margin-left:30%">
<div class="card-header" style="width:70%;background:rgb(6, 24, 9)">
  <h5 class=" info-color white-text text-center py-4" style="color:white">
    <strong>NEW TRANSACTION DETAILS</strong>
  </h5>
  </div>
<form class="form-control" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width:70%" data-parsley-validate>
<div class="md-form form-group mt-5">

<label for="SaleID">SALE ID</label><br>
<input  class="form-control" type="text" name="sale" id="SaleID" placeholder="Last Sale ID:<?php echo $last_num;?> "  value='<?php if(isset($_GET['SID'])){echo $_GET['SID'];}?>' data-parsley-pattern="^[S0-9(3)]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter ID Properly(SALE ID(  eg S020)'><br>


<label for="inventory">ITEM</label><br>
<select class="form-control" name="inventory" id="inventory">
<option  value='<?php if(isset($_GET['IiD'])){echo $_GET['IiD'];}?>'><?php if(isset($_GET['IN'])){echo $_GET['IN'];}?></option>
    <?php 
     $sql_m="SELECT InventoryID,InventoryName FROM Inventory ";
     $result_mod=mysqli_query($conn,$sql_m);
     while($row_mod = mysqli_fetch_assoc($result_mod)) {
         echo "<option name='paymode' id='pay' value={$row_mod['InventoryID']}>{$row_mod['InventoryName']}</option>";
     }
    ?>
    
</select><br>


<label for="cust">CUSTOMER NAME</label><br>
<select class="form-control" name="customer" id="customer">
<option  value='<?php if(isset($_GET['Cid'])){echo $_GET['Cid'];}?>'><?php if(isset($_GET['CN'])){echo $_GET['CN'];}?></option>
    <?php 
     $sql_mod="SELECT CustomerFName,CustomerLName FROM Customer";
     $result_d=mysqli_query($conn,$sql_mod);
     while($row_d = mysqli_fetch_assoc($result_d)) {
         echo "<option name='customer' id='cust' value={$row_d['CustomerFName']}>".$row_d['CustomerFName']." ".$row_d['CustomerLName']."</option>";
     }
    ?>
    
</select><br>


<label for="datime">DATE</label><br>
<input   class="form-control"type="datetime-local" name="date" id="datime" value='<?php if(isset($_GET['Date'])){echo $_GET['Date'];}?>'><br>

<label for="pay">PAYMENT MODE</label><br>
<select class="form-control" name="paymode" id="pay">
<option  value='<?php if(isset($_GET['mode'])){echo $_GET['mode'];}?>'><?php if(isset($_GET['mode'])){echo $_GET['mode'];}?></option>
    <?php 
     $sql_mode="SELECT PaymentMode FROM Payment ";
     $result_m=mysqli_query($conn,$sql_mode);
     while($row_m = mysqli_fetch_assoc($result_m)) {
         echo "<option name='paymode' id='pay' value={$row_m['PaymentMode']}>{$row_m['PaymentMode']}</option>";
     }
    ?>
    
</select><br>





<label for="quantity">QUANTITY</label><br>
  <input class="form-control quantity" min="0" name="quantity" value="1" type="number" id="quantity" placeholder="Quantity"value='<?php if(isset($_GET['quantity'])){echo $_GET['quantity'];}?>' data-parsley-trigger="keyup" data-parsley-error-message='Quantity Cannot be 0'><br>

  
</div>


<button type="submit" class="btn btn-primary btn-lg" style="margin-left:30%;width:40%" name="add" >ADD</button>
</form>
</div>

   

<?php if (isset($_GET['success'])){
  swal("Hello world!");
}?>
    
    

    



</body>

</html>