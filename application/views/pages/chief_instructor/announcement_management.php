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
                                <div class="panel-heading" align="center"><h4><b>Announcement Management</b></h4></div>
                                <div class="panel-body">
                                    <?php 
                if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Announcement has been updated. 
                        </div>
                    </div>";
                } 
                if($status == 2){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Announcement has been deleted. 
                        </div>
                    </div>";
                } 
                if($status == 3){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Announcement has been added. 
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
                                    
                                    <div class="table1">
                                        <?php echo form_open('chief_instructor/announcement_management'); ?>
                                            <table class="table table-condensed" width="900" border="0">
                                                <tr>
                                                    <td>Title</td>
                                                    <td>Description</td>
                                                    <td>Published date</td>
                                                    <td align="center">View More</td>
                                                    <td align="center">Update</td>
                                                    <td align="center">Delete</td>
                                                </tr>
                                                <?php foreach ($announcement as $row) { ?>
                                                    <tr>
                                                        <td><small><?php echo substr($row->title, 0, 20) ?></small></td>
                                                        <td><small><?php echo substr($row->description, 0, 50) ?></small></td>
                                                        <td><small><?php echo $row->date ?></small></td>
                                                        <td align="center"><small><a href="<?php echo base_url("chief_instructor/view_announcement") . "/" . $row->announcement_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></small></td>
                                                        <td align="center"><small><a href="<?php echo base_url("chief_instructor/update_announcement") . "/" . $row->announcement_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></small></td>
                                                        <td align="center"><small><a href="<?php echo base_url("chief_instructor/delete_announcement") . "/" . $row->announcement_id; ?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this announcement?');"></span></a></small></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        <?php echo form_close(); ?>
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

