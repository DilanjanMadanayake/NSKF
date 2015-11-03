<html>
    <head>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">	
                    <div class="row">	
                        <div class="col-md-12">                                        
                            <hr>
                            <div class="panel panel-default">
                                <div class="panel-heading" align="center"><h4><b>Branch Leader Management</b></h4>
                                </div>
                                <div class="panel-body">

                                    <?php
                                    if ($status == 1) {
                                        echo
                                        "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            New Branch Lead Has Been Added. 
                        </div>
                    </div>";
                                    }
                                    if ($status == 2) {
                                        echo
                                        "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Branch Leader Has Been Updated. 
                        </div>
                    </div>";
                                    }
                                    if ($status == 3) {
                                        echo
                                        "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Branch Leader Has Been Deleted. 
                        </div>
                    </div>";
                                    }
                                    ?>
                                    <div class="table1">
                                        <form action="branch_lead_management.php" method="post">
                                            <table class="table table-condensed" width="900" border="0">
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Contact No</td>
                                                    <td>Email</td>
                                                    <td>Address</td>
                                                    <td>Gender</td>
                                                    <td align="center">View More</td>
                                                    <td align="center">Update</td>
                                                    <td align="center">Delete</td>
                                                </tr>
                                                <?php foreach ($bl as $row) { ?>
                                                    <tr>
                                                        <td><small><?php echo $row->first_name ?></small></td>
                                                        <td><small><?php echo substr($row->last_name, 0, 20) . "..." ?></small></td>
                                                        <td><small><?php echo $row->contact_number ?></small></td>
                                                        <td><small><?php echo substr($row->email, 0, 20) . "..." ?></small></td>
                                                        <td><small><?php echo substr($row->address, 0, 20) . "..." ?></small></td>
                                                        <td><small><?php echo $row->gender ?></small></td>
                                                        <td align="center"><small><a href="<?php echo base_url("chief_instructor/view_branch_lead") . "/" . $row->user_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></small></td>
                                                        <td align="center"><small><a href="<?php echo base_url("chief_instructor/update_branch_lead") . "/" . $row->user_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></small></td>
                                                        <td align="center"><small><a href="<?php echo base_url("chief_instructor/delete_branch_lead") . "/" . $row->user_id; ?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this branch leader?');"></span></a></small></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="col-sm-4">
                                        </br>
                                        </br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>              
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

