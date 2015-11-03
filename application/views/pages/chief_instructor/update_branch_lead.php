<html>
    <head> </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="panel panel-default">
                                <div class="panel-heading" align="center"><h4><b>Update Branch Leader</b></h4></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-2"> </div>
                                        <div class="col-sm-10">
                                            <?php echo form_open('chief_instructor/update_branch_lead' . "/" . $id); ?>  

                                            <?php
                                            if ($status == 1) {
                                                echo
                                                "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <strong>Congrats!</strong> Branch Leader Has Been Updated. 
                        </div>
                    </div>";
                                            }
                                            if (validation_errors()) {
                                                echo
                                                "<div class=\"row\">
                        <div class=\"alert alert-warning alert-danger\" role=\"alert\">                            
                            <strong>ERROR!</strong> Please fix the errors and submit again.
                        </div>
                    </div>";
                                            }
                                            ?>
                                            <table width="700" border='0' cellpadding='0' cellspacing='1'>
                                                <?php foreach ($bl as $row) { ?>
                                                    <tr>
                                                        <td><?php echo 'First Name'; ?></td>
                                                        <td><input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $row->first_name; ?>"></td>
                                                        <td><span class="help-block" style="color: crimson"><?php echo form_error('first_name'); ?></span></td>
                                                    </tr> 
                                                    <tr>
                                                        <td><?php echo 'Last Name'; ?></td>
                                                        <td><input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $row->last_name; ?>"></td>
                                                        <td><span class="help-block" style="color: crimson"><?php echo form_error('last_name'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Date of Birth'; ?></td>
                                                        <td><input id="dob" type="date" name="dob"  value="<?php echo $row->date_of_birth; ?>" class=" datepicker" placeholder="Date"></td>
                                                        <td><span class="help-block" style="color: crimson"> <?php echo form_error('dob'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Nationality'; ?></td>
                                                        <td><input type="text" id="nationality" name="nationality" class="form-control" value="<?php echo $row->nationality; ?>"></td>
                                                        <td><span class="help-block" style="color: crimson"><?php echo form_error('nationality'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Religion'; ?></td>
                                                        <td><input type="text" id="religion" name="religion" class="form-control" value="<?php echo $row->religion; ?>"></td>
                                                        <td><span class="help-block" style="color: crimson"> <?php echo form_error('religion'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Gender'; ?></td>
                                                        <td>
                                                            <input type="radio" name="gender" id="gender"  value="male" checked=""/>Male &nbsp;&nbsp; &nbsp; &nbsp;
                                                            <input type="radio" name="gender" id="gender" value="female" />Female &nbsp; &nbsp; &nbsp;
                                                        </td>
                                                        <td><span class="help-block" style="color: crimson"> <?php echo form_error('gender'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td></br><?php echo 'Civil Status'; ?></td>
                                                        <td></br>
                                                            <input type="radio" name="status" id="status"  value="single" checked=""/>Single&nbsp; &nbsp; &nbsp;
                                                            <input type="radio" name="status" id="status" value="married"/>Married&nbsp; &nbsp; &nbsp;
                                                            <input type="radio" name="status" id="status" value="widow" />Widow&nbsp; &nbsp; &nbsp;
                                                        </td>
                                                        <td><span class="help-block" style="color: crimson"> <?php echo form_error('status'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td></br><?php echo 'Contact No'; ?></td>
                                                        <td></br><input type="text" id="contact_no" name="contact_no" class="form-control" value="<?php echo $row->contact_number; ?>"></td>
                                                        <td><span class="help-block" style="color: crimson"> <?php echo form_error('contact_no'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Email'; ?></td>
                                                        <td><input type="text" id="email" name="email" class="form-control" value="<?php echo $row->email; ?>"></td>
                                                        <td><span class="help-block" style="color: crimson"> <?php echo form_error('email'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Address'; ?></td>
                                                        <td><textarea name="address" cols="19" rows="3" class="form-control"><?php echo $row->address; ?></textarea></td>
                                                        <td><span class="help-block" style="color: crimson"> <?php echo form_error('address'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Occupation'; ?></td>
                                                        <td><input type="text" id="occupation" name="occupation" class="form-control" value="<?php echo $row->occupation; ?>"></td>
                                                        <td><span class="help-block" style="color: crimson"> <?php echo form_error('occupation'); ?></span></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                            <input type="submit" name="submit" onclick="return confirm('Do you really want to update?')" class="btn btn-primary" id="submit" name="permission" placeholder="permission">
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

