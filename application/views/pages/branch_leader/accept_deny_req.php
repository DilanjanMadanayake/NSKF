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
                      
<!--  *********************************************body***********************************************-->

        <div class="form-group">
 
          <div class="row">     

          

<!--              <form class="form form-vertical" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=$user_id";?>" method="post">-->
               <?php echo form_open('branch_leader/request_btnclick'."/".$id); ?>       
              <div class="control-group">
                   <?php foreach ($member as $row){ ?>
                    
                     <table class="table">
                    <tr>
                        <td><strong>Name</strong></td>
                        <td>:  
                        <?php 
                            echo $row->first_name." ".$row->last_name; 
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>E-Mail Address</strong></td>
                        <td>:  
                        <?php 
                            echo $row->email; 
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td>
                        <td>:
                        <?php
                            echo $row->address;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Contact Number</strong></td>
                        <td>: 
                        <?php
                            echo $row->contact_number;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Date of Birth</strong></td>
                        <td>:
                        <?php
                            echo $row->date_of_birth;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Gender</strong></td>
                        <td>:
                        <?php
                            echo $row->gender;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Nationality</strong></td>
                        <td>:
                        <?php
                            echo $row->nationality;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Religion</strong></td>
                        <td>:
                        <?php
                            echo $row->religion;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Occupation</strong></td>
                        <td>:
                        <?php
                            echo $row->occupation;
                        ?>
                        </td>
                        <td>&nbsp;</td>

                    </tr>
                    <tr>
                        <td><strong>Accept</strong></td>
                        <td>:
                        <small><a href="<?php echo base_url("branch_leader/accept")."/".$id ?>"><span class="glyphicon glyphicon-ok"></span></a></small>
                        </td>
                        <td>&nbsp;</td>

                    </tr>
                    <tr>
                        <td><strong>Deny</strong></td>
                        <td>:
                        <small><a href="<?php echo base_url("branch_leader/deny")."/".$id ?>"><span class="glyphicon glyphicon-remove"></span></a></small>
                        </td>
                        <td>&nbsp;</td>

                    </tr>
                    
                    </table>
                  

                   <?php } ?>
                  
                  
             <?php echo form_close(); ?>
<!--              </form>-->
              </div>
              </div>
        
          

        </div>
                      

                    
             
<!--*****************************************body ends************************************************-->
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

