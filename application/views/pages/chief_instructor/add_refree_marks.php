<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9">
                
                <div class="row">        
                    <div class="col-md-12">          
                        
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>Registered Players</h4></div>
                            <div class="panel-body">
                                <div class ="form-group" >                
                                    <div class="col-md-12">
                                        <table class="table">
                                            <?php echo form_open('chief_instructor/add_refree_marks/' . $id); ?>
                                            <td>                    
                                                <select name="gender" class="form-control" id="tournament_type">
                                                    <option value="select">Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>                    
                                                </select>
                                            </td>
                                            <td>                      
                                                <select name="under" class="form-control" id="tournament_type">
                                                    <option value="select">Select Age Group</option>
                                                    <option value="Under10"><?php echo "Under 10" ?> </option>
                                                    <option value="Under11"><?php echo "Under 11" ?> </option>
                                                    <option value="Under12"><?php echo "Under 12" ?> </option>
                                                    <option value="Under13"><?php echo "Under 13" ?> </option>
                                                    <option value="Under14"><?php echo "Under 14" ?> </option>
                                                    <option value="Under15"><?php echo "Under 15" ?> </option>
                                                    <option value="Under16"><?php echo "Under 16" ?> </option> 
                                                    <option value="Under17"><?php echo "Under 17" ?> </option>
                                                    <option value="Under18"><?php echo "Under 18" ?> </option>
                                                    <option value="Under19"><?php echo "Under 19" ?> </option>
                                                    <option value="Under20"><?php echo "Under 20" ?> </option>
                                                    <option value="Under21"><?php echo "Under 21" ?> </option>
                                                    <option value="Open">Open</option>  
                                                </select>
                                            </td>
                                            <td>                     
                                                <select name="tournament_section" class="form-control" id="tournament_type">
                                                    <option value="select">Select Section</option>
                                                    <option value="katha">Kata</option>
                                                    <option value="kumitha">Kumite</option>                    
                                                </select>
                                            </td>
                                            <td>                      
                                                <select name="belt" class="form-control" id="tournament_type">
                                                    <option value="select">Select Belt Type</option>
                                                    <option value="white"><?php echo "White" ?> </option>
                                                    <option value="yellow"><?php echo "Yellow" ?> </option>
                                                    <option value="gold"><?php echo "Gold" ?> </option>
                                                    <option value="orange"><?php echo "Orange" ?> </option>
                                                    <option value="blue"><?php echo "Blue" ?> </option>
                                                    <option value="purple"><?php echo "Purple" ?> </option>
                                                    <option value="brown"><?php echo "Brown" ?> </option> 
                                                    <option value="red"><?php echo "Red" ?> </option>
                                                    <option value="black"><?php echo "Black" ?> </option> 
                                                </select>
                                            </td>
                                            <td>
                                                <button type="submit" name="submit" class="btn btn-primary">Go</button>
                                            </td>
                                            </tr>
                                            <?php echo form_close(); ?>
                                        </table>        
                                        <div class="col-md-12">
                                            <?php echo form_open('chief_instructor/add_refree_marks1/' . $id); ?>                             
                                            <div class="col-sm-5">
                                                <select name="player" class="form-control" id="player">
                                                    <?php foreach ($player as $row) { ?>
                                                        <option value="<?php echo $row->player_name; ?>"><?php echo $row->player_name; ?> </option>
                                                    <?php } ?>
                                                </select>
                                                </br>
                                                </br>                                                
                                                Refree mark 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="ref1" id="ref1"value="<?php echo set_value('ref1'); ?>">
                                                <span style="color: crimson"> <?php echo form_error('ref1'); ?></span></br>
                                                
                                                
                                                
                                                Refree mark 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="ref2" id="ref2"value="<?php echo set_value('ref2'); ?>">
                                                <span style="color: crimson"> <?php echo form_error('ref2'); ?></span></br>
                                                
                                                Refree mark 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="ref3" id="ref3"value="<?php echo set_value('ref3'); ?>">
                                                <span style="color: crimson"> <?php echo form_error('ref3'); ?></span></br>
                                                Refree mark 4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="ref4" id="ref4"value="<?php echo set_value('ref4'); ?>">
                                                <span style="color: crimson"> <?php echo form_error('ref4'); ?></span></br>
                                                Refree mark 5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="ref5" id="ref5"value="<?php echo set_value('ref5'); ?>">
                                                <span style="color: crimson"> <?php echo form_error('ref5'); ?></span></br>
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-6">
                                                    <a href="<?php echo base_url("chief_instructor/get_top_8") . "/" . $tournament; ?>"><span class="glyphicon glyphicon-star" >Get Top 8</span></a>                                                             
                                                    </br></br>
                                                <table class="table table-condensed">
                                                    <tr>
                                                        <td>Player Name</td>
                                                        <td>Mark 1</td>
                                                        <td>Mark 2</td>
                                                        <td>Mark 3</td>
                                                        <td>Mark 4</td>
                                                        <td>Mark 5</td>
                                                        <td>Average</td>
                                                    </tr>
                                                    <?php foreach ($refree as $row1) { ?>
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
                                                        
                                                </table>
                                                <?php echo form_close(); ?>
                                            </div>           
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


