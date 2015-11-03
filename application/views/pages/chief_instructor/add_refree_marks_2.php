
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9">
               
                <div class="row">        
                    <div class="col-md-12">          
                        
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>Round 2</h4></div>
                            <div class="panel-body">
                                <div class ="form-group" >                
                                    <div class="col-md-12">
                                        <?php echo form_open('chief_instructor/round_2/' . $id); ?>                             
                                            <div class="col-sm-6">
                                                <select name="player" class="form-control" id="player">
                                                    <?php foreach ($refree as $row) { ?>
                                                        <option value="<?php echo $row->player_name; ?>"><?php echo $row->player_name; ?> </option>
                                                    <?php } ?>
                                                </select>
                                                </br>
                                                </br>                                                
                                                Refree mark 1
                                                <input type="text" name="ref1" id="ref1"></br>
                                                Refree mark 2
                                                <input type="text" name="ref2" id="ref1"></br>
                                                Refree mark 3
                                                <input type="text" name="ref3" id="ref1"></br>
                                                Refree mark 4
                                                <input type="text" name="ref4" id="ref1"></br>
                                                Refree mark 5
                                                <input type="text" name="ref5" id="ref1"></br>
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            <div class="col-sm-6">
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
                                                    <?php foreach ($refree1 as $row1) { ?>
                                                        <tr>
                                                            <td><?php echo $row1->player_name; ?></td>
                                                            <td><?php echo $row1->ref_mark_1; ?></td>
                                                            <td><?php echo $row1->ref_mark_2; ?></td>
                                                            <td><?php echo $row1->ref_mark_3; ?></td>
                                                            <td><?php echo $row1->ref_mark_4; ?></td>
                                                            <td><?php echo $row1->ref_mark_5; ?></td>
                                                            <td><?php echo $row1->total; ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                        
                                                        <a href="<?php echo base_url("chief_instructor/rankings") . "/" . $tournament; ?>"><span class="glyphicon glyphicon-star" >Go For Rankings</span></a>
                                                             
                                                </table>
                                                <?php echo form_close(); ?>
                                            </div>           
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
    </div>


