<html>
    <head> </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">
                   
                    <div class="row">
                        <div class="col-md-12">
                          
                            <div class="panel panel-default">
                                <div class="panel-heading" align="center"><h4><b>Add New Coach</b></h4></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-2"> </div>
                                        <div class="col-sm-10">
                                            <?php echo form_open('chief_instructor/add_coach'); ?>  
                                            
                                            <?php 
                if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <strong>Congrats!</strong> New coach has been added. 
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
                                            <table width="700" border='0' cellpadding='0' cellspacing='1'>
                                                <tr>
                                                    <td><?php echo 'Full Name';?></td>
                                                    <td><input type="text" id="name" name="name" class="form-control" value="<?php echo set_value('name');?>"></td>
                                                    <td><span class="help-block" style="color: crimson"><?php echo form_error('name');?></span></td>
                                                </tr> 
                                                <tr>
                                                    <td><?php echo 'NIC'; ?></td>
                                                    <td><input type="text" id="nic" name="nic" class="form-control" value="<?php echo set_value('nic'); ?>"></td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('nic'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Date of Birth'; ?></td>
                                                    <td><input id="dob" type="date" name="dob"  value="<?php echo set_value('dob'); ?>" class=" datepicker" placeholder="Date"></td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('dob'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Gender'; ?></td>
                                                    <td>
                                                        <input type="radio" name="gender" id="gender"  value="male"/>Male &nbsp;&nbsp; &nbsp; &nbsp;
                                                        <input type="radio" name="gender" id="gender" value="female" <?php echo set_radio('gender','female')?> />Female &nbsp; &nbsp; &nbsp;
                                                    </td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('gender'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td></br><?php echo 'Civil Status'; ?></td>
                                                    <td></br>
                                                        <input type="radio" name="status" id="status"  value="single" />Single&nbsp; &nbsp; &nbsp;
                                                        <input type="radio" name="status" id="status" value="married"/>Married&nbsp; &nbsp; &nbsp;
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
                                                    <td><textarea name="address" cols="19" rows="3" class="form-control"><?php echo set_value('address'); ?></textarea></td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('address'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Assign to a Branch'?></td>
                                                    <td>
                                                        <div id="selectBranchs">
                                                            <div id="nav">
                                                                <input type="radio" name="selectBranch" id="selectBranch" class="div1" value="main" />Main Branch &nbsp; &nbsp; &nbsp;  
                                                                <input type="radio" name="selectBranch" id="selectBranch" class="div2" value="sub" />Sub Branch
                                                            </div>

                                                            <div id="div1" class="selectBranch">
                                                                </br>
                                                                <select name="branchType" class="form-control" id="branchType" onchange="this.form.submit()>
                                                                    <?php foreach ($branch as $row) { ?>
                                                                        <option value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div id="div2" class="selectBranch">
                                                                </br>
                                                                <select name="branchType" class="form-control" id="branchType">
                                                                    <?php foreach ($branch1 as $row1) { ?>
                                                                        <option value="<?php echo $row1->sub_branch_id; ?>"><?php echo $row1->sub_branch_name; ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            </br>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Qualifications'; ?></td>
                                                    <td><textarea name="qualification" cols="19" rows="3" class="form-control"><?php echo set_value('qualification'); ?></textarea></td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('qualification'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Caree Starting Date'; ?></td>
                                                    <td><input type="date" id="date" name="date" value="<?php echo date("Y-m-d"); set_value('date'); ?>" class=" datepicker" placeholder="Date"></td>
                                                    <td><span class="help-block" style="color: crimson"> <?php echo form_error('date'); ?></span></td>
                                                </tr>
                                            </table>
                                            <input type="submit" name="submit" onclick="return confirm('Do you really want to insert?')" class="btn btn-primary" id="submit" name="permission" placeholder="permission">
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
        <script type="text/javascript" charset="utf-8">
            (function () {
                var selectBranchs = document.getElementById('selectBranchs');
                var nav = selectBranchs.getElementsByTagName('input');

                /*
                 * Hide all selectBranchs
                 */
                function hideTabs() {
                    var selectBranch = selectBranchs.getElementsByTagName('div');
                    for (var i = 0; i <= nav.length; i++) {
                        if (selectBranch[i].className == 'selectBranch') {
                            selectBranch[i].className = selectBranch[i].className + ' hide';
                        }
                    }
                }

                /*
                 * Show the clicked selectBranch
                 */
                function showTab(selectBranch) {
                    document.getElementById(selectBranch).className = 'selectBranch'
                }

                hideTabs(); /* hide selectBranchs on load */

                /*
                 * Add click events
                 */
                for (var i = 0; i < nav.length; i++) {
                    nav[i].onclick = function () {
                        hideTabs();
                        showTab(this.className);
                    }
                }
            })();
        </script>
    </body>
</html>

