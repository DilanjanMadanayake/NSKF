<html>
    <head>
        <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">
                   
                    <div class="row">	
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading" align="center"><h4>Add New Announcement</h4></div>
                                <div class="panel-body">
                                    <?php 
                if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            Announcement has been added. 
                        </div>
                    </div>";
                }
                if(validation_errors()) {
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-danger\" role=\"alert\">                            
                            <strong>ERROR!</strong> Please fix the errors and submit again.
                        </div>
                    </div>";
                }
                ?>
                                    <?php echo form_open('chief_instructor/add_announcement'); ?>
                                    <table width="700" border='0' cellpadding='3' cellspacing='5'>
                                        <td>
                                            Announcement title
                                        </td>
                                        <td>
                                            <input type="text"  id="title" name="title" class="form-control" value="<?php echo set_value('title'); ?>">
                                            <span class="help-block" style="color: crimson"> <?php echo form_error('title'); ?></span>              
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td>
                                                <input type="date" name="date" id="date" class=" datepicker" placeholder="Date" value="<?php echo date("Y-m-d"); set_value('date'); ?>">
                                                <span class="help-block" style="color: crimson"> <?php echo form_error('date'); ?></span>            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Description
                                            </td>
                                        </tr>
                                    </table> 
                                    <table> 
                                        <tr>
                                            <td></td>
                                            <td>
                                                <textarea name="textarea" id="textarea"><?php echo set_value('textarea'); ?>
                                                </textarea>
                                                <span class="help-block" style="color: crimson"> <?php echo form_error('textarea'); ?> </span>
                                            </td>
                                        </tr>
                                    </table>
                                    <input type="submit" name="submit" onclick="return confirm('Do you really want to publish?')" class="btn btn-primary" id="submit" name="permission" placeholder="permission">
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                            <script>
                                CKEDITOR.replace('textarea');
                            </script>
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
    </body>
</html>
