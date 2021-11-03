
<!-- This is to update the customer record -->
<?php
 
     require_once("connection.php");

    $cid=$_GET['cid'];



  
    
    


    if(isset($_POST['add'])){
        $cids=$_POST['cids'];
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $gender=$_POST['gender'];
        $number=$_POST['phone'];
        $location=$_POST['locate'];
        $status=$_POST['status'];
        $diagnosis= $_POST['diag'];
        $checkup= $_POST['checkup'];


           
        


        $sql_insert = "UPDATE `Customer` SET `CustomerFName`='$fname',`CustomerLName`='$lname',`CustomerGender`='$gender',`CustomerTelephone`='$number',`CustomerAddress`='$location',`Status`='$status',`Diagnosis`='$diagnosis',`LastCheckupDate`='$checkup' WHERE CustomerID='$cids'";
        $result_i=mysqli_query($conn,$sql_insert);
        if($result_i) {
            header("Location:customer.php?update=newcustomeradded?CID=".$cids);            
        }
        else{
            header("Location:customer_edit.php?nosuccess&cid=".$cids."First=".$fname. "&Last=" .$lname."&Gender=" .$gender."&number=".$number."&locate=".$location. "&Status=".$status. "&diag=" .$diagnosis. "&check=".$checkup); 
        }
       }


     ?>


   


