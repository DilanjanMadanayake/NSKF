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
                          
                  <div class="panel-heading"><h4>Member Request</h4></div>
                  <div class="panel-body">
                <?php
                if($status == 1){ ?>
                    
                    <div class="row">
                        <div class="alert alert-warning alert-success" role="alert">
                        <strong>Congrats!</strong> This Member has been added. Go back to <a href="<?php echo base_url('branch_leader/member_request') ?>">Member Requests</a>
                        </div>
                    </div>
                    <?php
                } 
                ?>
                <?php
                if($status == 2){ ?>
                    
                    <div class="row">
                        <div class="alert alert-warning alert-success" role="alert">
                        <strong>Congrats!</strong> This Member request has been denied. Go back to <a href="<?php echo base_url('branch_leader/member_request') ?>">Member Requests</a>
                        </div>
                    </div>
                    <?php
                } 
                ?>
                      
                      
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
                            <td>view</td>
                            
                            
                        </tr>
                        <?php foreach ($member as $row){ ?>
                        <tr>
                            <td><?php echo $row->user_id; ?></td>
                            <td><?php echo $row->first_name; ?></td>
                            <td><?php echo $row->last_name; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->contact_number; ?></td>
                            <td><small><a href="<?php echo base_url("branch_leader/accept_deny_req")."/". $row->user_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></small></td>
                            
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

