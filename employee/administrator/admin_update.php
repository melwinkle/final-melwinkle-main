


<!-- This is the modal class for various functionalities accessible to the admin -->

<div class="container">


  
   
  
  <!-- The Modal -->
  <div class="modal" id="myModal_<?php echo $EID?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">UPDATE EMPLOYEE</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form method="post" action="update.php">
            <input class="form-control" type="text" name='id' value="<?php echo $EID;?>"><br>
          <input class="form-control" type="text" placeholder="First Name" name='fname' value="<?php echo $EF;?>"><br>
          <input class="form-control" type="text" placeholder="Last Name" name='lname' value="<?php echo $EL;?>"><br>
          <input class="form-control" type="date" placeholder="DOB"  name='dob'value="<?php echo $DOB;?>"><br>
          <select class="form-control" name="gender" id="gender">
<option name='product' id='product' value="<?php echo $G?>"><?php echo $G?></option>
<?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Employee' AND COLUMN_NAME = 'EmployeeGender' ";
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
          <input class="form-control" type="text" placeholder="Address"  name='address' value="<?php echo $Address;?>"><br>
          <input class="form-control" type="text" placeholder="Telephone 1"  name='tel' value="<?php echo $Telephone;?>"><br>
          <input class="form-control" type="text" placeholder="Telephone 2"  name='tel1'value="<?php echo $Telephone1;?>"><br>

          <input class="form-control" type="text" placeholder="Salary" name='salary' value="<?php echo $Salary;?>"><br>
          <select class="form-control" name="status" id="status">
<option name='product' id='product' value="<?php echo $G?>"><?php echo $Status?></option>
<?php 
    $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Employee' AND COLUMN_NAME = 'EmployeeStatus' ";
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
          <input class="form-control" type="time" placeholder="Shift Time" name='shift'value="<?php echo $Shift;?>"><br>
      
        
       
       
       
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name='submit'  >UPDATE </button>
        </div>
        </form>
      </div>
    </div>
  </div>



   <!-- The Modal -->
   <div class="modal" id="delete_<?php echo $EID?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">TERMINATE EMPLOYMENT</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="delete-e.php?eid=<?php echo $EID;?>" method="post">
           Are you sure you want to terminate <?php echo $EF;?>'s  contract?
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="delete" >TERMINATE </button>
            <button type="button" class="btn btn-success"  >CLOSE </button>
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  
 

    <!-- The Modal -->
    <div class="modal" id="update_<?php echo $EID?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">RESTORE EMPLOYMENT</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="restore-e.php?eid=<?php echo $EID;?>" method="post">
           Are you sure you want to restore <?php echo $EF;?>'s  contract?
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="restore" >RESTORE</button>
            <button type="button" class="btn btn-success"  >CLOSE </button>
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  

      <!-- The Modal -->
      <div class="modal" id="request_<?php echo $id?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">UPDATE PROFILE</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="../../employee/employee_request.php?cid=<?php echo $id;?>" method="post">
          <label for="type">REQUEST TYPE </label>
          <input class="form-control" type="text" name="type" id='type' value="UPDATE PROFILE" readonly><br>


          <label for="type">REQUEST MESSAGE </label>
          <input class="form-control" type="text" name="message" id="message" ><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="updateadmin" >SEND </button>
          
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>



    <!-- The Modal -->
    <div class="modal" id="requestleave_<?php echo $id?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">REQUEST LEAVE</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="../../employee/employee_request.php?cid=<?php echo $id;?>" method="post">
          <label for="type">REQUEST TYPE </label>
          <input class="form-control" type="text" name="type" id='type' value="REQUEST LEAVE" readonly><br>


          <label for="type">REQUEST MESSAGE </label>
          <input class="form-control" type="text" name="message" id="message" ><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="leaveadmin" >SEND </button>
          
          
          </div>
          </form>
        </div>
      </div>
    </div>






    <!-- The Modal -->
<div class="modal" id="approve_<?php echo $MID;?>">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">APPROVE REQUEST</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
      <form action="administrator_messages.php?approve&mid=<?php echo $MID;?>" method="post">
      <input type="text"  name="id" value="<?php echo $MID;?> "readonly ><br>
       Are you sure you want to approve <?php echo $ID?>'s  request?
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="approve" >Yes </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="complete_<?php echo $MID;?>">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">CONFIRM REQUEST</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
      <form action="administrator_messages.php?complete&mid=<?php echo $MID;?>" method="post">
      <input type="text" name="id" value="<?php echo $MID;?>" readonly ><br>
       Have you completed <?php echo $ID?>'s  request?
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="complete" >Yes </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal" id="delete_<?php echo $MID?>">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">DENY REQUEST</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
      <form action="administrator_messages.php?deny&mid=<?php echo $MID;?>" method="post">
      <input type="text" name="id"value="<?php echo $MID;?> "readonly ><br>
       Are you sure you want to deny <?php echo $ID?>'s  request?
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" name="deny" >Yes </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
    </div>