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
                            <strong>SUCCESS!</strong> User record has been successfully DELETED
                        </div>
                    </div>";
                } 
               
                ?>

              
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Members</h4></div>
                  <div class="panel-body">
                      
                      
                      <div class="row">
                    <div class="col-md-12">
                        <?php echo form_open('branch_leader/index'); ?>
                      
                    <table class="table">
                        <tr>
                            <td>#</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Email</td>
                            <td>Contact Number</td>
                            <td>Branch</td>
<!--                            <td>User Type</td>-->
                            <td>Edit</td>
                            <td>Delete</td>
                            
                        </tr>
                        <?php //while ( $row = mysqli_fetch_array($user_list) ) { ?>
                        <?php foreach ($member as $row){ ?>
                        <tr>
                            <td><?php echo $row->user_id; ?></td>
                            <td><?php echo $row->first_name; ?></td>
                            <td><?php echo $row->last_name; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->contact_number; ?></td>
                            
                            <?php foreach ($branch as $row1){ ?>
                            <td><?php echo $row1->branch_name; ?></td>
                            <?php } ?>
                        
               
   

<!--                            <td><small><a href="<?php //echo base_url("branch_leader/update_member");?>?id=<?php //echo $row->user_id ?>"><span class="glyphicon glyphicon-pencil"></span></a></small></td>-->
<!--                            <td><small><a href="<?php //echo base_url("branch_leader/delete_member");?>?id=<?php //echo $row->user_id ?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this user?');"></span></a></small></td>-->
                            <td><small><a href="<?php echo base_url("branch_leader/update_member")."/". $row->user_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></small></td>
                            <td><small><a href="<?php echo base_url("branch_leader/delete_member")."/".$row->user_id;?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this user?');"></span></a></small></td>
                        </tr>
                        <?php } ?>
                    </table>
                <?php echo form_close(); ?>
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

