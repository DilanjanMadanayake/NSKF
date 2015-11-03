<?php //include("../includes/user/header.php"); ?>
<?php //include("../includes/member/member_navigation.php"); ?>
<?php //include("../includes/user/functions.php"); ?>
<?php //include("../includes/user/session.php"); ?>
<?php// include_once("../includes/user/config.php"); ?> 

<?php

//$user_id = $_SESSION['user_id'];
//
////
////$userfullname = getName($db, $user_id);
////$id = getNenasalaID($db, $user_id);
////$nenasalaname = getNenasalaName($db, $id);
////$contactno  = getContactNo($db, $user_id);
//
//$errors = array();
//$issueReply = null;
//$password = null;
//$newpassword = null;
//$updateStatus = 0;
//
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
//    if (isset($_POST["change_password"])) {
//        if (empty($_POST["current_password"])) {
//            $errors["passwordErr"] = "Password is required";
//        } else {
//            $password = test_input($_POST["current_password"]);
//            if (preg_match("/^.*(?=.{6,}).*$/", $password) === 0) {
//                $errors["passwordErr"] = "Password should be greater than 6 letters.";
//            } else {
//                $password = md5($password);
//                $current_pwd = get_password($user_id);
//                //confirm with old
//                if ($password !== $current_pwd) {
//                    $errors["passwordErr"] = "Incorrect Password.";
//                } 
//
//            }
//            
//        }
//
//
//
//
//
//        if (empty($_POST["new_password"])) {
//            $errors["newpasswordErr"] = "Password is required";
//        } else {
//            $newpassword = test_input($_POST["new_password"]);
//            if (preg_match("/^.*(?=.{6,}).*$/", $newpassword) === 0) {
//                $errors["newpasswordErr"] = "Password should be greater than 6 letters.";
//            } else {
//                $newpassword = md5($newpassword);
//            }
//        }//  
//
//        if (empty($_POST["confirm_password"])) {
//            $errors["passwordConfirmErr"] = "Re-Enter password";
//        } else {
//            $password_confirm = test_input($_POST["confirm_password"]);
//            if ($newpassword !== md5($password_confirm)) {
//                $errors["passwordConfirmErr"] = "Passwords not matching";
//            }
//        }
//
//
//
//
//
//        if (!$errors) {
//
//            $query = "UPDATE user SET password='$newpassword' WHERE user_id='$user_id'";
//            $result = mysqli_query($db, $query);
//
//            if (!$result) {
//                die("Update Query Failed.");
//            } else {
//                $updateStatus = 1;
//            }
//        } else {
//            $updateStatus = 2;
//        }
//    }
//
//    }
?>



<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">
   
       
<div class="contactform center">


     <h3><span class="glyphicon glyphicon-lock"></span> Change Password</h3>

            <?php
                if ($updateStatus == 1) {
                    $message = "Password has been successfully changed.";
                    $successmsg = display_success_msg($message);
                    echo $successmsg;
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
 

     <div class="row"><div class="col-md-3"></div>
         <div class="col-md-6">
        <?php echo form_open('member/change_password'); ?> 
                    <input type="password" class="form-control" name="current_password" id="CurrentPassword" placeholder="Current Password">
                    <span class="help-block" style="color: crimson"> <?php echo form_error('current_password');?>
                             </span>
                    <input type="password" class="form-control" name="new_password" id="NewPassword" placeholder="New Password">
                    <span class="help-block" style="color: crimson"> <?php echo form_error('new_password');?>
                             </span>
                    <input type="password" class="form-control" name="confirm_password" id="ConfPassword" placeholder="Confirm Password">
                    <span class="help-block" style="color: crimson"> <?php echo form_error('confirm_password');?>
                             </span>
                    <input type="submit" class="btn btn-warning bgcolor" name="change_password" id="change_password" value="change">
        <?php echo form_close(); ?>
             </div>
         <div class="col-md-3"></div>
            </div>
           </div>
       





</div>
<!-- blockblack -->

</div>
<!-- overlay -->



<!-- Footer Starts -->
