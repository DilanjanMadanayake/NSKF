
<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   
  
<!-- **************************************************************************************-->
<div class="container">
    <h1></h1>

    <div class="col-sm-4">
      
          <img src="<?php echo base_url("images/karate.png") ?>" height="150" width="150" alt="logo"/>
</div>
    
    <?php foreach ($local_Tournament as $row){ ?>
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

  
  
<!--    ******************************panel************************************************-->
<div class="col-md-11">    
<!--<div class="panel panel-default">
  <div class="panel-body">-->
    <ul class="nav nav-tabs">
                                               
        <li role="presentation" class="active"><a href="<?php echo base_url("member/LT")."/".$row->tournament_id; ?>">Overview</a></li>
        <li role="presentation"><a href="<?php echo base_url("member/contact_org")."/".$row->tournament_id; ?>">Contact Organizer</a></li>
        <li role="presentation"><a href="<?php echo base_url("member/registration")."/".$row->tournament_id; ?>">Registration</a></li>
        <li role="presentation"><a href="<?php echo base_url("member/draw")."/".$row->tournament_id; ?>">View Draw</a></li>
        <li role="presentation"><a href="<?php echo base_url("member/results")."/".$row->tournament_id; ?>">Results</a></li>

</ul>

      <!--overview panel start -->
     <div class="container-fluid">
         </br>
         </br>
         <div class="panel-body" style="text-align:justify">      
  <p><?php echo $row->overview; ?>
  </p>
  
  
   

         </div>
</div> 
      <?php } ?>  
<!--</div>
</div>-->
</div>
<div class="col-md-11"></div>
</div>
</div>
</div>


</div>
<!-- blockblack -->

</div>
<!-- overlay -->



<!-- Footer Starts -->
<?php //include("../includes/user/footer.php"); ?>