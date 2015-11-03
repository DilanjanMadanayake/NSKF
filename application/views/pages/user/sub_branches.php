
<?php
$bid = $_GET["id"];
?>

<body>
    <div class="homeinfo">
    </div>
    <!-- overlay -->
    <div class="container overlay">
        <!-- blockblack -->
        <div class="blockblack">
            <div class="row">
                <div class="col-sm-2">
                    </br>
                </div>
                <div class="col-sm-8" align='center'><h3>Our Sub Branches</h3></div>
                </br>
                <div class="col-sm-2">
                    </br>
                </div>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=$bid"; ?>" method="post" id="updateForm">
                <div class="container">
                    <div class="col-sm-3"></div> 
                    <div class="col-sm-8">
                        <table border="0" width="600" cellpadding="1" cellspacing="1">

                            <?php //while ($branch = mysqli_fetch_array($sub_branch_results)) { ?>
                            <?php foreach ($sub_branch as $row){ ?>
                                <tr>
                                    <td><b>Sub Branch Name:</b></td><td><?php echo $row->sub_branch_name; ?></td>
                                </tr>
                                <tr>
                                <tr>

                                    <td><b>Main Branch Name:</b></td><td><?php echo $row->branch_name; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Town:</b></td><td><?php echo $row->town; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Country:</b></td><td><?php echo $row->country; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Contact No:</b></td><td><?php echo $row->contact_number; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Email:</b></td><td> <?php echo $row->email; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Address:</b></td><td><?php echo $row->address; ?></td>
                                </tr>
<!--                                <tr>
                                    <td><b>Branch Type:</b></td><td><?php echo $row->sub_branch_type; ?></td>
                                </tr>-->
                                <tr>

                               </tr>
                                <tr>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td></br></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="col-sm-1">
                        </br>
                    </div>

                </div>
            </form>

        </div>
    </div>
</body>

<?php include("../includes/user/footer.php"); ?>
