<body>

<!-- Main -->
<div class="container-fluid">
<div class="row">
<!-- /col-3 -->
<div class="col-sm-9">

<!--*******************Side Bar*********************-->
    
      
		<div class="row">
                     
            <!-- center left-->	
         	<div class="col-md-12">
 
              
                            
<!--***********************************panel start**********************************************-->
             <div class="panel panel-default">
                  <div class="panel-heading"><h4>Create a tournament</h4></div>
                  <div class="panel-body">
<!-- *******************************************************************************************-->


<div class="form-group">

         
          <div class="row">      
             
              <div class="col-md-6">

                   <?php 
                if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <strong>Congrats!</strong> You have been successfully registered to the tournament. 
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
     <?php echo form_open('chief_instructor/CI_create'); ?>
                  
                  
                  
                  
                  
                <label>Tournament Name</label>
                <input type="text" class="form-control" name="tournament_name" id="tournament_name" placeholder="Tournament Name" value="<?php echo set_value('tournament_name'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('tournament_name'); ?>
                             </span>
                <label>Tournament Date</label>
                <input type="date" class="form-control" name="tournament_date" id="tournament_date" placeholder="Date">
                <span class="help-block" style="color: crimson"> <?php echo form_error('tournament_date'); ?>
                             </span>
                <label>Tournament Type</label>
                <select name="tournament_type" class="form-control" id="tournament_type">
                    <option value="select">Select type</option>
                    <option value="local">Local Tournament</option>
                    <option value="foreign">Foreign Tournament</option>                    
                </select>
                <span class="help-block" style="color: crimson"> <?php echo form_error('tournament_type'); ?>
                             </span></br>
                <label>Location</label>
                <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="<?php echo set_value('location'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('location'); ?>
                             </span>
                <label>Tournament Overview</label>
                <textarea rows="6" name="overview" class="form-control" id="overview" placeholder="Tournament Overview" value="<?php echo set_value ('overview'); ?>"></textarea>
                <span class="help-block" style="color: crimson"> <?php echo form_error('overview'); ?>
                             </span>
                <label>Tournament Organizer</label>
                <input type="text" class="form-control" name="org_name" id="org_name" placeholder="Organizer" value="<?php echo set_value ('org_name'); ?>">
                <span class="help-block" style="color: crimson"><?php echo form_error('org_name'); ?>
                             </span>
                <label>Organizer's Contact Number</label>
                <input type="text" class="form-control" name="org_contactnum" id="org_contactnum" placeholder="Organizer's Contact Number" value="<?php echo set_value('org_contactnum'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('org_contactnum'); ?>
                             </span>
                <label>Organizer's email</label>
                <input type="text" class="form-control" name="org_email" id="org_email" placeholder="Organizer's email" value="<?php echo set_value('org_email'); ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('org_email'); ?>
                             </span>
                
                
                <button type="submit" name="submit" class="btn btn-primary">Create</button>
                     <?php echo form_close(); ?>
              
              </div>
              <div class="col-md-6"></div>
         
          </div>
        </div>

                    
<!--***********************************************************************-->

                  </div>
<!--/**********************panel-body*************************************-->
              </div><!--/panel-->
	
			  <hr>              

			  <!--tabs-->

               
              <!--/tabs-->
          	</div><!--/col-->
        	<!--/col-span-6-->
                </div>
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


