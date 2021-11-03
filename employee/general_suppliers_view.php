
<!-- This is for handling various functionalities for supplier-->

 

 <!-- The Modal -->
 <div class="modal" id="delete_<?php echo $Suppliers?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">TERMINATE CONTRACT</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="general_update_suppliers.php?sid=<?php echo $Suppliers?>" method="post">
        ARE YOU SURE YOU WANT TO TERMINATE <?php echo $Suppliers?>'s CONTRACT?
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger"  name="delete">YES </button>
            <button type="button" class="btn btn-success"  data-dismiss="modal">CLOSE </button>
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

  <!-- The Modal -->
  <div class="modal" id="deleterequest_<?php echo $Suppliers;?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">DELETE Supplier</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="employee_request.php?cid=<?php echo $Suppliers;?>" method="post">
          <label for="type">REQUEST TYPE </label>
          <input class="form-control" type="text" name="type" id='type' value="DELETE ITEM" readonly><br>


          <label for="type">REQUEST MESSAGE </label>
          <input class="form-control" type="text" name="message" id="message" value="Delete <?php echo $Suppliers;?>"><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="delete" >SEND </button>
            <button type="button" class="btn btn-success" data-dismiss="modal" >CLOSE </button>
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>


    <!-- The Modal -->
    <div class="modal" id="mu_<?php echo $Suppliers;?>mu<?php echo $full;?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">TOTAL SALES</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
         TOTAL SALES: GHC <?php echo $full;?>
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
  <div class="modal" id="update_<?php echo $Suppliers;?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">UPDATE SUPPLIER</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
        
          <form class="form-control" action="general_update_suppliers.php?sid=<?php echo $Suppliers?>" method="post"  data-parsley-validate>

<label for="inventoryid">SUPPLIER ID</label><br>
<input  class="form-control" type="text" name="supplierid" id="inventoryid"   data-parsley-pattern="^[S0-9(2)]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter ID Properly(`SUPPLIER` NAME( S for Supplier eg S06)' readonly value="<?php echo $Suppliers;?>" ><br>


<label for="inventory">COMPANY NAME</label><br>
<input  class="form-control" type="text" name="companyname" id="inventory" placeholder="Company Name" data-parsley-pattern="^[a-zA-Z0-9:- ]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter Company Name Properly' required value="<?php echo $CompanyName;?>" ><br>


<label for="date">LOCATION</label><br>
<input  class="form-control" type="text" name="location" id="inventory" placeholder="Location" data-parsley-pattern="^[a-zA-Z0-9:- ]+$" data-parsley-trigger="keyup" data-parsley-error-message='Enter Location Properly' required value="<?php echo $Location;?>" ><br>


    


<label for="quantity">PHONE NUMBER</label><br>
  <input class="form-control quantity"  name="phone"  type="text" id="quantity" placeholder="Telephone number(0302,02)" data-parsley-maxlength="10" data-parsley-trigger="keyup" data-parsley-error-message='Enter Number properly' required value="<?php echo $Address;?>" ><br>

  
  <label for="product">PRODUCT TYPE</label><br>
  
  <select class="form-control" name="type" id="product">
  <option name='product' id='product' value="<?php echo $Type?>"><?php echo $Type?></option>
    <?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'suppliers' AND COLUMN_NAME = 'ProductType' ";
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

<label for="product">STATUS</label><br>
  
  <select class="form-control" name=status id="status">
  <option name='staus' id='product' value="<?php echo $Active?>"><?php echo $Active?></option>
    <?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'suppliers' AND COLUMN_NAME = 'CompanyStatus' ";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
       $type=$row['COLUMN_TYPE'];

       $output = str_replace("enum('", "", $type);

// $output will now be: Equipment','Set','Show
       $output = str_replace("')", "", $output);

       // array $results contains the ENUM values
       $results = explode("','", $output);

       for($i = 0; $i < count($results); $i++) {
           echo "<option name='status' id='status' value='$results[$i]'>$results[$i]</option>
       ";
       }
        
    }
    ?>
    
</select><br>
</div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="update">UPDATE </button>
          
          </div>
   
        </div>
      </div>
    </div>
    </div>
