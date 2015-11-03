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
 
              
              
                    <center>    
                    <br />
                    <strong>New Message</strong>
                    <br />
                    </center>
                    
                        
                        
                        <?php 
                if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <strong>Congrats!</strong> Your message has been sent and You have successfully deleted this tournament. 
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
              
              
              
                </div>

                    <table class="table">
                         <?php echo form_open('chief_instructor/new_message'."/".$id); ?>
                    <tr>
                        <td><strong>To</strong></td>
                        <td>:  
                        </td>
                        <td>
                           
                            <?php foreach ($registered_players as $row) { ?>
                           <br>
                               <tr>
                                        <?php //foreach ($registered_players as $row) { ?>
                                   <td><input type="textbox" class="form-control"  id="to" name="to" value="<?php echo $row->user_id;?> " hidden> </td>
                                   <td><input type="textbox" class="form-control"  id="champion" name="champion" value="<?php echo $row->player_name; ?> "> </td>
                                      <span class="help-block" style="color: crimson"> 
                                          <?php } ?>
                                      </span><br/>
                                
                                </tr>
                    </tr>
                    
                                <tr>
                                    <td><strong>Message</strong></td>
                                    <td>:  
                                    </td>

                                     <td>
                                     <textarea rows="5" name="message" class="form-control" id="message" placeholder="Message"></textarea>
                                     </td>

                                 </tr>
                                    <tr>
                                    <td>&nbsp;                      
                                    </td>
                                    <td>&nbsp;                      
                                    </td>
                                    <td><button type="submit" name="submit" class="btn btn-warning bgcolor">Send</button>                      
                        </td>
                    </tr>
                    <?php echo form_close(); ?>
                    </table>
              
      

</div>
<!-- blockblack -->

</div>
<!-- overlay -->

   
      <div class="row">
        <div class="col-md-12">
         
        </div>
      </div>
  	</div><!--/col-span-9-->
</div>


<!-- Footer Starts -->
