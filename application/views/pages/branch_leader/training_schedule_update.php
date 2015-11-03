
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
 
              
              
<!--              *************************panel start****************************-->
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Update Training Schedules</h4></div>
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->
         <?php 
         
         
      
                    if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            
                            <strong>SUCCESS!</strong> Training schedule has been successfully updated. 
                        </div>
                    </div>";
                } 
               
               ?>

            <div class="container">
                <div class="col-md-6">

<?php echo form_open('branch_leader/update_training_schedule'."/".$id);?>   

    <?php foreach ($training_schedule as $row){ ?>
                    <div class="form-group">
                        <label >Training Schedule Date: </label>
                        <input type="textbox" class="form-control"  id="training_schedule_date" name="training_schedule_date" class="round_textbox" value="<?php echo $row->training_schedule_date; ?>"><br/></td>
                        <br/>
                        <label>Time:</label>
                       <input type="textbox" class="form-control"  id="schedule_time" name="schedule_time" class="round_textbox" value="<?php echo $row->schedule_time ; ?>"><br/></td>
                        <br/>
                        <label>Schedule Description:</label>
                        <input type="textbox" class="form-control"  id="schedule_description" name="schedule_description" class="round_textbox" value="<?php echo $row->schedule_description; ?>"><br/></td>
                        <br/>
                        <label>Venue</label>
                        <input type="textbox" class="form-control"  id="venue" name="venue" class="round_textbox" value="<?php echo $row->venue; ?>"><br/></td>
                        <br/>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return confirm('do you really want to update')">Update</button>
                   
                    </div>
                     <?php } ?>
                </form>
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


