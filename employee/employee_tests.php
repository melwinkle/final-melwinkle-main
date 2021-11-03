
<!-- This is for viewing all tests -->
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
    <title>Tests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
   
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="sweetalert2.min.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
<script src="https://code.jquery.com/jquery-3.5.1.js
"></script>
   <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
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


  <div class="row" style="margin-top:3%;padding-left:26%;padding-right:5px;margin-top:5%">
                    <!--col -->
                 
                    <h5 class="text-muted vb">
                            <a href="tests.php"><button type="button" class="btn btn-primary btn-lg">ADMINISTER NEW TEST <i class='icon ion-md-add' size='large'></i></button>
                            
                            </a>
                        </h5> 
                   
                   
                    </div>



                    <div style="width:75%;margin-left:20%">

<table id="example" class="table table-bordered " style="background:white;width:100%">
  
  <thead>
    <tr>
    <th scope="col">Test ID
      </th>
      <th scope="col">InventoryID
      </th>
      <th scope="col">CustomerID
      </th>
      <th scope="col">Date Administered
      </th>
      
      <th scope="col">Bill
      </th>
      

    </tr>
  </thead>
  <tbody>
   
        <?php
        if($row_d['DepartmentID']==4){
          $sql_sell="SELECT * FROM Administers ";
        $res_sell=mysqli_query($conn,$sql_sell);
        
        while($row_s=mysqli_fetch_assoc($res_sell)){
            $Inventory=$row_s['InventoryID'];
            $Test=$row_s['TestID'];
            $Date=$row_s['DateAdministered'];
            $customer=$row_s['CustomerID'];
            $bill=$row_s['Bill'];


            $sqls="SELECT InventoryName FROM Inventory where InventoryID='$Inventory' ";
            $ress=mysqli_query($conn,$sqls);
            $row_i=mysqli_fetch_assoc($ress);
            $InN=$row_i['InventoryName'];


            $sqlc="SELECT CustomerFname,CustomerLname FROM Customer where CustomerID=$customer ";
            $resc=mysqli_query($conn,$sqlc);
            $row_c=mysqli_fetch_assoc($resc);
            $CN=$row_c['CustomerFname'];
            $LN=$row_c['CustomerLname'];



        echo "
        <tr scope='row'>
        <td>$Test</td>
        <td>$InN</td>
        <td>$CN $LN</td>
        <td>$Date</td>
        <td>$bill</td>
        </tr>\n";
        }
      }
        else{
        $sql_sell="SELECT * FROM Administers where EmployeeID='$id'";
        $res_sell=mysqli_query($conn,$sql_sell);
        
        while($row_s=mysqli_fetch_assoc($res_sell)){
            $Inventory=$row_s['InventoryID'];
            $Test=$row_s['TestID'];
            $Date=$row_s['DateAdministered'];
            $customer=$row_s['CustomerID'];
            $bill=$row_s['Bill'];
            $sqls="SELECT InventoryName FROM Inventory where InventoryID='$Inventory' ";
            $ress=mysqli_query($conn,$sqls);
            $row_i=mysqli_fetch_assoc($ress);
            $InN=$row_i['InventoryName'];


            $sqlc="SELECT CustomerFname,CustomerLname FROM Customer where CustomerID=$customer ";
            $resc=mysqli_query($conn,$sqlc);
            $row_c=mysqli_fetch_assoc($resc);
            $CN=$row_c['CustomerFname'];
            $LN=$row_c['CustomerLname'];



        echo "
        <tr scope='row'>
        <td>$Test</td>
        <td>$InN</td>
        <td>$CN $LN</td>
        <td>$Date</td>
        <td>$bill</td>
        </tr>\n";
        }
      }
        ?>
      
   
    

  </tbody>
 
</table>
</div>  



<script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>

<script src="../../js/sales.js"></script>
</body>

</html>