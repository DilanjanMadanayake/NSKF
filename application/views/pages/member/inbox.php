<body>
    <div class="homeinfo">

    </div>

<!-- overlay -->
<div class="container overlay">


<!-- blockblack -->


                            <div class="col-md-12" style="color:#000000;" align="center">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="color:#000000; height: 50px">
                                        <h3>
                                            Inbox                                           
                                        </h3>
                                    </div>
                                    <div class="panel-body" align="center"> 
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <form class="navbar-form" role="search" method="post" action="<?php  echo base_url("member/inbox_search"); ?>">
                                                    <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </form>
                                                
                                            </td>
                                            <td>
                                                <a class="btn btn-warning bgcolor" href="<?php echo base_url("/member/new_message" ); ?>" role="button">New Message</a>
                                            </td>
                                            
                                        </tr>
                                        <?php foreach ($from as $row){ ?>
                                        <tr>
                                            <td><strong><?php
                                                echo $row->first_name." ".$row->last_name;                                               
                                                
                                                ?>
                                                    
                                            </strong></td>
                                            <td>
                                                <a href="<?php  echo base_url("member/view_message")."/".$row->from_id; ?>">View</a>
                                            </td>
                                            
                                        </tr>
                                        <?php } ?>
                                    </table>
<!--                                        <a class="btn btn-warning bgcolor" href="<?php echo base_url("/home/sub_branches?id=" . $row->branch_id); ?>" role="button">View Sub Branches</a>-->
                                    </div>
                                </div>
                            </div>
          
  
             






<!-- blockblack -->

</div>
<!-- overlay -->



<!-- Footer Starts -->
