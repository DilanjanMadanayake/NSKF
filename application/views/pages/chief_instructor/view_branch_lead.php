<html>
    <head>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">	
                    <div class="row">	
                        <div class="col-md-12">                                        
                            <?php foreach ($bl as $row) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" align="center"><h4><b><?php echo "Branch Lead " . $row->first_name . "'s Full Details" ?></b></h4></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-2"> </div>
                                            <div class="col-sm-8">
                                                <div class="table1">
                                                    <?php echo form_open('chief_instructor/view_branch_lead'); ?>
                                                    <table class="table" width="700" border="0">  
                                                        <tr>
                                                            <td><b>First Name</b></td>
                                                            <td><small><?php echo $row->first_name ?></small></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Last Name</b></td>
                                                            <td><small><?php echo $row->last_name ?></small></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Email</b></td>
                                                            <td><small><?php echo $row->email ?></small></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Gender</b></td>
                                                            <td><small><?php echo $row->gender ?></small></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Civil Status</b></td>
                                                            <td><small><?php echo $row->civil_status ?></small></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Contact No</b></td>
                                                            <td><small><?php echo $row->contact_number ?></small></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Address</b></td>
                                                            <td><small><?php echo $row->address ?></small></td>   
                                                        </tr>
                                                        <tr>
                                                            <td><b>Date of Birth</b></td>
                                                            <td><small><?php echo $row->date_of_birth ?></small></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Nationality</b></td>
                                                            <td><small><?php echo $row->nationality ?></small></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Religion</b></td>
                                                            <td><small><?php echo $row->religion ?></small></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Occupation</b></td>
                                                            <td><small><?php echo nl2br($row->occupation) ?></small></td>
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
                                        <div class="col-sm-2"> </div>
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

