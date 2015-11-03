<body>

<!-- Main -->
<div class="container-fluid">
<div class="row">
<!-- /col-3 -->
<!--*******************Side Bar*********************-->



    <div class="col-sm-9">
      	
      <!-- column 2 -->	
      
      
		<div class="row">
           
            
          
            <!-- center left-->	
         	<div class="col-md-12">
			 
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Edit Member Details</h4></div>
                  <div class="panel-body">
                      
<!--  *********************************************body***********************************************-->

        <div class="form-group">

          
          <div class="row">     

          


               <?php echo form_open('branch_leader/update_member'."/".$id); ?>       
              <div class="control-group">
                   <?php foreach ($member as $row){ ?>
                    
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $row->first_name; ?>" disabled><br/>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $row->last_name; ?>" disabled><br/>
    
                <select name="branch" class="form-control" id="branch">
                    <option value="select">Select Branch</option>
                    <?php  //while($branchRow = mysqli_fetch_array($branchList)) { ?>
                    <?php foreach ($branch as $row) { ?>
                    <option value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?> </option>
                    <?php } ?>
                </select>
                           
                <span class="help-block" style="color: crimson"><?php echo form_error('branch');?>
                </span>  <br/> 

                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $row->email; ?>" disabled>
                <br/>    
<!--                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <span class="help-block" style="color: crimson"> 
                             </span>-->
                
                <textarea rows="5" class="form-control"  name="address" id="address" placeholder="Address" disabled ><?php echo $row->address; ?></textarea>
                <br/>

                <button type="submit" name="submit" class="btn btn-primary">Update Member</button>
                   <?php } ?>
             <?php echo form_close(); ?>
<!--              </form>-->
              </div>
              </div>
        
          

        </div>
                      

                    
             
<!--*****************************************body ends************************************************-->
                  </div><!--/panel-body-->
              </div><!--/panel-->
	
			  <hr>              

			  <!--tabs-->

               
              <!--/tabs-->
     
              

   
          	</div><!--/col-->
        	<!--/col-span-6-->
     
      </div><!--/row-->
      

      
     
      
      <hr>
      
      <div class="row">
        <div class="col-md-12">
         
        </div>
      </div>
  	</div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->
<?php //include("../includes/admin/footer.php"); ?>

