

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
                                <div class="panel-heading" align="center"><h4><b>Update Announcement</b></h4></div>
                                    <div class="panel-body">
                                        <?php echo form_open('chief_instructor/update_announcement'."/".$id); ?>
                                        <table width="600" border='0' cellpadding='1' cellspacing='3'>
                                            <?php foreach ($announcement as $row){ ?>
                                            <tr>
                                                <td height="40">
                                                    Announcement title
                                                </td>
                                                <td>
                                                    <input type="text"  id="title" name="title" class="form-control" value="<?php echo $row->title; ?>">
                                                    <span class="help-block" style="color: crimson"> <?php echo form_error('title');?>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date</td>
                                                <td>
                                                    <input type="date" name="date" id="date" class=" datepicker" placeholder="Date" value="<?php echo $row->date; ?>">
                                                    <span class="help-block" style="color: crimson"> <?php echo form_error('date');?>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Description
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                        <textarea name="textarea" id="textarea"><?php echo $row->description; ?>
                                        </textarea>
                                        <span class="help-block" style="color: crimson"> <?php echo form_error('textarea');?></br>
                                    <input type="submit" name="submit" onclick="return confirm('Do you really want to update?')" class="btn btn-primary" id="submit" name="permission" placeholder="permission">
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
