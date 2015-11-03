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
                                <div class="panel-heading"><h4>Branch Management</h4></div>
                                     
                                <div class="panel-body">
                                    <?php 
                if($status == 2){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            New branch has been added. 
                        </div>
                    </div>";
                } 
                if($status == 3){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Branch has been updated. 
                        </div>
                    </div>";
                }
                if($status == 4){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Branch has been deleted. 
                        </div>
                    </div>";
                }
                if($status == 5){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Sub Branch has been updated. 
                        </div>
                    </div>";
                }
                if($status == 6){
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
                if(validation_errors()) {
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
                                                    <td><small><?php echo $row->contact_number?></small></td>
                                                    <td><small><?php echo substr($row->address, 0, 20) . "..." ?></small></td>
                   
                                                    <td align="center"><small><a href="<?php echo base_url("chief_instructor/view_branch") . "/" . $row->branch_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></small></td>
                                                    <td align="center"><small><a href="<?php echo base_url("chief_instructor/update_branch") . "/" . $row->branch_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></small></td>
                                                    <td align="center"><small><a href="<?php echo base_url("chief_instructor/delete_branch") . "/" . $row->branch_id; ?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this record?');"></span></a></small></td>
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
                                                    <td><small><?php echo $row->email ?></small></td>
                                                    <td><small><?php echo $row->contact_number ?></small></td>
                                                    <td><small><?php echo $row->address ?></small></td>
                                                    <td align="center"><small><a href="<?php echo base_url("chief_instructor/view_sub_branch") . "/" . $row->sub_branch_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></small></td>
                                                    <td align="center"><small><a href="<?php echo base_url("chief_instructor/update_sub_branch") . "/" . $row->sub_branch_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></small></td>
                                                    <td align="center"><small><a href="<?php echo base_url("chief_instructor/delete_sub_branch") . "/" . $row->sub_branch_id; ?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this record?');"></span></a></small></td>
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
                        </div><!--/panel-->
                        <hr>              
                    </div><!--/col-->
                    <!--/col-span-6-->
                </div><!--/row-->
                <hr>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div><!--/col-span-9-->
        </div>
    </body>
</html>

