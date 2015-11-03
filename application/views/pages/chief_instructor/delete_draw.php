
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

                if(validation_errors()) {
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-danger\" role=\"alert\">                            
                            <strong>ERROR!</strong> Please fix the errors and submit again.
                        </div>
                    </div>";
                }
                if($status == 1){				
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-danger\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
                            <strong>ERROR!</strong> The following tournament draw does not exists.
                        </div>
                    </div>";
                }

                  ?>
<!--              *************************panel start****************************-->
<?php foreach ($tournament as $row){ ?>
              
                  <div class="panel panel-default">
                  <div class="panel-heading"><h4><b><?php echo $row->tournament_name; ?></b></h4>
                      <h5><?php echo $row->tournament_date; ?>
                      </h5>
                  </div>
<?php } ?>
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->

     <div class ="form-group" > 
                
         <div class="col-md-12">
             <table class="table">
                 <?php echo form_open(base_url('chief_instructor/view_draw/'.$id)); ?>
                     <td>
                     
                        <select name="gender" class="form-control" id="tournament_type">
                        <option value="select">Select Gender</option>
                        <option value="male" <?php if($gender=='male') { echo "selected"; }?>>Male</option>
                        <option value="female" <?php if($gender=='female') { echo "selected"; }?>>Female</option>                    
                        </select>
                     </td>
                     <td>
                       
                        <select name="under" class="form-control" id="tournament_type">
                        <option value="select">Select Age Group</option>
                        <option value="Under11"<?php if($under=='Under11') { echo "selected"; }?>>Under 11</option>
                        <option value="Under15"<?php if($under=='Under15') { echo "selected"; }?>>Under 15</option>
                        <option value="Under21"<?php if($under=='Under21') { echo "selected"; }?>>Under 21</option>
                        <option value="Open"<?php if($under=='Open') { echo "selected"; }?>>Open</option>  
                        </select>
                     </td>
                     <td>
                        
                        <select name="tournament_section" class="form-control" id="tournament_type">
                        <option value="select">Select Section</option>
                        <option value="katha"<?php if($tournament_section=='katha') { echo "selected"; }?>>Kata</option>
                        <option value="kumitha"<?php if($tournament_section=='kumitha') { echo "selected"; }?>>Kumite</option>                    
                        </select>
                     </td>
                     <td>
                        
                        <select name="belt" class="form-control" id="tournament_type">
                        <option value="select">Select Belt Type</option>
                        <option value="brown"<?php if($belt=='brown') { echo "selected"; }?>>9-8-7-Brown</option>
                        <option value="yellow"<?php if($belt=='yellow') { echo "selected"; }?>>6-5-4-Yellow</option>
                        <option value="black"<?php if($belt=='black') { echo "selected"; }?>>3-2-1-Black</option> 
                        </select>
                     </td>
                     <td>
                         <button type="submit" value="go" name="submit" class="btn btn-primary">Go</button>
                     </td>
                 </tr>
                 
             </table>
        
            <div class="col-md-12">
         <table class="table">
                                <tr>
                                    <th>Player Name</th>
                                    <th>Date of Birth</th>
                                    <th>email</th>
                                    <th>Address</th>
                                    <th>Contact Number</th>
                                </tr>
   
                               <?php foreach ($player as $row){ ?>
                                    <tr>                                   
                                        <td>
                                         <?php echo $row->player_name; ?>
                                        </td>   
                                        <td>
                                         <?php echo $row->dob; ?>          
                                        </td>
                                        <td>
                                         <?php echo $row->email; ?>                                
                                        </td>
                                        <td>
                                         <?php echo $row->address; ?>      
                                        </td>
                                        <td>
                                         <?php echo $row->contact_num; ?>
                                        </td>                                       
                                                                               
                                    </tr>
                                    
                                <?php } ?>

                            </table>
<!--                Draw Table          -->
                  <table class="table">
                         <tr>
                             <th>Red Team</th>
                             <th>Blue Team</th>
                         </tr>
                     
                 <?php foreach ($draw as $row){ ?>
                        <tr>                                   
                            <td>
                             <?php echo $row->playerone_name; ?>
                            </td> 
                            <td>
                             <?php echo $row->playertwo_name; ?>
                            </td> 
                         </tr>
                 <?php } ?>
                         
                     </table>
                    <button type="submit" name="submit" value="delete"class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this draw?');">Delete Draw</button>
                <?php echo form_close(); ?>
                </div>

</div>
</form>
                    
</div>
                    
</div>
                  <!--/*********************panel-body*************************************-->
</div><!--/panel-->

     
</div><!--/row-->
      

      
     
      
   
      
<div class="row">
<div class="col-md-12">
         
</div>
</div>
</div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->


