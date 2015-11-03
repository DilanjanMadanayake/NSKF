
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

                  ?>
<!--              *************************panel start****************************-->
<?php foreach ($tournament as $row){ ?>
              <div class="panel panel-default">
                  <div class="panel-heading"><h4><b><?php echo $row->tournament_name; ?></b></h4>
                      <h5><?php echo $row->tournament_date; ?>
                      </h5>
<?php } ?>
<?php foreach ($playerData as $row ){ ?>
                  <table class="table">
                      <tr>
                          <td>
                              <b>Gender :</b> <?php echo $row->gender; ?>
                          </td>
                          <td>
                              <b>Age Group :</b> <?php echo $row->tournament_under; ?>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <b>Type :</b> <?php echo $row->tournament_section; ?>
                          </td>
                          <td>
                              <b>Belt :</b> <?php echo $row->belt; ?>
                          </td>
                      </tr>
                      
       
                  </table>                
                  </div>
                  <?php break; ?>
                  
<?php } ?>                  
                  <div class="panel-body">
                    <!-- *******************************************************************************************-->

     <div class ="form-group" > 
                
         <div class="col-md-12">
             
        
            <div class="col-md-12">
                
                <div class="row">
                

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
                    
                      <div class="col-md-4">
                          
                          <table class="table-condensed" style="width:100%">
                              <tr>
                                  <th> Round one </th>
                                      
                              </tr>
                            <?php foreach ($draw as $row ){ ?>  
                            <tr>
                              <td class="col-md-7"><div class="input-group"><div class="form-control"><?php echo $row->playerone_name; ?></div><span class="input-group-addon"><span class="badge pull-right">0</span></span></div></td>
                            </tr>
                            <tr>
                                
                                
                              <td><div class="input-group"><div class="form-control"><?php echo $row->playertwo_name; ?></div><span class="input-group-addon"><span class="badge pull-right">0</span></span></div></td>
                            </tr>
                            <?php } ?>
                          </table>
                              
                      </div>
                   


                             
                </div>

            </div>
          </form>
                    
</div>



</div>
<!--/*********************panel-body*************************************-->
</div><!--/panel-->


</div><!--/col-->
<!--/col-span-6-->

</div><!--/row-->







<div class="row">
<div class="col-md-12">

</div>
</div>
</div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->


