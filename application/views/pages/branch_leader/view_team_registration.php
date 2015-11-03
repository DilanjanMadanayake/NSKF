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
                
              
           
              
               <?php echo form_open('branch_leader/view_team_registration/'.$id); ?>
              
   
                <?php foreach ($tournament_name as $row){ ?>
               
              <div class="panel panel-default">
                  <div class="panel-heading"><h4> <?php echo $row->tournament_name; ?></h4></div>
                  <div class="panel-body">
                       <?php } ?>
                        
                      <div class="col-sm-3 col-md-3 pull-right">
           <form class="navbar-form" role="search" method="post" action="<?php  echo base_url("branch_leader/team_registration_search"); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form> 
        </div> 
                      
                      <div class="row">
                    <div class="col-md-12">
                      <?php foreach ($teams_players as $row){ ?>
                         <table class="table table-striped">
                              
                             <tr>
                                 <td><b>Player 1</b></td>
                             <td><b>Player 2</b></td>
                              <td><b>Player 3</b></td>
                        </tr><br>
                        <tr></tr>
                        <tr>
                            <td><?php echo $row->name; ?></td>
                             <td><?php echo $row->name_2; ?></td>
                              <td><?php echo $row->name_3 ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $row->contact_number; ?></td>
                             <td><?php echo $row->contact_number_2; ?></td>
                              <td><?php echo $row->contact_number_3?></td>
                        </tr>
                        <tr>
                            <td><?php echo $row->gender; ?></td>
                             <td><?php echo $row->gender_2; ?></td>
                              <td><?php echo $row->gender_3?></td>
                        </tr>
                        <tr>
                            <td><?php echo $row->tournament_section; ?></td>
                             <td><?php echo $row->tournament_section_2; ?></td>
                              <td><?php echo $row->tournament_section_3 ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $row->tournament_under; ?></td>
                             <td><?php echo $row->tournament_under_2; ?></td>
                              <td><?php echo $row->tournament_under_3 ?></td>
                        </tr>
                         <tr>
                            <td><?php echo $row->belts; ?></td>
                             <td><?php echo $row->belts_2; ?></td>
                              <td><?php echo $row->belts_3 ?></td>
                        </tr>
                        
                         
                         </table>
                        
                         <?php } ?>
                        
                        
                        
       
   

                    </div>
                </div>

                 
             

                  </div><!--/panel-body-->
              </div> 
             <?php echo form_close(); ?>
             
              
              
              <!--/panel-->
	
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


