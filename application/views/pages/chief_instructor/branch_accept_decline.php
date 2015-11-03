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
                                <div class="panel-heading"><h4>Branch Request Management</h4></div>

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
                if($status == 2){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-danger\" role=\"alert\">
                            Branch cannot be deleted. This branch has a sub branch.
                        </div>
                    </div>";
                }
                ?>
                                    <h3>Main Branches</h3>
                                    <form method="POST" >
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
                                                    <td align="center">Accept</td>
                                                    <td align="center">Decline</td>
                                                </tr>
                                                <?php foreach ($main_branch as $row) { ?>
                                                    <tr>
                                                        <td><small><?php echo $row->branch_name ?></small></td>
                                                        <td><small><?php echo $row->town ?></small></td>
                                                        <td><small><?php echo $row->country ?></small></td>
                                                        <td><small><?php echo substr($row->email, 0, 20) . "..." ?></small></td>
                                                        <td><small><?php echo $row->contact_number ?></small></td>
                                                        <td><small><?php echo substr($row->address, 0, 20) . "..." ?></small></td>

                                                        <td align="center"><small><a name="branch" value="main" href="<?php echo base_url("chief_instructor/view_branch") . "/" . $row->branch_id; ?>"><span class="glyphicon glyphicon-eye-open" name="branch" value="main"></span></a></small></td>
                                                        <td align="center"><small><a name="branch" value="main" href="<?php echo base_url("chief_instructor/branch_accept?type=main&bid=") . $row->branch_id; ?>"><span class="glyphicon glyphicon-ok" name="branch" value="main" onclick="return confirm('Are you sure you want to accept this branch?');"></span></a></small></td>
                                                        <td align="center"><small><a name="branch" value="main" href="<?php echo base_url("chief_instructor/branch_deny?type=main&bid=") . $row->branch_id; ?>"><span class="glyphicon glyphicon-remove" name="branch" value="main" onclick="return confirm('Are you sure you want to delete this request?');"></span></a></small></td>
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
                                                    <td align="center">Accept</td>
                                                    <td align="center">Decline</td>                                            
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
                                                        <td align="center"><small><a name="branch" value="sub" href="<?php echo base_url("chief_instructor/view_sub_branch") . "/" . $row->sub_branch_id; ?>"><span class="glyphicon glyphicon-eye-open" name="branch" value="sub"></span></a></small></td>
                                                        <td align="center"><small><a name="branch" value="sub" href="<?php echo base_url("chief_instructor/branch_accept?type=sub&bid=") . $row->sub_branch_id; ?>"><span class="glyphicon glyphicon-ok" name="branch" value="sub" onclick="return confirm('Are you sure you want to accept this branch?');"></span></a></small></td>
                                                        <td align="center"><small><a name="branch" value="sub" href="<?php echo base_url("chief_instructor/branch_deny?type=sub&bid=") . $row->sub_branch_id; ?>"><span class="glyphicon glyphicon-remove" name="branch" value="sub" onclick="return confirm('Are you sure you want to decline this branch?');"></span></a></small></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </form>
                                    <div class="col-sm-4">
                                        </br>
                                        </br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>              
                    </div><!--/col-->
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

