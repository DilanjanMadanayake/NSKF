
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
                  <div class="panel-heading"><h4>Local Tournaments</h4></div>
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->

     <div class ="form-group" > 
        
            <div class="col-md-12">
         <table class="table">
                                <tr>
                                    <th>Tournament Name</th>
                                     <th>View Results</th>
                                    <th>Registered Players</th>
                                    <th>Create Draw</th>
                                    <th>Delete Draw</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                        
                                    
                                </tr>
   
                               <?php foreach ($LocalTournaments as $row){ ?>
                                    <tr>                                   
                                        <td>
                                         <?php echo $row->tournament_name; ?>
                                        </td>   
                                        <td>
                                            <a href="<?php echo base_url("chief_instructor/view_results")."/".$row->tournament_id;?>"<span class="glyphicon glyphicon-eye-open"></span>                              
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url("chief_instructor/registered_players")."/".$row->tournament_id;?>"<span class="glyphicon glyphicon-eye-open"></span>                              
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url("chief_instructor/create_draw")."/".$row->tournament_id;?>"<span class="glyphicon glyphicon-play"></span>                              
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url("chief_instructor/view_draw")."/".$row->tournament_id;?>"<span class="glyphicon glyphicon-remove"></span>                              
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url("chief_instructor/CI_LT")."/".$row->tournament_id;?>"<span class="glyphicon glyphicon-pencil"></span>
                                        </td>                                       
                                        <td>
                                            <a href="<?php echo base_url("chief_instructor/delete_tournaments")."/".$row->tournament_id; ?>"<span class="glyphicon glyphicon-trash" onclick="return confirm('Are you really want to delete this tournament?')"></span></a>
                                        </td>
                                        
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


