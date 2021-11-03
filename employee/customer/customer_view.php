<!-- This is see all the items that a customer has bought -->

<?php
     session_start();
     require_once("../../employee/connection.php");
$cid=$_GET['cid'];

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2.min.css">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link rel="stylesheet" href="../../css/main.css">
   <link rel="stylesheet" href="../../css/sales.css">
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
 $depart="SELECT DepartmentID from Employee  where EmployeeID=$id";
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
                            <a href="customer.php"><i class='icon ion-md-arrow-back' size='large'></i>BACK TO CUSTOMER
                            
                            </a>
                        </h6> 
                   
                   
                    </div>


                    <div style="margin-left:19%;color:black"><div class="card-header" style="width:80%;background:rgb(6, 24, 9)">
  <h5 class=" info-color white-text text-center py-4" style="color:white">
    <strong>ITEMS BOUGHT</strong>
  </h5>
  </div>

  <table id="dtBasicExample" class="table table-hover " style="width:80%;margin-right:4%;background:#fff;">
  
  <thead>
    <tr>
      
      <th scope="col"> S Inventory ID
      </th>
      <th scope="col">S Bill
      </th>
      <th scope="col">S Payment
      </th>
   
      </th>
     

    </tr>
  </thead>
  <tbody>
   
        <?php
        $sql_sell="SELECT Sellsto.InventoryID,Sellsto.Bill,PaymentMode FROM Customer inner join Sellsto on Sellsto.CustomerID=Customer.CustomerID  where Customer.CustomerID='$cid' ";
        $res_sell=mysqli_query($conn,$sql_sell);
        
        while($row_s=mysqli_fetch_assoc($res_sell)){
            $SID=$row_s['InventoryID'];
            $SB=$row_s['Bill'];
            $SP=$row_s["PaymentMode"];
            
        echo "
        <tr scope='row'>
        <td>$SID</td>
        <td>$SB</td>
        <td>$SP</td>
        </tr>\n";
        }
        ?>
      
   
    

  </tbody>
 
</table>
</div>

<div style="margin-left:19%;color:black"><div class="card-header" style="width:80%;background:rgb(6, 24, 9)">
  <h5 class=" info-color white-text text-center py-4" style="color:white">
    <strong>TESTS TAKEN</strong>
  </h5>
  </div>



<table id="dtBasicExample" class="table table-hover " style="width:80%;margin-right:4%;background:#fff;">
  
  <thead>
    <tr>
      
      <th scope="col"> A Inventory ID
      </th>
      <th scope="col">A Bill
      </th>
      <th scope="col">A Payment
      </th>
   
      </th>
     

    </tr>
  </thead>
  <tbody>
   
        <?php
        $sql_sell="SELECT Administers.InventoryID,Administers.Bill,Payment FROM Customer inner join Administers on Administers.CustomerID=Customer.CustomerID  where Customer.CustomerID='$cid' ";
        $res_sell=mysqli_query($conn,$sql_sell);
        
        while($row_s=mysqli_fetch_assoc($res_sell)){
            $SID=$row_s['InventoryID'];
            $SB=$row_s['Bill'];
            $SP=$row_s["Payment"];
            
        echo "
        <tr scope='row'>
        <td>$SID</td>
        <td>$SB</td>
        <td>$SP</td>
        </tr>\n";
        }
        ?>
      
   
    

  </tbody>
 
</table>

</div>  




<script src="../../js/sales.js"></script>
</body>

</html>