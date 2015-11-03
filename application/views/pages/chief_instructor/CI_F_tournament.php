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
                  <div class="panel-heading"><h4>Tournaments</h4></div>
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->


<form action="CI_F_tournament.php">
     <div class ="form-group" > 
         
            <div class="col-md-12">
         <table class="table">
                                <tr>
                                    
                                    <th>Tournament Name</th>
                                      <th>View Results</th>
                                    <th>Registered Players</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    
                                </tr>

                               <?php foreach ($ForeignTournaments as $row){ ?>
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
                    
             
<!--**********************************************************************-->
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

