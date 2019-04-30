<?php
include_once 'header.php';
include_once '../connect.php';
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Dashboard</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    <style type="text/css">
                        .myFontg{
                            color: green;
                            font-size: 14px;
                        }

                    </style>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                        <?php
                            $id=base64_decode($_REQUEST['id']);
                            $data= mysqli_query($link,"SELECT * FROM tbl_user WHERE id='$id'");
                            $row=mysqli_fetch_assoc($data)
                            ?>
                            <p class="myFontg">
                            <td><img src="../<?php echo $row['image'];?>" height=100 width=100></td><br><br>
                            <td>Employee Id:-<?php echo $row['emp_id'];?></td><br><br>
                            <td>Full Name:-<?php echo $row['name'];?></td><br><br>
                            <td>Email:-<?php echo $row['email'];?></td><br><br>
                            <td>Contact:-<?php echo $row['contact'];?></td><br><br>
                            <td>Gender:-<?php echo $row['gender'];?></td><br><br>
                            <td>Joining Date:-<?php echo $row['join_date'];?></td><br><br>
                            </p>
                            <a href="employee.php">Back</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include_once 'footer.php';
?>

