<?php
//connectivity to database
include_once '/library/function.php';
$passErr=$emailErr='';
if((isset($_POST['log'])) && $_SERVER['REQUEST_METHOD'] === 'POST')
{
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $pass  = mysqli_real_escape_string($link,$_POST['pass']);
    //$data  = mysqli_query($link,"SELECT email FROM tbl_user WHERE email= '$email'");
    $check_email = check_email($email);
    if($check_email == TRUE)
    {
        $pass = sha1(md5(crc32($pass)));
        $row = getdata($email);//here getdata is thefunction we have made in function.php.
        //$row = mysqli_fetch_assoc($data);//stores data in the form of an array
        //or mysqli_fetch_array works the same way.
        if($pass === $row['password'])//checking if the password input matches the password with that is there in the table row by calling the pwd.
        {
            session_start();
            $_SESSION['id']= $row['email'];//now we are calling email.
            header("location:profile.php");
        }
        else
        {
            $passErr = 'wrong password';
        }

    }
    else
    {
        $emailErr = "Email not registered....";
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

    <title>Employee Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <style type="text/css">
        .error{
        font-size: 18px;
        color: red;
    }
    </style>
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">ERP MODULE</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <h1>Employee Login Form</h1>

            <div>
                <input type="text" name="email" class="form-control" placeholder="mail@gmail.com" required=""/>
                <span class= "error"> <?php echo $emailErr;?></span>
            </div>
            <div>
                <input type="password" name="pass" class="form-control" placeholder="Password" required=""/>
                <span class= "error"> <?php echo $passErr;?></span>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="log" value="Login">
                <a class="reset_pass" href="#">Lost your password?</a>
            </div>
            
            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">New to site?
                    <a href="register.php"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>


</div>




</body>
</html>
