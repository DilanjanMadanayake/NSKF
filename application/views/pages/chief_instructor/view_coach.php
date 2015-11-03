<html>
    <head>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">	

                    <div class="row">	
                        <div class="col-md-12">                                        

                            <?php foreach ($coach as $row) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" align="center"><h4><b><?php echo "Coach ". $row->coach_name."'s Full Details" ?></b></h4></div>
                                <div class="panel-body">
                                    <div class="row">
  <div class="col-sm-2"> </div>
  <div class="col-sm-8">
                                    <div class="table1">
                                        <!--<form action="view_coach.php" method="post">-->
                                        <?php echo form_open('chief_instructor/view_coach'); ?>
                                            <table class="table" width="700" border="0">  
                                                <tr>
                                                        <td><b>Full Name</b></td>
                                                        <td><small><?php echo $row->coach_name ?></small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>NIC</b></td>
                                                        <td><small><?php echo $row->nic ?></small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Date of Birth</b></td>
                                                        <td><small><?php echo $row->dob ?></small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Gender</b></td>
                                                        <td><small><?php echo $row->gender ?></small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Civil Status</b></td>
                                                        <td><small><?php echo $row->status ?></small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Contact No</b></td>
                                                        <td><small><?php echo $row->contact_no ?></small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Email</b></td>
                                                        <td><small><?php echo $row->email ?></small></td>   
                                                    </tr>
                                                    <tr>
                                                        <td><b>Address</b></td>
                                                        <td><small><?php echo $row->address ?></small></td>
                                                    </tr>
<!--                                                    <tr>
                                                        <td><b>Branch</b></td>
                                                        <td><small><?php echo $row->branch ?></small></td>
                                                    </tr>-->
                                                    <tr>
                                                        <td><b>Qualifications</b></td>
                                                        <td><small><?php echo nl2br($row->qualifications) ?></small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Caree Starting Date</b></td>
                                                        <td><small><?php echo nl2br($row->careeStartingDate) ?></small></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        <?php echo form_close(); ?>
                                        <!--</form>-->
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

