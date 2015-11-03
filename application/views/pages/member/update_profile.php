<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   
<div class="contactform center">
     <h3><span class="glyphicon glyphicon-user"></span> Update Profile</h3>

        <?php 
                if($updateStatus == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <strong>Congrats!</strong> Member details has been updated. 
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

           
              <div class="col-sm-6 col-sm-offset-3 ">
              
              <?php echo form_open('member/update_profile'."/".$id); ?> 
                  <?php foreach ($member as $row){ ?>
                  <div class="control-group">
                <label>First Name</label>      
                <input type="text" class="form-control" name="firstname" id="lastname" placeholder="First Name" value="<?php echo $row->first_name; ?>">
                <span class="help-block" style="color: crimson"><?php echo form_error('firstname'); ?>
                             </span><br/>
                <label>Last Name</label> 
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $row->last_name; ?>">
                <span class="help-block" style="color: crimson"><?php echo form_error('lastname'); ?>
                             </span><br/>
    
                <label>Branch</label>
                    <?php foreach ($branch as $row1){ ?>
                   <input type="text" class="form-control" name="branch" id="email" placeholder="branch" value="<?php echo $row1->branch_name; ?>" disabled>
                        <?php } ?>
                  <br/> 
                <label>Email</label> 
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $row->email; ?>" disabled>
                <br/>    
<!--                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <span class="help-block" style="color: crimson"> 
                             </span>-->
                <label>Address</label> 
                <textarea rows="5" class="form-control"  name="address" id="address" placeholder="Address" ><?php echo $row->address; ?></textarea>
                <span class="help-block" style="color: crimson"><?php echo form_error('address'); ?>
                             </span><br/>
                <label>Date of Birth</label>                             
                <input type="text" class="form-control" name="dob" id="dob" class=" datepicker" placeholder="Date of Birth" value="<?php echo $row->date_of_birth; ?>" >
                <span class="help-block" style="color: crimson"><?php echo form_error('dob'); ?>
                             </span><br/>
<!--                <select name="gender" class="form-control" id="gender" ">
                    <option value="select">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>                    
                </select>-->
<!--                <input type="radio" name="gender" id="gender" placeholder="Gender">-->
                <label>Nationality</label>                
                <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality" value="<?php echo $row->nationality; ?>" ><br/>
                <label>Religion</label>
                <input type="text" class="form-control" name="religion" id="religion" placeholder="Religion" value="<?php echo $row->religion; ?>" ><br/>
                <label>Contact Number</label>
                <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact Number" value="<?php echo $row->contact_number; ?>" >
                <span class="help-block" style="color: crimson"><?php echo form_error('contact'); ?>
                             </span><br/>
                <label>Occupation</label>
                <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Occupation" value="<?php echo $row->occupation; ?>" ><br/>
                
<!--                <h4><b>Payment Details</b></h4>
                <input type="text" name="bank" id="bank" placeholder="Bank">
                <input type="text" name="date" id="date" placeholder="Date">
                <input type="text" name="slip_number" id="slip_number" placeholder="Bank Slip Number">-->
                <button type="submit" name="submit" class="btn btn-warning bgcolor">Update Details</button>
                <?php echo form_close(); ?>
              </div>
              </div>
              <?php } ?>
              </div>
        
          

        </div>



</div>
<!-- blockblack -->

</div>
<!-- overlay -->



<!-- Footer Starts -->
<?php include("../includes/user/footer.php"); ?>