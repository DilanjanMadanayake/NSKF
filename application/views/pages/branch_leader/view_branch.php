<html>
    <head>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">	
          
                    <div class="row">	
                        <div class="col-md-12">                                        

                            <?php foreach ($branch as $row) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" align="center"><h4><b><?php echo $row->branch_name . "'s Full Details" ?></b></h4></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-2"> </div>
                                            <div class="col-sm-8">
                                                <div class="table1">
                                                    <?php echo form_open('branch_leader/view_branch'); ?>
                                                    <table class="table" width="700" border="0"> 

                                                        <tr>                                   
                                                            <td><b>Branch Name</b></td>
                                                            <td><?php echo $row->branch_name ?></td>                                    
                                                        </tr>
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

