
<body>
   
   
<!-- Main -->
<div class="container-fluid">
<div class="row">
<!-- /col-3 -->
<!--*******************Side Bar*********************-->



    <div class="col-sm-9">
      	
            
		<div class="row">
           
            
          
            <!-- center left-->	
         	<div class="col-md-12">
 
              
                         
              
               <?php 
                if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                             You have been successfully create an traning schedule. 
                        </div>
                    </div>";
                } 
                if(validation_errors()) {
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-danger\" role=\"alert\">                            
                            <strong>ERROR!</strong> Please fix the errors .
                        </div>
                    </div>";
                }
                ?>
    
 
              
              
              
<!--              *************************panel start****************************-->
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Create your training schedule here</h4></div>
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->
            <div class="container">
                <div class="col-md-6">

                    
                    
 <?php echo form_open('branch_leader/create_traning_schedule');?>
 
 <table width='500' border='0' cellpadding='5' cellspacing='1'>
     <tr>
         <td><label>Training Schedule Date: </label></td>
         <td><input type="date" class="form-control" name="training_schedule_date" id="training_schedule_date" class=" datepicker" placeholder="Training Schedule Date">  
                <span class="help-block" style="color: crimson"> <?php echo form_error('date');?>
                </span> </td>
     </tr>
     <tr>
                        <br/>
                        <td><label>Time:</label></td>
                        <td><input type="time" name="schedule_time" id="schedule_time" placeholder="" value="<?php echo set_value('schedule_time'); ?>">
                             <span class="help-block" style="color: crimson"> <?php echo form_error('time');?>
                             </span></td>
                        <br/>    
                        
      </tr>
       <tr>
                        <td> <label>Schedule Description:</label></td>
                        <td> <textarea rows="5" name="schedule_description" class="form-control" id="schedule_description" placeholder=""><?php echo set_value('schedule_description'); ?></textarea>
                             <span class="help-block" style="color: crimson"> <?php echo form_error('schedule_description');?>
                             </span></td>
                             
                             
                        <br/>
      </tr>
      <tr>  
                        <td> <label>Venue:</label></td>
                        <td> <input type="text" name="venue" id="venue" placeholder="" value="<?php echo set_value('venue'); ?>">
                             <span class="help-block" style="color: crimson"> <?php echo form_error('venue');?>
                             </span></td>
                        <br/>
      </tr>
      <tr>
                        <td><label>Schedule made by: </label></td>
                        <td><input type="text" class="form-control" id="organizer" name="organizer"  value="<?php foreach ($name as $row){ echo $row->first_name." ".$row->last_name; }?>" readonly>
                            <br/></td>
     </tr>
     <tr>
                        <td>
                       <button type="submit" name="submit" class="btn btn-primary">Submit</button>   
                        </td>
     </tr>
 </table>
 </div>
                <?php echo form_close(); ?>
                               


            </div>
                    
             
<!--*************************************************-->
                  </div>
                  <!--/*********************panel-body*************************************-->
              </div><!--/panel-->
	
			  <hr>              

   
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


