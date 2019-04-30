<?php
include_once 'header.php';
$msg=$msgErr=$success='';
if(isset($_POST['change']))
{
    #data
    #check current password through email
    #validate current password
    #validate new user input password
    #Update New Password(UPDATE tbl_name SET col_name = '$val' WHERE unique_col '$unique_col_val')
    //var_dump($row);
    $cpass  = sha1(md5(crc32($_POST['pass'])));
    $npass  = $_POST['npass'];
    $cnpass = $_POST['cnpass'];
    if($cpass === $row['password'])
    {
        if($npass === $cnpass)
        {
            $npass= sha1(md5(crc32($npass)));
            $update= mysqli_query($link,"UPDATE tbl_user SET password= '$npass' WHERE email ='$email'");
            $success= "Password Successfully Changed";
        }
        else
        {
            $msgErr="Password mismatch";
        }
    } 
    else
    {
        $msg="Invalid Current Password";
    }
}
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Reset Password</h3>
                    </div>
                        <style type="text/css">
    .myFont{
            font-size: 18px;
    }
    .error{
        color: red;
        font-size: 20px;
    }
    .success{
        font-size: 20px;
        color: green;
    }
    
    </style>

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
                            <center>
                            <span class= "success" ><?php echo $success ;?></span>
                                <form name="form1" action="" method="POST">
                                    <input type="password" name="pass" placeholder="Enter Current Password" class="form-control"><br><br>
                                    <span class ="error"> <?php echo $msg;?> </span>
                                    <input type="password" name="npass" placeholder="Enter New Password" class="form-control"><br><br>
                                    <input type="password" name="cnpass" placeholder="Confirm New Password" class="form-control"><br>
                                    <span class ="error"> <?php echo $msgErr;?> </span><br><br>
                                    <input type="submit" name="change" class="btn btn-danger" value="Change Password">
                                    </form>
                            </center>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include_once 'footer.php';
?>

