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
                  <div class="panel-heading"><h4> Overall Tournament Rankings</h4></div>
                  <div class="panel-body">
                   
<!-- *******************************************************************************************-->


<div class="row">
  <div class="col-sm-9">
    <div class="thumbnail">
      <div class="caption">

     <?php echo form_open('chief_instructor/standings/' . $id ); ?> 
        <form action="tournament.php">
     <div class ="form-group" > 
         
         <table class="table table-striped">
                                <tr>
                                    <th>Branch Name</th>
                                    <th>Gold Medals</th>
                                   <th>Silver Medals</th>
                                    <th>Bronze Medals</th>
                                    <th>Total Marks</th>
                                    
                                    
                                </tr>

                                <?php foreach ($standing as $row1){ ?>
                                    <tr>
                                        <td>
                                        <?php echo $row1->branch_name; ?> 
                                        </td>
                                        <td>
                                        <?php echo $row1->gold; ?>
                                        </td>
                                        <td>
                                        <?php echo $row1->silver; ?>
                                        </td>
                                        <td>
                                        <?php echo $row1->bronze; ?>
                                        </td>
                                        <td>
                                        <?php echo $row1->total; ?>
                                        </td>
                                         
                                        <td>&nbsp;</td>
                                    </tr>
                                <?php } ?>
         </table>
           </div>
          </form>
           <?php echo form_close(); ?>
      </div>
    </div>
  </div>
<div class="col-sm-3 col-md-3 pull-right">
           <form class="navbar-form" role="search" method="post" action="<?php  echo base_url("chief_instructor/ranking_search"); ?>">
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
              </div>
<?php //} ?><!--/panel-->
	
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


