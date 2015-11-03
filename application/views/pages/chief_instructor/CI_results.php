
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
                  <div class="panel-heading"><h4>Tournament Results</h4></div>
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->


<div class="container">


    <div class="col-sm-4">
        <img src="<?php echo base_url("images/karate.png") ?>" height="150" width="150" alt="logo"/>
</div>
     <?php 
                if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <strong>Congrats!</strong> Tournament results have been successfully submitted. 
                        </div>
                    </div>";
                } 
                if(validation_errors()) {
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-danger\" role=\"alert\">                            
                            <strong>ERROR!</strong> Please fix the errors and submit again.
                        </div>
                    </div>";
                }
                ?>
    
    
     <?php foreach ($CI_LT as $row){ ?>
  <h3><?php echo $row->tournament_name; ?></h3>
 
  
                     <p class="fb-location">
                     </p>
                    <dl class="fb-clear">
                        <table class="fb-general-information">
                            <tbody>
                                <tr>
                                    <th scope="row">
                             
                            <h5>Location</h5>
                                    </th>
                                    <td>
                                        <h5>: <?php echo $row->location; ?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                             
                            <h5>Date</h5>
                                    </th>
                                    <td>
                                        <h5>: <?php echo $row->tournament_date; ?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                <h5> Organizer</h5>
                                    </th>
                                    <td>
                                        <h5>: <?php echo $row->org_name; ?></h5>
                                    </td>
                                </tr>  
                            </tbody>
                        </table>
                    </dl>
                     </br>
                     </br>
     <?php } ?>
    
    
<!--***************************************** panel**************************************-->
 
     
<div class="col-md-11">
  <div class="panel panel-default">
  <div class="panel-body">
    <ul class="nav nav-tabs">
       <li role="presentation"><a href="<?php echo base_url("chief_instructor/CI_LT")."/".$row->tournament_id; ?>">Overview</a></li>
        <li role="presentation"><a href="<?php echo base_url("chief_instructor/CI_contact_org")."/".$row->tournament_id; ?>">Contact Organizer</a></li>
        <li role="presentation" class="active"><a href="<?php echo base_url("chief_instructor/CI_results")."/".$row->tournament_id; ?>">Results</a></li>
 
 
</ul>
      
       <div class="container">
                        <div class="col-md-4">

                            <?php echo form_open('chief_instructor/CI_results'."/".$id);?>    
                            <table width='500' border='0' cellpadding='5' cellspacing='1'>
                                
                                <tr>
                                    <td>Tournament Name</td>
                                    <td><h5><?php foreach ($CI_results as $row){ echo $row->tournament_name;} ?></h5>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td><?php echo "Date" ?></td>
                                    <td><input type="textbox" class="form-control"   id="date" name="date" value="<?php echo $row->tournament_date; ?>"> 
                                        <span class="help-block" style="color: crimson"> <?php echo form_error('date');?></span>
                               <br/></td>
                                </tr>
                              
                                <tr>
                                    <td><?php echo "Section" ?></td>
                                    <td><select name="section" class="form-control" id="section">
                    <option value="select">Select your section</option>
                    <option value="katha">Katha</option>
                    <option value="kumitha">Kumitha</option>                    
                                        </select>  <br/>  <span class="help-block" style="color: crimson">  <?php echo form_error('section');?></span></td>
                                </tr>
                                <tr>
                                    <td><?php echo "Under" ?></td>
                                    <td><select name="tournament_under" class="form-control" id="tournament_under">
                      <option value="select">Under</option>
                    <option value="Under21">Under 21</option>
                    <option value="Under19">Under 19</option>  
                     <option value="Under17">Under 17</option>
                      <option value="Under15">Under 15</option>
                       <option value="Under13">Under 13</option>
                       <option value="Under10">Under 10</option>
                       <option value="below10">Below 10</option>                   
                                        </select>  <br/>   <span class="help-block" style="color: crimson"> <?php echo form_error('tournament_under');?></span></td>
                                    <span class="help-block" style="color: crimson"> 
                             </span>
                                </tr>
                    
                                <tr>
                                    <td><?php echo "Champion" ?></td>
                                    <td><input type="textbox" class="form-control"  id="champion" name="champion">  <span class="help-block" style="color: crimson"> 
                              <?php echo form_error('champion');?> </span><br/></td>
                                
                                </tr>
                              <tr>
                                    <td><?php echo "Runner up" ?></td>
                                    <td><input type="textbox" class="form-control" id="Runner_up" name="Runner_up"> <span class="help-block" style="color: crimson">    <?php echo form_error('Runner_up');?> </span><br/></td>
                                </tr>
                              <tr>
                                    <td><?php echo "2nd Runner up" ?></td>
                                    <td><input type="textbox"  class="form-control" id="second_Runner_up" name="second_Runner_up">   <span class="help-block" style="color: crimson">  <?php echo form_error('second_Runner_up');?></span> <br/></td>
                                </tr>
                                <tr>
                                    <td>
                                     <button type="submit" name="submit" class="btn btn-primary">Submit</button>   
                                    </td>
                                </tr>
                              
                               
                              
                            </table>
                         <?php echo form_close(); ?>
                        </div>
          
           
  </div>
        
                        <div class="col-md-2">
                        </div>
                        
                    </div>
      <!--overview panel start -->
     <div class="container-fluid">
         </br>
         </br>
         
  
</p>
</div> 
  </div>
</div>
 </div>
<div class="col-md-1"></div>
            </div>
                    
             
<!--*************************************************-->
                  </div>
                  <!--/*********************panel-body*************************************-->
              </div><!--/panel-->
	
			  <hr>              
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


