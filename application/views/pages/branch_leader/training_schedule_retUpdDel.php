
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
                  <div class="panel-heading"><h4>Training Schedules</h4></div>
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->

                    
         <?php 

             if($status == 1){				
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
                            <strong>SUCCESS!</strong> Training Schedule record has been successfully deleted.
                        </div>
                    </div>";
             }
                    if($status == 2){				
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
                            <strong>SUCCESS!</strong> raining schedule has been successfully updated. 
                        </div>
                    </div>";
                
                } 
                ?>
                    
                    
            <div class="form-group">
            <table class="table">
                <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Description</th>
                <th>Venue</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>
               
  
                <?php foreach ($training_schedule as $row){ ?>

                <tr>

                    <td><?php echo $row->training_schedule_date ?></td>
                    <td><?php echo $row->schedule_time ?></td>
                    <td><?php echo $row->schedule_description ?></td>
                    <td><?php echo $row->venue ?></td>
                    <td><small><a href=" <?php echo base_url("branch_leader/update_training_schedule")."/".$row->training_schedule_id;?>"<span class="glyphicon glyphicon-pencil"></span></a></small></td>
                    <td><small><a href="<?php echo base_url("branch_leader/delete_training_schedule")."/".$row->training_schedule_id;?>"<span class="glyphicon glyphicon-trash" onclick="return confirm('Are you really want to delete this training schedule?')"></span></a></small></td>
                              
                <?php } ?>
            </table>
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


