<html>
    <head>
        <script type="text/javascript">
<?php $pw = random_string('alnum', 16); ?>
            function getpassword() {
                document.getElementById("password").value = "<?php echo $pw; ?>";
            }

            function settexbox() {
                document.getElementById("first_name").value = "<?php echo "Aruna"; ?>";
                document.getElementById("last_name").value = "<?php echo "Wijerathne"; ?>";
                document.getElementById("dob").value = "<?php echo "1992-08-04"; ?>";
                document.getElementById("nationality").value = "<?php echo "Sri Lankan"; ?>";
                document.getElementById("religion").value = "<?php echo "Buddhist"; ?>";
                document.getElementById("contact_no").value = "<?php echo "0718167549"; ?>";
                document.getElementById("email").value = "<?php echo "aruna@gmail.com"; ?>";
                document.getElementById("address").value = "<?php echo "Siridigana Road, Willamuna"; ?>";
                document.getElementById("occupation").value = "<?php echo "Worker"; ?>";
            }
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="panel panel-default">
                                <div class="panel-heading" align="center"><h4><b>Add New Branch Leader</b></h4></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-2"> </div>
                                        <div class="col-sm-10">
                                            <?php echo form_open('chief_instructor/add_branch_lead'); ?>  

                                            <?php
                                            if ($status == 1) {
                                                echo
                                                "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <strong>Congrats!</strong> New Branch Leader Has Been Added. 
                        </div>
                    </div>";
                                            }
                                            if (validation_errors()) {
                                                echo
                                                "<div class=\"row\">
                        <div class=\"alert alert-warning alert-danger\" role=\"alert\">                            
                            <strong>ERROR!</strong> Please Fix The Errors And Submit Again.
                        </div>
                    </div>";
                                            }
                                            ?>
                                            <table width="800" border='0' cellpadding='0' cellspacing='1' style="table-layout:fixed;">  
                                                <col width="170">
                                                <col width="370">
                                                <col width="260">
                                                <tr>
                                                    <td><?php echo 'First Name'; ?></td>
                                                    <td><input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo set_value('first_name'); ?>"></td>
                                                    <td><span class="help-block" style="color: crimson"><?php echo form_error('first_name'); ?></span></td>
                                                </tr> 
                                                <tr>
                                                    <td><?php echo 'Last Name'; ?></td>
                                                    <td><input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo set_value('last_name'); ?>"></td>
                                                    <td><span class="help-block" style="color: crimson"><?php echo form_error('last_name'); ?></span></td>
                                                </tr>
                                                <td><?php echo 'Date of Birth'; ?></td>
                                                <td><input id="dob" type="date" name="dob"  value="<?php echo set_value('dob'); ?>" class=" datepicker" placeholder="Date"></td>
                                                <td><span class="help-block" style="color: crimson"> <?php echo form_error('dob'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Nationality'; ?></td>
                                                    <td><input type="text" id="nationality" name="nationality" class="form-control" value="<?php echo set_value('nationality'); ?>"></td>
                                                    <td><span class="help-block" style="color: crimson"><?php echo form_error('nationality'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Religion'; ?></td>
                                                    <td><input type="text" id="religion" name="religion" class="form-control" value="<?php echo set_value('religion'); ?>"></td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('religion'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Gender'; ?></td>
                                                    <td>
                                                        <input type="radio" name="gender" id="gender" <?php if (isset($_POST['gender']) == 'male') echo 'checked="checked"'; ?> value="male" checked=""/>Male &nbsp;&nbsp; &nbsp; &nbsp;
                                                        <input type="radio" name="gender" id="gender" value="female"/>Female &nbsp; &nbsp; &nbsp;
                                                    </td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('gender'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td></br><?php echo 'Civil Status'; ?></td>
                                                    <td></br>
                                                        <input type="radio" name="status" id="status"  value="single" <?php if (isset($_POST['status']) == 'single') echo 'checked="checked"'; ?> checked=""/>Single&nbsp; &nbsp; &nbsp;
                                                        <input type="radio" name="status" id="status" value="married" />Married&nbsp; &nbsp; &nbsp;
                                                        <input type="radio" name="status" id="status" value="widow" />Widow&nbsp; &nbsp; &nbsp;
                                                    </td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('status'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td></br><?php echo 'Contact No'; ?></td>
                                                    <td></br><input type="text" id="contact_no" name="contact_no" class="form-control" value="<?php echo set_value('contact_no'); ?>"></td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('contact_no'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Email'; ?></td>
                                                    <td><input type="text" id="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>"></td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('email'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Address'; ?></td>
                                                    <td><textarea name="address" id="address" cols="19" rows="3" class="form-control"><?php echo set_value('address'); ?></textarea></td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('address'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Assign a Password'; ?></td>
                                                    <td align="right"><input type="text" name="password" id="password" class="form-control" value="<?php echo set_value('password'); ?>"/>
                                                        <label onclick="getpassword()" class="label label-danger"><span class="glyphicon glyphicon-cog"></span>Auto Generate</label>
                                                    </td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('password'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Previous Occupation'; ?></td>
                                                    <td><input type="text" id="occupation" name="occupation" class="form-control" value="<?php echo set_value('occupation'); ?>"></td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('occupation'); ?></span></td>
                                                </tr>
                                            </table>
                                            <input type="submit" name="submit" onclick="return confirm('Do you really want to insert?')" class="btn btn-primary" id="submit" name="permission" placeholder="permission">
                                            <label onclick="settexbox()" class="label label-danger"><span class="glyphicon glyphicon-refresh"></span>Demo</label>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                    <hr> 
                                </div>
                            </div>
                        </div>     
                    </div>      
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

