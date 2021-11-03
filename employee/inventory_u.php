    <!-- The Modal -->
    <div class="modal" id="mu_<?php echo $Inventory?>mu<?php echo $total?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">TOTAL SALES</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
         TOTAL SALES: GHC <?php echo $total?>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" >CLOSE </button>
          
          </div>
   
        </div>
      </div>
    </div>
    </div>



        <!-- The Modal -->
        <div class="modal" id="tu_<?php echo $Inventory?>tu<?php echo $total?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">TOTAL SALES</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
         TOTAL SALES: GHC <?php echo $total?>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" >CLOSE </button>
          
          </div>
   
        </div>
      </div>
    </div>
    </div>
        <!-- The Modal -->
        <div class="modal" id="teu_<?php echo $Inventory?>teu<?php echo $totasales?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">TOTAL SALES</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
         TOTAL SALES: GHC <?php echo $totasales?>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" >CLOSE </button>
          
          </div>
   
        </div>
      </div>
    </div>
    </div>




    <!-- The Modal -->
    <div class="modal" id="smu_<?php echo $Inventory?>mu<?php echo $totals?>mu<?php echo $id?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">TOTAL SALES</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
         TOTAL SALES: GHC <?php echo $totals?>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" >CLOSE </button>
          
          </div>
   
        </div>
      </div>
    </div>
    </div>


     <!-- The Modal -->
     <div class="modal" id="stu_<?php echo $Inventory?>tu<?php echo $totals?>tu<?php echo $id?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">TOTAL SALES</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
         TOTAL SALES: GHC <?php echo $totals?>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" >CLOSE </button>
          
          </div>
   
        </div>
      </div>
    </div>
    </div>


     <!-- The Modal -->
     <div class="modal" id="steu_<?php echo $Inventory?>teu<?php echo $totasale?>teu<?php echo $id?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">TOTAL SALES</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
         TOTAL SALES: GHC <?php echo $totasale?>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" >CLOSE </button>
          
          </div>
   
        </div>
      </div>
    </div>
    </div>


     <!-- The Modal -->
     <div class="modal" id="updatemu_<?php echo $Inventory?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">UPDATE MEDICINE</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
        
          <form class="form-control" action="employee_inventory_update.php?sid=<?php echo $Inventory;?>" method="post"  data-parsley-validate>

<label for="inventoryid">INVENTORY ID</label><br>
<input  class="form-control" type="text" name="inventoryid" id="inventoryid"  data-parsley-pattern="^[M0-9(3)]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter ID Properly(INVENTORY NAME( M for Medicine eg M020)' readonly value="<?php echo $Inventory;?>"><br>


<label for="inventory">INVENTORY NAME</label><br>
<input  class="form-control" type="text" name="inventoryname" id="inventory" placeholder="Inventory Name" data-parsley-pattern="^[a-zA-Z0-9:- ]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter Medicine Name Properly' value="<?php echo $InventName;?>"><br>


<label for="date">EXPIRY DATE</label><br>
<input   class="form-control"type="date" name="expirydate" id="date" value="<?php echo $Date;?>"><br>

<label for="product">TYPE</label><br>
<select class="form-control" name="product" id="product">
<?php 
     $sql_m="SELECT MedicineType FROM Medicine where InventoryID='$Inventory'";
     $result_mod=mysqli_query($conn,$sql_m);
     $row_mod = mysqli_fetch_assoc($result_mod);
    $M=$row_mod['MedicineType'];
    ?>
<option name='product' id='product' value='<?php echo $M?>'><?php echo $M?></option>
    <?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Medicine' AND COLUMN_NAME = 'MedicineType' ";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
       $type=$row['COLUMN_TYPE'];

       $output = str_replace("enum('", "", $type);

// $output will now be: Equipment','Set','Show
       $output = str_replace("')", "", $output);

       // array $results contains the ENUM values
       $results = explode("','", $output);

       for($i = 0; $i < count($results); $i++) {
           echo "<option name='product' id='product' value='$results[$i]'>$results[$i]</option>
       ";
       }
        
    }
    ?>
    
</select><br>

<label for="supp">SUPPLIER</label><br>
<select class="form-control" name="supplier" id="supp" >
<option name='supplier' id='supp' value='<?php echo $bill?>'><?php echo $bill?></option>
    <?php 
     $sql_m="SELECT SuppliersID,CompanyName FROM suppliers where ProductType='Medicine'";
     $result_mod=mysqli_query($conn,$sql_m);
     while($row_mod = mysqli_fetch_assoc($result_mod)) {
         echo "<option name='supplier' id='supp' value={$row_mod['SuppliersID']}>{$row_mod['CompanyName']}</option>";
     }
    ?>
    
</select><br>


<label for="quantity">QUANTITY</label><br>
  <input class="form-control quantity" min="0" name="quantity"  type="number" id="quantity" placeholder="Quantity"  data-parsley-trigger="keyup" data-parsley-error-message='Quantity Cannot be 0' value="<?php echo $quantity;?>"><br>

  
  <label for="price">PRICE(GHC)</label><br>
  <input class="form-control quantity" min="0" name="price"  type="number" id="price" placeholder="Price(Ghc)" data-parsley-trigger="keyup" data-parsley-error-message='Quantity Cannot be 0' value="<?php echo $mode;?>"><br>
