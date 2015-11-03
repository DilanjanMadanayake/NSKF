
<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   
       

<!-- *******************************************************************************************-->
<div class="container">


</div>

<div class="row">
  <div class="col-sm-8">
    <div class="thumbnail">
      <div class="caption">
        <h3>2015 Training Schedules</h3>
        </br>
        <form action="training_schedule.php">
     <div class ="form-group" > 
         
         <table class="table table-striped">
                                <tr>
                                    <th>Training Schedule Date</th>
                                    <th>Time</th>
                                      <th>Description</th>
                                    <th>Venue</th>
                                    
                                </tr>

                                 <?php foreach ($training_schedule as $row){ ?>
                                    <tr>
                                        
                                        <td>
                                         <?php echo $row->training_schedule_date; ?>
                                                
                                        </td>
                                        <td>
                                            <?php echo $row->schedule_time;?>
                                        </td>
                                         <td>
                                         <?php echo $row->schedule_description; ?>
                                                
                                        </td>
                                        <td>
                                            <?php echo $row->venue; ?>
                                        </td>
           
                                   
                                     </tr>
                                <?php } ?>

                            </table>

            </div>
          </form>
      </div>
    </div>
  </div>

    </br>
    

</div>
 
</div>
<!-- blockblack -->

</div>
<!-- overlay -->



<!-- Footer Starts -->
