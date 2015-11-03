

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
                  <div class="panel-heading"><h4>Player 1</h4></div>
                  <div class="panel-body">
                      
                      
                      <div class="row">
                    <div class="col-md-12">
                      
                        
                          <?php 
                if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <strong>Congrats!</strong> You have been successfully registered to the tournament. 
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
     <?php echo form_open('branch_leader/team_registration/'.$id); ?>
                  
                        
                           
         <table width='500' border='0' cellpadding='5' cellspacing='1'>
                           <tbody>
                               <tr>
                                    <td><?php echo "Full Name" ?></td>
                                    <td><input type="textbox" class="form-control"  id="name" name="name" class="round_textbox" value=""><br/></td>
                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('name'); ?></span></td>
                                </tr>
                                <tr>
                                    <td><?php echo "Email Address" ?></td>
                                    <td><input type="textbox" class="form-control"  id="email" name="email" class="round_textbox" value=""><br/></td>
                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('email'); ?></span></td>
                                </tr>
                                <tr>
                                    <td><?php echo "Contact Number" ?></td>
                                    <td><input type="textbox" class="form-control"  id="contact_number" name="contact_number" class="round_textbox" value=""><br/></td>
                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('contact_number'); ?></span></td>
                                </tr>
                                 <tr>
                                    <td><?php echo "Address" ?></td>
                                    <td><input type="textbox" class="form-control"  id="address" name="address" class="round_textbox" value=""><br/></td>
                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('address'); ?></span></td>
                                 </tr>
                                <tr>
                                    <td><?php echo "Date of birth" ?></td>
                                    <td> <input type="date" class="form-control" name="dob" id="dob" class=" datepicker" placeholder="Date of Birth"><br/></td>
                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('dob'); ?></span></td>
                                </tr>
                                <tr><td><?php echo "Gender" ?></td>
                                    <td>
                                    <select name="gender" class="form-control" id="gender">
                    <option value="select">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>                    
                </select></br>
                       </td>
                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('gender'); ?></span></td>
                    </tr>
                    <tr><td><?php echo "Tournament Section" ?></td>
                        <td>
                        <select name="tournament_section" class="form-control" id="tournament_section">
                            <option value="select">Select your section</option>
                            <option value="katha">Katha</option>
                            <option value="kumitha">Kumitha</option>                     
                        </select><br/>
                                <span class="help-block" style="color: crimson"> <?php echo form_error('tournament_section');?>
                                             </span>
                        </td>
                    </tr>
                    <tr><td><?php echo "Tournament Under" ?></td>
                       <td>
                            <select name="tournament_under" class="form-control" id="tournament_under">
                                <option value="select">Under</option>
                                <option value="Under21">Under 21</option>
                                <option value="Under19">Under 19</option>  
                                <option value="Under17">Under 17</option>
                                <option value="Under15">Under 15</option>
                                <option value="Under13">Under 13</option>
                                <option value="Under10">Under 10</option>
                                <option value="below10">Below 10</option>                     
                            </select><br/>
                             </td>
                        <td><span class="help-block" style="color: crimson"> <?php echo form_error('tournament_under'); ?></span></td>
                     </tr>
                    <tr><td><?php echo "Belts" ?></td>
                       <td>
                            <select name="belts" class="form-control" id="belts">
                                <option value="select">Belt</option>
                                <option value="black">Black</option>
                                <option value="brown">Brown</option>
                                <option value="green">Green</option>  
                                <option value="yellow">Yellow</option>
                                <option value="white">White</option>                    
                            </select></br>
                        </td>
                     <td><span class="help-block" style="color: crimson"> <?php echo form_error('belts'); ?></span></td>
                     </tr>
                               
                                <tr><br/></tr>
                               
                                <tr>
                                    <td>  </td>  
                                    
                                    
                               </tr>
                                
                                 
                            </tbody>
                        </table>
                       

<!--</div> -->
<button type="submit" name="submit" class="btn btn-primary">submit</button>
       <?php echo form_close(); ?>
   
</div> 
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