</div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="add">UPDATE </button>
          
          </div>
   </form>
        </div>
      </div>
    </div>
    </div>







     <!-- The Modal -->
     <div class="modal" id="updatetu_<?php echo $Inventory?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">UPDATE TOILETIRES</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
        
          <form class="form-control" action="employee_inventory_tupdate.php?sid=<?php echo $Inventory?>" method="post" style="width:70%" data-parsley-validate>
<label for="inventoryid">INVENTORY ID</label><br>
<input  class="form-control" type="text" name="inventoryid" id="inventoryid"  data-parsley-pattern="^[T0-9(3)]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter ID Properly(INVENTORY NAME( M for Medicine eg M020)' readonly value="<?php echo $Inventory;?>"><br>


<label for="inventory">INVENTORY NAME</label><br>
<input  class="form-control" type="text" name="inventoryname" id="inventory" placeholder="Inventory Name" data-parsley-pattern="^[a-zA-Z0-9:- ]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter Medicine Name Properly' value="<?php echo $InventName;?>"><br>


<label for="date">EXPIRY DATE</label><br>
<input   class="form-control"type="date" name="expirydate" id="date" value="<?php echo $Date;?>"><br>

<label for="product">TYPE</label><br>
<select class="form-control" name="product" id="product">
<?php 
     $sql_m="SELECT ToiletriesType FROM Toiletries where InventoryID='$Inventory'";
     $result_mod=mysqli_query($conn,$sql_m);
     $row_mod = mysqli_fetch_assoc($result_mod);
    $M=$row_mod['ToiletriesType'];
    ?>
<option name='product' id='product' value='<?php echo $M?>'><?php echo $M?></option>
    <?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Toiletries' AND COLUMN_NAME = 'ToiletriesType' ";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
       $type=$row['COLUMN_TYPE'];

       $output = str_replace("enum('", "", $type);

// $output will now be: Equipment','Set','Show
       $output = str_replace("')", "", $output);

       // array $results contains the ENUM values
       $results = explode("','", $output);

       for($i = 0; $i < count($results); $i++) {
           echo "<option name='product' id='product' value='$results[$i]'>$results[$i]</option>
       ";
       }
        
    }
    ?>
    
</select><br>
<label for="brand">BRAND</label><br>
<select class="form-control" name="brand" id="brand">
<?php 
     $sql_m="SELECT Brand FROM Toiletries where InventoryID='$Inventory'";
     $result_mod=mysqli_query($conn,$sql_m);
     $row_mod = mysqli_fetch_assoc($result_mod);
    $B=$row_mod['Brand'];
    ?>
<option name='brand' id='brand' value='<?php echo $B?>'><?php echo $B?></option>
    <?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Toiletries' AND COLUMN_NAME = 'Brand' ";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
       $type=$row['COLUMN_TYPE'];

       $output = str_replace("enum('", "", $type);

// $output will now be: Equipment','Set','Show
       $output = str_replace("')", "", $output);

       // array $results contains the ENUM values
       $results = explode("','", $output);

       for($i = 0; $i < count($results); $i++) {
           echo "<option name='brand' id='brand' value='$results[$i]'>🧴 $results[$i]</option>
       ";
       }
        
    }
    ?>
    
</select><br>

<label for="supp">SUPPLIER</label><br>
<select class="form-control" name="supplier" id="supp" >
<option name='supplier' id='supp' value='<?php echo $bill?>'><?php echo $bill?></option>
    <?php 
     $sql_m="SELECT SuppliersID,CompanyName FROM suppliers where ProductType='Medicine'";
     $result_mod=mysqli_query($conn,$sql_m);
     while($row_mod = mysqli_fetch_assoc($result_mod)) {
         echo "<option name='supplier' id='supp' value={$row_mod['SuppliersID']}>{$row_mod['CompanyName']}</option>";
     }
    ?>
    
</select><br>










<label for="quantity">QUANTITY</label><br>
  <input class="form-control quantity" min="0" name="quantity"  type="number" id="quantity" placeholder="Quantity"  data-parsley-trigger="keyup" data-parsley-error-message='Quantity Cannot be 0' value="<?php echo $quantity;?>"><br>

  
  <label for="price">PRICE(GHC)</label><br>
  <input class="form-control quantity" min="0" name="price"  type="number" id="price" placeholder="Price(Ghc)" data-parsley-trigger="keyup" data-parsley-error-message='Quantity Cannot be 0' value="<?php echo $mode;?>"><br>
</div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="add">UPDATE </button>
          
          </div>
   </form>
        </div>
      </div>
    </div>
    </div>









    <!-- The Modal -->
     <div class="modal" id="updateteu_<?php echo $Inventory?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">UPDATE MEDICINE</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
        
          <form class="form-control" action="employee_inventory_teupdate.php?sid=<?php echo $Inventory;?>" method="post"  data-parsley-validate>

