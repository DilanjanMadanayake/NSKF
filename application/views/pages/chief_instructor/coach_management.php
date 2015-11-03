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
                                <div class="panel-heading" align="center"><h4><b>Coach Details Management</b></h4>
                                </div>
                                <div class="panel-body">
                                    
                <?php 
                if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            New coach has been added. 
                        </div>
                    </div>";
                } 
                if($status == 2){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Coach has been updated. 
                        </div>
                    </div>";
                } 
                if($status == 3){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Coach has been deleted. 
                        </div>
                    </div>";
                } 
                ?>
                                    <div class="row">
                                    </div>
                                    <div class="table1">
                                        <form action="coach_management.php" method="post">
                                            <table class="table table-condensed" width="900" border="0">
                                                <tr>
                                                    <td>Coach Name</td>
                                                    <td>NIC</td>
                                                    <td>Date of Birth</td>
                                                    <td>Gender</td>
                                                    <td>status</td>
                                                    <td>Contact No</td>
                                                    <td>Email</td>
                                                    <td align="center">View More</td>
                                                    <td align="center">Update</td>
                                                    <td align="center">Delete</td>
                                                </tr>
                                                <?php foreach ($coach as $row) { ?>
                                                    <tr>
                                                        <td><small><?php echo substr($row->coach_name, 0, 20) . "..." ?></small></td>
                                                        <td><small><?php echo $row->nic ?></small></td>
                                                        <td><small><?php echo $row->dob ?></small></td>
                                                        <td><small><?php echo $row->gender ?></small></td>
                                                        <td><small><?php echo $row->status ?></small></td>
                                                        <td><small><?php echo $row->contact_no ?></small></td>
                                                        <td><small><?php echo substr($row->email, 0, 20) . "..." ?></small></td>                                                   
                                                        <td align="center"><small><a href="<?php echo base_url("chief_instructor/view_coach") . "/" . $row->coach_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></small></td>
                                                        <td align="center"><small><a href="<?php echo base_url("chief_instructor/update_coach") . "/" . $row->coach_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></small></td>
                                                        <td align="center"><small><a href="<?php echo base_url("chief_instructor/delete_coach") . "/" . $row->coach_id; ?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this coach?');"></span></a></small></td>
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

