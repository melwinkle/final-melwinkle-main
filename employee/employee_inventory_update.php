
<!-- This is to update an inventory item -->
<?php
     require_once("connection.php");

    $sid=$_GET['sid'];
    

    if(isset($_POST['add'])){
        $Inventoryid=$_POST["inventoryid"];
        $Inventory_name=$_POST['inventoryname'];
        $Expiry_date=$_POST['expirydate'];
        $Suppliers_id=$_POST['supplier'];
        $Number_items=$_POST['quantity'];
        $price= $_POST['price'];
        $product= $_POST['product'];
       

   


      


        $sql_insert="UPDATE Inventory set InventoryName='$Inventory_name',ExpiryDate='$Expiry_date',SuppliersID='$Suppliers_id',NumberofItems=$Number_items,Price=$price where InventoryID= '$sid'";
        $result_i=mysqli_query($conn,$sql_insert);
        if($result_i) {
           
                
                $sql_inser="UPDATE  Medicine set MedicineType='$product' where InventoryID= '$sid'";
                $sq_result=mysqli_query($conn,$sql_inser);
                if($sq_result){
                    header("Location:employee_inventory.php?update&sid={$sid}");        
                    
                }
                else{
                    header("Location:employee_inventory.php?nosuccess&sid=".$sid); 
                }
            
                
        }
        else{
            echo"wow";
                        header("Location:employee_inventory.php?nosuccess&EID=".$sid); 
        }
       }


     ?>
