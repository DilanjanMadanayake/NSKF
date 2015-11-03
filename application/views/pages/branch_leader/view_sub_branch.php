 <html>
    <head>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">	
<!--                    <ul class="list-inline pull-right">
                        <li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i><span class="count">3</span></a><ul class="dropdown-menu" role="menu"><li><a href="#">1. Is there a way..</a></li><li><a href="#">2. Hello, admin. I would..</a></li><li><a href="#"><strong>All messages</strong></a></li></ul></li>
                        <li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
                        <li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span> Add Widget</a></li>
                    </ul>
                    <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>  
                    <hr>-->
                    <div class="row">	
                        <div class="col-md-12">                                        
<!--                            <hr>
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
                            <hr>-->
                            <?php foreach ($branch as $row) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" align="center"><h4><b><?php echo $row->sub_branch_name."'s Full Details" ?></b></h4></div>
                                <div class="panel-body">
                                    <div class="row">
  <div class="col-sm-2"> </div>
  <div class="col-sm-8">
                                    <div class="table1">
                                        <?php echo form_open('chief_instructor/view_sub_branch'); ?>
                                            <table class="table" width="700" border="0"> <tr>                                   
                                    <td><b>Sub Branch Name</b></td>
                                    <td><?php echo $row->sub_branch_name ?></td>                                    
                                </tr>
<!--                                <tr>
                                    <?php
//                                    $bId=$branch['branch_id'];
//                                    $selectName="select branch_name from branch where branch_id=$bId";
//                                    $selectNameResult=  mysqli_query($db, $selectName);
//                                    $result= mysqli_fetch_array($selectNameResult);
                                    ?>
                                    <td><b>Main Branch Name</b></td>
                                    <td><?php //echo $result['branch_name'] ?></td>
                                </tr>-->
                                <tr>
                                    <td><b>Town</b></td>
                                    <td><?php echo $row->town ?></td>
                                </tr>
                                <tr>
                                    <td><b>Country</b></td>
                                    <td><?php echo $row->country ?></td>
                                </tr>
                                <tr>
                                    <td><b>Contact No</b></td>
                                    <td><?php echo $row->contact_number ?></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><?php echo $row->email ?></td>
                                </tr>
                                <tr>
                                    <td><b>Address</b></td>
                                    <td><?php echo $row->address ?></td>
                                </tr>
<!--                                <tr>
                                         <?php 
//                                        $branch_Lead = $branch['branch_lead_id'];
//                                        $sql1 = "select distinct u.first_name, u.last_name from user u, sub_branch b where u.user_id=$branch_Lead";
//                                        $record1 = mysqli_query($db, $sql1);
//                                        while ($branch1 = mysqli_fetch_array($record1)) {
                                            ?>
                                            
                                    <td><b>Branch Leader</b></td>
                                    <td><?php //echo $branch1['first_name'] . " " . $branch1['last_name'] ?></td>
                                        <?php //}
                                        ?>        
                                </tr>-->
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



