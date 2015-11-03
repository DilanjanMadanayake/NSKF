<?php //include("../includes/user/header.php"); ?>
<?php //include("../includes/member/member_navigation.php"); ?>
<?php //include("../includes/user/functions.php"); ?>
<?php //include("../includes/user/session.php"); ?>
<?php //include_once("../includes/user/config.php"); ?> 

<?php
//   $user_id = $_SESSION['user_id'];
//   
//    $query="SELECT * FROM user WHERE user_id=$user_id";
//    $result=  mysqli_query($db, $query);
//    $row = mysqli_fetch_array($result);
//    $first_name=$row['first_name'];
//    $last_name=$row['last_name'];
//    $email=$row['email'];
//    $address=$row['address'];
//    $dob=$row['date_of_birth'];
//    $gender=$row['gender'];
//    $nationality=$row['nationality'];
//    $religion=$row['religion'];
//    $contact_number=$row['contact_number'];
//    $occupation=$row['occupation'];
//    $branch=getBranchName($db,$row["branch_id"]);
    
?>

<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->
<div class="blockblack">

   
          <?php foreach ($member as $row){ ?>
                <div class="panel-heading"s>
                    <center>    
                        <a href=""><img src="<?php  echo base_url("images/profile_pic.png"); ?>" width="213" height="214" class="img-circle" /></a>
                    <br />
                    <strong><?php echo $row->first_name." ".$row->last_name; ?></strong>
                    <br />
                    <a href="update_profile.php">[edit profile]</a>
                    &nbsp;
                    <a href="change_password.php">[change password]</a>
                    </center>
                </div>

                    <table class="table">
                    <tr>
                        <td><strong>E-Mail Address</strong></td>
                        <td>:  
                        <?php 
                            echo $row->email; 
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Branch</strong></td>
                        <td>: 
                        <?php 
                            foreach ($branch as $row1)
                            { 
                               echo $row1->branch_name;
                            }
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td>
                        <td>:
                        <?php
                            echo $row->address;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Contact Number</strong></td>
                        <td>: 
                        <?php
                            echo $row->contact_number;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Date of Birth</strong></td>
                        <td>:
                        <?php
                            echo $row->date_of_birth;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Gender</strong></td>
                        <td>:
                        <?php
                            echo $row->gender;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Nationality</strong></td>
                        <td>:
                        <?php
                            echo $row->nationality;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Religion</strong></td>
                        <td>:
                        <?php
                            echo $row->religion;
                        ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Occupation</strong></td>
                        <td>:
                        <?php
                            echo $row->occupation;
                        ?>
                        </td>
                        <td>&nbsp;</td>

                    </tr>
                    <tr>
                        <td><strong>Achievements</strong></td>
                        <td>:
                        <?php 
                            foreach ($achievement as $row2)
                            { 
                               echo $row2->achievement;
                            }
                        ?>
                        </td>
                        <td>&nbsp;</td>

                    </tr>
                    
                    <tr>
<!--                    <td><strong>Search Members</strong></td>
                    <td>
            <form class="navbar-form" role="search" method="post" action="<?php // echo base_url("member/member_search"); ?>">
                <div class="col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                </div>
            </form>
                    </td>-->
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                    </tr>
                    </table>
              <?php } ?>
    
             





</div>
<!-- blockblack -->

</div>
<!-- overlay -->



<!-- Footer Starts -->
<?php //include("../includes/user/footer.php"); ?>