<!-- File for viewing and performing actions on the employee -->


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 
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
    <title>Employee </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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




    <div class="wrapper"   >
  <nav id="sidebar" aria-label="side" style="width:12%">
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

 
          

  <div class="row" style="margin-top:3%;padding-left:15%;padding-right:5px;margin-top:5%">
                    <!--col -->
                 
                    <h5 class="text-muted vb">
                    <button type='button' class='btn btn-success' data-toggle='modal' data-target='#addition'>
        ADD NEW EMPLOYEE<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
    
      </button>
      
                            <?php
                            include("add_employee.php");?>
   
                        </h5>
                   
                    </div>
                    
                    
                    
   <div style="width:78%;margin-left:15%">

<table id="example" class="table table-bordered " style="background:white;width:100%">

<thead>
  <tr>
    
    <th scope="col">ID
    </th>
    <th scope="col">Full Name
    </th>
    <th scope="col">Date of Birth
    </th>
    <th scope="col">Gender
    </th>
    <th scope="col">Address
    </th>
    <th scope="col">Telephone 
    </th>
    
    <th scope="col">Salary
    </th>
    <th scope="col">Department
    </th>

    <th scope="col">Employment
    </th>

    <th scope="col">Shift Time
    </th>
    <th scope="col">Last Login
    </th>
    <th scope="col">Status
    </th>
   
    <th scope="col">Actions
    </th>
  </tr>
</thead>
<tbody>
 
      <?php
      $sql_sell="SELECT *  FROM Employee inner join EmployeeNumber on EmployeeNumber.EmployeeID=Employee.EmployeeID GROUP BY Employee.EmployeeID " ;
      $res_sell=mysqli_query($conn,$sql_sell);
      
      while($row_s=mysqli_fetch_assoc($res_sell)){
          $EID=$row_s['EmployeeID'];
          $EF=$row_s['EmployeeFname'];
          $EL= $row_s['EmployeeLname'];
          $G= $row_s['EmployeeGender'];
          $DOB= $row_s['EmployeeDOB'];
          $Depart=$row_s['DepartmentID'];
          $Address=$row_s['EmployeeAddress'];
          $Telephone=$row_s['TelNo1'];
          $Telephone1=$row_s['TelNo2'];
          $Start=$row_s['EmploymentDate'];
          $Status=$row_s['EmployeeStatus'];
          $Shift=$row_s['ShiftTime'];
          $Salary=$row_s['Salary'];

      echo "
      <tr scope='row'>
      <td>$EID</td>
      <td>$EF $EL</td>
      <td>$DOB</td>
      <td>$G</td>
      <td>$Address</td>
      <td>$Telephone
      $Telephone1</td>
      <td>$Salary</td>
      <td>$Depart</td>
      <td>$Start</td>
      <td>$Shift</td>"
      ;


      $logn="SELECT * from Employee_Time where EmployeeID=$EID ORDER BY EmployeeID DESC LIMIT 1";
      $req=mysqli_query($conn,$logn);
      $ro=mysqli_fetch_assoc($req);

     
      if($ro){
        $Login=$ro['Report_Time'];
        echo" <td>$Login</td>";
      }
      else{
      echo " <td></td>";
      }



      if($Status=="Active"){
       echo " <td>"?>
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
            ACTIVE
          </div>
        </div> 
        <?php
        echo "</td>
        <td><button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModal_".$EID."'>
        Update<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete_".$EID."'>
      Terminate<i class='icon ion-md-close-circle-outline' size='large'></i>
    </button></td>"
        
      ;
      }
      else if ($Status=="Inactive"){
        echo " <td>"?>
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
            INACTIVE
          </div>
        </div> 
        <?php
        echo "</td>
        <td>
        <button type='button' class='btn btn-success' data-toggle='modal' data-target='#update_".$EID."'>
        RESTORE<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
      </button>
      </td>"
        
      ;
      }
      else{
        echo " <td>"?>
        <div class="progress">
          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
            LEAVE
          </div>
        </div>
        <?php
        echo "</td>
        <td><button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModal_".$EID."'>
        Update<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
      </button>
      <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete_".$EID."'>
      Terminate<i class='icon ion-md-close-circle-outline' size='large'></i>
    </button></td>"  ;
        
      
      }
      ?>
      
    <?php  
    echo"
      </tr>\n";


      include('admin_update.php');
    }
    ?>
   
   



     

    
 
  

</tbody>

</table>
</div>  




<script>
function newpage(){
  window.location.href=("add_new.php");

}
function newpage_1(){
  window.location.href=("add_maintenance.php");
  
}
function newpage_2(){
  window.location.href=("add_security.php");
  
}
function newpage_3(){
  window.location.href=("add_new.php");
  
}
</script>
<script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>


<script src="js/app.js"></script>
    </body>
</html>