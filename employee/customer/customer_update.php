  <!-- The Modal -->
  <div class="modal" id="deleterequest_<?php echo $Customer?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">DELETE CUSTOMER</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="../../employee/employee_request.php?cid=<?php echo $Customer;?>" method="post">
          <label for="type">REQUEST TYPE </label>
          <input class="form-control" type="text" name="type" id='type' value="DELETE ITEM" readonly><br>


          <label for="type">REQUEST MESSAGE </label>
          <input class="form-control" type="text" name="message" id="message" value="<?php echo $Customer;?>"><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="deletec" >SEND </button>
            <button type="button" class="btn btn-success"  >CLOSE </button>
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>



      <!-- The Modal -->
  <div class="modal" id="delete_<?php echo $Customer?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">DELETE CUSTOMER</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="customer_delete.php?cid=<?php echo $Customer?>" method="post">
          ARE YOU SURE YOU WANT TO DELETE <?php echo $FName; echo $LName;?>?
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="delete" >DELETE </button>
            <button type="button" class="btn btn-success"  >CLOSE </button>
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>




    


 

  

        <!-- The Modal -->
  <div class="modal" id="update_<?php echo $Customer?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">UPDATE CUSTOMER</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>






          
          <!-- Modal body -->
          <div class="modal-body">
          <form class="form-control" action="customer_edit.php?cid=<?php echo $Customer?>" method="post" >
<label for="fname">CUSTOMER ID</label><br>
<input  class="form-control" type="text" name="cids" id="fname" placeholder="Customer ID " required value="<?php echo $Customer?>"><br>

<label for="fname">FIRST NAME</label><br>
<input  class="form-control" type="text" name="fname" id="fname" placeholder="First Name " required value="<?php echo $FName?>"><br>


<label for="SaleID">LAST NAME</label><br>
<input  class="form-control" type="text" name="lname" id="SaleID" placeholder="Last Name " required value="<?php echo $LName?>"><br>

<label for="gender">GENDER</label><br>
<select class="form-control" name="gender" id="gender">
<option name='product' id='product' value="<?php echo $Gender?>"><?php echo $Gender?></option>
<?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Customer' AND COLUMN_NAME = 'CustomerGender' ";
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


<label for="address">ADDRESS</label><br>
<input  class="form-control" type="text" name="locate" id="address" placeholder="Location(eg; Spintex) " required value="<?php echo $Address?>"><br>



<label for="datime">PHONE NUMBER</label><br>
<input   class="form-control"type="text" name="phone" id="datime" required value="<?php echo $Phone?>"><br>

<label for="status">STATUS</label><br>
<select class="form-control" name="status" id="status">
<option name='product' id='product' value="<?php echo $Status?>"><?php echo $Status?></option>
<?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Customer' AND COLUMN_NAME = 'Status' ";
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



<label for="diag">DIAGNOSIS</label><br>
<select class="form-control" name="diag" id="diag">
<option name='product' id='product' value="<?php echo $Diagnosis?>"><?php echo $Diagnosis?></option>
<?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Customer' AND COLUMN_NAME = 'Diagnosis' ";
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


<label for="datime">LAST CHECK-UP DATE</label><br>
<input   class="form-control" type="date" name="checkup" id="datime" required value="<?php echo $LCheck?>"><br>

          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="add" >UPDATE </button>
            <button type="button" class="btn btn-success" data-dismiss="modal" >CLOSE </button>
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>