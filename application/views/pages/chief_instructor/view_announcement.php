<html>
    <head>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">	
                    
                    <div class="row">	
                        <div class="col-md-12">                                        
                            
                            <?php foreach ($announcement as $row) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" align="center"><h4><b>More Details</b></h4></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-2"> </div>
                                            <div class="col-sm-8">
                                                <div class="table1">
                                                    <form action="view_announcement.php" method="post">
                                                        <table class="table" width="900" border="0">                                                
                                                            <tr>
                                                                <td><b>Title</b></td>
                                                                <td><small><?php echo $row->title ?></small></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Description</b></td>
                                                                <td><small><?php echo $row->description ?></small></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Date</b></td>
                                                                <td><small><?php echo $row->date ?></small></td>   
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </form>
                                            </div>
                                            <div class="col-sm-4">
                                                </br>
                                                </br>
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
    </body>
</html>

