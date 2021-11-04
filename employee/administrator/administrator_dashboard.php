<!-- This is administrator dashboards -->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 
session_start();

if(!($_SESSION["loggedin"])){
    header("Location:index.php");
}
require_once("../../employee/connection.php");



$sqls= "SELECT * FROM Employee WHERE EmployeeID = '".$_SESSION['id']."'";
$name = mysqli_query($conn,$sqls);
$rowname=mysqli_fetch_assoc($name);

$fname=$rowname['EmployeeFname'];
$lname=$rowname['EmployeeLname'];



if($_SESSION["loggedin"]){
    $id=$_SESSION["id"];
    $sql="SELECT EmployeeFname,EmployeeLname FROM Employee inner join Employee_Log_in ON Employee.EmployeeID=Employee_Log_in.EmployeeID WHERE Employee.EmployeeID='$id'";
    $report ="SELECT * from Employee_Time where EmployeeID='$id' ORDER BY Report_Time DESC LIMIT 1";
    $reports=mysqli_query($conn,$report);
    $results=mysqli_query($conn,$sql);

    $rep=mysqli_fetch_assoc($reports);
    $rel=mysqli_fetch_assoc($results);


    $sales_query="SELECT sum(Bill) as Total_sales from Sellsto  where EXTRACT(YEAR from DateofSale)= year(curdate())";
    $sales=mysqli_query($conn,$sales_query);
    $sale=mysqli_fetch_assoc($sales);
        $total_sale=$sale['Total_sales'];

    
    $test_query="SELECT * from Administers ";
    $test=mysqli_query($conn,$test_query);
    $test_p=mysqli_num_rows($test);



    $bill="SELECT sum(Bill) as Month_Bills from Sellsto  where EXTRACT(MONTH from DateofSale)=month(curdate()) and EXTRACT(YEAR from DateofSale)= year(curdate())";
    $bills=mysqli_query($conn,$bill);
    $bils=mysqli_fetch_assoc($bills);
        $billy=$bils['Month_Bills'];


    $inventory="SELECT * from Inventory";
    $invent=mysqli_query($conn,$inventory);
    $inventor=mysqli_num_rows($invent);

    

      
      

      $sql_bill="SELECT sum(Bill) as Total_Sale FROM Administers  where EXTRACT(YEAR from DateAdministered)= year(curdate())";
      $res_bill=mysqli_query($conn,$sql_bill);
      $res_bi=mysqli_fetch_assoc($res_bill);

        $totasales=$res_bi['Total_Sale'];


      $billz="SELECT sum(Bill) as Month_Bill from Administers  where EXTRACT(MONTH from DateAdministered)=month(curdate()) and EXTRACT(YEAR from DateAdministered)= year(curdate())";
    $billzz=mysqli_query($conn,$billz);
    $bilz=mysqli_fetch_assoc($billzz);
        $monthsales=$bilz['Month_Bill'];
     
      
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
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


     
          <a class="nav-link" href=""><?php
    


    
    

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
<li><a href="../../employee/administrator/administrator_dashboard.php"><i class='icon ion-md-home' size='large'></i> Dashboard</a></li>
<li><a href="../../employee/administrator/administrator_employee.php">  <i class='icon ion-md-people' size='large'></i> Employee</a></li>
<li><a href="../../employee/administrator/administrator_messages.php">  <i class='icon ion-md-mail' size='large'></i> Messages</a></li>
<li><a href="../../employee/employee_sales.php"><i class='icon ion-md-cash' size='large'></i> Sales</a></li>
<li><a href="../../employee/employee_inventory.php/?pop"> <i class='icon ion-md-hammer' size='large'></i> Inventory</a></li>
<li><a href="../../employee/customer/customer.php"> <i class='icon ion-md-people' size='large'></i> Customers</a></li>
<li><a href="../../employee/employee_tests.php">  <i class='icon ion-md-clipboard' size='large'></i> Tests</a></li>
<li><a href="../../employee/general_suppliers.php">  <i class='icon ion-md-basket' size='large'></i> Suppliers</a></li>
<li><a href='../../employee/bin.php'><i class='icon ion-md-trash' size='large'></i> Bin</a></li>
<li><a href="../../employee/employee_log_out.php">  <i class='icon ion-md-power' size='large'></i> LOG OUT</a></li>
</ul>
</nav>
  </div>

 
          

  <div id="page-wrapper" style="padding:0 0 60px;min-height:568px;margin-left:18%;margin-top:5%">


<div class="row" style="margin-top:3%;padding-left:15px;padding-right:5px">
              <!--col -->
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="white-box" style="background:white;padding:10px;margin-bottom:15px">
                      <div class="col-in row">
                          <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                  class="linea-icon linea-basic"></i>
                              <h5 class="text-muted vb">LOGIN TIME</h5>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6">
                              <h3 class="counter text-right m-t-15 text-danger"><?php if($rep){
     
          $date=date_create($rep["Report_Time"]);
          $day=date_format($date,"d/M/Y H:i:s ");
          echo "$day";
          
    } else{ echo "00:00:00";
    }?></h3>
                          </div>
                      </div>
                  </div>
              </div>


              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="white-box" style="background:white;padding:10px;margin-bottom:15px">
                      <div class="col-in row">
                          <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                  class="linea-icon linea-basic"></i>
                              <h5 class="text-muted vb">DEPARTMENT</h5>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6">
                              <h3 class="counter text-right m-t-15 text-danger"><?php 
                              $did=$rowname['DepartmentID'];
                                $depart="SELECT DepartmentName from department  where DepartmentID=$did";
                                $ris=mysqli_query($conn,$depart);
                                 $row_d=mysqli_fetch_assoc($ris);
                              
                              echo $row_d['DepartmentName'];?></h3>
                          </div>
                      </div>
                  </div>
              </div>

              </div>



      <div class="row" style="margin-top:3%;padding-left:15px;padding-right:5px">
              <!--col -->
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="white-box" style="background:white;padding:25px;margin-bottom:15px">
                      <div class="col-in row">
                          <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                  class="linea-icon linea-basic"></i>
                              <h5 class="text-muted vb">YEARLY SALES</h5>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6">
                              <h3 class="counter text-right m-t-15 text-danger"><?php if($totasales && $total_sale){
                                  $tots=$totasales + $total_sale;
                                     

                                      echo "GHc " .$tots;
                                  
                              }else{
                                  echo "Ghc 0";}
                               ?></h3>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width:<?php $progress= ($tots/100); echo $progress;
                                ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
         




        
              <!--col -->
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="white-box" style="background:white;padding:25px;margin-bottom:15px">
                      <div class="col-in row">
                          <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                  class="linea-icon linea-basic"></i>
                              <h5 class="text-muted vb">MONTHLY SALES </h5>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6">
                              <h3 class="counter text-right m-t-15 text-danger"><?php if($billy && $monthsales){ 
                                  $months=$billy + $monthsales;
                                  
                                          echo "GHC " .$months;
                                     
                              }else{
                                  echo "GHC 0";
                                  }?></h3>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width:<?php $progress= ($months/100); echo $progress;
                                ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
         


                <!--col -->
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="white-box" style="background:white;padding:25px;margin-bottom:15px">
                      <div class="col-in row">
                          <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                  class="linea-icon linea-basic"></i>
                              <h5 class="text-muted vb">CURRENT INVENTORY</h5>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6">
                              <h3 class="counter text-right m-t-15 text-danger"><?php 
                                  echo $inventor;
                             ?></h3>
                          </div>
                          
                      </div>
                  </div>
              </div>
              
              
              </div>


              <div class="row" style="margin-top:3%;padding-left:15px;padding-right:5px">
              <!--col -->
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="white-box" style="background:white;padding:25px;margin-bottom:15px">
                      <div class="col-in row">
                          <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                  class="linea-icon linea-basic"></i>
                              <h5 class="text-muted vb">CUSTOMERS</h5>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6">
                              <h3 class="counter text-right m-t-15 text-danger"><?php
                                     
                                     $sql_sell="SELECT * FROM Customer";
                                     $res_sell=mysqli_query($conn,$sql_sell);
                                     $res_l=mysqli_num_rows($res_sell);
 
                                     echo $res_l;

?></h3>
                          </div>
                          
                      </div>
                  </div>
              </div>

               <!--col -->
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="white-box" style="background:white;padding:25px;margin-bottom:15px">
                      <div class="col-in row">
                          <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                  class="linea-icon linea-basic"></i>
                              <h5 class="text-muted vb">STOCK SHORTAGE</h5>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6">
                              <h3 class="counter text-right m-t-15 text-danger"><?php
                                    $sql_sell="SELECT * FROM Inventory where NumberofItems<100";
                                    $res_l=mysqli_num_rows($res_sell);
 
                                    echo $res_l;
                                    
                                    
                                    ?></h3>
                          </div>
                        
                      </div>
                  </div>
              </div>

               <!--col -->
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="white-box" style="background:white;padding:25px;margin-bottom:15px">
                      <div class="col-in row">
                          <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                  class="linea-icon linea-basic"></i>
                              <h5 class="text-muted vb">TESTS ADMINISTERED</h5>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6">
                              <h3 class="counter text-right m-t-15 text-danger"><?php 
                                      echo $test_p;
                                
                                  
                              ?></h3>
                          </div>
                          
                  </div>
              </div>
              
              


</div>

<div class="row" style="margin-top:3%;margin-left:5%;padding-right:5px">              
             
             <div style="width:90%;">
             <div style="background:rgb(14, 80, 14);padding:20px;color:white"><h2>PROFILE</h2></div>
          <form class="form-control">
                   <?php
          $sql="SELECT * FROM Employee inner join Employee_Log_in ON Employee.EmployeeID=Employee_Log_in.EmployeeID WHERE Employee.EmployeeID='$id'";
                                         
                                               $req= mysqli_query($conn,$sql);
                                               $row=mysqli_fetch_assoc($req);
                   ?>
                       <div class="row">
                           <div class="bio-row">
                               <p><span>First Name </span>: <?php echo $row['EmployeeFname']?></p>
                           </div>
                           <div class="bio-row">
                               <p><span>Last Name </span>: <?php echo $row['EmployeeLname']?></p>
                           </div>
                           <div class="bio-row">
                               <p><span>Date of Birth </span>:<?php echo $row['EmployeeDOB']?></p>
                           </div>
                           <div class="bio-row">
                               <p><span>Gender</span>: <?php echo $row['EmployeeGender']?></p>
                           </div>
                           <div class="bio-row">
                               <p><span>Stockkeeper </span>: Yes</p>
                           </div>
                           <div class="bio-row">
                               <p><span>Address</span>: <?php echo $row['EmployeeAddress']?></p>
                           </div>
                           <div class="bio-row">
                               <p><span>Employment Date </span>: <?php echo $row['EmploymentDate']?></p>
                           </div>
                           <div class="bio-row">
                               <p><span>Status</span>: <?php echo $row['EmployeeStatus']?> </p>
                           </div>
                           <div class="bio-row">
                               <p><span> Shift Time</span>: <?php echo $row['ShiftTime']?> </p>
                           </div>
                           
                      
               
               <div style="float:right">
         
               <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#requestleave_<?php echo $id;?>'>
                   REQUEST LEAVE<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
                 </button>
               <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#request_<?php echo $id;?>'>
                   UPDATE<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
                 </button>
                     
         
                     <?php include_once('admin_update.php')?>
                     </div>
           </form>
                                         
         
         
         
         </div>
                    </div>      
       

                            
        
      </div>
    
      <?php
if(isset($_GET['successful'])){
  echo "<script>swal('Login Succesful')</script>";
}
else if(isset($_GET['messagesent'])){
    echo "<script>swal('Request Sent')</script>";
  }
?>
    </body>
</html>
