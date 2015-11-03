
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
                  <div class="panel-heading"><h4>Create your exam schedule here</h4></div>
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->




         <?php 
                if($insertionStatus == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            
                            <strong>SUCCESS!</strong> Examination schedule has been successfully created. 
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
      
   
            <div class="container">
                <div class="col-md-6">
                
                        <?php echo form_open('branch_leader/exam_schedule_create'); ?>

                        <label>Exam type: </label>
                        <input type="text" class="form-control" id="trSchDate" name="examType"  value="" >
                        <span class="help-block" style="color: crimson"><?php echo form_error('examType'); ?> 
                             </span>
                        <br/>
                        <label>Sub type:</label>
                        <input type="text" class="form-control" id="time" name="subType"  value="" >
                        <span class="help-block" style="color: crimson"><?php echo form_error('subType'); ?> 
                             </span>
                        <br/>    
                        <label>Applicant's rank should be:</label>
                        <input type="text" class="form-control" id="time" name="currRank"  value="" >
                        <span class="help-block" style="color: crimson"><?php echo form_error('currRank'); ?>
                             </span>
                        <br/>
                        <label>Promoting to rank:</label>
                         <input type="text" class="form-control" id="time" name="targetRank"  value="" >
                         <span class="help-block" style="color: crimson"><?php echo form_error('targetRank'); ?>
                             </span>
                        <br/>
                        <label>Number of times exam held per year: </label>
                        <input type="text" class="form-control" id="time" name="ehpeM"  value="" >
                        <span class="help-block" style="color: crimson"><?php echo form_error('ehpeM'); ?>
                             </span>
                        <br/>
                        <label>Date of closest exam: </label>
                        <input type="date" class="form-control" id="venue" name="dte"  value="" >
                        <span class="help-block" style="color: crimson"><?php echo form_error('dte'); ?>
                             </span>
                        
                        <br/>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        
                <?php echo form_close(); ?>
                </div>


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

