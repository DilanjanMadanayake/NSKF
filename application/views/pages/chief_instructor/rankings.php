
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9">
                
                <div class="row">        
                    <div class="col-md-12">          
                        
                        <div class="panel panel-default">
                            <div class="panel-heading" align="center"><h3>Winners</h3></div>
                            <div class="panel-body">
                                <div class ="form-group" > 
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <?php echo form_open('chief_instructor/rankings/' . $id); ?>                             
                                        <div class="col-sm-4"></br><img src="<?php echo base_url("images/two.png"); ?>" alt="Winner 1" align="bottom" style="width:80px;height:100px;">
                                            </br>
                                            <?php foreach ($winner2 as $row2) { ?>
                                                <?php echo $row2->player_name; ?><span class="badge"><?php echo $row2->total; ?>
                                            <?php } ?>
                                        </div>

                                        <div class="col-sm-4"><img src="<?php echo base_url("images/one.png"); ?>" alt="WInner 2" align="bottom" style="width:90px;height:110px;">
                                            </br>
                                            <?php foreach ($winner1 as $row1) { ?>
                                                <?php echo $row1->player_name; ?><span class="badge"><?php echo $row1->total; ?>
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-4"></br><img src="<?php echo base_url("images/three.png"); ?>" alt="Winner 3" align="bottom" style="width:70px;height:90px;">
                                            </br>
                                            <?php foreach ($winner3 as $row3) { ?>
                                                <?php echo $row3->player_name; ?><span class="badge"><?php echo $row3->total; ?></span>
                                                </br>
                                            <?php } ?>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                    <div class="col-md-3">

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



