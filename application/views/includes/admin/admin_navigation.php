
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="">Dashboard</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
<!--          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="#">My Profile</a></li>
          </ul>-->
        </li>
        
        <li><a href=""><b><?php foreach ($name as $row){ echo $row->first_name." ".$row->last_name; }?></b></a></li>
       
        <li><a href="<?php  echo base_url("/con_login/login"); ?>" onclick="return confirm('Are you sure you want to Log out?');"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
      </ul>
    </div>
  </div><!-- /container -->
</div>