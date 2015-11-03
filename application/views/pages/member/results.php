
<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   
       

<!-- edit*******************************-->
<div class="container">
    <h1></h1>
    <div class="col-sm-4">
      
         <img src="<?php echo base_url("images/karate.png") ?>" height="150" width="150" alt="logo"/>
</div>
     <?php foreach ($tournament as $row){ ?>
  <h3><?php echo $row->tournament_name ;?></h3>
 

                    <dl class="fb-clear">
                        <table class="fb-general-information">
                            <tbody>
                                <tr>
                                    <th scope="row">
                             
                            <h5>Location</h5>
                                    </th>
                                    <td>
                                        <h5>: <?php echo $row->location ;?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                             
                            <h5>Date</h5>
                                    </th>
                                    <td>
                                        <h5>: <?php echo $row->tournament_date ;?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                <h5> Organiser</h5>
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

    
<!--    panel-->

<div class="col-md-11">

    <ul class="nav nav-tabs">                       
          <li role="presentation" ><a href="<?php echo base_url("member/LT")."/".$row->tournament_id; ?>">Overview</a></li>
        <li role="presentation"><a href="<?php echo base_url("member/contact_org")."/".$row->tournament_id; ?>">Contact Organizer</a></li>
        <li role="presentation"><a href="<?php echo base_url("member/registration")."/".$row->tournament_id; ?>">Registration</a></li>
         <li role="presentation"><a href="<?php echo base_url("member/draw")."/".$row->tournament_id; ?>">Draw</a></li>
        <li role="presentation" class="active"><a href="<?php echo base_url("member/results")."/".$row->tournament_id; ?>">Results</a></li>

 
</ul>
<?php } ?>
     
<div class="container-fluid">
      
  <dl class="fb-clear">
                        <table class="table">
                            <tbody>
                                 <tr>
                                    <th><b>Branch Name</b></th>
                                    <th><b>Gold Medals</b></th>
                                   <th><b>Silver Medals</b></th>
                                    <th><b>Bronze Medals</b></th>
                                    <th><b>Total Marks</b></th>
                                    
                                    
                                </tr>

                                <?php foreach ($ranking as $row1){ ?>
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
                            </tbody>
                                                   
                        </table>
                    </dl>
        
</div> 





<!--  </div>
</div>-->
</div>
<div class="col-md-1"></div>

    
    
    
    
    
    
            </div>

</div>
</div>

</div>
<!-- blockblack -->

</div>
<!-- overlay -->



<!-- Footer Starts -->
<?php //include("../includes/user/footer.php"); ?>