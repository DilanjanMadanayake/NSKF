<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   
       
        <div class="contactform center">
        <h3><span class="glyphicon glyphicon-envelope"></span> Sign Up</h3>
        <?php 
                if (validation_errors()){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-danger\" role=\"alert\">                            
                            <strong>ERROR!</strong> Please fix the errors and submit again.
                        </div>
                    </div>";

                }
                if($status==1)
                
                {
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <strong>Congrats!</strong> A membership request has been sent. You will receive an email notification with your login details shortly. 
                        </div>
                    </div>";

                }
                ?>
  
          <div class="row">      
              <div class="col-sm-6 col-sm-offset-3 ">
                <h4>and become a<br><b>Member!</b></h4>
<!--                <form class="form-horizontal" action="<?php //echo base_url("home/signup")?>" method="post">-->
                    <?php echo form_open('home/signup'); //sign up controller?> 
                
                <label>First Name</label>    
                <input type="text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo set_value('firstname');?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('firstname'); ?>
                             </span>
                <label>Last Name</label> 
                <input type="text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo set_value('lastname'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('lastname'); ?>
                             </span>
               
                <select name="branch" onchange="this.form.submit()" class="form-control" id="branch">
                    <option value="select">Select Branch</option>
                    <?php  //while($branchRow = mysqli_fetch_array($branchList)) { ?>
                    <?php foreach ($branch as $row) { ?>
                    <option value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?> </option>
                    <?php } ?>
                </select>
                <br/>                
                <span class="help-block" style="color: crimson"><?php echo form_error('branch');?></span>
                <label>Email</label>     
                <input type="text" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('email');?>
                             </span>
                <label>Password</label>
                <input type="password" name="password" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('password');?>
                             </span>
                <label>Address</label>
                <textarea rows="5" name="address" id="address" placeholder="Address"><?php echo set_value('address'); ?></textarea>
                <span class="help-block" style="color: crimson"> <?php echo form_error('address');?>
                             </span>
                <label>Date of Birth</label>
                <input type="date" name="dob" id="dob" class=" datepicker" placeholder="Date of Birth">
                <span class="help-block" style="color: crimson"> <?php echo form_error('dob');?>
                             </span>
                <select name="gender" class="form-control" id="gender">
                    <option value="select">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>                    
                </select>
                <br/>
                <span class="help-block" style="color: crimson"> <?php echo form_error('gender');?>
                             </span>
                
<!--                <input type="radio" name="gender" id="gender" placeholder="Gender">-->
                <label>Nationality</label>
                <input type="text" name="nationality" id="nationality" placeholder="Nationality" value="<?php echo set_value('nationality'); ?>">
                <label>Religion</label>
                <input type="text" name="religion" id="religion" placeholder="Religion" value="<?php echo set_value('religion'); ?>">
                <label>Contact Number</label>
                <input type="text" name="contact" id="contact" placeholder="Contact Number" value="<?php echo set_value('contact'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('contact'); ?>
                             </span>
                <label>Civil Status</label>
                <input type="text" name="status" id="status" placeholder="Civil Status" value="<?php echo set_value('status'); ?>">
                <label>Occupation</label>
                <input type="text" name="occupation" id="occupation" placeholder="Occupation" value="<?php echo set_value('occupation'); ?>">
                <button type="submit" name="submit" class="btn btn-warning bgcolor">Sign Up</button>
                <?php echo form_close(); ?>

              </div>
          </div>
        </div>
        



</div>
<!-- blockblack -->

</div>
