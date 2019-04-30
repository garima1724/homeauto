<?php
//session_start(); //we can even start a seesion at this place but this is not the correct way because a session should only begin recording once the username and the email has been validated.it would be logically wrong to start the session here.
include_once  '../connect.php';
$passErr=$userErr=$captchaErr='';
if((isset($_POST['log'])) && $_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name= mysqli_real_escape_string($link,$_POST['username']);//for preventing sql injection
    $pass= mysqli_real_escape_string($link,$_POST['password']);//for preventing sql injection
    $data=mysqli_query($link, "SELECT * FROM tbl_admin WHERE user_name= '$name'");
    $check_email=mysqli_num_rows($data);

    if($check_email == TRUE)
    {
        $row=mysqli_fetch_assoc($data);
        $pass=md5($pass);        
        if($pass == $row['password'])
        {
            session_start();//this is correct session should start only after we have matched the username and password because we want to record the activity of the user that already has an account therefore once pwd and username match is found then session should start.
            if($_SESSION['captcha'] == $_POST['captcha'])//for matching the captcha
            {
                //session_start(); session cannot begin here because above we are using a super global variable i.e $_SESSION and that cannot be used without starting a session.
                $_SESSION['name']= $row['user_name'];
                header("location:dashboard.php");
            }
            else
            {
                $captchaErr="Invalid captcha";
            }
         
        }
        else
        {
            $passErr = 'wrong password';
        }
    }
       
    else
    {
        $userErr = "user not registered....";
    }
}
//session_destroy(); //don't destroy the session there itself in admin/index.php because then we'll not be able to carry forward the data of the user on the next page after he logs in so that is basically incorrect as session destroying basically means logging out.
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login Form | LMS </title>

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
    <h1 style="font-family:Lucida Console">ERP Module</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <h1>Admin Login Form</h1>

            <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required=""/>
                <span class= "error"> <?php echo $userErr;?></span>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
                <span class= "error"> <?php echo $passErr;?></span>
            </div>
            <div>
            <p>
                <?php
                if(!isset($_SESSION))
                {
                    session_start();
                    $_SESSION['captcha'] = rand(1000,9999);//random variable for generation of captcha.
                 //captcha matching could have been done here but to see hoe to create image in php we are making use of another file captcha.php.
                 //echo $_SESSION["captcha"]; displays the captcha generated.
                }
                 ?>
                 <img src="captcha.php"><br>
                 <input type="text" name="captcha" class="form-control" placeholder="Captcha" required=""/>
                 <span class= "error"> <?php echo $captchaErr;?></span>
            <div>

                <input class="btn btn-default submit" type="submit" name="log" value="Login">
                <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <br/>


            </div>
        </form>
    </section>


</div>


</body>
</html>
