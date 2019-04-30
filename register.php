<?php
//database file inclusion
//require 'connect.php';//including connect.php in this file.
require '/library/function.php';
//get input from register.php(register form)
$emailErr= $passErr =$success=$idErr=$nameErr='';
if(isset($_POST['reg']))
{
    //for id
    if(!empty($_POST['employeeid']))
    {
        $id=$_POST['employeeid'];
    }
    else
    {
        $idErr="Required Field";
    }
    //for name
    if(!empty($_POST['fullname']))
    {
        $name=$_POST['fullname'];
    }
    else
    {
        $nameErr="Required Field";
    }
    //for email
    if(!empty($_POST['email']))
    {
        $email=$_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $emailErr="Invalid Email Format";
        }
    }
    else
    {
        $emailErr="Required Field";
    }
    //for password
    if(!empty($_POST['password']))
    {
        $pass=$_POST['password'];
    }
    else
    {
        $passErr="Required Field";
    }
    //get input from register form
//$id      = mysqli_real_escape_string($link,$_POST['employeeid']);
//$name    = mysqli_real_escape_string($link,$_POST['fullname']);
//$email   = mysqli_real_escape_string($link,$_POST['email']);
//$pass    = mysqli_real_escape_string($link,$_POST['password']);
$cpass   = mysqli_real_escape_string($link,$_POST['cp_pass']);
$gender  = mysqli_real_escape_string($link,$_POST['gender']);
$contact = mysqli_real_escape_string($link,$_POST['contact']);
//image details
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];

$div=explode('.',$file_name);
$file_ext = strtolower(end($div));
$unique_image=substr(md5(time()), 0,10).".".$file_ext;

$uploaded_image = 'upload/'.$file_name; //this is to show that the image of the user is stored in upload folder by $file_name.
move_uploaded_file($file_tmp,$uploaded_image);//to move image from folder tmp to server

if(!$emailErr && !$passErr && !$idErr && !$nameErr)
{
/*
$data=mysqli_query($link,"SELECT email FROM tbl_user WHERE email= '$email'");//$link is the connection parameter rest is the query parameter.
//check email

$check_email =mysqli_num_rows($data);
*/

//var_dump($check_email);//if o/p is int(0) it means false.(i.e that email does not exist on datadase).
$check_email = check_email($email);
if($check_email == FALSE)//email validation
{
    if($pass === $cpass)//Password validation
    {
        //encrypt password:
        $pass=sha1(md5(crc32($pass)));
        //insert data into the database
        $insert = "INSERT INTO tbl_user(emp_id,name,email,password,gender,contact,image) VALUES('$id','$name','$email','$pass','$gender','$contact','$uploaded_image')"; // normal statement.
        //$insert = "INSERT INTO tbl_users VALUES('','$id','$name','$email','$pass','$gender','$contact','')"; prepared statement
                   $sql = mysqli_query($link,$insert);
                   if($sql)
                   {
                     $success="Registered Successfully...";
                   }
                   else
                   {
                     echo "error";
                   }
    }
    else
    {
        $passErr="Password Mismatch...";
    }
}
else
{
    $emailErr = "Email already registered....";
}
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

    <title>ERP Module</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <style type="text/css">
    .myFont{
            font-size: 18px;
    }
    .error{
        color: red;
    }
    .success{
        font-size: 20px;
        color: green;
    }
    
    </style>
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">ERP MODULE</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
                    <h2>Employee Registration Form</h2><br>
                    <span class= "success" ><?php echo $success ;?><a href="index.php">Please Login</a></span>
                    <div>
                        <input type="text" class="form-control" placeholder="EmployeeId" name="employeeid">
                        <span class="error"><?php echo $idErr;?></span>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="FullName" name="fullname">
                         <span class="error"> <?php echo $nameErr;?></span>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <span class= "error"> <?php echo $passErr;?></span>
                    </div>

                    <div>
                        <input type="Password" class="form-control" placeholder="ConfirmPassword" name="cp_pass" required=""/>
                        <span class= "error"> <?php echo $passErr;?></span>
                    </div>
                    <div>
                    <p>
                        <input type="text" class="form-control" placeholder="Email" name="email"> <span class= "error"> <?php echo $emailErr;?></span>
                    </p>
                    </div>
                    <div>
                    <p class="myFont">
                         Gender:-<input type="radio" name="gender" value="Male">Male
                                  <input type="radio" name="gender" value="Female">Female
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Contact" name="contact" required=""/>
                    </div>
                    <div>
                        <input type="file" class="form-control" name="image">
                    </div><br>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-success submit " type="submit" name="reg" value="Register">
                    </div>

                </form>
            </section>



    </div>
</body>
</html>

