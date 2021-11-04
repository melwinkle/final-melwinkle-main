<!-- This is to view all the items in the inventory -->
<?php
     session_start();
     require_once("../../employee/connection.php");


     if($_SESSION["loggedin"]){
        $id=$_SESSION["id"];
        $sql="SELECT * FROM Employee inner join Employee_Log_in ON Employee.EmployeeID=Employee_Log_in.EmployeeID WHERE Employee.EmployeeID='$id'";
        $results=mysqli_query($conn,$sql);

      if($row = mysqli_fetch_assoc($results)) {
        $fname=$row["EmployeeFname"];
       
        $lname=$row["EmployeeLname"];
    }   
    echo "hello";
    

}


     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inventory</title>
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
  echo "<li><a href='administrator/administrator_dashboard.php'><i class='icon ion-md-home' size='large'></i> Dashboard</a></li>
  <li><a href='administrator/administrator_employee.php'><i class='icon ion-md-people' size='large'></i>Employee</a></li>
  <li><a href='administrator/administrator_messages.php'><i class='icon ion-md-mail' size='large'></i> Messages</a></li>";
}else{
  echo "<li><a href='employee/employee_dashboard.php'><i class='icon ion-md-home' size='large'></i> Dashboard</a></li>
  <li><a href='employee/employee_messages.php'><i class='icon ion-md-mail' size='large'></i> Messages</a></li>";
}

?>

<li><a href="../../employee/employee_sales.php"><i class='icon ion-md-cash' size='large'></i> Sales</a></li>
<li><a href="../../employee/employ_invent.php"> <i class='icon ion-md-hammer' size='large'></i> Inventory</a></li>
<li><a href="../../employee/customer/customer.php"> <i class='icon ion-md-people' size='large'></i> Customers</a></li>
<li><a href="../../employee/employee_tests.php">  <i class='icon ion-md-clipboard' size='large'></i> Tests</a></li>
<li><a href="../../employee/general_suppliers.php">  <i class='icon ion-md-basket' size='large'></i> Suppliers</a></li>
<li><a href='../../employee/bin.php'><i class='icon ion-md-trash' size='large'></i> Bin</a></li>
</ul>
</nav>
  </div>


  <div class="row" style="margin-top:3%;padding-left:26%;padding-right:5px;margin-top:5%">
                    <!--col -->
                 
                    <h5 class="text-muted vb">
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#additem'>
        ADD NEW ITEM<i class='icon ion-md-add' size='large'></i>
      </button>
                            <?php include('update_e.php');?>
                            
                        </h5> 
                   
                   
                    </div>


                    <div style="width:78%;margin-left:20%">

