<?php
session_start();

?>
<div class="navbar-wrapper ">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top animated fadeInDown" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="<?php  echo base_url("member"); ?>"><img src="<?php  echo base_url("images/logo.png"); ?>" height="30" alt="logo"/></a>
              <!-- Logo Ends -->


<!--              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>-->

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
               
              <ul class="nav navbar-nav navbar-right" >
                  <li><a href='<?php  echo base_url("/member/index"); ?>'>Home</a></li>
                  <li><a href='<?php  echo base_url("/member/tournament"); ?>'>Tournament</a></li>
                  <li><a href='<?php  echo base_url("/member/training_schedule"); ?>'>Training Schedules</a></li>
                  <li><a href='<?php  echo base_url("/member/inbox"); ?>'><span class="glyphicon glyphicon-envelope"></span></a></li>

                 <li><a href="<?php  echo base_url("/member/member_profile"); ?>"><b><?php foreach ($name as $row){ echo $row->first_name." ".$row->last_name; }?></b></a></li>
                 <li><a href="<?php  echo base_url("/con_login/login"); ?>" onclick="return confirm('Are you sure you want to Log out?');"><span class="glyphicon glyphicon-off"></span><b> Log Out</b></a></li>
              </ul> 
                
<!--                <li><div class="col-md-10"></div>
                <div class="col-md-2">
                <a href="member_login.php"><span class="glyphicon glyphicon-play-circle"></span><b> Log In</b></a>
                </div>-->
<!--            <li><button class="btn btn-warning bgcolor">Log In</button></li>-->
            </div>
            <!-- #Nav Ends -->
              

          </div>
                       

             

        </div>

      </div>

    </div>