<!-- This is for viewing all suppliers -->

<?php
     session_start();
     require_once("connection.php");
    $id=$_SESSION['id'];

     if($_SESSION["loggedin"]){
        $id=$_SESSION["id"];
        $sql="SELECT * FROM Employee inner join Employee_Log_in ON Employee.EmployeeID=Employee_Log_in.EmployeeID WHERE Employee.EmployeeID='$id'";
        $results=mysqli_query($conn,$sql);

      if($row = mysqli_fetch_assoc($results)) {
        $fname=$row["EmployeeFname"];
       
        $lname=$row["EmployeeLname"];
    }



    
    
}

     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Suppliers</title>
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
    

        echo  "Welcome, ".$fname." ".$lname;
    
    
      
  
    ?></a>
        </li>
      </ul>
    </nav>

    <div class="wrapper"  >
  <nav id="sidebar" aria-label="side">
<ul class="list-items">
<?php
$depart="SELECT DepartmentID from Employee  where EmployeeID=$id";
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


  <div class="row" style="margin-top:3%;padding-left:26%;padding-right:5px;margin-top:5%">
                    <!--col -->
                 
                    <h5 class="text-muted vb">
                            <a href="general_add_suppliers.php"><button type="button" class="btn btn-primary btn-lg">ADD NEW SUPPLIER <i class='icon ion-md-add' size='large'></i></button>
                            
                            </a>
                        </h5> 
                   
                   
                    </div>




                    <div style="width:75%;margin-left:20%">

<table id="example" class="table table-hover " style="margin-right:10px;background:white;width:100%">
  
  <thead>
    <tr>
      
      <th scope="col">SupplierID
      </th>
      <th scope="col">Company Name
      </th>
      <th scope="col">Address
      </th>
      <th scope="col">Phone Number
      </th>
      <th scope="col">Product Type
      </th>
      <th scope="col">Status
      </th>
     
      <th scope="col">Actions
      </th>
     
     

    </tr>
  </thead>
  <tbody>
   
        <?php
        $sql_sell="SELECT * FROM suppliers ";
        $res_sell=mysqli_query($conn,$sql_sell);
        
        while($row_s=mysqli_fetch_assoc($res_sell)){
            $Suppliers=$row_s['SuppliersID'];
            $CompanyName=$row_s['CompanyName'];
            $Location=$row_s['CompanyLocation'];
            $Address=$row_s['TelephoneNumber'];
            $Type=$row_s["ProductType"];
            $Active=$row_s["CompanyStatus"];


            $sale="SELECT sum(Bill) as Total from Sellsto inner join Inventory on Sellsto.InventoryID=Inventory.InventoryID inner join suppliers on suppliers.SuppliersID = Inventory.SuppliersID where suppliers.SuppliersID='$Suppliers' ";
            $resulte=mysqli_query($conn,$sale);
            $salet=mysqli_fetch_assoc($resulte);
            $total=$salet['Total'];
            $sales="SELECT sum(Bill) as Total from Administers inner join Inventory on Administers.InventoryID=Inventory.InventoryID inner join suppliers on suppliers.SuppliersID = Inventory.SuppliersID where suppliers.SuppliersID='$Suppliers' ";
            $resultes=mysqli_query($conn,$sales);
            $salets=mysqli_fetch_assoc($resultes);
            $totals=$salets['Total'];


            $full=$total +$totals;


            if($Active=="ACTIVE"){
       
        echo "
        <tr scope='row'>
        <td>$Suppliers</td>
        <td>$CompanyName</td>
        <td>$Location</td>
        <td>$Address</td>
        <td>$Type</td>
        <td>";
        
        ?>
        
        <div class="progress">
    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
      Active
    </div>
  </div> <?php echo"</td>";


        if($row_d['DepartmentID']==4){


          echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#mu_".$Suppliers."mu".$full."'>
          View<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
        </button>
        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#update_".$Suppliers."'>
        Update<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
  
      
      </td>";
        }
        else{

echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#mu_".$Suppliers."mu".$total."'>
          View<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
        </button>
        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#update_".$Suppliers."'>
        Update<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleterequest_".$Suppliers."'>
        Delete<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      
      </td>";
        }
       
       


            }

       
       echo " </td>
   
        </tr>\n";

        include("general_suppliers_view.php");
        }
        ?>
      
   
    

  </tbody>
 
</table>
</div>  




<?php
if(isset($_GET['success'])){
    echo" <script >


    swal('New Supplier Added!');
  


</script>";
}


if(isset($_GET['updated'])){
  $sid=$_GET['sid'];
  echo" <script >


  swal('{$sid} Updated!');



</script>";
}


else if(isset($_GET['deleted'])){
  $sid=$_GET['sid'];
  
  echo" <script >


  swal({$sid} Contract Terminated!);



</script>";
}
else if(isset($_GET['pr'])){
  echo "<script>swal('Request Sent')</script>";
}

?>




<script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>




</body>

</html>