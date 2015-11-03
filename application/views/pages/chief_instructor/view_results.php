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
 
              
             
              
<!--************************************panel start********************************************-->
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Tournament Results</h4></div>
                  <div class="panel-body">
<!-- *******************************************************************************************-->


<div class="row">
  <div class="col-sm-9">
    <div class="thumbnail">
      <div class="caption">

  
        <form action="tournament.php">
     <div class ="form-group" > 
         
         <table class="table table-striped">
                             
                               <?php foreach ($view_results as $row){ ?>
                                    <tr>
                                        <td>
                                        Tournament Name :<?php echo $row->tournament_name; ?><br> <br>
                                        Tournament Section :<?php echo $row->tournament_section; ?> <br> <br>
                                        Champion :<?php echo $row->champion; ?> <br> <br>
                                        Runner-Up :<?php echo $row->runner_up; ?> <br> <br>
                                        2nd Runner Up :<?php echo $row->second_runner_up; ?> <br> <br>
                                        </td>
                                         <td>&nbsp;</td>
                                    </tr>
                                <?php } ?>
         </table>
           </div>
          </form>
      </div>
    </div>
  </div>
<div class="col-sm-3 col-md-3 pull-right">
           <form class="navbar-form" role="search" method="post" action="<?php  echo base_url("chief_instructor/view_results"); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form> 
        </div>        
    </br>  
</div>  
                               
<!--*********************************************************************-->
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


