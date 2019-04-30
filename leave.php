<?php
include_once 'header.php';
include_once 'connect.php';
$success=$startErr=$endErr=$leaveErr='';
if(isset($_POST['submit']))
{
    if(!empty($_POST['startdate']))
    {
        $startdate=$_POST['startdate'];
    }
    else
    {
        $startErr="Required Field";
    }
    if(!empty($_POST['enddate']))
    {
        $enddate=$_POST['enddate'];
    }
    else
    {
        $endErr="Required Field";
    }
    if(!empty($_POST['startdate']))
    {
        $reason=$_POST['leavereason'];
    }
    else
    {
        $leaveErr="Required Field";
    }

}

?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    
                     <div class="col-lg-12 text-center ">
                        <h1 style="font-family:Lucida Console">LEAVE FORM</h1>
                    </div>
                                  
                    <style type="text/css">
                        .myFontg{
                            color: green;
                            font-size: 14px;
                        }

                    </style>
                    

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                           
                               <div>
                        <input type="text" class="form-control" placeholder="Leave From" name="startdate">
                        <input type="text" class="form-control" placeholder="Leave Till" name="enddate">
                        <input type="text" class="form-control" placeholder="Reason" name="leavereason"><br>
                        <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-success submit " type="submit" name="submit" value="Submit"><br>                   
                    <a href="profile.php">Back</a>

                    </div>
                </div>
            </div>
        </div>
                <!-- /page content -->
        </form>
        </section>
        </div>
        



<?php
include_once 'footer.php';
?>