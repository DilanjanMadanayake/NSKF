<html>
    <head>

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">
                    <!--                      <ul class="list-inline pull-right">
                                            <li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
                                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i><span class="count">3</span></a><ul class="dropdown-menu" role="menu"><li><a href="#">1. Is there a way..</a></li><li><a href="#">2. Hello, admin. I would..</a></li><li><a href="#"><strong>All messages</strong></a></li></ul></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
                                            <li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span> Add Widget</a></li>
                                        </ul>
                                        <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>  
                                        <hr>   -->
                    <div class="row">
                        <div class="col-md-12">
                            <!--                            <hr>
                                                        <div class="btn-group btn-group-justified">
                                                            <a href="add_new_member.php" class="btn btn-primary col-sm-3">
                                                                <i class="glyphicon glyphicon-plus"></i><br>
                                                                Add Member
                                                            </a>
                                                            <a href="#" class="btn btn-primary col-sm-3">
                                                                <i class="glyphicon glyphicon-cloud"></i><br>
                                                                Cloud
                                                            </a>
                                                            <a href="#" class="btn btn-primary col-sm-3">
                                                                <i class="glyphicon glyphicon-cog"></i><br>
                                                                Tools
                                                            </a>
                                                            <a href="#" class="btn btn-primary col-sm-3">
                                                                <i class="glyphicon glyphicon-question-sign"></i><br>
                                                                Help
                                                            </a>
                                                        </div>          -->
                            <hr>
                            <div class="panel panel-default">
                                <div class="panel-heading" align="center"><h4><b>Update Sub Branch</b></h4></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-2"> </div>
                                        <div class="col-sm-10">
                                            <?php echo form_open('chief_instructor/update_sub_branch' . "/" . $id); ?>    
                                            <table width="500" border='0' cellpadding='0' cellspacing='0'>
                                                <?php foreach ($branch as $row) { ?>
                                <tr>
                                                        <td><?php echo 'Sub Branch Name'; ?></td>
                                                        <td><input type="text" id="name" name="name" class="form-control" value="<?php echo $row->sub_branch_name; ?>"><span class="help-block" style="color: crimson"> <?php echo form_error('name'); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo 'Main Branch Name'; ?></td>
                                                        <td><input type="text" id="name" name="name" class="form-control" value="<?php echo $branch_name; ?>" disabled=""><span class="help-block" style="color: crimson"> <?php echo form_error('name'); ?></span></td>
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
                        <br/>
                            <input type="submit" name="submit" value="Update"onclick="return confirm('Do you really want to update?')" class="btn btn-primary" id="submit" name="permission" placeholder="permission">
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