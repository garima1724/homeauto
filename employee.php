<?php
require 'connection.php';
$success='';
if(isset($_POST['reg']))
{
    $name    =$_POST['name'];
    $salary  =$_POST['salary'];
    $dept    =$_POST['dept'];
    //both statements are required to upload data to the database otherwise data will not get uploaded.
    $insert = "INSERT INTO tab_emp(name,salary,dept) VALUES('$name','$salary','$dept')";
    $sql = mysqli_query($link,$insert);
                   if($sql)
                   {
                     $success="Registered Successfully";
                   }
                   else
                   {
                     echo "error";
                   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employee Salary Form</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>
<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Employee Salary</h1>
</div>

<br>

<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">
                <span class= "success" ><?php echo $success ;?></span>

                <div>
                        <input type="text" class="form-control" placeholder="Name" name="name" required=""/>
                </div>
                <div>
                        <input type="text" class="form-control" placeholder="Salary" name="salary">
                        </div>
                <div>
                        <input type="text" class="form-control" placeholder="Dept" name="dept" required=""/>
                </div>
                <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-success submit " type="submit" name="reg" value="Register">
                </div>
                <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">Second highest salary?
                    <a href="new.php"> Click Here </a>
                </p>

                <div class="clearfix"></div>
                <br/>
            </form>
        </section>
    </div>
</body>
</html>

