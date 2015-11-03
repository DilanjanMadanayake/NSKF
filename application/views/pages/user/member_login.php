<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   


       
            <div class="container">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <?php 

                     if (validation_errors()) {
                                                echo
                                                "<div class=\"row\">
                        <div class=\"alert alert-warning alert-danger\" role=\"alert\">                            
                            <strong>ERROR!</strong> Please fix the errors and submit again.
                        </div>
                    </div>";
                                            }
                  
                ?>
                      <div class="contactform center">
                    <form class="form-horizontal" action="<?php echo base_url('con_login/login');?>" method="post">

                      <h3><span class="glyphicon glyphicon-user"></span> Log In</h3>
                      <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" placeholder="email">
                           <span class="help-block" style="color: crimson"> <?php echo form_error('email'); ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password" placeholder="password">
                           <span class="help-block" style="color: crimson"> <?php echo form_error('password'); ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        </div>
<!--                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Remember me
                            </label>
                          </div>-->

                     <?php
                     
                      if(isset($message)){ ?>
                        <span class="help-block" style="color: crimson"><?php echo $message; ?></span>
                        <?php } ?>
                        </div>
                    
                           
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="submit" class="btn btn-warning bgcolor">Log In</button>
                        </div>
                      </div>
                       
                    </form>
                                  <?php //echo '<h4 class="Headers" id="error">'.$message.'</h4>' ?>
                          </div>
                </div>
            <div class="col-md-3"></div>
            </div>



</div>
<!-- blockblack -->

</div>
<!-- overlay -->



<!-- Footer Starts -->
<?php include("../includes/user/footer.php"); ?>