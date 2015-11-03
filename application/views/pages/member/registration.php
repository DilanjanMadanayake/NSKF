
<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   
<!-- **********************************************************************************-->
<div class="container">
    <h1></h1>
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
     <?php foreach ($registration as $row){ ?>
  <h3>2nd karate championship</h3>
 
  
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
                                        <h5>: <?php echo $row->location ;?></h5>
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

<!--    *******************panel***************************************************-->
<div class="col-md-11">    
<!--<div class="panel panel-default">
  <div class="panel-body">-->
    <ul class="nav nav-tabs">
        <li role="presentation" ><a href="<?php echo base_url("member/LT")."/".$row->tournament_id; ?>">Overview</a></li>
        <li role="presentation"><a href="<?php echo base_url("member/contact_org")."/".$row->tournament_id; ?>">Contact Organizer</a></li>
        <li role="presentation" class="active"><a href="<?php echo base_url("member/registration")."/".$row->tournament_id; ?>">Registration</a></li>
         <li role="presentation"><a href="<?php echo base_url("member/draw")."/".$row->tournament_id; ?>">Draw</a></li>
        <li role="presentation"><a href="<?php echo base_url("member/results")."/".$row->tournament_id; ?>">Results</a></li>

 
</ul>
     <?php } ?>
     <div class="container-fluid">
  <p>


       
        <div class="contactform center">
        <div class="row">      
              <div class="col-sm-6 col-sm-offset-3 ">
                <h4>Register yourself now!<br></h4>
<!--                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=$eid"; ?>"  method="post">-->
                <?php echo form_open('member/registration'."/".$id);?>
                 <?php foreach ($member as $row){ ?>
                    <label>Full Name</label>
                <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row->first_name." ".$row->last_name; ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('name');?>
                             </span>
                <label>Email</label>
                <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $row->email; ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('email');?>
                             </span>
                <label>Address</label>
                <textarea rows="5" name="address" id="address" placeholder="Address"><?php echo $row->address; ?></textarea>
                <span class="help-block" style="color: crimson"> <?php echo form_error('address');?>
                             </span>
                <label>Date of Birth</label>
                <input type="date" name="dob" id="dob" class=" datepicker" placeholder="Date of Birth" value="<?php echo $row->date_of_birth; ?>">
                <span class="help-block" style="color: crimson"> <?php echo form_error('dob');?>
                             </span>
                
                <select name="gender" class="form-control" id="gender">
                    <option value="select">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>                    
                </select></br>
                <span class="help-block" style="color: crimson"> <?php echo form_error('gender');?>
                             </span>
                
                <select name="tournament_section" class="form-control" id="tournament_section">
                    <option value="select">Select your section</option>
                    <option value="katha">Katha</option>
                    <option value="kumitha">Kumitha</option>                    
                </select></br>
                <span class="help-block" style="color: crimson"> <?php echo form_error('tournament_section');?>
                             </span>
               
                <select name="tournament_under" class="form-control" id="tournament_under">
                    <option value="select">Under</option>
                    <option value="Under21">Under 21</option>
                    <option value="Under19">Under 19</option>  
                     <option value="Under17">Under 17</option>
                      <option value="Under15">Under 15</option>
                       <option value="Under13">Under 13</option>
                       <option value="Under10">Under 10</option>
                       <option value="below10">Below 10</option>
                </select></br>
                  <span class="help-block" style="color: crimson"> <?php echo form_error('tournament_under');?>
                             </span>
                <select name="belts" class="form-control" id="belts">
                    <option value="select">Belt</option>
                    <option value="black">Black</option>
                    <option value="brown">Brown</option>
                    <option value="green">Green</option>  
                     <option value="yellow">Yellow</option>
                      <option value="white">White</option>
                       
                </select></br>
                  <span class="help-block" style="color: crimson"> <?php echo form_error('belt');?>
                             </span>
                <label>Contact Number</label>
                <input type="text" name="number" id="number" placeholder="Contact Number" value="<?php echo $row->contact_number; ?>">
                 <span class="help-block" style="color: crimson"> <?php echo form_error('number');?>
                             </span>
               

                <button type="submit" name="submit" class="btn btn-warning bgcolor">Sign Up</button>
                   <?php } ?>  
                <?php echo form_close(); ?>
              </div>
          </div>
        </div>
    
  

  </div>
<!--</div>

</div>-->
    <div class="col-md-1"></div>
</div>

</div>
</div>

</div>
<!-- blockblack -->


<!-- overlay -->



<!-- Footer Starts -->
<?php //include("../includes/user/footer.php"); ?>