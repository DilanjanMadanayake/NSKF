
<?php foreach ($contact_org as $row){ ?>

<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   
       

<!-- *********************************************************************************************-->
<div class="container">
    <h1></h1>
 <div class="col-sm-4">
       
          <img src="<?php echo base_url("images/karate.png") ?>" height="150" width="150" alt="logo"/>
</div>
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
<?php } ?>    
<!--   *********************************** panel**************************************-->
<div class="col-md-11">    

    <ul class="nav nav-tabs">
         <li role="presentation"><a href="<?php echo base_url("member/LT")."/".$row->tournament_id; ?>">Overview</a></li>
        <li role="presentation" ><a href="<?php echo base_url("member/contact_org")."/".$row->tournament_id; ?>">Contact Organizer</a></li>
        <li role="presentation"><a href="<?php echo base_url("member/registration")."/".$row->tournament_id; ?>">Registration</a></li>
       <li role="presentation" class="active"><a href="<?php echo base_url("member/draw")."/".$row->tournament_id; ?>">View Draw</a></li>
        <li role="presentation"><a href="<?php echo base_url("member/results")."/".$row->tournament_id; ?>">Results</a></li>

</ul>
<div class="container-fluid">
     <table class="table">
                 <?php echo form_open( base_url('member/draw/'.$id)); ?>
                     <td>
                        <select name="gender" class="form-control" id="tournament_type">
                        <option value="select">Select Gender</option>
                        <option value="male" <?php if($gender=='male') { echo "selected"; }?>>Male</option>
                        <option value="female" <?php if($gender=='female') { echo "selected"; }?>>Female</option>                    
                        </select>
                     </td>
                     <td>
                        <select name="under" class="form-control" id="tournament_type">
                        <option value="select">Select Age Group</option>
                        <option value="Under11"<?php if($under=='Under11') { echo "selected"; }?>>Under 11</option>
                        <option value="Under15"<?php if($under=='Under15') { echo "selected"; }?>>Under 15</option>
                        <option value="Under21"<?php if($under=='Under21') { echo "selected"; }?>>Under 21</option>
                        <option value="Open"<?php if($under=='Open') { echo "selected"; }?>>Open</option>  
                        </select>
                     </td>
                     <td>
                        <select name="tournament_section" class="form-control" id="tournament_type">
                        <option value="select">Select Section</option>
                        <option value="katha"<?php if($tournament_section=='katha') { echo "selected"; }?>>Kata</option>
                        <option value="kumitha"<?php if($tournament_section=='kumitha') { echo "selected"; }?>>Kumite</option>                    
                        </select>
                     </td>
                     <td>
                        <select name="belt" class="form-control" id="tournament_type">
                        <option value="select">Select Belt Type</option>
                        <option value="brown"<?php if($belt=='brown') { echo "selected"; }?>>9-8-7-Brown</option>
                        <option value="yellow"<?php if($belt=='yellow') { echo "selected"; }?>>6-5-4-Yellow</option>
                        <option value="black"<?php if($belt=='black') { echo "selected"; }?>>3-2-1-Black</option> 
                        </select>
                     </td>
                     <td>
                         <button type="submit" name="submit" class="btn btn-warning">Go</button>
                     </td>
                 </tr>
                 <?php echo form_close(); ?>
     </table>
    
    
     <table class="table">
                 <tr>
                     <th>Red Team</th>
                     <th>Blue Team</th>
                 </tr>

         <?php foreach ($draw as $row){ ?>
                <tr>                                   
                    <td>
                     <?php echo $row->playerone_name; ?>
                    </td> 
                    <td>
                     <?php echo $row->playertwo_name; ?>
                    </td> 
                 </tr>
         <?php } ?>
                         
     </table>
    
    <div class="col-md-4">
                          
                          <table class="table-condensed" style="width:100%">
                            <?php foreach ($draw as $row ){ ?>  
                            <tr>
                                <td class="col-md-7"><div class="input-group"><div class="form-control"><?php echo $row->playerone_name; ?></div><span class="input-group-addon"><span class="badge pull-right">0</span></span></div></td>                         
                            </tr>
                            <tr>
                                <td><div class="input-group"><div class="form-control"><?php echo $row->playertwo_name; ?></div><span class="input-group-addon"><span class="badge pull-right">0</span></span></div></td>
                            </tr>
                            <?php } ?>
                          </table>
                              
                      </div>
                   
         
</div> 
</div>
<div class="col-md-11"></div>      
</div>
</div>
</div>
<!-- blockblack -->


<!-- overlay -->


