
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

			 
              
             
              
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Branch Leader Privileges</h4></div>
                  <div class="panel-body">
                      
                      
                      <div class="row">
                    <div class="col-md-12">
                        
                        <?php echo form_open('chief_instructor/update_privileges/'.$id) ?>
                    <table class="table">
         
                        <?php //while ( $row = mysqli_fetch_array($user_list) ) { ?>
                        <?php foreach ($privilege as $row){ ?>
                        <tr>
                            <td>Name :</td>
                            <td><?php echo $row->first_name." ".$row->last_name; ?></td>
                        </tr>
                        <tr>
                            <td>Branch :</td><?php foreach ($branch as $row1){ ?>
                            <td><?php echo $row1->branch_name; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>E-mail :</td>
                            <td><?php echo $row->email; ?></td>                           
                        </tr>
                        <tr>
                            <td>Contact :</td>
                            <td><?php echo $row->contact_number; ?></td>                           
                        </tr>
                        <tr>
                            <td>Privileges :</td>
                            <td><textarea rows="5" name="privilege" class="form-control" id="address" placeholder="Add Privilege"><?php foreach ($details as $row2){ echo $row2->privilege;} ?></textarea></td>                           
                        </tr>
                        <tr>
                            <td><button type="submit" name="submit" class="btn btn-primary">Update Privilege</button></td>
                            <td></td>
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


