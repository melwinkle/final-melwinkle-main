<!-- Send message requests to admin concerning profile or customers or inventory  --><!-- Receive and approve messages -->


<?php

session_start();

if(!($_SESSION["loggedin"])){
    header("Location:index.php");
}
require_once("connection.php");


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
    <title>Messages </title>
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="sweetalert2.min.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
<script src="https://code.jquery.com/jquery-3.5.1.js
"></script>
   <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>

    



    </style>
   
   <link rel="stylesheet" href="../../css/main.css">
   <link rel="stylesheet" href="../../css/sales.css">
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

      
    
    
  
    ?>
    
    </a>

    
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
  <li><a href='../../employee/administrator/administrator_messages.php'><i class='icon ion-md-mail' size='large'></i> Messages</a></li>
  <li><a href='../../employee/employee_sales.php'><i class='icon ion-md-cash' size='large'></i> Sales</a></li>
  <li><a href='../../employee/employee_inventory.php'> <i class='icon ion-md-hammer' size='large'></i> Inventory</a></li>
  <li><a href='../../employee/customer/customer.php'> <i class='icon ion-md-people' size='large'></i> Customers</a></li>
  <li><a href='../../employee/employee_tests.php'>  <i class='icon ion-md-clipboard' size='large'></i> Tests</a></li>
  <li><a href='../../employee/general_suppliers.php'>  <i class='icon ion-md-basket' size='large'></i> Suppliers</a></li>
  <li><a href='../../employee/bin.php'><i class='icon ion-md-trash' size='large'></i> Bin</a></li>";




}else if($row_d['DepartmentID']==1){
  echo "<li><a href='../../employee/employee_dashboard.php'><i class='icon ion-md-home' size='large'></i> Dashboard</a></li>
  <li><a href='../../employee/employee_messages.php'><i class='icon ion-md-mail' size='large'></i> Messages</a></li>
  <li><a href='../../employee/employee_sales.php'><i class='icon ion-md-cash' size='large'></i> Sales</a></li>
  <li><a href='../../employee/employee_inventory.php'> <i class='icon ion-md-hammer' size='large'></i> Inventory</a></li>
  <li><a href='../../employee/customer/customer.php'> <i class='icon ion-md-people' size='large'></i> Customers</a></li>
  <li><a href='../../employee/employee_tests.php'>  <i class='icon ion-md-clipboard' size='large'></i> Tests</a></li>
  <li><a href='../../employee/general_suppliers.php'>  <i class='icon ion-md-basket' size='large'></i> Suppliers</a></li>
  <li><a href='../../employee/bin.php'><i class='icon ion-md-trash' size='large'></i> Bin</a></li>";


  

 
}
else{
  echo "  <li><a href='../../employee/employee_dashboard_1.php'><i class='icon ion-md-home' size='large'></i> Dashboard</a></li>
  <li><a href='../../employee/employee_messages.php'><i class='icon ion-md-mail' size='large'></i> Messages</a></li>
  <li><a href='../../employee/bin.php'><i class='icon ion-md-trash' size='large'></i> Bin</a></li>


<li><a href='../../employee/employee_log_out.php'>  <i class='icon ion-md-power' size='large'></i> LOG OUT</a></li>";
}

?>

</ul>
</nav>
  </div>


 
          


 
 
<div style="margin-top:5%;margin-left:19%;color:black"><div class="card-header" style="width:80%;background:rgb(6, 24, 9)">
  <h5 class=" info-color white-text text-center py-4" style="color:white">
    <strong>INACTIVE SUPPLIERS</strong>
  </h5>
  </div>



<table id="dtBasicExample" class="table table-hover " style="width:80%;margin-right:4%;background:#fff">

<thead>
  <tr>
    
    <th scope="col"> Supplier ID
    </th>
    <th scope="col">Supplier Name
    </th>
<?php
    if($row_d['DepartmentID']==4){
   echo" <th scope='col'>Action
    </th>";
    }
 ?>
    </th>
   

  </tr>
