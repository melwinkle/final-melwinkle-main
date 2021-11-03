<!-- Receive and approve messages -->


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 
session_start();
if(!($_SESSION["loggedin"])){
    header("Location:index.php");
}


require_once("connection.php");
$id=$_SESSION['id'];


$sqls= "SELECT * FROM Employee WHERE EmployeeID = '$id'";
$name = mysqli_query($conn,$sqls);
$rowname=mysqli_fetch_assoc($name);

$fname=$rowname['EmployeeFname'];
$lname=$rowname['EmployeeLname'];







if(isset($_GET['approve'])){
  $mid=$_POST['id'];

  $approve="UPDATE Message_Requests set RequestStatus='PROCESSED' where MessageID=$mid";
$query=mysqli_query($conn,$approve);
if ($query){
    header("Location: administrator_messages.php?approved&mid={$mid}");
}
else{
    header("Location: administrator_messages.php?notpproved&mid={$mid}");
}
}


if(isset($_GET['deny'])){
  $mid=$_POS['id'];

  $approve="UPDATE Message_Requests set RequestStatus='DENIED' where MessageID=$mid";
$query=mysqli_query($conn,$approve);
if ($query){
    header("Location: administrator_messages.php?denied&mid={$mid}");
}
else{
    header("Location: administrator_messages.php?notdenied&mid={$mid}");
}
}

if(isset($_GET['complete'])){
  $mid=$_POST['id'];

  $approve="UPDATE Message_Requests set RequestStatus='COMPLETED' where MessageID=$mid";
$query=mysqli_query($conn,$approve);
if ($query){
    header("Location: administrator_messages.php?completed&mid={$mid}");
}
else{
    header("Location: administrator_messages.php?notcompleted&mid={$mid}");
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Messages </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2.min.css">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="sweetalert2.all.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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

 
          








<!-- Modal -->

<table id="dtBasicExample" class="table table-hover " style="width:80%;margin-left:19%;margin-right:4%;background:#fff;margin-top:5%">

<thead>
  <tr>
    
    <th scope="col">MessageID
    </th>
    <th scope="col">Employee Name
    </th>
    <th scope="col">Type
    </th>
    <th scope="col">Message
    </th>
    <th scope="col">Status
    </th>
    <th scope="col">Actions
    </th>
    
   

  </tr>
</thead>
<tbody>
 
      <?php
      $sql_sell="SELECT * FROM Message_Requests ";
      $res_sell=mysqli_query($conn,$sql_sell);
      
      while($row_s=mysqli_fetch_assoc($res_sell)){
          $MID=$row_s['MessageID'];
          $ID=$row_s['EmployeeID'];
          $Type= $row_s['RequestType'];
          $Message=$row_s['MainMessage'];
          $Status=$row_s['RequestStatus'];
      echo "
      <tr scope='row'>
      <td>$MID</td>
      <td>$ID</td>
      <td>$Type</td>
      <td>$Message</td>
      <td>$Status</td>";
      


      if($Status=="PENDING"){
        echo "<td><button type='button' class='btn btn-success' data-toggle='modal' data-target='#approve_$MID'>
        Approve<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete_$MID'>
      Deny<i class='icon ion-md-close-circle-outline' size='large'></i>
    </button></td>"
        
      ;
      }
      else if ($Status=="PROCESSED"){
        echo "<td><button type='button' class='btn btn-success' data-toggle='modal' data-target='#complete_$MID'>
        COMPLETED<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
      </button>
      </td>"
        
      ;
      }
      else if($Status=="DENIED"){
        echo "<td></td>";
      }
      else{
        echo "<td></td>";
      }

      
include("admin_update.php");
     echo " </tr>\n";



      }
      ?>
  

  

</tbody>

</table>
</div>  



<?php
if(isset($_GET['approved'])){
  $sid=$_GET['mid'];
  echo "<script>swal('{$sid} Approved!')</script>";
}
else if(isset($_GET['completed'])){
  $sid=$_GET['mid'];
  echo "<script>swal('{$sid} Completed!')</script>";
}
else if(isset($_GET['denied'])){
  $sid=$_GET['mid'];
  echo "<script>swal('{$sid} Denied!')</script>";
}
?>

    </body>
</html>