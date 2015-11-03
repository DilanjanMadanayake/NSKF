<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">

   
         
                <div class="panel-heading"s>
                    <center>    
                    <br />
                    <strong>New Message</strong>
                    <br />
                    </center>
                    <?php 
                if($status == 1){
                    echo
                    "<div class=\"row\">
                        <div class=\"alert alert-warning alert-success\" role=\"alert\">
                            <strong>Congrats!</strong> Your message has been sent. 
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
                </div>

                    <table class="table">
                         <?php echo form_open('member/new_message'); ?>
                    <tr>
                        <td><strong>To</strong></td>
                        <td>:  
                        </td>
                        <td>
                            <select name="to" class="form-control" onchange="this.form.submit()" class="form-control" id="branch">
                            <option value="select">Select Member</option>
                            <?php  //while($branchRow = mysqli_fetch_array($branchList)) { ?>
                            <?php foreach ($member as $row) { ?>
                            <option value="<?php echo $row->user_id; ?>"><?php echo $row->first_name." ".$row->last_name; ?> </option>
                            <?php } ?>
                            </select>
                        </td>
                         
                    </tr>
                    
                    <tr>
                    <td><strong>Message</strong></td>
                    <td>:  
                        </td>

                    <td>
                        <textarea rows="5" name="message" class="form-control" id="message" placeholder="Message"></textarea>
                    </td>

                    </tr>
                    <tr>
                        <td>&nbsp;                      
                        </td>
                        <td>&nbsp;                      
                        </td>
                        <td><button type="submit" name="submit" class="btn btn-warning bgcolor">Send</button>                      
                        </td>
                    </tr>
                    <?php echo form_close(); ?>
                    </table>
              
             





</div>
<!-- blockblack -->

</div>
<!-- overlay -->



<!-- Footer Starts -->
<?php //include("../includes/user/footer.php"); ?>