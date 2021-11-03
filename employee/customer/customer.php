<!-- This is file for viewing all the customers -->

<?php
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



    
    
}

     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customers</title>
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
                            <a href="add_customer.php"><button type="button" class="btn btn-primary btn-lg">ADD NEW CUSTOMER <i class='icon ion-md-add' size='large'></i></button>
                            
                            </a>
                        </h5> 
                   
                   
                    </div>



                    <div style="width:82%;margin-left:18%">

<table id="example" class="table table-hover " style="margin-right:10px;background:white;width:100%">
  
  <thead>
    <tr>
      
      <th scope="col">CustomerID
      </th>
      <th scope="col">Full Name
      </th>
      <th scope="col">Gender
      </th>
      <th scope="col">Phone Number
      </th>
      <th scope="col">Address
      </th>
      <th scope="col">Diagnosis
      </th>
      <th scope="col">Last Check-up 
      </th>
      <th scope="col">Status
      </th>
      <th scope="col">Actions
      </th>
     

    </tr>
  </thead>
  <tbody>
   
        <?php
        $sql_sell="SELECT * FROM Customer where CustomerStatus='ACTIVE'";
        $res_sell=mysqli_query($conn,$sql_sell);
        
        while($row_s=mysqli_fetch_assoc($res_sell)){
            $Customer=$row_s['CustomerID'];
            $FName=$row_s['CustomerFName'];
            $LName=$row_s['CustomerLName'];
            $Gender=$row_s['CustomerGender'];
            $Address=$row_s['CustomerAddress'];
            $Phone=$row_s["CustomerTelephone"];
            $Diagnosis= $row_s['Diagnosis'];
            $LCheck=$row_s['LastCheckupDate'];
            $Status=$row_s['Status'];
            $Stats=$row_s['CustomerStatus'];


          
        echo "
        <tr scope='row'>
        <td>$Customer</td>
        <td>$FName $LName</td>
        <td>$Gender</td>
        <td>$Phone</td>
        <td>$Address</td>
        <td>$Diagnosis</td>
        <td>$LCheck</td>
        <td>$Status</td>";


      if($row_d['DepartmentID']==4){
        
          echo "<td><a href='customer_view.php?cid={$Customer}'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModal_".$Customer."'>
          View<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
        </button></a>
        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#update_".$Customer."'>
        Update<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete_".$Customer."'>
        Delete<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      
      </td>";
      }
      else{
        echo "<td><a href='customer_view.php?cid={$Customer}'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModal_".$Customer."'>
          View<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
        </button></a>
        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#update_".$Customer."'>
        Update<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleterequest_".$Customer."'>
        Delete<i class='icon ion-md-close-circle-outline' size='large'></i>
      </button>
      
      </td>";
      }
      
        echo "
     
        </tr>\n";
        include("customer_update.php");
        
      
    }

        ?>
      
   
    

  </tbody>
 
</table>
</div>  

<?php
if(isset($_GET['success'])){
  echo " <script >


  swal('New Customer Added!');



</script>";
}

else if(isset($_GET['update'])){
  echo " <script >


  swal('Customer Updated!');



</script>";
}
else if(isset($_GET['pr'])){
  echo " <script >


  swal('Request Sent!');



</script>";
}
else if(isset($_GET['pr'])){
  echo "<script>swal('Customer Deleted')</script>";
}

?>

<script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>

<script src="/final-melwinkle/js/sales.js"></script>
</body>

</html>