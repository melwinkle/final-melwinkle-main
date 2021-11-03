<!-- This is the employee Dashboard -->
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





    $id=$_SESSION["id"];
    $sql="SELECT * FROM Employee inner join Employee_Log_in ON Employee.EmployeeID=Employee_Log_in.EmployeeID WHERE Employee.EmployeeID='$id'";
    $report ="SELECT * from Employee_Time where EmployeeID='$id' ORDER BY Report_Time DESC LIMIT 1";
    $reports=mysqli_query($conn,$report);
    $results=mysqli_query($conn,$sql);

    $rep=mysqli_fetch_assoc($reports);
    $rel=mysqli_fetch_assoc($results);


	$depart="SELECT DepartmentID from  Employee   where EmployeeID='$id'";
$res=mysqli_query($conn,$depart);
$row_d=mysqli_fetch_assoc($res);
      
    

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

      
    
    
  
    ?></a>

    
        </li>


      </ul>
    </nav>




    <div class="wrapper"  >
  <nav id="sidebar" aria-label="side">
<ul class="list-items">

  <li><a href='../../employee/employee_dashboard_1.php'><i class='icon ion-md-home' size='large'></i> Dashboard</a></li>
  <li><a href='../../employee/employee_messages.php'><i class='icon ion-md-mail' size='large'></i> Messages</a></li>


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
                        <div class="white-box" style="background:white;padding:25px;margin-bottom:15px">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                        class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">DEPARTMENT</h5>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger"><?php $did=$row_d['DepartmentID'];	$depat="SELECT DepartmentName from  department  where DepartmentID=$did";
$rs=mysqli_query($conn,$depat);
$rowd=mysqli_fetch_assoc($rs);echo $rowd['DepartmentName'];?></h3>
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
                                    <h5 class="text-muted vb">SALARY</h5>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger"><?php echo $rel['Salary'];
                                     ?></h3>
                                </div>
                              
                            </div>
                        </div>


    </div>
                   
              
            </div>
    
    


    <div class="row" style="margin-top:3%;padding-left:15px;padding-right:5px">
            <div class="container bootstrap snippets bootdey"  >
            <div class="row">
            <?php
                                                
                                 
                                      $id=$_SESSION['id'];
                                      $sql="SELECT * FROM Employee inner join Employee_Log_in ON Employee.EmployeeID=Employee_Log_in.EmployeeID  WHERE Employee.EmployeeID='$id' " ;
                                      $results=mysqli_query($conn,$sql);
                                      $row = mysqli_fetch_assoc($results); 
                                      
                                
                                    
                                      
                               ?>
 
        <div class="profile-info col-md-9" >
        <div class="white-box" style="background:#fff;margin-bottom:15px">
      <div class="panel">
      <div class="bio-graph-heading">
            PROFILE
          </div>

          <div class="panel-body bio-graph-info">
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
                      <p><span>Stockkeeper </span>: yes</p>
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
                  <div class="bio-row">
                  <?php if($row_d['DepartmentID']==2){ ?>
                      <p><span> Cleaning Location</span>: <?php 
                      $sqls="SELECT * FROM Maintenance  inner join Employee ON Employee.EmployeeID=Maintenance.EmployeeID  WHERE Maintenance.EmployeeID='$id' " ;
                      $resuls=mysqli_query($conn,$sqls);
                      while($rowe = mysqli_fetch_assoc($resuls)){
                          echo $rowe['CleaningLocation']." ";

                      }
                    }?>
                     </p>
                  </div>
              </div>
          </div>
      </div>
      </div>
      <div style="float:right">
      <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#requestleave_<?php echo $id;?>'>
          REQUEST LEAVE <i class='icon ion-md-checkmark-circle-outline' size='large'></i>
        </button>
      <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#request_<?php echo $id;?>'>
          UPDATE<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
        </button>

        <?php
        include("update_e.php");?>
            </div>
  </div>

  
</div>
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
