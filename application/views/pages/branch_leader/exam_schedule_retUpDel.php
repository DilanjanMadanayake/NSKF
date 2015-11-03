
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
                  <div class="panel-heading"><h4>Examination Schedules</h4></div>
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->

                    
         <?php 
                if($deleteStatus == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            
                            <strong>SUCCESS!</strong> Examination schedule has been successfully deleted. 
                        </div>
                    </div>";
                } 
                ?>
            <div class="form-group">
            <table class="table">
                <tr>
                <th>Exam Type</th>
                <th>Sub Type</th>
                <th>Applicant's Rank</th>
                <th>Promoting Rank</th>
                <th>Number of times exam held per year</th>
                <th>Closest Exam Date</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>
  
                <?php //while ($user = mysqli_fetch_array($records)) { ?>
                <?php foreach ($exam as $row){ ?>
                <tr>

                    <td><?php echo $row->exam_type ?></td>
                    <td><?php echo $row->sub_type ?></td>
                    <td><?php echo $row->current_rank ?></td>
                    <td><?php echo $row->target_rank ?></td>
                    <td><?php echo $row->times_per_year ?></td>
                    <td><?php echo $row->next_exam_date ?></td>
                    <td><small><a href="<?php echo base_url("branch_leader/update_exam")."/". $row->exam_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></small></td>
                    <td><small><a href="<?php echo base_url("branch_leader/delete_exam")."/". $row->exam_id; ?>"><span class="glyphicon glyphicon-remove" onclick="return confirm('Are you sure you want to delete this record?');"></span></a></small></td>

                </tr>
                <?php } ?>
            </table>
            </div>
                        
                    
             
<!--*************************************************-->
                  </div>
                  <!--/*********************panel-body*************************************-->
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

