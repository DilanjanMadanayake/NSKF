<html>
    <head>
        <script type="text/javascript">
            function settexbox() {
                document.getElementById("name").value = "<?php echo "Digana Branch"; ?>";
                document.getElementById("town").value = "<?php echo "Digana"; ?>";
                document.getElementById("country").value = "<?php echo "Sri Lanka"; ?>";
                document.getElementById("contact_no").value = "<?php echo "0718167549"; ?>";
                document.getElementById("email").value = "<?php echo "aruna@gmail.com"; ?>";
                document.getElementById("address").value = "<?php echo "Siridigana Road, Willamuna"; ?>";
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
                                <div class="panel-heading" align="center"><h4><b>Add New Branch</b></h4></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-2"> </div>
                                        <div class="col-sm-10">
                                            <?php echo form_open('branch_leader/add_branch'); ?>   
                                            <?php
                                            if ($status == 1) {
                                                echo
                                                "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Your Branch Request Has Been Sent. 
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
                                            <table width="500" border='0' cellpadding='0' cellspacing='0'>
                                                <tr>
                                                    <td><?php echo 'Branch Name'; ?></td>
                                                    <td><input type="text" id="name" name="name" class="form-control" value="<?php echo set_value('name'); ?>"><span class="help-block" style="color: crimson"> <?php echo form_error('name'); ?></span></td>
                                                </tr> 
                                                <tr>
                                                    <td>Branch Type</td>
                                                    <td>
                                                        <div id="selectBranchs">
                                                            <div id="nav">
                                                                </br>
                                                                <input type="radio" name="selectBranch" id="selectBranch" class="div1" value="main" checked=""/>Main Branch
                                                                <input type="radio" name="selectBranch" id="selectBranch" class="div2" value="sub"/>Sub Branch
                                                            </div>

                                                            <div id="div1" class="selectBranch">
                                                            </div>

                                                            <div id="div2" class="selectBranch">
                                                                please select main branch from this dropdown! </br>
                                                                <select name="branchType" class="form-control" id="branchType" onchange="this.form.submit()">
                                                                    <?php foreach ($branch as $row) { ?>
                                                                        <option value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            </br>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Town'; ?></td>
                                                    <td><input type="text" id="town" name="town" class="form-control" value="<?php echo set_value('town'); ?>">
                                                        <span class="help-block" style="color: crimson"> <?php echo form_error('town'); ?></span></td>
                                                </tr>

                                                <tr>
                                                    <td><?php echo 'Country'; ?></td>
                                                    <td><input type="text" id="country" name="country" class="form-control" value="<?php echo set_value('country'); ?>">
                                                        <span class="help-block" style="color: crimson"> <?php echo form_error('country'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Contact No'; ?></td>
                                                    <td><input type="text" id="contact_no" name="contact_no" class="form-control" value="<?php echo set_value('contact_no'); ?>">
                                                        <span class="help-block" style="color: crimson"> <?php echo form_error('contact_no'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Email'; ?></td>
                                                    <td><input type="text" id="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
                                                        <span class="help-block" style="color: crimson"> <?php echo form_error('email'); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo 'Address'; ?></td>
                                                    <td><textarea name="address" id="address" class="form-control"><?php echo set_value('address'); ?></textarea>
                                                        <span class="help-block" style="color: crimson"> <?php echo form_error('address'); ?></span></td>
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

            function submitForm() {
                // Get the first form with the name
                // Hopefully there is only one, but there are more, select the correct index
                var frm = document.getElementsByName('chief_instructor/add_branch')[0];
                frm.submit(); // Submit
                frm.reset();  // Reset
                return false; // Prevent page refresh
            }

        </script>
    </body>
</html>