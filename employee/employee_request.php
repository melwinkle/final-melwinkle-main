<!-- This is for preocessing all requests-->
<?php

session_start();
require_once('connection.php');



if(isset($_POST['delete'])){

$id=$_SESSION['id'];
$type=$_POST['type'];
$message=$_POST['message'];
    $request="INSERT into Message_Requests(EmployeeID,RequestType,MainMessage) values($id,'$type','$message')";
    $req=mysqli_query($conn,$request);

    if($req){
        header("Location: general_suppliers.php?pr");

    }
}


if(isset($_POST['deletec'])){

    $id=$_SESSION['id'];
    $type=$_POST['type'];
    $message=$_POST['message'];
        $request="INSERT into Message_Requests(EmployeeID,RequestType,MainMessage) values($id,'$type','$message')";
        $req=mysqli_query($conn,$request);
    
        if($req){
            header("Location: ../../employee/customer/customer.php?pr");
    
        }
    }


    if(isset($_POST['deleted'])){

        $id=$_SESSION['id'];
        $type=$_POST['type'];
        $message=$_POST['message'];
            $request="INSERT into Message_Requests(EmployeeID,RequestType,MainMessage) values($id,'$type','$message')";
            $req=mysqli_query($conn,$request);
        
            if($req){
                header("Location: employee_inventory.php?pr");
        
            }
        }


        if(isset($_POST['update'])){

            $id=$_SESSION['id'];
            $type=$_POST['type'];
            $message=$_POST['message'];
                $request="INSERT into Message_Requests(EmployeeID,RequestType,MainMessage) values($id,'$type','$message')";
                $req=mysqli_query($conn,$request);
            
                if($req){
                    header("Location: employee_dashboard_1.php?messagesent");
            
                }
            }


            if(isset($_POST['leave'])){

                $id=$_SESSION['id'];
                $type=$_POST['type'];
                $message=$_POST['message'];
                    $request="INSERT into Message_Requests(EmployeeID,RequestType,MainMessage) values($id,'$type','$message')";
                    $req=mysqli_query($conn,$request);
                
                    if($req){
                        header("Location: employee_dashboard.php?messagesent");
                
                    }
                }



                if(isset($_POST['updated'])){

                    $id=$_SESSION['id'];
                    $type=$_POST['type'];
                    $message=$_POST['message'];
                        $request="INSERT into Message_Requests(EmployeeID,RequestType,MainMessage) values($id,'$type','$message')";
                        $req=mysqli_query($conn,$request);
                    
                        if($req){
                            header("Location: employee_dashboard.php?messagesent");
                    
                        }
                    }
        
        
                    if(isset($_POST['leaves'])){
        
                        $id=$_SESSION['id'];
                        $type=$_POST['type'];
                        $message=$_POST['message'];
                            $request="INSERT into Message_Requests(EmployeeID,RequestType,MainMessage) values($id,'$type','$message')";
                            $req=mysqli_query($conn,$request);
                        
                            if($req){
                                header("Location: employee_dashboard_1.php?messagesent");
                        
                            }
                        }


                        if(isset($_POST['updateadmin'])){

                            $id=$_SESSION['id'];
                            $type=$_POST['type'];
                            $message=$_POST['message'];
                                $request="INSERT into Message_Requests(EmployeeID,RequestType,MainMessage) values($id,'$type','$message')";
                                $req=mysqli_query($conn,$request);
                            
                                if($req){
                                    header("Location: ../../employee/administrator/administrator_dashboard.php?messagesent");
                            
                                }
                            }
                
                
                            if(isset($_POST['leaveadmin'])){
                
                                $id=$_SESSION['id'];
                                $type=$_POST['type'];
                                $message=$_POST['message'];
                                    $request="INSERT into Message_Requests(EmployeeID,RequestType,MainMessage) values($id,'$type','$message')";
                                    $req=mysqli_query($conn,$request);
                                
                                    if($req){
                                        header("Location: ../../employee/administrator/administrator_dashboard.php?messagesent");
                                
                                    }
                                }



                                if(isset($_POST['leaved'])){
                
                                    $id=$_GET['cid'];
                                    $message=$_POST['message'];
                                        $request="DELETE from Message_Requests where Messageid=$id";
                                        $req=mysqli_query($conn,$request);
                                    
                                        if($req){
                                            header("Location: employee_messages.php?withdrawn");
                                    
                                        }
                                    }
?>