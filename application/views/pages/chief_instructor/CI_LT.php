
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
                  <div class="panel-heading"><h4>Tournament Details</h4></div>
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
                                        <h5>:<?php echo $row->location; ?></h5>
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
                                        <h5>:<?php echo $row->org_name; ?></h5>
                                    </td>
                                </tr>  
                            </tbody>
                        </table>
                    </dl>
                     </br>
                                          </br>

     <?php }?>;
    
<!--    panel-->
<div class="col-md-11"> 
    <div class="panel panel-default">
        
      
  <div class="panel-body">
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="<?php echo base_url("chief_instructor/CI_LT")."/".$row->tournament_id; ?>">Overview</a></li>
        <li role="presentation"><a href="<?php echo base_url("chief_instructor/CI_contact_org")."/".$row->tournament_id; ?>">Contact Organizer</a></li>
        <li role="presentation"><a href="<?php echo base_url("chief_instructor/CI_results")."/".$row->tournament_id; ?>">Results</a></li>
 
</ul>
      
       <div class="container">
<!--             <form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=$eid"; ?>" class="form form-vertical"  method="post">-->
            <?php echo form_open('chief_instructor/overview_update'."/".$id);?>
               <?php foreach ($CI_LT as $row){ ?>
                        <div class="col-md-12">
                            <table width='500' border='0' cellpadding='5' cellspacing='1'>
                                
                                <tr>
                                    <td></td>
                                    <td><textarea name="overview" cols="70" rows="5" class="form-control" ><?php echo $row->overview; ?></textarea>
                                        </td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td><button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button></td>
                                </tr>
                                 </table>
                        </div>
               <?php echo form_close(); ?>
           </div>
      
         <?php } ?>  
      
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


