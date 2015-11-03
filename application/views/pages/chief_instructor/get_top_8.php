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
                                <div class="panel-heading" align="center"><h4><b>Top 8</b></h4></div>
                                <div class="panel-body">
                                    <div class="table1">
                                        <?php echo form_open('chief_instructor/get_top_8'. "/" . $id); ?>
                                            <table class="table table-condensed">
                                                    <tr>
                                                        <th>Player Name</th>
                                                        <th>Mark 1</th>
                                                        <th>Mark 2</th>
                                                        <th>Mark 3</th>
                                                        <th>Mark 4</th>
                                                        <th>Mark 5</th>
                                                        <th>Average</th>
                                                    </tr>
                                                        <tr>
                                                            <?php foreach ($refree as $row1) { ?>
                                                            <td><?php echo $row1->player_name; ?></td>
                                                            <td><?php echo $row1->ref_mark_1; ?></td>
                                                            <td><?php echo $row1->ref_mark_2; ?></td>
                                                            <td><?php echo $row1->ref_mark_3; ?></td>
                                                            <td><?php echo $row1->ref_mark_4; ?></td>
                                                            <td><?php echo $row1->ref_mark_5; ?></td>
                                                            <td><?php echo $row1->total; ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                        
                                                        
                                                             
                                                </table>
                                        <?php echo form_close(); ?>
                                    </div>
                                    <div class="col-sm-4">
                                        </br>
                                        <?php if($count<8){?>
                                        <?php }else{ ?>
                                        <a href="<?php echo base_url("chief_instructor/round_2") . "/" . $tournament; ?>"><span class="glyphicon glyphicon-repeat" >Go For Round 2</span></a>
                                        <?php }?>
                                        <a href="<?php echo base_url("chief_instructor/rankings_round_one") . "/" . $tournament; ?>"><span class="glyphicon glyphicon-star" >Go For Ranking</span></a>
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

