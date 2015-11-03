<body>

<!-- Main -->
<div class="container-fluid">
<div class="row">

    <div class="col-sm-9">
      	
           
		<div class="row">
           
            
          
            <!-- center left-->	
         	<div class="col-md-12">
			 
              

              
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Add Member Details</h4></div>
                  <div class="panel-body">
                      
<!--  *********************************************body***********************************************-->

        <div class="form-group">

        <?php 
            if($status == 1){
                echo
                "<div class=\"row\">
                    <div class=\"alert alert-warning alert-success\" role=\"alert\">
                        <strong>Congrats!</strong> A New Member has been added. 
                    </div>
                </div>";
            } 
            if(validation_errors()) {
                echo
                "<div class=\"row\">
                    <div class=\"alert alert-warning alert-danger\" role=\"alert\">                            
                        <strong>ERROR!</strong> Please fix the errors and submit again.
                    </div>
                </div>";
            }
        ?>
  
          <div class="row">     

          
                <div class="col-md-6">

                   <?php echo form_open('branch_leader/add_new_member'); ?>
                <div class="control-group">
                <label>First Name</label>    
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php echo set_value('firstname');?>">
                <span class="help-block" style="color: crimson"><?php echo form_error('firstname'); ?>
                             </span>
                <br/>
                <label>Last Name</label> 
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo set_value('lastname'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('lastname'); ?>
                             </span>
                <br/>
               <label>Branch</label> 
                <select name="branch" class="form-control" onchange="this.form.submit()" class="form-control" id="branch">
                    <option value="select">Select Branch</option>
                    <?php  //while($branchRow = mysqli_fetch_array($branchList)) { ?>
                    <?php foreach ($branch as $row) { ?>
                    <option value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?> </option>
                    <?php } ?>
                </select>
                <br/>                
                <span class="help-block" style="color: crimson"><?php echo form_error('branch');?></span>
                <br/>
                <label>Email</label>     
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('email');?>
                             </span>
                <br/>
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('password');?>
                             </span>
                <br/>
                <label>Address</label>
                <textarea rows="5" name="address" class="form-control" id="address" placeholder="Address"><?php echo set_value('address'); ?></textarea>
                <span class="help-block" style="color: crimson"> <?php echo form_error('address');?>
                             </span>
                <br/>
                <label>Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob" class=" datepicker" placeholder="Date of Birth">
                <span class="help-block" style="color: crimson"> <?php echo form_error('dob');?>
                             </span>
                <br/>
                <label>Gender</label>
                <select name="gender" class="form-control" id="gender">
                    <option value="select">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>                    
                </select>
                <br/>
                <span class="help-block" style="color: crimson"> <?php echo form_error('gender');?>
                             </span>
                
<!--                <input type="radio" name="gender" id="gender" placeholder="Gender">-->
                <br/>
                <label>Nationality</label>
                <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality" value="<?php echo set_value('nationality'); ?>">
                <br/>
                <label>Religion</label>
                <input type="text" class="form-control" name="religion" id="religion" placeholder="Religion" value="<?php echo set_value('religion'); ?>">
                <br/>
                <label>Contact Number</label>
                <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact Number" value="<?php echo set_value('contact'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('contact'); ?>
                             </span>
                <br/>
                <label>Civil Status</label>
                <input type="text" class="form-control" name="status" id="status" placeholder="Civil Status" value="<?php echo set_value('status'); ?>">
                <br/>
                <label>Occupation</label>
                <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Occupation" value="<?php echo set_value('occupation'); ?>">
                <br/>
                <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                </div>
                <?php echo form_close(); ?>
                </div>
                <div class="col-md-6"></div>
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


