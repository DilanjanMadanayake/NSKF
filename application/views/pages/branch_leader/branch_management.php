<html>
    <head>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">	
                    <ul class="list-inline pull-right">
                        <li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i><span class="count">3</span></a><ul class="dropdown-menu" role="menu"><li><a href="#">1. Is there a way..</a></li><li><a href="#">2. Hello, admin. I would..</a></li><li><a href="#"><strong>All messages</strong></a></li></ul></li>
                        <li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
                        <li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span> Add Widget</a></li>
                    </ul>
                    <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>  
                    <hr>
                    <div class="row">	
                        <div class="col-md-12">                                        
                            <hr>
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
                            </div>
                            <hr>
                            <div class="panel panel-default">
                                <div class="panel-heading"><h4>Branch Management</h4></div>

                                <div class="panel-body">
                                    <?php
                                    if ($status == 2) {
                                        echo
                                        "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            New branch has been added. 
                        </div>
                    </div>";
                                    }
                                    if ($status == 3) {
                                        echo
                                        "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Branch has been updated. 
                        </div>
                    </div>";
                                    }
                                    if ($status == 4) {
                                        echo
                                        "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Branch has been deleted. 
                        </div>
                    </div>";
                                    }
                                    if ($status == 5) {
                                        echo
                                        "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Sub Branch has been updated. 
                        </div>
                    </div>";
                                    }
                                    if ($status == 6) {
                                        echo
                                        "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Sub Branch has been deleted. 
                        </div>
                    </div>";
                                    }
                                    if($status == 7){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-danger\" role=\"alert\">
                            Branch cannot be deleted. This branch has a sub branch.
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
                                    <h3>Main Branches</h3>
                                    <div class="table1">
                                        <table class="table table-condensed" width="900">
                                            <tr>
                                                <td>Branch Name</td>
                                                <td>Town</td>
                                                <td>Country</td>
                                                <td>Email</td>
                                                <td>Contact No</td>
                                                <td>Address</td>
                                                <td align="center">View More</td>
                                                <td align="center">Update</td>
                                                <td align="center">Delete</td>
                                            </tr>
                                            <?php foreach ($main_branch as $row) { ?>
                                                <tr>
                                                    <td><small><?php echo $row->branch_name ?></small></td>
                                                    <td><small><?php echo $row->town ?></small></td>
                                                    <td><small><?php echo $row->country ?></small></td>
                                                    <td><small><?php echo substr($row->email, 0, 20) . "..." ?></small></td>
                                                    <td><small><?php echo $row->contact_number ?></small></td>
                                                    <td><small><?php echo substr($row->address, 0, 20) . "..." ?></small></td>

                                                    <td align="center"><small><a href="<?php echo base_url("branch_leader/view_branch") . "/" . $row->branch_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></small></td>
                                                    <td align="center"><small><a href="<?php echo base_url("branch_leader/update_branch") . "/" . $row->branch_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></small></td>
                                                    <td align="center"><small><a href="<?php echo base_url("branch_leader/delete_branch") . "/" . $row->branch_id; ?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this record?');"></span></a></small></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                    <h3>Sub Branches</h3>
                                    <div class="table1">
                                        <table class="table table-condensed" width='800'>
                                            <tr>
                                                <td>Sub Branch</td>
                                                <td>Town</td>
                                                <td>Country</td>
                                                <td>Email</td>
                                                <td>Contact No</td>
                                                <td>Address</td>
                                                <td align="center">View More</td>
                                                <td align="center">Update</td>
                                                <td align="center">Delete</td>                                            
                                            </tr>
                                            <tr>
                                                <?php foreach ($sub_branch as $row) { ?>
                                                <tr>
                                                    <td><small><?php echo $row->sub_branch_name ?></small></td>
                                                    <td><small><?php echo $row->town ?></small></td>
                                                    <td><small><?php echo $row->country ?></small></td>
                                                    <td><small><?php echo substr($row->email, 0, 20) . "..." ?></small></td>
                                                    <td><small><?php echo $row->contact_number ?></small></td>
                                                    <td><small><?php echo substr($row->address, 0, 20) . "..." ?></small></td>
                                                    <td align="center"><small><a href="<?php echo base_url("branch_leader/view_sub_branch") . "/" . $row->sub_branch_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></small></td>
                                                    <td align="center"><small><a href="<?php echo base_url("branch_leader/update_sub_branch") . "/" . $row->sub_branch_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></small></td>
                                                    <td align="center"><small><a href="<?php echo base_url("branch_leader/delete_sub_branch") . "/" . $row->sub_branch_id; ?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this record?');"></span></a></small></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
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

