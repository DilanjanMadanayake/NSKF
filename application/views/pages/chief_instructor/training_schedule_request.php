
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
 
              
              
              
              
                 <?php 
             if($status == 1){				
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
                            <strong>SUCCESS!</strong> Training Schedule request has been accepted.
                        </div>
                    </div>";
                } 
                if($status == 2){				
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
                            <strong>SUCCESS!</strong> Training Schedule request has been rejected.
                        </div>
                    </div>";
                }
              
           ?>           
                </div>
                  </div>
                

                  
<!--              *************************panel start****************************-->
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Training Schedule Requests</h4></div>
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->

     <div class ="form-group" > 
        
            <div class="col-md-12">
         <table class="table">
                                <tr> <th>Branch ID</th>
                                     <th>Training Schedule Date</th>
                                     <th>Time</th>
                                     <th>Venue</th>
                                     <th>Accept</th>
                                     <th>Deny</th>
                        
                                    
                                </tr>
   
                               <?php foreach ($training_schedule as $row){ ?>
                                    <tr>                                   
                                        <td>
                                         <?php echo $row->branch_name; ?>
                                        </td> 
                                         
                                          <td>
                                         <?php echo $row->training_schedule_date; ?>
                                        </td> 
                                         <td>
                                         <?php echo $row->schedule_time; ?>
                                        </td> 
                                         <td>
                                         <?php echo $row->venue; ?>
                                        </td> 
                                          <td>
                        <small><a href="<?php echo base_url("chief_instructor/accept")."/".$row->training_schedule_id;?>"><span class="glyphicon glyphicon-ok"></span></a></small>
                        </td>
<!--                        <td>&nbsp;</td>-->
                        <td>
                        <small><a href="<?php echo base_url("chief_instructor/deny")."/".$row->training_schedule_id;?>"><span class="glyphicon glyphicon-remove"></span></a></small>
                        </td>
<!--                        <td>&nbsp;</td>-->
                                         
                                      
                                        
                                    </tr>
                                <?php } ?>
                                       

                            </table>
                </div>

</div>
          </form>
                    
</div>
                    
             

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


