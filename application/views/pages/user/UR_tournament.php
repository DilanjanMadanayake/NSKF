
<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   
       

<!-- **************************************************************************************-->
<div class="container">
    <h3>Tournaments</h3>

</div>

<div class="row">
  <div class="col-sm-8">
    <div class="thumbnail">
      <div class="caption">
        <h3>2015 tournament year plan</h3>
        </br>
        <form action="UR_tournament.php">
     <div class ="form-group" > 
         
         <table width='1000' border='0' cellpadding='1' cellspacing='1'>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    
                                </tr>

                              
                                <?php foreach ($tournament as $row){ ?>
                                    <tr>
                                        
                                        <td>
                                                <?php echo $row->tournament_date; ?> -
                                                <?php echo $row->tournament_name; ?>
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
            <form class="navbar-form" role="search" method="post" action="<?php  echo base_url("home/search"); ?>">
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
 
</div>
<!-- blockblack -->

</div>
<!-- overlay -->



<!-- Footer Starts -->
<?php //include("../includes/user/footer.php"); ?>