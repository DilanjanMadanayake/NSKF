<?php

function test_input($data) {
    global $db;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($db, $data);
    return $data;
}

function display_err_msg($message) {
$error_message = "<div class=\"row\">";
$error_message .= "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
$error_message .= $message;
$error_message .= "</div></div>";

return $error_message;
}

function display_success_msg($message) {
    $success_message = "<div class=\"row\">";
    $success_message .= "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">";
    $success_message .= $message;
    $success_message .= "</div></div>";

    return $success_message;
}

function getUserType($db,$user_id){
    
    $user_type=null;
    $user=null;
    $query = "SELECT * FROM user WHERE user_id=$user_id";
    $result = mysqli_query($db, $query);
    
    if (!$result) {
        die("getUserType() method query failed");
    }

    $row = mysqli_fetch_array($result);
    $user_type=$row['user_type'];
    switch ($user_type) 
            {
                case "M":
                $user="Member";
                break;
                case "A":
                $user="Admin";
                case "CI":
                $user="Chief Instructor";
                break;
                case "BL":
                $user="Branch Leader";
                break;
            }
    
    return $user;
    
}

function getBranchName($db,$branch_id){
    
    $branch=null;
    $query="SELECT * FROM branch WHERE branch_id=$branch_id";
    $result = mysqli_query($db, $query);
    
    if (!$result) {
        die("getBranchName() method query failed");
    }

    $row = mysqli_fetch_array($result);
    $branch=$row['branch_name'];
    return $branch;
}

function get_password($user_id){
    global $db;
    
    $password = null;
    
    $query = "SELECT password FROM user WHERE user_id = $user_id LIMIT 1";
    $result = mysqli_query($db, $query);
    
    if(!$result){
        die("get_password() method query failed");
    }
    
    if($row = mysqli_fetch_array($result)){
        $password = $row['password'];
    }
    
    return $password;
}

function phone_no_err($phone_no) {
    if (empty($phone_no)) {
        return "Please enter contact number";
    } elseif (!preg_match("/^[0-9]+$/", $phone_no)) {
        return "Please enter numbers only";
    } elseif (strlen($phone_no) !== 10) {
        return "Contact numbers should have only 10 numbers";
    } else {
        return false;
    }
}

function checkBranchRecord($eid) {
    global $db;
    $query = "SELECT distinct u.first_name, s.sub_branch_name FROM user u, branch b, sub_branch s WHERE u.branch_id=$eid and s.branch_id=$eid";
    $result = mysqli_query($db, $query);

    if (!$result) {
        die("checkBranchRecord() method query failed");
    }

    if (mysqli_num_rows($result) == 0) {
        return 1;
    } else {
        return 0;
    }
}

function checkSubBranchRecord($subBranchId) { 
    global $db;
    $query1 = "SELECT distinct u.first_name FROM user u, sub_branch b WHERE u.sub_branch_id=$subBranchId";
    $result1 = mysqli_query($db, $query1);

    if (!$result1) {
        die("checkSubBranchRecord() method query failed");
    }

    if (mysqli_num_rows($result1) == 0) {
        return 1;
    } else {
        return 0;
    }
}
function checkEmail($email) {
    global $db;
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($db, $query);

    if (!$result) {
        die("checkEmail() method query failed");
    }

    if (mysqli_num_rows($result) == 0) {
        return true;
    } else {
        return false;
    }
}





?>