</thead>
<tbody>
 
      <?php
      $sql_sell="SELECT * FROM  suppliers   where CompanyStatus='TERMINATED' ";
      $res_sell=mysqli_query($conn,$sql_sell);
      
      while($row_s=mysqli_fetch_assoc($res_sell)){
          $SID=$row_s['SuppliersID'];
          $SB=$row_s['CompanyName'];
         
          
      echo "
      <tr scope='row'>
      <td>$SID</td>
      <td>$SB</td>";

      if($row_d['DepartmentID']==4){
     echo" <td>
      <button type='button' class='btn btn-success' data-toggle='modal' data-target='#restorer_".$SID."'>
      RESTORE<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
    </button>
    </td>";
      }
      include("update_e.php");
      echo "
      </tr>\n";
      }
      ?>
    
 
  

</tbody>

</table>





</div>  

<div style="margin-left:19%;color:black"><div class="card-header" style="width:80%;background:rgb(6, 24, 9)">
  <h5 class=" info-color white-text text-center py-4" style="color:white">
    <strong>INACTIVE CUSTOMERS</strong>
  </h5>
  </div>



<table id="dtBasicExample" class="table table-hover " style="width:80%;margin-right:4%;background:#fff">

<thead>
  <tr>
    
    <th scope="col"> Customer ID
    </th>
    <th scope="col">Customer Name
    </th>
    <?php
    if($row_d['DepartmentID']==4){
   echo" <th scope='col'>Action
    </th>";
    }
 ?>
  
 
    </th>
   

  </tr>
</thead>
<tbody>
 
      <?php
      $sql_sell="SELECT * FROM Customer where CustomerStatus='INACTIVE' ";
      $res_sell=mysqli_query($conn,$sql_sell);
      
      while($row_s=mysqli_fetch_assoc($res_sell)){
          $SID=$row_s['CustomerID'];
          $SB=$row_s['CustomerFName'];
          $SP=$row_s["CustomerLName"];
          
      echo "
      <tr scope='row'>
      <td>$SID</td>
      <td>$SB $SP</td>";
      if($row_d['DepartmentID']==4){
        echo" <td>
         <button type='button' class='btn btn-success' data-toggle='modal' data-target='#restore_".$SID."'>
         RESTORE<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
       </button>
       </td>";
         }
   include("update_e.php");
         echo "
      </tr>\n";
      }
      ?>
    
 
  

</tbody>

</table>





</div>  

<div style="margin-left:19%;color:black"><div class="card-header" style="width:80%;background:rgb(6, 24, 9)">
  <h5 class=" info-color white-text text-center py-4" style="color:white">
    <strong>UNAVAILABLE ITEMS</strong>
  </h5>
  </div>



<table id="dtBasicExample" class="table table-hover " style="width:80%;margin-right:4%;background:#fff">

<thead>
  <tr>
    
    <th scope="col"> Inventory ID
    </th>
    <th scope="col">Inventory Name
    </th>
    <?php
    if($row_d['DepartmentID']==4){
   echo" <th scope='col'>Action
    </th>";
    }
 ?>
  
 
    </th>
   

  </tr>
</thead>
<tbody>
 
      <?php
      $sql_sell="SELECT * FROM Inventory where Status='Unavailable' ";
      $res_sell=mysqli_query($conn,$sql_sell);
      
      while($row_s=mysqli_fetch_assoc($res_sell)){
          $SID=$row_s['InventoryID'];
          $SB=$row_s['InventoryName'];

          
      echo "
      <tr scope='row'>
      <td>$SID</td>
      <td>$SB </td>";
      if($row_d['DepartmentID']==4){
        echo" <td>
         <button type='button' class='btn btn-success' data-toggle='modal' data-target='#restorei_".$SID."'>
         RESTORE<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
       </button>
       </td>";
         }
   include("update_e.php");
         echo "
      </tr>\n";
      }
      ?>
    
 
  

</tbody>

</table>





</div>  
<script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>




<?php
if($_GET['restored']){
  ?>

    <script>swal('RESTORED!')</script>;
    <?php
}
?>
    </body>
</html>