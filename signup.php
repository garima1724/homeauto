<?php
//database file inclusion
require 'connect.php';//including connect.php in this file.
//get input from register.php(register form)
$id      =$_POST['employeeid'];
$name    =$_POST['fullname'];
$email   =$_POST['email'];
$pass    =$_POST['password'];
$cpass   =$_POST['cp_pass'];
$gender  =$_POST['gender'];
$contact =$_POST['contact'];

$data=mysqli_query($link,"SELECT email FROM tbl_users WHERE email= '$email'");//$link is the connection parameter rest is the query parameter.
//check email

$check_email =mysqli_num_rows($data);


//var_dump($check_email);//if o/p is int(0) it means false.(i.e that email does not exist on datadase).

if($check_email == FALSE)//email validation
{
	if($pass === $cpass)//Password validation
	{
		//encrypt password:
		$pass=sha1(md5(crc32($pass)));
		//insert data into the database using normal statement.
		$insert= "INSERT INTO tbl_users(
				   emp_id,name,email,password,gender,contact) VALUES( '$id','$name','$email','$pass','$gender','$contact')";//normal sql statement
				   $sql = mysqli_query($link,$insert);
				   if($sql)
				   {
				   	 echo "Registered Successfully";
				   }
				   else
				   {
				   	 echo "error";
				   }
	}
	else
	{
		echo "Password Mismatch...";
	}
}
else
{
	echo "Email already registered....";
}
?>