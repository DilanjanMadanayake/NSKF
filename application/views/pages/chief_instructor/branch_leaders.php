
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
                   
              
              
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Branch Leaders</h4></div>
                  <div class="panel-body">
                      
                      
                      <div class="row">
                    <div class="col-md-12">
                        <form action="members.php" method="post">
                    <table class="table">
                        <tr>
                            <td>#</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Email</td>
                            <td>Contact Number</td>
<!--                            <td>Branch</td>-->
                            <td>View Privileges</td>
                            <td>Add Privileges</td>
                            <td>Edit Privileges</td>
                            
                        </tr>
                        <?php //while ( $row = mysqli_fetch_array($user_list) ) { ?>
                        <?php foreach ($leader as $row){ ?>
                        <tr>
                            <td><?php echo $row->user_id; ?></td>
                            <td><?php echo $row->first_name; ?></td>
                            <td><?php echo $row->last_name; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->contact_number; ?></td>
                           
<!--                            <td><?php //foreach ($branch as $row1){ echo $row1->branch_name; } ?></td>-->
                            

   

                            <td><small><center><a href="<?php echo base_url("chief_instructor/privileges")."/".$row->user_id ?>"><span class="glyphicon glyphicon-eye-open"></span></a></center></small></td>
                            <td><small><center><a href="<?php echo base_url("chief_instructor/add_privileges")."/".$row->user_id ?>"><span class="glyphicon glyphicon-plus"></span></a></center></small></td>
                            <td><small><center><a href="<?php echo base_url("chief_instructor/update_privileges")."/".$row->user_id ?>"><span class="glyphicon glyphicon-pencil"></span></a></center></small></td>
                        </tr>
                        <?php } ?>
                    </table>
                </form>
                    </div>
                </div>

                    
             

                  </div><!--/panel-body-->
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

