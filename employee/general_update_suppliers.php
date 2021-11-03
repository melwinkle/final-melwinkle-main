<!-- This isfro updating a supplier record -->

<?php
     session_start();
     require_once("../../employee/connection.php");
    $sid=$_GET['SID'];
    $id=$_GET['sid'];


    if(isset($_POST['update'])){
        $Supplierid=$_POST["supplierid"];
        $Supplier_name=$_POST['companyname'];
        $Locate=$_POST['location'];
        $phone=$_POST['phone'];
        $type=$_POST['type'];
        $status=$_POST['status'];
       

   


      


        $sql_insert="UPDATE suppliers set CompanyName='$Supplier_name', CompanyLocation='$Locate',TelephoneNumber='$phone',ProductType='$type',CompanyStatus='$status' where SuppliersID='$Supplierid'";
        $result_i=mysqli_query($conn,$sql_insert);
        if($result_i) {
           
                    header("Location:general_suppliers.php?updated=newinventoryadded&sid=$sid");        
                    
                }
                else{
                    header("Location:general_suppliers.php?noupdate&SID=".$Supplierid. "&CompanyName=" .$Suppliername."&Location=" .$Location."&phone=".$Sphone."&type=".$type); 
                }
            
       }



       if(isset($_POST['delete'])){

        
        $delete="UPDATE suppliers SET CompanyStatus='TERMINATED' where SuppliersID='$id'";
        $query=mysqli_query($conn,$delete);
        if ($query){
            header("Location: general_suppliers.php?deleted&sid={$id}");
        }
        else{
            header("Location: general_suppliers.php?notdeleted&sid={$id}");
        }
        
        }


     ?>


