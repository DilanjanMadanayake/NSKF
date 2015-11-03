<html>
    <head>

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">
                   
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="panel panel-default">
                                <div class="panel-heading" align="center"><h4><b>Update Branch</b></h4></div>
                                <div class="panel-body">
                                    <?php 
                if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            New branch has been added. 
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
                ?>                 <div class="row">
                                        <div class="col-sm-2"> </div>
                                        <div class="col-sm-10">
                                            <?php echo form_open('chief_instructor/update_branch' . "/" . $id); ?>    
                                            <table width="500" border='0' cellpadding='0' cellspacing='0'>
                                                <?php foreach ($branch as $row) { ?>
                                                    <tr>
                                                        <td><?php echo 'branch Name'; ?></td>
                                                        <td><input type="text" id="name" name="name" class="form-control" value="<?php echo $row->branch_name; ?>"><span class="help-block" style="color: crimson"> <?php echo form_error('name'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Town'; ?></td>
                                                        <td><input type="text" id="town" name="town" class="form-control" value="<?php echo $row->town; ?>">
                                                            <span class="help-block" style="color: crimson"> <?php echo form_error('town'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Country'; ?></td>
                                                        <td><input type="text" id="country" name="country" class="form-control" value="<?php echo $row->country; ?>">
                                                            <span class="help-block" style="color: crimson"> <?php echo form_error('country'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Contact No'; ?></td>
                                                        <td><input type="text" id="contact_no" name="contact_no" class="form-control" value="<?php echo $row->contact_number; ?>">
                                                            <span class="help-block" style="color: crimson"> <?php echo form_error('contact_no'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Email'; ?></td>
                                                        <td><input type="text" id="email" name="email" class="form-control" value="<?php echo $row->email; ?>">
                                                            <span class="help-block" style="color: crimson"> <?php echo form_error('email'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Address'; ?></td>
                                                        <td><textarea name="address" cols="19" rows="5" class="form-control"><?php echo $row->address; ?></textarea>
                                                            <span class="help-block" style="color: crimson"> <?php echo form_error('address'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Assign Instructor'; ?></td>
                                                        <td><select name="branchType" class="form-control" id="branchType">
                                                                <?php foreach ($bl as $row) { ?>
                                                                    <option value="<?php echo $row->user_id; ?>"><?php echo $row->first_name; ?> </option>
                                                                <?php } ?>
                                                            </select></td>             
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