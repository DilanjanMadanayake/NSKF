
<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   
       

<!-- *************************************************************************************-->
<div class="container">
    <h3>Foreign Tournaments</h3>

</div>
</br>

<form action="foreign_tournament.php">
     <div class ="form-group" > 
         
       <table class="table table-condensed">
                                <tr>
                                    <th>Tournament List</th>
                                    <th>View</th>
                                    
                                    
                                </tr>

                             <?php foreach ($foreign_Tournament as $row){ ?>
                                <tr><td>
                                        <?php echo $row->tournament_name; ?></h4></td>                                        
                                    
                                    <td>
                                            
                                        
                                        <small><a href="<?php echo base_url("member/LT")."/".$row->tournament_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></small> 
                                        </td>
                                        
           
                                   
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