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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                        <form action="" method="POST" name="form1">
                        <table class="table"> 
                          <tr>
                            <td>
                                <input type="text" name="name" placeholder="Search Employee By Name" class="form-control">
                            </td>
                            <td>
                                <input type="submit" name="search" value="Search" class="btn btn-success" class="form-control">
                            </td>
                          </tr>
                        </table>
                        </form>

                        <table class="table table-boardered">
                        <tr>
                        <?php
                        if(isset($_POST['search']))
                        {
                            $name= $_POST['name'];
                            $data= mysqli_query($link,"SELECT * FROM tbl_user WHERE name LIKE '$name%'");//using LIKE operator along with wildcard
                            $i=0;
                            while($row=mysqli_fetch_assoc($data))://whenever we have to end while we put colons like this.
                            { 
                            ?>
                            <td><a href="employee_details.php?id=<?php echo base64_encode($row['id']);?>">
                            <img src="../<?php echo $row['image'];?>" height=100 width=100><br><br>
                            <b>Employee Id:-<?php echo $row['emp_id'];?></b><br>
                            <b>Name:-<?php echo $row['name'];?></b><br>
                            </td>
                            <?php
                            $i=$i+1;
                            if($i==4)
                            {
                                echo "<tr>";
                                echo "</tr>";
                                $i=0;
                            }
                            }endwhile;
                            }
                            else
                            {
                                $data= mysqli_query($link,"SELECT * FROM tbl_user");
                            $i=0;
                            while($row=mysqli_fetch_assoc($data)):{ //whenever we have to end while we put colons like this.
                            ?>
                            <td><a href="employee_details.php?id=<?php echo base64_encode($row['id']);?>">
                            <img src="../<?php echo $row['image'];?>" height=100 width=100><br><br>
                            <b>Employee Id:-<?php echo $row['emp_id'];?></b><br>
                            <b>Name:-<?php echo $row['name'];?></b><br>
                            </td>
                            <?php
                            $i=$i+1;
                            if($i==4)
                            {
                                echo "<tr>";
                                echo "</tr>";
                                $i=0;
                            }
                            }endwhile;
                            }
                            ?>
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include_once 'footer.php';
?>

