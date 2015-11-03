<html>
    <head>
    </head>
    <body>
        <div class="homeinfo">
        </div>
        <div class="container overlay">
            <div class="blockblack">
                <div class="row">
                    <div class="col-sm-2">
                        </br>
                    </div>
                    <div class="col-sm-8" align='center'><h3>Our Branches</h3></div>
                    </br>
                    <div class="col-sm-2">
                        </br>
                    </div>
                </div>
                <form action="guest_view_branch.php" method="post" id="updateForm"> 
                    <div class="row">
                        <?php foreach ($branch as $row) { ?>
                            <div class="col-md-4" style="color:#000000;" align="center">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="color:#000000; height: 50px">
                                        <h3>
                                            <?php echo $row->branch_name; ?>                                            
                                        </h3>
                                    </div>
                                    <div class="panel-body" align="left"> 
                                        <b>Country : </b><?php echo $row->country; ?></br>
                                        <b>Town : </b><?php echo $row->town; ?></br>
                                        <b>Contact No : </b><?php echo $row->contact_number; ?></br>
                                        <b>Email : </b><?php echo $row->email; ?></br>
                                        <b>Address : </b><?php echo $row->address; ?></br>
<!--                                        <b>Branch Leader : </b><?php echo $row->first_name . " " . $row->last_name; ?> </br>-->
                                        <a class="btn btn-warning bgcolor" href="<?php echo base_url("/home/sub_branches?id=" . $row->branch_id); ?>" role="button">View Sub Branches</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>