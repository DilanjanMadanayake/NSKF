
<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   
       

<!-- *******************************************************************************************-->
<div class="container">
    <h3>Local Tournaments</h3>

</div>


<form action="local_tournament.php">
     <div class ="form-group" > 
        
         <table class="table table-condensed">
                                <tr>
                                    <th><b>Tournament List</b></th>
                                    <th><b>View</h3></b>
                                    
                                </tr>

                                      <?php foreach ($local_Tournament as $row){ ?>
                                    <tr>
                                       
                                        <td>
                                            
                                                <b><?php echo $row->tournament_name; ?></b>
                                        </td>
                                        <td><small><a href="<?php echo base_url("member/LT")."/".$row->tournament_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></small></td>
           
                                  
                                     </tr>
                                     <tr></tr>
                                <?php } ?>

                            </table>

</div>
          </form>
</div>
<!-- blockblack -->

</div>
<!-- overlay -->



<!-- Footer Starts -->
<?php //include("../includes/user/footer.php"); ?>