<table id="example" class="table table-bordered " style="margin-left:5%;background:white;width:90%">
  
  <thead>
    <tr>
      
      <th scope="col">InventoryID
      </th>
      <th scope="col">Inventory Name
      </th>
      <th scope="col">Expiry Date
      </th>
      <th scope="col">Quantity
      </th>
      <th scope="col">Price
      </th>
      <th scope="col">Suppliers
      </th>
      <th scope="col">Status
      </th>
      <th scope="col">Actions
      </th>
    </tr>
  </thead>
  <tbody>
   
        <?php
        $sql_sell="SELECT * FROM Inventory ";
        $res_sell=mysqli_query($conn,$sql_sell);
        
        while($row_s=mysqli_fetch_assoc($res_sell)){
            $Inventory=$row_s['InventoryID'];
            $InventName=$row_s['InventoryName'];
            $Date=$row_s['ExpiryDate'];
            $quantity=$row_s['NumberofItems'];
            $mode= $row_s['Price'];
            $bill=$row_s['SuppliersID'];
            $stats=$row_s['Status'];
            if($stats=="Available"){
        echo "
        <tr scope='row'>
        <td>$Inventory</td>
        <td>$InventName</td>
        <td>$Date</td>
        <td>$quantity</td>
        <td>$mode</td>
        <td>$bill</td>";
      
        if($quantity>100){
          echo " <td>"; ?>
            <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
            HIGH
          </div>
        </div> <?php echo "</td>";
        }
        else{
          echo " <td>";?>  <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
            LOW
          </div>
        </div> <?php echo "</td>";
        }
        $sql_supp="SELECT * from Medicine where InventoryID='$Inventory'";
        $supp_result=mysqli_query($conn,$sql_supp);
        $mu=mysqli_fetch_assoc($supp_result);

        $sql_sup="SELECT * from Toiletries where InventoryID='$Inventory'";
        $supp_resul=mysqli_query($conn,$sql_sup);
        $tu=mysqli_fetch_assoc($supp_resul);


        $sql_su="SELECT * from Tests where InventoryID='$Inventory'";
        $supp_resu=mysqli_query($conn,$sql_su);
        $teu=mysqli_fetch_assoc($supp_resu);


        $sale="SELECT sum(Bill) as Total from Sellsto inner join Inventory on Sellsto.InventoryID=Inventory.InventoryID where Sellsto.InventoryID='$Inventory' ";
$resulte=mysqli_query($conn,$sale);
$salet=mysqli_fetch_assoc($resulte);

$sql_bill="SELECT sum(Bill) as Total_Sale FROM Administers inner join Inventory on Administers.InventoryID=Inventory.InventoryID where Administers.InventoryID='$Inventory'";
$res_bill=mysqli_query($conn,$sql_bill);
$adTests=mysqli_fetch_assoc($res_bill);

  $totasales=$adTests['Total_Sale'];
  $total=$salet['Total'];




  $sales="SELECT sum(Bill) as Total from Sellsto inner join Inventory on Sellsto.InventoryID=Inventory.InventoryID where Sellsto.InventoryID='$Inventory' and Sellsto.EmployeeID=$id ";
$resultes=mysqli_query($conn,$sales);
$salets=mysqli_fetch_assoc($resultes);

$sql_bills="SELECT sum(Bill) as Total_Sale FROM Administers inner join Inventory on Administers.InventoryID=Inventory.InventoryID where Administers.InventoryID='$Inventory' and Administers.EmployeeID=$id";
$res_bills=mysqli_query($conn,$sql_bills);
$adTest=mysqli_fetch_assoc($res_bills);

  $totasale=$adTest['Total_Sale'];
  $totals=$salets['Total'];

        if($row_d['DepartmentID']==4){

        if($mu){
          echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#mu_".$Inventory."mu".$total."'>
          View<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
        </button>
        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#updatemu_".$Inventory."'>
        Update<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete_".$Inventory."'>
        Delete<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      
      </td>";
        }else if($tu){
          echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#tu_".$Inventory."tu".$total."'>
          View<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
        </button>
        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#updatetu_".$Inventory."'>
        Update<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete_".$Inventory."'>
        Delete<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      
      </td>";
        }
        else if($teu){
          echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#teu_".$Inventory."teu".$totasales."'>
          View<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
        </button>
        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#updateteu_".$Inventory."'>
        Update<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete_".$Inventory."'>
        Delete<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      
      </td>";

      }
      
    }else{

      if($mu){
        echo "<td><button type='button' class='btn btn-success' data-toggle='modal' data-target='#smu_".$Inventory."mu".$totals."mu".$id."'>
        View<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#updatemu_".$Inventory."'>
      Update<i class='icon ion-md-close-circle-outline' size='large'></i>
    </button>
    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleterequest_".$Inventory."'>
      Delete<i class='icon ion-md-close-circle-outline' size='large'></i>
    </button>
    
    </td>";
      }else if($tu){
        echo "<td><button type='button' class='btn btn-success' data-toggle='modal' data-target='#stu_".$Inventory."tu".$totals."tu".$id."'>
        View<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#updatetu_".$Inventory."'>
      Update<i class='icon ion-md-close-circle-outline' size='large'></i>
    </button>
    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleterequest_".$Inventory."'>
      Delete<i class='icon ion-md-close-circle-outline' size='large'></i>
    </button>
    
    </td>";
      }
      else if($teu){
        echo "<td><button type='button' class='btn btn-success' data-toggle='modal' data-target='#steu_".$Inventory."teu".$totasale."teu".$id."'>
        View<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#updateteu_".$Inventory."'>
      Update<i class='icon ion-md-close-circle-outline' size='large'></i>
    </button>
    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleterequest_".$Inventory."'>
      Delete<i class='icon ion-md-close-circle-outline' size='large'></i>
    </button>
    
    </td>";

    }

      }
        

     

      echo
       "
        </tr>\n";
        
include("inventory_u.php");
      }

    }
        
        ?>
      
   
    

  </tbody>
 
</table>
</div>  

<?php
if(isset($_GET['msuccess'])){
  echo " <script >


  swal('New Medicine Added!');



</script>";
}
if(isset($GET['pop'])){
    echo " <script >


    swal('We OUTSIDEEE!');
  
  
  
  </script>";
}

if(isset($_GET['view'])){
  $sid=$_GET['sid'];
  $sale="SELECT sum(Bill) as Total from Sellsto inner join Inventory on Sellsto.InventoryID=Inventory.InventoryID where Sellsto.InventoryID='$sid' and Sellsto.EmployeeID='$id'";
$resulte=mysqli_query($conn,$sale);
$salet=mysqli_fetch_assoc($resulte);

$sql_bill="SELECT sum(Bill) as Total_Sale FROM Administers inner join Inventory on Administers.InventoryID=Inventory.InventoryID where Administers.EmployeeID='$id' and Administers.InventoryID='$sid '";
$res_bill=mysqli_query($conn,$sql_bill);
$adTests=mysqli_fetch_assoc($res_bill);

  $totasales=$adTests['Total_Sale'];
  $total=$salet['Total'];
  echo" <script>swal('Total Product Sales: GHC";
  if($salet){
   echo "{$total}')</script>";
}
else if($adTests){
  echo "{$totasales}')</script>";
}


 
}


if(isset($_GET['update'])){
  $sid=$_GET['sid'];
  echo "<script>swal('{$sid} Updated!')</script>";
}


if(isset($_GET['nosuccess'])){
  $sid=$_GET['sid'];
  echo "<script>swal('{$sid} Unsuccessful!')</script>";
}
else if(isset($_GET['pr'])){
  echo "<script>swal('Deleted')</script>";
}
?>


<script>

function newpage_3(){
  window.location.href=("inventory.php");
  
}
function newpage_1(){
  window.location.href=("tinventory.php");
  
}
function newpage_2(){
  window.location.href=("teinventory.php");
  
}
</script>

<script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>

<script src="../../js/sales.js"></script>
</body>

</html>