
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
          <form action="employee_request.php?cid=<?php echo $id;?>" method="post">
          <label for="type">REQUEST TYPE </label>
          <input class="form-control" type="text" name="type" id='type' value="UPDATE PROFILE" readonly><br>


          <label for="type">REQUEST MESSAGE </label>
          <input class="form-control" type="text" name="message" id="message" ><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="update" >SEND </button>
          
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>



    <!-- The Modal -->
    <div class="modal" id="requestleaves_<?php echo $id?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">REQUEST LEAVE</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="employee_request.php?cid=<?php echo $id;?>" method="post">
          <label for="type">REQUEST TYPE </label>
          <input class="form-control" type="text" name="type" id='type' value="REQUEST LEAVE" readonly><br>


          <label for="type">REQUEST MESSAGE </label>
          <input class="form-control" type="text" name="message" id="message" ><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="leave" >SEND </button>
          
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>





      <!-- The Modal -->
      <div class="modal" id="requests_<?php echo $id?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">UPDATE PROFILE</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="employee_request.php?cid=<?php echo $id;?>" method="post">
          <label for="type">REQUEST TYPE </label>
          <input class="form-control" type="text" name="type" id='type' value="UPDATE PROFILE" readonly><br>


          <label for="type">REQUEST MESSAGE </label>
          <input class="form-control" type="text" name="message" id="message" ><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="updated" >SEND </button>
          
          
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
          <form action="employee_request.php?cid=<?php echo $id;?>" method="post">
          <label for="type">REQUEST TYPE </label>
          <input class="form-control" type="text" name="type" id='type' value="REQUEST LEAVE" readonly><br>


          <label for="type">REQUEST MESSAGE </label>
          <input class="form-control" type="text" name="message" id="message" ><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="leaved" >SEND </button>
          
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>



    <!-- The Modal -->
    <div class="modal" id="withdraw_<?php echo $MID?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">WITHDRAW REQUEST</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="employee_request.php?cid=<?php echo $MID;?>" method="post">
          ARE YOU SURE YOU WANT TO WITHDRAW  MESSAGE <?php echo $MID;?>?

          <label for="type">REQUEST MESSAGE </label>
          <input class="form-control" type="text" name="message" id="message" value="<?php echo $Message;?>" readonly><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="leaved" >SEND </button>
          
          
          </div>
          </form>
        </div>
      </div>
    </div>






    <div class="modal" id="additem">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">ADD NEW ITEM</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          WHICH INVENTORY TYPE ARE YOU ADDING TO?<br>
          <button type='button' class='btn btn-primary' onclick="newpage_3()">
         MEDICINE<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
    
      </button>
      <button type='button' class='btn btn-warning' onclick="newpage_1()">
        TOILETRIES<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
    
      </button><br>
      <button type='button' class='btn btn-danger' onclick="newpage_2()">
       TEST KIT<i class='icon ion-md-checkmark-circle-outline' size='large'></i>
    
    
     
      </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" data-dismiss="modal" >CLOSE </button>
          
          
          </div>
        
        
      </div>
    </div>
    </div>




    <!-- The Modal -->
    <div class="modal" id="restorer_<?php echo $SID?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">RESTORE SUPPLIER CONTRACT</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="binu.php?cid=<?php echo $SID;?>&restorer" method="post">
         <h2>ARE YOU SURE YOU WANT TO RESTORE <?php echo $SB?>'s CONTRACT?</h2>


          
          <input class="form-control" type="text" name="id" id="message" value="<?php echo $SID;?>"><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="restorer" >SEND </button>
          
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>


    <!-- The Modal -->
    <div class="modal" id="restore_<?php echo $SID?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">RESTORE CUSTOMER</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="binu.php?cid=<?php echo $SID;?>&restore" method="post">
         <h2>ARE YOU SURE YOU WANT TO RESTORE <?php echo $SB."".$SF?>?</h2>


          
          <input class="form-control" type="text" name="id" id="message" value="<?php echo $SID;?>"><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="restore" >SEND </button>
          
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

 <!-- The Modal -->
 <div class="modal" id="restorei_<?php echo $SID?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">RESTORE ITEM</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form action="binu.php?cid=<?php echo $SID;?>&restorei" method="post">
         <h2>ARE YOU SURE YOU WANT TO RESTORE <?php echo $SB?>?</h2>


          
          <input class="form-control" type="text" name="id" id="message" value="<?php echo $SID;?>"><br>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="restore" >SEND </button>
          
          
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>