<label for="inventoryid">INVENTORY ID</label><br>
<input  class="form-control" type="text" name="inventoryid" id="inventoryid" placeholder="Last INVENTORY ID:<?php echo $last_num;?> " data-parsley-pattern="^[M0-9(3)]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter ID Properly(INVENTORY NAME( M for Medicine eg M020)' readonly value="<?php echo $Inventory;?>"><br>


<label for="inventory">INVENTORY NAME</label><br>
<input  class="form-control" type="text" name="inventoryname" id="inventory" placeholder="Inventory Name" data-parsley-pattern="^[a-zA-Z0-9:- ]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter Medicine Name Properly' value="<?php echo $InventName;?>"><br>


<label for="date">EXPIRY DATE</label><br>
<input   class="form-control"type="date" name="expirydate" id="date" value="<?php echo $Date;?>"><br>

<label for="product">TYPE</label><br>
<select class="form-control" name="product" id="product">
<?php 
     $sql_m="SELECT TestType FROM Tests where InventoryID='$Inventory'";
     $result_mod=mysqli_query($conn,$sql_m);
     $row_mod = mysqli_fetch_assoc($result_mod);
    $M=$row_mod['TestType'];
    ?>
<option name='product' id='product' value='<?php echo $M?>'><?php echo $M?></option>
    <?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Tests' AND COLUMN_NAME = 'TestType' ";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
       $type=$row['COLUMN_TYPE'];

       $output = str_replace("enum('", "", $type);

// $output will now be: Equipment','Set','Show
       $output = str_replace("')", "", $output);

       // array $results contains the ENUM values
       $results = explode("','", $output);

       for($i = 0; $i < count($results); $i++) {
           echo "<option name='product' id='product' value='$results[$i]'>$results[$i]</option>
       ";
       }
        
    }
    ?>
    
</select><br>

<label for="product">KIT BRAND</label><br>
<select class="form-control" name="kit" id="product">
<?php 
     $sql_m="SELECT TestKit FROM Tests where InventoryID='$Inventory'";
     $result_mod=mysqli_query($conn,$sql_m);
     $row_mod = mysqli_fetch_assoc($result_mod);
    $K=$row_mod['TestKit'];
    ?>
<option name='kit' id='product' value='<?php echo $K?>'><?php echo $K?></option>
    <?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Tests' AND COLUMN_NAME = 'TestKit' ";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
       $type=$row['COLUMN_TYPE'];

       $output = str_replace("enum('", "", $type);

// $output will now be: Equipment','Set','Show
       $output = str_replace("')", "", $output);

       // array $results contains the ENUM values
       $results = explode("','", $output);

       for($i = 0; $i < count($results); $i++) {
           echo "<option name='kit' id='product' value='$results[$i]'>$results[$i]</option>
       ";
       }
        
    }
    ?>
    
</select><br>

<label for="supp">SUPPLIER</label><br>
<select class="form-control" name="supplier" id="supp" >
<option name='supplier' id='supp' value='<?php echo $SI?>'><?php echo $bill?></option>
    <?php 
     $sql_m="SELECT SuppliersID,CompanyName FROM suppliers where ProductType='Medicine'";
     $result_mod=mysqli_query($conn,$sql_m);
     while($row_mod = mysqli_fetch_assoc($result_mod)) {
         echo "<option name='supplier' id='supp' value={$row_mod['SuppliersID']}>{$row_mod['CompanyName']}</option>";
     }
    ?>
    
</select><br>










<label for="quantity">QUANTITY</label><br>
  <input class="form-control quantity" min="0" name="quantity"  type="number" id="quantity" placeholder="Quantity"  data-parsley-trigger="keyup" data-parsley-error-message='Quantity Cannot be 0' value="<?php echo $quantity;?>"><br>

  
  <label for="price">PRICE(GHC)</label><br>
  <input class="form-control quantity" min="0" name="price"  type="number" id="price" placeholder="Price(Ghc)" data-parsley-trigger="keyup" data-parsley-error-message='Quantity Cannot be 0' value="<?php echo $mode;?>"><br>
</div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="add">UPDATE </button>
          
          </div>
   </form>
        </div>
      </div>
    </div>
    </div>



       <!-- The Modal -->
       <div class="modal" id="delete_<?php echo $Inventory?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">DELETE ITEM</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="inventory_delete.php?sid=<?php echo $Inventory?>" method="post">
        ARE YOU SURE YOU WANT TO DELETE <?php echo $InventName?>?
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger"  name="delete">YES </button>
            <button type="button" class="btn btn-success"  >CLOSE </button>
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>


      <!-- The Modal -->
  <div class="modal" id="deleterequest_<?php echo $Inventory?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">DELETE Inventory</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="employee_request.php?cid=<?php echo $Inventory;?>" method="post">
          <label for="type">REQUEST TYPE </label>
          <input class="form-control" type="text" name="type" id='type' value="DELETE ITEM" readonly><br>


          <label for="type">REQUEST MESSAGE </label>
          <input class="form-control" type="text" name="message" id="message" value="DELETE <?php echo $InventName;?>"><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="deleted" >SEND </button>
            <button type="button" class="btn btn-success"  >CLOSE </button>
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>