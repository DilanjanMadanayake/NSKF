
<body>

<!-- Main -->
<div class="container-fluid">
<div class="row">
<!-- /col-3 -->
<!--*******************Side Bar*********************-->



    <div class="col-sm-9">
      	
     
      
		<div class="row">
           
            
          
            <!-- center center-->	
         	<div class="col-md-12">
 
              
              
              
              
                 <?php 
             if($status == 1){				
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
                            <strong>SUCCESS!</strong> Tournament record has been successfully deleted.
                        </div>
                    </div>";
                } 
                if($status == 2){				
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
                            <strong>SUCCESS!</strong> Tournament overview has been successfully updated.
                        </div>
                    </div>";
                }
                if($status == 3){				
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
                            <strong>SUCCESS!</strong> Tournament organizer has been successfully updated.
                        </div>
                    </div>";
                }
                if($status == 4){				
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
                            <strong>SUCCESS!</strong> Tournament results has been successfully updated.
                        </div>
                    </div>";
                }

                  ?>
<!--              *************************panel start****************************-->
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Today's Tournaments</h4></div>
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->

     <div class ="form-group" > 
        
            <div class="col-md-12">
                <?php echo form_open('chief_instructor/today_tornament'); ?>
         <table class="table table-condensed">
             
                                <tr>
                                    <td>Tournament Name</td>
                                    <td align='center'>Tournament Date</td>
                                    <td align='center'>Add Refree Marks</td>
                                    
                                    
                                </tr>
   
                               <?php foreach ($tournaments as $row){ ?>
                                    <tr>                                   
                                        <td>
                                         <?php echo $row->tournament_name; ?>
                                        </td>   
                                         <td align='center'>
                                          <?php echo $row->tournament_date; ?>   
                                     </td>
                                        <td align='center'>
                                            <a href="<?php echo base_url("chief_instructor/add_refree_marks")."/".$row->tournament_id;?>"><span class="glyphicon glyphicon-plus"></span></a>                              
                                    </td>
                                                                               
                                    </tr>
                                <?php } ?>

                            </table>
                </div>

</div>
          <?php echo form_close(); ?>
                    
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
<!-- /Main -->


